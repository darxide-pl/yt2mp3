<header id="header" class="clearfix <?= $this->Filter->get('query') ? 'search-toggled' : '' ?>">
    <ul class="h-inner">
        <li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
            <div class="line-wrap">
                <div class="line top"></div>
                <div class="line center"></div>
                <div class="line bottom"></div>
            </div>
        </li>

        <li class="hidden-xs">
            <a href="<?= $this->Url->build('/') ?>" class="p-l-10 brand">
                yt2mp3
            </a>
        </li>

        <li class="pull-right">
            <ul class="hi-menu">

                <li data-ma-action="search-open">
                    <a href="#"><i class="him-icon zmdi zmdi-search"></i></a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Top Search Content -->
    <div class="h-search-wrap">
        <div class="hsw-inner">
            <i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
            <form method="get" action="<?= $this->Url->build(['controller' => 'Search', 'action' => 'index']) ?>">
                <input type="text" name="filter[query]" placeholder="<?= h(__('Szukaj w youtube')) ?>" value="<?= h($this->Filter->get('query')) ?>" />    
            </form>
        </div>
    </div>
</header>