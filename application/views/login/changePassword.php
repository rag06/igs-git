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
	 <div class="container" style="margin-top:1%;">
        <div >
            <div class="row" style="margin-bottom:1%;">
                <h3>
                    Change Password</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
				<?php
									
										echo '<div class="text-danger">'.validation_errors().'</div>';
										if(isset($error_message))
										{
											echo '<div class="text-danger">'.$error_message.'</div>';
										}
									if(isset($msg))
										{
											echo '<div class="text-success">'.$msg.'</div>';
										}
										?>
					<form method="POST" action="<?php echo base_url();?>login/updatePassword">
						<div class="form-group">
							<input name="password" type="password" id="password" class="form-control" placeholder="Enter New Password" title="Enter New Password" required/>
						</div>
						<div class="form-group">
							<input name="confPass" type="password" id="confPass" class="form-control" placeholder="Re-Enter Password" title="Re-Enter Password" required />
					   
						</div>
						<div class="btn-group">
							<input type="submit" value="Change Password" class="btn btn-success" />                    
						</div>
					</form>
                </div>
                <div class="col-md-8">
                </div>
            </div>


        </div>
    </div>
<?php $this->load->view('common/footer.php');?>