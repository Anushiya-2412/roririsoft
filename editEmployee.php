<!-- Modal -->

<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="employeeModalLabel">Edit Employee</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
								<form class="row g-3" name="frmEditEmployee" id="editEmployee" enctype="multipart/form-data">
                                    <input type="hidden" name="hdnAction" value="hdneditEmployee">
                                    <input type="hidden" name="empId" id="empId">
									<div class="col-md-6">
										<label for="input13" class="form-label">First Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="editFname" id="editFname" placeholder="First Name" required="required">
                                           
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input14" class="form-label">Last Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="editLname" id="editLname" placeholder="Last Name" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">DOB <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="editDob" name="editDob" placeholder="DOB" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input19" class="form-label">Gender <span class="text-danger">*</span></label>
										<select id="editGender" name="editGender" class="form-select" required="required">
											<option selected>Choose...</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="col-md-6">
										<label for="input15" class="form-label">Phone <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="editPhone" id="editPhone" placeholder="Phone" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input16" class="form-label">Personal Email <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="editPemail" name="editPemail" placeholder="Personal Email" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input17" class="form-label">Compmany Email <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="editCemail" name="editCemail" placeholder="Company Email" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input19" class="form-label">Role <span class="text-danger">*</span></label>
										<select id="editRole" name="editRole" class="form-select" required="required">
											<option selected>Choose...</option>
											<?php $sel_role="SELECT * FROM role_tbl WHERE role_status='Active'";
                                            $res_role = mysqli_query($conn , $sel_role); 
                                            while($row = mysqli_fetch_array($res_role , MYSQLI_ASSOC)) { 
                                               $role_id = $row['role_id'];
                                               $role_name = $row['role_name'];
                                               
                                              
                                               echo '<option value="' . $role_id . '">' . $role_name . '</option>';
                                            } ?>
										</select>
									</div>
									<div class="col-md-6">
										<label for="input17" class="form-label">Pay Role <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" id="editPayrole" name="editPayrole" placeholder="Pay Role" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class="bi bi-currency-rupee"></i></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">Date of Joining <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="editjDate" name="editjDate" placeholder="Date of Joining" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									
									<div class="col-md-6">
										<label for="input23" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" id="editAddress" name="editAddress" placeholder="Address ..." rows="3" required="required"></textarea>
									</div>
									<div class="col-md-6">
										<label for="input19" class="form-label">Marrital Status <span class="text-danger">*</span></label>
										<select id="editms" name="editms" class="form-select" required="required">
											<option selected>Choose...</option>
											<option value="Married">Married</option>
											<option value="Unmarried">Unmarried</option>
										</select>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">Image <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="file" class="form-control" id="editImage" name="editImage" accept=".jpg, .jpeg, .png">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
                                        
									</div>
									<div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="updateBtn" class="btn btn-primary">Save changes</button>
                                    </div>
								</form>
						</div>
                            
						
            </div>
						
				
	    </div> <!--end modal dialog-->
</div><!--end Modal Fade-->
<!-- <script>
    document.getElementById('frmAddEmployee').addEventListener('submit', function(event) {
    var inputs = this.querySelectorAll('[required]');
    var isValid = true;
    inputs.forEach(function(input) {
        if (input.value.trim() === '') {
            isValid = false;
            input.classList.add('is-invalid'); // Optional: Add invalid class for styling
        }
    });
    if (!isValid) {
        event.preventDefault(); // Prevent form submission if any required fields are empty
    }
});

</script> -->