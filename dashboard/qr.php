<?php
	include("../inc/header.php");
    include('../libs/phpqrcode/qrlib.php'); 
										    
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
				<div class="section_title">APPLICATION FOR REPATRIATION / DEPORTATION <br/>(QR) Code Generator</div>



<?php
$f = "visit.php";
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

	<link rel="stylesheet" href="../libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="../libs/style.css">
	<script src="../libsa/navbarclock.js"></script>
	
				<h3>Please Fill-out All Fields</h3>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<div class="form-group">
						<label>Application No</label>
						<input type="text" class="form-control" name="mail" style="width:20em;" placeholder="Application No" value="<?php echo @$email; ?>" required />
					</div>
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="subject" style="width:20em;" placeholder="Applicant Name" value="<?php echo @$subject; ?>" required pattern="[a-zA-Z .]+" />
					</div>
					<div class="form-group">
						<label>Passport No</label>
						<input type="text" class="form-control" name="msg" style="width:20em;" value="<?php echo @$body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Passport No"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" />
					</div>
				</form>
			</div>
			<?php
			if(!isset($filename)){
				$filename = "author";
			}
			?>
			<div class="qr-field">
				<h2 style="text-align:center">QR Code Result: </h2>
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="../temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
			</div>
			<div class = "dllink" style="text-align:center;margin:-100px 0px 50px 0px;">
				
			</div>
		</div>
	</body>
	<footer></footer>
</html>