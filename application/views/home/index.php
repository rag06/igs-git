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
<style>
.kb_wrapper {
    max-height: 400px;
}
.kb_caption {
    width: 40%;
    top: 10%;
    text-align: left;
}
</style>
	<div class="banner">
        <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel"
            data-interval="4000" data-pause="hover">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo base_url(); ?>html/web/images/slid6.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_center">
                        <h3 data-animation="animated fadeInLeft">
                            Premature Ejaculation ?</h3>
                        <h4 data-animation="animated fadeInRight">
                            Get Relief from Ejaculation Problem Buy Generic Priligy @$1.69 per pill</h4>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo base_url(); ?>html/web/images/Slide2.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_center">
                        <h3 data-animation="animated zoomInLeft">
                             Get 10% off on Every Order's + Free Express Shipping on Order Above $99
                        </h3>
                        <h4 data-animation="animated zoomInRight">
                           </h4>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo base_url(); ?>html/web/images/HQ.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_center">
                        <h3 data-animation="animated zoomInLeft">
                           Have a Question</h3>
                        <h4 data-animation="animated zoomInRight">
                            Our Pharmacists are Ready to Help !</h4>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo base_url(); ?>html/web/images/Slide4.jpg" alt="" class="img-responsive" />
                    <div class="carousel-caption kb_caption kb_caption_center">
                        <h3 data-animation="animated zoomInLeft">
                            Best Quality Medications</h3>
                        <h4 data-animation="animated zoomInRight">
                            At Low Prices</h4>
                    </div>
                </div>
            </div>
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
                <span class="fa fa-angle-left kb_icons" aria-hidden="true"></span><span class="sr-only">
                    Previous</span> </a><a class="right carousel-control kb_control_right" href="#kb"
                        role="button" data-slide="next"><span class="fa fa-angle-right kb_icons" aria-hidden="true">
                        </span><span class="sr-only">Next</span> </a>
        </div>
        <script src="<?php echo base_url(); ?>html/web/js/custom.js"></script>
    </div>
    <div class="">
            <img src="<?php echo base_url(); ?>html/web/images/3SS.jpg" class="img-responsive" />
    </div>
    <!-- //banner -->
    <!-- welcome -->
    <div class="welcome">
        <div class="container">
            <div class="welcome-info">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class=" nav-tabs" role="tablist">
                    </ul>
                    <div class="clearfix">
                    </div>
                    <h3 class="w3ls-title">
                        Featured Products
                    </h3>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                            <div class="tabcontent-grids clearfix">
                                <div >
                                    <?php
									$i=0;
                                          foreach($products['result'] as $productrow){
														if($productrow->product_Featured  == 1){
												?>
                                                <div class="item col-md-2" style="margin-bottom:25px;">
                                                    <div class="glry-w3agile-grids agileits">
                                                        <div class="new-tag">
                                                            <h6>
                                                                New</h6>
                                                        </div>
                                                        <a href="<?php echo base_url();?>products/details/<?php echo $productrow->product_Slug; ?>">
                                                            
                                                            <img  src="<?php echo $productrow->product_Image; ?>" style="max-height: 220px; max-width: 250px; height: 150px" />
                                                           
                                                        </a>
                                                        <div class="view-caption agileits-w3layouts">
                                                           
                                                                <a href="<?php echo base_url();?>products/details/<?php echo $productrow->product_Slug; ?>">
                                                                    <?php echo $productrow->product_Name; ?> </a>
                                                            <p><span> <?php echo $productrow->product_BrandName; ?></span></p>
                                                            <h5>$ <?php echo $productrow->product_unitPrice; ?></h5>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                
										  <?php } }?>	
                                </div>
                            </div>
                            <div class="tabcontent-grids clearfix">
                                <div align="right">
                                    <a href="<?php echo base_url();?>products" class="btn btn-black">View All Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //welcome -->
    <!-- add-products
    <div class="add-products">
        <div class="container">
            <div class="add-products-row">
                <div class="col-md-4">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>html/web/Herbal/Wheatgrass-Ultra-Juice-B.jpg" class="img-responsive" />
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>html/web/Herbal/Weight-Management-Ultra-Juice-B.jpg" class="img-responsive" />
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>html/web/Herbal/Ashwagandha-coffee-S.jpg" class="img-responsive" />
                    </a>
                </div>
                <div class="clerfix">
                </div>
            </div>
        </div>
    </div>
    <!-- //add-products -->
    <!-- footer-top -->
    <div class="w3agile-ftr-top">
        <div class="container">
            <div class="ftr-toprow">
                <div class="col-md-4 ftr-top-grids">
                    <div class="ftr-top-left">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="ftr-top-right">
                        <h4>
                            FREE DELIVERY</h4>
                        <p>
                            We provided you with best shipment facilities for products. We give you free shipment
                            on bulk order all over the world.</p>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="col-md-4 ftr-top-grids">
                    <div class="ftr-top-left">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="ftr-top-right">
                        <h4>
                            CUSTOMER CARE</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac
                        </p>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="col-md-4 ftr-top-grids">
                    <div class="ftr-top-left">
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    </div>
                    <div class="ftr-top-right">
                        <h4>
                            GOOD QUALITY</h4>
                        <p>
                            All our medicines are manufactured under the guidelines for FDA standards which
                            makes our medications of high standard quality with better result.
                        </p>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('common/footer.php');?>