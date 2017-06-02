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
            <canvas class="js-chartjs-lines"></canvas>
        </div>
    </div>
</div>

<div class="mini-charts">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item">
                <div class="clearfix relative">
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
                <div class="clearfix relative">
                    <div class="chart stats-line"></div>
                    <div class="count">
                        <small><?= __('Total plays') ?></small>
                        <h2><?= $this->Number->format($total_pl) ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item">
                <div class="clearfix relative">
                    <div class="chart stats-bar-2"></div>
                    <div class="count">
                        <small><?= __('Unique videos downloaded') ?></small>
                        <h2><?= $this->Number->format($total_udw) ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="mini-charts-item card">
                <div class="clearfix relative">
                    <div class="chart stats-line-2"></div>
                    <div class="count">
                        <small><?= __('Unique videos played') ?></small>
                        <h2><?= $this->Number->format($total_upl) ?></h2>
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

                        <div class="dwih-title"><?= __('Views in last 30 days') ?></div>
                    </div>

                    <div class="list-group lg-even-white">
                        <div class="list-group-item media sv-item">
                            <div class="pull-right">
                                <div class="stats-bar"></div>
                            </div>
                            <div class="media-body">
                                <small><?= __('Page Views') ?></small>
                                <h3><?= $this->Number->format($page_views) ?></h3>
                            </div>
                        </div>

                        <div class="list-group-item media sv-item">
                            <div class="pull-right">
                                <div class="stats-bar-2"></div>
                            </div>
                            <div class="media-body">
                                <small><?= __('Visitors') ?></small>
                                <h3><?= $this->Number->format($page_visitors) ?></h3>
                            </div>
                        </div>

                        <div class="list-group-item media sv-item">
                            <div class="pull-right">
                                <div class="stats-line"></div>
                            </div>
                            <div class="media-body">
                                <small><?= __('Total Clicks') ?></small>
                                <h3><?= $this->Number->format($clicks) ?></h3>
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
                        <div class="dwih-title"><?= __('Click stats') ?></div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="text-center p-20 m-t-25">
                        <div class="easy-pie main-pie" data-percent="75">
                            <div class="percent"><?= $this->Number->shorten($click_download) ?></div>
                            <div class="pie-title"><?= __('Download clicks') ?></div>
                        </div>
                    </div>

                    <div class="p-t-25 p-b-20 text-center">
                        <div class="easy-pie sub-pie-1" data-percent="56">
                            <div class="percent"><?= $this->Number->shorten($click_convert) ?></div>
                            <div class="pie-title"><?= __('Convert clicks') ?></div>
                        </div>
                        <div class="easy-pie sub-pie-2" data-percent="84">
                            <div class="percent"><?= $this->Number->shorten($click_play) ?></div>
                            <div class="pie-title"><?= __('Play clicks') ?></div>
                        </div>
                        <div class="easy-pie sub-pie-2" data-percent="21">
                            <div class="percent"><?= $this->Number->shorten($click_search) ?></div>
                            <div class="pie-title"><?= __('Search clicks') ?></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4 col-sm-6">
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

        </div>
    </div>
</div>

<?= $this->start('bottom') ?>
<script src="/vendors/bower_components/flot/jquery.flot.js"></script>
<script src="/vendors/bower_components/flot/jquery.flot.resize.js"></script>
<script src="/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
<script src="/vendors/sparklines/jquery.sparkline.min.js"></script>
<script src="/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

<script src="/vendors/chartjs/Chart.min.js"></script>

<script type="text/javascript">
var $globalOptions = {
    scaleFontFamily: "'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif",
    scaleFontColor: '#999',
    scaleFontStyle: '600',
    tooltipTitleFontFamily: "'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif",
    tooltipCornerRadius: 3,
    maintainAspectRatio: false,
    responsive: true, 
    scaleGridLineColor : 'rgba(0,0,0,0)',
    scaleShowVerticalLines: false, 
    scaleShowHorizontalLines: false,
    pointDot : false, 
    showScale : false, 
    tooltipTemplate : '<%if (label){%><%=label%>: <%}%><%= value %>MB'
};  

function sparklineBar(id, values, height, barWidth, barColor, barSpacing) {
    $("." + id).sparkline(values, {
        type: "bar",
        height: height,
        barWidth: barWidth,
        barColor: barColor,
        barSpacing: barSpacing
    })
}

function sparklineLine(id, values, width, height = 35) {
    $("." + id).sparkline(values, {
        type: "line",
        width: width,
        height: height,
        lineColor: '#fff',
        fillColor: 'rgba(0,0,0,0)',
        lineWidth: '#d6d8d9',
        spotColor: '#d6d8d9',
        spotRadius: 3,
        maxSpotColor: 'rgba(0,0,0,0)',
        minSpotColor: 'rgba(0,0,0,0)',        
        highlightSpotColor: '#fff',
        highlightLineColor: '#d6d8d9'
    })
}

var traffic = <?= json_encode($traffic) ?>

var $context  = jQuery('.js-chartjs-lines')[0].getContext('2d');
var $data = {
    labels: Object.keys(traffic),
    datasets: [
        {
            label: "<?= h(__('Traffic')) ?>",
            fillColor: '#d6d8d9',
            data: Object.values(traffic)
        },      
    ]
};
$chartLines = new Chart($context).Line($data, $globalOptions); 

$(".stats-bar")[0] && sparklineBar(
    "stats-bar", 
    <?= json_encode($chart_downloads) ?>, 
    "35px", 
    <?= ceil(42 / count($chart_downloads)) ?>, 
    "#d6d8d9", 
    2
);

$(".stats-line")[0] && sparklineLine(
    "stats-line", 
    <?= json_encode($chart_plays) ?>, 
    68
)

$(".stats-bar-2")[0] && sparklineBar(
    "stats-bar-2", 
    <?= json_encode($unique_downloads) ?>, 
    "35px", 
    <?= ceil(42 / count($unique_downloads)) ?>, 
    "#d6d8d9", 
    2
)

$(".stats-line-2")[0] && sparklineLine(
    "stats-line-2", 
    <?= json_encode($unique_plays) ?>, 
    68, 
)

$(".dash-widget-visits")[0] && sparklineLine(
    "dash-widget-visits", 
    <?= json_encode($views_month) ?>, 
    "100%",
    70
)

</script>

<?= $this->end() ?>