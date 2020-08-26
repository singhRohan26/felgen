<section class="payment_mode mainmargin mainmargin1 boxs all_top">
    <div class="pay_inner  login_inner">
        <div class="heading_b">
            <h2>Einloggen</h2>
        </div>
        <div class="all_forms_pad boxs">
            <div class="account">
                <h5>Willkommen zurück !</h5>
            </div>
            <form id ="common-form" method="post" action="<?php echo base_url('Site/doLoginUsername'); ?>">
                <div class="error_msg"></div>
                <div class="form-group">
                    <label>E-Mail-Addresse</label>
                    <input type="email" class="form-control" placeholder="Enter Your E-mail" id="email" name="email">
                </div>
                <div class="pay_btn1 btn2 addhover boxs">
                    <button type="submit">FORTSETZEN</button>
                </div>
                <div class="or_login boxs">
                    <p>oder melde dich an mit</p>
                    <ul>
                        <li class ="first_li"><a class="g-signin2" href="" data-url="<?php echo base_url("Site/oauth2callback");?>" data-onsuccess="onSignIn"><img src="<?php echo base_url('public/images/google.svg'); ?>" class="img-fluid"></a></li>
                        <li class="fbButton"><a href="<?php echo $this->facebook->login_url(); ?>"><img src="<?php echo base_url('public/images/fb.png'); ?>" class="img-fluid" alt="fb"><span>Sign-In</span></a></li>
                    </ul>
                </div>
                <div class="already_acc boxs ">
                    <p>Sie haben noch kein Konto?<a href="<?php echo base_url('signup'); ?>">Anmelden</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://apis.google.com/js/platform.js" async defer></script>
 <script>
  function onSignIn(googleUser) {
    var url = $(".g-signin2").data('url');
    var profile = googleUser.getBasicProfile();
    var name = profile.getName();
    var email = profile.getEmail();
    $.post(url, {name : name, email : email}, function(res){
      if(res.result === 1){
        window.location.href= "<?php echo base_url('/');?>";
      }
    })
  }

  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  
    window.onbeforeunload = function(e){
      gapi.auth2.getAuthInstance().signOut();
    };

  function onLoad() {
    gapi.load('auth2', function() {
      gapi.auth2.init();
    });
  }

  $(document).on('click', '.logout', function (evt) {
        evt.preventDefault();
        var url = $(this).attr("href");
        $.post(url, function(res){
            if(res.result === 1){
                var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function () {
                    window.location.href= "<?php echo base_url();?>";
              });
            }
        })     
     });
</script>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>