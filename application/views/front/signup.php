<section class=" mainmargin mainmargin1 boxs all_top">
</section>

<section class="payment_mode boxs">
    <div class="pay_inner sign_inner">
        <div class="heading_b">
            <h2>Anmelden</h2>
        </div>
        <div class="all_forms_pad boxs">
            <div class="account">
                <h4>Neues Konto</h4>
            </div>
            <form method="post" id="common-form" action="<?php echo base_url('Site/register'); ?>">
                <div class="error_msg"></div>
                <div class="form-group ">
                    <label>Vollständiger Name</label>
                    <input type="text" class="form-control" placeholder="Jonathan Coleman" id ="name" name="name">
                </div>
                <div class="form-group">
                    <label>E-Mail-Addresse</label>
                    <input type="email" class="form-control" placeholder="abcd@gmail.com" id ="email" name="email">
                </div>
                <div class="form-group ">
                    <label>Passwort erstellen</label>
                    <input type="password" class="form-control" placeholder="**************" id ="password" name="password">
                </div>
                <div class="form-group ">
                    <label>Kennwort erneut eingeben</label>
                    <input type="password" class="form-control" placeholder="**************" id ="cpassword" name="cpassword">
                </div>
                <div class="pay_btn1 btn2 addhover boxs">
                    <button type="submit">REGISTRIEREN & FORTSETZEN</button>
                </div>
                <div class="already_acc boxs ">
                    <p>Sie haben bereits ein Konto ?<a href="<?php echo base_url('login_username'); ?>">Einloggen</a></p>
                </div>
            </form>
        </div>
    </div>
</section>