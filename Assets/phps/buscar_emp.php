<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("config/db.conf.php");


$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();


 $user = htmlentities($_POST["search_client"], ENT_QUOTES);
 $result = pg_query('SELECT * FROM usuarios  WHERE usu_nombre=\''.$user.'\'');
 $registros= pg_num_rows($result);

 //mostrando resultados
 for ($i=0;$i<$registros;$i++)
 {

 $row = pg_fetch_array ( $result,$i );
 $client = array(
   'id' => $row["usu_id"],
   'rut' => $row["usu_rut"],
   'nombre' => $row["usu_nombre"],
   'apellido' => $row["usu_apellido"],
   'telefono' => $row["usu_telefono"],
   'correo' => $row["usu_correo"]
 );

 }
echo json_encode($client);
return $result;
 pg_free_result($result);

pg_close();
?>
