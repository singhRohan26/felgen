<section class="productMain mainmargin boxs all_top">

  <div class="container-fluid">

    <div class="productAll boxs">

      <div class="bredcrum boxs">
      </div>

      <div class="row">

        <div class="col-md-6">

          <div class="proall_lft  boxs">

            <div class="prolftSlick boxs">

                
               <?php
                foreach($postImages as $img)
                {
                    $media = $img['media'];
                    $ext = explode("." , $media);
                   
                    if($ext['1'] == 'mp4')
                    {
                        ?>
                   <div class="slicko">

                <div class="slkimg slkyimg boxs">

                 <iframe src="<?php echo base_url('uploads/posts/'.$media)  ?>" style="height: 100%;width: 100%;"></iframe>
                  
                   <a href="<?php echo base_url('site/postWishlist/'.$postDetail['post_id'].'/'.$user['user_id']);?>" class="wish_heart"><i class="fa fa-heart img_heart <?php if(!empty($wishlists)){ if(in_array($postDetail['post_id'], $wishlists)) { echo "heartColor"; } } ?>" aria-hidden="true"></i></a>

                </div>

              </div>
                  
                  <?php                         
                    }else{
                        
                        ?>
                        <div class="slicko">

                <div class="slkimg slkyimg boxs">

                  <img src="<?php echo base_url('uploads/posts/'.$img['media'])  ?>" class="img-fluid pro_rel" alt="product1" width: 100%;>
                  
                   <a href="<?php echo base_url('site/postWishlist/'.$postDetail['post_id'].'/'.$user['user_id']);?>" class="wish_heart"><i class="fa fa-heart img_heart <?php if(!empty($wishlists)){ if(in_array($postDetail['post_id'], $wishlists)) { echo "heartColor"; } } ?>" aria-hidden="true"></i></a>

                </div>

              </div>
                        
                        <?php
                        
                    }
                ?>
              
                     
              <?php } ?>
             
            
            </div>

            <div class="prolfttext boxs">

              <h3>Felgendetails</h3>

              <ul>

                <li><span>Herstellung </span><?php echo $postDetail['manufacturer_name'] ?></li>

                <li><span>Lochkreis</span><?php echo $postDetail['pcd_name'] ?></li>

                <li><span>Größe (Zoll) </span><?php echo $postDetail['size'] ?></li>

                <li><span>Farbe </span><?php echo $postDetail['color'] ?></li>

              </ul>

            </div>

          </div>

        </div>

        <div class="col-md-6">

          <div class="proright boxs">

            <div class="proryt_text boxs">

              <h3><?php echo $postDetail['title'] ?></h3>

              <p><span><?php echo $postDetail['date'] ?></span><?php echo $postDetail['time'] ?></p>

              <p class="euto"><img src="<?php echo base_url('public/')  ?>images/euro.svg" class="img-fluid" alt="euro"><?php echo $postDetail['price'] ?></p>

              <p class="proryto_txt"><?php echo $postDetail['description'] ?></p>

            </div>

            <div class="prosellerAll boxs">

              <h3>VERKÄUFERPROFIL</h3>

              <div class="selldesign">

                <div class="sellesignimg">
                  <?php if(!empty($postDetail['image'])){ ?>
                  <img src="<?php echo base_url('uploads/profile-images/'.$postDetail['image']) ?>" class="img-fluid" alt="men2">
                  <?php }else{  ?> 
                  <img src="<?php echo base_url('public/images/user.png') ?>" class="img-fluid" alt="men2">
                  <?php } ?>
                </div>

                <div class="selldesigntext">

                  <h4><?php echo $postDetail['name'] ?> <span class="d-block">Mitglied seit 2020</span></h4>

                  <a href="<?php echo base_url('Site/userProfile/'.$postDetail['user_id']) ?>">Profil anzeigen</a>

                </div>

              </div>
               <?php  if(!empty($this->session->userdata('unique_id'))) { ?>
              <div class="allbtn btn_seller addhover"> 

                <a href="<?php echo base_url('Post/chatwithseller/'.$postDetail['user_id'].'/'. $postDetail['post_id']) ?>" >CHATTE MIT VERKÄUFER <img src="<?php echo base_url('public/')  ?>images/arrowright.svg" class="img-fluid" alt="arrowright"></a>

              </div>
               <?php  } ?>
            </div>

             <div class="prosellerAll boxs">
              <h3>Bewertungen</h3>
			  <?php  if(!empty($review)) {   ?>
              <?php foreach($review as $rev) {  ?>
              <div class="selldesign selldesign2">
                <div class="sellesignimg sellesignimg2">
                <?php if(!empty($rev['image'])){ ?>
                    <img src="<?php echo base_url('uploads/profile-images/'.$rev['image']) ?>" class="img-fluid" alt="men2">
                <?php }else{ ?>
                <img src="<?php echo base_url('public/images/user.png'); ?>" class="img-fluid" alt="men2">
                <?php } ?>
                </div>

                <div class="selldesigntext selldesigntext2">

                  <p><?php  echo $rev['name'] ?> <span class="d-block"><?php  echo $rev['review'] ?></span></p>
                   
				   <?php for ($i = 1; $i <= $rev['rating']; $i++) {?>
                  <p class="fafafa"><i class="fa fa-star" aria-hidden="true"></i></p>
                   <?php } ?>
                </div>
              </div>
			  <?php }}else{ ?>
			  <p>Noch keine Bewertungen</p>
			  <?php } ?>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>