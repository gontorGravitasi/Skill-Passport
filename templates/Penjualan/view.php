<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualanEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Penjualan'), ['action' => 'edit', $penjualanEntity->id_penjualan], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Penjualan'), ['action' => 'delete', $penjualanEntity->id_penjualan], ['confirm' => __('Are you sure you want to delete # {0}?', $penjualanEntity->id_penjualan), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Penjualan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan view content">
            <h3><?= h($penjualanEntity->nama_produk) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nama Produk') ?></th>
                    <td><?= h($penjualanEntity->nama_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Penjualan') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->id_penjualan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Jumlah Produk') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->jumlah_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Pelanggan') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->id_pelanggan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tanggal Penjualan') ?></th>
                    <td><?= h($penjualanEntity->tanggal_penjualan) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>