<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Größe</th>
                <th>Status</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($size)) {
                $i = 1;
                foreach ($size as $sizes) {
                    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $sizes['size']; ?></td>
                <td><?php echo $sizes['status']; ?></td>
                <td>
                    <?php if ($sizes['status'] == 'Active') { ?>
                        <a href="<?php echo base_url('admin/size/change_size_status/' . $sizes['size_id'] . '/Inactive'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Inaktiv" class="change-status"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('admin/size/change_size_status/' . $sizes['size_id'] . '/Active'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Aktiv" class="change-status"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } ?>
                    <a href="<?php echo base_url('admin/size/' . $sizes['size_id']); ?>" data-toggle="tooltip" data-placement="top" title="Größe bearbeiten"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>