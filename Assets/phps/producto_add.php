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
		<link rel="stylesheet" href="../css/formulario.css">
		<link rel="icon" type="image/png" href="../images/favicon/favicon.png"/>
	</head>
	<body>
		<!--Cargamos barra de vinculos -->
		<OBJECT  data="../../barra.html" width="100%" height="50px" border="2px">
		</object>
		<!--Cabezera - Contiene Formulario -->
		<div id="cabezera2">
			<form id="formulario" action="producto_add2.php" method="post">
				<!-- Script fecha-->
				<script id="fecha" type="text/javascript">
					var d = new Date();
					console.log(d);
					document.write(d.getDate(),'/'+(d.getMonth()+1),'/'+d.getFullYear());
				</script>
				<h3>Ingreso Producto </h3>
				<input id="rut"      placeholder="Cliente Ej:11 111 111-1"size="20" type="rut" name="rut" min="12" max="12" required>
				<div id="msgUsuario"></div>
				<input id="rut_empl" placeholder="Empleado - 	tomar rut del login" type="text" name="rut_empl" />
				<?php
					// Consultar la base de datos
					require_once("config/db.conf.php");
					$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
					$cnx = pg_connect($db);
					$result = pg_query('SELECT cat_pk,cat_nombre FROM categorias');
					$rows = pg_numrows($result);
				?>
				<select name="categorias">
				  <?php
				 		while($lista=pg_fetch_assoc($result))
							echo "<option  value='".$lista['cat_pk']."'>".$lista['cat_nombre']."</option>";
				  ?>
				</select><br>
				<h6>Ingresar formulario producto</h6>
				<input type="text" name="nombreProducto" placeholder="Nombre producto" maxlength="20">
				<input type="text" name="Descripcion" placeholder="Descripcion Producto" maxlength="50">
				<input type="text" name="Serie" placeholder="Serie del Producto" maxlength="20">
				<?php
					// Consultar la base de datos
					require_once("config/db.conf.php");
					$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
					$cnx = pg_connect($db);
					$result = pg_query('SELECT mar_pk,mar_nombre FROM marcas');
					$rows = pg_numrows($result);
				?>
				<select name="marcas">
				  <?php
				 		while($lista=pg_fetch_assoc($result))
							echo "<option  value='".$lista['mar_pk']."'>".$lista['mar_nombre']."</option>";
				  ?>
				</select>
				<!-- Lista de accesorios-->
				<?php
					// Consultar la base de datos
					require_once("config/db.conf.php");
					$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
					$cnx = pg_connect($db);
					$result = pg_query('SELECT pie_pk,pie_nombre FROM piezas');
					$rows = pg_numrows($result);
				?>
				<select name="piezas" multiple="">
				  <?php
				 		while($lista=pg_fetch_assoc($result))
							echo "<option  value='".$lista['pie_pk']."'>".$lista['pie_nombre']."</option>";
				  ?>
				</select>
				<textarea name="condicion" rows="3" cols="30" placeholder="Condicion del equipo" maxlength="99"></textarea>
				<h6>Estado</h6>
				<?php
					// Consultar la base de datos
					require_once("config/db.conf.php");
					$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
					$cnx = pg_connect($db);
					$result = pg_query('SELECT est_pk,est_nombre FROM estado');
					$rows = pg_numrows($result);
				?>
				<select name="estado">
				  <?php
				 		while($lista=pg_fetch_assoc($result))
							echo "<option  value='".$lista['est_pk']."'>".$lista['est_nombre']."</option>";
				  ?>
				</select>
				<h6>Diagnostico</h6>
				<textarea name="Diagnostico" rows="3" cols="30" maxlength="100" placeholder="Diagnostico"></textarea>
				<input type="text" name="Empleado" placeholder="Empleado - tomar rut del login">
				<?php
					// Consultar la base de datos
					require_once("config/db.conf.php");
					$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
					$cnx = pg_connect($db);
					$result = pg_query('SELECT sol_pk,sol_nombre FROM solucion');
					$rows = pg_numrows($result);
				?>
				<select name="solucion">
				  <?php
				 		while($lista=pg_fetch_assoc($result))
							echo "<option  value='".$lista['sol_pk']."'>".$lista['sol_nombre']."</option>";
				  ?>
				</select>
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
