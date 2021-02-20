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
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <?php 
                    // Form Helper
                    // $attr = array(
                    //         'name' =>'formAdd' , 
                    //         'id' =>'formAdd' , 
                    // );
                    // // for General form
                    // echo form_open("Amphur/add",$attr);
                    // // For Upload file
                    // // echo form_open_multipart("Amphur/add",$attr);
                    // $attr = array(
                    //     'id'=>'name',
                    //     'name' => 'name' ,
                    //     'value'=>'',
                    //     'class'=>'form-control',
                    //     'style'=>'',
                    //     'placeholder'=>'Input name',

                    // );
                    // echo form_input($attr);

                    // $attr = array(
                    //     'id'=>'pwd',
                    //     'name' => 'pwd' ,
                    //     'value'=>'',
                    //     'class'=>'form-control',
                    //     'style'=>'',
                    //     'placeholder'=>'Input password',

                    // );
                    // echo form_password($attr);

                    // $attr = array(
                    //     'id'=>'memo',
                    //     'name' => 'memo' ,
                    //     'value'=>'',
                    //     'class'=>'form-control',
                    //     'style'=>'',
                    //     'placeholder'=>'Input password',
                    //     'rows'=> 4

                    // );
                    // echo form_textarea($attr);

                    // $attr = array(
                    //     'hid'=>'100',                        

                    // );
                    // echo form_hidden($attr);

                    // $attr = array(
                    //     'class'=>'form-control',
                    //     'id'=>'gender',
                    // );
                    // $options = array(
                    //         '1'=>'Male',
                    //         '2'=>'Femail'
                    // );

                    // echo form_dropdown('gender',$options,2,$attr);

                    // $nums = range(1,100);
                    // $attr = array(
                    //     'class'=>'form-control',
                    //     'id'=>'num1',
                    // );
                    // echo form_multiselect('num1[]',$nums,array(1,2,3),$attr);

                    // $attr = array(
                    //     'id'=>'btn',
                    //     'name' => 'btn' ,
                    //     'value'=>'ส่งข้อมูล',
                    //     'class'=>'btn btn-success btn-xl',
                    // );

                    // echo form_submit($attr);

                    // echo form_close();
                    ?>

                    <?php if($this->session->flashdata('flash_errors')){ ?>     
                    <div class="col-12 col-sm-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?= $this->session->flashdata('flash_errors')  ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    </div>                                  
                    <?php } ?>

                    <?php if($this->session->flashdata('flash_success')){ ?>
                    <div class="col-12 col-sm-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= $this->session->flashdata('flash_success') ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    </div>     
                    <?php } ?>

                    <?php 
                    
                    $attr = array(
                            'name' =>'formAdd' , 
                            'id' =>'formAdd' , 
                    );                    
                    
                    $action = ($method=='edit')?"Amphur/edit/$amphur->amphur_id":'Amphur/add';

                    echo form_open($action,$attr);
                     ?>
                     <div class="form-group row">
                        <label for="province_code" class="col-sm-3 col-form-label">Province</label>
                        <div class="col-sm-6">
                          <?php 
                             $attr = array(
                                'id'=>'province_id',
                                'value'=>'',
                                'class'=>'form-control',
                                'style'=>'',
                                'placeholder'=>'Province',
                            );
                            
                            $province_id = is_object($amphur)?$amphur->province_id:0;
                            $selected = set_value("province_id")?set_value("province_id"):$province_id;
                            echo form_dropdown('province_id',$provinces, $selected ,$attr);
                            
                          ?>
                        </div>
                      </div>

                     <div class="form-group row">
                        <label for="province_code" class="col-sm-3 col-form-label">Amphur code</label>
                        <div class="col-sm-6">
                          <?php 
                            $amphur_code = is_object($amphur)?$amphur->amphur_code:'';

                            $default = set_value("amphur_code")?set_value("amphur_code"):$amphur_code;
                            $attr = array(
                                'id'=>'amphur_code',
                                'name' => 'amphur_code' ,
                                'value'=> $default ,
                                'class'=>'form-control',                                
                                'placeholder'=>'Amphur code',
                            );
                            
                            echo form_input($attr);
                            
                          ?>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="province_code" class="col-sm-3 col-form-label">Amphur name</label>
                        <div class="col-sm-6">
                          <?php 
                            $amphur_name = is_object($amphur)?$amphur->amphur_name:'';
                            $default = trim(set_value("amphur_name")?set_value("amphur_name"):$amphur_name);
                             $attr = array(
                                'id'=>'amphur_name',
                                'name' => 'amphur_name' ,
                                'value'=>$default ,
                                'class'=>'form-control',
                                'style'=>'',
                                'placeholder'=>'Amphur name',
                            );
                            
                            echo form_input($attr);
                            
                          ?>
                        </div>
                      </div>

                       <div class="form-group row">
                        <label for="province_code" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-6">
                          <?php 


                             $attr = array(
                                'id'=>'btn-submit',
                                'name' => 'btn-submit' ,
                                'value'=>'Save province',
                                'class'=>'btn btn-success btn-xl',                                
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