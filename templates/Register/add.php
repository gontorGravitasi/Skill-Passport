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
            <?= $this->Html->link(__('List Register'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="register form content">
            <?= $this->Form->create($registerEntity) ?>
            <fieldset>
                <legend><?= __('Add Register') ?></legend>
                <?php
                    echo $this->Form->control('nama');
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->select('role', ['administrator' => 'Administrator']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
