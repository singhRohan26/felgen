
<section class="chatmainAll mainmargin boxs all_top">
  <div class="container">
    <div class="mychatAll boxs">
      <div class="row">
        <div class="col-md-4 noright">
          <div class="mychatleft boxs">
            <div class="chatbox_lft boxs">
              <div class="chatbxrht_top boxs">
                <h3>Meine Chats</h3>
              </div>
           
			  <?php 
			  
			  foreach($chatList as $chat) {  ?>
              
                <div class="chatbx_btm boxs">
                   <a href="<?php echo base_url('Post/chatwithseller/'.$chat['receiver_id'].'/'.$chat['post_id'].'/'.$chat['chat_id']); ?>" id="" style="display: block">
                <div class="chatboxs_all chatboxs_all1 active boxs" data-type="1">
                  <div class="chatleft d-inline-block">
                    <div class="chatimng chatimng1 boxs">
                        <?php if(!empty($chat['receiver_image'])){ ?>
                      <img src="<?php echo base_url('uploads/profile-images/'.$chat['receiver_image']) ?>" class="img-fluid" alt="chat1">
                      <?php }else{ ?>
                      <img src="<?php echo base_url('public/images/user.png') ?>" class="img-fluid" alt="chat1">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="chatmiddle chatmiddle1 d-inline-block">
                    <p><?php echo $chat['name']; ?><span class="d-block"><?php echo $chat['message']; ?></span></p>

                  </div>
                  <div class="chatright chatright1 d-inline-block">
                    <p><?php echo $chat['time']; ?></p>
                    <p><?php echo $chat['date']; ?></p>
                  </div>
                </div>
                
              </div>
            
              </a>
			  <?php  } ?>
            </div>
          </div>
        </div>
        <div class="col-md-8 noleft">
          <div class="mychatryt boxs" >
            <div class="chatbox_ryt">
              
			                <div data-url="<?php echo base_url('Site/chat_wrapper/'.$receiver_user['user_id'].'/'.$check.'/'.$post_id.'/'.$chat_id) ?>" id="chat_wrapper"></div>
                </div>
                </div>
                  </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</section>


<!-- modal -->
        <div class="modal fade " id="myModal1" role="dialog">
          <div class="modal-dialog ">
            <div class="modal-content modal-content1 boxs">
              <div class="modaly1 modaly boxs">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <div class="modalyimg1">
                       <img src="<?php echo base_url('public/images/') ?>smilybig.svg" class="img-fluid" alt="smilybig">
                   </div>
                   <p>Wie beschreiben Sie Ihre Erfahrung?</p>
				   <form action="<?php echo base_url('Post/review/'.$receiver_user['user_id'].'/'.$post_id) ?>" method="post" id="review_form">
                  <div class="star-rating ">
                      <input type="radio" id="5-stars" name="rating" value="5">
                      <label for="5-stars" class="star">★</label>
                      <input type="radio" id="4-stars" name="rating" value="4">
                      <label for="4-stars" class="star">★</label>
                      <input type="radio" id="3-stars" name="rating" value="3">
                      <label for="3-stars" class="star">★</label>
                      <input type="radio" id="2-stars" name="rating" value="2">
                      <label for="2-stars" class="star">★</label>
                      <input type="radio" id="1-star" name="rating" value="1">
                      <label for="1-star" class="star">★</label>
                  </div>
                  <!--<p>Wie können Händler ihren Service verbessern?</p>-->
                  <div class ="modal_input boxs">
                    <input type ="text" placeholder ="Write some suggestions" class ="form-control" name="review">
                    <div class ="modal_btn addhover">
                    <button type ="submit" >Bewertung abschicken</button>
					</form>
                  </div>
               </div>
            </div>
          </div>
        </div>
    </div>
        <!-- modal end -->