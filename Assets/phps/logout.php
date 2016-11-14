<?php
//verificamos si la sesion esta iniciada
@session_start();
//realizamos la desconexion del servidor
session_destroy();
//redireccionamos 
header("location: ../../Login.html")
 ?>
