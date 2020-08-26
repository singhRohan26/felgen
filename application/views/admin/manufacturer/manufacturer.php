<div class="hk-pg-wrapper">

    <nav class="hk-breadcrumb" aria-label="breadcrumb">

        <ol class="breadcrumb breadcrumb-light bg-transparent">

            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>

            <li class="breadcrumb-item active" aria-current="page">Herstellerinnen</li>

        </ol>

    </nav>

    <div class="container">

        <div class="row">

            <div class="col-xl-8">

                <div class="row">

                    <div class="col-xl-12">

                        <section class="hk-sec-wrapper">

                            <h5 class="hk-sec-title">Herstellerliste</h5>

                            <div class="row">

                                <div class="col-sm" id="content-wrapper" data-url="<?php echo base_url('admin/get-manufacturer-wrapper'); ?>">

                                </div>

                            </div>

                        </section>

                    </div>

                </div>

            </div>

            <div class="col-xl-4">

                <section class="hk-sec-wrapper">
                    <?php if(!empty($manufacturer)){ ?>
                        <h5 class="hk-sec-title">Hersteller bearbeiten</h5>
                    <?php }else{ ?>
                        <h5 class="hk-sec-title">Hersteller hinzufügen</h5>
                    <?php } ?>
                    <div class="row">

                        <div class="col-sm">

                            <form method="post" id="common-form" action="<?php if (!empty($manufacturer)) { echo base_url('admin/do-edit-manufacturer/' . $manufacturer['manufacturer_id']); } else { echo base_url('admin/do-add-manufacturer'); } ?>">

                                <div class="error_msg"></div>

                                <div class="row">

                                    <div class="col-md-12 form-group">

                                        <label for="firstName">Herstellername</label>

                                        <?php echo form_input(['name' => 'manufacturer_name','autocomplete' => 'off', 'placeholder' => 'Geben Sie den Herstellernamen ein', 'id' => 'manufacturer_name', 'class' => 'form-control'], isset($manufacturer['manufacturer_name']) ? $manufacturer['manufacturer_name'] : '') ?>

                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary mr-10">einreichen</button>

                            </form>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>