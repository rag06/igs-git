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
            Add  Customers
            <small>Create Your  Customer</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/customers/customers/index">Manage  Customers</a></li>
            <li class="active"><a href="#">Add Customer</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add New  Customer :</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/customers/customers/insertCustomer">
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
								  <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter  First Name" required>
								</div>
								<div class="form-group col-md-6">
								  <label for="lname">Last Name</label>
								  <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" >
								</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
								  <label for="email">Email</label>
								  <input type="email" class="form-control" id="email" name="email" placeholder="Enter  Email ID" required>
								</div>
								<div class="form-group  col-md-6">
								  <label for="password">Password</label>
								  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
								</div>
								</div>
								
								<div class="row">
								<div class="form-group col-md-6">
								  <label for="addr">Address</label>
								  <input type="text" class="form-control" id="addr" name="addr" placeholder="Enter Address" >
								</div>
								<div class="form-group col-md-6">
								  <label for="country">Country</label>
								  <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" >
								</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
								  <label for="state">State</label>
								  <input type="text" class="form-control" id="state" name="state" placeholder="Enter  State" >
								</div>
								<div class="form-group col-md-6">
								  <label for="pincode">Pincode</label>
								  <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" >
								</div>
								</div>
								
								<div class="row">
								<div class="form-group col-md-6">
								 <label for="gender">Gender</label>
								  <select class="form-control" name="gender" id="gender">
									<?php
												echo'<option value="0">Female</option>
													<option value="1" selected >Male</option>';
									?>
								  </select>
								</div>
								<div class="form-group  col-md-6">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												echo'<option value="0">InActive</option>
													<option value="1" >Active</option>';
									?>
								  </select>
								</div>
								
								</div>
							
								<a href="<?php echo base_url() ;?>/admin/customers/customers" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Add Customer </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>