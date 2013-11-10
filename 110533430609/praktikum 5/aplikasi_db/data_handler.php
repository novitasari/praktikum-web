<?php

error_reporting(0);

/**
* Fungsi utama untuk menangani pengolahan data
* @param string root parameter menu
*/

function data_handler($root){
	// Pengecekan apakah variabel $_GET['act'] telah di-set dan bernilai 'add'
	if(isset($_GET['act']) && $_GET['act']=='add'){
		// Jika benar, maka akan memanggil fungsi data_editor dengan parameter variabel root
		data_editor($root);
		return;
	}

	// Deklarasi variabel sql dengan isi query mysql
	$sql = 'SELECT COUNT(*) AS total FROM ' . MHS;
	// Deklarasi variabel res dengan isi mysql_query variabel sql
	$res = mysql_query($sql);

	// Jika data di tabel ada
	if(mysql_num_rows($res)){
		// Pengecekan apakah variabel $_GET['act'] telah di-set dan tidak bernilai kosong
		if(isset($_GET['act']) && $_GET['act'] != ''){
			// Operasi pemilihan variabel $_GET['act']
			switch($_GET['act']) {
				// Jika bernilai 'edit'
				case 'edit':
					// Pengecekan apakah variabel $_GET['id'] telah di-set dan berupa digit
					if(isset($_GET['id']) && ctype_digit($_GET['id'])){
						// Jika benar, maka akan memanggil fungsi data_editor dengan parameter root dan variabel $_GET['id']
						data_editor($root, $_GET['id']);
					}else{
						// Jika salah, maka akan memanggil fungsi show_admin_data dengan parameter variabel root
						show_admin_data($root);
					}
					// Fungsi break untuk menghentikan operasi
					break;
				// Jika bernilai 'view'
				case 'view':
					// Pengecekan apakah variabel $_GET['id'] telah di-set dan berupa digit
					if(isset($_GET['id']) && ctype_digit($_GET['id'])){
						// Jika benar, maka akan memanggil fungsi data_detail dengan parameter root dan variabel $_GET['id']
						data_detail($root, $_GET['id'], 1);
					}else{
						// Jika salah, maka akan memanggil fungsi show_admin_data dengan parameter variabel root
						show_admin_data($root);
					}
					// Fungsi break untuk menghentikan operasi
					break;
				// Jika bernilai 'del'
				case 'del':
					if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
						// Key untuk penghapusan data
						$id = $_GET['id'];
						// Lengkapi pernyataan SQL hapus data
						$sql = 'DELETE FROM ' . MHS . ' WHERE nim=' . $id;
						// Deklarasi variabel res dengan isi mysql_query variabel sql
						$res = mysql_query($sql);
						// Jika deklarasi variabel res berhasil dideklarasikan
						if($res){ ?>
							<script type="text/javascript">
								document.location.href="<?php echo $root;?>";
							</script>
						<?php } else {
							// Jika gagal maka akan menampilkan teks 'Gagal menghapus data'
							echo 'Gagal menghapus data';
						}
					}else{
						// Jika salah, maka akan memanggil fungsi show_admin_data dengan parameter variabel root
						show_admin_data($root);
					}
					// Fungsi break untuk menghentikan operasi
					break;
				// Nilai default pada pernyataan switch
				default:
					// Memanggil fungsi show_admin_data dengan parameter variabel root
					show_admin_data($root);
			}
		}else{
			// Jika pernyataan salah, maka akan memanggil variabel show_admin_data dengan parameter root
			show_admin_data($root);
		}
		// Menutup koneksi mysql
		@mysql_close($res);
	}else{
		// Jika belum ada data, maka akan menampilkan teks 'Data Tidak Ditemukan'
		echo 'Data Tidak Ditemukan';
	}
}

/**
* Fungsi untuk menampilkan menu administrasi
* @param string root parameter menu
*/

