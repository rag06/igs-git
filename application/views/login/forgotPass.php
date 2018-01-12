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
         
        <div style="margin: 2%;">
         <div class="row">
                        <div class="col-sm-6 ">
                            <h2 class="mb30">Existing user login here</h2>
								<form method="post" action="<?php echo base_url();?>login/login/sendPassword">
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
                               
                                    <div class="form-group">
                                        <label>Email Id</label>
                                        <input name="email" type="text" id="email" class="form-control" placeholder="Email ID" required />
                                    </div><!-- End .from-group -->
 
                                 
									<input type="submit" value="Send Mail"  class="btn btn-success" />  
                           </form>
                                 
                           
                                
                        </div><!-- End .col-sm-6 -->

                        <div class="clearfix mb40 visible-xs"></div><!--margin -->

                        <div class="col-sm-6 ">
                            <h2 class="mb30">Register</h2>
                            
                            <p align="justify">By registering,you will be able to access customer utilities,such as order tracking , convenient refills of past orders,your order history & more.To register, simply fill in the fields to the right & click the submit button at the page .you will be registered & able to place onlines orders instantly</p>
                             
                            <div class="mb10"></div><!-- margin -->

                            <a href="<?php echo base_url();?>login/login/register" class="btn btn-primary min-width">Register Now</a>
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->
        </div>
    </div>
<?php $this->load->view('common/footer.php');?>