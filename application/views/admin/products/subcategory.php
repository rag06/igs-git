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
            Product Sub Categories
            <small>Manage your product Sub Categories</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Product Sub Categories</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				<div class="col-md-12">
					 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Add Sub Category</h3>
						</div><!-- /.box-header -->
					 <!-- form start -->
						<form role="form" method="post" action="<?php echo base_url() ;?>/admin/products/products/addProductSubCategory" >
						  <div class="box-body">
						  <?php
								echo "<div class='error_msg'>";
								if (isset($error_message)) {
								echo $error_message;
								}
								echo validation_errors();
								echo "</div>";
								?>
							<div class="col-md-3">
								<div class="form-group">
								  <label for="category">Sub Category Name</label>
								  <input type="text" class="form-control" id="category" name="category" placeholder="Enter category name">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
								 <label for="parentctg">Category</label>
								  <select class="form-control" name="parentctg" id="parentctg">
								  <?php 
								
									foreach($category['result'] as $row){
										?>
									<option value="<?php echo $row->pCtg_ID;?>"><?php echo $row->pCtg_Name;?></option>
									
									<?php $i++;}?>
								  </select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
								 <label for="status">Sub Category Status</label>
								  <select class="form-control" name="status" id="status">
									<option value="0">InActive</option>
									<option value="1">Active</option>
								  </select>
								</div>
							</div>
							<div class="col-md-3"><br/>
								<button type="submit" class="btn btn-primary">Add </button>
							</div>
						  </div><!-- /.box-body -->

						 
						</form>
					</div><!--box end-->
					 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Product Sub Category List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table class="table table-condensed">
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Category Name</th>
								  <th>Status</th>
								  <th>Actions</th>
								</tr>
								<?php 
								$i=1;
									foreach($result['result'] as $row1){
										?>
								<tr>
								  <td><?php echo $i;?>.</td>
								  <td><?php echo $row1->pSCtg_Name;?></td>
								  <td><?php echo $row1->pCtg_Name;?></td>
								  <td>
									<?php if($row1->pSCtg_Status==1){
												echo'<span class="badge bg-green"> Active</span>';
											}else{
													echo'<span class="badge bg-warning">InActive</span>';
											}
										?>
									
								  </td>
								  <td>
									<button class="btn  btn-info btn-sm" onclick="editProductSubCategory(<?php echo $row1->pSCtg_ID;?>)">Edit</button>
									<button onclick="deleteProductSubCategory(<?php echo $row1->pSCtg_ID;?>)" class="btn  btn-danger btn-sm">Delete</button>
								  </td>
								</tr>
									<?php $i++;}?>
								
							  </table>
							  
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</div>
            <div class="modal fade modal-danger" id="deleteCategory" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>/admin/products/products/deleteProductSubCategory/" method="post">
						<input type="hidden" name="categoryId" id="categoryId"/>
						<input type="submit" class="btn btn-outline" value="Yes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
			
            <div class="modal fade " id="editCategory" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Category</h4>
                  </div>
                  <div class="modal-body">
					<form action="<?php echo base_url() ;?>/admin/products/products/updateProductSubCategory" method="post">
						<input type="hidden" name="editCategoryId" id="editCategoryId"/>
							<div class="form-group">
							  <label for="editCategoryName">Sub Category Name</label>
							  <input type="text" class="form-control" id="editCategoryName" name="editCategoryName" placeholder="Enter category name">
							</div>
								<div class="form-group">
								 <label for="editparentctg">Category</label>
								  <select class="form-control" name="editparentctg" id="editparentctg">
								  <?php 
								
									foreach($category['result'] as $row){
										?>
									<option value="<?php echo $row->pCtg_ID;?>"><?php echo $row->pCtg_Name;?></option>
									
									<?php $i++;}?>
								  </select>
								</div>
							<div class="form-group">
							 <label for="editStatus">Sub Category Status</label>
							  <select class="form-control" name="editStatus" id="editStatus">
								<option value="0">InActive</option>
								<option value="1">Active</option>
							  </select>
							</div>
							<input type="submit" class="btn btn-primary" value="Save Changes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	 
     <?php $this->load->view('admin/layout/footer.php');?>
	 <script>
		function deleteProductSubCategory( id){
			$('#categoryId').val(id);
			$("#deleteCategory").modal();
			
		}
		function editProductSubCategory(id){
			
			$.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>admin/products/products/getProductSubCategory', 
				 data: {categoryId:id},
				 dataType: "text",  
				 cache:false,
				 success: 
					  function(data){
					  try{
							var obj = JSON.parse(data);
							console.log(obj);  //as a debugging message.
							$('#editCategoryId').val(id);
							$('#editCategoryName').val(obj[0]['pSCtg_Name']);
							$('#editparentctg').val(obj[0]['pSCtg_Category']);
							$('#editStatus').val(obj[0]['pSCtg_Status']);
							$('#editCategory').modal();
						 }catch(e) {     
							alert('Exception while request..');
						}       
					},
				error: function(){                      
					alert('Error while request..');
				}
						
					  
				  });// you have missed this bracket
		  return false;
		}
	</script>