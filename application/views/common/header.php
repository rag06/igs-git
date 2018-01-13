
        <div class="header">
            <div class="w3ls-header">
                <!--header-one-->
                <div class="w3ls-header-left">
                    <p>
                        <a href="javascript:void(0)"><i class="fa fa-envelope" aria-hidden="true"></i> support@globalaccesspharmacy.com </a> 
						<span style="font-size:20px;">|</span>
                        <a href="javascript:void(0)"><i class="fa fa-mobile-phone" aria-hidden="true"></i> Toll Free +1 502 209 4459 </a>
                    </p>
                </div>
                <div class="w3ls-header-right">
                    <ul>
                        <li class="dropdown head-dpdn"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span id="LblUser">
							<?php if(!isset($this->session->userdata['front_logged_in']) ||empty($this->session->userdata['front_logged_in']['front_name'])){?>
							My Account
							<?php } else{
								echo 'Hi '.$this->session->userdata['front_logged_in']['front_name'].' ';
							}?>							
							</span><span class="caret"></span></a>
                            <ul class="dropdown-menu">
								<?php if(!isset($this->session->userdata['front_logged_in']) ||empty($this->session->userdata['front_logged_in']['front_name'])){?>
                                <li ><a href="<?php echo base_url();?>login">Login </a></li>
                                <li><a href="<?php echo base_url();?>login/register">Sign Up</a></li>
                                <li><a href="<?php echo base_url();?>shopping/cart">Cart </a></li>  
								<?php } else{ ?>                           
                                <li><a href="<?php echo base_url();?>orders">My Orders</a></li>
                               <li><a href="<?php echo base_url();?>login/changePassword">Change Password</a></li>
                                <li><a href="<?php echo base_url();?>shopping/cart">Cart </a></li>  
                                <li><a href="<?php echo base_url();?>login/logout" id="Logout">Log Out</a></li>
								<?php }?>
                            </ul>
                        </li>
                        <!--<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-percent" aria-hidden="true"></i> Today's Deals<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Cash Back Offers</a></li> 
							<li><a href="#">Product Discounts</a></li>
							<li><a href="#">Special Offers</a></li> 
						</ul> 
					</li>-->
                      <!--  <li class="dropdown head-dpdn"><a href="#" class="dropdown-toggle"><i class="fa fa-mobile-phone"
                            aria-hidden="true"></i>Toll Free +1 502 209 5549</a> </li>
                        <li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
					</li>-->
                    </ul>
                </div>
                <div class="clearfix">
                </div>
            </div>
            <div class="header-two">
                <div class="container">
                    <div class="header-logo">
                        <h1>
                            <a href="<?php echo base_url();?>">
                                <img src="<?php echo base_url(); ?>html/web/images/logo1.png" class="img-responsive" /></a></h1>
                    </div>
                    <div class="header-search">
                            <form class="navbar-form" role="search" name="cse" id="searchbox" action="<?php echo base_url();?>home/searchResults" method="get">
								<div class="input-group">
									<input name="q" id="q" type="search" placeholder="Search for a Product..." title="Search for a Product..." style="width: 290px;" />
									<div class="input-group-btn">
										<button type="submit" id="btnSearch" class="btn btn-default" aria-label="Left Align" >
											<i class="fa fa-search" aria-hidden="true"></i>
										</button>
									</div>
									
								</div>
							</form>
                    </div>
                    <div class="header-cart">
                        <div class="">
                            <a href="<?php echo base_url();?>shopping/cart" class="btn btn-primary btn-circle btn-xl btn-circle"><i class="fa fa-cart-arrow-down"
                                aria-hidden="true"></i>
                                <span id="LblCartCount"><?php $cart = $this->cart->contents(); echo sizeOf($cart);?></span>
                            </a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
            <!-- //header-two -->
            <div class="header-three">
                <div class="container">
                    <div class="menu">
                        <div class="cd-dropdown-wrapper">
                            <a class="cd-dropdown-trigger" href="#0">All Categories</a>
                            <nav class="cd-dropdown"> 
							<a href="#0" class="cd-close">Close</a>
							<ul class="cd-dropdown-content"> 
								 <?php 
									$i=0;
									foreach($category as $ctgrow){
										 $i++;
										 $tempproduct=[];
														foreach($products['result'] as $tempproductrow){
															if($tempproductrow->product_Ctg  == $ctgrow->pCtg_ID ){
																array_push($tempproduct,$tempproductrow);
															}
														}
								 ?>
								<li >
								<a href="javascript:void(0);"  class="menuDemocollapse" data-toggle="collapse" data-target="#demo<?php echo $i;?>">
										<?php echo $ctgrow->pCtg_Name;?> (<?php echo count($tempproduct)?>) 
										<i class="fa fa-caret-down pull-right"  style="margin-top:10px" aria-hidden="true"></i>
								</a>
								<div id="demo<?php echo $i;?>" class="collapse">
										<table  style="border:none;width:100%;background:#fff">
											<?php 
													
														if(sizeof($tempproduct)>0){
														foreach($tempproduct as $productrow){
															
															if($productrow->product_Ctg  == $ctgrow->pCtg_ID ){
															
													?>
															<tr><td style="border:none;width:100%;"> <a href="<?php echo base_url();?>products/details/<?php echo $productrow->product_Slug; ?>" style="color:#872a92;"><?php echo $productrow->product_Name;?></a> </td></tr> 
													<?php 	}
															}
														}else{?>
															<tr><td style="border:none;width:100%;"> <a href="#"> Comming Soon</a> </td></tr> 
														<?php }
														?>								
										</table>
									</div>
								</li>
									<?php } ?>
							</ul>
                              
						</nav>
                        </div>
                    </div>
                    <div class="move-text">
                        <nav class="navbar">
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
							  </button>
							</div>
							<div class="collapse navbar-collapse" id="myNavbar">
							  <ul class="nav navbar-nav">
							  <li><a href="<?php echo base_url();?>upload/prescription">Upload Prescription</a></li>
								<li><a href="<?php echo base_url();?>about">About Us</a></li>
								<li><a href="<?php echo base_url();?>reviews">Reviews</a></li>
								<li><a href="<?php echo base_url();?>faq">FAQ</a></li>
								<li><a href="<?php echo base_url();?>disclaimer">Disclaimer</a></li>
							   
								<li><a href="<?php echo base_url();?>policy/shipping"> Shipping Policy</a></li>
								
							  </ul>
							</div>
						</nav>
                    </div>
                </div>
            </div>
        </div>
        