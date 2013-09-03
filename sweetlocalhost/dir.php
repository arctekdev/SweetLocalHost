<?php
	require 'sweetlocalhost.class.php';
	//make new object
	$obj = new SweetLH();
	//get all the variables from the ajax call
	$dir	= $_POST['dir'];
	$dArr	= $_POST['dArr'];
	
	//make dir PHP code
	if(isset($dir)){
		$obj->makeFolder($dir);
	}
?>