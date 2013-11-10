<?php
// Catatan:
// Jika perlu, sesuaikan nama user dan password

// Deklarasi variabel host dengan isi localhost
$host = 'localhost';
// Deklarasi variabel user dengan isi root
$user = 'root';
// Deklarasi variabel pass dengan isi root
$pass = '';
// Deklarasi variabel db dengan isi myweb
$db   = 'myweb';

// Deklarasi variabel cnn dengan isi fungsi mysql_connect. Fungsi mysql_connect digunakan untuk koneksi dengan database. Fungsi ini memiliki tiga parameter yaitu host, user, dan pass
$cnn = mysql_connect($host, $user, $pass);

// Operasi kondisi jika koneksi gagal
if(!$cnn){
	// Keluar dari operasi kemudian menampilkan teks 'Koneksi Gagal'
	exit('Koneksi Gagal');
}

// Deklarasi variabel db dengan isi fungsi mysql_select_db serta memiliki parameter variabel db
$db = mysql_select_db($db);

// Operasi kondisi jika pemilihan database gagal
if(!$db){
	// Jika gagal, maka akan menampilkan teks 'Gagal Memilih Database'
	exit('Gagal Memilih Database');
}

?>
