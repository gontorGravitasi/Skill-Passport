<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Penjualan> $penjualan
 */
?>
<div class="penjualan index content">
    <?= $this->Html->link(__('New Penjualan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Penjualan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_penjualan') ?></th>
                    <th><?= $this->Paginator->sort('tanggal_penjualan') ?></th>
                    <th><?= $this->Paginator->sort('nama_produk') ?></th>
                    <th><?= $this->Paginator->sort('jumlah_produk') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('id_pelanggan') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualan as $penjualanEntity): ?>
                <tr>
                    <td><?= $this->Number->format($penjualanEntity->id_penjualan) ?></td>
                    <td><?= h($penjualanEntity->tanggal_penjualan) ?></td>
                    <td><?= h($penjualanEntity->nama_produk) ?></td>
                    <td><?= $this->Number->format($penjualanEntity->jumlah_produk) ?></td>
                    <td><?= $this->Number->format($penjualanEntity->total) ?></td>
                    <td><?= $this->Number->format($penjualanEntity->id_pelanggan) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $penjualanEntity->id_penjualan]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $penjualanEntity->id_penjualan]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $penjualanEntity->id_penjualan],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $penjualanEntity->id_penjualan),
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