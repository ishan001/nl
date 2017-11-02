<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
                <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">All Staff Types</h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo base_url(); ?>dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">All Staff Types</a>
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
                            <i class="fa fa-users"></i>All Staff Types
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="all_staff_tbl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Color</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($results as $row) { ?> 
                                    <tr  >
                                        <td><?=$i?></td>
                                        <td><?=$row->type;?></td>
                                        <td style="background-color:<?=$row->color?> "><?=$row->color?></td>
                                        <td style="text-align: center">
                                           <a class="btn default btn-xs green-stripe" href="<?php echo base_url(); ?>staff_type/edit/<?=$row->id?>"> Edit </a>                                            
                                        </td>
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-toastr/toastr.min.js"></script>
<script>
jQuery(document).ready(function() {
// begin second table
            $('#all_staff_tbl').dataTable({
                "aaSorting": [[0,'asc']],      //Sorts 1st column desc 
                "aoColumns": [
                 { "bSortable": false } , 
                  null,
                  { "bSortable": false },
                  { "bSortable": false },
                ],
                
                // set the initial value
                "iDisplayLength": 50,
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
            jQuery('#all_staff_tbl_wrapper .dataTables_filter input').addClass("form-control input-medium input-inline"); // modify table search input
            jQuery('#all_staff_tbl_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown

        $('.inactiveBtn').click(function(){
        var userid = $(this).attr("idval");
        var activeType = $(this).attr("activeType"); 
        if(activeType=="Active")
        {
            classBox = "green";
            urltext = '1';
        }
        else 
        {
            classBox = 'red';
            urltext = '0';
        }
                bootbox.dialog({
                    message: "Are you sure do you want to "+activeType+" this user ?",
                    title: activeType+" User",
                    buttons: {
                      success: {
                        label: activeType+"!",
                        className: classBox,
                        callback: function() {                            
                             $.ajax({
                               type: "POST",
                               url: "<?php echo base_url(); ?>staff/active_inactive/"+userid+"/"+urltext,

                               success: function(data){
                                    toastr.success("User Succssfully "+activeType+"!");
                                    toastr.options = {
                                          "closeButton": true,
                                          "debug": false,
                                          "positionClass": "toast-top-right",
                                          "onclick": null,
                                          "showDuration": "1000",
                                          "hideDuration": "1000",
                                          "timeOut": "2000",
                                          "extendedTimeOut": "1000",
                                          "showEasing": "swing",
                                          "hideEasing": "linear",
                                          "showMethod": "fadeIn",
                                          "hideMethod": "fadeOut"
                                        };
                                        window.setTimeout(function(){location.reload()},3000)
                                                
                               }

                             });    

                        }
                      },
                      main: {
                        label: "Cancel",
                        className: "blue",
                        callback: function() {
                        }
                      }
                    }
                });
            });          
});
</script>
