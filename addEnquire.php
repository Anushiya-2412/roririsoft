<!-- Modal -->

<div class="modal fade" id="addEnquireModal" tabindex="-1" aria-labelledby="addEnquireModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="enquireModalLabel">Add New Enquire</h5>
						<button type="button" class="btn-close" id="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
								<form class="row g-3" name="frmAddEnquire" id="addEnquire" enctype="multipart/form-data">
								<input type="hidden" name="hdnAction" value="addEnquire">
									<div class="col-md-6">
										<label for="input13" class="form-label">Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                           
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input14" class="form-label">Company Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="compName" id="compName" placeholder="Last Name" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">Email <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="eEmail" name="eEmail" placeholder="Email" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									
									<div class="col-md-6">
										<label for="input15" class="form-label">Phone <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="ePhone" id="ePhone" placeholder="Phone" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
										</div>
									</div>
									
                                    <div class="col-md-6">
										<label for="input23" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" id="eAddress" name="eAddress" placeholder="Address ..." rows="3" required></textarea>
									</div>
									<div class="col-md-6">
										<label for="input16" class="form-label">Enquire Details <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
                                        <textarea class="form-control" id="details" name="details" placeholder="Enquire Details ..." rows="3" required></textarea>
										</div>
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
    var form = document.getElementById('addEnquire');
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

<!-- Edit Modal  -->

<!-- Modal -->

<div class="modal fade" id="editEnquireModal" tabindex="-1" aria-labelledby="editEnquireModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="enquireModalLabel">Edit Enquire</h5>
						<button type="button" class="btn-close" id="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
								<form class="row g-3" name="frmEditEnquire" id="editEnquire" enctype="multipart/form-data">
								<input type="hidden" name="hdnAction" value="editEnquire">
                                <input type="hidden" name="editIdEnquire" id="editIdEnquire" value="">
									<div class="col-md-6">
										<label for="input13" class="form-label">Client Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="EnameE" id="EnameE" placeholder="Client Name" required>
                                           
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input14" class="form-label">Company Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="compNameE" id="compNameE" placeholder="Last Name" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">Email <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="EmailE" name="EmailE" placeholder="Email" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									
									<div class="col-md-6">
										<label for="input15" class="form-label">Phone <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="PhoneE" id="PhoneE" placeholder="Phone" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
										</div>
									</div>
							
                                    <div class="col-md-6">
										<label for="input23" class="form-label">Address <span class="text-danger">*</span></label>
										<textarea class="form-control" id="AddressE" name="AddressE" placeholder="Address ..." rows="3" required></textarea>
									</div>
                                    <div class="col-md-6">
										<label for="input16" class="form-label">Enquire Details <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
                                        <textarea class="form-control" id="detailsE" name="detailsE" placeholder="Enquire Details ..." rows="3" required></textarea>
										</div>
									</div>
									
									
								</form>
						</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="updateBtn" class="btn btn-primary">Save changes</button>
                            </div>
						
            </div>
						
				
	    </div> <!--end modal dialog-->
</div><!--end Modal Fade-->