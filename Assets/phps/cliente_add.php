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
	<link rel="stylesheet" href="../css/login-normalize.css">
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="../css/cliente_add.css">
</head>
<body class="formulario">
	<OBJECT  data="../../barra.html" width="100%" height="10%">
	</object>
<div class="cliente_add">
<form align="center" action="cliente_add2.php" method="post">
	<div class="lb-header"><h2>Ingreso Cliente </h2></div>
	<div class="u-form-group" title="(sin puntos ni guion)">
		<label class="title"></label>
		<div class="item-cont">
			<input class="large" type="rut" min="12" max="12" name="rut" oninput="checkRut(this)"placeholder="RUT" value="" required=""/>
			<script> src="../js/validarRUT.js" </script>
			<span class="icon-place"></span>
		</div>
	</div>
	<div class="u-form-group">
		<label class="title"></label>
		<span class="nameFirst">
			<input placeholder="Name First" type="name" size="8" name="name" required=""/>
			<span class="icon-place"></span>
		</span>
	</div>
	<div class="u-form-group">
		<span class="nameLast">
			<input placeholder="Name Last" type="lastname" size="14" name="lastname" required=""/>
			<span class="icon-place"></span>
		</span>
	</div>
	<div class="u-form-group">
		<label class="title"></label>
		<div class="item-cont">
			<input class="large" type="phone"  maxlength="24" name="phone" placeholder="Phone" value="" required=""/>
			<span class="icon-place"></span>
		</div>
	</div>
	<div class="u-form-group">
		<label class="title"></label>
		<div class="item-cont">
			<input class="large" type="email" name="email" value="" placeholder="Email"required=""/>
			<span class="icon-place"></span>
		</div>
	</div>
	<div class="u-form-group">
		<input type="submit"name="enviar" value="Ingresar"/>
	</div>
</form>
</div>
<script type="text/javascript" src="Assets/js/jquery-1.12.4.min.js">
</script>
<script type="text/javascript">

</script>
<p class="frmd">
</body>
</html>
