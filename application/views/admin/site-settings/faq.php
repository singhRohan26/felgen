<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Zuhause</a></li>
            <li class="breadcrumb-item active" aria-current="page">FAQ's</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" enctype="multipart/form-data" id="common-form" action="<?php if (!empty($faq['id'])){ echo base_url('admin/do-edit-faq/' . $faq['id']); } else { echo base_url('admin/Settings/doAddFaq'); } ?>">
                                <div class="error_msg"></div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="firstName">Frage</label>
                                        <?php if (!empty($faq['question'])) { ?>
                                            <input type="text" name="question" id="question" class="form-control" placeholder="Frage eingeben" value="<?php echo $faq['question']; ?>" />
                                        <?php }else{ ?>
                                            <input type="text" name="question" id="question" class="form-control" placeholder="Frage eingeben" />
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="firstName">Antworten</label>
                                        <?php if (!empty($faq['answer'])) { ?>
                                            <textarea name="answer" id="answer"><?php echo $faq['answer']; ?></textarea>
                                        <?php }else{ ?>
                                            <textarea name="answer" id="answer"></textarea>
                                        <?php } ?>
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