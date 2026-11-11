<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produk $produkEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Produk'), ['action' => 'edit', $produkEntity->id_produk], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Produk'), ['action' => 'delete', $produkEntity->id_produk], ['confirm' => __('Are you sure you want to delete # {0}?', $produkEntity->id_produk), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Produk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Produk'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="produk view content">
            <h3><?= h($produkEntity->nama_produk) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nama Produk') ?></th>
                    <td><?= h($produkEntity->nama_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Produk') ?></th>
                    <td><?= $this->Number->format($produkEntity->id_produk) ?></td>
                </tr>
                <tr>
                    <th><?= __('Harga') ?></th>
                    <td><?= $this->Number->format($produkEntity->harga) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stok') ?></th>
                    <td><?= $this->Number->format($produkEntity->stok) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>