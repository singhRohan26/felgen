<footer class="footer boxs">
        <div class="container-fluid">
            <div class="footerall d-inline-block boxs">
                <div class="footleft d-inline-block boxs">
                    <a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('public/images/logo.png'); ?>" class="img-fluid" alt="logo"></a>
                    <p>Mit Felgeninserate können Sie kostengünstig Ihre Felgen verkaufen. Falls Sie Felgen kaufen möchten, so können Sie ganz einfach den Verkäufer via Chat Nachricht kontaktieren.</p>
                </div>
                <div class="footmiddle d-inline-block boxs">
                    <ul>
                        <li><a href="<?php echo base_url('/') ?>">Startseite</a></li>
                        <li><a href="<?php echo base_url('faq') ?>">FAQ</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo base_url('about') ?>">ÜBERUNS</a></li>
                        <li><a href="<?php echo base_url('support') ?>">Unterstützung</a></li>
                    </ul>
                    <ul>
                        <li><a href="<?php echo base_url('/contactus') ?>">kontaktiere uns </a></li>
                        <li><a href="<?php echo base_url('privacy'); ?>">Datenschutz-Bestimmungen</a></li>
                    </ul>
                    <ul style="padding:5px;">
                        <li><a href="<?php echo base_url('terms'); ?>">NUTZUNGSBEDINGUNGEN</a></li>
                        <li><a href="<?php echo base_url('info'); ?>">Die Info</a></li>
                    </ul>
                </div>
                <div class="footright d-inline-block boxs">
                    <h3>Adresse</h3>
                    <h4><?php echo $getaddress['address']; ?></h4>
                    <div class="playstore boxs">
                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.dw.felgen_inserate&hl=en"><img src="<?php echo base_url('public/images/googleplay.png'); ?>"></a>
                    
                    </div>
                    <div class="playstore boxs">
                        <a target="_blank" href="https://apps.apple.com/ph/app/autobestparts/id1496332215"><img src="<?php echo base_url('public/images/appstore.png'); ?>"></a>
                    </div>
                </div>
                
            </div>
        </div>
    </footer>
    <section class="footerbtm  boxs">
        <div class="container-fluid">
            <div class="btmleft d-inline-block ">
                <p><span><i class="far fa-copyright"></i></span> FELGENINSERATE</p>
            </div>
            <div class="btmright d-inline-block float-right ">
                <a href="<?php echo $socialmedia[2]['url']; ?>"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $socialmedia[0]['url']; ?>"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo $socialmedia[1]['url']; ?>"><i class="fa fa-facebook-f"></i></a>
            </div>
        </div>
    </section>
    <div class="wishBox">
      <h3>
        <span>Added to your wishlist!. </span>
      </h3>
  </div>
  <style src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/2.1.0/sweetalert2.css"></style>
    <script src="<?php echo base_url('public/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/slick.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/fontawesome.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/custom.js'); ?>"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/2.1.0/sweetalert2.min.js"></script>
    <script src="<?php echo base_url('public/js/event.js'); ?>"></script>
    <script>
          $('.select2').select2();
    </script>

 
</body>
</html>