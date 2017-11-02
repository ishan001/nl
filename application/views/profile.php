<link href="<?php echo base_url(); ?>assets/css/pages/profile.css" rel="stylesheet" type="text/css"/>
<div class="page-content-wrapper">
    <div class="page-content">

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    User Profile 
                </h3>

                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row profile">
            <div class="col-md-12">
                <!--BEGIN TABS-->
                <div class="tabbable tabbable-custom tabbable-full-width">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">
                                Overview
                            </a>
                        </li>
<!--                        <li>
                            <a href="#tab_1_4" data-toggle="tab">
                                Projects
                            </a>
                        </li>-->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-unstyled profile-nav">
                                        <li>
                                            <img src="<?php echo base_url(); ?>profile_pictures/<?php if($row->profile_picture=='') echo 'common_pic.jpg'; else echo $row->profile_picture; ?>"  class="img-responsive" alt=""/>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8 profile-info">
                                            <h1><?=$row->fname." ".$row->lname?></h1>
                                            <p>
   
                                            </p>
                                            <ul class="list-inline">
                                                <li>
                                                    <i class="fa fa-calendar"></i> <?=date("d-m-Y",$row->created)?>
                                                </li>
                                                <li>
                                                    <i class="fa fa-briefcase"></i> <?=$staff_type->type?>
                                                </li>
                                                <li>
                                                    <i class="fa fa-user"></i> <?=$row->sales_id?>
                                                </li>
                                                <li>
                                                    <i class="fa fa-calendar-o"></i> <?=$row->working_days?> Working days per week
                                                </li>
                                            </ul>
                                        </div>
                                        <!--end col-md-8-->
                                        <div class="col-md-4">
                                            <div class="portlet sale-summary">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        Sales Summary
                                                    </div>
                                                    <div class="tools">
                                                        <a class="reload" href="javascript:;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span class="sale-info">
                                                                Profit Target <i class="fa fa-img-up"></i>
                                                            </span>
                                                            <span class="sale-num">
                                                                <?=number_format($profit->target_profit,2,".",",")?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="sale-info">
                                                                Current Profit <i class="fa fa-img-down"></i>
                                                            </span>
                                                            <span class="sale-num">
                                                                <?=number_format($profit->current_profit,2,".",",")?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="sale-info">
                                                                Profit To Target
                                                            </span>
                                                            <span class="sale-num">
                                                                <?=number_format(($profit->target_profit)-($profit->current_profit),2,".",",")?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="sale-info">
                                                                Days Left
                                                            </span>
                                                            <span class="sale-num">
                                                                <?=$this->main_func->getDates();?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="sale-info">
                                                                Profit per day
                                                            </span>
                                                            <span class="sale-num">
                                                                <?=number_format((($profit->target_profit)-($profit->current_profit))/$this->main_func->getDates(),2,".",",")?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="sale-info">
                                                                Actual $ Per Day
                                                            </span>
                                                            <span class="sale-num">
                                                                <?=number_format(((($profit->target_profit)-($profit->current_profit))/$this->main_func->getDates())*7/$row->working_days,2,".",",")?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-4-->
                                    </div>
                                    <!--end row-->
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                     <div class="tabbable tabbable-custom tabbable-custom-profile">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_11" data-toggle="tab">
                                                    Staff PK
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_11">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-advance table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-briefcase"></i> PK
                                                                </th>
                                                                <th class="hidden-xs">
                                                                    <i class="fa fa-calendar"></i> Date
                                                                </th>
                                                                <th>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Mitsi HeatPump (selected)
                                                                </td>
                                                                <td >
                                                                    14-08-2014
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Braun Appliances (NLG)
                                                                </td>
                                                                <td >
                                                                    17-09-2014
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_1_4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="add-portfolio">
                                        <span>
                                            502 Items sold this week
                                        </span>
                                        <a href="#" class="btn icn-only green">
                                            Add a new Project <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end add-portfolio-->
                            <div class="row portfolio-block">
                                <div class="col-md-5">
                                    <div class="portfolio-text">
                                        <img src="assets/img/profile/portfolio/logo_metronic.jpg" alt=""/>
                                        <div class="portfolio-text-info">
                                            <h4>Metronic - Responsive Template</h4>
                                            <p>
                                                Lorem ipsum dolor sit consectetuer adipiscing elit.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 portfolio-stat">
                                    <div class="portfolio-info">
                                        Today Sold
                                        <span>
                                            187
                                        </span>
                                    </div>
                                    <div class="portfolio-info">
                                        Total Sold
                                        <span>
                                            1789
                                        </span>
                                    </div>
                                    <div class="portfolio-info">
                                        Earns
                                        <span>
                                            $37.240
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="portfolio-btn">
                                        <a href="#" class="btn bigicn-only">
                                            <span>
                                                Manage
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <div class="row portfolio-block">
                                <div class="col-md-5 col-sm-12 portfolio-text">
                                    <img src="assets/img/profile/portfolio/logo_azteca.jpg" alt=""/>
                                    <div class="portfolio-text-info">
                                        <h4>Metronic - Responsive Template</h4>
                                        <p>
                                            Lorem ipsum dolor sit consectetuer adipiscing elit.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-5 portfolio-stat">
                                    <div class="portfolio-info">
                                        Today Sold
                                        <span>
                                            24
                                        </span>
                                    </div>
                                    <div class="portfolio-info">
                                        Total Sold
                                        <span>
                                            660
                                        </span>
                                    </div>
                                    <div class="portfolio-info">
                                        Earns
                                        <span>
                                            $7.060
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12 portfolio-btn">
                                    <a href="#" class="btn bigicn-only">
                                        <span>
                                            Manage
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!--end row-->
                            <div class="row portfolio-block">
                                <div class="col-md-5 portfolio-text">
                                    <img src="assets/img/profile/portfolio/logo_conquer.jpg" alt=""/>
                                    <div class="portfolio-text-info">
                                        <h4>Metronic - Responsive Template</h4>
                                        <p>
                                            Lorem ipsum dolor sit consectetuer adipiscing elit.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-5 portfolio-stat">
                                    <div class="portfolio-info">
                                        Today Sold
                                        <span>
                                            24
                                        </span>
                                    </div>
                                    <div class="portfolio-info">
                                        Total Sold
                                        <span>
                                            975
                                        </span>
                                    </div>
                                    <div class="portfolio-info">
                                        Earns
                                        <span>
                                            $21.700
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2 portfolio-btn">
                                    <a href="#" class="btn bigicn-only">
                                        <span>
                                            Manage
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                        <!--end tab-pane-->

                    </div>
                </div>
                <!--END TABS-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<script>

</script>