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
            Edit Product
            <small>Manage Your Products</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo base_url() ;?>/admin/products/products">Products</a></li>
            <li class="active"><a href="#">Edit Product</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Edit Product : <?php echo $result[0]['product_Name'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<form method="post" action="<?php echo base_url() ;?>/admin/products/products/updateProduct">
								<input type="hidden" name="pId" value="<?php echo $result[0]['product_ID'];?>"/>
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
								  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product name" value="<?php echo $result[0]['product_Name'];?>" required>
								</div>
								<div class="form-group">
								  <label for="brand">Brand Name</label>
								  <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand Name" value="<?php echo $result[0]['product_BrandName'];?>" required>
								</div>
								<div class="form-group">
								  <label for="strength">Product Strength</label>
								  <input type="text" class="form-control" id="strength" name="strength" placeholder="Enter Strength" value="<?php echo $result[0]['product_Strength'];?>" required>
								</div>
								<div class="form-group">
								  <label for="price">Product Unit Price</label>
								  <input type="text" class="form-control" id="price" name="price" placeholder="Enter Unit Price" value="<?php echo $result[0]['product_unitPrice'];?>" required>
								</div>
								<div class="form-group">
								  <label for="title">Product Category</label>
								   <select class="form-control" name="category" id="category" required>
									<?php foreach($category['result'] as $row){
												if($result[0]['product_SubCtg']==$row->pSCtg_ID)
												echo'<option value="'.$row->pSCtg_ID.'" selected> '.$row->pCtg_Name.'->'.$row->pSCtg_Name.'</option>';
												else
												echo'<option value="'.$row->pSCtg_ID.'"> '.$row->pCtg_Name.'->'.$row->pSCtg_Name.'</option>';
									}?>
								  </select>
								</div>
								<div class="form-group">
								  <label for="images">Product Image</label>
								  <input type="text" class="form-control" id="images" name="images" placeholder="Enter Product Image"  value="<?php echo $result[0]['product_Image'];?>"required>
								  	<input type="button" value="Browse Server" onclick="BrowseServer( 'images' );" />
								</div>
								<div class="form-group">
								 <label for="status"> Status</label>
								  <select class="form-control" name="status" id="status">
									<?php if($result[0]['product_Status']==1){
												echo'<option value="0">InActive</option>
													<option value="1" selected>Active</option>';
											}
											else{
												echo'<option value="0" selected>InActive</option>
													<option value="1" >Active</option>';
											}
									?>
								  </select>
								</div>
								<div class="form-group">
								 <label for="feature"> Product IsFeatured</label>
								  <select class="form-control" name="feature" id="feature">
									<?php if($result[0]['product_Featured']==1){
												echo'<option value="0">Not Featured</option>
													<option value="1" selected>Featured</option>';
											}
											else{
												echo'<option value="0" selected>Not Featured</option>
													<option value="1" >Featured</option>';
											}
									?>
								  </select>
								</div>
								
								<div class="form-group">
								  <label for="description">Description</label>
								  <textarea class="form-control" id="description" name="description" ><?php echo $result[0]['product_Description'];?></textarea>
								</div>
								<div class="form-group">
								  <label for="benefits"> Benefits</label>
								  <textarea class="form-control" id="benefits" name="benefits" ><?php echo $result[0]['product_Benefits'];?></textarea>
								</div>
								<div class="form-group">
								  <label for="working"> Working</label>
								  <textarea class="form-control" id="working" name="working" ><?php echo $result[0]['product_Working'];?></textarea>
								</div>
								<div class="form-group">
								  <label for="dosage"> Dosage</label>
								  <textarea class="form-control" id="dosage" name="dosage" ><?php echo $result[0]['product_Dosage'];?></textarea>
								</div>
								<div class="form-group">
								  <label for="precaution"> Precaution</label>
								  <textarea class="form-control" id="precaution" name="precaution" ><?php echo $result[0]['product_Precaution'];?></textarea>
								</div>
								<div class="form-group">
								  <label for="sideEffects"> SideEffects</label>
								  <textarea class="form-control" id="sideEffects" name="sideEffects" ><?php echo $result[0]['product_SideEffects'];?></textarea>
								</div>
								<div class="form-group">
								  <label for="warnings"> Warnings</label>
								  <textarea class="form-control" id="warnings" name="warnings" ><?php echo $result[0]['product_Warnings'];?></textarea>
								</div>
							
							
								<a href="<?php echo base_url() ;?>/admin/products/products" class="btn btn-success btn-sm">Cancel</a>
								<button type="submit" class="btn btn-primary pull-right">Save Changes </button>
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