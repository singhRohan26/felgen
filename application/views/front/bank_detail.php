<section class=" mainmargin mainmargin1 boxs">
</section>

<section class="payment_mode boxs">
    <div class="pay_inner bank_dlt">
        <div class="heading_b">
            <h2>Bankdaten</h2>
        </div>
        <div class="all_forms_pad boxs">
	        <form id="common-form" method="post" action="<?php echo base_url('Site/doUpdateBankDetail/'.$user['user_id']); ?>">
	        	<div class="error_msg"></div>
	            <div class="form-group">
	                <input type="text" class="form-control" placeholder="Enter Bank Name" id="bank_name" name="bank_name">
	            </div>
	            <div class="form-group">
	                <input type="text" class="form-control" placeholder="Enter Branch Name" id="branch_name" name="branch_name">
	            </div>
	            <div class="form-group">
	                <input type="password" class="form-control" placeholder="Enter Account Number Number" id="acc_no" name="acc_no">
	            </div>
	            <div class="form-group ">
	                <input type="password" class="form-control" placeholder="Re-Enter Account Number" id="cacc_no" name="cacc_no">
	            </div>
	            <div class="form-group ">
	                <input type="text" class="form-control" placeholder="Enter IFSC Code" id="ifsc" name="ifsc">
	            </div>
	            <div class="form-group ">
	                <input type="text" class="form-control" placeholder="Enter Recipient name" id="recipient" name="recipient">
	            </div>
	            <div class="pay_btn1 btn2 addhover boxs">
	                <button type="submit">FORTSETZEN</button>
	            </div>
	            <div class="pay_btn1 btn3 addhover boxs">
	                <button type="button" onclick="window.location.href='<?php echo base_url('Site') ?>'">Überspringen und fortfahren</button>
	            </div>
	        </form>
	    </div>
    </div>
</section>