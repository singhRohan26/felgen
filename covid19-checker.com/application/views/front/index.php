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
        <div class="loader"></div>
        <!--header start-->
        <div class="header mobhead">
            <div class="headertop boxs">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="<?php echo base_url();?>">
                                    <img src="<?php echo base_url('public/front/');?>img/white.png" class="img-responsive" alt="logo">
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
            <div class="funnel boxes" id="step1">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                       <div class="hide_res pro_font"> <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="15%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy locate boxes">
                        <h1>Which gender are you?</h1>
                        <div class="btns boxes">
                        	<input type="hidden" value="" class="hide_input" id="gender_val"> 
                            <div class="row"> 
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme" type="button"
                                 active nextme data-id="2" name="next" data-val="Male">Male</button>
                            </div>
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme padd_top1" 
                                type="button" active nextme data-id="2" name="next" data-val="Female">Female</button>
                            </div>
                            </div>
                            <div class="row">  
                                <div class="col-sm-6  col-sm-offset-3 same1 ">
                                    <button class="btn btn-outline-success btn_1 active nextme padd_top1" 
                                    type="button" active nextme data-id="2" name="next" data-val="Other">Other</button>
                                </div>  
                            </div>                                                 
                        </div>
                    </div>
                 </div>
            </div>
            <div class="funnel boxes" id="step2">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                       <div class="hide_res pro_font"> <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="25%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy locate boxes">
                        <h1>Age (Select Range)</h1>
                        <div class="btns boxes">
                            <input type="hidden" value="" class="hide_input" id="age_val"> 
                            <div class="row"> 
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme" type="button"
                                 active nextme data-id="3" name="next" data-val="0-33 years old">0-33 years old</button>
                            </div>
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme padd_top1" 
                                type="button" active nextme data-id="3" name="next" data-val="34-66 years old">34-66 years old</button>
                            </div>    
                        </div>
                        <div class="row">  
                            <div class="col-sm-6  col-sm-offset-3 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme padd_top1" 
                                type="button" active nextme data-id="3" name="next"  data-val="66-99">66-99</button>
                            </div>    
                            </div>  
                        </div>
                     <div class="btns boxes">
                            <button type="button" style="margin-top: 30px;" class="active backBtn prevme" data-id="1" name="prev"  >
                                <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <p class="back1">back</p></span></button>
                           </div>
          
                    </div>
                </div>
            </div>
            <div class="funnel boxes" id="step3">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                      <div class="hide_res pro_font">  <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="40%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy provide_head boxes">
                        <h1>Do you have any active diseases? (Multiple choice)</h1>
                        <div class="btns customCheck boxes diseases_check">
                            <input type="checkbox" id="box-1" name="disease[]" class="no_diseases" value="No">
                            <label for="box-1" >No</label>
                          
                            <input type="checkbox" class="yes_diseases" name="disease[]" id="box-2" value="Cardiovascular disease">
                            <label for="box-2">Cardiovascular disease</label>
                          
                            <input type="checkbox" class="yes_diseases" name="disease[]" id="box-3" value="Diabetes">
                            <label for="box-3">Diabetes</label> 
                            <input type="checkbox" class="yes_diseases" name="disease[]" id="box-4" value="Autoimmune disease">
                            <label for="box-4">Autoimmune disease</label> 
                            <input type="checkbox" class="yes_diseases" name="disease[]" id="box-5" value="Respiratory system disease ( e.g. asthma)">
                            <label for="box-5">Respiratory system disease ( e.g. asthma)</label> 
                            <input type="checkbox" class="yes_diseases" name="disease[]" id="box-6" value="Liver or kidney disease">
                            <label for="box-6">Liver or kidney disease</label> 
                            <input type="checkbox" class="yes_diseases" name="disease[]" id="box-7" value="Cancer">
                            <label for="box-7">Cancer</label> 
                            <input type="checkbox" class="yes_diseases" name="disease[]" id="box-8" value="high blood pressure">
                            <label for="box-8">high blood pressure</label> 
                        </div>
                       <div class="btns boxes">
                        <div class="boxcenter quote_note contBtns">
                            <div class="after1">
                                <button type="button" class="active backBtn prevme" data-id="2" name="prev">
                                    <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                        <p class="back1 active">back</p></span></button>
                            </div>
                        <div class="cont">
                        <button class="btn btn-outline-success nomrg active nextme btn-fnnl" type="button" 
                        active nextme data-id="4" name="next">Continue <span><i class="fa fa-angle-right" 
                            aria-hidden="true"></i></span></button>
                            </div>
                    </div>
                       </div>
                    </div>
                </div>
            </div>
            

            <div class="funnel boxes" id="step4">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                       <div class="hide_res pro_font"> <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="25%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy locate boxes">
                        <h1>Are you a Smoker?</h1>
                        <div class="btns boxes">
                            <input type="hidden" value="" class="hide_input" id="smoker_val"> 
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme" type="button"
                                 active nextme data-id="5" name="next" data-val="Yes">Yes</button>
                            </div>
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme padd_top1" 
                                type="button" active nextme data-id="5" name="next" data-val="Yes">No</button>
                            </div>      
                        </div>
                           
                        <div class="btns boxes">
                            <button type="button" style="margin-top: 30px;" class="active backBtn prevme" data-id="3" name="prev"  >
                                <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <p class="back1">back</p></span></button>
                           </div>
          
                    </div>
                </div>
            </div>
            
            <div class="funnel boxes" id="step5">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                      <div class="hide_res pro_font">  <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="40%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy provide_head boxes">
                        <h1>Have you been in any of these risk areas in the past 14 days? (Multiple Choice)</h1>
                        <div class="btns customCheck clmnBoxgap boxes city_chk">
                            <div class="col-sm-6">
                                <input type="checkbox" class="no_city" name="city[]" id="cbox-1" value="No">
                                <label for="cbox-1" >No</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-2"  value="China">
                                <label for="cbox-2" >China</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-3" value="Hong Kong">
                                <label for="cbox-3" >Hong Kong</label> 
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-4" value="Iran">
                                <label for="cbox-4" >Iran</label> 
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-5" value="Italy">
                                <label for="cbox-5" >Italy</label> 
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-6" value="Japan">
                                <label for="cbox-6" >Japan</label> 
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-7" value="Singapore">
                                <label for="cbox-7" >Singapore</label> 
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-8" value="South Korea">
                                <label for="cbox-8" >South Korea</label> 
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-9" value="United States">
                                <label for="cbox-9" >United States</label> 
                            </div>  
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-10" value="France">
                                <label for="cbox-10" >France</label> 
                            </div>    
                            <div class="col-sm-6">    
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-11" value="Germany">
                                <label for="cbox-11" >Germany </label> 
                            </div>
                            <div class="col-sm-6">
                                <input type="checkbox" class="yes_city" name="city[]" id="cbox-12" value="Spain">
                                <label for="cbox-12" >Spain</label> 
                            </div>    
                        </div>
                      <div class="btns boxes">
                        <div class="boxcenter quote_note contBtns">
                            <div class="after">
                                <button type="button" class="after active backBtn prevme" data-id="4" name="prev">
                                    <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                        <p class="back1">back</p></span></button>
                            </div>
                        <div class="cont">
                        <button class="btn btn-outline-success nomrg active nextme btn-fnnl" type="button" 
                        active nextme data-id="6" name="next">Continue <span><i class="fa fa-angle-right" 
                            aria-hidden="true"></i></span></button>
                            </div>
                    </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="funnel boxes" id="step6">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                       <div class="hide_res pro_font"> <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="25%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy locate boxes">
                        <h1>Are you experiencing Dry cough? </h1>
                        <div class="btns boxes">
                            <input type="hidden" value="" class="hide_input" id="cough_val"> 
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme cough_chk" type="button"
                                 active nextme data-id="7" data-val="yes" name="next">Yes</button>
                            </div>
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme padd_top1 cough_chk" 
                                type="button" active nextme data-id="7" data-val="No"  name="next">No</button>
                            </div>      
                        </div>
                    <button type="button" style="margin-top: 30px;" class="active backBtn prevme" data-id="5" name="prev"  >
                                <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <p class="back1">back</p></span></button> 
          
                    </div>
                </div>
            </div>
            <div class="funnel boxes" id="step7">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                       <div class="hide_res pro_font"> <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="25%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy locate boxes">
                        <h1>Do you have Fever from 38°C or (100.4 ° F)?</h1>
                        <div class="btns boxes">
                            <input type="hidden" value="" class="hide_input" id="temp_val"> 
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme temp_chk" type="button"
                                 active nextme data-id="8" name="next" data-val='yes'>Yes</button>
                            </div>
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme padd_top1 temp_chk" 
                                type="button" active nextme data-id="8" data-val="No" name="next">No</button>
                            </div>      
                        </div>
                     <button type="button" style="margin-top: 30px;" class="active backBtn prevme" data-id="6" name="prev"  >
                                <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <p class="back1">back</p></span></button>
          
                    </div>
                </div>
            </div>
            <div class="funnel boxes" id="step8">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                       <div class="hide_res pro_font"> <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="25%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy locate boxes">
                        <h1>Do you have difficulty in breathing / shortness of breath? </h1>
                        <div class="btns boxes">
                        	<input type="hidden" value="" class="hide_input" id="breath_val"> 
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme breath_sub" type="button"
                                 active nextme data-id="9"  name="next" data-val="Yes">Yes</button>
                            </div>
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme padd_top1 breath_sub" 
                                type="button" active nextme data-id="9"  data-val="No" name="next">No</button>
                            </div>      
                        </div>
                    <button type="button" style="margin-top: 30px;" class="active backBtn prevme" data-id="7" name="prev"  >
                                <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <p class="back1">back</p></span></button> 
          
                    </div>
                </div>
            </div>
            <div class="funnel boxes" id="step9">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                       <div class="hide_res pro_font"> <p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="25%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy locate boxes">
                        <h1>Did you came in contact with a confirmed illness person ?</h1>
                        <div class="btns boxes">
                            <input type="hidden" value="" class="hide_input" id="person_val"> 
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme" type="button"
                                 active nextme data-id="10" name="next" data-val="Yes">Yes</button>
                            </div>
                            <div class="col-sm-6 col-xs-6 same1 ">
                                <button class="btn btn-outline-success btn_1 active nextme padd_top1" 
                                type="button" active nextme data-id="10" name="next" data-val="No">No</button>
                            </div>      
                        </div>
                   <button type="button" style="margin-top: 30px;" class="active backBtn prevme" data-id="8" name="prev"  >
                                <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <p class="back1">back</p></span></button> 
          
                    </div>
                </div>
            </div>
            <div class="funnel boxes" id="step10">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                       <div class="hide_res pro_font"><p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar"></div>
                                <div class="now" data="80%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy boxes">
                        <h1 class="hide_res">Who do we send the report to?</h1>
                        <div class="btns boxes">
                            <div class="cont">
                                <div class="boxcenter">
                                    <input class="btn_2" type="text" name="name" id="user_name" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="cont">
                                <div class="boxcenter">
                                    <input class="btn_2 nomrg" type="number" name="number" id="user_number" placeholder="Enter your number">
                                </div>
                            </div>
                            <div class="cont">
                                <div class="boxcenter">
                                    <input class="btn_2 nomrg" type="email" name="email" id="user_email" placeholder="Enter your email">
                                </div>
                            </div>
                           
                                <div class="boxcenter quote_note contBtns">
                                        <div class="after2">
                                    <button type="button" class=" active backBtn prevme" data-id="9" name="prev"  >
                                        <span><i class="fa fa-angle-left" aria-hidden="true"></i>
                                            <p class="back1">back</p></span></button>
                                   </div>
                                    <div class="cont">
                                    <button class="btn btn-outline-success btn-fnnl" type="button" id="form_submit" data-url="<?php echo base_url('home/doAddDetail');?>" >Continue <span><i class="fa fa-angle-right" 
                                        aria-hidden="true"></i></span></button>
                                    <!--<button class="btn btn-outline-success nomrg active nextme btn-fnnl" type="button" -->
                                    <!--active nextme data-id="11" id="form_submit" data-url="<?php echo base_url('home/doAddDetail');?>" name="next">Continue <span><i class="fa fa-angle-right" -->
                                    <!--    aria-hidden="true"></i></span></button>-->
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
    </div>

