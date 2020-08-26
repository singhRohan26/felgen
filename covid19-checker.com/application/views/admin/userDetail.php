

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              User Detail<a href="<?php echo base_url('admin/user');?>" style="float: right;">Back</a></div>
            <div class="card-body">
            	<div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <label><b>Name : </b></label> <?php echo $user['name'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Email : </b></label> <?php echo $user['email'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Mobile No. : </b></label> <?php echo $user['phoneno'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Gender : </b></label> <?php echo $user['gender'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Age : </b></label> <?php echo $user['age'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Diseases : </b></label> <?php echo $user['diseases'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Smoker : </b></label> <?php echo $user['smoker'];?>
                </div>
                <div class="col-md-4">
                  <label><b>City : </b></label> <?php echo $user['city'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Cough : </b></label> <?php echo $user['cough'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Temp : </b></label> <?php echo $user['temp'];?>
                </div>
                <div class="col-md-4">
                  <label><b>Breath : </b></label> <?php echo $user['breath'];?>
                </div>
                <?php
                	if(!empty($user['illness_person'])){
                ?>
                <div class="col-md-4">
                  <label><b>Person : </b></label> <?php echo $user['illness_person'];?>
                </div>
                <?php
                	}
                ?>
                <!--<div class="col-md-4">-->
                <!--  <label><b>Payment_status : </b></label> <?php echo $user['payment_status'];?>-->
                <!--</div>-->
                <div class="col-md-4">
                  <label><b>Percentage : </b></label> <?php echo $percentage."%";?>
                </div>
              </div>
            </div>
            </div>
           
          </div>

      

        </div>
        <!-- /.container-fluid -->


      </div>
      <!-- /.content-wrapper -->

   