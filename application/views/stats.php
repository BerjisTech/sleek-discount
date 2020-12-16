<?php $duka = $shop . '.myshopify.com'; ?>
<div class="btn btn-primary" onclick="window.history.back();" style="display: table; position: absolute; top: 10px; right: 30px; z-index: 2000000;"><span class="entypo-home"> BACK</span></div>
<h2 style="margin-top: -10px; text-align: center;">General stats for <?php echo $shop; ?> offers</h2>
<script type="text/javascript">
    jQuery(document).ready(function() {
        // Sparkline Charts
        jQuery(".sales").sparkline([0,
            <?php
            foreach ($this->db->select('sum(price) as stat, date_format(from_unixtime(date), "%m") as month, date_format(from_unixtime(date), "%Y %m %d") as year')->where('shop', $duka)->where('type', 'purchase')->group_by('month')->order_by('year', 'asc')->get('stats')->result_array() as $fetch) {
                echo $fetch['stat'] . ',';
            }
            ?>
        ], {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#e8b51b',
            fillColor: '',
            lineWidth: 2,
            spotColor: '#344e86',
            minSpotColor: '#344e86',
            maxSpotColor: '#344e86',
            highlightSpotColor: '#344e86',
            highlightLineColor: '#30487b',
            spotRadius: 2,
            drawNormalOnTop: true
        });


        jQuery(".customer-reach").sparkline([0,
            <?php
            foreach ($this->db->select('count(stat_id) as stat, date_format(from_unixtime(date), "%m") as month, date_format(from_unixtime(date), "%Y %m %d") as year')->where('shop', $duka)->where('type', 'impression')->group_by('month')->order_by('year', 'asc')->get('stats')->result_array() as $fetch) {
                echo $fetch['stat'] . ',';
            }
            ?>
        ], {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#ec3b83',
            fillColor: '',
            lineWidth: 2,
            spotColor: '#344e86',
            minSpotColor: '#344e86',
            maxSpotColor: '#344e86',
            highlightSpotColor: '#344e86',
            highlightLineColor: '#30487b',
            spotRadius: 2,
            drawNormalOnTop: true
        });

        $(".monthly-sales").sparkline([0,
            <?php
            foreach ($this->db->select('sum(price) as stat, date_format(from_unixtime(date), "%m") as month, date_format(from_unixtime(date), "%Y %m %d") as year')->where('shop', $duka)->where('type', 'purchase')->group_by('month')->order_by('year', 'asc')->get('stats')->result_array() as $fetch) {
                echo $fetch['stat'] . ',';
            }
            ?>
        ], {
            type: 'bar',
            barColor: '#ff4e50',
            height: '55px',
            width: '100%',
            barWidth: 8,
            barSpacing: 1
        });

        jQuery(".all-time-sales").sparkline([0,
            <?php
            foreach ($this->db->select('sum(price) as stat, date_format(from_unixtime(date), "%m") as month, date_format(from_unixtime(date), "%Y %m %d") as year')->where('shop', $duka)->where('type', 'checkout')->group_by('month')->order_by('year', 'asc')->get('stats')->result_array() as $fetch) {
                echo $fetch['stat'] . ',';
            }
            ?>
        ], {
            type: 'line',
            width: '100%',
            height: '55',
            lineColor: '#00acd6',
            fillColor: '',
            lineWidth: 2,
            spotColor: '#344e86',
            minSpotColor: '#344e86',
            maxSpotColor: '#344e86',
            highlightSpotColor: '#344e86',
            highlightLineColor: '#30487b',
            spotRadius: 2,
            drawNormalOnTop: true
        });

        $('.inlinebar').sparkline('html', {
            type: 'bar',
            barColor: '#ff6264'
        });
        $('.inlinebar-2').sparkline('html', {
            type: 'bar',
            barColor: '#445982'
        });
        $('.inlinebar-3').sparkline('html', {
            type: 'bar',
            barColor: '#00b19d'
        });
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        // Line Charts
        var line_chart_demo = $("#line-chart-demo");
        var line_chart = Morris.Line({
            element: 'line-chart-demo',
            data: [
                <?php
                $gyear = date('Y');
                for ($month = 01; $month <= 12; $month++) {
                    if ($month == '01') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '02') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('28-' . $month . '-' . $gyear);
                    }
                    if ($month == '03') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '04') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('30-' . $month . '-' . $gyear);
                    }
                    if ($month == '05') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '06') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('30-' . $month . '-' . $gyear);
                    }
                    if ($month == '07') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '08') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '09') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('30-' . $month . '-' . $gyear);
                    }
                    if ($month == '10') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '11') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('30-' . $month . '-' . $gyear);
                    }
                    if ($month == '12') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    #echo '01-'.$month.'-'.$gyear;
                ?> {
                        y: '<?php echo date('Y'); ?>-<?php echo $month; ?>',
                        a: <?php
                            $where = "`shop` = '" . $duka . "' AND `type` = 'show' AND `date` BETWEEN '" . $nowmonth . "' AND '" . $newmonth . "'";
                            $shown = $this->db->where($where)->get('stats')->num_rows();
                            if ($shown == '') {
                                echo '0';
                            } else {
                                echo $shown;
                            }
                            ?>,
                        b: <?php
                            $where = "`shop` = '" . $duka . "' AND `type` = 'purchase' AND `date` BETWEEN '" . $nowmonth . "' AND '" . $newmonth . "'";
                            $purchases = $this->db->where($where)->get('stats')->num_rows();
                            if ($purchases == '') {
                                echo '0';
                            } else {
                                echo $purchases;
                            }
                            ?>
                    },

                <?php } #echo $this->db->last_query(); 
                ?>
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Shown', 'Purchased'],
            lineColors: ['#ec3b83', '#00acd6'],
            xLabelFormat: function(x) {
                var month = months[x.getMonth()];
                return month;
            },
            dateFormat: function(x) {
                var month = months[new Date(x).getMonth()];
                return month;
            },
            redraw: true
        });
        line_chart_demo.parent().attr('style', '');

        // Donut Chart
        var donut_chart_demo = $("#donut-chart-demo");
        donut_chart_demo.parent().show();
        var donut_chart = Morris.Donut({
            element: 'donut-chart-demo',
            data: [{
                    label: "Checkout ($ <?php echo number_format($this->db->select('sum(price) as total')->where('shop', $duka)->where('type', 'checkout')->get('stats')->row()->total); ?>)",
                    value: <?php echo number_format($this->db->where('shop', $duka)->where('type', 'checkout')->get('stats')->num_rows()); ?>
                },
                {
                    label: "ATC ($ <?php echo number_format($this->db->select('sum(price) as total')->where('shop', $duka)->where('type', 'purchase')->get('stats')->row()->total); ?>)",
                    value: <?php echo number_format($this->db->where('shop', $duka)->where('type', 'purchase')->get('stats')->num_rows()); ?>
                },
                {
                    label: "Impressions",
                    value: <?php echo number_format($this->db->where('shop', $duka)->where('type', 'impression')->get('stats')->num_rows()); ?>
                },
                {
                    label: "Shown",
                    value: <?php echo number_format($this->db->where('shop', $duka)->where('type', 'show')->get('stats')->num_rows()); ?>
                }
            ],
            colors: ['#EC3B83', '#00ACD6', '#E8B51B', '#002A5A']
        });
        donut_chart_demo.parent().attr('style', '');

        // Area Chart
        var area_chart_demo = $("#area-chart-demo");
        area_chart_demo.parent().show();
        var area_chart = Morris.Area({
            element: 'area-chart-demo',
            data: [
                <?php
                $gyear = date('Y');
                for ($month = 01; $month <= 12; $month++) {
                    if ($month == '01') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '02') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('28-' . $month . '-' . $gyear);
                    }
                    if ($month == '03') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '04') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('30-' . $month . '-' . $gyear);
                    }
                    if ($month == '05') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '06') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('30-' . $month . '-' . $gyear);
                    }
                    if ($month == '07') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '08') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '09') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('30-' . $month . '-' . $gyear);
                    }
                    if ($month == '10') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    if ($month == '11') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('30-' . $month . '-' . $gyear);
                    }
                    if ($month == '12') {
                        $nowmonth = strtotime('01-' . $month . '-' . $gyear);
                        $newmonth = strtotime('31-' . $month . '-' . $gyear);
                    }
                    #echo '01-'.$month.'-'.$gyear;
                ?> {
                        y: '<?php echo date('Y'); ?>-<?php echo $month; ?>',
                        a: <?php
                            $where = "`shop` = '" . $duka . "' AND `type` = 'purchase' AND `date` BETWEEN '" . $nowmonth . "' AND '" . $newmonth . "'";
                            $shown = $this->db->select('sum(price) as total')->where($where)->get('stats')->row()->total;
                            if ($shown == '') {
                                echo '0';
                            } else {
                                echo $shown;
                            }
                            ?>,
                        b: <?php
                            $where = "`shop` = '" . $duka . "' AND `type` = 'checkout' AND `date` BETWEEN '" . $nowmonth . "' AND '" . $newmonth . "'";
                            $purchases = $this->db->select('sum(price) as total')->where($where)->get('stats')->row()->total;
                            if ($purchases == '') {
                                echo '0';
                            } else {
                                echo $purchases;
                            }
                            ?>
                    },

                <?php } #echo $this->db->last_query(); 
                ?>

            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['ATC', 'Checkout'],
            lineColors: ['#ec3b83', '#00acd6'],
            xLabelFormat: function(x) {
                var month = months[x.getMonth()];
                return month;
            },
            dateFormat: function(x) {
                var month = months[new Date(x).getMonth()];
                return month;
            },
            redraw: true
        });
        area_chart_demo.parent().attr('style', '');
    });

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
</script>

