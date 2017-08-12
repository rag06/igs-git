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
            Edit Product Package
            <small>Manage Your Products Package</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/products/products">Products</a></li>
            <li class="active"><a href="#">Edit Product packages</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Product Package</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/products/Package/updateInfo">
								<input type="hidden" name="pkgId" value="<?php echo $result[0]['pkg_ID'];?>"/>
								<input type="hidden" name="pid" value="<?php echo $result[0]['pkg_productID'];?>"/>
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="quantity">Product Quantity</label>
								  <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Product Quantity"  value="<?php echo $result[0]['pkg_Qauntity'];?>" required>
								</div>
								<div class="form-group">
								  <label for="price">Price</label>
								  <input type="text" class="form-control" id="price" name="price" placeholder="Enter price"  value="<?php echo $result[0]['pkg_Price'];?>" required>
								</div>
								<div class="form-group">
								  <label for="unitprice">Unit price</label>
								  <input type="text" class="form-control" id="unitprice" name="unitprice" placeholder="Enter unitprice"  value="<?php echo $result[0]['pkg_UnitPrice'];?>" required>
								</div>
								<div class="form-group">
								  <label for="strength">Strength</label>
								  <input type="text" class="form-control" id="strength" name="strength" placeholder="Enter Strength"  value="<?php echo $result[0]['pkg_Strength'];?>" required>
								</div>
								<div class="form-group">
								  <label for="ship">Ship Info</label>
								  <input type="text" class="form-control" id="ship" name="ship" placeholder="Enter ship Info"  value="<?php echo $result[0]['pkg_ShipInfo'];?>" >
								</div>
							
								<a href="<?php echo base_url() ;?>/admin/products/package/index/<?php echo $result[0]['pkg_productID'];?>" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Save Changes </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>