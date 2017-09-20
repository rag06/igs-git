<?php $this->load->view('common/header.php');?>
	 <div class="container">
            <h1>
                CheckOut</h1>
           
        </div>
    
        <div class="container">
            <div>
	<table class="table table-striped table-bordered table-responsive img-responsive table-hover" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridViewCart" style="border-collapse:collapse;width: 100%">
		<tr>
			<th scope="col" style="width:5%;">Sr. No.</th><th scope="col" style="width:30%;">Product Name</th><th scope="col" style="width:10%;">Packing</th><th scope="col" style="width:10%;">Strength</th><th scope="col" style="width:10%;">Purchase Quantity</th><th scope="col" style="width:10%;">Price</th><th scope="col" style="width:10%;">Sub Total</th><th scope="col" style="width:10%;"></th>
		</tr>
		<?php 
				$cart = $this->cart->contents();
				if(sizeOf($cart)<=0){
		?>
		<tr>
			<td colspan="8">Your Cart is Empty</td>
		
		</tr>
				<?php }else{$i=0;
				foreach($cart as $cartrow){ $i++;?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $cartrow['name'];?></td>
					<td><?php echo $cartrow['options']['pkg_Qauntity'];?> PILLS</td>
					<td><?php echo $cartrow['options']['pkg_Strength'];?></td>
					<td><?php echo $cartrow['qty'];?></td>
					<td>$ <?php echo $cartrow['price'];?></td>
					<td>$ <?php echo ($cartrow['qty']*$cartrow['price']);?></td>
					<td></td>
		</tr>
					
				<?php }}?>
	</table>
