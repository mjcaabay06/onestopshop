<?php
	session_start();
	include "include/configuration.php";
	include "include/general_functions.php";

	if ($_POST) {
		switch (strtolower($_POST['action'])) {
			case 'sign-in':
				$data = array();
				$isAuthenticated = false;
				$username = $_POST['username'];
				$password = $_POST['password'];

				$chkLogin = "
					select
						*
					from
						clients
					where
						username = '" . $username . "'
					and
						password = '" . $password . "'
					and
						status_id = 1";
				$rsLogin = mysqli_query($mysqli, $chkLogin);
				$row = mysqli_fetch_assoc($rsLogin);

				if (!empty($row)) {
					$insertLogs = "
						insert into
						login_logs(
							client_id,
							ip_address,
							remarks,
							status_id
						)
						values(
							" . $row['id'] . ",
							'" . getClientIp() . "',
							'Successful',
							1
						)";
					$rsLogs = mysqli_query($mysqli, $insertLogs);
					if ($rsLogs !== false) {
						if ($row['disable_login_failure'] == 0) {
							$upClient = "
								update
									clients
								set
									failed_login_attempt = 0
								where
									id = " . $row['id'];
							$rsClient = mysqli_query($mysqli, $upClient);
						}
						
						$_SESSION['authId'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['userType'] = $row['client_type_id'];
					}
					$isAuthenticated = true;
				} else {
					$insertLogs = "
						insert into
						login_logs(
							ip_address,
							remarks,
							status_id
						)
						values(
							'" . getClientIp() . "',
							'Failed',
							2
						)";
					$rsLogs = mysqli_query($mysqli, $insertLogs);
				}

				if ($isAuthenticated) {
					$data['status'] = 'success';
					$data['message'] = 'Authenticated!';
				} else {
					$data['status'] = 'failed';
					$checkCredentials = "
						select
							*
						from
							clients
						where 
							username = '" . $username . "'
						limit 1";
					$rsCredentials = mysqli_query($mysqli, $checkCredentials);
					$rowCredentials = mysqli_fetch_assoc($rsCredentials);

					if (!empty($rowCredentials)) {
						if ($rowCredentials['disable_login_failure'] == 0) {
							if ($rowCredentials['failed_login_attempt'] < 2) {
								$upClient = "
									update
										clients
									set
										failed_login_attempt = (failed_login_attempt + 1),
										failed_login_time = NOW()
									where
										id = " . $rowCredentials['id'];
								$rsUpClient = mysqli_query($mysqli, $upClient);

								if ($rsUpClient !== false) {
									$errorMessage = "You are not authenticated. You only have " . (2 - intval($rowCredentials['failed_login_attempt'])) . " login attempt.";
								}
							} else {
								$upClient = "
									update
										clients
									set
										status_id = 2
									where
										id = " . $rowCredentials['id'];
								$rsUpClient = mysqli_query($mysqli, $upClient);

								if ($rsUpClient !== false) {
									$errorMessage = "Your account is already locked. Please <a href='contact.php' style='text-decoration: underline;cursor: pointer;'>contact</a> the administrator.";
								}
							}	
						} else {
							$errorMessage = "You are not authenticated.";
						}
					} else {
						if (sendEmail()) {
							$errorMessage = "You are trying to force to login. Please sign-up.";
						}
					}
					$data['message'] = $errorMessage;
				}
				echo json_encode($data);
				break;
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
					$data['message'] = "There was an error sending text message to: ".$errorSending;
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
					$data['mysqli_error'] = mysqli_error($mysqli);
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
			case 'recoverpass-email':
				$data = array();

				$email = $_POST['email'];
				$question = $_POST['secretQuestion'];
				$answer = $_POST['answer'];
				$errorSending = array();
				$diffError = '';
				$error = true;
				$message = '';

				$selClient = "
					select
						*
					from
						clients
					where
						secret_question_id = " . $question . "
					and
						answer='" . $answer . "'";
				$rsClient = mysqli_query($mysqli, $selClient);
				$row = mysqli_fetch_assoc($rsClient);

				if (isset($row)) {
					$message = 'Your password is ' . $row['password'] . '.';
					$data['status'] = true;
				} else {
					$message = 'Please review your Email Address and Mobile Number. These must be the correct data that you entered during your registratioin.';
					$data['status'] = false;
				}

				if ($data['status']) {
					if(phpMailer($email, "Recovered Password", $message)){
						//echo "<div style='text-align:center;'><h1>Recover password sent!</h1></div>";
						$data['message'] = "Recover password sent!";
						$data['status'] = true;
					} else {
						//echo "<div style='text-align:center;'><h1>Recover password not sent!</h1></div>";
						$data['message'] = "Recover password not sent. Please try to check your internet connection.";
						$data['status'] = false;
					}
				} else {
					//echo "<div style='text-align:center;'>" . $message . "</div>";
					$data['message'] = $message;
				}
				echo json_encode($data);
				break;
			case 'recoverpass-sms':
				$data = array();
				$email = $_POST['email'];
				$mobile = $_POST['mobile'];
				$errorSending = array();
				$diffError = '';
				$error = false;
				$message = '';

				$selUser = "
					select
						*
					from
						clients
					inner join
						client_infos
					on
						client_infos.client_id = clients.id
					where
						client_infos.email_address = '" . $email . "'
					and
						client_infos.mobile_number = '" . $mobile . "'";
				$rsUser = mysqli_query($mysqli, $selUser);
				$row = mysqli_fetch_assoc($rsUser);

				if (isset($row)) {
					$message = 'Your password is ' . $row['password'] . '.';
					$data['status'] = true;
					
				} else {
					$message = 'Please review your Email Address and Mobile Number. These must be the correct data that you entered during your registratioin.';
					$data['status'] = false;
				}

				if ($data['status']) {
					$response = sendViaSemaphore($row['mobile_number'], $message);

					if(empty($response) || !isset($response[0]->status)){
						if(isset($response[0])){ //different error
							$diffError = $response[0];
						}
						$errorSending = $row['mobile_number'];
					}

					if(empty($errorSending)){
						$data['message'] = "Message Sent!";
						$data['status'] = true;
					}else{
						$data['message'] = "Message not sent. Please try to check your internet connection.";
						$data['sms-error'] = "There was an error sending text message to: " . $errorSending;
						if($diffError != ''){
							$data['sms-error'] += "Reason: " .$diffError;
						}
						$data['status'] = false;
					}
				} else {
					$data['message'] = $message;
				}

				echo json_encode($data);
				break;
			case 'send-unlock':
				$data = array();
				$email = $_POST['email'];
				$message = 'Please unlock my account. This is my Email Address: ' . $email;
				$adminEmail = 'dummyaccnt123@yahoo.com';
				
				if (phpMailer($adminEmail, "Unlock Account", $message)) {
					$data['status'] = 'success';
					$data['message'] = 'Email has been sent to the administrator.';
				} else {
					$data['status'] = 'failed';
					$data['message'] = 'There was a problem sending your request. Please try again a short while.';
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