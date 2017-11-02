<div class="page-content-wrapper">
    <div class="page-content">
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">Add New Coaching</h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_url(); ?>dashboard">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Add New Coaching</a>
                    </li>
                </ul>
                 <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                                <i class="fa fa-reorder"></i>Add New Coaching
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" id="coaching_form" class="form-horizontal" method="post">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button>
                                    Successfully Added!
                                </div>
                                <div class="alert alert-warning display-hide">
                                    <button class="close" data-close="alert"></button>
                                    Data Submitting Please Wait......
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Staff
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="staff_id">
                                            <option value="">Select...</option>
                                            <?php  foreach($staff as $row) { ?>  
                                            <option value="<?=$row->id?>"><?=$row->fname." ".$row->lname?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Select Date
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                <input type="text" class="form-control" readonly name="coaching_date" >
                                                <span class="input-group-btn">
                                                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                        </div>
                                
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <label class="control-label col-md-3">Details
                                    <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                            <textarea class="ckeditor form-control" name="details" rows="6" data-error-container="#editor2_error"></textarea>
                                            <div id="editor2_error">
                                            </div>
                                    </div>
                                </div>
                                
                            <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script>
jQuery(document).ready(function() {    

    $('.datepick').datepicker();
    var coaching_form = $('#coaching_form');
    var error = $('.alert-danger', coaching_form);
    var success = $('.alert-success', coaching_form);
    var warning = $('.alert-warning' ,coaching_form );
     if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }

    //IMPORTANT: update CKEDITOR textarea with actual content before submit
    coaching_form.on('submit', function() {
        for(var instanceName in CKEDITOR.instances) {
            CKEDITOR.instances[instanceName].updateElement();
        }
    })
    

    coaching_form.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            staff_id: {
                required: true
            },
            coaching_date: {
                required: true
            },
            details: {
                required: true
            },


        },

        messages: { // custom messages for radio buttons and checkboxes
            staff_type: {
                required: "Please select a Staff type"
            },
        },

        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.parent(".input-group").size() > 0) {
                error.insertAfter(element.parent(".input-group"));
            } else if (element.attr("data-error-container")) {
                error.appendTo(element.attr("data-error-container"));
            } else if (element.parents('.radio-list').size() > 0) {
                error.appendTo(element.parents('.radio-list').attr("data-error-container"));
            } else if (element.parents('.radio-inline').size() > 0) {
                error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
            } else if (element.parents('.checkbox-list').size() > 0) {
                error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
            } else if (element.parents('.checkbox-inline').size() > 0) {
                error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success.hide();
            error.show();
            App.scrollTo(error, -200);
        },

        highlight: function (element) { // hightlight error inputs
           $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            error.hide();
            success.hide();
            warning.show();
            dataString = $("#coaching_form").serialize(); 
             $.ajax({
               type: "POST",
               url: "<?php echo base_url(); ?>coach/create",
               data: dataString,

               success: function(data){
                   success.show();
                   warning.hide();
                   error.hide();
               }

             });            
            return false;  //stop the actual form post !important!
            
        }

    });


});
</script>
