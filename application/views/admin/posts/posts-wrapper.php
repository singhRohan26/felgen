<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Produktname</th>
                <th>Nutzername</th>
                <th>Produktfarbe</th>
                <th>Produktpreis</th>
                <th>Produkthersteller</th>
                <th>Produktgröße</th>
                <th>Produkt Schraubenkreis</th>
                <th>Produktstandort</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($posts)) { $i = 1; foreach ($posts as $post) {?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $post['title']; ?></td>
                <td><?php echo $post['name']; ?></td>
                <td><?php echo $post['color']; ?></td>
                <td><?php echo $post['price']; ?></td>
                <td><?php echo $post['manufacturer_name']; ?></td>
                <td><?php echo $post['size']; ?></td>
                <td><?php echo $post['pcd_name']; ?></td>
                <td><?php echo $post['city']; ?></td>
                <td>
                    <a href="<?php echo base_url('admin/posts/post_detail/' . $post['post_id']); ?>" data-toggle="tooltip" data-placement="top" title="Details zum Beitrag anzeigen"> <i class="fa fa-eye"></i></a>
                </td>
            </tr>
            <?php $i++; } } ?>
        </tbody>
    </table>
</div>