<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Dashboard - Numeracy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- Open Sans font from Google CDN -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

	<!-- LanderApp's stylesheets -->
	<link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/landerapp.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/widgets.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/themes.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css">
	<!--[if lt IE 9]>
		<script src="assets/javascripts/ie.min.js"></script>
	<![endif]-->
</head>
<body class="theme-asphalt  main-menu-animated">

<script>var init = [];</script>

<div id="main-wrapper">


<!-- 2. $MAIN_NAVIGATION ===========================================================================

	Main navigation
-->
	<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
		<!-- Main menu toggle -->
		<button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>
		
		<div class="navbar-inner">
			<!-- Main navbar header -->
			<div class="navbar-header">

				<!-- Logo -->
				<a href="" class="navbar-brand">
					<strong>Numeracy</strong> Assessment
				</a>

				<!-- Main navbar toggle -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

			</div> <!-- / .navbar-header -->

			<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
				<div>
					<div class="right clearfix">
						<ul class="nav navbar-nav pull-right right-navbar-nav">
                            <li class="dropdown">
								<a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
									<img src="<?php echo base_url();?>public/img/avatar/default_avatar.jpg" alt="">
									<span>Admin</span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo base_url(); ?>logout" ><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
								</ul>
							</li>
						</ul> <!-- / .navbar-nav -->
					</div> <!-- / .right -->
				</div>
			</div> <!-- / #main-navbar-collapse -->
		</div> <!-- / .navbar-inner -->
	</div> <!-- / #main-navbar -->
<!-- /2. $END_MAIN_NAVIGATION -->


	<div id="main-menu" role="navigation">
		<div id="main-menu-inner">
			<div class="menu-content top" id="menu-content-demo">
				<!-- Menu custom content demo
					 Javascript: html/assets/demo/demo.js
				 -->
				<div>
					<div class="text-bg"><span class="text-slim">Welcome,</span> <span class="text-semibold">Admin</span></div>

					<img src="<?php echo site_url();?>public/img/avatar/default_avatar.jpg" alt="" class="">
					<div class="btn-group">
						<a href="<?php echo base_url(); ?>logout" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
					</div>
					<a href="#" class="close">&times;</a>
				</div>
			</div>
            <?php
            switch($body)
            {
                case "AddQuestion":
                {
                    $addquestion = true;
                    $allquestion = true;
                }
                break;
                case "AllQuestion":
                {
                    $questions = true;
                    $allquestion = true;
                }
                break;
                case "AllType":
                {
                    echo $content;
                    if($content == "Editshow" || $content == "EditType")
                    {
                         $edittypes = true;
                    }
                    else
                    {
                         $addtypes = true;
                    }
                    $alltype = true;
                   
                }
                break;
                case "AllExam":
                {
                    $exammenu = true;
                    $allexam = true;
                }
                break;
                case "AddExam_1":
                {
                    $exammenu = true;
                    $addexam1 = true;
                }
                break;
                 case "AddExam_2":
                {
                    $exammenu = true;
                    $addexam2 = true;
                }
                break;
                case "ExamStatus":
                {
                    $exammenu = true;
                    $estatus = true;
                }
                break;
                
            } ?>
			<ul class="navigation">
				<li>
					<a href="#"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Dashboard</span></a>
				</li>
				<li class="mm-dropdown <?php if(isset($allquestion))echo "open"; ?>">
					<a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Question Bank</span></a>
					<ul>
						<li <?php if(isset($questions))echo "class='active'"; ?>>
							<a tabindex="-1" href="<?php echo site_url(); ?>all-questions">
                            <i class="menu-icon fa fa-gears
                            "></i>
                            <span class="mm-text"></span>Manage/List Questions</a>
						</li>
						<li <?php if(isset($addquestion))echo "class='active'"; ?>>
							<a tabindex="-1" href="<?php echo site_url(); ?>add-question"><i class="menu-icon fa fa-plus"></i>
                            <span class="mm-text">Add New Questions</span></a>
						</li>
					</ul>
				</li>
                <li class="mm-dropdown <?php if(isset($alltype))echo "open"; ?>">
					<a href="#"><i class="menu-icon fa fa-gears"></i><span class="mm-text">Manage Question Type</span></a>
					<ul>
						 <li <?php if(isset($addtypes))echo "class='active'"; ?>>
							<a tabindex="-1" href="<?php echo site_url(); ?>question-type">
                            <i class="menu-icon fa fa-plus"></i>
                            <span class="mm-text"></span>Add Type / Sub-type</a>
						</li>
						<li <?php if(isset($edittypes))echo "class='active'"; ?>>
							<a tabindex="-1" href="<?php echo site_url(); ?>edit-type"><i class="menu-icon fa fa-gears"></i>
                            <span class="mm-text">Rename Type / Sub - type</span></a>
						</li>
                        
					</ul>
				</li>
                <li class="mm-dropdown <?php if(isset($exammenu))echo "open"; ?>">
					<a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Test Manager</span></a>
					<ul>
						<li <?php if(isset($allexam))echo "class='active'"; ?>>
							<a tabindex="-1" href="<?php echo site_url(); ?>all-exam">
                            <i class="menu-icon fa fa-gears"></i>
                            <span class="mm-text"></span>Manage / List Test</a>
						</li>
						<li <?php if(isset($addexam1))echo "class='active'"; ?>>
							<a tabindex="-1" href="<?php echo site_url(); ?>add-exam1"><i class="menu-icon fa fa-plus"></i>
                            <span class="mm-text">Add New Test (Type1)</span></a>
						</li>
                        <li <?php if(isset($addexam2))echo "class='active'"; ?>>
							<a tabindex="-1" href="<?php echo site_url(); ?>add-exam2"><i class="menu-icon fa fa-plus"></i>
                            <span class="mm-text">Add New Test (Type2)</span></a>
						</li>
                        <li <?php if(isset($estatus))echo "class='active'"; ?>>
							<a tabindex="-1" href="<?php echo site_url(); ?>exam-status"><i class="menu-icon fa fa-plus"></i>
                            <span class="mm-text">Test Status</span></a>
						</li>
					</ul>
				</li>
                
            </ul> <!-- / .navigation -->
			
		</div> <!-- / #main-menu-inner -->
	</div> <!-- / #main-menu -->