<div class="funnel boxes" id="step11">
        <div class="container container_res">
            <div class="funnel_1 boxes">
                <div class="hide_res pro_font"><p>PROGRESS</p>
                <div class="pg">
                    <div class="progressWrapper">
                        <div class="progressBar beforefill"></div>
                        <div class="now" data="100%"></div>
                    </div>
                </div>
            </div>
            </div>
            <div class="funnel_bdy all_done boxes">
                <h1><span>Pay now to access Result.</span></h1>
                <span style="color: #fff">With this donation you are directly assisting in the research of the covid-19 vaccine.</span>
                <div class="btns boxes">
                <div class="boxcenter quote_note contBtns">
                    <div class="cont">
                <div class="col-sm-6 col-xs-6 same1">
                    <button class="btn btn-outline-success btn_1" 
                    type="button" data-toggle="modal" data-target="#myModal" > <i class="fa fa-lock" aria-hidden="true" ></i> Pay Now 5 $</button>
                    </div>
                </div>
                </div>
                </div> 
             </div>  
        </div>
    </div>
</div>
            <div class="funnel boxes" id="step12">
                <div class="container container_res">
                    <div class="funnel_1 boxes">
                        <div class="hide_res pro_font"><p>PROGRESS</p>
                        <div class="pg">
                            <div class="progressWrapper">
                                <div class="progressBar beforefill"></div>
                                <div class="now" data="100%"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="funnel_bdy all_done boxes">
                        <h1><span>Result.</h1>
                    <!--    <p class="posGreen"><span>Green</span>-->
                    <!--    : Based on your information, you do not show any symptoms of a disease with the COVID-19-->
                    <!--     virus. However, if you experience symptoms of ( dry cough , fever above 38 ° C or (100.4 ° F) -->
                    <!--     or difficulty breathing / shortness of breath ), call your doctor. You or he decides whether -->
                    <!--     a medical examination needs to be carried out or whether it-->
                    <!--     is sufficient if you stay at home and take care of yourself.</p>-->
                    <!--     <p class="repYellow"><span>Yellow</span>-->
                    <!--        :Based on your information, you show symptoms. You can take care of yourself. -->
                    <!--        Do not leave the house until 24 hours after your symptoms have subsided,-->
                    <!--         so that you do not infect other people. Observe the rules of hygiene and behavior. (LINK WHO)-->
                    <!--    </p>-->
                    <!--    <p class="negRed"><span>Red</span>-->
                    <!--   : Based on your information, they show a higher risk of becoming seriously ill. -->
                    <!--    Call your doctor immediately. You or he decides whether a medical examination needs to be carried -->
                    <!--    out or whether it is sufficient if you stay at home and take care of yourself.-->
                    <!--</p>-->
                    
                    <p class="posGreen"><span>Green</span>
                        : Based on your information, you do not show any symptoms of a disease with the COVID-19 virus.
                        However, if you experience symptoms of ( dry cough , fever above 38 ° C or (100.4 ° F) or difficulty breathing / shortness of breath ), call your doctor. 
                        You decides whether a medical examination needs to be carried out or whether it is sufficient if you stay at home and take care of yourself.</p>
                         <p class="repYellow"><span>Yellow</span>
                            :Based on your information, you show symptoms. You can take care of yourself. 
                            Do not leave the house until 24 hours after your symptoms have subsided, so that you do not infect other people.
                            Observe the rules of hygiene and behavior or call your doctor.
                        </p>
                        <p class="negRed"><span>Red</span>
                       : Based on your information, you show a higher risk of becoming seriously ill. Call your doctor immediately. 
                       You decides whether a medical examination needs to be carried out or whether it is sufficient if you stay at home and take care of yourself.
                    </p>
                     </div>  
                </div>
            </div>
        </div>


     <!-- payment info Modal -->
     <div class="modal fade paymentinfo" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="forcross">×</span></button>
                </div>
                
                <div class="modal-body payinfo ">
                    <h2 class="letstalk">Pay Now</h2>
                    <form id="stripe_form" method="post" action="<?php echo base_url('home/payPayment');?>">
                    	<div class="payment-status text-danger"></div>
                        <div class="col-sm-12 nopadding">
                            <div class="form-group inputWithIcon">
                                <input name="cardno" id="acc" type="number" placeholder="Card No" required="" class="form-control">
                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                            </div>
                            <div class="form-group inputWithIcon">
                                <input type="text" id="holder_name" name="name" placeholder="Holder Name" required="" class="form-control">
                                <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                           <div class="col-sm-4 nopadding">
                                <div class="form-group inputWithIcon">
                                    <input name="month" id="month" type="number" placeholder="Expiry Month (MM)" required="" class="form-control">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                           </div>
                           <div class="col-sm-4 noright">
                                <div class="form-group inputWithIcon">
                                    <input name="year" id="year" type="number" placeholder="Expiry Year (YY)" required="" class="form-control">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                           </div>
                           <div class="col-sm-4 noright">
                            <div class="form-group inputWithIcon">
                                <input name="cvv" id="cvv" type="number" placeholder="CVV" required="" class="form-control">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                           </div>
                        
                        </div>
                        <div class="boxs">
                            <button type="submit" id="payment_btn">Pay $5</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<style>
    iframe{
        display: none !important;
    }
    body{
        top: 0px !important;
    }
