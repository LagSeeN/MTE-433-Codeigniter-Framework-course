<!DOCTYPE html>
<html>

<head>
    <title>Amphur Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr colspan="4">
                            <form action="<?=base_url("Amphur/index")?>" method="get">
                                <a href="<?=base_url("Amphur/addForm")?>" class="btn btn-success">Add</a>
                                Total <span style="color:red"><?=count($amphurs)?></span> records 
                                Search : <input type="text" name="keyword" value="<?=$keyword?>">
                                <button type="summit">Go!</button>
                            </form>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Amphur name</th>
                            <th>Province ID</th>
                            <th>Action</th>
                        </tr>

                        <?php foreach ($amphurs as $amphur) {?>
                        <tr>
                            <td><?=$amphur->amphur_id?></td>
                            <td><?=$amphur->amphur_code?></td>
                            <td><?=$amphur->amphur_name?></td>
                            <td><?=$amphur->province_id?></td>
                            <td>
                                <a href="<?=base_url("Amphur/editForm/$amphur->amphur_id")?>" class="btn btn-warning">Edit</a>
                                <a href="<?=base_url("Amphur/delete/$amphur->amphur_id")?>" class="btn btn-danger" onclick="return confirm('Delete?');">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>

</html>