<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>Province</h1>
    <ul>
        <?php foreach($provinces As $province) {?>
        <li><?= $province->province_id ?>.<?= $province->province_name ?></li>
        <?php }?>
    </ul>
</body>
</html>