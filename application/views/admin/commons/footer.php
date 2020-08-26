            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Entwickelt von<a href="https://designoweb.com/" class="text-dark" target="_blank">Designoweb Technologies</a> © 2020</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- <p class="d-inline-block">Follow us</p>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a> -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <?php if(!empty($editor)){ ?>
        <script> CKEDITOR.replace('description');</script>
        <script> CKEDITOR.replace('answer');</script>
      <?php } ?>
    <script src="<?php echo base_url('public/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.slimscroll.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/dropdown-bootstrap-extended.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/feather.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/toggles.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/toggle-data.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.counterup.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/echarts-en.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery-jvectormap-2.0.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/vectormap-data.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.toast.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/init.js'); ?>"></script>
    <!-- <script src="<?php echo base_url('public/js/dashboard-data.js'); ?>"></script> -->
    <script src="<?php echo base_url('public/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/dataTables.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/dataTables-data.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/event.js'); ?>"></script>
	
</body>
</html>