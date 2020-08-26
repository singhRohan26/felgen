<?php if(!empty($getbasic)) { ?>
<?php foreach($getbasic as $basic)    {   ?>

                <a href="<?php echo base_url('Site/postDetails/'.$basic['post_id']) ?>" class="slikocusto1" >

                    <div class="card cardcusto d-inline-block cardlisto boxs">

                    <div class="cardimg cardimg1 boxs">

                                        <?php  
                                         $ext = explode('.',$basic['image'])['3'];
                                         if($ext == 'mp4')
                                         {
                                        ?>
                                         <iframe src="<?php echo $basic['image']; ?>" style="width: 100%;height: 100%;"></iframe>
                                        <?php
                                         }else{
                                        ?>
                                        <img class="card-img-top img-fluid" src="<?php echo $basic['image']; ?>" alt="tire1">
                                        <?php
                                         }
                                        ?>

                        <div class="card_wish"> <a href="<?php echo base_url('site/postWishlist/'.$basic['post_id'].'/'.$user['user_id']);?>" class="wish_heart"><i class="fa fa-heart img_heart <?php if(!empty($wishlists)){ if(in_array($basic['post_id'], $wishlists)) { echo "heartColor"; } } ?>" aria-hidden="true"></i></a></div>

                    </div>

                    <a href="<?php echo base_url('Site/postDetails/'.$basic['post_id']) ?>" class="slikocusto2"><div class="cardtext boxs">

                        <div class="card-body cardbod_custom">

                            <p><?php  echo $basic['title'] ?></p>

                        </div>

                        <div class="cardall boxs d-inline-block">

                            <div class="cardylft d-inline-block">

                                <P><?php  echo $basic['date'] ?></P>

                            </div>

                            <div class="cardyryt d-inline-block float-right">

                                <p><?php  echo $basic['time'] ?></p>

                            </div>

                        </div>

                    </div>

                    </a>

                    </div>

                </a>
           <?php  } } else{ ?>
                        <h6>Keine Elemente gefunden</h6>
          <?php }  ?>
