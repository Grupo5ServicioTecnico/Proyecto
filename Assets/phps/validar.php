<?php
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
