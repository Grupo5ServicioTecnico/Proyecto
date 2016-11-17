<?php
/**
* Pagina de cierre de sesion
*
*En esta pagina se realiza el cierre de sesion en el sistema, luego de
*llevarse a cabo, el usuario es redireccionado a la pagina de Login
*@author Wiccan
*@param Esta funcion no pide parametros
*@return Esta funcion no retorna nada, pero redirreciona a otra pagina
*/
@session_start();
//realizamos la desconexion del servidor
session_destroy();
//redireccionamos
header("location: ../../Login.html")
 ?>