</style>
<!-- payment info Modal END  -->

        <!-- footer start -->
        <div class="footer boxs" id="contact">
            
            <div class="boxs">
                  <p>This is not an official test for COVID-19. 
                    This test is only based on your given dates,
                     your active diseases and your symptoms.
                      The company Coiner GmbH based in Switzerland 
                      does not take any responsibility or accountability 
                      for the results. The result of this test can help you 
                      to decide if you should contact your doctor or hospital.
                       The official test is then done with a blood draw or a 
                       saliva sample.
                    
                </p>
                   <h2>Coiner GmbH, Kirchgasse 2, Kölliken / Schweiz©2020 COVID19-Checker. All Rights Reserved. <span><a href="<?php echo base_url('Home/policy');?>" target="_blank">Privacy Policy</a></span></h2>
            </div>
        </div>
        <!--footer end-->

      
       
        <script src="<?php echo base_url('public/front/')?>js/jquery.min.js"></script>
        <script src="<?php echo base_url('public/front/')?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('public/front/')?>js/custom.js"></script>
        <script src="https://js.stripe.com/v2/"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        
        <script type="text/javascript">
        	$(document).on('click', '.diseases_check .no_diseases', function(){
        	    if($(".no_diseases").prop('checked') == true){
        			$(".yes_diseases").attr('disabled', true);
        			$(".yes_diseases").prop("checked",false);
        		}else {
        			$(".diseases_check input").removeAttr("disabled");
        		}
        	});
        	$(document).on('click', '.diseases_check .yes_diseases', function(){
        	    if($(".yes_diseases").prop('checked') == true){
        			$(".no_diseases").attr('disabled', true);
        			$(".no_diseases").prop("checked",false);
        		}else {
        			$(".diseases_check input").removeAttr("disabled");
        		}
        	});
        	$(document).on('click', '.city_chk .no_city', function(){
        	    if($(".no_city").prop('checked') == true){
        			$(".yes_city").attr('disabled', true);
        			$(".yes_city").prop("checked",false);
        		}else {
        			$(".city_chk input").removeAttr("disabled");
        		}
        	});
        	$(document).on('click', '.city_chk .yes_city', function(){
        	    if($(".yes_city").prop('checked') == true){
        			$(".no_city").attr('disabled', true);
        			$(".no_city").prop("checked",false);
        		}else {
        			$(".city_chk input").removeAttr("disabled");
        		}
        	});
         	$(document).on('click', '.breath_sub', function(){
         		
         		var city = [];
               $('.city_chk input').each(function(){
	              if($(this).prop('checked') == true){
                     city.push($(this).val());
	              }
                })
         		var cough = $("#cough_val").val();
         		var temp = $("#temp_val").val();
         		if((city == "No" && cough == "No") || (city == "No" && temp == "No") || (cough == "No" && temp == "No") || (city == "No" && cough == "No" && temp == "No")) {
         			$("#step9").hide();
         			$("#step10").show();
         		}
         	})
         	$(document).on('click', '#form_submit', function(){
         		var city = [];
         		var disease = [];
         		var url = $(this).data('url');
               $('.city_chk input').each(function(){
	              if($(this).prop('checked') == true){
                     city.push($(this).val());
	              }
                })
               $('.diseases_check input').each(function(){
	              if($(this).prop('checked') == true){
                     disease.push($(this).val());
	              }
                })
         		var gender = $("#gender_val").val();
         		var age = $("#age_val").val();
         		var smoker = $("#smoker_val").val();
         		var age = $("#age_val").val();
         		var cough = $("#cough_val").val();
         		var temp = $("#temp_val").val();
         		var breath = $("#breath_val").val();
         		var person = $("#person_val").val();
         		var user_name = $("#user_name").val();
         		var user_number = $("#user_number").val();
         		var user_email = $("#user_email").val();
         		$(".error_gen_chk").remove();
         		if(user_name == "" || user_number == "" || user_email == ""){
         			if(user_name == "" && user_number == "" && user_email == ""){
         				$("#user_name").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Name</span>');
         				$("#user_number").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Number</span>');
         				$("#user_email").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Email</span>');
         				$("#user_name").focus();
         			}else if(user_name == "" && user_number == ""){
         				$("#user_name").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Name</span>');
         				$("#user_number").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Number</span>');
         				$("#user_name").focus();
         			}else if(user_number == "" && user_email == ""){
         				$("#user_number").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Number</span>');
         				$("#user_email").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Email</span>');
         				$("#user_number").focus();
         			}else if(user_name == "" && user_email == ""){
         				$("#user_name").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Name</span>');
         				$("#user_email").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Email</span>');
         				$("#user_name").focus();
         			}else if(user_number == ""){
			            $("#user_number").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Number</span>');
			            $("#user_number").focus();
			        }else if(user_name == ""){
         				$("#user_name").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Name</span>');
         				$("#user_name").focus();
			        }else if(user_email == ""){
			            $("#user_email").parent(".boxcenter").after('<span class="error_gen_chk text-danger">Please Enter User Email</span>');
			            $("#user_email").focus();
			        }
		        } else{
		            $(".loader").fadeIn("slow");
		        	$.post(url,{gender:gender,age:age,smoker:smoker,cough:cough,temp:temp,breath:breath,person:person,user_name:user_name,user_number:user_number,user_email:user_email,city:city,disease:disease}, function(out){
		        	    $(".loader").fadeOut("slow");
		        	    window.location.href=out.url;
	         		})
		        }
         		
         	}) 


        </script>
     
        <script>
