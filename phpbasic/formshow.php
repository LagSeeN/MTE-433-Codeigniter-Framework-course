<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<title></title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="get" action="formshow.php">
					<table class="table table-striped">
						<tr>
							<td>Name</td>
							<td>Form Input</td>
						</tr>
						<tr>
							<td class="text-center">Input text</td>
							<td><?php echo $_GET['fullname']; ?></td>
						</tr>
						<tr>
							<td class="text-center">Input password</td>
							<td><?php echo $_GET['pwd']; ?></td>
						</tr>
						<tr>
							<td class="text-center">Input Checkbox</td>
							<td>
								<?php var_dump($_GET['chk']); ?> <br>
								<?php print_r($_GET['chk']); ?> <br>
								<?php foreach ($_GET['chk'] as $key => $value) {
									echo "$key = $value <br>";
								}?>
							</td>
						</tr>	
						<tr>
							<td class="text-center">Input Radio</td>
							<td><?php echo $_GET['gender']; ?></td>
						</tr>
						<tr>
							<td class="text-center">Input Radio</td>
							<td><?php echo $_GET['comment']; ?></td>
						</tr>
						<tr>
							<td class="text-center">Button</td>
							<td>
								<?php echo $_GET['submit']; ?>
								<? echo "hi" ?>
								<!-- <?php echo $_GET['button']; ?>
								<?php echo $_GET['reset']; ?> -->
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>