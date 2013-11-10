<?php

error_reporting(0);

// File: seleksi.php diganti menjadi latihan 3-1.php
// Pemanggilan file koneksi database
require_once './koneksi.php';

// Deklarasi variabel sql dengan isi query sql
$sql = 'SELECT * FROM mahasiswa';
// Deklarasi variabel res dengan isi mysql_query variabel sql
$res = mysql_query($sql);

// Operasi kondisi untuk mengecek apakah variabel res berhasil dideklarasikan
if($res){
	// Jika berhasil, maka akan menghitung total baris yang ada di tabel mahasiswa dengan fungsi mysql_num_rows
	if(mysql_num_rows($res)){
?>
<!-- Pembuatan tabel -->
<table border=1 cellspacing=1 cellpadding=5>
	<tr>
		<th>#</th>
		<th width=100>NIM</th>
		<th width=150>Nama</th>
		<th>Alamat</th>
	</tr>

<?php
// Deklarasi variabel i dengan nilai 1
$i = 1;

// Perulangan selama isi masih ada
while($row = mysql_fetch_row($res)){
?>
	<tr>
		<!-- Menampilkan variabel i -->
		<td><?php echo $i;?></td>
		<!-- Menampilkan variabel row dengan indeks 0 / NIM -->
		<td><?php echo $row[0];?></td>
		<!-- Menampilkan variabel row dengan indeks 1 / Nama -->
		<td><?php echo $row[1];?></td>
		<!-- Menampilkan variabel row dengan indeks 2 / Alamat -->
		<td><?php echo $row[2];?></td>
	</tr>
<?php
// Proses increment pada variabel i
$i++;
}
?>

</table>

<?php
}else{
	// Jika data pada tabel mahasiswa kosong
	echo 'Data Tidak Ditemukan';
}
// Menutup koneksi mysql
mysql_close($res);
}

?>
