
    

        <div class="subscribe">
            <div class="container">
                <div class="col-md-6 social-icons w3-agile-icons">
                    <h4>
                        Keep in touch</h4>
                    <ul>
                        <li><a href="#" class="fa fa-facebook icon facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter icon twitter"></a></li>
                        <li><a href="#" class="fa fa-google-plus icon googleplus"></a></li>
                        <li><a href="#" class="fa fa-dribbble icon dribbble"></a></li>
                        <li><a href="#" class="fa fa-rss icon rss"></a></li>
                    </ul>
                    <!--<ul class="apps"> 
					<li><h4>Download Our app : </h4> </li>
					<li><a href="#" class="fa fa-apple"></a></li>
					<li><a href="#" class="fa fa-windows"></a></li>
					<li><a href="#" class="fa fa-android"></a></li>
				</ul> -->
                </div>
                <div class="col-md-6 subscribe-right">
                   
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
        <!-- //subscribe -->
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="footer-info w3-agileits-info">
                    <div class="col-md-4">
                        <div class="footer-logo header-logo">
                            <img src="<?php echo base_url(); ?>html/web/images/logo1.png" class="img-responsive" style="max-width:70%"/>
                        </div>
                    </div>
                    <!--<div class="col-md-8 ">-->
                    <div class="col-md-4 footer-grids">
                        <h3>
                            Company</h3>
                        <ul>
                            <li><a href="<?php echo base_url();?>about/company">Company Profile</a></li>
                            <li><a href="<?php echo base_url();?>about">About Us</a></li>
                            <li><a href="<?php echo base_url();?>faq">FAQ</a></li>
                            <li><a href="<?php echo base_url();?>disclaimer">Disclaimer</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 footer-grids">
                        <h3>
                            &nbsp;</h3>
                        <ul>
                            <li><a href="<?php echo base_url();?>policy/privacy">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url();?>policy/refund">Return & Refund Policy</a></li>
                            <li><a href="<?php echo base_url();?>policy/shipping">Shipping policy</a></li>
                            <li><a href="<?php echo base_url();?>terms/condition">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    
                    <div class="clearfix">
                    </div>
                    <!--</div>-->
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <!-- //footer -->
        <!-- cart-js -->
        
        <script>
            w3ls.render();

            w3ls.cart.on('w3sb_checkout', function (evt) {
                var items, len, i;

                if (this.subtotal() > 0) {
                    items = this.items();

                    for (i = 0, len = items.length; i < len; i++) {
                        items[i].set('shipping', 0);
                        items[i].set('shipping2', 0);
                    }
                }
            });
        </script>
        <!-- //cart-js -->
        <!-- countdown.js -->
        <!--<script src="js/jquery.knob.js"></script>
	    <script src="js/jquery.throttle.js"></script>
	<script src="js/jquery.classycountdown.js"></script>
		<script>
			$(document).ready(function() {
				$('#countdown1').ClassyCountdown({
					end: '1388268325',
					now: '1387999995',
					labels: true,
					style: {
						element: "",
						textResponsive: .5,
						days: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#1abc9c",
								lineCap: 'round'
							},
							textCSS: 'font-weight:300; color:#fff;'
						},
						hours: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#05BEF6",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						minutes: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#8e44ad",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						seconds: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#f39c12",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						}

					},
					onEndCallback: function() {
						console.log("Time out!");
					}
				});
			});
		</script>-->
        <!-- //countdown.js -->
        <!-- menu js aim -->
        <script src="<?php echo base_url(); ?>html/web/js/jquery.menu-aim.js"> </script>
        <script src="<?php echo base_url(); ?>html/web/js/main.js"></script>
        <!-- Resource jQuery -->
        <!-- //menu js aim -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </div>
    </form>
    <script src="<?php echo base_url(); ?>html/web/jQuery/jquery-3.2.0.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>html/web/jquery-ui-1.12.1/jquery-ui.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>html/web/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <link href="<?php echo base_url(); ?>html/web/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>html/web/jquery-ui-themes-1.12.1/themes/flick/theme.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">



        $.noConflict();  //Not to conflict with other scripts
        $(document).ready(function ($) {
			

        });
	 function addToCart( pkgid,name,qty=1,pid){
		 $.ajax({
				   url: '<?php echo base_url();?>shopping/cart/addToCart',
				   data: {
					  pkgid,name,qty,pid
				   },
				   type: 'GET',
				   error: function() {
					  alert('Error while adding to cart');
				   },
				   success: function(data) {
							 window.location.reload();
				   }
				});
          
	 }
	 function removeItem( rowid){
		 $.ajax({
				   url: '<?php echo base_url();?>shopping/cart/removeFromCart',
				   data: {
					  rowid
				   },
				   type: 'GET',
				   error: function() {
					  alert('Error while removing from cart');
				   },
				   success: function(data) {
							 window.location.reload();
				   }
				});
          
	 }
    </script>


 

</body>
</html>
