<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
                <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">Sales Staff Targets</h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo base_url(); ?>dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Sales Staff Targets</a>
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
                            <i class="fa fa-money"></i>Sales Staff Targets
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="all_staff_tbl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Sales ID</th>
                                        <th>Target</th>
                                        <th>Current Profit</th>
                                        <th>Profit to Target</th>
                                        <th>Days Left</th>
                                        <th>$ Profit Per Day</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($targets as $row) { ?> 
                                    <tr >
                                        <td><?=$i?></td>
                                        <td><?=$row->fname." ".$row->lname;?></td>
                                        <td><?=$row->sales_id?></td>
                                        <td class="right"><?=number_format($row->target_profit,2,".",",")?></td>
                                        <td class="right"><?=number_format($row->current_profit,2,".",",")?></td>
                                        <td class="right"><?=number_format(($row->target_profit)-($row->current_profit),2,".",",")?></td>
                                        <td><?=$this->main_func->getDates();?></td>
                                        <td class="right"><?=number_format(((($row->target_profit)-($row->current_profit))/$this->main_func->getDates())*7/$row->working_days,2,".",",")?></td>
                                    </tr>
                                    <?php $i++; } ?>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/dataTables.tableTools.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-toastr/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/dataTables.bootstrap.js"></script>

<script>
jQuery(document).ready(function() {
// begin second table
            var table = $('#all_staff_tbl').dataTable({
                
                "dom": "T<'clear'> <'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
                "order": [[ 4, "desc" ]],
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                
                "aaSorting": [[0,'asc']],      //Sorts 1st column desc 
                "aoColumns": [
                 { "bSortable": false } , 
                  null,
                  null,
                  null,
                  null,
                  null,
                  null,                  
                  null,
                ],
                 "tableTools": {
                    "aButtons": [ "copy", "xls", "pdf", "print" ],
                    "sSwfPath": "<?php echo base_url(); ?>assets/swf/copy_csv_xls_pdf.swf",
                },
                // set the initial value
                "iDisplayLength": 50,
            });
    $( "a.DTTT_button_xls span" ).replaceWith( "<i class='fa  fa-file-excel-o'></i> <span>Excel</span>" );
    $( "a.DTTT_button_print span" ).replaceWith( "<i class='fa  fa-print'></i> <span>Print</span>" );
    $( "a.DTTT_button_pdf span" ).replaceWith( "<i class='fa  fa-file-pdf-o'></i> <span>PDF</span>" );
    $( "a.DTTT_button_copy span" ).replaceWith( "<i class='fa   fa-copy'></i> <span>Copy</span>" );
});
</script>
