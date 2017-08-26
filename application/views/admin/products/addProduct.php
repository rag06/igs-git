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
            Add Product
            <small>Create Your Product</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/products/products/index">Manage Product</a></li>
            <li class="active"><a href="#">Add Product</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add New Product :</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/products/products/insertProduct">
								 <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
								<div class="form-group">
								  <label for="name">Product Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product name" required>
								</div>
								<div class="form-group">
								  <label for="brand">Brand Name</label>
								  <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand Name" required>
								</div>
								<div class="form-group">
								  <label for="strength">Product Strength</label>
								  <input type="text" class="form-control" id="strength" name="strength" placeholder="Enter Strength" required>
								</div>
								<div class="form-group">
								  <label for="price">Product Unit Price</label>
								  <input type="text" class="form-control" id="price" name="price" placeholder="Enter Unit Price" required>
								</div>
								<div class="form-group">
								  <label for="title">Product Category</label>
								   <select class="form-control" name="category" id="category" required>
									<?php foreach($result as $row){
												echo'<option value="'.$row->pCtg_ID.'"> '.$row->pCtg_Name.'</option>';
									}?>
								  </select>
								</div>
								<div class="form-group">
								  <label for="images">Product Image</label>
								  <input type="text" class="form-control" id="images" name="images" placeholder="Enter Product Image" required>
								  	<input type="button" value="Browse Server" onclick="BrowseServer( 'images' );" />
								</div>
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php 
												echo'<option value="0">InActive</option>
													<option value="1" selected>Active</option>';?>
								  </select>
								</div>
								<div class="form-group">
								 <label for="feature"> Product IsFeatured</label>
								  <select class="form-control" name="feature" id="feature">
									<?php 
												echo'<option value="0">Not Featured</option>
													<option value="1" >Featured</option>';?>
								  </select>
								</div>
								<div class="form-group">
								  <label for="tagline">Product Tagline</label>
								  <input type="text" class="form-control" id="tagline" name="tagline" placeholder="Enter Product Tagline" required>
								</div>
								
								<div class="form-group">
								  <label for="description">Description</label>
								  <textarea class="form-control" id="description" name="description" ></textarea>
								</div>
								<div class="form-group">
								  <label for="benefits"> Benefits</label>
								  <textarea class="form-control" id="benefits" name="benefits" ></textarea>
								</div>
								<div class="form-group">
								  <label for="working"> Working</label>
								  <textarea class="form-control" id="working" name="working" ></textarea>
								</div>
								<div class="form-group">
								  <label for="dosage"> Dosage</label>
								  <textarea class="form-control" id="dosage" name="dosage" ></textarea>
								</div>
								<div class="form-group">
								  <label for="precaution"> Precaution</label>
								  <textarea class="form-control" id="precaution" name="precaution" ></textarea>
								</div>
								<div class="form-group">
								  <label for="sideEffects"> SideEffects</label>
								  <textarea class="form-control" id="sideEffects" name="sideEffects" ></textarea>
								</div>
								<div class="form-group">
								  <label for="warnings"> Warnings</label>
								  <textarea class="form-control" id="warnings" name="warnings" ></textarea>
								</div>
							
								<a href="<?php echo base_url() ;?>/admin/products/products" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Add Product </button>
							</form>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		
     <?php $this->load->view('admin/layout/footer.php');?>
	 <script>
		
		CKEDITOR.replace('description');
		CKEDITOR.replace('benefits');
		CKEDITOR.replace('working');
		CKEDITOR.replace('dosage');
		CKEDITOR.replace('precaution');
		CKEDITOR.replace('sideEffects');
		CKEDITOR.replace('warnings');
      </script>