<?php
	$ajax_num = $_POST['num'];
	
	
	require 'sweetlocalhost.class.php';
	$obj = new SweetLH();
	$obj->dispNews($ajax_num);
?>
