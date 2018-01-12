<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Global Access Pharmacy</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="The Pharma USA" />
<?php $this->load->view('common/common_css.php');?>
</head>
<body>
 <div>
<?php $this->load->view('common/header.php');?>
	 <div class="container">
            <h1>Upload Prescription </h1>
           
        </div>
    <div class="mb70">
        </div>
		  <div class="container">
		<form method="post" action="<?php echo base_url();?>upload/prescription/upload"  enctype="multipart/form-data">
			<?php
									
										echo '<div class="text-danger">'.validation_errors().'</div>';
										if(isset($error_message))
										{
											echo '<div class="text-danger">'.$error_message.'</div>';
										}
									
								?>
                               
                                    <div class="form-group">
                                        <label>Upload File </label>
                                        <input name="pdfupload" type="file" id="pdfupload" class="form-control" placeholder="Upload File" required />
                                    </div><!-- End .from-group -->
 
                                 
									<input type="submit" value="Upload"  class="btn btn-success" />
			</form>
			</div>
    <div class="mb70">
        </div>
		
        <div class="container">
            <div>
	<table class="table table-striped table-bordered table-responsive " cellspacing="0" border="1"  style="border-collapse:collapse;width: 100%">
		<tr>
			<th scope="col" >Sr. No.</th><th scope="col" >UploadLink</th><th scope="col" >Date</th><th scope="col" >Status</th>
		</tr>
		<?php 
				if(sizeOf($uploads)<=0){
		?>
		<tr>
			<td colspan="8">No Uploaded Prescription </td>
		
		</tr>
				<?php }else{$i=0;
				foreach($uploads as $uploadsrow){ $i++;?>
				<tr>
					<td><?php echo $i;?></td>
					<td><a href="<?php echo $uploadsrow['upload_Link'];?>" target="_blank"> View File</a></td>
					<td><?php echo $uploadsrow['upload_Date'];?></td>
					<td><?php if($uploadsrow['upload_Status']==1) echo 'Read'; else{echo 'Unread';}?></td>
		</tr>
					
				<?php }}?>
	</table>
</div>
        </div>
      
        <div class="mb70">
        </div>
        <!-- margin -->
<?php $this->load->view('common/footer.php');?>