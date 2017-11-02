<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
                <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">Log Details</h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="<?php echo base_url(); ?>dashboard">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Log Details</a>
                            </li>
                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
        </div>
        <!-- END PAGE HEADER-->
       <div class="form-body">
            <h2 class="form-section"><?=$log_details->coaching_date?> - <?=$user_det->fname." ".$user_det->lname;?></h2>
            <div class="row">
                    <div class="col-md-12">
                        <?=$log_details->details?>    
                    </div>
                    <!--/span-->
            </div>
            
        </div>
        <div class="form-actions fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-offset-3 col-md-9">
                            <a class="btn green" href="<?php echo base_url(); ?>coach/edit/<?=$log_details->id?>" >
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <a class="btn blue" href="jayascript:void(0)" id="backLink">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function() {
    
    $("#backLink").click(function(event) {
        event.preventDefault();
        history.back(1);
    });
    
});
</script>   