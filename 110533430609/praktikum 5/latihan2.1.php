<?php error_reporting(0); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Menciptakan Database</title>
</head>

<body>

<?php
// Pemanggilan file koneksi database
require_once './koneksi.php';

// Deklarasi variabel db dengan isi myweb
$db = 'myweb';

// Deklarasi variabel res dengan isi fungsi mysql_query
$res = mysql_query('CREATE DATABASE ' . $db);

// Operasi kondisi apakah pembuatan database berhasil
if($res){
	// Jika berhasil, maka akan menampilkan teks 'Database myweb Created'
	echo 'Database ' .$db. ' Created';
	// Menutup koneksi mysql
	mysql_close($res);
}else{
	// Jika gagal, maka akan menampilkan pesan error mysql
	echo mysql_error();
}

?>

</body>
</html>
