<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Register $registerEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Register'), ['action' => 'edit', $registerEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Register'), ['action' => 'delete', $registerEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registerEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Register'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Register'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="register view content">
            <h3><?= h($registerEntity->nama) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nama') ?></th>
                    <td><?= h($registerEntity->nama) ?></td>
                </tr>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($registerEntity->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($registerEntity->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($registerEntity->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>