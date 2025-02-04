<?php
session_start();
include("C:\\xampp\\htdocs\\ERP\\db\\dbConnection.php");
include("../url.php");

    
   $selQuery = "SELECT employee_tbl.*, emp_additional_tbl.*,position_tbl.* FROM employee_tbl
LEFT JOIN emp_additional_tbl ON emp_additional_tbl.emp_id = employee_tbl.emp_id 
LEFT JOIN position_tbl ON position_tbl.position_id=employee_tbl.emp_role 
WHERE employee_tbl.emp_status='Active'";
    
    $resQuery = mysqli_query($conn , $selQuery); 
    
?>
<!doctype html>
<html lang="en">

<?php include("head.php");?>

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
        <?php include("addEmployee.php");?>
		<?php include("editEmployee.php");?>
		<div class="page-wrapper">
			<div class="page-content">
                
				
            <div class="page-title-box">
                
                <div class="page-title-right">
                    <h4 class="page-title">Employee</h4>
                    <div class="position-relative" style="height: 80px;"> <!-- Adjust height as needed -->
                    <button type="button" id="addEmpBtn" class="btn btn-primary position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add New Employee</button>
                    </div>

                </div>
                   
            </div>

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
                                        <th>S. No</th>
										<th>Name</th>
                                        <th>ID</th>
                                        <th>Position</th>
										<th>Mobile</th>
										<th>Email</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
                                <?php $i=1; while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                           
                            $emp_id   = $row['emp_id'];  
                            $employee_id=$row['employee_id'];   
                            $emp_first_name  = $row['emp_first_name'];  
                            $emp_last_name   = $row['emp_last_name'];  
                            $email          = $row['emp_company_email'];
                            $address        = $row['emp_address'];   
                            $role        = $row['position_name'];   
                            $jDate    = $row['emp_joining_date'];
                            $mobile   =$row['emp_mobile'];
                            $date=date_create($jDate);
                            $name=$emp_first_name.' '.$emp_last_name;

                      date_format($date,"Y/m/d H:i:s");
                      ?>
                      <tr>
                       <td><?php echo $i; $i++; ?></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $employee_id; ?></th>
                      <td><?php echo $role; ?></td>
                      <td><?php echo $mobile; ?></td>
                      <td><?php echo $email; ?></td>
                      
                      <td>
                          <button class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="top" title="View" onclick="goViewEmp(<?php echo $emp_id; ?>);" ><i class="lni lni-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-outline-warning" onclick="goEditEmp(<?php echo $emp_id; ?>);" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="lni lni-pencil"></i></button>
                         
                         
                          <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="goDeleteEmployee(<?php echo $emp_id; ?>);"><i class="lni lni-trash"></i></button>
                          
                      </td>
                    </tr>
                    <?php } ?>   
								</tbody>
								<!-- <tfoot>
									<tr>
                                    <th>S. No</th>
										<th>Name</th>
										<th>Mobile</th>
										<th>Email</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
								</tfoot> -->
							</table>
						</div>
					</div>
				</div>
			</div><!--end page-content-->
		</div>
			
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include("footer.php"); ?>
	</div>
	<!--end wrapper-->





	<!--start switcher-->
	<?php include("theme.php");?>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<!-- Bootstrap JS -->
	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
     <!-- Include Bootstrap JS (with Popper) -->
    <script src="<?php echo $popper;?>"></script>
    <script src="<?php echo $bootStackPath;?>"></script>
	<script src="<?php echo $sweetalert; ?>"></script>
    <!-- Initialize tooltips -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
    <script>
        function goViewEmp(id){
            
            location.href = "employeeDetails.php?id="+id;

        }
function goEditEmp(id) 
  
  {
    $.ajax({
        url: 'action/actEmployee.php',
        method: 'POST',
        data: {
            empId: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
			

          $('#empId').val(response.emp_id);
          $('#editFname').val(response.first_name);
          $('#editLname').val(response.last_name);
          $('#editPhone').val(response.phone);
          $('#editPemail').val(response.personal_email);
          $('#editCemail').val(response.company_email);
          $('#editDob').val(response.dob);
          $('#editAddress').val(response.address);
          $('#editjDate').val(response.joining_date);
          $('#editRole').val(response.role);
          $('#editms').val(response.married_status);
		  $('#editGender').val(response.gender);
		  $('#editPayrole').val(response.pay_role);
		  // Display the image if the URL is provided
          if (response.img) {
            console.log('Image URL:', response.img); // Debugging line
                $('#editImage').attr('src', response.img).show();
            } else {
                $('#editImage').hide();
            }
   
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}
function goDeleteEmployee(id)
{
    //alert(id);
    if(confirm("Are you sure you want to delete Employee?"))
    {
      $.ajax({
        url: 'action/actEmployee.php',
        method: 'POST',
        data: {
          deleteId: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          $('#example2').load(location.href + ' #example2 > *', function() {
                               
                               $('#example2').DataTable().destroy();
                               
                                $('#example2').DataTable({
                                    "paging": true, // Enable pagination
                                    "ordering": true, // Enable sorting
                                    "searching": true // Enable searching
                                });
                            });
         

        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }
}
//Data Table script 
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
</script>

    <!--Handles the Ajax call-->
<script>
        $(document).ready(function () {
            $('#submitBtn').click(function () {
                $('#addEmployee').submit();
            });

            $('#addEmployee').off('submit').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                var formData = new FormData(this);
                $.ajax({
                    url: "action/actEmployee.php",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                timer: 2000
                            }).then(function() {
                                $('#addEmployeeModal').modal('hide'); // Close the modal
                                $('.modal-backdrop').remove(); // Remove the backdrop
                                resetForm('addEmployee'); // Reset the form
                                setTimeout(function() {
                                    $('#example2').load(location.href + ' #example2 > *', function() {
                                        $('#example2').DataTable().destroy();
                                        $('#example2').DataTable({
                                            "paging": true,
                                            "ordering": true,
                                            "searching": true
                                        });
                                    });
                                }, 300);
                            });

                        } else {
						

                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while adding employee data.'
                        });
                        $('#submitBtn').prop('disabled', false);
                    }
                });
            });
            // Reset the form when the close button is clicked
        $('#modalCloseBtn').click(function () {
            resetForm('addEmployee');
        });
        });

        function resetForm(formId) {
            document.getElementById(formId).reset(); // Reset the form
        }
</script>
<script>

//--------------Handles edit employee-----------------------------//

document.addEventListener('DOMContentLoaded', function() {
    $('#editEmployee').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this);
        $.ajax({
            url: "action/actEmployee.php",
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000
                    }).then(function() {
                        $('#editEmployeeModal').modal('hide'); // Close the modal
                        $('.modal-backdrop').remove(); // Remove the backdrop   
                        $('#example2').load(location.href + ' #example2 > *', function() {
                            $('#example2').DataTable().destroy();
                            $('#example2').DataTable({
                                "paging": true, // Enable pagination
                                "ordering": true, // Enable sorting
                                "searching": true // Enable searching
                            });
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while updating employee data.'
                });
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
});


</script>
	
	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>