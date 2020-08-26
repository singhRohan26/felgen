<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin-Profil</li>
        </ol>
    </nav>
    <div class="container">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Admin-Profil</h4>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" id="image-common-form" enctype="multipart/form-data" action="<?php echo base_url('admin/Admin/doUpdateAdminProfile'); ?>">
                                <div id="error_msg"></div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="firstName">Vorname</label>
                                        <input class="form-control" id="first_name" name="first_name" placeholder="Bitte Vornamen eingeben" type="text" value="<?php if (isset($user)) { echo $user['first_name']; } ?>">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="lastName">Nachname</label>
                                        <input class="form-control" id="last_name" name="last_name" placeholder="Nachnamen eingeben" type="text" value="<?php if (isset($user)) { echo $user['last_name']; } ?>">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="lastName">Telefon</label>
                                        <input class="form-control" id="phone" name="phone" placeholder="Telefonnummer eingeben" type="text" value="<?php if (isset($user)) { echo $user['phone']; } ?>">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="lastName">Adresse</label>
                                        <input class="form-control" id="address" name="address" placeholder="Adresse eingeben" type="text" value="<?php if (isset($user)) { echo $user['address']; } ?>">
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