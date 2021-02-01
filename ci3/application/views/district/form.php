<!-- Main Content -->
<div id="content">

	<?php $this->load->view("layout/menu-top") ?>

	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fas fa-download fa-sm text-white-50"></i> Home</a>
		</div>

		<!-- Collapsable Card Example -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
				aria-expanded="true" aria-controls="collapseCardExample">
				<h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
					<?php
                        // $attr = array(
                        //     'name' => 'formAdd',
                        //     'id' => 'formAdd',
                        // );
                        // // normal form
                        // echo form_open("Amphur_New/add",$attr);
                        // // upload file
                        // // echo form_open_multipart("Amphur_New/add",$attr);
                        // $attr = array(
                        //     'id' => 'name',
                        //     'name' => 'name',
                        //     'value' => '',
                        //     'class' => 'form-control',
                        //     'style' => '',
                        //     'placeholder' => 'Input Name'
                        // );
                        // echo form_input($attr);
                        // $attr = array(
                        //     'id' => 'pwd',
                        //     'name' => 'pwd',
                        //     'value' => '',
                        //     'class' => 'form-control',
                        //     'style' => '',
                        //     'placeholder' => 'Input Password'
                        // );
                        // echo form_password($attr);
                        // $attr = array(
                        //     'id' => 'memo',
                        //     'name' => 'memo',
                        //     'value' => '',
                        //     'class' => 'form-control',
                        //     'style' => '',
                        //     'placeholder' => 'Input Textarea',
                        //     'rows' => 4
                        // );
                        // echo form_textarea($attr);
                        // $attr = array(
                        //     'hid' => '100'
                        // );
                        // echo form_hidden($attr);
                        // $options = array(
                        //     '1' => 'Male',
                        //     '2' => 'Female'
                        // );
                        // $attr = array(
                        //     'id' => 'number',
                        //     'name' => 'number',
                        //     'value' => '',
                        //     'class' => 'form-control',
                        //     'style' => '',
                        // );
                        // echo form_dropdown('gender',$options,1,$attr);
                        // $nums = range(1,100);
                        // echo form_multiselect('number[]',$nums,0,$attr);
                        // $attr = array(
                        //     'id' => 'btn',
                        //     'name' => 'btn',
                        //     'value' => 'ส่งข้อมูล',
                        //     'class' => 'btn btn-success btn-xl',
                        // );
                        // echo form_submit($attr);


                        // echo form_close();
                    ?>
					<?php if ($this->session->flashdata("flash_errors")){?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?php echo $this->session->flashdata("flash_errors")?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>

					<?php
                    if($this->session->flashdata("flash_success")) {
                    ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?php echo $this->session->flashdata("flash_success")?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<?php
                        $attr = array(
                            'name' => 'formAdd',
                            'id' => 'formAdd',
                        );

                        $action = $method == 'edit'?'District/edit/'.$district->district_id:'District/add';
                        // normal form
                        echo form_open($action,$attr);
                    ?>
					<div class="form-group row">
						<label for="province_code" class="col-sm-2 col-form-lable">Province</label>
						<div class="col-sm-4">
							<?php 
                                $attr = array(
                                    'id' => 'province_id',
                                    'name' => 'province_id',
                                    'value' => '',
                                    'class' => 'form-control',
                                    'style' => '',
                                );
                                $province_id = isset($district)?$district->province_id:0;
                                $selected = set_value("province_id") ? set_value("province_id") : $province_id;
                                echo form_dropdown("province_id", $provinces, $selected, $attr);
                            ?>
						</div>
                    </div>
                    <div class="form-group row">
						<label for="province_code" class="col-sm-2 col-form-lable">Amphur</label>
						<div class="col-sm-4">
							<?php 
                                $attr = array(
                                    'id' => 'amphur_id',
                                    'name' => 'amphur_id',
                                    'value' => '',
                                    'class' => 'form-control',
                                    'style' => '',
                                );
                                $amphur_id = isset($district)?$district->amphur_id:0;
                                $selected = set_value("amphur_id") ? set_value("amphur_id") : $amphur_id;
                                echo form_dropdown("amphur_id", $amphurs, $selected, $attr);
                            ?>
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="province_code" class="col-sm-2 col-form-lable">Amphur</label>
						<div class="col-sm-4">
							<div>
								<select name="amphur_id" id="amphur_id" class="form-control">
									<option value="0">--อำเภอ--</option>
								</select>
							</div>
						</div>
					</div> -->
					<div class="form-group row">
						<label for="province_code" class="col-sm-2 col-form-lable">District Code</label>
						<div class="col-sm-4">
							<?php 
                                $district_code = isset($district)?$district->district_code:'';
                                $default = set_value("district_code")?set_value("district_code"):$district_code;
                                $attr = array(
                                    'id' => 'district_code',
                                    'name' => 'district_code',
                                    'value' => $default,
                                    'class' => 'form-control',
                                    'style' => '',
                                    'placeholder' => 'District Code'
                                );
                                echo form_input($attr);
                            ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="province_code" class="col-sm-2 col-form-lable">District Name</label>
						<div class="col-sm-4">
							<?php 
                                $district_name = isset($district)?$district->district_name:'';
                                $default = set_value("district_name")?set_value("district_name"):$district_name;
                                $attr = array(
                                    'id' => 'district_name',
                                    'name' => 'district_name',
                                    'value' => $default,
                                    'class' => 'form-control',
                                    'style' => '',
                                    'placeholder' => 'District Name'
                                );
                                echo form_input($attr);
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
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
