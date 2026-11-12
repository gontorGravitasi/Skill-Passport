<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualan
 * @var array $produkList
 * @var array $produkData
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan form content">
            <?= $this->Form->create($penjualan) ?>
            <fieldset>
                <legend><?= __('Add Penjualan') ?></legend>
                <?php
                    // 1. Tanggal Penjualan
                    echo $this->Form->control('tanggal_penjualan', [
                        'empty' => true,
                        'style' => 'width: 100%; padding: 8px;'
                    ]);

                    // 2. ID Pelanggan dipindah ke bawah Tanggal
                    echo $this->Form->control('id_pelanggan', [
                        'label' => 'ID Pelanggan',
                        'style' => 'width: 100%; padding: 8px;'
                    ]);
                ?>
                
                <br>
                <h4>Daftar Produk Pembelian</h4>
                
                <!-- Tabel Baris Produk (Nama, Harga, Jumlah, Total sejajar) -->
                <table class="table" id="tabel-produk" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="width: 35%;">Nama Produk</th>
                            <th style="width: 20%;">Harga Satuan</th>
                            <th style="width: 15%;">Jumlah</th>
                            <th style="width: 25%;">Total Harga</th>
                            <th style="width: 5%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-produk">
                        <tr class="produk-row">
                            <td>
                                <?= $this->Form->control('items[0][produk_id]', [
                                    'options' => $produkList,
                                    'empty' => '-- Pilih Produk --',
                                    'label' => false,
                                    'class' => 'produk-select',
                                    'style' => 'width: 100%; padding: 6px;'
                                ]) ?>
                            </td>
                            <td>
                                <?= $this->Form->control('items[0][harga]', [
                                    'type' => 'number',
                                    'label' => false,
                                    'readonly' => true,
                                    'class' => 'harga-input',
                                    'style' => 'width: 100%; padding: 6px;'
                                ]) ?>
                            </td>
                            <td>
                                <?= $this->Form->control('items[0][jumlah_produk]', [
                                    'type' => 'number',
                                    'value' => 1,
                                    'label' => false,
                                    'class' => 'jumlah-input',
                                    'style' => 'width: 100%; padding: 6px;'
                                ]) ?>
                            </td>
                            <td>
                                <?= $this->Form->control('items[0][total]', [
                                    'type' => 'number',
                                    'label' => false,
                                    'readonly' => true,
                                    'class' => 'total-input',
                                    'style' => 'width: 100%; padding: 6px;'
                                ]) ?>
                            </td>
                            <td>
                                <button type="button" class="btn-hapus button alert" style="padding: 6px 10px; background-color: #d9534f; color: white; border: none; cursor: pointer;">X</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <br>
                <!-- Tombol Tambah Baris Produk -->
                <button type="button" id="btn-tambah-baris" class="button" style="margin-bottom: 20px;">+ Tambah Produk</button>

                <!-- Tampilan Grand Total Keseluruhan -->
                <div style="text-align: right; font-size: 18px; font-weight: bold; margin-top: 15px;">
                    Total Keseluruhan (Grand Total): <span id="grand-total">0</span>
                </div>

            </fieldset>
            <br>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- Skrip JavaScript untuk Dinamis Row dan Kalkulasi Grand Total -->
<script>
    const produkData = <?= json_encode($produkData) ?>;
    const produkOptions = <?= json_encode($produkList) ?>;
    let rowIndex = 1;

    function hitungBarisDanGrandTotal() {
        let grandTotal = 0;

        document.querySelectorAll('.produk-row').forEach(row => {
            const select = row.querySelector('.produk-select');
            const hargaInput = row.querySelector('.harga-input');
            const jumlahInput = row.querySelector('.jumlah-input');
            const totalInput = row.querySelector('.total-input');

            const produkId = select.value;
            let harga = 0;

            if (produkId && produkData[produkId]) {
                harga = parseFloat(produkData[produkId].harga) || 0;
            }

            hargaInput.value = harga;

            const jumlah = parseFloat(jumlahInput.value) || 0;
            const total = harga * jumlah;
            totalInput.value = total;

            grandTotal += total;
        });

        document.getElementById('grand-total').innerText = grandTotal.toLocaleString('id-ID');
    }

    // Event Listener untuk perubahan input pada tabel
    document.getElementById('tabel-produk').addEventListener('input', hitungBarisDanGrandTotal);
    document.getElementById('tabel-produk').addEventListener('change', hitungBarisDanGrandTotal);

    // Tombol Tambah Baris
    document.getElementById('btn-tambah-baris').addEventListener('click', function () {
        const tbody = document.getElementById('tbody-produk');
        
        let optionsHtml = '<option value="">-- Pilih Produk --</option>';
        for (const [id, nama] of Object.entries(produkOptions)) {
            optionsHtml += `<option value="${id}">${nama}</option>`;
        }

        const newRow = document.createElement('tr');
        newRow.classList.add('produk-row');
        newRow.innerHTML = `
            <td>
                <select name="items[${rowIndex}][produk_id]" class="produk-select" style="width: 100%; padding: 6px;">
                    ${optionsHtml}
                </select>
            </td>
            <td>
                <input type="number" name="items[${rowIndex}][harga]" class="harga-input" readonly style="width: 100%; padding: 6px;">
            </td>
            <td>
                <input type="number" name="items[${rowIndex}][jumlah_produk]" value="1" class="jumlah-input" style="width: 100%; padding: 6px;">
            </td>
            <td>
                <input type="number" name="items[${rowIndex}][total]" class="total-input" readonly style="width: 100%; padding: 6px;">
            </td>
            <td>
                <button type="button" class="btn-hapus button alert" style="padding: 6px 10px; background-color: #d9534f; color: white; border: none; cursor: pointer;">X</button>
            </td>
        `;

        tbody.appendChild(newRow);
        rowIndex++;
    });

    // Tombol Hapus Baris
    document.getElementById('tabel-produk').addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-hapus')) {
            const rows = document.querySelectorAll('.produk-row');
            if (rows.length > 1) {
                e.target.closest('tr').remove();
                hitungBarisDanGrandTotal();
            } else {
                alert('Minimal harus ada 1 produk!');
            }
        }
    });
</script>