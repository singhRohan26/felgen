    <!--view profile start-->
    <section class="publish_ad mainmargin boxs">
        <div class="container-fluid">
		                <div class="publ123 boxs">
                        <h6>Veröffentlichte Anzeigen</h6>
                    </div>
            <div class="publish_inner boxs">
			
                <div class="row">
    
                    <div class="col-md-2 nopadding">
                        <div class="pub_l_all boxs">
                            <div class="publ_left ">
                                <?php if(!empty($postuserDetails['image'])) { ?>
                                <img src="<?php echo base_url('uploads/profile-images/'.$postuserDetails['image'])  ?>" class="img-fluid" alt="person">
                                <?php }else{ ?>
                                <img src="<?php echo base_url('public/images/user.png')  ?>" class="img-fluid" alt="person">
                                <?php } ?>
                            </div>
                            <div class="publish_cont boxs">
                                <h2><?php echo $postuserDetails['name'] ?></h2>
                                <ul>
                                    <li><?php echo $adcountbyuser; ?><br><span>Ads</span></li>
                                    <li><?php echo round($avgrating); ?><br><span>Rating</span></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 ">

                        <div class="Pub_right_all boxs">
                      
                            <div class=" publish_inner12  boxs" >
                             
                                    <?php foreach($postsByUser as $post) {   ?>
									<a href ="<?php echo base_url('Site/postDetails/'.$post['post_id']) ?>" class="anchorcard boxs">
                                   <div class="card cardcusto mynewcusto mynewcusto121 d-inline-block cardlisto newcard boxs">
                                        <div class="cardimg carimges cardimg1 boxs">
                                            <?php  
                                         $ext = explode('.',$post['image'])['3'];
                                         if($ext == 'mp4')
                                         {
                                        ?>
                                         <iframe src="<?php echo $post['image']; ?>" style="width: 100%;height: 100%;"></iframe>
                                        <?php
                                         }else{
                                        ?>
                                        <img class="card-img-top img-fluid" src="<?php echo $post['image']; ?>" alt="tire1">
                                        <?php
                                         }
                                        ?>
                                             
                                        </div>
                                        <div class="cardtext boxs">
                                            <div class="card-body cardbod_custom">
                                                <p><?php echo $post['title']  ?></p>
                                            </div>
                                            <div class="cardall boxs d-inline-block">
                                                <div class="cardylft d-inline-block">
                                                    <p><?php echo $post['date'] ?></p>
                                                </div>
                                                <div class="cardyryt d-inline-block float-right">
                                                    <p><?php echo $post['time'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									</a>
                                    <?php  } ?>
                               
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!--view profile end-->