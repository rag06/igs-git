<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


        

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Navigation</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="<?php echo base_url() ;?>/admin/dashboard/dashboard"><i class="fa fa-link"></i> <span>Dashbaord</span></a></li>
            <!--li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Blogs</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>/admin/blogs/blogs/addBlog">Create Blogs</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/blogs/blogs">Manage Blogs</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/blogs/blogs/blogCategory">Blogs Category</a></li>
              </ul>
            </li-->
			<li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Order Management</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>/admin/orders/orders">Manage Orders</a></li>
              </ul>
            </li>
			 <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Product Management</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ;?>/admin/products/products/addProduct">Add Product</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/products/products">Manage Products</a></li>
                <li><a href="<?php echo base_url() ;?>/admin/products/products/productCategory">Product Category</a></li>
              </ul>
            </li>
            <!--li><a href="<?php echo base_url() ;?>/admin/subcribers/subcribers"><i class="fa fa-link"></i> <span>Subcribers</span></a></li-->
            <li><a href="<?php echo base_url() ;?>/admin/feedback/feedback"><i class="fa fa-link"></i> <span>Reviews</span></a></li>
            
			 <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Customers Management</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>/admin/customers/customers/addCustomer">Add Customer</a></li>
                <li><a href="<?php echo base_url();?>/admin/customers/customers">Manage Customers</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Website Management</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <!--li><a href="<?php echo base_url() ;?>/admin/global/GlobalSetting">Global Settings</a></li-->
                <li><a href="<?php echo base_url() ;?>/admin/pages/WebPages">WebPages</a></li>
              </ul>
            </li>
			<?php if($this->session->userdata['logged_in']['role']==1) {
				echo' <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Admin User Management</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="'.base_url() .'/admin/admin/users/addUser">Create Admin</a></li>
                <li><a href="'.base_url().'/admin/admin/users">Manage Admin</a></li>
              </ul>
            </li>';
				
				
			}?>
           
            <li><a href="<?php echo base_url() ;?>/admin/files/files"><i class="fa fa-link"></i> <span>Files Explorer</span></a></li>
            <li><a href="<?php echo base_url() ;?>/admin/uploads/uploads"><i class="fa fa-link"></i> <span>Prescription</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
