<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Item Downloads'), ['controller' => 'ItemDownloads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Download'), ['controller' => 'ItemDownloads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->control('add_date');
            echo $this->Form->control('title');
            echo $this->Form->control('link');
            echo $this->Form->control('link_hash');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
