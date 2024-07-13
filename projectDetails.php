<?php
session_start();
    include("db/dbConnection.php");
    
    if(isset($_GET['id']) && $_GET['id'] != '') {
        $proId = $_GET['id'];
    
        // Prepare and execute the SQL query
        $selQuery = "SELECT project_tbl.*,
        client_tbl.* 
        FROM project_tbl
        LEFT JOIN client_tbl on client_tbl.client_id=project_tbl.client
        WHERE project_tbl.project_id='$proId'";
        
        $result1 = $conn->query($selQuery);
    
        if($result1) {
            // Fetch employee details
            $row = mysqli_fetch_array($result1 , MYSQLI_ASSOC);
            $id = $row['project_id']; 
			$project_name=$row['project_name'];
            $client_name = $row['client_name'];
            $programming = $row['programming'];
            $developers=$row['developers'];
            $duration=$row['duration'];
            $description=$row['description'];
            $email=$row['client_email'];
            $address=$row['client_location'];
            $mobile=$row['client_phone'];
            $start_date=$row['start_date'];
            $pro_status=$row['project_status'];
            $charge=$row['total_pay'];
			$pay_status = $row['pay_status'];
            $programmingArray = json_decode($programming);
            $developerArray=json_decode($developers);

            // Check if $programmingArray is an array
            if (is_array($programmingArray)) {
                // Output each element separated by commas
                $pro= implode(', ', $programmingArray);
            } else {
                // Handle case where $programming is not a valid JSON array
                $pro= $programming; // Output as-is (may need additional handling)
            }  
            // Check if $developerArray is an array
            if (is_array($developerArray)) {
                // Output each element separated by commas
                $dev= implode(', ', $developerArray);
            } else {
                // Handle case where $programming is not a valid JSON array
                $dev= $developerArray; // Output as-is (may need additional handling)
            }  
            $empQuery = "SELECT * FROM employee_tbl WHERE emp_id IN ($dev)";
            $empResult = $conn->query($empQuery);

			// Construct the image path
			// $image_path = "image/Employee/" . $emp_img;   
    
        } else {
            echo "Error executing query: " . $conn->error;
        }
    } else {
        // If employee id is not provided, redirect to employees.php
        header("Location: project.php");
        exit(); // Ensure script stops executing after redirection
    }
    
?>
<!doctype html>
<html lang="en">

<?php include("head.php");?>
<?php include("addProject.php"); ?>
<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include("left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("top.php");?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div> -->
				<!--end breadcrumb-->
				
				<div class="container">
					<div class="main-body">
                        <div class="modal-footer d-flex justify-content-between p-2">
                            <button type="button" class="btn btn-danger me-auto" onclick="javascript:location.href='project.php'"><i class='bx bx-arrow-back'></i></button>
                            <button type="button" id="addProjectBtn" onclick="goShow(<?php echo $proId; ?>);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">Payment</button>
                            
                        </div>
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="img\Logo Roriri.png" alt="<?php echo $project_name; ?>" class="rounded-circle p-1" width="110">
											<div class="mt-3">
												<h4><?php echo $project_name; ?></h4>
												<p class="text-secondary mb-1"><?php echo $description;?></p>
												
												
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-2">
												<h6 class="mb-0">Client Name</h6>
											</div>
											<div class="col-sm-4 text-secondary">
											<p class="text-secondary mb-1"><?php echo $client_name;?></p>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-2">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-4 text-secondary">
											<p class="text-secondary mb-1"><?php echo $email;?></p>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-2">
												<h6 class="mb-0">Developers</h6>
											</div>
											<div class="col-sm-4 text-secondary">
											<p class="text-secondary mb-1"><?php if ($empResult) {
                                                    // Fetch associative array of rows
                                                    while ($row = $empResult->fetch_assoc()) {
                                                        // Access employee name from each row
                                                        $fname = $row['emp_first_name'];
                                                        $lname=$row['emp_last_name'];
                                                        $empName=$fname.' '.$lname;
                                                        // Output or process $employeeName as needed
                                                        echo " $empName <br>";
                                                    }
                                                } else {
                                                    // Handle query error
                                                    echo "Query error: " . $conn->error;
                                                }?></p>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-2">
												<h6 class="mb-0">Programming</h6>
											</div>
											<div class="col-sm-3 text-secondary">
											<p class="text-secondary mb-1"><?php echo $pro;?></p>
											
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-2">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-3 text-secondary">
											<p class="text-secondary mb-1"><?php echo $address;?></p>
											
											</div>
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>  <!--End Container-->
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Project</th>
										<th>Position</th>
										<th>Office</th>
										<th>Age</th>
										<th>Start date</th>
										<th>Salary</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Tiger Nixon</td>
										<td>System Architect</td>
										<td>Edinburgh</td>
										<td>61</td>
										<td>2011/04/25</td>
										<td>$320,800</td>
									</tr>
									
									
									
									
								</tbody>
								
							</table>
						</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--End Container 2-->
			</div> <!--End page-content-->
		</div><!--end page-wrapper-->
			
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include("footer.php"); ?>
	</div>
	<!--end wrapper-->


	<!-- search modal -->
    <!-- <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	  </div> -->
    <!-- end search modal -->




	<!--start switcher-->
	<?php include("theme.php");?>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
     <!-- Include Bootstrap JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script>
        function goViewEmp(id){
            alert(id);
            location.href = "projectDetails.php?id="+id;

        }
    </script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );

        //Handles fetch the data
        function goShow(id) 
  
  {
    $.ajax({
        url: 'action/actProject.php',
        method: 'POST',
        data: {
            proId: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
			

          
          $('#proName').val(response.project_name);
          $('#overAmnt').val(response.charge);
          $('#amntReceived').val(response.iniPay);
          
		  
   
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}
	</script>
    
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>