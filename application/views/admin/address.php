<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Address</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" enctype="multipart/form-data" id="common-form" action="<?php echo base_url('admin/Admin/doaddAddress/'.$address['id']);?>">
                                <div class="error_msg"></div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="firstName">Address</label>
                                        <?php echo form_input(['name' => 'address', 'id' => 'address', 'class' => 'form-control', 'value'=>$address['address']], isset($address['address']) ? $address['address'] : '') ?>
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