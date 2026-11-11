<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pelanggan> $pelanggan
 */
?>
<div class="pelanggan index content">
    <?= $this->Html->link(__('New Pelanggan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pelanggan') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_pelanggan') ?></th>
                    <th><?= $this->Paginator->sort('nama') ?></th>
                    <th><?= $this->Paginator->sort('nomor') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelanggan as $pelangganEntity): ?>
                <tr>
                    <td><?= $this->Number->format($pelangganEntity->id_pelanggan) ?></td>
                    <td><?= h($pelangganEntity->nama) ?></td>
                    <td><?= h($pelangganEntity->nomor) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pelangganEntity->id_pelanggan]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pelangganEntity->id_pelanggan]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $pelangganEntity->id_pelanggan],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $pelangganEntity->id_pelanggan),
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