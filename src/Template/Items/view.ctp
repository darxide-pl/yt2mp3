<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Downloads'), ['controller' => 'ItemDownloads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Download'), ['controller' => 'ItemDownloads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($item->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($item->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link Hash') ?></th>
            <td><?= $this->Number->format($item->link_hash) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add Date') ?></th>
            <td><?= h($item->add_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Item Downloads') ?></h4>
        <?php if (!empty($item->item_downloads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Add Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->item_downloads as $itemDownloads): ?>
            <tr>
                <td><?= h($itemDownloads->id) ?></td>
                <td><?= h($itemDownloads->item_id) ?></td>
                <td><?= h($itemDownloads->add_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ItemDownloads', 'action' => 'view', $itemDownloads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItemDownloads', 'action' => 'edit', $itemDownloads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItemDownloads', 'action' => 'delete', $itemDownloads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemDownloads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
