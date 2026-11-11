<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DetailPenjualan $detailPenjualanEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Detail Penjualan'), ['action' => 'edit', $detailPenjualanEntity->id_detail], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Detail Penjualan'), ['action' => 'delete', $detailPenjualanEntity->id_detail], ['confirm' => __('Are you sure you want to delete # {0}?', $detailPenjualanEntity->id_detail), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Detail Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Detail Penjualan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="detailPenjualan view content">
            <h3><?= h($detailPenjualanEntity->nama_produk) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nama Produk') ?></th>
                    <td><?= h($detailPenjualanEntity->nama_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Detail') ?></th>
                    <td><?= $this->Number->format($detailPenjualanEntity->id_detail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Penjualan') ?></th>
                    <td><?= $this->Number->format($detailPenjualanEntity->id_penjualan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Produk') ?></th>
                    <td><?= $this->Number->format($detailPenjualanEntity->id_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jumlah Produk') ?></th>
                    <td><?= $this->Number->format($detailPenjualanEntity->jumlah_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subtotal') ?></th>
                    <td><?= $this->Number->format($detailPenjualanEntity->subtotal) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>