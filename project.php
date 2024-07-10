<?php
session_start();
include("db/dbConnection.php");

$selQuery = "SELECT employee_tbl.*, emp_additional_tbl.*,role_tbl.* FROM employee_tbl
LEFT JOIN emp_additional_tbl ON emp_additional_tbl.emp_id = employee_tbl.emp_id 
LEFT JOIN role_tbl ON role_tbl.role_id=emp_additional_tbl.emp_role 
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
        <?php include("addProject.php");?>
        <?php include("editEmployee.php");?>
        <div class="page-wrapper">
            <div class="page-content">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <h4 class="page-title">Projects</h4>
                        <div class="position-relative" style="height: 80px;">
                            <!-- Adjust height as needed -->
                            <button type="button" id="addProjectBtn" class="btn btn-primary position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#addProjectModal">Add Project</button>
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
                                        <th>Role</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                                        $emp_id = $row['emp_id'];     
                                        $emp_first_name = $row['emp_first_name'];  
                                        $emp_last_name = $row['emp_last_name'];  
                                        $email = $row['emp_company_email'];
                                        $address = $row['emp_address'];   
                                        $role = $row['role_name'];   
                                        $jDate = $row['emp_joining_date'];
                                        $mobile = $row['emp_mobile'];
                                        $date = date_create($jDate);
                                        $name = $emp_first_name . ' ' . $emp_last_name;

                                        date_format($date, "Y/m/d H:i:s");
                                    ?>
                                    <tr>
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $role; ?></td>
                                        <td><?php echo $mobile; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-success" onclick="goViewEmp(<?php echo $emp_id; ?>);"><i class="lni lni-eye"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-warning" onclick="goEditEmp(<?php echo $emp_id; ?>);" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="lni lni-pencil"></i></button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="goDeleteEmployee(<?php echo $emp_id; ?>);"><i class="lni lni-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
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
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/plugins/select2/js/select2-custom.js"></script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
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
    <script>
        $(document).ready(function () {
            $('#example2').DataTable({
                "paging": true,
                "ordering": true,
                "searching": true
            });

            $('#submitBtn').click(function () {
                $('#addProject').submit();
            });

            $('#addProject').off('submit').on('submit', function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                var formData = new FormData(this);
                $.ajax({
                    url: "action/actProject.php",
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
                                $('#addProjectModal').modal('hide'); // Close the modal
                                $('.modal-backdrop').remove(); // Remove the backdrop
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
                            text: 'An error occurred while adding Project data.'
                        });
                        $('#submitBtn').prop('disabled', false);
                    }
                });
            });

            // Reset the form when the close button is clicked
            $('#modalCloseBtn').click(function () {
                resetForm('addProject');
            });

            // Function to reset the form
            function resetForm(formId) {
                document.getElementById(formId).reset(); // Reset the form
            }
        });

        function goViewEmp(id) {
            location.href = "employeeDetails.php?id=" + id;
        }

        function goEditEmp(id) {
            $.ajax({
                url: 'action/actEmployee.php',
                method: 'POST',
                data: {
                    empId: id
                },
                dataType: 'json',
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
                    $('#editImage').val(response.image);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        }

        function goDeleteEmployee(id) {
            if (confirm("Are you sure you want to delete Employee?")) {
                $.ajax({
                    url: 'action/actEmployee.php',
                    method: 'POST',
                    data: {
                        deleteId: id
                    },
                    success: function(response) {
                        $('#example2').load(location.href + ' #example2 > *', function() {
                            $('#example2').DataTable().destroy();
                            $('#example2').DataTable({
                                "paging": true,
                                "ordering": true,
                                "searching": true
                            });
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX request failed:', status, error);
                    }
                });
            }
        }
    </script>
</body>
</html>
