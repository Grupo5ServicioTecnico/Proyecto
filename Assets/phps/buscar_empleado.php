<?php
/**
* Este PHP hace una busqueda de los empleados
*
* Busca en la base de datos al empleado buscado por rut, para luego retornar sus datos
*@author Drexx
*@param Los parametros de busqueda es un string con el rut del empleados
*@return  Retorna los valores de la tabla empleado correspondientes al rut ingresado
*/

/**
* Mostramos datos de posibles errores
* Cargando los datos de conexion de la base de datos
* Realizar la conexion a la base de datos
* inciar la sesion
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_REQUEST['search_empl'])) {
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

    $user = htmlentities($_REQUEST["search_empl"], ENT_QUOTES);

    $result = pg_query('SELECT * FROM usuarios, empleados, roles  WHERE usuarios.usu_pk=empleados.usu_fk AND empleados.rol_fk= roles.rol_pk AND usu_rut=\''.$user.'\'');

    $registros= pg_num_rows($result);
    $empl = array();
    for ($i=0;$i<$registros;$i++){
      $row = pg_fetch_array ( $result,$i );
      $empl = array(
        'id' => $row["emp_pk"],
        'rut' => $row["usu_rut"],
        'nombre' => $row["usu_nombre"],
        'apellido' => $row["usu_apellido"],
        'telefono' => $row["usu_telefono"],
        'correo' => $row["usu_correo"],
        'cargo' => $row["rol_nombre"]
      );
    }
    if($empl) {
        echo json_encode($empl);
    } else {
        echo "no";
    }
    return $result;
    pg_free_result($result);
    pg_close();
} else

?>
