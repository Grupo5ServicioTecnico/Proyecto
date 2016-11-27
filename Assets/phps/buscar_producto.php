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
if(isset($_REQUEST['search_product'])) {
    require_once("config/db.conf.php");
    $db = "host=$host port=$port dbname=$dbname user=$username password=$password";
    $cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
    session_start();

    /**
    * Importar los daros del cliente
    * Realizar consulta de busqueda
    * Consultar la cantidad de filas afectadas
    * Pasamos los resultados requeridos a variables
    * Mostramos los datos en la pagina
    */

     $user = htmlentities($_POST["search_product"], ENT_QUOTES);
     $result = pg_query('SELECT res_fecha,usu_nombre,usu_rut,est_nombre,pro_serie
            FROM recepcion,usuarios,clientes,estado,productos
             WHERE recepcion.cli_fk=clientes.cli_pk AND clientes.usu_fk=usuarios.usu_pk
             AND recepcion.est_fk=estado.est_pk AND recepcion.pro_fk= productos.pro_pk
             AND clientes.usu_fk = usuarios.usu_pk AND usu_rut=\''.$user.'\';');

     $registros= pg_num_rows($result);
     $product = array();
     for ($i=0;$i<$registros;$i++){
       $row = pg_fetch_array ( $result,$i );
       $product = array(
         'fecha' => $row["res_fecha"],
         'nombre' => $row["usu_nombre"],
         'rut' => $row["usu_rut"],
         'estado' => $row["est_nombre"],
         'serie' => $row["pro_serie"]
       );
     }
     if($product) {
         echo json_encode($product);
     } else {
         echo "no";
     }
    return $result;
    pg_free_result($result);
    pg_close();
} else
?>
