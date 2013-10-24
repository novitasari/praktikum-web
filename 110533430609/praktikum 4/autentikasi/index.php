<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Halaman Administrator</title>
<style type="text/css">
	.inner{
		margin: 200px auto;
		padding: 20px;
		width: 240px;
		border: 1px solid #444;
	}
</style>
</head>
<body>
<?php
ini_set('display_errors', 1);
define('_Valid', 1);
//include file eksternal
require_once('./auth.php');
init_login();
validate();
?>
<h3>Simulasi Halaman Akhir<h3/>
<h3>SESSION<h3/>
<p>
<a href="?m=logout">logout</a>
<p/>
menu-menu admin ada di sini
</body>
</html>