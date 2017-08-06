<?php
	session_start();
	include "include/configuration.php";
	include "include/general_functions.php";
	
	if(!isset($_SESSION['authId']) || empty($_SESSION['authId'])){
        header("Location: sign-in.php");
        exit;
    }
	
	$clientLogout = "
		update
			clients
		set
			last_access = NOW()
		where
			id = " . $_SESSION['authId'];
	$rsLogout = mysqli_query($mysqli, $clientLogout);

	if ($rsLogout !== false) {
		session_destroy();
		header("Location: sign-in.php");
	}