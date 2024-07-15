<!--Add Project Modal -->

<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="projectModalLabel">Add Payment</h5>
						<button type="button" class="btn-close" id="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
								<form class="row g-3" name="frmAddPayment" id="addPayment" enctype="multipart/form-data">
								<input type="hidden" name="hdnAction" value="addPayment">
								<input type="hidden" name="proId" id="proId">
									<div class="col-md-6">
										<label for="input13" class="form-label">Project Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="proName" id="proName" placeholder="Project Name" required disabled> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-notepad"></i></span>
										</div>
									</div>
                                    <div class="col-md-6">
										<label for="input13" class="form-label">Overall Amount <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="overAmnt" id="overAmnt" placeholder="Overall Amount" required disabled> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input13" class="form-label">Amount Received <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="amntReceived" id="amntReceived" placeholder="Amount Received" required disabled> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input13" class="form-label">Amount Paid <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="balance" id="balance" placeholder="Balance Amount" required> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">Date <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="date" name="date" placeholder="Received date" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									
									<div class="col-md-6">
										<label for="input19" class="form-label">Payment Mode <span class="text-danger">*</span></label>
										<select class="form-select" name="payMode" id="payMode" data-placeholder="Choose anything" required>
											<option selected>Choose....</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Net Banking">Net Banking</option>
                                            <option value="Online Payment">Online Payment</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
									</div>
									
									
                                    
									<div class="col-md-6">
										<label for="input16" class="form-label">Received By <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" id="received" name="received" placeholder="Received By" required>
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></span>
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


<!--Edit Project Modal -->

<div class="modal fade" id="editPaymentModal" tabindex="-1" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="projectModalLabel">Edit Payment</h5>
						<button type="button" class="btn-close" id="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
								<form class="row g-3" name="frmEditPayment" id="editPayment" enctype="multipart/form-data">
								<input type="hidden" name="hdnAction" value="editPayment">
								<input type="hidden" name="editPayId" id="editPayId">
									<div class="col-md-6">
										<label for="input13" class="form-label">Project Name <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="proNameE" id="proNameE" placeholder="Project Name" required disabled> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-notepad"></i></span>
										</div>
									</div>
                                    <div class="col-md-6">
										<label for="input13" class="form-label">Overall Amount <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="overAmntE" id="overAmntE" placeholder="Overall Amount" required disabled> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input13" class="form-label">Amount Received <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="amntReceivedE" id="amntReceivedE" placeholder="Amount Received" required disabled> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input13" class="form-label">Amount Paid <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" name="balanceE" id="balanceE" placeholder="Balance Amount" required> 
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></span>
										</div>
									</div>
									<div class="col-md-6">
										<label for="input18" class="form-label">Date <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="date" class="form-control" id="dateE" name="dateE" placeholder="Received date" required>
											<span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
										</div>
									</div>
									
									<div class="col-md-6">
										<label for="input19" class="form-label">Payment Mode <span class="text-danger">*</span></label>
										<select class="form-select" name="payModeE" id="payModeE" data-placeholder="Choose anything" required>
											<option selected>Choose....</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Net Banking">Net Banking</option>
                                            <option value="Online Payment">Online Payment</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
									</div>
									
									
                                    
									<div class="col-md-6">
										<label for="input16" class="form-label">Received By <span class="text-danger">*</span></label>
										<div class="position-relative input-icon">
											<input type="text" class="form-control" id="receivedE" name="receivedE" placeholder="Received By" required>
											<span class="position-absolute top-50 translate-middle-y"><i class="lni lni-rupee"></i></span>
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