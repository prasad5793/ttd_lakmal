<?php
	include("../inc/header.php");

    include('../phpclasses/pagination.php');

    $limit = 10;
	    
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
		<div class="container">
			<div class="wrapper employee_list clearfix">
				<div class="section_title">APPLICATION FOR REPATRIATION / DEPORTATION <br>All Applicant</div>
				<div class="top-bar">
					
					
				</div>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Between Dates Reports </h3>
              
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                 
                   
                    <form class="forms-sample" method="post" action="between-date-reprtsdetails.php">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">From Date:</label>
                        <input type="date" class="form-control" id="fromdate" name="fromdate" value="" required='true'>
                      </div>
                     <div class="form-group">
                        <label for="exampleInputName1">To Date:</label>
                        <input type="date" class="form-control" id="todate" name="todate" value="" required='true'>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </section>
<script type="text/javascript" src="../js/global.js"></script>
</body>
</html>

          <!-- partial -->
