<div class="hk-pg-wrapper">
	<!-- Container -->
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
				<h2 class="hk-pg-title font-weight-600 mb-10">Instrumententafel</h2>
			</div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
					<div class="col-sm-12">
						<div class="card-group hk-dash-type-2">
							<div class="card card01 card-sm">
								<a href="<?php echo base_url('admin/users'); ?>">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-5">
											<div>
												<span class="d-block font-15 text-dark font-weight-500">Benutzer</span>
											</div>
										</div>
										<div>
											<span class="d-block display-4 text-dark mb-5"><?php  echo $userscount; ?></span>
										</div>
									</div>
								</a>
							</div>
						
							<div class="card card02 card-sm">
								<a href="<?php echo base_url('admin/posts'); ?>">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-5">
											<div>
												<span class="d-block font-15 text-dark font-weight-500">Beiträge</span>
											</div>
										</div>
										<div>
											<span class="d-block display-4 text-dark mb-5"><span class="counter-anim"><?php  echo $postscount; ?></span></span>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>	
				</div>
			</div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
</div>