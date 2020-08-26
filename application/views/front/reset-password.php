<section class=" mainmargin mainmargin1 boxs all_top">
</section>
<section class="payment_mode for_pass boxs">
    <div class="pay_inner forget_inner">
        <div class="heading_b">
            <h2>Passwort vergessen</h2>
        </div>
        <div class="all_forms_pad boxs">
	        <form method="post" id="common-form" action="<?php echo base_url('Site/update_forgot_password'); ?>">
            <div class="error_msg"></div>
	        	<div class="form-group dom">
	                <label>Neues Passwort eingeben</label>
	                <input type="password" autocomplete="off" class="form-control" placeholder="Enter Password" id ="new_password" name="new_password">
	            </div>
	            <div class="form-group dom">
	                <label>Neues Passwort erneut eingeben</label>
	                <input type="password" autocomplete="off" class="form-control" placeholder="Enter Password" id ="conf_password" name="conf_password">
	            </div>
	            <input type="hidden" name="userid" value="<?php echo $user_id;?>" />
	            <div class="pay_btn1 btn2 addhover boxs">
	                <button type="submit">Passwort zurücksetzen</button>
	            </div>
	        </form>
	    </div>
    </div>
</section>