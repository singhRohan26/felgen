<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url('public/front/');?>img/black.png" sizes="16x16">
        <title><?php echo $title;?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/front/')?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/front/')?>css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/front/')?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/front/')?>css/media.css">
        <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '205594684044371');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=205594684044371&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
    </head>
    <body>
        <!--header start-->
        <div class="header">
            <div class="headertop boxs">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url('public/front/');?>img/white.png" class="img-responsive" alt="logo">
                                <!--<span>COVID19-Checker</span>-->
                                </a>
                                 <div id="google_translate_element"></div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
              </div>
        <!--header end-->
        
       
        <div class="funnel_main boxs">
            <div class="funnel boxes" id="step12">
                <div class="container container_res">
                    <div class="funnel_bdy all_done boxes">
                        <h1><span>Result.</h1>
                        
                     </div>  
                </div>
            </div>
            
        </div>


     

     

        <!-- footer start -->
        <div class="footer boxs" id="contact">
            
            <div class="boxs">
                <p>This is not an official test for COVID-19. This test is only based on your given dates, your active diseases and your symptoms. The company Coiner GmbH based in Switzerland does not take any responsibility or accountability for the results. The result of this test can help you to decide if you should contact your doctor or hospital. The official test is then done with a blood draw or a saliva sample. 
                </p>
                <h2>© 2020 COVID19-Checker. All Rights Reserved.</h2>
            </div>
        </div>
        <!--footer end-->

<style>
    iframe{
        display: none !important;
    }
    body{
        top: 0px !important;
    }
</style>
      
       
        <script src="<?php echo base_url('public/front/')?>js/jquery.min.js"></script>
        <script src="<?php echo base_url('public/front/')?>js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
        </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>