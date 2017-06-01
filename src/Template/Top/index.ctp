<div class="card">
    <div class="card-header">
        <h2><?= __('Top downloads') ?></h2>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <h4 class="m-l-25"><?= __('Last month') ?></h4>
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= __('title') ?></th>
                            <th><?= __('downloads') ?></th>
                            <th><?= __('duration') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($dw_month)):foreach($dw_month as $k => $v): ?>
                            <tr>
                                <td><?= $k+1 ?></td>
                                <td><?= $v->title ?></td>
                                <td><?= $v->t1['n'] ?></td>
                                <td><?= $this->Time->format($v->length) ?></td>
                            </tr>
                        <?php endforeach;endif; ?>
                    </tbody>
                </table>
            </div>            
        </div>
        <div class="col-lg-4">
            <h4 class="m-l-25"><?= __('Last year') ?></h4>
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= __('title') ?></th>
                            <th><?= __('downloads') ?></th>
                            <th><?= __('duration') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($dw_year)):foreach($dw_year as $k => $v): ?>
                            <tr>
                                <td><?= $k+1 ?></td>
                                <td><?= $v->title ?></td>
                                <td><?= $v->t1['n'] ?></td>
                                <td><?= $this->Time->format($v->length) ?></td>
                            </tr>
                        <?php endforeach;endif; ?>
                    </tbody>
                </table>
            </div>       
        </div>        
        <div class="col-lg-4">
            <h4 class="m-l-25"><?= __('All time') ?></h4>
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= __('title') ?></th>
                            <th><?= __('downloads') ?></th>
                            <th><?= __('duration') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($dw_all)):foreach($dw_all as $k => $v): ?>
                            <tr>
                                <td><?= $k+1 ?></td>
                                <td><?= $v->title ?></td>
                                <td><?= $v->t1['n'] ?></td>
                                <td><?= $this->Time->format($v->length) ?></td>
                            </tr>
                        <?php endforeach;endif; ?>
                    </tbody>
                </table>
            </div>       
        </div>         
    </div>
</div>  

<div class="card">
    <div class="card-header">
        <h2><?= __('Top views') ?></h2>
    </div>
    
    <div class="row">
        <div class="col-lg-4">
            <h4 class="m-l-25"><?= __('Last month') ?></h4>
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= __('title') ?></th>
                            <th><?= __('views') ?></th>
                            <th><?= __('duration') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($v_month)):foreach($v_month as $k => $v): ?>
                            <tr>
                                <td><?= $k+1 ?></td>
                                <td><?= $v->title ?></td>
                                <td><?= $v->t1['n'] ?></td>
                                <td><?= $this->Time->format($v->length) ?></td>
                            </tr>
                        <?php endforeach;endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>
        <div class="col-lg-4">
            <h4 class="m-l-25"><?= __('Last year') ?></h4>
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= __('title') ?></th>
                            <th><?= __('views') ?></th>
                            <th><?= __('duration') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($v_year)):foreach($v_year as $k => $v): ?>
                            <tr>
                                <td><?= $k+1 ?></td>
                                <td><?= $v->title ?></td>
                                <td><?= $v->t1['n'] ?></td>
                                <td><?= $this->Time->format($v->length) ?></td>
                            </tr>
                        <?php endforeach;endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>
        <div class="col-lg-4">
            <h4 class="m-l-25"><?= __('All time') ?></h4>
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= __('title') ?></th>
                            <th><?= __('views') ?></th>
                            <th><?= __('duration') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($v_all)):foreach($v_all as $k => $v): ?>
                            <tr>
                                <td><?= $k+1 ?></td>
                                <td><?= $v->title ?></td>
                                <td><?= $v->t1['n'] ?></td>
                                <td><?= $this->Time->format($v->length) ?></td>
                            </tr>
                        <?php endforeach;endif; ?>
                    </tbody>
                </table>
            </div> 
        </div>                
    </div>
</div>