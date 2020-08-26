

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">User Details</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              User Details</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile No.</th>
                      <!--<th>Payment Status</th>-->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        if(!empty($users)){
                            $sr = 1;
                          foreach ($users as $user) {
                    ?>
                     <tr>
                      <td><?php echo $sr;?></td>
                      <td><?php echo $user['name'];?></td>
                      <td><?php echo $user['email'];?></td>
                      <td><?php echo $user['phoneno'];?></td>
                      <!--<td><?php echo $user['payment_status'];?></td>-->
                      <td><a href="<?php echo base_url('admin/userDetail/'. $user['id']);?>"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    <?php
                          $sr++;
                            }
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>

      

        </div>
        <!-- /.container-fluid -->


      </div>
      <!-- /.content-wrapper -->

   