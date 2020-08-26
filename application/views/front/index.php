<form action="<?php echo base_url('Site/dohomepagefilteration') ?>" method="post">
    <div class="popular_pro popular_pro_drop boxs made_in_drop populardrp newColor">
        <div class="pop_inner pop_innerSearch boxs">
            <h2></h2>
            <div class="post_filt filter_header boxs">
                <div class="pop_filter post_filter  ">
                    <select id="mounth" name="manufacture" >
                        <option value="0">Hersteller</option>
                        <?php foreach ($getmanufactures as $manufacture) { ?>
                            <option value="<?php echo $manufacture['manufacturer_id'] ?>"><?php echo $manufacture['manufacturer_name'] ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="pop_filter post_filter  ">
                    <select id="mounth"  name="size">
                        <option value="0">Grösse (Zoll)</option>
                        <?php foreach ($getsize as $size) { ?>
                            <option value="<?php echo $size['size_id'] ?>"><?php echo $size['size'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="pop_filter post_filter  ">
                    <select id="mounth"  name="pcd">
                        <option value="0">Lochkreis</option>
                        <?php foreach ($getpcd as $pcd) { ?>
                            <option value="<?php echo $pcd['pcd_id'] ?>"><?php echo $pcd['pcd_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="pop_filter post_filter  ">
                    <select id="mounth"  name="color">
                        <option value="0">Farbe</option>
                        <?php foreach ($getcolors as $colors) { ?>
                            <option value="<?php echo $colors['color_name'] ?>"><?php echo $colors['color_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="pop_filter post_filter ">
                    <select id="mounth"  name="location">
                        <option value="0">Ort</option>
                        <?php foreach ($getLocations as $location) { ?>
                            <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal_btn pop0_btn addhover">
                    <button type="submit">Suche</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--<section class="bannerarea mainmargin boxs">-->
<!--    <div class="banrtext boxs">-->
<!--        <h3>KAUFEN, VERKAUFEN UND <span>FINDEN SIE NUR ÜBER ALLES</span></h3>-->
<!--        <div class="allbtn addhover">-->
<!--		    <?php if (!empty($this->session->userdata('unique_id'))) { ?>-->
                <!--            <a href="<?php echo base_url('Post/addPost') ?>">ein Rad verkaufen</a>-->
    <!--			<?php } else { ?>-->
    <!--			<a href="<?php echo base_url('Site/signUp') ?>">ein Rad verkaufen</a>-->
    <!--			<?php } ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section class="slickarea boxs">
    <div class="container-fluid">
        <div class="pophead boxs d-inline-block">
            <div class="poplft d-inline-block">
                <h3>Beliebte Felgen</h3>
            </div>
            <div class="popryt d-inline-block float-right">
                <a href="<?php echo base_url('Site/allProducts') ?>">ALLE ANSEHEN</a>
            </div>
        </div>
        <div class="slicky slick boxs">
            <div class ="row">
            <?php
            if (!empty($getPopular)) {
                $i = 0;
                ?>
                <?php foreach ($getPopular as $popular) {
                  
                ?>
                <div class ="col-sm-3">
                    <div class="slickslider boxs">
                        <a href="<?php echo base_url('Site/postDetails/' . $popular['post_id']) ?>" class="slikocusto1" >
                            <div class="card cardcusto boxs">
                                <div class="cardimg boxs">
                                        <?php  
                                         $ext = explode('.',$popular['image'])['3'];
                                         $vid = explode('/',$popular['image'])['6'];
                                         if($ext == 'mp4')
                                         {
                                        ?>
                                         <iframe src="<?php echo base_url('uploads/posts/test/'.$vid) ?>" style="height: 100%;width: 100%;"></iframe>
                                        <?php
                                         }else{
                                        ?>
                                        <img class="card-img-top img-fluid" src="<?php echo $popular['image']; ?>" alt="tire1">
                                        <?php
                                         }
                                        ?>
                                    <div class="card_wish"> 
                                        <a href="<?php echo base_url('site/postWishlist/' . $popular['post_id'] . '/' . $user['user_id']); ?>" class="wish_heart"><i class="fa fa-heart img_heart <?php
                                            if (!empty($wishlists)) {
                                                if (in_array($popular['post_id'], $wishlists)) {
                                                    echo "heartColor";
                                                }
                                            }
                                            ?>" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <a href=<?php echo base_url('Site/postDetails/' . $popular['post_id']) ?>" class="slikocusto2"><div class="cardtext boxs">
                                        <div class="card-body cardbod_custom">
                                            <p><?php echo $popular['title'] ?></p>
                                        </div>
                                        <div class="cardall boxs d-inline-block">
                                            <div class="cardylft d-inline-block">
                                                <P><?php echo $popular['date'] ?></P>
                                            </div>
                                            <div class="cardyryt d-inline-block float-right">
                                                <p><?php echo $popular['time'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div> 
                </div>
                    <?php
                    $i++;
                }
            } else {
                ?>
                <h6>Keine Elemente gefunden</h6>
            <?php } ?>
        </div>
        <div class="pophead boxs d-inline-block Basicpro">
            <div class="poplft d-inline-block">
                <h3>Neuste Felgen</h3>
            </div>
            <div class="popryt d-inline-block float-right">
                <a href="<?php echo base_url('Site/basicProducts') ?>">ALLE ANSEHEN</a>
            </div>
        </div>
        <div class="slicky slick boxs">
         <div class ="row">
            <?php if (!empty($getbasic)) { ?>
                <?php foreach ($getbasic as $basic) { ?>
                <div class ="col-sm-3">
                    <div class="slickslider boxs">
                        <a href="<?php echo base_url('Site/postDetails/' . $basic['post_id']) ?>" class="slikocusto1" >
                            <div class="card cardcusto boxs">
                                <div class="cardimg boxs">
                                   <?php  
                                         $ext = explode('.',$basic['image'])['3'];
                                         $vid = explode('/',$basic['image'])['6'];
                                         if($ext == 'mp4')
                                         {
                                        ?>
                                         <iframe src="<?php echo base_url('uploads/posts/test/'.$vid) ?>" style="height: 100%;width: 100%;"></iframe>
                                        <?php
                                         }else{
                                        ?>
                                        <img class="card-img-top img-fluid" src="<?php echo $basic['image']; ?>" alt="tire1">
                                        <?php
                                         }
                                        ?>
                                    <div class="card_wish"> 
                                        <a href="<?php echo base_url('site/postWishlist/' . $basic['post_id'] . '/' . $user['user_id']); ?>" class="wish_heart"><i class="fa fa-heart img_heart <?php
                                            if (!empty($wishlists)) {
                                                if (in_array($basic['post_id'], $wishlists)) {
                                                    echo "heartColor";
                                                }
                                            }
                                            ?>" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <a href="<?php echo base_url('Site/postDetails/' . $basic['post_id']) ?>" class="slikocusto2"><div class="cardtext boxs">
                                        <div class="card-body cardbod_custom">
                                            <p><?php echo $basic['title'] ?></p>
                                        </div>
                                        <div class="cardall boxs d-inline-block">
                                            <div class="cardylft d-inline-block">
                                                <P><?php echo $basic['date'] ?></P>
                                            </div>
                                            <div class="cardyryt d-inline-block float-right">
                                                <p><?php echo $basic['time'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <h6>Keine Elemente gefunden</h6>
            <?php } ?>
            </div>
        </div>
    </div>
    </div>
</section>