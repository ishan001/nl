<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
                <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">All Logs</h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo base_url(); ?>dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">All Logs</a>
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
                            <i class="fa fa-user"></i>All Logs
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="user_log_tbl">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Staff</th>
                                        <th>Log Detail Summery</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($logs as $row) { ?>
                                    <tr>
                                        <td><?=$row->coaching_date;?></td>
                                        <td><?=$row->fname." ".$row->lname;?></td>
                                        <td><?php 
                                                $summary = strip_tags($row->details);
                                                if (strlen($summary) > 100)
                                                   $summary = substr($summary, 0, strrpos(substr($summary, 0, 100), ' ')) . '...';
                                               echo $summary; 
                                            ?>
                                        </td>


                                        <td>
                                           <a class="btn default btn-xs blue-stripe" href="<?php echo base_url(); ?>coach/log_detail/<?=$row->id?>"> View </a>
                                           <a class="btn default btn-xs green-stripe" href="<?php echo base_url(); ?>coach/edit/<?=$row->id?>"> Edit </a>
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

    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<script>
jQuery(document).ready(function() {
    
// begin second table
            $('#user_log_tbl').dataTable({
                "aaSorting": [[0,'desc']],      //Sorts 1st column desc 
                "aoColumns": [
                  null,
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
