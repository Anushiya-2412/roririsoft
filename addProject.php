<!-- Modal -->

<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="projectModalLabel">Add Project</h5>
						<button type="button" class="btn-close" id="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
								<form class="row g-3" name="frmAddProject" id="addProject" enctype="multipart/form-data">
								<input type="hidden" name="hdnAction" value="addProject">
									<div class="col-md-6">
										<label for="input13" class="form-label">Project Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="pname" id="pname" placeholder="Project Name" required> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-notepad"></i></span>
										</div>
									</div>
                                    <div class="col-md-6">
										<label for="input18" class="form-label">Client Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" id="client" name="client" placeholder="Clinet Name" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
										</div>
									</div>

									<div class="col-md-12">
										<label for="input14" class="form-label">Developers<span class="text-danger">*</span></label>
                                        
                                            <select class="form-select" name="developers[]" id="multiple-select-custom-field" data-placeholder="Choose anything" multiple required>
											<?php $sel_role="SELECT * FROM employee_tbl WHERE emp_status='Active'";
                                            $res_role = mysqli_query($conn , $sel_role); 
                                            while($row = mysqli_fetch_array($res_role , MYSQLI_ASSOC)) { 
                                               $emp_id = $row['emp_id'];
                                               $fname = $row['emp_first_name'];
                                               $lname=$row['emp_last_name'];
                                               $name= $fname.' '.$lname; 
                                              
                                               echo '<option value="' . $emp_id . '">' . $name . '</option>';
                                            } ?>
                                            </select>
                                        
									</div>
									
									<div class="col-md-12">
										<label for="input19" class="form-label">Programming <span class="text-danger">*</span></label>
										<select class="form-select" id="multiple-select-clear-field" data-placeholder="Choose anything" multiple>
                                            <option>Christmas Island</option>
                                            <option>South Sudan</option>
                                            <option>Jamaica</option>
                                            <option>Kenya</option>
                                            <option>French Guiana</option>
                                            <option selected>Mayotta</option>
                                            <option selected>Liechtenstein</option>
                                            <option>Denmark</option>
                                            <option>Eritrea</option>
                                            <option>Gibraltar</option>
                                            <option>Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option>Haiti</option>
                                            <option>Namibia</option>
                                            <option>South Georgia and the South Sandwich Islands</option>
                                            <option>Vietnam</option>
                                            <option>Yemen</option>
                                            <option>Philippines</option>
                                            <option>Benin</option>
                                            <option>Czech Republic</option>
                                            <option>Russia</option>
                                        </select>
									</div>
                                    <div class="col-md-6">
										<label for="input18" class="form-label">Start Date <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start date" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">End Date <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="endDate" name="endDate" placeholder="Start date" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
                                    <div class="col-md-6">
										<label for="input17" class="form-label">Duration <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" id="duration" name="duration" placeholder="Duration">
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-timer"></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input16" class="form-label">Charge <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="charge" name="charge" placeholder="Total amount" required>
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input17" class="form-label">Initial Payment <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="email" class="form-control" id="iniPay" name="iniPay" placeholder="Initial Payment" >
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input19" class="form-label">Project Status <span class="text-danger">*</span></label>
										<select id="proStatus" name="proStatus" class="form-select" required>
											<option selected>Choose...</option>
											<option value="New">New</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Old">Old</option>
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

