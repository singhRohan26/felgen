<div class="hk-pg-wrapper">

    <nav class="hk-breadcrumb" aria-label="breadcrumb">

        <ol class="breadcrumb breadcrumb-light bg-transparent">

            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>

            <li class="breadcrumb-item active" aria-current="page">PCD's</li>

        </ol>

    </nav>

    <div class="container">

        <div class="row">

            <div class="col-xl-8">

                <div class="row">

                    <div class="col-xl-12">

                        <section class="hk-sec-wrapper">

                            <h5 class="hk-sec-title">PCD's Liste</h5>

                            <div class="row">

                                <div class="col-sm" id="content-wrapper" data-url="<?php echo base_url('admin/get-pcd-wrapper'); ?>">

                                </div>

                            </div>

                        </section>

                    </div>

                </div>

            </div>

            <div class="col-xl-4">

                <section class="hk-sec-wrapper">
                    <?php if(!empty($pcd)){ ?>
                        <h5 class="hk-sec-title">PCD bearbeiten</h5>
                    <?php }else{ ?>
                        <h5 class="hk-sec-title">PCD hinzufügen</h5>
                    <?php } ?>
                    <div class="row">

                        <div class="col-sm">

                            <form method="post" id="common-form" action="<?php if (!empty($pcd)) { echo base_url('admin/do-edit-pcd/' . $pcd['pcd_id']); } else { echo base_url('admin/do-add-pcd'); } ?>">

                                <div class="error_msg"></div>

                                <div class="row">

                                    <div class="col-md-12 form-group">

                                        <label for="firstName">PCD-Name</label>

                                        <?php echo form_input(['name' => 'pcd_name','autocomplete' => 'off', 'placeholder' => 'Geben Sie den PCD-Namen ein', 'id' => 'pcd_name', 'class' => 'form-control'], isset($pcd['pcd_name']) ? $pcd['pcd_name'] : '') ?>

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