<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
		<?php foreach ($provinces as $province) { ?>			
		<li> <?php echo $province->province_id ?> . <?= $province->province_name ?> </li>
		<?php } ?>

	</ul>
</body>
</html>