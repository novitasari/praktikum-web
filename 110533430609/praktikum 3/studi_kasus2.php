<!DOCTYPE html>
<html>
<title>studi Kasus 2</title>
	</head>

	<body>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			makanan favorit
			<input type="checkbox" name="makanan favorit[]" value="Bakso"
			<?php
				if (isset($_POST['makanan favorit'])){
					foreach ($_POST['makanan favorit'] as $key => $val){
						if($val == 'Bakso'){
							echo 'checked="checked"';
						}
					}
				}
			?>
			/>Bakso
			<input type="checkbox" name="makanan favorit[]" value="Nasi Goreng"
			<?php
				if (isset($_POST['makanan favorit'])){
					foreach($_POST['makanan favorit'] as $key => $val){
						if($val == 'Nasi Goreng'){
							echo 'checked="checked"';
						}
					}
				}
			?>
			/>Nasi Goreng
			<input type="checkbox" name="makanan favorit[]" value="Sate"
			<?php
				if (isset($_POST['makanan favorit'])){
					foreach($_POST['makanan favorit'] as $key => $val){
						if($val == 'Sate'){
							echo 'checked="checked"';
						}
					}
				}
			?>
			/>Sate
			<input type="submit" value="OK" />
		</form>

		<?php
			//Ekstraksi Nilai
			if (isset($_POST['makanan favorit'])){
				foreach ($_POST['makanan favorit'] as $key => $val){
					echo $key.'->'.$val.'<br />';
				}
			}
		?>
	</body>
</html>