<div class="hk-pg-wrapper">

    <nav class="hk-breadcrumb" aria-label="breadcrumb">

        <ol class="breadcrumb breadcrumb-light bg-transparent">

            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>

            <li class="breadcrumb-item active" aria-current="page">Beitragsdetail</li>

        </ol>

    </nav>

    <div class="container">

        <div class="hk-pg-header">
            <div>
                <h4 class="hk-pg-title">
                    Beitragsdetail
                </h4>
            </div>
            <div class="d-flex">
                <a href="<?php echo base_url('admin/posts'); ?>"><button class="btn btn-primary btn-sm">Zurück</button></a>
            </div>

        </div>

        <div class="row">

            <div class="col-xl-12">

                <section class="hk-sec-wrapper">

                    <div class="row">

                        <div class="col-sm">

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Post-Titel</h5>

                                <span class="col-4"><?php echo $post['title']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produktfarbe</h5>

                                <span class="col-4"><?php echo $post['color']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produktpreis</h5>

                                <span class="col-4"><?php echo $post['price']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produktmerkmale</h5>

                                <span class="col-4"><?php echo $post['features']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produkthersteller</h5>

                                <span class="col-4"><?php echo $post['manufacturer_name']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produktgröße</h5>

                                <span class="col-4"><?php echo $post['size']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produkt Schraubenkreis</h5>

                                <span class="col-4"><?php echo $post['pcd_name']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produktart</h5>

                                <span class="col-4"><?php echo $post['ad_type']; ?> Product</span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produktstandort</h5>

                                <span class="col-4"><?php echo $post['city']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Datum und Uhrzeit der Produktbuchung</h5>

                                <span class="col-4"><?php echo ($post['date']) ?> <?php echo $post['time']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8">Produktbeschreibung</h5>

                                <span class="col-4"><?php echo $post['description']; ?></span>

                            </div>

                            <div class="row align-items-center product_border">

                                <h5 class="col-8 abc">Produktbilder</h5>

                                    <div class="all_images">

                                        <?php foreach($post_image as $post_images){ ?>

                                        <div class ="img_height">

                                            <img class="image_store" src="<?php echo base_url('uploads/posts/'.$post_images['media']); ?>">

                                        </div>

                                        <?php } ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>