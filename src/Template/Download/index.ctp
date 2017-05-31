<div class="card">
    <div class="card-header">
        <h2><?= __('Paste youtube link and click convert!') ?></h2>
    </div>
    
    <div class="card-body card-padding">
        <form role="form" class="__download" action="" method="post">
            <div class="form-group fg-line">
                <input type="text" name="link" class="form-control input-sm" id="link" placeholder="<?= __('Paste link here') ?>">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="" checked="" disabled="" />
                    <i class="input-helper"></i>
                    MP3
                </label>
            </div>
            
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

<div class="row m-t-25">
    <div class="col-lg-5 col-md-6 col-lg-offset-1">
        <h4 class="m-b-15"><?= __('Latest downloads') ?></h4>
        <?php if(count($last)):foreach($last as $v): ?>
            <div class="bs-item z-depth-2 youtube-item">
                <div class="youtube-item__image" style="background-image: url('https://i1.ytimg.com/vi/<?= $v->link ?>/0.jpg')">
                    <span class="label label-warning youtube-item__label">
                        <?= $this->Time->format($v->length) ?>
                    </span>
                </div>
                <div class="youtube-item__content">
                    <div class="youtube-item__title">
                        <?= $v->title ?>
                        <form method="post" class="__download">
                            <input type="hidden" name="link" value="https://www.youtube.com/watch?v=<?= $v->link ?>" />
                            <a href="https://www.youtube.com/watch?v=<?= $v->link ?>" class="btn btn-sm btn-danger waves-effect m-t-10" target="_blank">
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
        <?php endforeach;endif; ?>
    </div>
    <div class="col-lg-5 col-md-6">
        <h4 class="m-b-15"><?= __('Top downloads') ?></h4>
        <?php if(count($top)):foreach($top as $v): ?>
            <div class="bs-item z-depth-2 youtube-item">
                <div class="youtube-item__image" style="background-image: url('https://i1.ytimg.com/vi/<?= $v->link ?>/0.jpg')">
                    <span class="label label-warning youtube-item__label">
                        <?= $this->Time->format($v->length) ?>
                    </span>
                </div>
                <div class="youtube-item__content">
                    <div class="youtube-item__title">
                        <?= $v->title ?>
                        <form method="post" class="__download">
                            <input type="hidden" name="link" value="https://www.youtube.com/watch?v=<?= $v->link ?>" />
                            <a href="https://www.youtube.com/watch?v=<?= $v->link ?>" class="btn btn-sm btn-danger waves-effect m-t-10" target="_blank">
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
        <?php endforeach;endif; ?>
    </div>
</div>