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
                        <div class="easy-pie main-pie" data-percent="<?= $click_download / $clicks * 100 ?>">
                            <div class="percent"><?= $this->Number->shorten($click_download) ?></div>
                            <div class="pie-title"><?= __('Download clicks') ?></div>
                        </div>
                    </div>

                    <div class="p-t-25 p-b-20 text-center">
                        <div class="easy-pie sub-pie-1" data-percent="<?= $click_convert / $clicks * 100 ?>">
                            <div class="percent"><?= $this->Number->shorten($click_convert) ?></div>
                            <div class="pie-title"><?= __('Convert clicks') ?></div>
                        </div>
                        <div class="easy-pie sub-pie-2" data-percent="<?= $click_play / $clicks * 100 ?>">
                            <div class="percent"><?= $this->Number->shorten($click_play) ?></div>
                            <div class="pie-title"><?= __('Play clicks') ?></div>
                        </div>
                        <div class="easy-pie sub-pie-2" data-percent="<?= $click_search / $clicks * 100 ?>">
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
                <h2><?= __('Top search') ?></h2>
            </div>

            <div class="card-body m-t-0">
                <table class="table table-inner table-vmiddle">
                    <thead>
                        <tr>
                            <th><?= __('Query') ?></th>
                            <th><?= __('Count') ?></th>
                            <th><?= __('Last search') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($top_search)):foreach($top_search as $v): ?>
                            <tr>
                                <td><?= $v->query ?></td>
                                <td><?= $v->n ?></td>
                                <td><?= $v->add_date ?></td>
                            </tr>
                        <?php endforeach;endif; ?>
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
;+function() {
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

    function sparklineBar(el, values, barWidth) {
        $(el).sparkline(values, {
            type: "bar",
            height: 35,
            barWidth: barWidth,
            barColor: "#d6d8d9",
            barSpacing: 2
        })
    }

    function sparklineLine(el, values, width, height = 35) {
        $(el).sparkline(values, {
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

    sparklineBar(
        $(".stats-bar")[0],
        <?= json_encode($chart_downloads) ?>, 
        <?= ceil(42 / count($chart_downloads)) ?>, 
    );

    sparklineLine(
        $(".stats-line")[0],
        <?= json_encode($chart_plays) ?>, 
        68
    )

    sparklineBar(
        $(".stats-bar-2")[0],
        <?= json_encode($unique_downloads) ?>,  
        <?= ceil(42 / count($unique_downloads)) ?>
    )

    sparklineLine(
        $(".stats-line-2")[0],
        <?= json_encode($unique_plays) ?>, 
        68, 
    )

     sparklineLine(
        $(".dash-widget-visits")[0],
        <?= json_encode($views_month) ?>, 
        "100%",
        68
    )

    sparklineBar(
        $(".stats-bar")[1],
        <?= json_encode($last_views) ?>, 
        <?= ceil(42 / count($last_views)) ?>, 
    )

    sparklineBar(
        $(".stats-bar-2")[1],
        <?= json_encode($last_visitors) ?>,  
        <?= ceil(42 / count($last_visitors)) ?>
    )    
}()

</script>

<?= $this->end() ?>