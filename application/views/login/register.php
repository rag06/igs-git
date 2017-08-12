<?php $this->load->view('common/header.php');?>
	 <div class="container">
            
            <h2 class="mb30">
                Register Account
                </h2>
            <div class="row">
                
                <div class="col-md-3 col-md-offset-3"></div>
				<form class="" method="POST" action="<?php echo base_url();?>login/login/registercheck">
				
                    <div class="col-md-7">
					<?php 
								
									echo '<div class="text-danger">'.validation_errors().'</div>';
									if(isset($error_message))
									{
										echo '<div class="text-danger">'.$error_message.'</div>';
									}
									if(isset($contactMsg))
									{
										echo '<div class="text-success">'.$contactMsg.'</div>';
									}
								
								?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>
                                        First Name</label>
                                    <input name="firstname" type="text" id="firstname" class="form-control" placeholder="Your Name" title="Your First Name" required/>
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <!-- End .col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="lastname" type="text" id="lastname" class="form-control" placeholder="Your Lastname" title="Your Last Name" required />
                                </div>
                                <!-- End .from-group -->
                            </div>
                        </div>
                        <!-- End .row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Email</label>
                                    <input name="email" id="email" type="email" class="form-control" placeholder="Email" title="Email ID" required />
                                </div>
                            </div>
							
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>
                                        Mobile Phone</label>
                                    <input name="number" type="text" id="number" class="form-control" placeholder="Mobile Phone" title="Mobile No" required/>
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <!-- End .col-sm-6 -->
                        </div>
                        <!-- End .row -->
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>Gender</label>
										<select name="sex" id="sex" class="form-control">
											<option value="Select">Select</option>
											<option value="1">Male</option>
											<option value="0">Female</option>

										</select>
                                    
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="area" type="text" id="area" class="form-control" placeholder="Address" title="Address" />
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <!-- End .col-sm-6 -->
                        </div>

                        <div>
	
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Country</label>
                                            <input name="country" type="text" id="ContentPlaceHolder1_TxtPin" class="form-control" placeholder="Country" title="Country" />
                                          
                                        </div>
                                        <!-- End .from-group -->
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>State / Province </label>
											
                                            <input name="state" type="text" id="state" class="form-control" placeholder="State" title="State" />
                                        </div>
                                        <!-- End .from-group -->
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Pin /Zip Code</label>
                                            <input name="pincode" type="text" id="pincode" class="form-control" placeholder="pincode" title="pincode" required />
                                        </div>
                                        <!-- End .from-group -->
                                    </div>
                                </div>
                            
</div>
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" id="password" class="form-control" placeholder="Password" title="Password" />
                                    <span id="ContentPlaceHolder1_RequiredFieldValidator9" class="alert alert-danger" style="display:none;">Please Enter Password</span>
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <!-- End .col-sm-6 -->
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input name="password_conf" type="password" id="password_conf" class="form-control" placeholder="Confirm-Password" title="Re-enter Password" />
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <!-- End .col-sm-6 -->
                        </div>
                        <!-- End .row -->
                        <div class="form-group">
                            <input type="submit"  value="Register Now" class="btn btn-success" />
                        </div>
                        <!-- End .from-group -->
                    </div>
					</form>
                    <div class="col-md-offset-2"></div>
                
        </div>
        </div>
<?php $this->load->view('common/footer.php');?>