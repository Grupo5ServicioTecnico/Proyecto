<?php
//agregamos archivo de conexion
require_once("config/db.conf.php");
// conectamos a la base de datos
$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();
//traemos datos de usuario
if(trim($_POST["email"]) != "" && trim($_POST["password"]) != "")
{
 $user = strtolower(htmlentities($_POST["email"], ENT_QUOTES));
 $password = md5($_POST["password"]);

 $result = pg_query('SELECT emp_contraseña, usu_correo FROM empleados, usuarios  WHERE usu_correo=\''.$user.'\' AND emp_contraseña = \''.$password.'\' ');
 if($row = pg_fetch_array($result)){
  if($row["emp_contraseña"] == $password){
   $_SESSION["k_username"] = $row['usu_correo'];
   header('Location: inicio.php');
  }else{
   echo 'Password incorrecto';
  }
 }else{
  echo 'Usuario no existente en la base de datos';
 }
 pg_free_result($result);
}else{
 echo 'Debe especificar un usuario y password';
}
pg_close();
?>
