<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Städtename</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($cities)) {
                $i = 1;
                foreach ($cities as $city) {
                    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $city['name']; ?></td>
            </tr>
            <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>