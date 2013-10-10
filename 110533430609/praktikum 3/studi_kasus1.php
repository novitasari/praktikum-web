<!DOCTYPE html>
<html>
<title>Studi Kasus1</title>
	</head>

	<body>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			Pekerjaan
			<select name="job">							
				<option value="Pelajar"
				<?php
					if($_POST['job']=="Pelajar"){
						echo 'selected="selected"';
					}
				?>
				>Pelajar	
				<option value="TNI"
				<?php
					if($_POST['job']=="TNI"){
						echo 'selected="selected"';
					}
				?>
				>TNI
				<option value="PNS"
				<?php
					if($_POST['job']=="PNS" or !isset($_POST['job'])){
						echo 'selected="selected"';
					}
				?>
				>PNS
				<option value="Wiraswasta"
				<?php
					if($_POST['job']=="Wiraswasta"){
						echo 'selected="selected"';
					}
				?>
				>Wiraswasta
			</select> <br />
			<input type="submit" value="OK" />
		</form>
		
		<?php 
			if (isset($_POST['job'])){
				echo $_POST['job'];
			}
		?>
	</body>
</html>