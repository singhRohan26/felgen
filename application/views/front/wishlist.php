 <!--    manage_sale start-->

    <section class="manage mainmargin boxs all_top">

        <div class="container">

            <div class="manage_inner boxs">

                <div class="manage_heading boxs">

                    <h2>Meine Wunschliste</h2>

<!--                    <h3>Sell Product</h3>-->

                </div>

                <div class="all_rims boxs">

                    <div class="row">
                        <?php if(!empty($wishlist)){ ?>
                         <?php    foreach($wishlist as $post){    ?>
                         
                        <div class="col-md-6">

                            <div class="rims_inner boxs">

                                <div class="ellipes_click show boxs">

                                    

                                </div>

                                <!--<div class="ellipis"><i class="fa fa-ellipsis-v"></i></div>-->

                                <div class="rims_img boxs">

                                    <?php  
                                         $ext = explode('.',$post['image'])['3'];
                                         if($ext == 'mp4')
                                         {
                                        ?>
                                         <iframe src="<?php echo $post['image']; ?>" style="width: 145px;height: 148px;"></iframe>
                                        <?php
                                         }else{
                                        ?>
                                        <img class="card-img-top img-fluid" src="<?php echo $post['image']; ?>" alt="tire1">
                                        <?php
                                         }
                                        ?>

                                </div>

                                <span>

                                    <h3><?php echo $post['title']  ?></h3>

                                    <p></p>

                                    <h4><?php echo substr($post['description'],0,50)  ?>...<b><a href="<?php echo base_url('Site/postDetails/'.$post['post_id']) ?>">Read More</a></b></h4>



                                    <ul>

                                        <li><?php echo $post['date']  ?></li>
                                        <?php $posttime =explode(':',$post['time']); ?>
                                        <li class="pull-right"><?php echo $posttime[0].':'.$posttime[1];  ?></li>

                                        <!-- <li><a href="#"></a></li> -->

                                    </ul>



                                </span>



                            </div>

                        </div>
                         
                       
                      <?php  } } else{ ?>
                        <p>Keine Beiträge verfügbar</p>
                        <?php } ?>








                    </div>

                </div>



                





                






            </div>





        </div>

    </section>

    <!--    manage_sale end-->