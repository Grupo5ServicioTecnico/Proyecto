<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("config/db.conf.php");


$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();

if(trim($_POST["rut"]) != "")
{
  $rut = $_POST['rut'];
  $result = pg_query('SELECT usu_rut FROM clientes, usuarios WHERE clientes.usu_fk=usuarios.usu_pk AND usuarios.usu_rut = \''.$rut.'\'');
  if (pg_num_rows($result)>0) {
    echo "El usuario ya existe";
  }
  else {

  }
}else{
  echo "Ingrese un cliente";
}

?>
