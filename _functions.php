<?php
	session_start();
	include "include/configuration.php";
	include "include/general_functions.php";

	if ($_POST) {
		switch (strtolower($_POST['action'])) {
			case 'sign-up':
				$passwordType = $_POST['radio'] == 'sys-gen' ? 1 : 2;
				$password = $passwordType == 1 ? randomPassword() : $_POST['tb-password'] ;
				$clientTypeId = 0;
				$errCount = 0;

				switch (strtolower($_POST['client-type'])) {
					case 'hire':
						$clientTypeId = 1;
						break;
					case 'organizer':
						$clientTypeId = 2;
						break;
					case 'supplier':
						$clientTypeId = 3;
						break;
				}

				$addClient = "
					insert into
					clients(
						username,
						password,
						secret_question_id,
						answer,
						client_type_id,
						status_id,
						password_type_id,
						password_expiry_date,
						ip_address,
						disable_login_failure
					)
					values(
						'" . $_POST['tb-username'] . "',
						'" . $password . "',
						" . $_POST['sel-secret-question'] . ",
						'" . $_POST['tb-answer'] . "',
						" . $clientTypeId . ",
						2,
						" . $passwordType . ",
						(NOW() + INTERVAL 30 DAY),
						'" . getClientIp() . "',
						0
					)
				";
				$rsAddClient = mysqli_query($mysqli, $addClient);

				if ($rsAddClient !== false) {
					$clientId = mysqli_insert_id($mysqli);

					$addClientInfo = "
						insert into
						client_infos(
							first_name,
							last_name,
							email_address,
							mobile_number,
							client_id
						)
						values(
							'" . $_POST['tb-first-name'] . "',
							'" . $_POST['tb-last-name'] . "',
							'" . $_POST['tb-email'] . "',
							'" . $_POST['tb-mobile'] . "',
							" . $clientId . "
						)
					";
					$rsAddClientInfo = mysqli_query($mysqli, $addClientInfo);
					if ($rsAddClientInfo !== false) {
					} else {
						$errCount = 1;
					}

					if ($clientTypeId > 1) {
						$addClientCompany = "
							insert into
							client_companies(
								client_id,
								name,
								address,
								mobile_number
							)
							values(
								" . $clientId . ",
								'" . $_POST['tb-company'] . "',
								'" . $_POST['tb-company-address'] . "',
								'" . $_POST['tb-company-number'] . "'
							)
						";
						$rsAddClientCompany = mysqli_query($mysqli, $addClientCompany);
						if ($rsAddClientCompany !== false) {
						} else {
							$errCount = 1;
						}
					}
				} else {
					$errCount = 1;
				}

				if ($errCount) {
					$_SESSION['errMessage'] = mysqli_error($mysqli);
					#echo mysqli_error($mysqli); die();
				} else {
					$_SESSION['tempId'] = $clientId;
					$_SESSION['mobile'] = $_POST['tb-mobile'];
					$_SESSION['email'] = $_POST['tb-email'];
					$_SESSION['password'] = $password;
					$_SESSION['errMessage'] = '';
					header("Location: verify.php");
				}

				break;
			case 'activation-sendsms':
				$data = array();
				$clientId = $_POST['clientId'];
				$errorSending = array();
				$diffError = '';
				$activationCode = randomActivationCode();

				$message = 'Your activation code is ' . $activationCode . '. And your Password: ' . $_POST['password'];

				$response = sendViaSemaphore(trim($_POST['mobile']), $message);

				if(empty($response) || !isset($response[0]->status)){
					if(isset($response[0])){ //different error
						$diffError = $response[0];
					}
					$errorSending = $_POST['mobile'];
				}
				
				if(empty($errorSending)){
					$data['status'] = 'success';
					$data['message'] = "Activation code was sent to your mobile number.";
					insertActivation($clientId, $activationCode);
				}else{
					$data['status'] = 'failed';
					$data['message'] = "There was an error sending text message to:".$errorSending;
					if($diffError != ''){
						echo "Reason:".$diffError;
					}	
				}

				echo json_encode($data);
				break;
			case 'activation-sendemail':
				$data = array();
				$activationCode = randomActivationCode();

				$clientId = $_POST['clientId'];
				$message = 'Your activation code is ' . $activationCode . '. And your Password: ' . $_POST['password'];
				$email = trim($_POST['email']);

				if(phpMailer($email, "Activation Code", $message)){
					$data['status'] = 'success';
					$data['message'] = "Activation code was sent to your email address.";
					insertActivation($clientId, $activationCode);
				} else {
					$data['status'] = 'failed';
					$data['message'] = "Activation code not sent!";
				}
				
				echo json_encode($data);
				break;
			case 'activate':
				$data = array();
				$clientId = $_POST['clientId'];
				$activationCode = $_POST["code"];

				$checkActivation = "
					select
						*
					from
						account_activations
					where
						client_id = " . $clientId . "
					and
						activation_key = '" . $activationCode . "'";
				$rsActivation = mysqli_query($mysqli, $checkActivation);
				$cntActivation = mysqli_num_rows($rsActivation);

				if ($cntActivation > 0) {
					$updateClient = "
						update
							clients
						set
							status_id = 1
						where
							id = " . $clientId;
					$rsUpUser = mysqli_query($mysqli, $updateClient);

					$deleteActivation = "
						delete
						from
							account_activations
						where
							client_id = " . $clientId . "
						and
							activation_key = '" . $activationCode . "'";
					$rsDelClient = mysqli_query($mysqli, $deleteActivation);

					$data['status'] = 'success';
					$data['message'] = "You have successfully activated your account.";
				} else {
					$data['status'] = 'failed';
					$data['message'] =  "Please enter your activation code again.";
				}
				echo json_encode($data);
				break;
			default:
				# code...
				break;
		}
	}

	function insertActivation($clientId, $activationCode) {
		global $mysqli;

		$insertActivation = "
			insert into
			account_activations(
				client_id,
				activation_key
			)
			values(
				" . $clientId . ",
				'" . $activationCode . "'
			)";
		$rsActivation = mysqli_query($mysqli, $insertActivation);

		if ($rsActivation !== false) {
		}
	}
?>