<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>
            <li class="breadcrumb-item active" aria-current="page">Privatsphäre</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" enctype="multipart/form-data" id="common-form" action="<?php echo base_url('admin/Settings/doEditSettings/2');?>">
                                <div class="error_msg"></div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="firstName">Titel</label>
                                        <?php echo form_input(['name' => 'title', 'id' => 'title', 'class' => 'form-control', 'readonly' => 'readonly'], isset($about_us[1]['page']) ? $about_us[1]['page'] : '') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="description">Beschreibung</label>
                                        <textarea name="description" id="description"><?php echo $about_us[1]['text']; ?></textarea>
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