
<div class="fullmsg fullmsg1 active boxs">
                <div class="message-content boxs">
                  <div class="rytchattop chatbxrht_top rytchattop1 boxs">
                    <div class="chatimng chatimngchat d-inline-block boxs">
					<?php if(!empty($receiver_user['image'])){ ?>
                      <img src="<?php echo base_url('uploads/profile-images/'.$receiver_user['image']) ?>" class="img-fluid" align="chat1">
					<?php }else{ ?>
					<img src="<?php echo base_url('public/images/user.png') ?>" class="img-fluid" align="chat1">
					<?php } ?>
                    </div>
                    <div class="chatinners chatinners12  d-inline-block">
                        <p><?php echo $receiver_user['name'] ?></p>
                      </div>
					  <div class="chatdel d-inline-block">
				      <?php 
				        if(!empty($chat_id)) {
				      ?>
                        <a href="<?php echo base_url('Post/deletechat/'.$chat_id)  ?>" class="del_chat">Löschen</a>
                       <?php
			                }
                       ?>    
                    </div>
                    
                  </div>
				  
                  <div class="rytchattop rytchattop2 boxs">
                    <div class="chatimng1 d-inline-block boxs">
                        
                      <img src="<?php echo base_url('uploads/posts/'.$postchatimg['media']) ?>" class="img-fluid" align="chat1">
                    </div>
                    <div class="chatinners d-inline-block">
                        <p><?php echo $postdetailchat['title']; ?> <span>€ <?php echo $postdetailchat['price']; ?></span></p>
                    </div>
					<?php if(empty($check)){ ?>
                    <div class="chatdel d-inline-block">
                        <?php if($chatStatus != '0'){ ?>
                            <?php if($user != $postdetailchat['user_id']){ ?>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal1">Deal beenden</a>
                            <?php } ?>
                        <?php } ?>
                    </div>
					<?php } ?>
                  </div>
                 <div class=chat_msg style="width: 100%: display:block;" >
                 <!--  <div class="message-box boxs">
                    <div class="message-box__item outgoing">
                      <div class="name">
                        <div class="box-text tringl tringl2">
                          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
                          <div class="time">7:10 PMss</div>
                        </div> 
                        <div class="chatimng1 chatimng2 boxs">
                        <img src="<?php echo base_url('public/') ?>images/chat2.png" class="img-responsive" alt="chat2">
                    </div>
                      </div>
                    </div>
                   
                    
                  </div> -->
                </div>
                <?php if($chatStatus != '0'){ ?>
                    <div class="message-form boxs" id="texfield">
                        <div class="msgtextarea">
                            <div class="input-group input-groupmsg">
                                <input type="text" class="form-control chat_desc" placeholder ="Write message">
                                <div class="input-group-append">
                                    <span class="input-group-text deep">
                                        <div class="avatar-upload insert_input">
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <a href="javascript:;" class="imggreen img_desc_rec"><img src="<?php echo base_url('public/') ?>images/plane.svg" class="img-fluid" alt="plane"></a>
                        </div>
                    </div>
                <?php } ?>
                    

                  </div>
                </div>