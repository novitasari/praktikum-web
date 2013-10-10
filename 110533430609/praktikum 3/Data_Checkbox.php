<!DOCTYPE html>
<html>
<head>
	<title>Data Checkbox</title>
</head>

<body>

<form action ="<?php $_SERVER ['PHP_SELF'];?>" method="post">
Jenis Kelamin
<input type="checkbox" name="hobby[]" value="Membaca"
/>Membaca

<input type="checkbox" name="hobby[]" value="Olahraga"
/>Olahraga

<input type="checkbox" name="hobby[]" value="Menyanyi"
/>Menyanyi

<input type="submit" value="ok" />
</form>

<?php
//Ekstraksi nilai
if (isset($_POST['hobby'])) {
	foreach ($_POST['hobby'] as $key => $val) {
	echo $key . ' -> '.$val . '<bar />';
	}
}
?>

</body>
</html>