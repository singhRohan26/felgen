 <section class="subscriptionplan mainmargin boxs all_top" >

        <div class="container-fluid">
             
			  
            <div class="subso boxs">
                
                <button type="button" class="btn btn-light back_btn pull-right" id="back_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                 <h3>Wählen Sie Zahlung</h3>
            </div>

        </div>

    </section>

    <section class="subsAllPlan boxs " style="padding: 100px 0px 162px;">

        <div class="container">

            <div class="subbase subpaypal boxs">

                <div class="row">

                    <div class="col-md-6">

                        <div class="subbase_left boxs">

                            <img src="<?php echo base_url('public/images/payp.png')  ?>" height="100px" width="100px">

                            <div class="subbase_img boxs">
                            </div>

                            <div class="subbase_btn addhover boxs">

                                <a href="<?php echo base_url('Post/paypal/'.$price='5'.'/'.$post_id) ?>">paypal</a>

                            </div>

                        </div>



                    </div>

                    <div class="col-md-6">

                        <div class="subbase_left subbase_lefto boxs">

                            

                            <div class="subase_in">

                                <img src="<?php echo base_url('public/images/stripe.png')  ?>"  height="100px" width="100px">

                            <div class="subbase_img boxs">

                                

                            </div>
                            <div class="subbase_btn subbase_btn12 addhover boxs">

                                <a href="<?php echo base_url('Post/paymentGateway/'.$price='10'.'/'.$post_id) ?>">Stripe</a>

                            </div>

                            </div>

                            <div class="subbase_right">
                                <img src="<?php echo base_url('public/') ?>/images/halfstar.svg" class="img-fluid" alt="star">
                            </div>

                        </div>



                    </div>

                </div>

            </div>

    </section>