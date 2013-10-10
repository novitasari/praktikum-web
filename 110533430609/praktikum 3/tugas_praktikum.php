<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugas Praktikum</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function cek(input){
	huruf= /^[A-Za-z]{1,}$/;
	return huruf.test(input);	
}
function validitas(form){
	var id = form.user_name.value;
	var password = form.password.value;
	if(id == "" || password == ""){
		alert("Username dan Password Harus Diisi...!!");
		form.user_name.focus();
		return false;
	}else if(!cek(id) == true || !cek(password) == true){
			alert("Username dan Password Berupa Huruf");
		form.user_name.focus();
		return false;
	}else{
		return true;	
	}
}
</script>
</head>

<body>
	<form name="form1" method="post" action="proses.php" onSubmit="return validitas(this)">
    
<div id="kotak_login">
    	<h1 align="center">Login</h1>
   	<hr align="center" width="200" size="10" color="#FF0"/>
   	<p align="center">Username<br />
     		<input name="user_name" type="text" id="user_name" />
        	<br />
        	Password<br />
        	<input name="password" type="password" id="password" />
        	<br />
        	<br />
        	<input type="submit" value="Login" style="background:#FF0; font-family:'Times New Roman', cursive; color:#FFF; cursor:pointer;"/>
    	</p>
    </div>

</body>
</html>