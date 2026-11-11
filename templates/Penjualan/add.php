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
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan form content">
            <?= $this->Form->create($penjualanEntity) ?>
            <fieldset>
                <legend><?= __('Add Penjualan') ?></legend>
                <?php
                    echo $this->Form->control('tanggal_penjualan');
                    echo $this->Form->control('nama_produk');
                    echo $this->Form->control('jumlah_produk');
                    echo $this->Form->control('total');
                    echo $this->Form->control('id_pelanggan');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
