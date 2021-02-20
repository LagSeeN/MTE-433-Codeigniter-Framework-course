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
        
        <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
        role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Province Form</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
           <div class="row">
			<div class="col-md-12">
				<?php 
					if($method == 'edit'){
						$action ="Province/editSave/$province_id";
						$str = "Edit form";
					}
					else
					{
						$action = "Province/addSave";
						$str = "Add form";
					}	
					
				 ?>
				<form method="post" action="<?=base_url($action)?>">
					 <h1>Province <?=$str ?></h1>
					 <div class="form-group row">
					    <label for="province_code" class="col-sm-2 col-form-label">Province code</label>
					    <div class="col-sm-4">
					    	<?php 
					    		// (condition)?true:false;
					    	$province_code = is_object($province)?$province->province_code:'';
					    	 ?>
					      <input type="text" class="form-control" name="province_code" id="province_code" value="<?=$province_code ?>">
					    </div>
					  </div>

					  <div class="form-group row">
					    <label for="province_name" class="col-sm-2 col-form-label">Province Name</label>
					    <div class="col-sm-4">
					    	<?php 
					    	
					    	$province_name = is_object($province)?$province->province_name:'';
					    	 ?>
					      <input type="text" class="form-control" name="province_name" id="province_name" value="<?=$province_name ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="province_name" class="col-sm-2 col-form-label">
					    	
					    </label>
					    <div class="col-sm-4">
					      <button type="submit" class="btn btn-success">Save</button>
					    </div>
					  </div>

				</form>
			</div>
		</div>
        </div>
    </div>
</div>

		
	
        
       

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

            

