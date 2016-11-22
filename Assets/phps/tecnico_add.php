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
				<hr width=100% align="left"></hr>
				<input type="rut"      name="rut"      placeholder="RUT"        required size="20" min="12" max="12"  oninput="checkRut(this)" /><br>
				<input type="name"     name="name"     placeholder="Name First" required size="20"  /><br>
				<input type="lastname" name="lastname" placeholder="Name Last"  required size="20"  /><br>
				<input type="phone"    name="phone"    placeholder="Phone"      required size="20" maxlength="12" /><br>
				<input type="email"    name="email"    placeholder="Email"      required/><br>
				<input type="password" name="password" placeholder="Password"   required/><br>
				<select required="" style="width:18.5% ; margin-top:10px" name="rol">
				  <option value="2" selected="">Empleado/a     </option>
				  <option value="1"            >Administrador/a</option>
				  <option value="3"            >Secretario/a   </option>
				</select><br>
				<button type="submit" id="Add"><b> Ingresar</b>
				</button>
			</form>
		</div>
		<script type="text/javascript" src="Assets/js/jquery-1.12.4.min.js"></script>
		<script>src="../js/validarRUT.js"</script>
		<p class="frmd">
	</body>
</html>
