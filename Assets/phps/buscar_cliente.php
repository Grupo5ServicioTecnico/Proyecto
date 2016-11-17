<?php
/**
* PHP en el cual se busca al usuario en la base de datos
*
* En este php se hace una consulta en la tabla clientes, por medio del rut
* para buscar a un cliente especifico
*@author Drexx
*@param Busca en la base de datos con el rut del usuario
*@return Retorna todos los valores pertenecientes a la tabla que coincidan
*         con el pk del rut buscado
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("config/db.conf.php");

/**
* Crea una coneccion a la base de datos
*/
$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();

/**
* Obtine los valores de la pagina, para realizar la busqueda
*/
 $user = htmlentities($_POST["search_client"], ENT_QUOTES);
 $result = pg_query('SELECT * FROM usuarios, clientes  WHERE clientes.usu_id = usuarios.usu_id AND usu_nombre=\''.$user.'\'');
 $registros= pg_num_rows($result);

/**
* Muestra los resultados obtenidos
*/
 for ($i=0;$i<$registros;$i++)
 {

 $row = pg_fetch_array ( $result,$i );
 $client = array(
   'id' => $row["cli_id"],
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
