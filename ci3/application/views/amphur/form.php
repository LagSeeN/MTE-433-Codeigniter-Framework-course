<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Form</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if($method == 'edit'){
                    $action="Amphur/editSave/$amphur_id";
                    $str = "Edit form";
                }
                else{
                    $action="Amphur/addSave";
                    $str = "Add form";
                }
                ?>
                <form action="<?=base_url($action)?>" method="post">
                    <form>
                        <h1>Amphur <?=$str?></h1>
                        <div class="form-group row">
                            <label for="province_id" class="col-sm-2 col-form-lable">Province Name</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="selectProvince" id="selectProvince">
                                    <?php
                                        foreach($province as $provinces) {
                                    ?>
                                    <option value="<?=$provinces['province_id']?>"
                                        <?=is_object($amphur)?($amphur->province_id == $provinces['province_id']?"selected":''):'' ?>>
                                        <?=$provinces['province_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amphur_code" class="col-sm-2 col-form-lable">Amphur Code</label>
                            <div class="col-sm-4">
                                <?php $amphur_code = is_object($amphur)?$amphur->amphur_code:'';?>
                                <input type="text" class="form-control" id="amphur_code" name="amphur_code"
                                    value="<?=$amphur_code?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amphur_name" class="col-sm-2 col-form-lable">Amphur Name</label>
                            <div class="col-sm-4">
                                <?php $amphur_name = is_object($amphur)?$amphur->amphur_name:'';?>
                                <input type="text" class="form-control" id="amphur_name" name="amphur_name"
                                    value="<?=$amphur_name?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amphur_name" class="col-sm-2 col-form-lable"></label>
                            <div class="col-sm-4">
                                <button type="summit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</body>

</html>