function show_admin_data($root) { ?>
	<h2 class="heading">Administrasi Data</h2>
	
	<?php
	// Deklarasi variabel sql dengan isi query mysql
	$sql = 'SELECT nim, nama, alamat FROM ' . MHS;
	// Deklarasi variabel res dengan isi fungsi mysql_query
	$res = mysql_query($sql);

	// Pengecekan apakah variabel res berhasil dideklarasikan
	if($res){
		// Jika berhasil, maka akan mengecek jumlah data yang terdapat pada tabel mahasiswa
		$num = mysql_num_rows($res);
		// Jika telah ada datanya, maka akan menampilkan tabel
		if($num){
	?>

	<div class="tabel">
		<div style="padding:5px;">
			<!-- Tag link untuk menambahkan data ke dalam database -->
			<a href="<?php echo $root;?>&amp;act=add">Tambah Data</a>
		</div>
		<table border=1 width=700 cellpadding=4 cellspacing=0>
			<tr>
				<th>#</th>
				<th width=120>NIM</th>
				<th width=200>Nama</th>
				<th width=200>Alamat</th>
				<th>Menu</th>
			</tr>
			<?php
			// Deklarasi variabel i dengan nilai 1
			$i = 1;
			// Perulangan selama terdapat data pada database
			while($row = mysql_fetch_row($res)){
				// Deklarasi variabel bg dengan pengecekan jika variabel i bernilai genap, maka akan berisi 'even'
				$bg = (($i % 2) != 0) ? '' : 'even';
				// Deklarasi variabel id dengan isi variabel row indeks ke-0
				$id = $row[0]; ?>
				<!-- Pada tiap baris akan menampilkan variabel bg -->
				<tr class="<?php echo $bg;?>">
					<!-- Kolom untuk menampilkan variabel i -->
					<td width="2%"><?php echo $i;?></td>
					<!-- Kolom untuk menampilkan variabel id -->
					<td><a href="<?php echo $root;?>&amp;act=view&amp;id=<?php echo $id;?>" title="Lihat Data"><?php echo $id;?></a></td>
					<!-- Kolom untuk menampilkan variabel row dengan indeks ke-1 -->
					<td><?php echo $row[1];?></td>
					<!-- Kolom untuk menampilkan variabel row dengan indeks ke-2 -->
					<td><?php echo $row[2]?></td>
					<!-- Kolom untuk menampilkan link edit dan hapus -->
					<td align="center">| <a href="<?php echo $root;?>&amp;act=edit&amp;id=<?php echo $id;?>">Edit</a> | <a href="<?php echo $root;?>&amp;act=del&amp;id=<?php echo $id;?>">Hapus</a> |</td>
				</tr>
			<?php
				// Proses increment variabel i
				$i++;
			}
			?>
		</table>
	</div>
	<?php
		}else{
			// Jika data belum terisi, maka akan menampilkan teks 'Belum ada data'
			echo 'Belum ada data, isi <a href="'.$root.'&amp;act=add">di sini</a>';
		}
		// Menutup koneksi mysql
		@mysql_close($res);
	}
}

/**
* Fungsi untuk menampilkan detail data mahasiswa
* @param string root parameter menu
* @param integer id nim mahasiswa
*/

function data_detail($root, $id) {
	// Deklarasi variabel sql dengan isi query sql
	$sql = 'SELECT nim, nama, alamat FROM ' . MHS . ' WHERE nim=' . $id;
	// Deklarasi variabel res dengan isi mysql_query variabel sql
	$res = mysql_query($sql);

	// Pengecekan apakah variabel res berhasil dideklarasikan
	if($res){
		// Pengecekan apakah data ada dalam database
		if(mysql_num_rows($res)){
	?>
		<div class="tabel">
			<table border=1 width=700 cellpadding=4 cellspacing=0>
			<?php
			// Deklarasi variabel row dengan isi mysql_fetch_row variabel res
			$row = mysql_fetch_row($res);
			?>
			<tr>
				<td>NIM</td>
				<!-- Menampilkan variabel row dengan indeks ke-0 -->
				<td><?php echo $row[0];?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<!-- Menampilkan variabel row dengan indeks ke-1 -->
				<td><?php echo $row[1];?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<!-- Menampilkan variabel row dengan indeks ke-2 -->
				<td><?php echo $row[2];?></td>
			</tr>
		</table>
		</div>
		<?php
		}else{
			// Jika data belum ada, maka akan menampilkan teks 'Data Tidak Ditemukan'
			echo 'Data Tidak Ditemukan';
		}
		// Menutup koneksi mysql
		@mysql_close($res);
	}
}

/**
* Fungsi untuk menghasilkan form penambahan/pengubahan
* @param string root parameter menu
* @param integer id nim mahasiswa
*/

