<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css">

	<title></title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="">
					<table class="table table-striped">
						<tr>
							<td>Select Box1</td>
							<td>
								<select name="sel1" id="sel1">
									<option value="0">--Select option --</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Select Box2</td>
							<td>
								<select name="sel2" id="sel2">
									<option value="0">-- Sub Select option --</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Date From</td>
							<td><input id="datePicker1" class="datePicker" name="dateForm" width="276" /></td>
						</tr>
						<tr>
							<td>Date From</td>
							<td><input id="datePicker2" class="datePicker" name="dateTo" width="276" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
	<script type="text/javascript" src="./js/jquery.selectboxes.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#sel1").ajaxAddOption(
				"selectboxAjax.php",
				{'option':'sel1'},
				false,
				function(){
					$("#sel1").selectOptions("0");
				});

			$("#sel1").change(function(){
				var opt = $(this).val();
				$("#sel2").removeOption(/./);
				$("#sel2").ajaxAddOption(
					"selectboxAjax.php",
					{'option':'sel2','firstOption':opt},
					false,
					function(){
						$("#sel2").selectOptions("0");
					});
			});
			$('#datePicker1').datepicker({ format: 'yyyy-d-m' });
			$('#datePicker2').datepicker({ format: 'yyyy-d-m' });
		});
	</script>
</body>
</html>