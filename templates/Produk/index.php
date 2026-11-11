<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Produk> $produk
 */
?>
<div class="produk index content">
    <?= $this->Html->link(__('New Produk'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Produk') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_produk') ?></th>
                    <th><?= $this->Paginator->sort('nama_produk') ?></th>
                    <th><?= $this->Paginator->sort('harga') ?></th>
                    <th><?= $this->Paginator->sort('stok') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $produkEntity): ?>
                <tr>
                    <td><?= $this->Number->format($produkEntity->id_produk) ?></td>
                    <td><?= h($produkEntity->nama_produk) ?></td>
                    <td><?= $this->Number->format($produkEntity->harga) ?></td>
                    <td><?= $this->Number->format($produkEntity->stok) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $produkEntity->id_produk]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produkEntity->id_produk]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $produkEntity->id_produk],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $produkEntity->id_produk),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>