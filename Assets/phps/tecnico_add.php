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
	</head>
	<body>
		<OBJECT  data="../../barra.html" width="100%" height="50px" border="2px">
		</object>
		<div id="cabezera">
			<form id="formulario" align="center" action="cliente_add2.php" method="post">
				<h2>Ingreso Tecnico </h2>
				<input class="large" type="rut" min="12" max="12" name="rut" oninput="checkRut(this)"placeholder="RUT" value="" required=""/><br>
				<input placeholder="Name First" type="name" size="8" name="name" required=""/><br>
				<input placeholder="Name Last" type="lastname" size="14" name="lastname" required=""/><br>
				<input class="large" type="phone"  maxlength="24" name="phone" placeholder="Phone" value="" required=""/><br>
				<input class="large" type="email" name="email" value="" placeholder="Email"required=""/><br>
				<input class="large" type="password" name="password" value="" placeholder="Password"required=""/><br>
				<select required="" class="large" name="rol">
				  <option value="2" selected="">Empleado/a</option>
				  <option value="1">Administrador/a</option>
				  <option value="3">Secretario/a</option>
				</select><br>
				<input type="submit"name="enviar" value="Ingresar"/>
			</form>
		</div>
		<script type="text/javascript" src="Assets/js/jquery-1.12.4.min.js">
		</script>
		<script> src="../js/validarRUT.js"</script>
		<p class="frmd">
	</body>
</html>
