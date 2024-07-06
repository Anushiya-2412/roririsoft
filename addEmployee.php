<!-- Modal -->
 <?php include("db/dbConnection.php");?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
								<form class="row g-3" method="POST" id="employeeForm">
									<div class="col-md-6">
										<label for="input13" class="form-label">First Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required="required">
                                           
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input14" class="form-label">Last Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input15" class="form-label">Phone <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input16" class="form-label">Personal Email <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="pemail" name="pemail" placeholder="Personal Email" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input17" class="form-label">Compmany Email <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="cemail" name="cemail" placeholder="Company Email" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">DOB <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="dob" name="dob" placeholder="DOB" required="required">
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input19" class="form-label">Role <span class="text-danger">*</span></label>
										<select id="role" name="role" class="form-select" required="required">
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
										<label for="input23" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" id="address" name="address" placeholder="Address ..." rows="3" required="required"></textarea>
									</div>
									
									
								</form>
						</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
						
            </div>
						
				
	    </div> <!--end modal dialog-->
</div><!--end Modal Fade-->
<script>
    document.getElementById('employeeForm').addEventListener('submit', function(event) {
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

</script>