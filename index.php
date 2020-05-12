<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<?php require_once "scripts.php"; ?>
</head>
<body>

<!--
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading">Login </div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/photo.jpg" height="250">
					</div>
					<p></p>
					<label>Usuario</label>
					<input type="text" id="usuario" class="form-control input-sm" name="">
					<label>Password</label>
					<label>Contraseña</label>
					<input type="text" id="password" class="form-control input-sm" name="">
					<p></p>
					<label>Contraseña aleatoria: </label>	
					<p></p>				
					<label id="passRandom"></label>
					<p></p>
					<span class="btn btn-primary" id="btnValida">Validar</span>
					<span class="btn btn-info" id="btnGenera">Generar contraseña</span>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
-->


<div class="container">
  <h2>Login</h2>
<form name="login"  action="login.php" method="post">
  <div class="form-group">
    <label for="usuario">Usuario</label>
    <input name="usuario" type="text" class="form-control" id="usuario">
  </div>
  <div class="form-group">
    <label for="password">Contraseña:</label>
    <input name="password" type="text" class="form-control" id="password">
  </div>
  <div class="form-group">
    <label for="passRandom">Contraseña aleatoria:</label>
    <label id="passRandom"></label>
  </div>
  <div class="form-group">
  <span class="btn btn-primary" id="btnValida">Validar</span>
  <span class="btn btn-info" id="btnGenera">Generar contraseña</span>
  </div>
  <button type="submit" class="btn btn-default">Iniciar sesión</button>
  </div>
</form>

</body>
</html>

<script type="text/javascript">

//Exp para validar usuario
//max 32 , min 6
//al menos una letra mayuscula

var re1 = /^(?=.*[A-Z])[A-Za-z\d$@$!%*?&]{6,32}/;

//Exp para validar password
//debe de ser de 8 caracteres
//al menos un numero
//al menos una letra mayuscula
var re2 = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d$@$!%*?&]/;

var max_l  = 8;

$(document).ready(function(){

	$('#btnValida').click(function(){
		var user = $('#usuario').val();
		var pass = $('#password').val();

		if (user ==""){
			alertify.alert("Favor de agregar usuario");
				return false;
		}else if (pass ==""){
			alertify.alert("Favor de agregar contraseña");
				return false;
		}
		else if (user == "" || !re1.test(user)){
			alertify.alert("Favor de agregar usuario válido");
				return false;
		}
		else if (pass == "" || !re2.test(pass)){
			alertify.alert("Favor de agregar contraseña válida");
				return false;
		} 
		else if (pass.length > 8){
			alertify.alert("Favor de agregar contraseña de 8 caracteres");
				return false;
		} 
		
	});	
    //boton genera password aleatoria
	$('#btnGenera').click(function(){
		var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
   // alertify.alert(retVal);
   document.getElementById("passRandom").innerHTML = retVal;
	return false;

	});	
	//

});


</script>