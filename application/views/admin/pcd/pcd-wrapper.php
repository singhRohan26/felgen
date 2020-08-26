<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>PCD Name</th>
                <th>Status</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($pcd)) {
                $i = 1;
                foreach ($pcd as $pcds) {
                    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $pcds['pcd_name']; ?></td>
                <td><?php echo $pcds['status']; ?></td>
                <td>
                    <?php if ($pcds['status'] == 'Active') { ?>
                        <a href="<?php echo base_url('admin/pcd/change_pcd_status/' . $pcds['pcd_id'] . '/Inactive'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Inaktiv" class="change-status"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('admin/pcd/change_pcd_status/' . $pcds['pcd_id'] . '/Active'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Aktiv" class="change-status"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } ?>
                    <a href="<?php echo base_url('admin/pcd/' . $pcds['pcd_id']); ?>" data-toggle="tooltip" data-placement="top" title="Pcd bearbeiten"><i class="fa fa-edit"></i></a>
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