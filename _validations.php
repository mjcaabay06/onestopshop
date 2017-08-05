<?php
	session_start();
	include "include/configuration.php";

	if ($_POST) {
		switch (strtolower($_POST['action'])) {
			case 'check-email':
				$data = array();
				$data['status'] = false;
				$selEmail = "select * from client_infos where email_address = '" . $_POST['email'] . "'";
				$rsEmail =  mysqli_query($mysqli, $selEmail);

				if (mysqli_num_rows($rsEmail) > 0) {
					$data['status'] = true;
				}

				echo json_encode($data);
				break;
			case 'check-username':
				$data = array();
				$data['status'] = false;
				$selUsername = "select * from users where clients = '" . $_POST['username'] . "'";
				$rsUsername =  mysqli_query($mysqli, $selUsername);

				if (mysqli_num_rows($rsUsername) > 0) {
					$data['status'] = true;
				}

				echo json_encode($data);
				break;
			default:
				# code...
				break;
		}
	}
?>