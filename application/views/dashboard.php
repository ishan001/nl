<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">Welcome to Noel Leeming Lower Hutt Manager's Coaching Log</h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_url(); ?>dashboard">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row ">
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet box red calendar">
                    <div class="portlet-title">
                        <div class="caption">
                                <i class="fa fa-calendar"></i>Calendar
                        </div>
                    </div>
                    <div class="portlet-body light-grey">
                        <div id="calendar">
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function() {
    
    
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var h = {};

            if ($('#calendar').width() <= 400) {
                $('#calendar').addClass("mobile");
                h = {
                    left: 'title, prev, next',
                    center: '',
                    right: 'today,month,agendaWeek,agendaDay'
                };
            } else {
                $('#calendar').removeClass("mobile");
                if (App.isRTL()) {
                    h = {
                        right: 'title',
                        center: '',
                        left: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                } else {
                    h = {
                        left: 'title',
                        center: '',
                        right: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                }               
            }

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            $('#calendar').fullCalendar({ //re-initialize the calendar
                disableDragging: true,
                header: h,
                
                year: <?=date("Y")?>,
                month: <?=date("m")?>,

                
                events: [
                    <?php foreach($logs as $row) { 
                     //list($year,$month, $day ) =explode("-",$row->coaching_date	);   
                    ?>
                    {
                        title: '<?=$row->fname." ".$row->lname?>',
                        start: '<?=$row->coaching_date?>',
                        backgroundColor: '<?=$row->color?>',
                        url: 'coach/log_detail/<?=$row->id?>',
                    },
                    <?php } ?>
                ]
            });
});
</script>