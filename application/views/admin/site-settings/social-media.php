<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>
            <li class="breadcrumb-item active" aria-current="page">Social Media Links</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <?php if (!empty($socialmedia)) { ?>
                <div class="col-xl-8">
            <?php }else{ ?> 
                    <div class="col-xl-12">
            <?php } ?>
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Social-Media-Liste</h5>
                            <div class="row">
                                <div class="col-sm" id="content-wrapper" data-url="<?php echo base_url('admin/get-social-media-wrapper'); ?>">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <?php if (!empty($socialmedia)) { ?>
                <div class="col-xl-4">
                    <section class="hk-sec-wrapper">
                        <div class="row">
                            <div class="col-sm">
                                <form method="post" id="common-form" action="<?php echo base_url('admin/do-edit-social-media/' . $socialmedia['id']); ?>">
                                    <div class="error_msg"></div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="firstName">Sozialen Medien</label>
                                            <?php echo form_input(['name' => 'socialmedia' ,'autocomplete' => 'off', 'id' => 'socialmedia', 'class' => 'form-control','readonly' => 'readonly'], isset($socialmedia['social_media']) ? $socialmedia['social_media'] : '') ?>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="firstName">URL</label>
                                            <?php echo form_input(['name' => 'url' ,'autocomplete' => 'off', 'id' => 'url', 'class' => 'form-control'], isset($socialmedia['url']) ? $socialmedia['url'] : '') ?>
                                        <p>Bitte verwenden Sie <b>"https://"</b> mit der URL.</p>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-10">einreichen</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            <?php } ?>
        </div>
    </div>