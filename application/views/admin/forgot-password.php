<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Felgen Inserate | Forgot Password</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />
    <link rel="shortcut icon" href="<?php echo base_url('public/images/fav.png'); ?>">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="<?php echo base_url('public/css/style.css'); ?>" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
	<div class="hk-wrapper">
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(<?php echo base_url('public/images/bg2.jpg'); ?>);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Verstehe und schaue tief in die Natur.</h1>
                                        <p class="text-white">Der Zweck von lorem ipsum besteht darin, einen natürlich aussehenden Textblock (Satz, Absatz, Seite usw.) zu erstellen, der nicht vom Layout ablenkt. Auch in den 90er Jahren bündelten Desktop-Publisher den Text mit ihrer Software.</p>
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(<?php echo base_url('public/images/bg1.jpg'); ?>);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Erfahrung ist wichtig für eine gute Anwendung.</h1>
                                        <p class="text-white">Die Passage erlebte in den 1960er Jahren einen Anstieg der Popularität, als Letraset sie auf ihren Dry-Transfer-Blättern verwendete, und erneut in den 90er Jahren, als Desktop-Publisher den Text mit ihrer Software bündelten.</p>
                                    </div>
                                </div>
								<div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                <form method="post" id="common-form" action="<?php echo base_url('admin/forgot_password'); ?>">
                                    <div class="error_msg"></div>
                                    <a class="d-flex auth-brand" href="<?php echo base_url('admin') ?>">
                                        <img class="brand-img" src="<?php echo base_url('public/images/Logo Auf Webseite@3x.jpg'); ?>" alt="brand" />
                                    </a>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email" type="email" id="registered_email" name="registered_email">
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">einreichen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.slimscroll.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/dropdown-bootstrap-extended.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/feather.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/init.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/login-data.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/event.js'); ?>"></script>
</body>
</html>