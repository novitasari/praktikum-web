<?php error_reporting(0); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Menciptakan Tabel</title>
</head>

<body>

<?php
// Pemanggilan file koneksi database
require_once './koneksi.php';

// Deklarasi variabel sql dengan isi fungsi membuat tabel mahasiswa
// Tabel menggunakan engine MyISAM
$sql = 'CREATE TABLE mahasiswa(
		nim VARCHAR(12) NOT NULL,
		nama VARCHAR(40) NOT NULL,
		alamat VARCHAR(100),
		PRIMARY KEY (nim)
		)ENGINE=MyISAM;';

// Deklarasi variabel res dengan isi mysql_query variabel sql
$res = mysql_query($sql);

// Operasi kondisi untuk mengecek apakah variabel res berhasil dideklarasikan
if($res){
	// Jika berhasil, maka akan menampilkan teks 'Tabel Created'
	echo 'Tabel Created';
	// Menutup koneksi mysql
	mysql_close($res);
}else{
	// Jika gagal, maka akan menampilkan pesan error mysql
	echo mysql_error();
}

?>

</body>
</html>