<?php $this->load->view('admin/layout/header.php');?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
	<?php $this->load->view('admin/layout/mainHeader.php');?>
	<?php $this->load->view('admin/layout/sideBar.php');?>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Orders
            <small>Manage Your Orders</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/orders/orders">Orders</a></li>
            <li class="active"><a href="#">Edit Orders</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Orders :</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/orders/orders/updateOrder">
								<input type="hidden" name="oId" value="<?php echo $result[0]['order_ID'];?>"/>
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="amount">Amount</label>
								  <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $result[0]['order_Amount'];?>" required>
								</div>
								<div class="form-group">
								  <label for="title">Order Status</label>
								   <select class="form-control" name="status" id="status">
									<?php foreach($orders['result'] as $row){
												if($result[0]['order_Status']==$row->orderStatus_ID)
												echo'<option value="'.$row->orderStatus_ID.'" selected> '.$row->orderStatus_Name.'</option>';
												else
												echo'<option value="'.$row->orderStatus_ID.'"> '.$row->orderStatus_Name.'</option>';
									}?>
								  </select>
								</div>
							
								<div class="form-group">
								  <label for="date">Date</label>
								  <input type="text" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d ',strtotime($result[0]['order_Date']));?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="number">Contact Number</label>
								  <input type="text" class="form-control" id="number" name="ename" value="<?php echo $result[0]['order_ContactNo'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="ename">Customer Email</label>
								  <input type="text" class="form-control" id="ename" name="ename" value="<?php echo $result[0]['cust_Email'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="name">Customer</label>
								  <input type="text" class="form-control" id="name" name="name" value="<?php echo $result[0]['order_CustName'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="addr">Address</label>
								  <input type="text" class="form-control" id="addr" name="addr" value="<?php echo $result[0]['order_Address'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="pincode">Pincode</label>
								  <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $result[0]['order_Pincode'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="city">City</label>
								  <input type="text" class="form-control" id="city" name="city" value="<?php echo $result[0]['order_City'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="state">State</label>
								  <input type="text" class="form-control" id="state" name="state" value="<?php echo $result[0]['order_State'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="country">Country</label>
								  <input type="text" class="form-control" id="country" name="country" value="<?php echo $result[0]['order_State'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="country">PaymentType</label>
								  <input type="text" class="form-control" id="paymentType" name="paymentType" value="<?php echo $result[0]['order_PaymentType'];?>"  readonly>
								</div>
								<?php if( $result[0]['order_PaymentType'] == "Visa/Master/Amex"){?>
								
								<div class="form-group">
								  <label for="country">Name on Card</label>
								  <input type="text" class="form-control" id="cardname" name="cardname" value="<?php echo $result[0]['order_CardName'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="country">Card Number</label>
								  <input type="text" class="form-control" id="cardno" name="cardno" value="<?php echo $result[0]['order_CardNumber'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="country">Expiry Month</label>
								  <input type="text" class="form-control" id="cardmonth" name="cardmonth" value="<?php echo $result[0]['order_CardMonth'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="country">Expiry Year</label>
								  <input type="text" class="form-control" id="cardyear" name="cardyear" value="<?php echo $result[0]['order_CardYear'];?>"  readonly>
								</div>
								<div class="form-group">
								  <label for="country">CVV</label>
								  <input type="text" class="form-control" id="cardcvv" name="cardcvv" value="<?php echo $result[0]['order_CVV'];?>"  readonly>
								</div>
								<?php }?>
								<a href="<?php echo base_url() ;?>/admin/orders/orders" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Save Changes </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>