<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
                <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">Sales Staff Targets Chart</h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo base_url(); ?>dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Sales Staff Targets Chart</a>
                            </li>
                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-money"></i>Sales Staff Targets Chart
                        </div>
                    </div>
                    <div class="portlet-body">
                            <div id="chart_1" class="chart">
                            </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.min.js"></script>
<script>
jQuery(document).ready(function() {
 
$.plot($("#chart_1"), [{
        data:  [
            <?php $i=1; foreach ($targets AS $pt) { ?>
                    [<?=$i?>,<?=$pt->current_profit;?>],            
            <?php 
                $name_ary[$i] = $pt->fname;
                $i++;
            } ?>
                
            ],
        lines: {
            lineWidth: 1,
        },
        shadowSize: 0
    }, 
    ], {
        series: {
            stack: 0,
            lines: {
                show: false,
                fill: true,
                steps: false,
                lineWidth: 0, // in pixels
            },
            bars: {
                show: true,
                barWidth: 0.5,
                lineWidth: 0, // in pixels
                shadowSize: 0,
                align: 'center'
            }
        },
        colors: ["#d12610"],
    xaxis: {
        tickColor: "#eee",
        ticks: [
            <?php for($i=1;$i<=count($name_ary);$i++) {  ?>
                [<?=$i?>,"<?=$name_ary[$i]?>"],
            <?php } ?>
            
        
        ]
    },
    yaxis: {
        tickColor: "#eee",
        ticks: 10,
    },
    grid: {
        borderColor: "#eee",
        borderWidth: 1
    }
});    
            
});
</script>
