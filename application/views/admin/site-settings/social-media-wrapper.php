<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Sozialen Medien</th>
                <th>Social Media URL</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($socialmedia)) {
                $i = 1;
                foreach ($socialmedia as $socialmedias) {
                    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $socialmedias['social_media']; ?></td>
                <td><?php echo $socialmedias['url']; ?></td>
                <td>
                    <a href="<?php echo base_url('admin/socialmedia/' . $socialmedias['id']); ?>" data-toggle="tooltip" data-placement="top" title="Social Media Link bearbeiten"><i class="fa fa-edit"></i></a>
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