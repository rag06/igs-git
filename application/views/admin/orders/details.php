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
            Orders Item Details
            <small>Manage Your Orders</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Orders</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Orders Item List <?php echo  'IGS-WEB-'.$orders[0]['order_ID'];?></h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="webpagesList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th>Brand</th>
								  <th>Name</th>
								  <th>Quatity</th>
								  <th>Price</th>
								  <th>Strength</th>
								  <th>Actions</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								$i=1;
									foreach($result['result'] as $row){
										?>
									<tr>
									  <td><?php echo $row->odetail_PBrand;?></td>
									  <td><?php echo $row->odetail_PName;?></td>
									  <td><?php echo $row->odetail_Qauntity;?></td>
									  <td><?php echo $row->odetail_Price;?></td>
									  <td><?php echo $row->odetail_Strength;?></td>
									  <td>
										<?php if($row->odetail_Delivered ==0){?>
										<a href="<?php echo base_url() ;?>/admin/orders/orders/itemDelivered/<?php echo $row->odetail_ID;?>" class="btn  btn-success btn-sm" >Mark Deleivered</a>
										<?php }else{?>
										<a href="<?php echo base_url() ;?>/admin/orders/orders/itemUnDelivered/<?php echo $row->odetail_ID;?>" class="btn  btn-warning btn-sm" >Mark as Undeleivered</a>
										<?php }?>
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
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>/admin/blogs/blogs/deleteBlog" method="post">
						<input type="hidden" name="blogId" id="blogId"/>
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