  <!--    payment start-->

    <section class="payment_mode boxs all_top">

        <div class="pay_inner">



            <div class="heading_b">

                <h2>Zahlungsart</h2>

            </div>

             <div class="all_forms_pad boxs">

            <form id ="stripe_form" method="post" action="<?php echo base_url('Post/stripe/'.$postPrice.'/'.$post_id) ?>">
                <div class="error_msg"></div>
               
                <div class="debait_card boxs">



                   



                </div>
               
                <div class="form-group visa_back boxs">

                    <input type="number" class="form-control" placeholder="1234 - XXXX - XXXX - 1244" id ="acc" name="acc">

                    <span class="visa"><img src="<?php echo base_url('public/') ?>images/visa.svg" class="img-fluid" alt="visa"></span>

                </div>



                <div class="form-group boxs">

                    <input type="text" class="form-control" placeholder="Holder Name" id ="name" name="name">

                </div>



                <div class="form-group expire_date boxs">

                    <input type="text" class="form-control" placeholder="Expiry Month" id ="month" name="month">

                </div>
                <div class="form-group expire_date expire_date121 boxs">

                    <input type="text" class="form-control" placeholder="Expiry Year" id ="year" name="year">

                </div>

                <div class="form-group cvv boxs">

                    <input type="number" class="form-control" placeholder="CVV" id ="cvv" name="cvv">

                </div>

                <div class="pay_btn1 addhover boxs">

                    <button id="payment_btn" type="submit">PAY NOW<span><img src="<?php echo base_url('public/images/currency.svg') ?>" class="img-fluid" alt="currency"><b><?php echo $postPrice; ?></b></span></button>

                </div>

            </form>

        </div>

        </div>

    </section>

    <!--    payment start-->