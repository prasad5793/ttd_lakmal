<?php
	include("../inc/header.php");
										    
	if($usertype != "Admin"){
        header("Location: ../dashboard");
    }

    if(isset($_GET['id'])){
    	$record_id = mysqli_real_escape_string($db_connect, $_GET['id']);

    	$getinfo = mysqli_query($db_connect, "SELECT * FROM sharp_emp WHERE id = '$record_id' ");
        $getinfocount = mysqli_num_rows($getinfo);

        if($getinfocount == 1){
            if($fetch = mysqli_fetch_assoc($getinfo)){
                $employee_id = $fetch['employee_id'];
                $firstname = $fetch['first_name'];
                $middlename = $fetch['middle_name'];
                $lastname = $fetch['last_name'];
                $phone = $fetch['phone'];
                $employee_image = $fetch['employee_image'];
                $id_type = $fetch['id_type'];
                $id_number = $fetch['id_number'];
                $residence_address = $fetch['residence_address'];
                $residence_location = $fetch['residence_location'];
                $residence_direction = $fetch['residence_direction'];
                $residence_gps = $fetch['residence_gps'];
                $next_of_kin = $fetch['next_of_kin'];
                $relationship = $fetch['relationship'];
                $phone_of_kin = $fetch['phone_of_kin'];
                $kin_residence = $fetch['kin_residence'];
                $kin_residence_direction = $fetch['kin_residence_direction'];
                $date_employed = $fetch['date_employed'];
                $job_type = $fetch['job_type'];
                $status = $fetch['status'];
            }
        }
    } else {
    	echo "Invalid Approach";
    	exit();
    }

