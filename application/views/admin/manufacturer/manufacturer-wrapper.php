<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Herstellername</th>
                <th>Status</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($manufacturer)) {
                $i = 1;
                foreach ($manufacturer as $manufacturers) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $manufacturers['manufacturer_name']; ?></td>
                <td><?php echo $manufacturers['status']; ?></td>
                <td>
                    <?php if ($manufacturers['status'] == 'Active') { ?>
                        <a href="<?php echo base_url('admin/manufacturer/change_manufacturer_status/' . $manufacturers['manufacturer_id'] . '/Inactive'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Inaktiv" class="change-status"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('admin/manufacturer/change_manufacturer_status/' . $manufacturers['manufacturer_id'] . '/Active'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Aktiv" class="change-status"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php } ?>
                    <a href="<?php echo base_url('admin/manufacturer/' . $manufacturers['manufacturer_id']); ?>" data-toggle="tooltip" data-placement="top" title="Hersteller bearbeiten"><i class="fa fa-edit"></i></a>
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