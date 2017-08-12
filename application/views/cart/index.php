<?php $this->load->view('common/header.php');?>
	 <div class="container">
            <h1>
                Cart</h1>
           
        </div>
    
        <div class="container">
            <div>
	<table class="table table-striped table-bordered table-responsive img-responsive table-hover" cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_GridViewCart" style="border-collapse:collapse;width: 100%">
		<tr>
			<th scope="col" style="width:5%;">Sr. No.</th><th scope="col" style="width:30%;">Product Name</th><th scope="col" style="width:10%;">Packing</th><th scope="col" style="width:10%;">Strength</th><th scope="col" style="width:10%;">Purchase Quantity</th><th scope="col" style="width:10%;">Price</th><th scope="col" style="width:10%;">Sub Total</th><th scope="col" style="width:10%;">Remove</th>
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
					<td><a onclick="removeItem('<?php echo $cartrow['rowid'];?>');" class="btn btn-danger btn-xs" href="#"><i class="fa fa-bandcamp" aria-hidden="true"></i> Remove</a></td>
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
                                    <span id="ContentPlaceHolder1_LblSubTotal"><?php echo $this->cart->total();?></span>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <a href="<?php echo base_url();?>products/products" class="btn btn-info">Continue Shopping</a>
					<?php if(sizeOf($cart)>0){?>
                    <a href="<?php echo base_url();?>shopping/checkout" class="btn btn-success">Check Out</a>
					<?php } ?>

                    
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
        <div class="mb70">
        </div>
        <!-- margin -->
<?php $this->load->view('common/footer.php');?>