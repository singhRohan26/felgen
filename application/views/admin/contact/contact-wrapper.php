<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Botschaft</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($contact)) {
                $i = 1;
                foreach ($contact as $contacts) {
                    ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $contacts['name']; ?></td>
                <td><?php echo $contacts['email']; ?></td>
                <td><?php echo $contacts['message']; ?></td>
            </tr>
            <?php
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>