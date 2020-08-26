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
                 
                ?>
              <div class="slicko">

                <div class="slkimg slkyimg boxs">

                  <img src="<?php echo base_url('uploads/posts/'.$img['media'])  ?>" class="img-fluid pro_rel" alt="product1" width: 100%;>
                  
                   <a href="<?php echo base_url('site/postWishlist/'.$postDetail['post_id'].'/'.$user['user_id']);?>" id="wish_heart"><i class="fa fa-heart img_heart <?php if(!empty($wishlists)){ if(in_array($postDetail['post_id'], $wishlists)) { echo "heartColor"; } } ?>" aria-hidden="true"></i></a>

                </div>

              </div>
                     
              <?php } ?>
             
            
            </div>

            <div class="prolfttext boxs">

              <h3>Rim Details</h3>

              <ul>

                <li><span>Herstellung </span><?php echo $postDetail['manufacturer_name'] ?></li>

                <li><span>PCD</span><?php echo $postDetail['pcd_name'] ?></li>

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


          </div>

        </div>

      </div>

    </div>

  </div>

</section>