?>
<section class="side-menu fixed left">
	<div class="dash_logo">
		<img src="../images/logo.png" alt="Applicant Record System" style="width:200px;height:250px;">
	</div>
		<div class="top-sec">
			<h4>APPLICATION FOR REPATRIATION / DEPORTATION </h4>
		</div>
		<ul class="nav">
			<li class="nav-item current"><a href="../dashboard"><span class="nav-icon"><i class="fa fa-users"></i></span>All Applicant</a></li>
			<li class="nav-item"><a href="../dashboard/current_employees.php"><span class="nav-icon"><i class="fa fa-check"></i></span>Processing Applications</a></li>
			<li class="nav-item"><a href="../dashboard/past_employees.php"><span class="nav-icon"><i class="fa fa-times"></i></span>submitted Applications</a></li>
			<?php if($usertype == "Admin"){ ?>
				<li class="nav-item"><a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add Applicant</a></li>
<br/><br/><br/>
				<hr/>
				<li class="nav-item"><span class="nav-icon"><a>Sys Funtion</a></span></li>
			
				<li class="nav-item"><a href="../dashboard/add_user.php"><span class="nav-icon"><i class="fa fa-user"></i></span>Add User</a></li>
			<?php		} ?>
			<li class="nav-item"><a href="../dashboard/settings.php"><span class="nav-icon"><i class="fa fa-cog"></i></span>Settings</a></li>
			<li class="nav-item"><a href="../dashboard/logout.php"><span class="nav-icon"><i class="fa fa-sign-out"></i></span>Sign out</a></li>
		</ul>
	</section>
	<section class="contentSection right clearfix">
		<div class="displaySuccess"></div>
		<div class="container">
			<div class="wrapper add_employee clearfix">
				<div class="section_title">APPLICATION FOR REPATRIATION / DEPORTATION <br/>Update Applicant Records</div>
				
				<form id="editemployee" class="clearfix" method="" action="">
					<div class="section_subtitle">Personal Data</div>
					<input type="hidden" name="record_id" value="<?php echo $record_id ?>">
					<div class="input-box input-small left">
						<label for="employee_id">Registration No</label><br>
						<input type="text" class="inputField emp_id" placeholder="Optional" name="employee_id" value="<?php echo $employee_id ?>">
						<div class="error empiderror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="middlename">Nationality</label><br>
						<input type="text" class="inputField middlename" placeholder="Optional" name="middlename" value="<?php echo $middlename ?>">
						<div class="error middlenameerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="firstname">Surname</label><br>
						<input type="text" class="inputField firstname" name="firstname" value="<?php echo $firstname ?>">
						<div class="error firstnameerror"></div>
					</div>

					

					<div class="input-box input-small right">
						<label for="lastname">Other Names</label><br>
						<input type="text" class="inputField lastname" name="lastname" value="<?php echo $lastname ?>">
						<div class="error lastnameerror"></div>
					</div>

					<div class="input-box input-small left">
						<label for="phone">Phone Number</label><br>
						<input type="text" class="inputField phone" name="phone" value="<?php echo $phone ?>">
						<div class="error phoneerror"></div>
					</div>

					<div class="input-box input-small right">
						<label for="jobtype">Gender</label><br>
						<select class="inputField jobtype" name="jobtype">
						<option value="<?php echo $job_type ?>"><?php echo $job_type ?></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option></select>
						<div class="error jobtypeerror"></div>
					</div>



					<div class="input-box input-small left">
						<label for="dateemployed">Date of Birth</label><br>
						<input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed" value="<?php echo $date_employed ?>">
						<div class="error dateemployederror"></div>
					</div>
					
					<div class="input-box input-small right">
						<label for="empstatus">Applicant Status</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option value="<?php echo $status ?>"><?php echo $status ?></option>
							<option value="submitted">Submitted</option>
							<option value="processing">Processing</option>
						</select>
						<div class="error empstatuserror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="resaddress">Residential Address</label><br>
						<input type="text" class="inputField resaddress" name="resaddress" value="<?php echo $residence_address?>">
						<div class="error resaddresserror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="reslocation">Place of Birth</label><br>
						<input type="text" class="inputField reslocation" name="reslocation" value="<?php echo $residence_location ?>">
						<div class="error reslocationerror"></div>
					</div>
					
					<div class="input-box input-small left">
						<label for="idnumber">National ID Number</label><br>
						<input type="text" class="inputField idnumber" name="idnumber" value="<?php echo $id_number ?>">
						<div class="error IDnumbererror"></div>
					</div>



					<div class="input-box input-small right">
						<label for="idtype">Civil Status</label><br>
						<select class="inputField idtype" name="idtype">
							<option value="<?php echo $id_type ?>"><?php echo $id_type ?></option>
							<option value="Married">Married</option>
							<option value="Single">Single</option>
							<option value="Divorced">Divorced</option>
							<option value="Widowed">Widowed</option>
						</select>
						<div class="error idtypeerror"></div>
					</div>

					<div class="input-box input-small left">
						<label for="gpsreslocation">Birth Country</label><br>
						<input type="text" class="inputField gpsreslocation" name="gpsreslocation" value="<?php echo $residence_gps ?>">
						<div class="error gpsreslocationerror"></div>
					</div>

					<div class="input-box input-small right">
						<label for="fullname">Travel Document Number</label><br>
						<input type="text" class="inputField fullname" name="fullname" value="<?php echo $next_of_kin ?>">
						<div class="error fullnameerror"></div>
					</div>
					<div class="input-box input-textarea right clearfix">
						<label for="resdirection">The details are essential</label><br>
						<textarea class="inputField resdirection" name="resdirection"><?php echo $residence_direction ?></textarea>
						<div class="error resdirectionerror"></div>
					</div>

					
					<div class="section_subtitle left">Edit Upload Docs</div>
					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="passport_photo" class="uploadField passport_photo">
								<div class="uploadfile passportPhoto_file">Upload Applicant Photo</div>
								<div class="filebtn passport-btn">Upload</div>
								<div class="filebtn passport-disbtn">Upload</div>
							</div>
						</div>
						<div class="error photoerror"></div>
						<div class="passport_file"></div>
					</div>


					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="nationalID" class="uploadField nationalID">
								<div class="uploadfile nationalID_file">Upload Selected ID type</div>
								<div class="filebtn nationID-btn">Upload</div>
								<div class="filebtn nationID-disbtn">Upload</div>
							</div>
						</div>
						<div class="error nationalIDerror"></div>
						<div class="selected_nationalID_file"></div>
					</div>



					<div class="section_subtitle left">Other Data</div>
				
						<input type="text" class="inputField relationship" name="relationship" value="<?php echo $relationship ?>">
	
						<input type="text" class="inputField kinphone" name="kinphone" value="<?php echo $phone_of_kin ?>">
		
						<input type="text" class="inputField kinresaddress" name="kinresaddress" value="<?php echo $kin_residence ?>">
				
						<input type="text" class="inputField kinresdirection" name="kinresdirection" value="<?php echo $kin_residence_direction ?>">
					
			
					<div class="input-box">
						<button type="button" class="submitField">Update record</button>
						
					</div>
				</form>


				
			</div>
		</div>
	</section><!--
<script type="text/javascript" src="../js/global.js"></script> -->
</body>
</html>