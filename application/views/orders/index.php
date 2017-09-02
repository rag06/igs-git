<?php $this->load->view('common/header.php');?>
<div class="container">
         
        <div style="margin: 4%;">
         <div class="row"><h1>My Orders</h1></div>


            <div class="row">
                <div class="col-md-12">
                    <div style="padding-left: 2%; padding-right: 2%;">
							 <div class="row">
                            <div class="col-md-12">
							<br/>
                                <div class="panel-group" role="tablist" aria-multiselectable="true">
								
							<?php $i=1; foreach($orders['result'] as $orderrow) { ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading<?php echo $i;?>">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#collapse<?php echo $i;?>" aria-expanded="false" aria-controls="collapse<?php echo $i;?>"
                                                    class="collapsed">Order ID : <?php echo 'IGS-WEB-'.$orderrow->order_ID;?><span style="float:right;"><?php echo date('Y-m-d ',strtotime($orderrow->order_Date));?></span><span style="float:right;margin-right:10px"><?php echo $orderrow->orderStatus_Name;?></span></a>
													
                                            </h4>
                                        </div>
                                        <!-- End .panel-heading -->
                                        <div id="collapse<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i;?>"
                                            aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                               <table class="table table-bordered table-responsive " style="width:100%">
													<tr>
														<td>Name  </td>
														<td><?php echo $orderrow->order_CustName;?></td>
													</tr>
													<tr>
														<td>ContactNo </td>
														<td><?php echo $orderrow->order_ContactNo;?></td>
													</tr>
													<tr>
														<td>Amount </td>
														<td>$ <?php echo $orderrow->order_Amount;?></td>
													</tr>
													<tr>
														<td>Address </td>
														<td><?php echo $orderrow->order_Address;?></td>
													</tr>
													<tr>
														<td>City </td>
														<td><?php echo $orderrow->order_City;?></td>
													</tr>
													<tr>
														<td>State </td>
														<td><?php echo $orderrow->order_State;?></td>
													</tr>
													<tr>
														<td>Country </td>
														<td><?php echo $orderrow->order_Country;?></td>
													</tr>
													<tr>
														<td>Pincode </td>
														<td><?php echo $orderrow->order_Pincode;?></td>
													</tr>
													<tr>
														<td>Name on Card </td>
														<td><?php echo $orderrow->order_CardName?></td>
													</tr>
													<tr>
														<td>Card Number </td>
														<td><?php echo $orderrow->order_CardNumber?></td>
													</tr>
													<tr>
														<td>Expiry Month </td>
														<td><?php echo $orderrow->order_CardMonth?></td>
													</tr>
													<tr>
														<td>Expiry Year </td>
														<td><?php echo $orderrow->order_CardYear?></td>
													</tr>
													<tr>
														<td>CVV  </td>
														<td><?php echo $orderrow->order_CVV?></td>
													</tr>
											   </table>
											   	<table class="table table-striped table-bordered table-responsive img-responsive table-hover" cellspacing="0" rules="all" border="1" style="border-collapse:collapse;width: 100%">
												<tr>
													<th scope="col" style="width:5%;">Sr. No.</th><th scope="col" style="width:30%;">Product Name</th><th scope="col" style="width:10%;">Packing</th><th scope="col" style="width:10%;">Strength</th><th scope="col" style="width:10%;">Purchase Quantity</th><th scope="col" style="width:10%;">Price</th><th scope="col" style="width:10%;">Sub Total</th><th scope="col" style="width:10%;">Status</th>
												</tr>
												<?php foreach($orderitems['result'] as $itemsrow){ 
														if($itemsrow->odetail_orderID == $orderrow->order_ID){
														$i++;?>
													<tr>
														<td><?php echo $i;?></td>
														<td><?php echo $itemsrow->odetail_PName;?></td>
														<td><?php echo $itemsrow->odetail_Packing;?></td>
														<td><?php echo $itemsrow->odetail_Strength;?></td>
														<td><?php echo $itemsrow->odetail_Qauntity;?></td>
														<td>$ <?php echo $itemsrow->odetail_Price;?></td>
														<td>$ <?php echo ( $itemsrow->odetail_Qauntity * $itemsrow->odetail_Price);?></td>
														<td><?php if($itemsrow->odetail_Delivered) echo 'Delivered'; else echo 'arriving soon';?></td>
													</tr>
														
													<?php }}?>
											   </table>
                                            </div>
                                            <!-- End .panel-body -->
                                        </div>
                                        <!-- End .panel-collapse -->
                                    </div>
                                    <!-- End .panel -->
							<?php $i++;} ?>
                                </div>
                            </div>
                            <!-- End .col-md-6 -->
                        </div>

                    </div>
                </div>
                <!-- End .col-md-6 -->
            </div>
        </div>
    </div>
	    <div class="mb70">
        </div>
        <!-- margin -->
<?php $this->load->view('common/footer.php');?>