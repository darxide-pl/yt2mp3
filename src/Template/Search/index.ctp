<div class="card">
    <div class="card-header">
        <h2><?= __('Search for music on Youtube and download!') ?></h2>
    </div>
    
    <div class="card-body card-padding">
        <form role="form" class="__search" action="" method="post">
            <div class="form-group fg-line">
                <input type="text" name="query" value="<?= h($this->Filter->get('query')) ?>" class="form-control input-sm" id="link" placeholder="<?= __('Search') ?>">
            </div>
            
            <button type="submit" class="btn bgm-teal waves-effect btn-sm m-t-10">
                <?= __('search') ?>
            </button>
        </form>
    </div>
</div>

<div class="row m-t-25">
    <div class="col-md-6 col-md-offset-3">
        <div class="__results"></div>
    </div>
</div>

<div class="template hidden">
    <div class="bs-item z-depth-1 youtube-item" data-link="{{id}}">
        <div class="youtube-item__image" style="background-image: url('{{thumb}}')">
            <span class="label label-warning youtube-item__label">{{time}}</span>            
        </div>
        <div class="youtube-item__content">
            <div class="youtube-item__title">{{title}}</div>
            <form method="post" class="__download">
                <input type="hidden" name="link" value="https://www.youtube.com/watch?v={{id}}" />
                <a href="https://www.youtube.com/watch?v={{id}}" class="btn btn-sm btn-danger waves-effect m-t-10 __play __not-register" target="_blank">
                    <i class="zmdi zmdi-play"></i>
                </a>
                <button type="submit" class="btn bgm-teal waves-effect btn-sm m-t-10">
                    <?= __('convert') ?>
                </button>
                <a href="" target="_blank" class="btn btn-sm btn-warning hidden __save waves-effect m-t-10">
                    <i class="zmdi zmdi-download"></i>
                    <?= __('download') ?>
                </a>                            
            </form>
        </div>
    </div>    
</div>

<div class="template-2 hidden">
    <button data-page="{{page}}" class="btn btn-page btn-default btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-arrow-back"></i></button>    
</div>

<div class="template-3 hidden">
    <button data-page="{{page}}" class="btn btn-page btn-default btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-arrow-forward"></i></button>    
</div>