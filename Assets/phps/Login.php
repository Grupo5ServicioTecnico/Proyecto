<?php
//agregamos archivo de conexion
require_once("config/db.conf.php");
// conectamos a la base de datos
$db = "host=$host port=$port dbname=$dbname user=$username password=$password";
$cnx = pg_connect($db) or die ('connection failed'. pg_last_error());
session_start();
//traemos datos de usuario y verificamos si los campos no estan vacios
if(trim($_POST["email"]) != "" && trim($_POST["password"]) != "")
{
  //maqueteamos el email para que se ingrese todo en minuscula
  $user = strtolower(htmlentities($_POST["email"], ENT_QUOTES));
  //aplicamos encriptacion md5 a la clave
  $password = md5($_POST["password"]);
  //Realizamos consulta para loguear
  $result = pg_query('SELECT emp_contraseña, usu_correo FROM empleados, usuarios  WHERE usu_correo=\''.$user.'\' AND emp_contraseña = \''.$password.'\' ');
  //pasamos los resultados a una arraylist
  if($row = pg_fetch_array($result)){
    //verificamos si la password guardada es igual a la ingresada
    if($row["emp_contraseña"] == $password){
        //asignamos en nombre de usuario por su correo y redireccionamos
        $_SESSION["k_username"] = $row['usu_correo'];
        echo "Usuario correcto";
    }else{
        echo "Password incorrecto";
    }
  }else{
    echo "Usuario no existente en la base de datos";
  }
  pg_free_result($result);
  }else{
    echo 'Debe especificar un usuario y password';
  }
pg_close();
?>
