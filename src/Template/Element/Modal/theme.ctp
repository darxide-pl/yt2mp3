<div id="theme" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?= __('Change theme') ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= $this->Form->input('theme' , [
                            'label' => false, 
                            'type' => 'select', 
                            'options' => [
                                'dark' => 'dark', 
                                'light' => 'light'
                            ], 
                            'class' => 'form-control __theme', 
                            'default' => $this->Theme->get()
                    ]) ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= __('Close') ?></button>
            </div>
        </div>

    </div>
</div>