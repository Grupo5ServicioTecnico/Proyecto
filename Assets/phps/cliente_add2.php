<?php
/**
* Php en el cual se agrega un usuario al sistema
*
* En este PHP se agrega la funcion de agregar usuarios al sistema, para eso, el sistema
* busca en el archivo config.php las llaves para ingresar al sistema.
* primero optiene informacion de los formularios en formato AJAX
*
* 1. Verifica que los datos en el sistema no estes ingresados previamente
* 2. Verifica que los datos sean validos, validados en el html correspondiente
* 3. Verifica que los datos no sean vacios
* 4. Ingresa los datos al sistema
**/

error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
* Crea la instancia de coneccion a la base de datos
*@author Drexx
*@return Inicia coneccion a la base de datos, si no se pudo, muestra un mensaje de error :(
*@param Posee como parametros el archivo db.conf.php ubicado en la carpeta config
*/
require_once("config/db.conf.php");


$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();


/**
* Obtiene los valores de la pagina
* Crea las variables para la proxima utilizacion
*/
if(trim($_POST["rut"]) != "" && trim($_POST["name"]) != ""  && trim($_POST["lastname"]) != "" && trim($_POST["phone"]) != "" && trim($_POST["email"]) != "")
{
  $rut = $_POST['rut'];
  $nombre = $_POST['name'];
  $apellido = $_POST['lastname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $result = pg_query('SELECT usu_rut FROM usuarios WHERE usu_rut = \''.$rut.'\'');

  /**
  * Verifica que el nuevo usuario no este ingresado previamente en la base de datos, si esta, manda un mensaje
  */
  if (pg_num_rows($result)>0) {
    echo "El usuario ya existe";
  }
  else {

    /**
    * Ingresa el usuario a la base de datos, indica si la cosulta esta correcta
    */
    if(!pg_query('INSERT INTO usuarios (usu_rut, usu_nombre, usu_apellido, usu_telefono, usu_correo) VALUES (\''.$rut.'\',\''.$nombre.'\',\''.$apellido.'\',\''.$phone.'\',\''.$email.'\')')){
      echo "error sql";
    }else {

      /**
      * Veriica que el usuario este ingresado correctamente
      */

      $consul = pg_query('SELECT usu_pk FROM usuarios ORDER BY usu_pk DESC LIMIT 1');
      $registros= pg_num_rows($consul);
     for ($i=0;$i<$registros;$i++)
     {
      $row = pg_fetch_array ( $consul,$i );
      $id = array(
        'id' => $row["usu_id"],
      );
      }
      pg_query('INSERT INTO clientes (usu_id) VALUES (\''.$row["usu_id"].'\')');
      echo "Usuario registrado";
    }
  }

  /**
  * Verifica que los campos no esten vacios al ingresarlos a la base de datos
  */
}else{
  echo "campos vacios";
}

?>
