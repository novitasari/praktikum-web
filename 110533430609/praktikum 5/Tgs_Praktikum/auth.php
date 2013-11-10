<?php
// Pengecekan apakah nama konstanta _VALID telah didefinisikan apa belum. Jika belum, maka akan menampilkan teks 'not allowed'
defined('_VALID') or die('not allowed');

// Fungsi cek_login untuk mengecek apakah sudah login atau belum
function cek_login(){
	if(isset($_SESSION['nlogin'])){
		// Jika variabel $_SESSION['nlogin'] telah di-set, maka akan mengembalikan nilai true
		return true;
	}else{
		// Jika tidak, maka akan mengembalikan nilai false
		return false;
	}
}

// Fungsi logout
function logout(){
	// Menghancurkan session yang ada kemudian redireksi ke halaman utama website
	session_destroy();
?>
	<script type="text/javascript">
		// Redireksi ke halaman utama
		document.location.href="./";
	</script>
<?php
}

// Fungsi init_login yang digunakan untuk menginisialisasikan session
function init_login(){
	// Simulasi data account nama dan password
	// Variabel $nama mempunyai nilai 'admin'
	$nama = 'admin';
	// Variabel $pass mempunyai nilai 'admin'
	$pass = 'admin';

	// Pengecekan apakah variabel $_POST['nama'] dan $_POST['pass'] telah di-set
	if(isset($_POST['nama']) && isset($_POST['pass'])){
		// Jika sudah, maka akan mendeklarasikan varibel $n dengan isi varibel $_POST['nama'].
		// Fungsi trim digunakan untuk menghilangkan spasi
		$n = trim($_POST['nama']);
		// Mendeklarasikan variabel $p dengan isi variabel $_POST['pass'];
		$p = trim($_POST['pass']);

		// Pengecekan apakah variabel $n dengan $nama dan variabel $p dan $pass identik
		if(($n === $nama) && ($p === $pass)){
			// Jika identik, set cookie 'nlogin' dengan isi variabel $n
			$_SESSION['nlogin'] = $n;
			// Redireksi ke halaman utama
		?>
			<script type="text/javascript">
				// Redireksi ke halaman utama
				document.location.href="./?page=data";
			</script>
		<?php
		}else{
			// Jika $n tidak identik dengan $nama dan $p tidak identik dengan $pass maka akan menampilkan teks 'Nama/Password Tidak Sesuai'
			echo 'Nama/Password Tidak Sesuai';
			// Mengembalikan nilai false
			return false;
		}
	}
}

// Fungsi validate() digunakan untuk menampilkan form login
function validate(){
	// Pengecekan apakah variabel $_SESSION['nlogin'] telah di-set
	// Jika benar maka akan menampilkan form
	if(!isset($_SESSION['nlogin'])){ ?>
		<div class="inner">
			<!-- Tag form dengan method post -->
			<form action="" method="post">
				<table border=0 cellpadding=5>
					<tr>
						<td>Nama</td>
						<!-- Input teks dengan nama 'nama' -->
						<td><input type="text" name="nama" class="text" placeholder="nama anda" required /></td>
					</tr>
					<tr>
						<td>Password</td>
						<!-- Input password dengan nama 'password' -->
						<td><input type="password" name="pass" class="text" placeholder="password anda" required /></td>
					</tr>
					<tr>
						<td></td>
						<!-- input submit dengan nilai 'LOGIN' -->
						<td><input type="submit" value="LOGIN" class="button" /></td>
					</tr>
				</table>
			</form>
		</div>
	<?php
		// Fungsi untuk menghentikan operasi
		exit;
	}
}
?>