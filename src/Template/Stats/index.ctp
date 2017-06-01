<div class="block-header">
    <h2><?= __('Stats') ?></h2>
</div>

<div class="card">
    <div class="card-header">
        <h2><?= __('Download traffic') ?></h2>
        <small><?= __('Total: {0}' , [$this->Number->toReadableSize($total_mb)]) ?></small>
    </div>

    <div class="card-body">
        <div class="chart-edge">
            <div id="curved-line-chart" class="flot-chart "></div>
        </div>
    </div>
</div>

<div class="mini-charts">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item">
                <div class="clearfix">
                    <div class="chart stats-bar"></div>
                    <div class="count">
                        <small><?= __('Total downloads') ?></small>
                        <h2><?= $total_dw ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item">
                <div class="clearfix">
                    <div class="chart stats-line"></div>
                    <div class="count">
                        <small><?= __('Total plays') ?></small>
                        <h2><?= $total_pl ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item">
                <div class="clearfix">
                    <div class="chart stats-bar-2"></div>
                    <div class="count">
                        <small>Website Impressions</small>
                        <h2>356,785K</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item card">
                <div class="clearfix">
                    <div class="chart stats-line-2"></div>
                    <div class="count">
                        <small>Support Tickets</small>
                        <h2>23,856</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="dash-widgets">
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div id="site-visits" class="dash-widget-item">
                <div class="dw-item">
                    <div class="dwi-header">
                        <div class="p-30">
                            <div class="dash-widget-visits"></div>
                        </div>

                        <div class="dwih-title">For the past 30 days</div>
                    </div>

                    <div class="list-group lg-even-white">
                        <div class="list-group-item media sv-item">
                            <div class="pull-right">
                                <div class="stats-bar"></div>
                            </div>
                            <div class="media-body">
                                <small>Page Views</small>
                                <h3>47,896,536</h3>
                            </div>
                        </div>

                        <div class="list-group-item media sv-item">
                            <div class="pull-right">
                                <div class="stats-bar-2"></div>
                            </div>
                            <div class="media-body">
                                <small>Site Visitors</small>
                                <h3>24,456,799</h3>
                            </div>
                        </div>

                        <div class="list-group-item media sv-item">
                            <div class="pull-right">
                                <div class="stats-line"></div>
                            </div>
                            <div class="media-body">
                                <small>Total Clicks</small>
                                <h3>13,965</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div id="pie-charts" class="dash-widget-item">
                <div class="dw-item">
                    <div class="dwi-header">
                        <div class="dwih-title">Email Statistics</div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="text-center p-20 m-t-25">
                        <div class="easy-pie main-pie" data-percent="75">
                            <div class="percent">45</div>
                            <div class="pie-title">Total Emails Sent</div>
                        </div>
                    </div>

                    <div class="p-t-25 p-b-20 text-center">
                        <div class="easy-pie sub-pie-1" data-percent="56">
                            <div class="percent">56</div>
                            <div class="pie-title">Bounce Rate</div>
                        </div>
                        <div class="easy-pie sub-pie-2" data-percent="84">
                            <div class="percent">84</div>
                            <div class="pie-title">Total Opened</div>
                        </div>
                        <div class="easy-pie sub-pie-2" data-percent="21">
                            <div class="percent">21</div>
                            <div class="pie-title">Total Ignored</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="dw-item">
                <div id="weather-widget"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <!-- Recent Items -->
        <div class="card">
            <div class="card-header">
                <h2>Recent Items <small>Phasellus condimentum ipsum id auctor imperdie</small></h2>
                <ul class="actions">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="#">Refresh</a>
                            </li>
                            <li>
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="#">Other Settings</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="card-body m-t-0">
                <table class="table table-inner table-vmiddle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th style="width: 60px">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="f-500">2569</td>
                            <td>Samsung Galaxy Mega</td>
                            <td class="f-500">$521</td>
                        </tr>
                        <tr>
                            <td class="f-500">9658</td>
                            <td>Huawei Ascend P6</td>
                            <td class="f-500">$440</td>
                        </tr>
                        <tr>
                            <td class="f-500">1101</td>
                            <td>HTC One M8</td>
                            <td class="f-500">$680</td>
                        </tr>
                        <tr>
                            <td class="f-500">6598</td>
                            <td>Samsung Galaxy Alpha</td>
                            <td class="f-500">$870</td>
                        </tr>
                        <tr>
                            <td class="f-500">4562</td>
                            <td>LG G3</td>
                            <td class="f-500">$690</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="recent-items-chart" class="flot-chart"></div>
        </div>

        <!-- Todo -->
        <div id="todo" class="card">
            <div class="card-header ch-alt">
                <h2>Todo Lists <small>Add, edit and manage your Todo Lists</small></h2>
            </div>

            <div class="card-body card-padding">
                <div class="t-add">
                    <i class="ta-btn zmdi zmdi-plus" data-ma-action="todo-form-open"></i>

                    <div class="ta-block">
                        <textarea placeholder="What you want to do..."></textarea>

                        <div class="tab-actions">
                            <a data-ma-action="todo-form-close" href="#"><i class="zmdi zmdi-close"></i></a>
                            <a data-ma-action="todo-form-close" href="#"><i class="zmdi zmdi-check"></i></a>
                        </div>
                    </div>
                </div>

                <div class="list-group">
                    <div class="list-group-item media">
                        <div class="pull-right">
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Delete</a></li>
                                        <li><a href="#">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <div class="checkbox checkbox-light">
                                <label>
                                    <input type="checkbox">
                                    <i class="input-helper"></i>
                                    <span>
                                        Duis vitae nibh molestie pharetra augue vitae
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item media">
                        <div class="pull-right">
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Delete</a></li>
                                        <li><a href="#">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <div class="checkbox checkbox-light">
                                <label>
                                    <input type="checkbox">
                                    <i class="input-helper"></i>
                                    <span>
                                        Duis vitae nibh molestie pharetra augue vitae
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item media">
                        <div class="pull-right">
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Delete</a></li>
                                        <li><a href="#">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <div class="checkbox checkbox-light">
                                <label>
                                    <input type="checkbox">
                                    <i class="input-helper"></i>
                                    <span>
                                        In vel imperdiet leoorbi mollis leo sit amet quam fringilla varius mauris orci turpis
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item media">
                        <div class="pull-right">
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Delete</a></li>
                                        <li><a href="#">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <div class="checkbox checkbox-light">
                                <label>
                                    <input type="checkbox">
                                    <i class="input-helper"></i>
                                    <span>
                                        Suspendisse quis sollicitudin erosvel dictum nunc
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item media">
                        <div class="pull-right">
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Delete</a></li>
                                        <li><a href="#">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <div class="checkbox checkbox-light">
                                <label>
                                    <input type="checkbox">
                                    <i class="input-helper"></i>
                                    <span>
                                        Curabitur egestas finibus sapien quis faucibusras bibendum ut justo at sagittis. In hac habitasse platea dictumst
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item media">
                        <div class="pull-right">
                            <ul class="actions">
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Delete</a></li>
                                        <li><a href="#">Archive</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="media-body">
                            <div class="checkbox checkbox-light">
                                <label>
                                    <input type="checkbox">
                                    <i class="input-helper"></i>
                                    <span>
                                        Suspendisse potenti. Cras dolor augue, tincidunt sit amet lorem id, blandit rutrum libero
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->start('bottom') ?>
<script src="/vendors/bower_components/flot/jquery.flot.js"></script>
<script src="/vendors/bower_components/flot/jquery.flot.resize.js"></script>
<script src="/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
<script src="/vendors/sparklines/jquery.sparkline.min.js"></script>
<script src="/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<?= $this->end() ?>