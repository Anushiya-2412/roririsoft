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
<script>
document.getElementById('submitBtn').addEventListener('click', function(event) {
    // Validate the form fields
    var form = document.getElementById('addEmployee');
    var isValid = true;

    // Check each required field
    var inputs = form.querySelectorAll('[required]');
    inputs.forEach(function(input) {
        if (input.value.trim() === '') {
            isValid = false;
            input.classList.add('is-invalid'); // Optional: Add invalid class for styling
        }
    });

    // If any required field is empty, prevent form submission
    if (!isValid) {
        event.preventDefault(); // Prevent form submission
        event.stopPropagation(); // Prevent event bubbling
    } else {
        // If all required fields are filled, submit the form (if desired)
        // form.submit(); // Uncomment this line to submit the form programmatically
    }
});
</script>
