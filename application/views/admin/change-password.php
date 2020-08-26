<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>
            <li class="breadcrumb-item active" aria-current="page">Passwort ändern</li>
        </ol>
    </nav>
    <div class="container">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Passwort ändern</h4>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <form id="common-form" action="<?php echo base_url('admin/doChangePassword/'.$user['id']); ?>" method="post">
                                <div class="error_msg"></div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="firstName">Jetziges Passwort</label>
                                        <input class="form-control" id="old_password" name="old_password" placeholder="Aktuelles Passwort eingeben" type="password">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="lastName">Neues Kennwort</label>
                                        <input class="form-control" id="new_password" name="new_password" placeholder="Neues Passwort eingeben" type="password">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="lastName">Bestätige neues Passwort</label>
                                        <input class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Bestätige neues Passwort" type="password">
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