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
		<title>Ingreso Producto</title>
		<link rel="stylesheet" href="../css/formalize.css">
	</head>
	<body class="formulario">
		<OBJECT  data="../../barra.html" width="100%" height="50px" border="2px">
		</object>
		<div id="cabezera">
		<form align="center" action="producto_add2.php" method="post">
			<h2>Ingreso Producto </h2>
			<div class="u-form-group" title="(con puntos y guion)">
					<label >Rut Cliente</label>
					<input id="rut" size="12" type="rut" name="rut" min="12" max="12"required/>
					<div id="msgUsuario"></div>
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
		<p class="frmd">
	</body>
</html>
