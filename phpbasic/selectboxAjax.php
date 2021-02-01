<?php 
	
	$option = $_GET['option'];
	if($option=='sel1'){
		$arr = array();
		for ($i=1; $i <=10 ; $i++) { 
		$arr[$i] = "# code... $i";
		}
		echo json_encode($arr);
	}
	if($option=='sel2'){
		$firstOption = $_GET['firstOption'];
		$arr = array(0=>'-- Sub Select option --');
		for ($i=1; $i <=rand(5,100) ; $i++) { 
		$arr[$i] = "sub # code... $firstOption $i";
		}
		echo json_encode($arr);
	}
?>