<div id="res_status"></div>
<div class="table-wrap">
    <table id="datable_1" class="table table-hover w-100 display pb-30">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Benutzerbild</th>
                <th>Nutzername</th>
                <th>Benutzer Email</th>
                <th>Benutzertelefon</th>
                <th>Status</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) { $i = 1; foreach ($users as $user) {?>
            <tr>
                <td><?php echo $i; ?></td>
                <?php if (!empty($user['image'])) { ?>
                    <td><img height="100" width="100" src="<?php echo base_url('uploads/users/' . $user['image']); ?>"/></td>
                <?php }else{ ?>
                    <td><img height="100" width="100" src="<?php echo base_url('public/images/userimg.png'); ?>"/></td> 
                <?php } ?>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <?php if (!empty($user['phone'])) { ?>
                    <td><?php echo $user['phone']; ?></td>
                <?php }else{ ?>
                    <td>N/A</td>
                <?php } ?>
                <?php if($user['status'] == 'Active'){ ?>
                    <td><?php echo 'Unblocked' ?></td>
                <?php }else{ ?>
                    <td><?php echo 'Blocked' ?></td>
                <?php } ?>
                <td>
                    <?php if ($user['status'] == 'Active') { ?>
                        <a href="<?php echo base_url('admin/users/change_users_status/' . $user['user_id'] . '/Inactive'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Inaktiv" class="change-status"><i class="fa fa-thumbs-up"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('admin/users/change_users_status/' . $user['user_id'] . '/Active'); ?>" data-toggle="tooltip" data-placement="top" title="Ändern Sie den Status in Aktiv" class="change-status"><i class="fa fa-thumbs-down"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php $i++; } } ?>
        </tbody>
    </table>
</div>