<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Skill</span>Passport</a>
        </div>
        <div class="top-nav-links"><div class="top-nav-links">
            <?php 
            // Cek apakah user sudah login melalui session Auth
            $authIdentity = $this->getRequest()->getAttribute('identity'); 
            
            if ($authIdentity): 
            ?>
                <!-- Jika SUDAH Login: Tampilkan nama user (opsional) dan tombol Logout saja -->
                <span style="margin-right: 10px; font-weight: bold; color: #333;">
                    <?= h($authIdentity->username ?? 'User') ?>
                </span>
                <?= $this->Html->link('Logout ⍈', ['controller' => 'Users', 'action' => 'logout'], ['confirm' => 'Apakah Anda yakin ingin keluar?']) ?>
            <?php else: ?>
                <!-- Jika BELUM Login: Tampilkan Login dan Register -->
                <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?> | 
                <?= $this->Html->link('Register', ['controller' => 'Users', 'action' => 'add']) ?>
            <?php endif; ?>
        </div>
        
    </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
</body>
</html>
