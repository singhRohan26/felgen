<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Felgen Inserate | <?php echo $title; ?></title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
    <link rel="shortcut icon" href="<?php echo base_url('public/images/fav.png'); ?>">
    <link rel="icon" href="<?php echo base_url('public/images/fav.png'); ?>" type="image/x-icon">
    <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
	<div class="hk-wrapper hk-vertical-nav">
		<nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>">
                <img class="brand-img d-inline-block" src="<?php echo base_url('public/images/inserate.jpg'); ?>" alt="brand" />
            </a>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-body">
                                <span>Administrator<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="<?php echo base_url('admin/profile'); ?>"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profil</span></a>
                        <a class="dropdown-item" href="<?php echo base_url('admin/change-password');?>"><i class="dropdown-icon zmdi zmdi-account"></i><span>Passwort ändern</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('admin/logout'); ?>"><i class="dropdown-icon zmdi zmdi-power"></i><span>Ausloggen</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <form role="search" class="navbar-search">
            <div class="position-relative">
                <a href="javascript:void(0);" class="navbar-search-icon"><span class="feather-icon"><i data-feather="search"></i></span></a>
                <input type="text" name="example-input1-group2" class="form-control" placeholder="Type here to Search">
                <a id="navbar_search_close" class="navbar-search-close" href="#"><span class="feather-icon"><i data-feather="x"></i></span></a>
            </div>
        </form>