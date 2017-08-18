<?php
	session_start();
	include "include/configuration.php";
	include "include/general_functions.php";

	if ($_POST) {
		
		$out = array();
		switch (strtolower($_POST['action'])) {
			case 'booking':
				$data = $_POST['params'];
				$clientId = empty($_SESSION['authId']) ? 0 : $_SESSION['authId'];

				$insBooking = "
					insert into
					bookings(
						date_from,
						date_to,
						client_event_id,
						customer_id,
						remarks,
						status_id,
						total_amount,
						approval_type_id
					)
					values(
						'" . $data['bookFrom'] . "',
						'" . $data['bookTo'] . "',
						" . $data['eid'] . ",
						" . $clientId . ",
						'" . $data['remarks'] . "',
						2,
						" . $data['total'] . ",
						3
					)
				";
				$rsBooking = mysqli_query($mysqli, $insBooking);

				if ($rsBooking !== false) {
					$bookingId = mysqli_insert_id($mysqli);

					$pkgArr = array();
					foreach ($data['packages'] as $pkg) {
						$aa = "(" . $bookingId . "," . $pkg . ",0)";
						array_push($pkgArr, $aa);
					}

					$insSummary = "insert into booking_summaries(booking_id, client_event_package_id, client_supplier_id ) values " . implode(',', $pkgArr);
					$rsSummary = mysqli_query($mysqli, $insSummary);
					if ($rsSummary !== false) {
						if (!empty($data['suppliers'])){
							foreach ($data['suppliers'] as $sup) {
								$upSummary = "
									update
									booking_summaries
									set
										client_supplier_id = " . $sup['supId'] . "
									where
										booking_id = " . $bookingId . " and client_event_package_id = " . $sup['pkgId'] . "
								";
								$rsUpSummary = mysqli_query($mysqli, $upSummary);
								if ($rsUpSummary !== false) {

								}
							}
						}
						
					}
					$out['status'] = 'success';
					$_SESSION['tempBookingId'] = $bookingId;
					$_SESSION['formSummary'] = $data['formSummary'];
					$_SESSION['eid'] = $data['eid'];
				} else {
					$out['status'] = 'failed';
					$out['message'] = mysqli_error($mysqli);
				}

				break;
			case 'up-booking':
				$upBooking = "update bookings set customer_id = " . $_SESSION['authId'] . ", status_id = 1 where id = " . $_SESSION['tempBookingId'];
				$rsBooking = mysqli_query($mysqli, $upBooking);
				if ($rsBooking !== false) {
					$out['status'] = 'success';
				} else {
					$out['status'] = 'failed';
					$out['message'] = mysqli_error($mysqli);
				}

				break;
			default:
				# code...
				break;
		}
		echo json_encode($out);
	}
?>