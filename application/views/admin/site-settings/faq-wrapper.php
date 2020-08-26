<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Frage</th>
                <th>Antworten</th>
                <th>Status</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($faq)) { $i = 1; foreach ($faq as $faqs) {?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $faqs['question']; ?></td>
                <td><?php echo $faqs['answer']; ?></td>
                <td><?php echo $faqs['status']; ?></td>
                <td>
                    <?php if ($faqs['status'] == 'Active') { ?>
                        <a href="<?php echo base_url('admin/faq/change_faq_status/' . $faqs['id'] . '/Inactive'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Inaktiv" class="change-status"><i class="fa fa-thumbs-up"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('admin/faq/change_faq_status/' . $faqs['id'] . '/Active'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Aktiv" class="change-status"><i class="fa fa-thumbs-down"></i></a>
                    <?php } ?>
                    <a href="<?php  echo base_url('admin/edit-faq/' . $faqs['id']); ?>" data-toggle="tooltip" data-placement="top" title="FAQ bearbeiten"> <i class="fa fa-edit"></i></a>
                </td>
            </tr>
            <?php $i++; } } ?>
        </tbody>
    </table>
</div>