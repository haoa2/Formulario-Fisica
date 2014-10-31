<?php
	session_start();
	
	function validarUsuario($userid)
	{
		session_regenerate_id(); // Seguridad.
		$_SESSION['valido'] = 1;
		$_SESSION['userid'] = $userid;
	}

	function isLoggedIn()
	{
	    if(isset($_SESSION['valido']) && $_SESSION['valido'])
	        return true;
	    return false;
	}

	function logout()
	{
		$_SESSION = array();
		session_destroy();
	}
?>