</div>
        </div>
      
        <div class="mb10">
        </div>
        <!-- margin -->
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    
                    <!-- End .shipping-container -->
                </div>
                <!-- End .col-md-7 -->
                <div class="col-md-5">
                    <table class="table table-bordered total-table">
                        <tbody>
                            <tr>
                                <td>
                                    Subtotal:
                                </td>
                                <td>
                                    $ 
                                    <span ><?php echo $this->cart->total();?></span>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                 
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
        <div class="mb70">
        </div>
        <!-- margin -->
		
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <form class="" method="POST" action="<?php echo base_url();?>shopping/checkout/order">
				<div class="col-md-12">
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
					<fieldset >    	
						<legend>Personal and Shipping Info</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>
                                        First Name</label>
                                    <input name="firstname" type="text" id="firstname" class="form-control" placeholder="Your Name" title="Your First Name" value="<?php echo $customer[0]['cust_FName'];?>" required/>
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <!-- End .col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="lastname" type="text" id="lastname" class="form-control" placeholder="Your Lastname" title="Your Last Name"  value="<?php echo $customer[0]['cust_LName'];?>" required />
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
                                    <input name="email" id="email" type="email" class="form-control" placeholder="Email" title="Email ID"  value="<?php echo $customer[0]['cust_Email'];?>" readonly/>
                                </div>
                            </div>
							
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label>
                                        Mobile Phone</label>
                                    <input name="number" type="text" id="number" class="form-control" placeholder="Mobile Phone" title="Mobile No"  value="<?php echo $customer[0]['cust_Number'];?>"  required/>
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <!-- End .col-sm-6 -->
                        </div>
                        <!-- End .row -->
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="area" type="text" id="area" class="form-control" placeholder="Address" title="Address"  value="<?php echo $customer[0]['cust_Address'];?>" />
                                </div>
                                <!-- End .from-group -->
                            </div>
                            <!-- End .col-sm-6 -->
                        </div>

                        <div>
	
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> City</label>
                                            <input name="city" type="text" id="city" class="form-control" placeholder="City" title="City"  value="" />
                                          
                                        </div>
                                        <!-- End .from-group -->
                                    </div>
                                   
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Pin /Zip Code</label>
                                            <input name="pincode" type="text" id="pincode" class="form-control" placeholder="pincode" title="pincode"  value="<?php echo $customer[0]['cust_Pincode'];?>"  required />
                                        </div>
                                        <!-- End .from-group -->
                                    </div>
                                </div>
	
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Country</label>
											<select name="country" id="country" class="form-control">
												<option value="">Select</option>
												<?php foreach($country['result'] as $countryrow){
													if(strcmp($countryrow->country_Name,$customer[0]['cust_Country'])==0)
														echo '<option value="'.$countryrow->country_Name.'" selected>'.$countryrow->country_Name.'</option>';
													else{
														echo '<option value="'.$countryrow->country_Name.'">'.$countryrow->country_Name.'</option>';
													}
													
												}?>

											</select>
                                          
                                        </div>
                                        <!-- End .from-group -->
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>State / Province </label>
											
                                            <input name="state" type="text" id="state" class="form-control" placeholder="State" title="State"  value="<?php echo $customer[0]['cust_State'];?>" />
                                        </div>
                                        <!-- End .from-group -->
                                    </div>
                                </div>
                            
							</div>

						</fieldset>
						
                    </div>		
					<div class="col-md-5">
						<fieldset >    	
							<legend>Payment Option</legend>
							<div class="">
							<div class="form-group">
										<label>Payment Type</label>
										<select name="paymentType" id="paymentType" class="form-control" required>
											<option value="Visa/Master/Amex">Visa/Master/Amex</option>
											<option value="Western Union/Money gram">Western Union/Money gram</option>
										</select>
									</div>
								<div class="paymentForm" id="debitForm" style="">
									<div class="form-group">
										<label>
											Name on Credit Card</label>
										<input name="cardname" type="text" id="cardname" class="form-control" placeholder="Your Name on Credit Card"  />
									</div>
									<!-- End .from-group -->
									<div class="form-group">
										<label>
											Card Number</label>
										<input name="cardno" type="text" id="cardno" class="form-control" placeholder="Your Card Number"  />
									</div>
									<div class="form-group">
										
												<label>Expiry Date</label>
									</div>
									<!-- End .from-group -->
									<div class="row">
									
										<div class="col-sm-6">
											<div class="form-group">
												<label>Month</label>
												<select name="cardmonth"  id="cardmonth" class="form-control" >
												<?php 
													$months = array(
														'January',
														'February',
														'March',
														'April',
														'May',
														'June',
														'July ',
														'August',
														'September',
														'October',
														'November',
														'December',
													);
													foreach($months as $key=>$mon)
													{
														echo'<option value="'.$mon.'">'.$mon.' ( '.($key+1).' )</option>';
													}
												?>
												</select>
											</div>
											<!-- End .from-group -->
										</div>
										<!-- End .col-sm-6 -->
										<div class="col-sm-6">
											<div class="form-group">
												<label>Year</label>
												<select name="cardyear" id="cardyear" class="form-control"  >
												<?php $years_now = date("Y");
												 foreach (range($years_now, ($years_now+50)) as $years) {       
													echo '<option value="'.$years.'">'.$years.'</option>';          
												}  
												?>
												</select>
											</div>
											<!-- End .from-group -->
										</div>
									</div>
									<div class="row">
									
										<div class="col-sm-6">
											<div class="form-group">
												<label>CVV</label>
												<input name="cardcvv" type="text" id="cardcvv" class="form-control" placeholder="Enter CVV"  />
											</div>
											<!-- End .from-group -->
										</div>
										<!-- End .col-sm-6 -->
									</div>
								
								</div>
								<div class="paymentForm" id="westernForm" style="display:none;">
									<p><strong>Details :&nbsp;</strong></p>

									<p><strong>Name of the Receiver:</strong> Varun Sonawane&nbsp;</p>

									<p><strong>City:</strong> Mumbai</p>

									<p><strong>Country:</strong> India.</p>
									<p>Visit near by Local Western Union outlet or Money Gram outlet or visit <a href="http://www.westernunion.com" target="_blank">www.westernunion.com</a> to make payment online</p>
								</div>
							</div>
						</fieldset>
					
					</div>
				</div>
                        <!-- End .row -->
                        <div class="form-group">
                            <input type="submit"  value="Pay $ <?php echo $this->cart->total();?>" class="btn btn-success pull-right" />
                        </div>
                        <!-- End .from-group -->
					</form>
								
                </div>
              
            </div>
            <!-- End .row -->
        </div>
<?php $this->load->view('common/footer.php');?>
<script>
$(document).ready(function(){
	$('#paymentType').change(function(){
		$('.paymentForm').hide();
	if($(this).val() == 'Visa/Master/Amex')	{
		$('#debitForm').show();
	}
	else{
		$('#westernForm').show();
	}
});
});

</script>