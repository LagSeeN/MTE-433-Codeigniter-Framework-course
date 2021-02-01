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
				<form id="frm" method="get" action="formshow.php">
					<table class="table table-striped">
						<tr>
							<td>Name</td>
							<td>Form Input</td>
						</tr>
						<tr>
							<td class="text-center">Input text</td>
							<td><input name="fullname" id="fullname" type="text" class="form-control" value="Yossapon"></td>
						</tr>
						<tr>
							<td class="text-center">Input password</td>
							<td><input name="pwd" id="pwd" type="password" class="form-control" value="Yossapon1141">
								<input type="button" name="view" id="view" value="show pass" class="btn btn-success">
							</td>
						</tr>
						<tr>
							<td class="text-center">Drop down</td>
							<td>
								<select name="year" class="form-control" style="display: inline;width: 100px">
									<option value="">-----</option>
									<?php
									$thisday = date('j');
									$thismonth = date('n');
									$thisyear = date('Y');

									for ($y = date('Y'); $y > date('Y') - 100; $y--) {
										?>
										<option value="<?=$y?>" <?if ($y == $thisyear) {echo "selected";}?> ><?=$y?></option>
									<?php }?>
								</select> /
								<select name="month" class="form-control" style="display: inline;width: 150px">
									<option value="">-----</option>
									<?php
									for ($m = 1; $m <= 12; $m++) {
										?>
										<option value="<?=$m?>" <?if ($m == $thismonth) {echo "selected";}?>><?=date("F", mktime(0, 0, 0, $m, 10))?></option>
									<?php }?>
								</select> /
								<select name="day" class="form-control" style="display: inline;width: 70px">
									<option value="">-----</option>
									<?php
									for ($d = 1; $d <= 31; $d++) {
										?>
										<option value="<?=$d?>" <?if ($d == $thisday) {echo "selected";}?> ><?=$d?></option>
									<?php }?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="text-center">Input Checkbox</td>
							<td>
								<input name="chk[]" type="checkbox" class="" value="1" checked> Choice 1<br>
								<input name="chk[]" type="checkbox" class="" value="2"> Choice 2<br>
								<input name="chk[]" type="checkbox" class="" value="3"> Choice 3<br>
							</td>
						</tr>
						<tr>
							<td class="text-center">Input Radio</td>
							<td>
								<input name="gender" value="Male" type="radio" class="" checked> Male<br>
								<input name="gender" value="Female" type="radio" class=""> Female<br>
							</td>
						</tr>
						<tr>
							<td class="text-center">Input Radio</td>
							<td>
								<textarea name="comment" class="form-control" rows="5">178 Grove Street Huntington, NY 11743</textarea>
							</td>
						</tr>
						<tr>
							<td class="text-center">Button</td>
							<td>
								<input name="submit" type="submit" class="btn btn-success" value="Send data">
								<input name="button" type="button" id="btnx" class="btn btn-warning" value="Button">
								<input name="reset" type="reset" class="btn btn-danger" value="Reser">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		// $("div").length;
		// $(".form-control").length;
		// $("#frm").length;
		// $("#frm").hide();
		$('#fullname').css('border','1px solid red');
		$('#view').click(function(){
			if($('#pwd').attr('type') == 'password')
				$('#pwd').attr('type','input');
			else
				$('#pwd').attr('type','password');
		});
		$('#btnx').click(function(){
			var params = {"a":$('#fullname').val(),"b":$('#pwd').val()}
			$.post('responseAJAX.php',params,function(data){
				alert(data);
			});
		});

	</script>
</body>
</html>
