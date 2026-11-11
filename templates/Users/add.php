<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form content">
    <?= $this->Flash->render() ?>
    <h3>Registrasi Pengguna Baru</h3>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Silakan isi data diri Anda') ?></legend>
        <?php
            echo $this->Form->control('username', ['required' => true]);
            echo $this->Form->control('password', ['required' => true, 'type' => 'password']);
            echo $this->Form->control('role', ['required' => true, 'options' => ['admin' => 'Admin', 'user' => 'User']]);
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Daftar Akun')); ?>
    <?= $this->Form->end() ?>
</div>
