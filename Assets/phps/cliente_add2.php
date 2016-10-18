<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("config/db.conf.php");


$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();

if(trim($_POST["rut"]) != "" && trim($_POST["name"]) != ""  && trim($_POST["lastname"]) != "" && trim($_POST["phone"]) != "" && trim($_POST["email"]) != "")
{
  $rut = $_POST['rut'];
  $nombre = $_POST['name'];
  $apellido = $_POST['lastname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $result = pg_query('SELECT usu_rut FROM usuarios WHERE usu_rut = \''.$rut.'\'');
  if (pg_num_rows($result)>0) {
    echo "El usuario ya existe";
  }
  else {
    if(!pg_query('INSERT INTO usuarios (usu_rut, usu_nombre, usu_apellido, usu_telefono, usu_correo) VALUES (\''.$rut.'\',\''.$nombre.'\',\''.$apellido.'\',\''.$phone.'\',\''.$email.'\')')){
      echo "error";
    }else {
      echo "Usuario registrado";
    }
  }
}else{
  echo "campos vacios";
}

?>
