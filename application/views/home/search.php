<?php $this->load->view('common/header.php');?>
	 <div class="container">
         
        <div style="margin: 4%;">
         <div class="row">
                <h1> Search Results</h1>
			</div>


            <div class="row">
                <div class="col-md-12">
                    <div style="padding-left: 2%; padding-right: 2%;">
						<gcse:searchresults-only></gcse:searchresults-only>
                    </div>
                </div>
                <!-- End .col-md-6 -->
            </div>
        </div>
    </div>
<?php $this->load->view('common/footer.php');?>