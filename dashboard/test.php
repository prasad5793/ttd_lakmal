<?php
	include("../inc/header.php");

    include('../phpclasses/pagination.php');

    $limit = 20;
	    
	//get number of rows
	$queryNum = $db_connect->query("SELECT COUNT(*) as postNum FROM sharp_emp LIMIT $limit");
	$resultNum = $queryNum->fetch_assoc();
	$rowCount = $resultNum['postNum'];
										    
	//initialize pagination class
	$pagConfig = array(
		'totalRows' => $rowCount,
		'perPage' => $limit,
		'link_func' => 'searchFilter'
	);
	$pagination =  new Pagination($pagConfig);
										    
	//get rows


?>
	


	<section class="contentSection right clearfix full">
		<div class="container">
			<div class="wrapper employee_list clearfix">
				<div class="section_title">APPLICATION FOR REPATRIATION / DEPORTATION <br>All Applicant</div>
				<div class="top-bar">
					<div class="top-item">
						<form id="empFilter" method="post" action="">
							<input class="filterField filterVal" type="text" placeholder="Search Name" onkeyup="searchFilter()">
						</form>
					</div>
					<div class="top-item">
						<form id="empFilter" method="post" action="">
							<select class="sortField sortVal" onchange="searchFilter()">
								<option value="ASC">Newest</option>
								<option value="DESC">Oldest</option>
							</select>
						</form>
						
					</div>

					<a href="../dashboard"><span class="nav-icon"><i class="fa fa-users"></i></span></a>
<a href="../dashboard/current_employees.php"><span class="nav-icon"><i class="fa fa-check"></i></span></a>
<a href="../dashboard/past_employees.php"><span class="nav-icon"><i class="fa fa-times"></i></span>s</a>
<a href="../dashboard/add_employee.php"><span class="nav-icon"><i class="fa fa-user-plus"></i></span></a>
<a href="../dashboard/add_user.php"><span class="nav-icon"><i class="fa fa-user"></i></span></a></li>
<a href="../dashboard/settings.php"><span class="nav-icon"><i class="fa fa-cog"></i></span></a>
<a href="../dashboard/logout.php"><span class="nav-icon"><i class="fa fa-sign-out"></i></span></a>

				</div>
				<?php
					$getemp = mysqli_query($db_connect, "SELECT * FROM sharp_emp ORDER BY id ASC LIMIT $limit");
					$getempcount = mysqli_num_rows($getemp);
				?>
				<ul class="emp_list">
					<li class="emp_list_head">
						
						<div class="emp_item_head emp_id">1</div>
						<div class="emp_item_head emp_id">2</div>
						<div class="emp_item_head emp_id">3</div> 
						<div class="emp_item_head emp_id">4</div>
						<div class="emp_item_head emp_id">5</div>
						<div class="emp_item_head emp_id">6</div>
						<div class="emp_item_head emp_id">7</div>
						<div class="emp_item_head emp_id">8</div>
						<div class="emp_item_head emp_id">9</div>
						<div class="emp_item_head emp_id">10</div> 
						<div class="emp_item_head emp_id">11</div>
						<div class="emp_item_head emp_id">12</div>
						<div class="emp_item_head emp_id">13</div>
						<div class="emp_item_head emp_id">14</div>
						<div class="emp_item_head emp_id">15</div>
					<!--	<div class="emp_item_head emp_id">16</div>
						<div class="emp_item_head emp_id">17</div> 
						<div class="emp_item_head emp_id">18</div> 
						<div class="emp_item_head emp_id">19</div>
						<div class="emp_item_head emp_id">20</div>
						<div class="emp_item_head emp_id">21</div>-->

					</li>
					<div id="displayempList">
						<?php
							if($getempcount >= 1 ){
								while($fetch = mysqli_fetch_assoc($getemp)){
									$id = $fetch['id'];
									$emp_id = $fetch['employee_id'];
									$first_name = $fetch['first_name'];
									$middle_name = $fetch['middle_name'];
									$last_name = $fetch['last_name'];
									$phone = $fetch['phone'];
									$employee_image = $fetch['employee_image'];
									$id_type = $fetch['id_type'];
									$nic = $fetch['id_number'];
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
									$gender = $fetch['job_type'];
									$status = $fetch['status'];


									$date_employed = date("jS F Y", strtotime($date_employed));

										if($usertype == "Admin"){
											echo '		

											<li class="emp_item">
											<div class="emp_column emp_id"><img width=20px height=30px src="../uploads/employees_photos/'.$employee_image.'"></div>
											<div class="emp_column emp_id">'.$id.'</div>
											<div class="emp_column emp_id">'.$emp_id.'</div>
											<div class="emp_column emp_id">'.$first_name.'</div>
											<div class="emp_column emp_id">'.$middle_name.'</div>
											<div class="emp_column emp_id">'.$last_name.'</div>
											<div class="emp_column emp_id">'.$phone.'</div>
											<!--<div class="emp_column emp_id">'.$employee_image.'</div> -->
											<div class="emp_column emp_id">'.$id_type.'</div>
											<div class="emp_column emp_id">'.$nic.'</div>
											<div class="emp_column emp_id">'.$residence_address.'</div>
											<div class="emp_column emp_id">'.$residence_location.'</div>
											<div class="emp_column emp_id">'.$residence_direction.'</div>
											<div class="emp_column emp_id">'.$residence_gps.'</div>
											<div class="emp_column emp_id">'.$next_of_kin.'</div>
											<div class="emp_column emp_id">'.$relationship.'</div>
											<!--<div class="emp_column emp_id">'.$phone_of_kin.'</div>-->
											<!--<div class="emp_column emp_id">'.$kin_residence.'</div>-->
											<!--<div class="emp_column emp_id">'.$kin_residence_direction.'</div>
											<div class="emp_column emp_id">'.$date_employed.'</div>
											<div class="emp_column emp_id">'.$gender.'</div>
											<div class="emp_column emp_id">'.$status.'</div>-->
											



											
										</li>
											';											
										
								
							} else {
								echo '<li class="emp_item"> No Applicant record found </li>';
							}
						}echo $pagination->createLinks();
					}
					
						?>
					</div>
				</ul>
			</div>
		</div>
	
		<?	  ?>
		
						
	</section>
	
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>