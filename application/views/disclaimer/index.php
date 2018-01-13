<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $webpage[0]['Wp_Title'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="	<?php echo $webpage[0]['Wp_Key'];?>" />
<meta name="description" content="	<?php echo $webpage[0]['Wp_Des'];?>" />
<?php $this->load->view('common/common_css.php');?>
</head>
<body>
 <div>
<?php $this->load->view('common/header.php');?>
	 <div class="container">
         
        <div style="margin: 4%;">
         <div class="row"><h1>Disclaimer</h1></div>


            <div class="row">
                <div class="col-md-12">
                    <div style="padding-left: 2%; padding-right: 2%;">
							<?php echo $webpage[0]['Wp_Content'];?>
                    </div>
                </div>
                <!-- End .col-md-6 -->
            </div>
        </div>
    </div>
<?php $this->load->view('common/footer.php');?>