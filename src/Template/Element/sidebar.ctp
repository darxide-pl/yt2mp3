<aside id="sidebar" class="sidebar c-overflow">
    <ul class="main-menu">
        <li>
            <a href="<?= $this->Url->build('/') ?>">
                <i class="zmdi zmdi-download"></i> <?= __('Download') ?>
            </a>
        </li>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'Search', 'action' => 'index']) ?>">
                <i class="zmdi zmdi-search"></i>
                <?= __('Search') ?>
            </a>
        </li>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'Top', 'action' => 'index']) ?>">
                <i class="zmdi zmdi-star"></i>
                <?= __('Top') ?>
            </a>
        </li>   
    </ul>
</aside>