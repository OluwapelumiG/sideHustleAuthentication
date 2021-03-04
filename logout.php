<?php 
    // $ Steps to logging out

		// 1 Find the session
		session_start();

		// 2 Unset all session Variables
		$_SESSION = array();

		// 3 Destroy the session cookie
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '',  time()-42000000, '/');
		}

		// 4 Destroy the session
		session_destroy();

		// redirect_to("login.php");
        header('Location: auth.php'); ?>