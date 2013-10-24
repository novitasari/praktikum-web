<?php
defined('_VALID');
function init_login(){
	session_start();
	//simulasi data account nama dan password
	$nama='admin';
	$pass='admin';
	
	if(isset($_POST['nama'])&&isset($_POST['pass'])){
	$n=trim($_POST['nama']);
	$p=trim($_POST['pass']);

		if(($n==$nama)&&($p==$pass)){
		//jika sama, set SESSION
		$_SESSION['nlogin']='$n';
		
		//redireksi
		?>
		<script type="text/javascript">
		document.location.href="./";
		</script>
		<?php
		}
		else{
			echo 'nama/password tidak sesuai';
			return false;
		}
	}
}

function validate(){
	if(!isset($_SESSION['nlogin'])){?>
	<div class="inner">
	<form action="" method="post">
	<table border=0 cellpadding=5>
		<tr>
			<td>nama</td>
			<td><input type="text" name="nama" /></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="password" name="pass" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="LOGIN" /></td>
		</tr>
	</table>
	</form>
	</div>
	<?php
	exit;
	}

	if(isset($_GET['m'])&&$_GET['m']=='logout'){
		//hapus SESSION
		if(isset($_SESSION['nlogin'])){
			unset($_SESSION['nlogin']);
		}
	//redireksi halaman
	?>
	<script type="text/javascript">
	document.location.href="./";
	</script>
	<?php
	}
}
?>