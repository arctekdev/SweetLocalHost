<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Sweet Localhost</title>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="sweetlocalhost/sweetlocalhost.css" type="text/css" rel="stylesheet"/>
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
	<div id="news_section_wrap">
		<div id="sec_remain"></div><div id="news_section"></div>
	</div>
	<section class='slh_wrap'>
	<?php
	require 'sweetlocalhost/sweetlocalhost.class.php';
	$cDir = getcwd();
	$slh = new SweetLH();
	$slh->loadTitle();
	$slh->loadPHPver();
	$slh->loadSQLver();
	$slh->loadExt();
	?>
	</section>
	
	<div class='slh_wrap' id="localhost_dirs_wrap">
		<?php
		$slh->loadArr();
		?>
	</div>
	<div class='slh_wrap' id="folder_creation">
		<h4>Create a new folder</h4>
		<label>Name: </label><input type="text" id="dir_name"/><button id="cf_btn">create</button>
	</div>
	<section class='slh_wrap'>
	<?php
	echo "<h2>Usefull links	</h2>";
	$slh->loadphpmyadmin();
	$slh->loadphpinfo();
	$slh->loadGoogle_lib_link();
	$slh->loadJQuery_lib_link();
	
	?>
	</section>
	<?php
	/* 
	 * these is basically a CopyRight notice, you can delete it if you wish and if it bothers you, but don't share the script 
	 * from your own sources or claim it as your own, you can customize it to your hearts content and share it to your friends or collegues but 
	 * remember to mention the author, I'd greatly appreciate that, it's not a must though.
	 */
	 $slh->loadCred();
	?>
<script src="sweetlocalhost/ajax.js"></script>

</body>
</html>