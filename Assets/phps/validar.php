<?php
/**
* En este php se valida el inicio de sesion
*
* Para mejorar la seguridad de la informacion, se verifica que el usuarios
* se logee para acceder a las funcionalidades del sistema

* @author Drexx
* @param 2 String, uno con el usuario correspondiente al rut y el otro con la contraseña
* @return retorna 0 si se logueo correctamente, 1 si no lo hizo
*/
require_once("config/db.conf.php");
$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();

    $rut = $_REQUEST["rut"];
    $sql = 'SELECT usu_rut FROM usuarios, clientes WHERE usuarios.usu_id = clientes.usu_id AND usu_rut = \''.$rut.'\'';
    $result = pg_query($sql);

    if( pg_num_rows($result))
        echo 0;
    else
        echo 1;

?>
