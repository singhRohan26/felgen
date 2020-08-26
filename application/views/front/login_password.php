<section class="payment_mode mainmargin mainmargin1 boxs all_top">

        <div class="pay_inner  login_inner login2">

                  <div class="heading_b">

                <h2>Einloggen</h2>

            </div>

            <div class="all_forms_pad boxs">

            <div class="account wel_img">

                <h6>Willkommen zurück !</h6>

                <span><?php echo $user['name']; ?></span>

            </div>

            <form id ="common-form" method="post" action="<?php echo base_url('Site/doLoginPassword/'.$user['user_id']); ?>">

                <div class="error_msg"></div>

                <div class="form-group">

                    <label>Passwort</label>

                    <input type="password" class="form-control" placeholder="**********" id ="password" name="password">

                    <span><a href="<?php echo base_url('forgot-password'); ?>" class="forgopass">Passwort vergessen ?</a></span>

                </div>

                <div class="pay_btn1 btn2 addhover boxs">

                    <button type="submit">Einloggen</button>

                </div>

                

                <div class="already_acc boxs ">

                    <p>Sie haben noch kein Konto?<a href="<?php echo base_url('signup'); ?>">Anmelden</a></p>

                </div>

            </form>

        </div>

        </div>

    </section>