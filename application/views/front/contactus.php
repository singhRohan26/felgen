<section class=" mainmargin boxs all_top ">
</section>
<section class="contact boxs">
    <div class="container-fluid">
        <div class="contact_inner boxs">
            <h2>Kontaktiere uns</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="pay_inner  contact_uss">
                        <form method="post" id="common-form" action="<?php echo base_url('Site/doContactUs'); ?>">
                            <div class="error_msg"></div>
                            <div class="form-group ">
                                <label>Vollständiger Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Name" id ="name" name="name">
                            </div>
                            <div class="form-group">
                                <label>E-Mail-Addresse</label>
                                <input type="email" class="form-control" placeholder="Enter Your E-mail" id ="email" name="email">
                            </div>
                            <div class="form-group ">
                                <label>Botschaft</label>
                                <textarea class="form-control" id ="message" name="message" placeholder="Enter Message"></textarea>
                            </div>
                            <div class="pay_btn1 btn2 addhover boxs">
                                <button type="submit">einreichen</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class ="contact_right">
                        <img src ="<?php echo base_url('public/images/location01.svg'); ?>" class ="img-fluid" alt ="location 01">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>