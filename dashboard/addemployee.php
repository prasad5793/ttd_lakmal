<?php 
	ob_start();
	include("../inc/db_connect.php");
	include('../libs/phpqrcode/qrlib.php'); 

	


		$employee_id = mysqli_real_escape_string($db_connect, $_POST['employee_id']);
		$firstname = mysqli_real_escape_string($db_connect, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($db_connect, $_POST['middlename']);
		$lastname = mysqli_real_escape_string($db_connect, $_POST['lastname']);
		$phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
		$jobtype = mysqli_real_escape_string($db_connect, $_POST['jobtype']);
		$dateemployed = mysqli_real_escape_string($db_connect, $_POST['dateemployed']);
		$resaddress = mysqli_real_escape_string($db_connect, $_POST['resaddress']);
		$reslocation = mysqli_real_escape_string($db_connect, $_POST['reslocation']);
		$gpsreslocation = mysqli_real_escape_string($db_connect, $_POST['gpsreslocation']);
		$resdirection = mysqli_real_escape_string($db_connect, $_POST['resdirection']);
		$passport_photo_name = mysqli_real_escape_string($db_connect, $_POST['passport_photo_name']);
		$idnumber = mysqli_real_escape_string($db_connect, $_POST['idnumber']);
		$idtype = mysqli_real_escape_string($db_connect, $_POST['idtype']);
		$nationalID_name = mysqli_real_escape_string($db_connect, $_POST['nationalID_name']);
		$fullname = mysqli_real_escape_string($db_connect, $_POST['fullname']);
		$relationship = mysqli_real_escape_string($db_connect, $_POST['relationship']);
		$kinphone = mysqli_real_escape_string($db_connect, $_POST['kinphone']);
		$kinresaddress = mysqli_real_escape_string($db_connect, $_POST['kinresaddress']);
		$kinresdirection = mysqli_real_escape_string($db_connect, $_POST['kinresdirection']);
		$empstatus = mysqli_real_escape_string($db_connect, $_POST['empstatus']);
		$blank_image="blank_img.jpg";
	
										
		//Check if user already exists
		$id_check =  mysqli_query($db_connect, "SELECT employee_id FROM sharp_emp WHERE employee_id = '$employee_id' ");
								
		//Count the amount of rows where username = $username
		$check_id = mysqli_num_rows($id_check);
		ob_end_clean();	
		if ($check_id == 0) {

			if($passport_photo_name == ""){
				$query = "UPDATE sharp_emp SET employee_image = '$blank_image' WHERE id = '$record_id' ; ";
			}
	
			if($nationalID_name != ""){
				$query .= "UPDATE sharp_emp SET id_card_image = '$blank_image' WHERE id = '$record_id' ; ";
			}

			$query = mysqli_query($db_connect, "INSERT INTO `sharp_emp` (`id`, `employee_id`, `first_name`, `middle_name`, `last_name`, `phone`, `employee_image`, `id_type`, `id_number`, `id_card_image`, `residence_address`, `residence_location`, `residence_direction`, `residence_gps`, `next_of_kin`, `relationship`, `phone_of_kin`, `kin_residence`, `kin_residence_direction`, `date_employed`, `job_type`, `status`) VALUES (NULL, '$employee_id', '$firstname', '$middlename', '$lastname', '$phone', '$passport_photo_name', '$idtype', '$idnumber', '$nationalID_name', '$resaddress', '$reslocation', '$resdirection', '$gpsreslocation', '$fullname', '$relationship', '$kinphone', '$kinresaddress', '$kinresdirection', '$dateemployed', '$jobtype', '$empstatus')");
			$querycount = mysqli_num_rows($query);

			ob_end_clean();			
			if($query){

				echo json_encode(array("status" => "Success"));
				exit();			
			} else {
				echo json_encode(array("status" => "failed"));
				exit();
			}

		} else {
			echo json_encode(array("status" => "exists"));
			exit();
		}
	
?>
<?php

$f="/visit.php";

if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
}
 


function getUsernameFromEmail($email) {
	//$find = '@';
	//$pos = strpos($email, $find);
	//$username = substr($email, 0, $pos);
	$username = $email;
	return $username;
}

if(isset($_POST['submit']) ) {
	$tempDir = '../temp/'; 
	$email = $_POST['mail'];
	$subject =  $_POST['subject'];
	$filename = getUsernameFromEmail($email);
	$body =  $_POST['msg'];
	$codeContents = "\nApp No- ".$email."\nName- ".$subject." \nPassport No- ".$body;
	//$codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body); 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}

?>