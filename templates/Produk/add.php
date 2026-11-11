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
            <?= $this->Html->link(__('List Produk'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="produk form content">
            <?= $this->Form->create($produkEntity) ?>
            <fieldset>
                <legend><?= __('Add Produk') ?></legend>
                <?php
                    echo $this->Form->control('nama_produk');
                    echo $this->Form->control('harga');
                    echo $this->Form->control('stok');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
