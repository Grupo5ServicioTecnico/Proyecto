<?php
session_start();
if (!isset($_SESSION["k_username"])) {
	header('Location:../../Login.html');
	die();
}
?>
<html>
	<!--Dentro del HEAD argamos css y nombramos pagina -->
	<head>
		<meta charset="utf-8" />
		<title>Ingreso Cliente</title>
		<link rel="stylesheet" href="../css/formalize.css">
		<link rel="stylesheet" href="../css/formulario.css">
		<link rel="icon" type="image/png" href="../images/favicon/favicon.png"/>

	</head>
	<body>
		<OBJECT  data="../../barra.html" width="100%" height="50px" border="2px">
		</object>
		<div id="cabezera">
			<form id="formulario" action="cliente_add2.php" method="post">
				<h3>Ingreso Tecnico </h3>
				<input type="rut"      name="rut"      placeholder="RUT"                     required autocomplete="off" maxlength="10" onblur="checkRut(this.value)"  onkeypress="return validar(event)"  />
				<input type="name"     name="name"     placeholder="Nombre"                  required autocomplete="off"/>
				<input type="lastname" name="lastname" placeholder="Apellido"                required autocomplete="off" />
				<input type="phone"    name="phone"    placeholder="Celular ej:+56911111111" required autocomplete="off" maxlength="12" />
				<input type="email"    name="email"    placeholder="Correo"                  required autocomplete="off"/>
				<input type="password" name="password" placeholder="Contraseña"              required autocomplete="off"/>
				<select required="" name="rol">
				  <option value="2" selected="">Empleado/a     </option>
				  <option value="1"            >Administrador/a</option>
				  <option value="3"            >Secretario/a   </option>
				</select><br>
				<button type="submit" id="Add"><b> Ingresar</b>
				</button>
			</form>
		</div>
		<!--SCRIPTS-->
		<!--Cargamos jquery-->
		<script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>
		<!--Validacion de rut-->
		<script src="../js/validaRUT.js"></script>
		<p class="frmd">
		<!--Bloqueo de letras-->
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
	</body>
</html>
