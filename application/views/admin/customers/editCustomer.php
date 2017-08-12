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
            Edit  Customers
            <small>Update Your  Customer</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/customers/customers/index">Manage  Customers</a></li>
            <li class="active"><a href="#">Edit  Customer</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Customer : <?php echo $result[0]['cust_FName'].' '.$result[0]['cust_LName'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/customers/customers/updateCustomer">
								<input type="hidden" name="custId" value="<?php echo$result[0]['cust_Id'];?>" />
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="row">
								<div class="form-group col-md-6">
								  <label for="fname">First Name</label>
								  <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter  First Name" value="<?php echo $result[0]['cust_FName']; ?>" required>
								</div>
								<div class="form-group col-md-6">
								  <label for="lname">Last Name</label>
								  <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="<?php echo $result[0]['cust_LName']; ?>">
								</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
								  <label for="email">Email</label>
								  <input type="email" class="form-control" id="email" name="email" placeholder="Enter  Email ID" value="<?php echo $result[0]['cust_Email']; ?>" required readonly>
								</div>
								<div class="form-group  col-md-6">
								  <label for="password">Password</label>
								  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?php echo $result[0]['cust_Password']; ?>" required>
								</div>
								</div>
								
								<div class="row">
								<div class="form-group col-md-6">
								  <label for="addr">Address</label>
								  <input type="text" class="form-control" id="addr" name="addr" placeholder="Enter Address" value="<?php echo $result[0]['cust_Address']; ?>" >
								</div>
								<div class="form-group col-md-6">
								  <label for="country">Country</label>
								  <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="<?php echo $result[0]['cust_Country']; ?>">
								</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
								  <label for="state">State</label>
								  <input type="text" class="form-control" id="state" name="state" placeholder="Enter  State" value="<?php echo $result[0]['cust_State']; ?>">
								</div>
								<div class="form-group col-md-6">
								  <label for="pincode">Pincode</label>
								  <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" value="<?php echo $result[0]['cust_Pincode']; ?>">
								</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6" >
								 <label for="gender"> Gender </label>
								  <select class="form-control" name="gender" id="gender">
									<?php if($result[0]['cust_Gender']==1){
												echo'<option value="0">Female</option>
													<option value="1" selected>Male</option>';}
											else{
												echo'<option value="0" selected>Female</option>
													<option value="1">Male</option>';
											}?>
								  </select>
								</div>
								<div class="form-group col-md-6">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php if($result[0]['cust_Status']==1){
												echo'<option value="0">InActive</option>
													<option value="1" selected>Active</option>';}
											else{
												echo'<option value="0" selected>InActive</option>
													<option value="1">Active</option>';
											}?>
								  </select>
								</div>
								</div>
							
								<a href="<?php echo base_url() ;?>/admin/customers/customers" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Save Changes </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>