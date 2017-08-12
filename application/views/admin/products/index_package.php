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
            Products Packages
            <small>Manage Your Products</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Products Packages</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Products Packages List</h3>
						   <a href="<?php echo base_url() ;?>admin/products/Package/addInfo/<?php echo  $product[0]['product_ID'];?>" class="btn btn-sm btn-primary pull-right">Add Packages to <?php echo $product[0]['product_Name'];?>  </a>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="webpagesList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Quantity</th>
								  <th> Price</th>
								  <th> unit Price</th>
								  <th> Strength</th>
								  <th> Ship Info</th>
								  <th>Actions</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								$i=1;
									foreach($result['result'] as $row){
										?>
									<tr>
									  <td><?php echo $i;?>.</td>
									  <td><?php echo $row->pkg_Qauntity;?></td>
									  <td><?php echo $row->pkg_Price;?></td>
									  <td><?php echo $row->pkg_UnitPrice;?></td>
									  <td><?php echo $row->pkg_Strength;?></td>
									  <td><?php echo $row->pkg_ShipInfo;?></td>
									  <td>
										<a href="<?php echo base_url() ;?>admin/products/package/editInfo/<?php echo $row->pkg_ID;?>" class="btn  btn-info btn-sm" >Edit</a>
										
										<button onclick="deleteInfo(<?php echo $row->pkg_ID;?>)" class="btn  btn-danger btn-sm">Delete</button>
									  </td>
									</tr>
										<?php $i++;}?>
								</tbody>
								
							  </table>
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		 <div class="modal fade modal-danger" id="deleteBlog" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
					<form action="<?php echo base_url() ;?>/admin/products/package/deleteInfo" method="post">
                    <p>Are You Sure You Want to Delete ??</p>
						<input type="hidden" name="pId" id="pId"/>
						<input type="submit" class="btn btn-outline" value="Yes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
     <?php $this->load->view('admin/layout/footer.php');?>
	 
	<script>
		function deleteInfo(id){
			$('#pId').val(id);
			$("#deleteBlog").modal();
			
		}
	</script>