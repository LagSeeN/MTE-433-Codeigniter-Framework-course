 <!-- Main Content -->
 <div id="content">

 	<?php $this->load->view("layout/menu-top")?>
 	<!-- End of Topbar -->

 	<!-- Begin Page Content -->
 	<div class="container-fluid">

 		<!-- Page Heading -->
 		<div class="d-sm-flex align-items-center justify-content-between mb-4">
 			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
 			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
 					class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
 		</div>

 		<div class="card shadow mb-4">
 			<!-- Card Header - Accordion -->
 			<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
 				aria-expanded="true" aria-controls="collapseCardExample">
 				<h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
 			</a>
 			<!-- Card Content - Collapse -->
 			<div class="collapse show" id="collapseCardExample">
 				<div class="card-body">
 					<div class="row">
 						<div class="col-md-12">
 							<?php if ($this->session->flashdata("flash_errors")){?>
 							<div class="alert alert-danger alert-dismissible fade show" role="alert">
 								<?php echo $this->session->flashdata("flash_errors")?>
 								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 									<span aria-hidden="true">&times;</span>
 								</button>
 							</div>
 							<?php } ?>
 							<?php
                                $attr = array(
                                    'name' => 'formpass',
                                    'id' => 'formpass',
                                );

                                $action = 'User/changePassword';
                                // normal form
                                echo form_open($action,$attr);
                            ?>

 							<div class="form-group row">
 								<label for="province_code" class="col-sm-2 col-form-lable">Old Password</label>
 								<div class="col-sm-4">
 									<?php 
                                        $attr = array(
                                            'id' => 'old_password',
                                            'name' => 'old_password',
                                            'value' => '',
                                            'class' => 'form-control',
                                            'placeholder' => 'Old Password'
                                        );
                                        echo form_password($attr);
                                    ?>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="province_code" class="col-sm-2 col-form-lable">New Password</label>
 								<div class="col-sm-4">
 									<?php 
                                        $attr = array(
                                            'id' => 'new_password',
                                            'name' => 'new_password',
                                            'value' => '',
                                            'class' => 'form-control',
                                            'placeholder' => 'New Password'
                                        );
                                        echo form_password($attr);
                                    ?>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="province_code" class="col-sm-2 col-form-lable">Confirm Password</label>
 								<div class="col-sm-4">
 									<?php 
                                        $attr = array(
                                            'id' => 'confirm_password',
                                            'name' => 'confirm_password',
                                            'value' => '',
                                            'class' => 'form-control',
                                            'placeholder' => 'Confirm Password'
                                        );
                                        echo form_password($attr);
                                    ?>
 								</div>
 							</div>

 							<div class="form-group row">
 								<label for="" class="col-sm-2 col-form-lable"></label>
 								<div class="col-sm-4">
 									<?php 
                                        $attr = array(
                                            'id' => 'btn-submit',
                                            'name' => 'btn-submit',
                                            'value' => 'ส่งข้อมูล',
                                            'class' => 'btn btn-success btn-xl',
                                        );
                                        echo form_submit($attr);
                                    ?>
 								</div>
 							</div>

 							<?php echo form_close(); ?>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 	</div>
 	<!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
