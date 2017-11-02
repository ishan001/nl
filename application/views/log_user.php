<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
                <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title"><?=$user_det->fname." ".$user_det->lname;?> Log Details</h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo base_url(); ?>dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#"><?=$user_det->fname." ".$user_det->lname;?> Log Details</a>
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
                            <i class="fa fa-user"></i><?=$user_det->fname." ".$user_det->lname;?> Log Details
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="user_log_tbl">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Log Detail Summery</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($user_log as $row) { ?>
                                    <tr>
                                        <td><?=$row->coaching_date;?></td>
                                        <td><?php 
                                                $summary = strip_tags($row->details);
                                                if (strlen($summary) > 100)
                                                   $summary = substr($summary, 0, strrpos(substr($summary, 0, 100), ' ')) . '...';
                                               echo $summary; 
                                            ?>
                                        </td>


                                        <td>
                                           <a class="btn default btn-xs red-stripe" href="<?php echo base_url(); ?>coach/log_detail/<?=$row->id?>"> View </a> 
                                        </td>

                                    </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        <div class="row text-right">
            <div class="col-md-12">
                <a class="btn blue" href="jayascript:void(0)" id="backLink">
                        <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<script>
jQuery(document).ready(function() {
    
    $("#backLink").click(function(event) {
        event.preventDefault();
        history.back(1);
    });
// begin second table
            $('#user_log_tbl').dataTable({
                "aaSorting": [[0,'desc']],      //Sorts 1st column desc 
                "aoColumns": [
                  null,
                  { "bSortable": false },
                  { "bSortable": false }
                ],
                
                // set the initial value
                "iDisplayLength": 10,
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                 
                "aoColumnDefs": [
                    { 'bSortable': true, 'aTargets': [0] },
                    { "bSearchable": false, "aTargets": [ 0 ] }
                ]
            });
            jQuery('#user_log_tbl_wrapper .dataTables_filter input').addClass("form-control input-medium input-inline"); // modify table search input
            jQuery('#user_log_tbl_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown


});
</script>
