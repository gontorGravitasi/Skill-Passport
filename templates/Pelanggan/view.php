<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pelanggan $pelangganEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pelanggan'), ['action' => 'edit', $pelangganEntity->id_pelanggan], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pelanggan'), ['action' => 'delete', $pelangganEntity->id_pelanggan], ['confirm' => __('Are you sure you want to delete # {0}?', $pelangganEntity->id_pelanggan), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pelanggan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pelanggan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pelanggan view content">
            <h3><?= h($pelangganEntity->nama) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nama') ?></th>
                    <td><?= h($pelangganEntity->nama) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nomor') ?></th>
                    <td><?= h($pelangganEntity->nomor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Pelanggan') ?></th>
                    <td><?= $this->Number->format($pelangganEntity->id_pelanggan) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Alamat') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pelangganEntity->alamat)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>