<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="tile-stats tile-white stat-tile">
            <h3><?php echo $this->db->where('shop', $duka)->where('type', 'impression')->get('stats')->num_rows(); ?></h3>
            <p>Customer impression</p> <span class="customer-reach"></span>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="tile-stats tile-white stat-tile">
            <h3>$ <?php echo number_format($this->db->select('sum(price) as total')->where('shop', $duka)->where('type', 'purchase')->get('stats')->row()->total); ?></h3>
            <p>ATC</p> <span class="sales"></span>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="tile-stats tile-white stat-tile">
            <h3>$ <?php echo number_format($this->db->select('sum(price) as total')->where('shop', $duka)->where('type', 'checkout')->get('stats')->row()->total); ?></h3>
            <p>Checkouts</p> <span class="all-time-sales"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary" id="charts_env">
            <div class="panel-heading">
                <div class="panel-title">Statistics</div>
                <div class="panel-options">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#area-chart" data-toggle="tab">ATC vs Checkout</a></li>
                        <li class="active"><a href="#line-chart" data-toggle="tab">Shown vs ATC</a></li>
                        <li class=""><a href="#pie-chart" data-toggle="tab">Comparison Chart</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane" id="area-chart">
                        <div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
                    </div>
                    <div class="tab-pane active" id="line-chart">
                        <div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
                    </div>
                    <div class="tab-pane" id="pie-chart">
                        <div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th class="padding-bottom-none text-center"> <br> <br> <span class="monthly-sales"><canvas width="262" height="80" style="display: inline-block; width: 262px; height: 80px; vertical-align: top;"></canvas></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="panel-heading">
                            <h4>Monthly Sales</h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Top 3 offers</div>
            </div>
            <div class="panel-body with-table">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Offer</th>
                            <th>CTR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_stats = $this->db->where('shop', $duka)->get('stats')->num_rows();
                        $top_stats = $this->db->where('shop', $duka)->select('*, count(stat_id) as reach')->group_by('offer')->limit(3)->order_by('reach', 'desc')->get('stats')->result_array();
                        foreach ($top_stats as $key => $fetch) :
                        ?>
                            <tr>
                                <td><?php echo $fetch['offer']; ?></td>
                                <td><?php
                                    $title = $this->db->where('offer_id', $fetch['offer'])->get('offers')->row()->title;
                                    if ($title == '') {
                                        echo 'Offer #' . $fetch['offer'];
                                    } else {
                                        echo $title;
                                    }
                                    ?></td>
                                <td><?php echo number_format(($fetch['reach'] * 100) / $total_stats); ?>%  ($<?php echo number_format($this->db->select('sum(price) as total')->where('shop', $duka)->where('type', 'purchase')->where('offer', $fetch['offer'])->get('stats')->row()->total); ?>)</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>