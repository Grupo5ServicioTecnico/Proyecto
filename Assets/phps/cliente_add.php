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
		<form align="center" action="cliente_add2.php" method="post">
			<h2>Ingreso Cliente </h2>
			<hr width=100% align="left"></hr>
			<!--Div con formulario de ingreso de datos -->
			<div id="formulario">
				<input id="rut" placeholder="Rut, ej: 11.111.111-1" type="rut" maxlength="12" name="rut" onblur="checkRut(this.value)" required=""/>
				<div id="msgUsuario"></div>
			</div>
			<table align="center">
				<tr>
					<td>
						<label>Nombre</label>
					</td>
					<td>
						<div id="Nombre">
								<input type="name" name="name" required=""/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<label>Apellido</label>
					</td>
					<td>
						<div id="Apellido">
								<input type="lastname" name="lastname" required=""/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<label>Celular</label>
					</td>
					<td>
						<div id="Celular">
							<input class="large" type="phone"  maxlength="24" name="phone" value="" required=""/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<label>Correo</label>
					</td>
					<td>
						<div class="item-cont">
							<input class="large" type="email" name="email" required=""/>
						</div>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<div class="button">
						<button type="submit" id="search" name="enviar">
							<img src="../images/Add.png"><b> Agregar</b></button>
					</div>
				</tr>
			</table>
		</form>
		</div>
		<script type="text/javascript" src="../js/jquery-1.12.4.min.js">
		</script>
		<script src="../js/validaRUT.js"></script>
		</script>
		<!--Script que verifica si el usuario esta registrado
		<script type="text/javascript">
			$('#rut').blur( function(){
				if($('#rut').val()!= ""){
						$.ajax({
								type: "POST",
								url: "validar.php",
								data: "rut="+$('#rut').val(),
								beforeSend: function(){
									$('#msgUsuario').html('<img src="../images/loader.gif"/> verificando');
								},
								success: function( respuesta ){
									console.log(respuesta);
									if(respuesta == '0')
										$('#msgUsuario').html('<img src="../images/Cancel.png"/>');
									else
										$('#msgUsuario').html('<img src="../images/Ok.png"/>');
								}
						});
				}
			});
		</script> -->
		<p class="frmd">
	</body>
</html>
