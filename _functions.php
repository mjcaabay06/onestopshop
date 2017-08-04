<?php
	session_start();
	include "include/configuration.php";

	if ($_POST) {
		switch (strtolower($_POST['action'])) {
			case 'sign-up':
				echo 'signup';
				break;
			default:
				# code...
				break;
		}
	}
?>