<section class="popular_pro mainmargin popularpro1 boxs">
    <!-- deepanshu code -->
    <form action="<?php echo base_url('Site/dopopularfilteration') ?>" method="post" id="popular_filter_form">
        <div class="popular_pro popular_pro_drop boxs made_in_drop populardrp all_top">
            <div class="pop_inner boxs">
                <h2>Beliebte Felgen</h2>
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
                            <?php foreach ($getLocations as $getLocation) { ?>
                                <option value="<?php echo $getLocation['id'] ?>"><?php echo $getLocation['name'] ?></option>
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
</section>

<section class="productlist boxs">
    <div class="container-fluid">
        <div class="productocenter boxs">
            <div data-url="<?php echo base_url('Site/post_wrapper') ?>" id="post_wrapper"></div>
        </div>
    </div>
</section>