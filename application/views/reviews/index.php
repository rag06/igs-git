<?php $this->load->view('common/header.php');?>
	 <div class="container">
         
        <div style="margin: 4%;">
         <div class="row">
			<h1>Reviews </h1>
			
			
			<?php if(!isset($this->session->userdata['front_logged_in']) ||empty($this->session->userdata['front_logged_in']['front_name'])){?>
			<a href="<?php echo base_url();?>login/login" class="btn btn-primary pull-right"> Login to Post a Review</a>
			<?php }else{?>
			<button  class="btn btn-primary pull-right" onclick="postreview()"> Post a Review</button>
			<?php }?>
		 </div>


            <div class="row">
                <div class="col-md-12">
                    <div style="padding-left: 2%; padding-right: 2%;">
							<br/>
							<br/>
							<div class="row">
								<div class="col-md-12">
									<section class="comment-list">
									  <!-- First Comment -->
									  <?php foreach($reviews['result'] as $revrow) {  ?>
									  <article class="row">
										<div class="col-md-12 col-sm-12">
										  <div class="panel panel-default arrow left">
											<div class="panel-body">
											  <header class="text-left">
												<div class="comment-user"><i class="fa fa-user"></i> <?php echo $revrow->cust_FName .' '.$revrow->cust_LName ;?></div>
												<time class="comment-date" datetime=" <?php echo $revrow->feedback_timeStamp ;?>"><i class="fa fa-clock-o"></i>  <?php echo $revrow->feedback_timeStamp ;?></time>
											  </header>
											  <div class="comment-post">
												<p> <?php echo $revrow->feedback_Text ;?>
												</p>
											  </div>
											</div>
										  </div>
										</div>
									  </article>
									  <?php } ?>
									</section>
								</div>
							  </div>
                    </div>
                </div>
                <!-- End .col-md-6 -->
            </div>
        </div>
    </div>
<?php $this->load->view('common/footer.php');?>
 <div class="modal fade " id="review" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Post a Reviews</h4>
                  </div>
                  <div class="modal-body">
					<form action="<?php echo base_url() ;?>reviews/reviews/addFeedback" method="post">
							<div class="form-group">
							  <label for="text">Feedback Text</label>
							  <textarea class="form-control" id="text" name="text" placeholder="Enter  Text" rows="3"></textarea>
							</div>
							
							<input type="submit" class="btn btn-primary" value="Submit">
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
					
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
			<script>
				function postreview(){
					$('#review').modal('show');
				}
			</script>