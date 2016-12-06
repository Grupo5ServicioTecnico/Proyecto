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
  $password = $_POST['password'];
  $rol = $_POST['rol'];
  $result = pg_query('SELECT usu_rut FROM empleados, usuarios WHERE empleados.usu_fk=usuarios.usu_pk AND usuarios.usu_rut = \''.$rut.'\'');
  if (pg_num_rows($result)>0) {
    echo '<script language="javascript">alert("Usuario Existente");</script>';
    header('Location: tecnico_add.php');
  }
  else {
    if(!pg_query('INSERT INTO usuarios (usu_rut, usu_nombre, usu_apellido, usu_telefono, usu_correo) VALUES (\''.$rut.'\',\''.$nombre.'\',\''.$apellido.'\',\''.$phone.'\',\''.$email.'\')')){
      echo "error";
    }else {

      $consul = pg_query('SELECT usu_pk FROM usuarios ORDER BY usu_pk DESC LIMIT 1');
      $registros= pg_num_rows($consul);
     for ($i=0;$i<$registros;$i++)
     {
      $row = pg_fetch_array ( $consul,$i );
      $id = array(
        'id' => $row["usu_pk"]
      );
      }
      //echo $row["usu_id"];
      pg_query('INSERT INTO empleados (emp_contraseña, usu_fk, rol_fk) VALUES (\''.$password.'\', \''.$row["usu_pk"].'\',\''.$rol.'\' )');
      echo '<script language="javascript">alert("Usuario Registrado");</script>';
      header('Location: ../../tecnicobus.html');
    }
  }
}else{
  echo '<script language="javascript">alert("Campos Vacios");</script>';
  header('Location: tecnico_add.php');
}

?>
