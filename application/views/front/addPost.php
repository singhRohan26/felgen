<section class=" post_top mainmargin boxs all_top">
    <h2>Postanzeige</h2>
    <div class="container">
        <div class="pay_inner post_ad boxs">
            <form class="boxs" method="post" id="addpost_form" action="<?php
            if (!empty($postById['post_id'])) {
                echo base_url('Post/doeditpost/' . $postById['post_id']);
            } else {
                echo base_url('Post/doaddPost');
            }
            ?>" enctype="multipart/form-data">
                <div id="error_msg"></div>  
                <div class="boxs">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Titel *" name="title" id="title" value="<?php
                        if (!empty($postById['title'])) {
                            echo $postById['title'];
                        }
                        ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Felgenmerkmale" name="rim" id="rim" value="<?php
                        if (!empty($postById['features'])) {
                            echo $postById['features'];
                        }
                        ?>">
                    </div>
                    <div class="post_filt boxs">
                        <div class="pop_filter post_filter post_filter1 boxs">
                            <select id="mounth" name="manufacture">
                                <?php if (!empty($postById['post_id'])) { ?>   
                                    <option value="<?php echo $postById['manufacturer_id']; ?>"><?php echo $postById['manufacturer_name']; ?></option>
                                <?php } ?>
                                <option value="hide">Wählen Sie Hersteller</option>
                                <?php foreach ($getmanufactures as $manufacture) { ?>
                                    <option value="<?php echo $manufacture['manufacturer_id'] ?>"><?php echo $manufacture['manufacturer_name'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="pop_filter post_filter post_filter2 boxs">
                            <select id="mounth"  name="size">
                                <?php if (!empty($postById['post_id'])) { ?>   
                                    <option value="<?php echo $postById['size_id']; ?>"><?php echo $postById['size']; ?></option>
                                <?php } ?>
                                <option value="hide">Größe auswählen (Zoll)</option>
                                <?php foreach ($getsize as $size) { ?>
                                    <option value="<?php echo $size['size_id'] ?>"><?php echo $size['size'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="pop_filter post_filter post_filter3 boxs">
                            <select id="mounth"  name="pcd">
                                <?php if (!empty($postById['post_id'])) { ?>   
                                    <option value="<?php echo $postById['pcd_id']; ?>"><?php echo $postById['pcd_name']; ?></option>
                                <?php } ?>
                                <option value="hide">Wählen Sie PCD</option>
                                <?php foreach ($getpcd as $pcd) { ?>
                                    <option value="<?php echo $pcd['pcd_id'] ?>"><?php echo $pcd['pcd_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--<div class="pop_filter post_filter post_last boxs">-->
                        <!--    <div class ="right_form">-->
                        <!--    <div class="form-group ">-->
                        <!--        <input type="text" class="form-control" placeholder="Enter Location" id="location" name="location" value="<?php
                        if (!empty($postById['location'])) {
                            echo $postById['location'];
                        }
                        ?>" >-->
                        <!--    </div>-->
                        <!--    </div>-->
                        <!--    </div>-->
                        <div class="pop_filter post_filter post_last boxs">
                            <select id="mounth"  name="city">
                                <?php if (!empty($postById['post_id'])) { ?>   
                                    <option value="<?php echo $postById['location_id']; ?>"><?php echo $postById['name']; ?></option>
                                <?php } ?>
                                <option value="hide">Ort auswählen</option>
                                <?php foreach ($getLocations as $getLocationss) { ?>
                                    <option value="<?php echo $getLocationss['id'] ?>"><?php echo $getLocationss['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class ="all_form boxs">
                        <div class="row">
                            <div class="col-md-6">
                                <div class= "left_form">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" placeholder="Farbe" id="color" name="color" value="<?php
                                        if (!empty($postById['color'])) {
                                            echo $postById['color'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class ="right_form">
                                    <div class="form-group ">
                                        <input type="number" class="form-control" placeholder="Preis" id="price" name="price" value="<?php
                                        if (!empty($postById['price'])) {
                                            echo $postById['price'];
                                        }
                                        ?>" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="Beschreibung" id="desc" name="desc" value="<?php
                        if (!empty($postById['description'])) {
                            echo $postById['description'];
                        }
                        ?>">
                    </div>
                    <div class="post_img boxs">
                        <p><span>Bilder</span>(Fügen Sie Bilder / Videos hinzu. Sie können bis zu 4 Dateien hochladen.)</p>
                    </div>
                    <div class="all_img_v boxs">
                        <div class="avatar-upload post_img">
                            <div class="avatar-edit image_upp">
                                <input type="file" id="imageUpload8" name="file1" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload8"></label>
                            </div>
                            <div class="avatar-preview images_add">
                                <div id="imagePreview4" style="background-image:url(<?php
                                if (!empty($postimgById[0]['media'])) {
                                    echo base_url('uploads/posts/' . $postimgById[0]['media']);
                                }
                                ?>)">
                                </div>
                            </div>
                        </div>
                        <div class="avatar-upload post_img">
                            <div class="avatar-edit image_upp">
                                <input type="file" id="imageUpload4" name="file2" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload4"></label>
                            </div>
                            <div class="avatar-preview images_add">
                                <div id="imagePreview1" style="background-image:url(<?php
                                if (!empty($postimgById[1]['media'])) {
                                    echo base_url('uploads/posts/' . $postimgById[1]['media']);
                                }
                                ?>)">
                                </div>
                            </div>
                        </div>
                        <div class="avatar-upload post_img">
                            <div class="avatar-edit image_upp">
                                <input type="file" id="imageUpload5" name="file3" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload5"></label>
                            </div>
                            <div class="avatar-preview images_add">
                                <div id="imagePreview2" style="background-image:url(<?php
                                if (!empty($postimgById[2]['media'])) {
                                    echo base_url('uploads/posts/' . $postimgById[2]['media']);
                                }
                                ?>)">
                                </div>
                            </div>
                        </div>
                        <div class="avatar-upload post_img">
                            <div class="avatar-edit image_upp">
                                <input type="file" id="imageUpload6" name="file4" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload6"></label>
                            </div>
                            <div class="avatar-preview images_add">
                                <div id="imagePreview3" style="background-image:url(<?php
                                if (!empty($postimgById[3]['media'])) {
                                    echo base_url('uploads/posts/' . $postimgById[3]['media']);
                                }
                                ?>)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="debait_card post_card boxs">
                        <!-- <form> -->
                        <span>
                            <input type="radio" id="test1" name="radio-group">
                            <label for="test1">Ja, das Teil ist echt und brandneu</label>
                        </span>
                        <span>
                            <input type="radio" id="test" name="radio-group">
                            <label for="test">Nein, es wird Teil verwendet </label>
                        </span>
                        <!-- </form> -->
                    </div>
                    <div class="post_btn addhover boxs">
                        <?php if (!empty($postById['post_id'])) { ?>
                            <button type="submit">Bearbeiten AD</button>
                        <?php } else { ?>
                            <button type="submit" class="post_add">POSTANZEIGE</button>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>