function data_editor($root, $id = 0){
	// Deklarasi variabel view dengan isi true
	$view = true;
	// Pengecekan apakah variabel $_POST['nim'] telah di-set
	if (isset($_POST['nim']) && $_POST['nim'] ) {
		// Jika tidak disertai id, berarti insert baru
		if (!$id) {
			// Lengkapi Pernyataan PHP SQL untuk INSERT data
			//$sql = 'INSERT INTO ' . MHS . ' VALUES('.$_POST[nim].','.$_POST[nama].','.$_POST[alamat].')';
			$sql = "INSERT INTO " . MHS . " VALUES('$_POST[nim]','$_POST[nama]','$_POST[alamat]')";
			// Deklarasi variabel res dengan isi mysql_query
			$res = mysql_query($sql);
			// Operasi kondisi jika variabel res berhasil dideklarasikan. Jika berhasil, maka akan redireksi ke root.
			if($res){ ?>
				<script type="text/javascript">
					document.location.href="<?php echo $root;?>";
				</script>
				<?php
			}else{
				// Jika gagal akan menampilkan teks 'Gagal menambah data'
				echo 'Gagal menambah data';
			}
		}else{
			// Jika update data tabel
			// Lengkapi Pernyataan PHP SQL untuk UPDATE data
			$sql = "UPDATE " . MHS . " SET nim='$_POST[nim]',nama='$_POST[nama]',alamat='$_POST[alamat]' WHERE nim='$id'";
			// Deklarasi variabel res dengan isi mysql_query
			$res = mysql_query($sql);
			// Pengecekan apakah variabel res berhasil dideklarasikan. Jika benar, maka akan redireksi ke root
			if($res) { ?>
				<script type="text/javascript">
					document.location.href="<?php echo $root;?>";
				</script>
			<?php }else{
				// Jika gagal, maka akan menampilkan teks 'Gagal memodifikasi'
				echo 'Gagal memodifikasi';
			}
		}
	}

	// Menyiapkan data untuk updating
	if($view){
		// Pengecekan untuk variabel id
		if($id){
			// Deklarasi variabel sql dengan isi query sql
			$sql = 'SELECT nim, nama, alamat FROM ' . MHS . ' WHERE nim=' . $id;
			// Deklarasi variabel res dengan isi mysql_query variabel sql
			$res = mysql_query($sql);
			// Jika deklarasi varibel res berhasil
			if($res){
				// Menghitung jumlah data pada tabel mahasiswa
				if(mysql_num_rows($res)){
					// Deklarasi variabel row dengan isi mysql_fetch_row variabel res
					$row    = mysql_fetch_row($res);
					// Deklarasi variabel nim dengan isi variabel row indeks ke-0
					$nim    = $row[0];
					// Deklarasi variabel nim dengan isi variabel row indeks ke-1
					$nama   = $row[1];
					// Deklarasi variabel nim dengan isi variabel row indeks ke-2
					$alamat = $row[2];
				}else{
					// Jika salah, maka akan memanggil fungsi show_admin_data
					show_admin_data();
					// Mengembalikan nilai kosong
					return;
				}
			}
		}else{
			// Deklarasi variabel nim dengan isi variabel $_POST['nim']
			$nim = @$_POST['nim'];
			// Deklarasi variabel nama dengan isi variabel $_POST['nama']
			$nama = @$_POST['nama'];
			// Deklarasi variabel alamat dengan isi variabel $_POST['alamat']
			$alamat = @$_POST['alamat'];
		}
	?>
		<h2><?php echo $id ? 'Edit' : 'Tambah';?> Data</h2>
		<!-- Form untuk edit data -->
		<form action="" method="post">
			<table border=1 cellpadding=4 cellspacing=0>
				<tr>
					<td width=100>NIM*</td>
					<!-- Input box untuk nim -->
					<td> <input type="text" name="nim" size=10 value="<?php echo $nim;?>" /> </td>
				</tr>
				<tr>
					<td>Nama</td>
					<!-- Input box untuk nama -->
					<td> <input type="text" name="nama" size=40 value="<?php echo $nama;?>" /> </td>
				</tr>
				<tr>
					<td>Alamat</td>
					<!-- Input box untuk alamat -->
					<td> <input type="text" name="alamat" size=60 value="<?php echo $alamat;?>" /> </td>
				</tr>
				<tr>
					<td></td>
					<!-- Button submit untuk mengirim data -->
					<td><input type="submit" value="Submit" /><input type="button" value="Cancel" onclick="history.go(-1)" /></td>
				</tr>
			</table>
		</form>
		<br />
		<p>Ket: * Harus diisi</p>

		<?php
	}
	// Mengembalikan nilai false
	return false;
}

?>