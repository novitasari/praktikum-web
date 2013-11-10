<?php error_reporting(0); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Tambah Data</title>
</head>

<body>
<!-- Form untuk menambahkan data dengan method post dan aksi PHP_SELF -->
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	<table>
		<tr>
			<td>NIM</td>
			<!-- Input box untuk NIM -->
			<td><input type="text" name="nim" /></td>
		</tr>
		<tr>
			<td>Nama</td>
			<!-- Input box untuk Nama -->
			<td><input type="text" name="nama" size=40 /></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<!-- Input box untuk Alamat -->
			<td><input type="text" name="alamat" size=60 /></td>
		</tr>
		<tr>
			<td></td>
			<!-- Button untuk submit -->
			<td><input type="submit" value="Simpan" /></td>
		</tr>
	</table>
</form>

<?php
// Pemanggilan file koneksi database
require_once './koneksi.php';

// Jika field nim dan nama diisi lalu disubmit
if (isset($_POST['nim']) && isset($_POST['nama'])) {
	// Deklarasi variabel nim dengan isi variabel $_POST['nim']
	$nim    = $_POST['nim'];
	// Deklarasi variabel nama dengan isi variabel $_POST['nama']
	$nama   = $_POST['nama'];
	// Deklarasi variabel alamat dengan isi variabel $_POST['alamat']
	$alamat = $_POST['alamat'];

	// Tambahkan data baru ke tabel
	$sql = "INSERT INTO mahasiswa VALUES ('" .$nim. "', '" .$nama. "', '" .$alamat. "')";

	// Deklarasi variabel res dengan isi fungsi mysql_query
	$res = mysql_query($sql);

	// Opeasi kondisi untuk mengecek apakah variabel res berhasil dideklarasikan
	if($res){
		// Jika berhasil maka akan menampilkan teks 'Data Berhasil Ditambahkan'
		echo 'Data Berhasil Ditambahkan';
		// Menutup koneksi mysql
		mysql_close($res);
	}else{
		// Jika gagal, maka akan menampilkan teks 'Gagal Menambah Data'
		echo 'Gagal Menambah Data <br />';
		// Menampilkan error mysql
		echo mysql_error();
	}
}

echo '<hr />';
// Memanfaatkan script pengambilan data untuk
// menampilkan hasil
// Pemanggilan file latihan3-1.php
require_once './latihan3-1.php';
?>

</body>
</html>