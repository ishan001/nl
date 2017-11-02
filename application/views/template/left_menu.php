<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search" action="extra_search.html" method="POST">
                    <div class="form-container">
                        <div class="input-box">
                            <a href="javascript:;" class="remove"></a>
                            <input type="text" placeholder="Search..."/>
                            <input type="button" class="submit" value=" "/>
                        </div>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start active " id="dashboard">
                <a href="<?php echo base_url(); ?>dashboard">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li id="staff">
                <a href="javascript:;">
                        <i class="fa  fa-user"></i>
                        <span class="title">Staff</span>
                        <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li id="new_staff">
                        <a href="<?php echo base_url(); ?>staff/new_staff">
                                <i class="fa  fa-user"></i>
                                Add New Staff
                        </a>
                    </li>
                    <li id="all_staff">
                        <a href="<?php echo base_url(); ?>staff">
                                <i class="fa  fa-user"></i>
                                All Staff
                        </a>
                    </li>
                </ul>
            </li>
            <li id="coaching">
                <a href="javascript:;">
                        <i class="fa  fa-gavel"></i>
                        <span class="title">Coach</span>
                        <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li id="new_coaching">
                        <a href="<?php echo base_url(); ?>coach/add">
                                <i class="fa  fa-gavel"></i>
                                Add New Coaching
                        </a>
                    </li>
                    <li id="all_logs">
                        <a href="<?php echo base_url(); ?>coach/all_logs">
                                <i class="fa  fa-gavel"></i>
                                All Logs
                        </a>
                    </li>
                    <li id="all_logs_calender">
                        <a href="<?php echo base_url(); ?>coach/all_logs_calender">
                                <i class="fa  fa-gavel"></i>
                                Logs Calender View
                        </a>
                    </li>
                </ul>
            </li>
<!--            <li id="profit_target">
                <a href="javascript:;">
                    <i class="fa fa-money"></i>
                    <span class="title">Profit Target</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li  id="update_profit_target" >
                        <a href="<?php echo base_url(); ?>profit_target/edit" >
                             <i class="fa  fa-money"></i>
                            <span class="title">
                                    Update Profit Targets 
                            </span>
                        </a>
                    </li>
                   <li id="sales_targets">
                        <a href="<?php echo base_url(); ?>profit_target/sales_targets">
                                <i class="fa  fa-money"></i>
                                Sales Staff Targets
                        </a>
                    </li>
                     <li id="sales_targets_charts">
                        <a href="<?php echo base_url(); ?>profit_target/sales_targets_charts">
                                <i class="fa  fa-money"></i>
                                Current Profit Charts
                        </a>
                    </li>
                </ul>
            </li>
            <li id="pk">
                <a href="javascript:;">
                    <i class="fa fa-money"></i>
                    <span class="title">PK</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li  id="all_pk" >
                        <a href="<?php echo base_url(); ?>pk" >
                             <i class="fa  fa-money"></i>
                            <span class="title">
                                    All PK
                            </span>
                        </a>
                    </li>
                   <li id="new_pk">
                        <a href="<?php echo base_url(); ?>pk/new_pk">
                                <i class="fa  fa-money"></i>
                                New PK
                        </a>
                    </li>
                </ul>
            </li>-->
            <li id="config">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Configuration</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li  id="staff_type" >
                        <a href="javascript:;" >
                             <i class="fa  fa-user"></i>Staff Types 
                            <span class="arrow">                                   
                            </span>
                        </a>
                        
                        <ul class="sub-menu">
                            <li  id="all_staff_types" >
                                <a href="<?php echo base_url(); ?>staff_type" >
                                     <i class="fa  fa-user"></i>
                                    <span class="title">
                                            All Staff Types
                                    </span>
                                </a>
                            </li>
                            <li id="add_staff_type">
                                <a href="<?php echo base_url(); ?>staff_type/add">
                                        <i class="fa  fa-user"></i>
                                        New Staff Type 
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
                
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>