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
            Feedbacks
            <small>Manage your Feedbacks</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="#">Feedbacks</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
				<div class="col-md-12">
					
					 <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Feedbacks List</h3>
						</div><!-- /.box-header -->
						  <div class="box-body">
							<table id="subcriberList" class="table table-bordered table-hover">
								<thead>
								<tr>
								  <th style="width: 10px">#</th>
								  <th>Name</th>
								  <th>Text</th>
								  <th>Status</th>
								  <th>Actions</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								$i=1;
									foreach($result as $row){
										?>
								<tr>
								  <td><?php echo $i;?>.</td>
								  <td><?php echo $row->cust_FName.' '.$row->cust_LName;?></td>
								  <td><?php echo $row->feedback_Text;?></td>
								  <td>
									<?php if($row->feedback_Status==1){
												echo'<span class="badge bg-green"> Active</span>';
											}else{
													echo'<span class="badge bg-warning">InActive</span>';
											}
										?>
									
								  </td>
								  <td>
									<button class="btn  btn-info btn-sm" onclick="editFeedback(<?php echo $row->feedback_ID;?>)">Edit</button>
									<button onclick="deleteFeedback(<?php echo $row->feedback_ID;?>)" class="btn  btn-danger btn-sm">Delete</button>
								  </td>
								</tr>
									<?php $i++;}?>
								</tbody>
								
							  </table>
							  
						  </div><!-- /.box-body -->
					</div><!--box end-->
			</div>
            <div class="modal fade modal-danger" id="deleteFeedback" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are You Sure You Want to Delete ??</p>
					<form action="<?php echo base_url() ;?>/admin/feedback/feedback/deleteFeedback" method="post">
						<input type="hidden" name="feedbackId" id="feedbackId"/>
						<input type="submit" class="btn btn-outline" value="Yes">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
			
            <div class="modal fade " id="editFeedback" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Feedback</h4>
                  </div>
                  <div class="modal-body">
					<form action="<?php echo base_url() ;?>/admin/feedback/feedback/updateFeedback" method="post">
						<input type="hidden" name="editFeedbackId" id="editFeedbackId"/>
							<div class="form-group">
							  <label for="editText">Feedback Text</label>
							  <textarea class="form-control" id="editText" name="editText" placeholder="Enter Feedback Text" rows="3"></textarea>
							</div>
							
							<div class="form-group">
							 <label for="editStatus"> Status</label>
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
		function deleteFeedback( id){
			$('#feedbackId').val(id);
			$("#deleteFeedback").modal();
			
		}
		function editFeedback(id){
			
			$.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>admin/feedback/feedback/getFeedback', 
				 data: {feedbackId:id},
				 dataType: "text",  
				 cache:false,
				 success: 
					  function(data){
					  try{
							var obj = JSON.parse(data);
							console.log(obj);  //as a debugging message.
							$('#editFeedbackId').val(id);
							$('#editText').val(obj[0]['feedback_Text']);
							$('#editStatus').val(obj[0]['feedback_Status']);
							$('#editFeedback').modal();
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