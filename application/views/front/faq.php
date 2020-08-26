<section class="acord mainmargin boxs all_top">
    <div class="faqsec boxs">
        <h2>FAQ</h2>
        <div class="container">
            <div class="faqcont boxs">
                <div class="accrodian_box boxs">
                    <div class="accordion-container accord boxs">
                        <?php foreach ($faq as $faqs) { ?>
                            <div class="set">
                                <a href="javascript:void(0)">
                                    <?php echo $faqs['question']; ?>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                <div class="content">
                                    <p><?php echo $faqs['answer']; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>