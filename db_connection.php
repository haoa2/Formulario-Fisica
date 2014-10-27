<?php
	define("DB_SERVIDOR","localhost");
	define("DB_USUARIO" ,"formulario");
	define("DB_PASSWORD","formpass");
	define("DB_DATABASE","fisica2");

	$mysqli = new mysqli(DB_SERVIDOR, DB_USUARIO, DB_PASSWORD, DB_DATABASE);
?>