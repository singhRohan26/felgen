<div class="hk-pg-wrapper">

    <nav class="hk-breadcrumb" aria-label="breadcrumb">

        <ol class="breadcrumb breadcrumb-light bg-transparent">

            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>

            <li class="breadcrumb-item active" aria-current="page">Größen</li>

        </ol>

    </nav>

    <div class="container">

        <div class="row">

            <div class="col-xl-8">

                <div class="row">

                    <div class="col-xl-12">

                        <section class="hk-sec-wrapper">

                            <h5 class="hk-sec-title">Größenliste</h5>

                            <div class="row">

                                <div class="col-sm" id="content-wrapper" data-url="<?php echo base_url('admin/get-size-wrapper'); ?>">

                                </div>

                            </div>

                        </section>

                    </div>

                </div>

            </div>

            <div class="col-xl-4">

                <section class="hk-sec-wrapper">
                    <?php if(!empty($size)){ ?>
                        <h5 class="hk-sec-title">Größe bearbeiten</h5>
                    <?php }else{ ?>
                        <h5 class="hk-sec-title">Größe hinzufügen</h5>
                    <?php } ?>
                    <div class="row">

                        <div class="col-sm">

                            <form method="post" id="common-form" action="<?php if (!empty($size)) { echo base_url('admin/do-edit-size/' . $size['size_id']); } else { echo base_url('admin/do-add-size'); } ?>">

                                <div class="error_msg"></div>

                                <div class="row">

                                    <div class="col-md-12 form-group">

                                        <label for="firstName">Größe</label>

                                        <?php echo form_input(['name' => 'size','autocomplete' => 'off', 'placeholder' => 'Größe eingeben', 'id' => 'size', 'class' => 'form-control'], isset($size['size']) ? $size['size'] : '') ?>

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