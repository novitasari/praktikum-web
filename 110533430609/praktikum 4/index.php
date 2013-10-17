<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Kalkulator Sederhana</title>
	</head>
	<body>
	<?php 
$hasil1= 0; 
?> 
<center> 
<form name="form1" method="post" action="hitung.php" style="width: 250"> 
<div style="margin:5px">Operator matematika</div> 
<div align="left" style="margin:5px"> 
<div style="width:70px; float:left">Angka Pertama</div> 
<input name="angka1" type="text" id="angka1" maxlength="15"> 
</div> 
<div align="left" style="margin:5px"> 
<div style="width:70px; float:left">Angka Kedua</div> 
<input name="angka2" type="text" id="angka2" maxlength="15"> 
</div> 
<div style="margin:5px"> 
<div style="width:70px; float:left">&nbsp;</div> 
<div style="float:left"> 
<select name="operator2" id="operator2"> 
<option>+</option> 
<option>-</option> 
<option>*</option> 
<option>/</option> 
</select> 
</div> 
<input type="submit" name="Submit2" value="Hitung"/> 
</div> 
<div align="left" style="margin:5px"> 
<div style="width:70px; float:left">Hasil:</div><input name="hasil1" type="text" readonly="true" value="<?php if (isset($_GET['hasil1'])) echo $_GET['hasil1']?>"/> 
</div> 
</form></center> 
	</body>
</html>