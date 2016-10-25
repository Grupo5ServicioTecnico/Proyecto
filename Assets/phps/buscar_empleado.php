<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("config/db.conf.php");


$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();


 $user = htmlentities($_POST["search_empl"], ENT_QUOTES);
 $result = pg_query('SELECT * FROM usuarios, empleados, roles  WHERE usuarios.usu_id=empleados.usu_id AND empleados.rol_id= roles.rol_id AND usu_nombre=\''.$user.'\'');
 $registros= pg_num_rows($result);

 //mostrando resultados
 for ($i=0;$i<$registros;$i++)
 {

 $row = pg_fetch_array ( $result,$i );
 $empl = array(
   'id' => $row["emp_id"],
   'rut' => $row["usu_rut"],
   'nombre' => $row["usu_nombre"],
   'apellido' => $row["usu_apellido"],
   'telefono' => $row["usu_telefono"],
   'correo' => $row["usu_correo"],
   'cargo' => $row["rol_nombre"]
 );
 }
echo json_encode($empl);
return $result;
 pg_free_result($result);

pg_close();
?>
