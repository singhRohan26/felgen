<section class="popular_pro mainmargin popularpro1 boxs all_top" style="margin-top: 136px;">

<!-- deepanshu code -->
            
            <div class="popular_pro popular_pro_drop boxs made_in_drop populardrp">
                <div class="pop_inner boxs">
                    <h4>Hier sind Ihre gefilterten Produkte</h4>
                        <div class="post_filt filter_header boxs">
                        <div class="pop_filter post_filter  ">
                            
            <!-- deepanshun code -->

</section>



<section class="productlist boxs">

  <div class="container-fluid">

    <div class="productocenter boxs">
              <!--<div data-url="<?php echo base_url('Site/post_wrapper') ?>" id="post_wrapper"></div>-->
              <?php  if(!empty($result)) {   ?>
              <?php foreach($result as $res)    {   ?>
                <a href="<?php echo base_url('Site/postDetails/'.$res['post_id']) ?>" class="slikocusto1" >
                    <div class="card cardcusto d-inline-block cardlisto boxs">
                    
                    <div class="cardimg cardimg1 boxs">

                                        <?php  
                                         $ext = explode('.',$res['image'])['3'];
                                         if($ext == 'mp4')
                                         {
                                        ?>
                                         <iframe src="<?php echo $res['image']; ?>" style="width: 100%;height: 100%;"></iframe>
                                        <?php
                                         }else{
                                        ?>
                                        <img class="card-img-top img-fluid" src="<?php echo $res['image']; ?>" alt="tire1">
                                        <?php
                                         }
                                        ?>

                        <div class="card_wish"> <a href="<?php echo base_url('site/postWishlist/'.$res['post_id'].'/'.$user['user_id']);?>" class="wish_heart"><i class="fa fa-heart img_heart <?php if(!empty($wishlists)){ if(in_array($res['post_id'], $wishlists)) { echo "heartColor"; } } ?>" aria-hidden="true"></i></a></div>

                    </div>
                    <a href="<?php echo base_url('Site/postDetails/'.$res['post_id']) ?>" class="slikocusto2"><div class="cardtext boxs">

                        <div class="card-body cardbod_custom">

                            <p><?php  echo $res['title'] ?></p>

                        </div>

                        <div class="cardall boxs d-inline-block">

                            <div class="cardylft d-inline-block">

                                <P><?php  echo $res['date'] ?></P>

                            </div>

                            <div class="cardyryt d-inline-block float-right">

                                <p><?php  echo $res['time'] ?></p>

                            </div>

                        </div>

                    </div>

                    </a>

                    </div>

                </a>
              <?php }}else{ ?>
              <h6>No Items Found</h6>
          <?php }  ?>


       

       

        

        

            </div>

  </div>

</section>