<?php
	session_start();
	include "include/configuration.php";
	include "include/general_functions.php";

	if ($_POST) {
		$params = $_POST['params'];
		$data = array();

		switch (strtolower($_POST['action'])) {
			case 'approve':
				$update = "update bookings set approval_type_id = 1 where id = " . $params['id'];
				$rs = mysqli_query($mysqli, $update);
				if ($rs !== false) {
					$data['status'] = 'success';
				} else {
					$data['status'] = 'failed';
					$data['message'] = mysqli_error($mysqli);
				}
				break;
			case 'disapprove':
				$update = "update bookings set approval_type_id = 2 where id = " . $params['id'];
				$rs = mysqli_query($mysqli, $update);
				if ($rs !== false) {
					$data['status'] = 'success';
				} else {
					$data['status'] = 'failed';
					$data['message'] = mysqli_error($mysqli);
				}
				break;
			
			default:
				# code...
				break;
		}
		echo json_encode($data);
	}
?>