// Set your publishable key
     Stripe.setPublishableKey('pk_live_itDsxpWkrkvDNLUEIfsGNXOl00NbEMM7Ua');
    // Stripe.setPublishableKey('pk_test_9L1k4zZVwLGPryDSCyGRSv0m00Z3hroU7f');
// Callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            // Enable the submit button
            $('#payment_btn').removeAttr("disabled");
            // Display the errors on the form
            $(".payment-status").html('<p>' + response.error.message + '</p>');
        } else {
            var form$ = $('#stripe_form');
            // Get token id
            var token = response.id;
            // Insert the token into the form
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' /><input type='hidden' name='pay_payment' value='pay_payment' />");
            // Submit form to the server
            form$.get(0).submit();
        }
    }
    
  	 $(document).ready(function () {
	        $('#stripe_form').validate({ // initialize the plugin
	            rules: {
	                name: {
	                    required: true,
	                    minlength: 3
	                },
	                cardno: {
	                    required: true,
	                    minlength: 16
	                    
	                },
	                month: {
	                    required: true
	                },
	                year: {
	                    required: true
	                },
	                cvv: {
	                    required: true,
	                    minlength: 3
	                }
	            }
	        });
	    });
    // On form submit
    $(document).on('submit', '#stripe_form', function (evt) {
        evt.preventDefault();
        // Disable the submit button to prevent repeated clicks
        $('#payment_btn').attr("disabled", "disabled");
        
//        var month = $('.carddropbtn1').children('span').text();
//        var year = $('.carddropbtn2').children('span').text();
        // Create single-use token to charge the user
        Stripe.createToken({
            number: $('#acc').val(),
            exp_month: $('#month').val(),
            exp_year: $('#year').val(),
//            exp_month: month,
//            exp_year: year,
            cvc: $('#cvv').val()
        }, stripeResponseHandler);

        // Submit from callback
        return false;
    });
</script>
<script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
         </script>

     <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    </body>
</html>