<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="773029760801-91hr01i44b98rhi8ss33qtn7n759tism.apps.googleusercontent.com">
    <link rel="icon" href="<?php echo base_url('public/images/fav.png'); ?>" type="image/icon" sizes="16x16">
    <title>FelgenInserate | <?php echo $title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/hamburgers.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/slick.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/slick-theme.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/styles.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/media.css'); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>
<body data-session="<?php echo $this->session->userdata('unique_id'); ?>">
    <div class="loader-admin"></div>
    <header class="header">
        <nav class="navbar navbar-expand-sm boxs">
            <button class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="navigation">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <div class="navbar-header boxs">
                <a href="<?php echo base_url('/') ?>"><img src="<?php echo base_url('public/images/logo.png'); ?>" class="img-responsive first_logo" alt="logo"></a>
                 </div>
                <div class="navbar navyitm boxs">
                    <ul class="navbar-nav menu">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/') ?>">Startseite</a>
                        </li>
                        <li class="nav-item productclick">
                            <a class="nav-link " href="#">Inserate</a>
                            <div class="my_acc_drop my_acc_drop3 tringl boxs">
                                <ul>
                                    <li><a href="<?php echo base_url('Site/allProducts') ?>">Beliebte Felgen</a></li>
                                    <li><a href="<?php echo base_url('Site/basicProducts') ?>">Neuste Felgen</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('about') ?>">ÜBER UNS</a>
                        </li>
                    </ul>
                </div>
           
            <div class="collapse navbar-collapse nav_ryt boxs" id="collapsibleNavbar">
                <div class="navbar navbar-right rightNav boxs">
                    <ul class="navbar-nav menu1">
						<?php if (!empty($this->session->userdata('unique_id'))) { ?>
                        <li class="nav-item unionclick clickBox">
                            <a class="nav-link chtdot" href="#"><img src="<?php echo base_url('public/images/Union.svg'); ?>" class="img-fluid" alt="Union"></a>
                            <div class="innerBox my_acc_drop my_acc_drop1 tringl made_in_drop boxs ">
                                <div class="chatmy boxs">
                                    <p>Chats</p>
                                </div>
								<?php if(!empty($chatList)){ ?>
								<?php foreach($chatList as $chat) { ?>
								
                                <a href="<?php echo base_url('Post/chatwithseller/'.$chat['receiver_id'].'/'.$chat['post_id']); ?>" class="chatbxA"><div class="chatboxs_all boxs">

                                    <div class="chatleft d-inline-block">
                                        <div class="chatimng boxs">
                                            <?php if(!empty($chat['receiver_image'])){ ?>
                                            <img src="<?php echo base_url('uploads/profile-images/'.$chat['receiver_image']); ?>" class="img-fluid" align="chattire">
                                            <?php }else{  ?>
                                            <img src="<?php echo base_url('public/images/user.png'); ?>" class="img-fluid" align="chattire">
                                            <?php }  ?>
                                        </div>
                                    </div>
                                    <div class="chatmiddle d-inline-block">
                                        <p><?php echo $chat['name'] ?></p>
                                    </div>
                                    <div class="chatright d-inline-block">
                                        <p><?php echo $chat['time'] ?></p>
                                        <p><?php echo $chat['date'] ?></p>
                                    </div>
                                </div></a>
                                <?php  }}else{ ?>
								<p>Noch keine Chats</p>
								<?php } ?>
                                
                                
                            </div>
                        </li>
						<?php } ?>
                        <?php if (empty($this->session->userdata('unique_id'))) { ?>
                             <li class="nav-item useritem clickBox">
                                <a class="nav-link " href="#">Einloggen</a>
                                <div class="innerBox my_acc_drop my_acc_drop2 tringl boxs made_in_drop">
                                    <ul>
                                        <li><a href="<?php echo base_url('Site/login_username')  ?>">Einloggen</a></li>
                                        <li><a href="<?php echo base_url('Site/signup')  ?>">Anmelden</a></li>
                                        
                                    </ul>
                                </div>
                            </li>
                        <?php }else{ ?>
                            <li class="nav-item useritem clickBox">
                                <a class="nav-link " href="#"><img src="<?php echo base_url('public/images/user.svg'); ?>" class="img-fluid" alt="user"></a>
                                <div class="innerBox my_acc_drop my_acc_drop2 tringl boxs made_in_drop">
                                    <ul>
                                        <li><a href="<?php echo base_url('Site/myPosts')  ?>">Meine Posts</a></li>

                                        <li><a href="<?php echo base_url('Site/profile')  ?>">Mein Profil</a></li>
                                        <li><a href="<?php echo base_url('Post/wishlist')  ?>">Meine Wunschliste</a></li>
                                        <li><a class="logout" href="<?php echo base_url('logout'); ?>">Ausloggen</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if (!empty($this->session->userdata('unique_id'))) { ?>
                            <li class="nav-item logbtn addhover1">
                                    <a class="nav-link" href="<?php echo base_url('Post/addPost') ?>">Inserieren</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
  
        </nav>
    </header>
    <div class="sidenav" id="mySidenav">
        <a href="<?php echo base_url('/') ?>" class="logo"><img src="<?php echo base_url('public/images/logo.png'); ?>" class="img-fluid" alt="logo"></a>
        <ul class="navbar-nav menu">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/') ?>">Startseite</a>
            </li>
            <li class="nav-item sideproduct">
                <a class="nav-link " href="#">Inserate<div class='fa fa-caret-down right'></div></a>
                <ul>
                    <li><a href="<?php echo base_url('Site/allProducts') ?>">Beliebte Felgen</a></li>
                    <li><a href="<?php echo base_url('Site/basicProducts') ?>">Neuste Felgen</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('about') ?>">ÜBER UNS</a>
            </li>
        </ul>
    </div>