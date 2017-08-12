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
					<td><?php echo $cartrow['price'];?></td>
					<td><?php echo ($cartrow['qty']*$cartrow['price']);?></td>
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
                                    &#8377;
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
                                            <input name="country" type="text" id="country" class="form-control" placeholder="Country" title="Country"  value="<?php echo $customer[0]['cust_Country'];?>" />
                                          
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
                        <!-- End .row -->
                        <div class="form-group">
                            <input type="submit"  value="Place Order" class="btn btn-success" />
                        </div>
                        <!-- End .from-group -->
                    </div>
					</form>
								
                </div>
              
            </div>
            <!-- End .row -->
        </div>
<?php $this->load->view('common/footer.php');?>