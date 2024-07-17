<!-- Modal -->

<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="employeeModalLabel">Add New Employee</h5>
						<button type="button" class="btn-close" id="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
								<form class="row g-3" name="frmAddEmployee" id="addEmployee" enctype="multipart/form-data">
								<input type="hidden" name="hdnAction" value="addEmployee">
									<div class="col-md-6">
										<label for="input13" class="form-label">First Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
                                           
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input14" class="form-label">Last Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">DOB <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="dob" name="dob" placeholder="DOB" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input19" class="form-label">Gender <span class="text-danger">*</span></label>
										<select id="gender" name="gender" class="form-select" required="required">
											<option selected>Choose...</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="col-md-6">
										<label for="input15" class="form-label">Phone <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input16" class="form-label">Personal Email <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="pemail" name="pemail" placeholder="Personal Email" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input17" class="form-label">Company Email <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="cemail" name="cemail" placeholder="Company Email" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input19" class="form-label">Role <span class="text-danger">*</span></label>
										<select id="role" name="role" class="form-select" required="required">
											<option selected>Choose...</option>
											<?php $sel_role="SELECT * FROM position_tbl WHERE position_status='Active'";
                                            $res_role = mysqli_query($conn , $sel_role); 
                                            while($row = mysqli_fetch_array($res_role , MYSQLI_ASSOC)) { 
                                               $position_id = $row['position_id'];
                                               $position_name = $row['position_name'];
                                               
                                              
                                               echo '<option value="' . $position_id . '">' . $position_name . '</option>';
                                            } ?>
										</select>
									</div>
									<div class="col-md-6">
										<label for="input17" class="form-label">Pay Role <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" id="payrole" name="payrole" placeholder="Pay Role" required>
											<span class="position-absolute top-50 translate-middle-y"><i class="bi bi-currency-rupee"></i></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">Date of Joining <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="jDate" name="jDate" placeholder="Date of Joining" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									
									<div class="col-md-6">
										<label for="input23" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" id="address" name="address" placeholder="Address ..." rows="3" required></textarea>
									</div>
									<div class="col-md-6">
										<label for="input19" class="form-label">Marrital Status <span class="text-danger">*</span></label>
										<select id="ms" name="ms" class="form-select" required="required">
											<option selected>Choose...</option>
											<option value="Married">Married</option>
											<option value="Unmarried">Unmarried</option>
										</select>
									</div>
									
								</form>
						</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="submitBtn" class="btn btn-primary">Save changes</button>
                            </div>
						
            </div>
						
				
	    </div> <!--end modal dialog-->
</div><!--end Modal Fade-->
    <!-- Custom JavaScript for form validation and formatting -->
    <script>
    // Function to capitalize first letter of each word
    function capitalizeFirstLetters(str) {
        return str.replace(/\b\w/g, function (char) {
            return char.toUpperCase();
        });
    }

    // Validate and format form before submission
    function validateForm() {
        // Get form inputs
        var fname = document.getElementById('fname').value.trim();
        var lname = document.getElementById('lname').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var pemail = document.getElementById('pemail').value.trim().toLowerCase(); // Convert to lowercase
        var cemail = document.getElementById('cemail').value.trim().toLowerCase(); // Convert to lowercase
        var payrole = document.getElementById('payrole').value.trim();
        var address = document.getElementById('address').value.trim();

        // Capitalize first letter of each word for name fields
        document.getElementById('fname').value = capitalizeFirstLetters(fname);
        document.getElementById('lname').value = capitalizeFirstLetters(lname);

        // Validate phone number
        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phone)) {
            alert('Phone number must be exactly 10 digits.');
            return false;
        }

        // Validate pay role format (e.g., 10,000)
        var payrolePattern = /^\d{1,3}(,\d{3})*$/;
        if (!payrolePattern.test(payrole)) {
            alert('Pay role must be in format like 10,000.');
            return false;
        }

        // Validate email format
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(pemail)) {
            alert('Please enter a valid Personal Email address.');
            return false;
        }
        if (!emailPattern.test(cemail)) {
            alert('Please enter a valid Company Email address.');
            return false;
        }

        // Form is valid, allow submission
        return true;
    }
</script>

   
