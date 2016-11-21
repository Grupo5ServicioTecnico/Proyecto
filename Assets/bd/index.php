<?php
/**
* Esta es la pagina de inicio de sesion
*
* Verifica que haya iniciado sesion previamente para poder visualizarla, en
* caso contrario, se redirecciona a la pagina Login
* @author Wiccan
* @param Cache del sistema en donde indica que el usuario se encuentra logeado
* @return si esta correcto, permite visualizar la pagina, en caso contrario,
*         retorna a la pagina para iniciar sesion
*/
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
      header("location: ../../Login.html");
  exit;
      }
?>
