<!--    myprofile start-->



    <section class="my_profile boxs">

        <div class="container">

            <div class="profile_inner boxs">

                <h2>Mein Profil</h2>

                <div class ="peronal_dtl boxs">

                <ul class="nav nav-tabs">

                    <li><a href="javascript:void(0)" class="clicktab active" data-type="1">Persönliche Daten</a></li>

                    <li><a href="javascript:void(0)" class="clicktab" data-type="2">Bankdaten</a></li>

                    <li><a href="javascript:void(0)" class="clicktab" data-type="3">Passwort ändern</a></li>

                </ul>

                </div>

                <div class="prof_form boxs payDtl payDtl1">
 <form id ="profile-form" method="post" action="<?php echo base_url('Site/doupdateprofile') ?>" enctype="multipart/form-data">
                <div id="error_msg"></div>
                    <div class="row">

                         
                        <div class="col-md-3">


                            <div class="avatar-upload">
                               <div class="error_msg"></div>

                                <div class="avatar-edit">

                                    <input type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" />

                                    <label for="imageUpload"></label>

                                </div>

                                <div class="avatar-preview">
                                     <?php if(!empty($user['image'])) { ?>
                                    <div id="imagePreview" style="background-image: url(<?php echo base_url('uploads/profile-images/'.$user['image']) ?>);">
                                    <?php }else{ ?>
                                    <div id="imagePreview" style="background-image: url(<?php echo base_url('public/images/user.png') ?>);">
                                    <?php } ?>
                                    </div>

                                </div>

                            </div>
                             
                            <div class="avtar_name">

                                <h2><?php  echo $user['name'] ?></h2>

                            </div>

                        </div>

                        <div class="col-md-9">

                            

                                 

                            <div class="full_form boxs">

                           

                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Vollständiger Name</label>

                                        <input type="text" class="form-control" value="<?php  echo $user['name'] ?>" id ="name" name="name">

                                    </div>

                                </div>



                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>E-Mail-Addresse</label>

                                        <input type="email" class="form-control" value="<?php  echo $user['email'] ?>" id ="email" name="email" disabled>

                                    </div>

                                </div>



                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Kontakt Nummer</label>

                                        <input type="text" class="form-control" value="<?php  echo $user['phone'] ?>" id ="number" name="number">

                                    </div>

                                </div>

                            

                            </div>

                            <div class="for_btn boxs">

                                <button type="submit">Aktualisieren</button>

                            </div>


                        </div>

                    </div>
</form>
                </div>

                <div class="prof_form boxs payDtl payDtl2">

                    <div class="row">

                        <div class="col-md-3">



                            <div class="avatar-upload">

                                <div class="avatar-edit">

<!--                                    <input type='file' id="imageUpload2" accept=".png, .jpg, .jpeg" />-->

                                    <label for="imageUpload2"></label>

                                </div>

                                <div class="avatar-preview">
                                    <?php if(!empty($user['image'])) { ?>
                                    <div id="imagePreview" style="background-image: url(<?php echo base_url('uploads/profile-images/'.$user['image']) ?>);"></div>
                                    <?php }else{ ?>
                                    <div id="imagePreview" style="background-image: url(<?php echo base_url('public/images/user.png') ?>);"></div>
                                    <?php } ?>
                                </div>

                            </div>

                            <div class="avtar_name">

                                <h2><?php echo $user['name'] ?></h2>

                            </div>

                        </div>

                        <div class="col-md-9">

                            <form id ="bank_form" method="post" action="<?php echo base_url('Site/doUpdateBankDeatils') ?>">

                            <div class="full_form boxs">
                                <div class="error_msg"></div>
                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Bank Name</label>

                                        <input type="text" class="form-control" value="<?php  echo $user['bank_name'] ?>" id ="bank_name" name="bank_name">

                                    </div>

                                </div>



                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Zweigname</label>

                                        <input type="text" class="form-control" value="<?php  echo $user['branch_name'] ?>" id ="branch" name="branch">

                                    </div>

                                </div>



                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Kontonummer</label>

                                        <input type="number" class="form-control" value="<?php  echo $user['acc_no'] ?>" id ="Acc" name="acc">

                                    </div>

                                </div>





                                

                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>IFSC-Code</label>

                                        <input type="text" class="form-control" value="<?php  echo $user['ifsc_code'] ?>" id ="ifsc" name="ifsc">

                                    </div>

                                </div>



                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Empfängername</label>

                                        <input type="text" class="form-control" value="<?php  echo $user['recipient_name'] ?>" id ="Recipient" name="recipient">

                                    </div>

                                </div>

                            </div>

                            <div class="for_btn boxs">

                                <button type="submit">Aktualisieren</button>

                            </div>

</form>

                        </div>

                    </div>

                </div>

                <div class="prof_form boxs payDtl payDtl3">

                    <div class="row">

                        <div class="col-md-3">



                            <div class="avatar-upload">

                                <div class="avatar-edit">

<!--                                    <input type='file' id="imageUpload3" accept=".png, .jpg, .jpeg" />-->

                                    <label for="imageUpload3"></label>

                                </div>

                                <div class="avatar-preview">
                                    <?php if(!empty($user['image'])) {  ?>
                                    <div id="imagePreview" style="background-image: url(<?php echo base_url('uploads/profile-images/'.$user['image'])  ?>);">
                                     <?php }else{ ?>
                                     <div id="imagePreview" style="background-image: url(<?php echo base_url('public/images/user.png')  ?>);">
                                     <?php }  ?>
                                    </div>

                                </div>

                            </div>

                            <div class="avtar_name">

                                <h2><?php echo $user['name']  ?></h2>

                            </div>

                        </div>

                        <div class="col-md-9">

                            <form id ="change_pass" method="post" action="<?php echo base_url('Site/doUpdatePass') ?>">
                            <div class="full_form boxs">
                                <div class="error_msg"></div>

                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Jetziges Passwort</label>

                                        <input type="password" class="form-control" value="" id ="op" name="op" placeholder="Enter Current Password">

                                    </div>

                                </div>



                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Neues Kennwort</label>

                                        <input type="password" class="form-control" value="" id ="np" name="np" placeholder="Enter New Password">

                                    </div>

                                </div>



                                <div class="form_del boxs">

                                    <div class="form-group">

                                        <label>Kennwort bestätigen</label>

                                        <input type="password" class="form-control" value="" id ="cp" name="cp" placeholder="Re-Enter New Password">

                                    </div>

                                </div>

                            </div>

                            <div class="for_btn boxs">

                                <button type="submit">Aktualisieren</button>

                            </div>

</form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>