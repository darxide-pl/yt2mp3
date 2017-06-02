<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>yt2mp3</title>
    <meta name="description" content="Youtube to mp3 converter" />

    <!-- Vendor CSS -->
    <link href="/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet">
    <link href="/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
    <link href="/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/vendors/select2/select2.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">
        

    <link href="/css/app_1.min.css" rel="stylesheet">
    <link href="/css/app_2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Element('header') ?>

    <section id="main" class="<?= $this->request->params['action'] == 'view' ? 'short' : '' ?>" data-layout="layout-1">
        <?= $this->fetch('breadcrumbs') ?>
        <?= $this->Element('sidebar') ?>
        <section id="content">
            <div class="container">
                <?= $this->fetch('content') ?>
            </div>
        </section>
    </section>


    <footer id="footer">
        Copyright &copy; 2017 <?= date('Y') > 2017 ? '- '.date('Y') : '' ?> <a href="http://www.dariuszm.pl">dariuszm.pl</a>
        
        <ul class="f-menu">
            <li><a href="<?= $this->Url->build('/') ?>"><?= __('Download') ?></a></li>
            <li><a href="<?= $this->Url->build(['controller' => 'Search', 'action' => 'index']) ?>"><?= __('Search') ?></a></li>
            <li>
                <a href="<?= $this->Url->build(['controller' => 'Top', 'action' => 'index']) ?>"><?= __('Top') ?></a>
            </li>
        </ul>
    </footer>    

    <script src="/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>        
    <script src="/vendors/bower_components/Waves/dist/waves.min.js"></script>
    <script src="/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
    <script src="/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

    <?= $this->fetch('bottom') ?>  

    <script src="/js/app.min.js"></script>
    <script src="/js/main.js"></script>    
</body>
</html>
