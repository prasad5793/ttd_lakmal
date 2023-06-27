<?php
	include("../inc/header.php");
										    
	if($usertype != "Admin"){
        header("Location: ../dashboard");
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
			<li class="nav-item"><a href="../dashboard/qr.php"><span class="nav-icon"><i class="fa fa-times"></i></span>QR Code</a></li>
			<li class="nav-item"><a href="../dashboard/TCPDF-main/examples/example_051.php"><span class="nav-icon"><i class="fa fa-times"></i></span>TTD New QR</a></li>
			
			<?php if($usertype == "Admin"){ ?>
				<li class="nav-item current"><a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>Add Applicant</a></li>
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
				<div class="section_title">APPLICATION FOR REPATRIATION / DEPORTATION <br/>Add Applicant</div>
				
				
				<form id="addemployee" class="clearfix" method="" action="">
					<div class="section_subtitle">Personal Data</div>
					<div class="input-box input-small left">
						<label for="employee_id">Registration No</label><br>
						<input type="text" class="inputField emp_id" placeholder="Optional" name="employee_id" value="OUT/">
						<div class="error empiderror"></div>
					</div>

					<div class="input-box input-small right">
						<label for="middlename">Nationality</label><br>
						<input type="text" class="inputField middlename" placeholder="Optional" name="middlename" value="Sri Lankan">
						<div class="error middlenameerror"></div>
					</div> 

					<div class="input-box input-small left">
						<label for="firstname">Surname</label><br>
						<input type="text" class="inputField firstname" name="firstname">
						<div class="error firstnameerror"></div>
					</div>
					
					<div class="input-box input-small right">
						<label for="lastname">Other Names</label><br>
						<input type="text" class="inputField lastname" name="lastname">
						<div class="error lastnameerror"></div>
					</div>

					<div class="input-box input-small left">
						<label for="phone">Phone number</label><br>
						<input type="text" class="inputField phone" name="phone" value="+965">
						<div class="error phoneerror"></div>
					</div>
					
					<div class="input-box input-small right">
						<label for="jobtype">Gender</label><br>
						<select class="inputField jobtype" name="jobtype">
							<option value="">-- Select Gender --</option>
							<option value="Male">Male</option>
							<option value="Female" selected>Female</option>
						</select>
						<div class="error jobtypeerror"></div>
					</div>

					<div class="input-box input-small left">
						<label for="dateemployed">Date of Birth</label><br>
						<input type="text" id="datepicker" class="inputField dateemployed" name="dateemployed" value="1900-01-01">
						<div class="error dateemployederror"></div>
					</div>
	<!--				<div class="input-box input-small right">
						<label for="empstatus">Applicant status</label><br>
						<select class="inputField empstatus" name="empstatus">
							<option value="">-- Select status --</option>
							<option value="submitted">Submitted</option>
							<option value="processing" selected>Processing</option>
						</select>
						<div class="error empstatuserror"></div>
					</div>


					<div class="input-box input-small left">
						<label for="resaddress">Residential Address</label><br>
						<input type="text" class="inputField resaddress" name="resaddress" value="Null">
						<div class="error resaddresserror"></div>
					</div>  -->

					<div class="input-box input-small right">
						<label for="reslocation">Language Spoken</label><br>
						<input type="text" class="inputField reslocation" name="reslocation" value="Sinhala, Tamil, English, Arabic">
						<div class="error reslocationerror"></div>
					</div>
					
					<div class="input-box input-small left">
						<label for="idnumber">National ID Number</label><br>
						<input type="text" class="inputField idnumber" name="idnumber">
						<div class="error IDnumbererror"></div>
					</div>
					<div class="input-box input-small right">
						<label for="idtype">Civil Status</label><br>
						<select class="inputField idtype" name="idtype">
							<option value="">Select Civil Status</option>
							<option value="Married" selected>Married</option>
							<option value="Single">Single</option>
							<option value="Divorced">Divorced</option>
							<option value="Widowed">Widowed</option>
						</select>
						<div class="error idtypeerror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="gpsreslocation">Birth Country</label><br>
						<input type="text" class="inputField gpsreslocation" name="gpsreslocation" value="Sri Lanka">
						<div class="error gpsreslocationerror"></div>
					</div>

					<div class="input-box input-small right">
						<label for="fullname">Travel Document Number</label><br>
						<input type="text" class="inputField fullname" name="fullname" value="N00">
						<div class="error fullnameerror"></div>
					</div>

<!--

					<div class="input-box input-small right">
						<label for="relationship">Account No</label><br>
						<input type="hidden" class="inputField relationship" name="relationship" value="00">
						<div class="error relationshiperror"></div>
					</div>
					<div class="input-box input-small left">
						<label for="kinphone">miscellaneous </label><br>
						<input type="hidden" class="inputField kinphone" name="kinphone" value="00">
						<div class="error kinphoneerror"></div>
					</div>




					<div class="input-box input-textarea right clearfix">
						<label for="resdirection">The details are essential</label><br>
						<textarea class="inputField resdirection" name="resdirection">Null</textarea>
						<div class="error resdirectionerror"></div>
					</div>
			-->
					
					<div class="section_subtitle left">Upload Applicant Photo</div>
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
					<div class="section_subtitle left">Upload Applicant Scaned Docs</div>



					<div class="input-box input-upload-box left">
						<div class="upload-wrapper">
							<div class="upload-box">
								<input type="file" name="nationalID" class="uploadField nationalID">
								<div class="uploadfile nationalID_file">Upload Reference Document</div>
								<div class="filebtn nationID-btn">Upload</div>
								<div class="filebtn nationID-disbtn">Upload</div>
							</div>
						</div>
						<div class="error nationalIDerror"></div>
						<div class="selected_nationalID_file"></div>
					</div>
					
					
					
				<!--	
					
				<div class="section_subtitle left">Other Data</div>
				<div class="input-box input-small right">
						<label for="kinresaddress">Nearest Police Station</label><br>-->
						<input type="hidden" class="inputField kinresaddress" name="kinresaddress" value="kinresaddress">
						<input type="hidden" class="inputField relationship" name="relationship" value="00">
						<input type="hidden" class="inputField kinphone" name="kinphone" value="00">
						<input type="hidden" class="inputField resdirection" name="resdirection" value="Null">
						<input type="hidden" class="inputField resaddress" name="resaddress" value="Null">
						<input type="hidden" class="inputField empstatus" name="empstatus" value="processing">
				<!--		<div class="error kinresaddresserror"></div>
					</div>-->
				<!--	<div class="input-box input-textarea left clearfix">
						<label for="kinresdirection">Remark</label><br>-->
						<input type="hidden" class="inputField kinresdirection" name="kinresdirection" value="1111"></input>
				<!--		<div class="error kinresdirectionerror"></div>
					</div>-->
					<div class="input-box">
						<button type="submit" class="submitField">Add record</button>
					</div>
				</form>
			</div>
		</div>
	</section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>