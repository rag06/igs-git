<?php $this->load->view('common/header.php');?>
	 <div class="container">
         
        <div style="margin: 4%;">
         <div class="row"><h1>All Products</h1></div>


            <div class="row">
                <div class="col-md-12">
					<div class="row">
						
						  <?php foreach($products['result'] as $productrow){ ?>
								<div class="col-md-3">
                                                <div class="item">
                                                    <div class="glry-w3agile-grids agileits">
                                                        <div class="new-tag">
                                                            <h6>
                                                                New</h6>
                                                        </div>
                                                        <a href="<?php echo base_url();?>products/products/details/<?php echo $productrow->product_ID; ?>/<?php echo $productrow->product_Name; ?>">
                                                            
                                                            <img  src="<?php echo $productrow->product_Image; ?>" style="max-height: 220px; max-width: 250px;height: 220px; width: 250px" />
                                                           
                                                        </a>
                                                        <div class="view-caption agileits-w3layouts">
                                                            <h4>
                                                                <a href="<?php echo base_url();?>products/products/details/<?php echo $productrow->product_ID; ?>/<?php echo $productrow->product_Name; ?>">
                                                                    <?php echo $productrow->product_Name; ?> <?php echo $productrow->product_Strength; ?> </a></h4>
                                                            <p><span> <?php echo $productrow->product_BrandName; ?> <?php echo $productrow->product_Strength; ?> </span></p>
                                                            <h5>&#8377;<?php echo $productrow->product_unitPrice; ?></h5>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                
									</div>
										  <?php }?>	
								
					</div>
                </div>
                <!-- End .col-md-6 -->
            </div>
        </div>
    </div>
<?php $this->load->view('common/footer.php');?>