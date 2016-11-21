<?php
/*Verificacion de Sesion*/
session_start();
if (!isset($_SESSION["k_username"])) {
	header('Location:../../Login.html');
	die();
}
?>
<html>
	<head>
		<!--Dentro del HEAD argamos css y nombramos pagina -->
		<meta charset="utf-8" />
		<title>Ingreso Producto</title>
		<link rel="stylesheet" href="../css/formalize.css">
	</head>
	<body>
		<!--Cargamos barra de vinculos -->
		<OBJECT  data="../../barra.html" width="100%" height="50px" border="2px">
		</object>
		<!--Cabezera - Contiene Formulario -->
		<div id="cabezera">
			<form align="center" action="producto_add2.php" method="post">
				<h2>Ingreso Producto </h2>
				<table align="center">
					<tr>
						<td>
							<input id="rut" placeholder="Cliente Ej:11 111 111-1"size="20" type="rut" name="rut" min="12" max="12" required>
						</td>
						<td>
							<div id="msgUsuario"></div>
						</td>
					</tr>
					<tr>
						
					</tr>
				</table>


			</form>
		</div>
		<script type="text/javascript" src="../../Assets/js/jquery-1.12.4.min.js">
		</script>
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
			            $('#msgUsuario').html('<img src="../images/Ok.png"/>');
			          else
			            $('#msgUsuario').html('<img src="../images/Cancel.png"/> <a href="cliente_add.php"><img src="../images/Add.png"/></a>');
			          }
			      });
			  }
			});
		</script>
	</body>
</html>
