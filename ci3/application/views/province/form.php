<div class="content">
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
                <h6 class="m-0 font-weight-bold text-primary">Province</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
                                if($method == 'edit'){
                                    $action="Province/editSave/$province_id";
                                    $str = "Edit form";
                                }
                                else{
                                    $action="Province/addSave";
                                    $str = "Add form";
                                }
                            ?>
                            <form action="<?=base_url($action)?>" method="post">
                                <form>
                                    <h1>Province <?=$str?></h1>
                                    <div class="form-group row">
                                        <label for="province_code" class="col-sm-2 col-form-lable">Province Code
                                            label</label>
                                        <div class="col-sm-4">
                                            <?php $province_code = is_object($province)?$province->province_code:'';?>
                                            <input type="text" class="form-control" id="province_code"
                                                name="province_code" value="<?=$province_code?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="province_name" class="col-sm-2 col-form-lable">Province Name</label>
                                        <div class="col-sm-4">
                                            <?php $province_name = is_object($province)?$province->province_name:'';?>
                                            <input type="text" class="form-control" id="province_name"
                                                name="province_name" value="<?=$province_name?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="province_name" class="col-sm-2 col-form-lable"></label>
                                        <div class="col-sm-4">
                                            <button type="summit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>