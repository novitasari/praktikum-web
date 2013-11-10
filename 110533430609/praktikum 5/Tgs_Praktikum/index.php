<?php
	// Pemanggilan fungsi ob_start() untuk menghindari warning cannot modify header information
	ob_start();
	// Pemanggilan fungsi session_start() untuk memulai session
	session_start();
	// Pemanggilan fungsi error_reporting dengan parameter 0 agar tidak menampilkan warning
	error_reporting();
	// Pengaturan setting ini_set dengan parameter display_errors dan bernilai 1
	ini_set('display_errors', 1);
	// Mendefinisikan konstanta _VALID dan bernilai 1
	define('_VALID', 1);
	// Mendefinisikan konstanta MHS dan bernilai mahasiswa
	define('MHS', 'mahasiswa');
	// Pemanggilan file koneksi.php
	require_once '../koneksi.php';
	// Pemanggilan file data_handler.php
	require_once './data_handler.php';
	// Pemanggilan file auth.php
	require_once './auth.php';	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Tugas Praktikum</title>
	<!-- Tag css eksternal -->
	<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>

<div id="main">
	<!-- Teks pada halaman awal -->
	<h1>Tugas Praktikum</h1>

	<div id="content">
		<!-- Link website -->
		<h2><?php if(cek_login()==false){ ?><a href="?page=data">DATA MAHASISWA</a> | <a href="?page=login">LOGIN</a><?php }else{ ?><a href="?page=data">ADMINISTRASI</a> | <a href="?page=logout">LOGOUT</a><?php } ?></h2>
		<hr/>
		<br/>
		<?php
		switch($_GET['page']){
			// Jika variabel page berisi data
			case "data":
				// Memanggil fungsi data handler
				data_handler('?m=data');
				break;
			// Jika variabel page berisi login
			case "login":
				// Pemanggilan fungsi init_login()
				init_login();
				// Pemanggilan fungsi validate()
				validate();
				break;
			// Jika page berisi logout
			case "logout":
				// Pemanggilan fungsi logout()
				logout();
				break;
			// Jika page tidak didefinisikan
			default:
				// Memanggil fungsi data handler
				data_handler('?m=data');
				break;
		}
		?>
	</div>
</div>

</body>
</html>