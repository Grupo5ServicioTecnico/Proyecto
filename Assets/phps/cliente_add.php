<?php
session_start();
if (!isset($_SESSION["k_username"])) {
	header('Location:../../Login.html');
	die();
}
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>Ingreso Cliente</title>
	<link rel="stylesheet" href="../css/formalize.css">
	<script type="text/javascript">
		function validar(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
			if (tecla==45) return true; //-
			if (tecla==48) return true;
			if (tecla==49) return true;
			if (tecla==50) return true;
			if (tecla==51) return true;
			if (tecla==52) return true;
			if (tecla==53) return true;
			if (tecla==54) return true;
			if (tecla==55) return true;
			if (tecla==56) return true;
			if (tecla==57) return true;
			patron = /1/; //ver nota
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}
	</script>
</head>
<body>
	<OBJECT  data="../../barra.html" width="100%" height="50px" border="2px">
	</object>
	<div id="cabezera">
		<form align="center">
			<h2>Ingreso Cliente </h2>
			<hr width=100% align="left"></hr>
			<!--Div con formulario de ingreso de datos -->
			<div id="formulario">
				<input  id="rut"      type="rut"    name="rut"      placeholder="Rut, ej: 11111111-1"  maxlength="10" required="" onblur="checkRut(this.value)" onKeyPress="return validar(event)"><br>
				<input  id="name"     type="text"   name="name"     placeholder="Nombre"               maxlength="15" required=""><br>
				<input  id="lastname" type="text"   name="lastname" placeholder="Apellido"             maxlength="15" required=""><br>
				<input  id="phone"    type="phone"  name="phone"    placeholder="Ej:+569 xxxx xxxx"    maxlength="12" required=""><br>
				<input  id="email"    type="email"  name="email"    placeholder="Correo, ej:xxx@xxx.xx"maxlength="40" required=""><br>
				<button id="search"   type="submit" name="enviar"><img src="../images/Add.png"><b> Agregar</b></button>
			</div>
		</form>
	</div>
		<script type="text/javascript" src="../js/jquery-1.12.4.min.js">
		</script>
		<script src="../js/validaRUT.js"></script>
		<p class="frmd">
		<script type="text/javascript">
    $( document ).ready(function() {
      $('#search').click(function(event){
				var rut = $("#rut").val();
				var name = $("#name").val();
				var lastname = $("#lastname").val();
				var phone = $("#phone").val();
        var email = $("#email").val();
        $.post( "Assets/phps/cliente_add2.php", { "rut":rut,"name":name,"lastname":lastname,"phone":phone,"email": user}, function( data ) {
          console.log(data);
          if (data == "El usuario ya existe") {
						alert("Usuario ya existe");
          }else if (data == "error sql" ) {
            alert("Error SQL");
          }else if (data == "Usuario registrado") {
            alert("Usuario registrado");
          }else {
            alert("Campo/s Vacios");
          }
        });
      })
    });
    </script>
	</body>
</html>
