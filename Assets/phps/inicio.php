<?php
session_start();
if (!isset($_SESSION["k_username"])) {
	header('Location:../../Login.html');
	die();
}
?>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<script language="JavaScript" src="phps/index.php"></script>
		<OBJECT  data="../../barra.html" width="100%" height="10%">
		</object>
	<center>
	<img src="../images/logo.png"></center>
	</body>
	</html>
