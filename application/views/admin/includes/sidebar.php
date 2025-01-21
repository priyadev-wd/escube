<section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu">



        <li class="treeview <?php if($this->uri->segment(2)=="Banner")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-picture-o" aria-hidden="true"></i> <span>Manage Home Banner</span> </a>
            <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(3)=="Banner"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/Banner"> <i class="fa fa-plus-square"></i><span>Add / View
                            Banner</span></a> </li>

            </ul>
        </li>


        <li class="treeview <?php if($this->uri->segment(2)=="InnerBanner")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-picture-o" aria-hidden="true"></i> <span>Manage InnerBanner</span> </a>
            <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(3)=="InnerBanner"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/InnerBanner"> <i class="fa fa-plus-square"></i><span>Add / View
                        InnerBanner</span></a> </li>

            </ul>
        </li>



        <li class="treeview <?php if($this->uri->segment(2)=="Category")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-cogs" aria-hidden="true"></i> <span>Manage Category</span> </a>
            <ul class="treeview-menu">

                <li class="<?php if($this->uri->segment(3)=="AddCategory"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/Category/AddCategory"> <i
                            class="fa fa-plus-square"></i><span>Add / View Category</span></a> </li>

            </ul>
        </li>
		
		
		 <li class="treeview <?php if($this->uri->segment(2)=="SubCategory")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-cogs" aria-hidden="true"></i> <span>Manage Sub Category</span> </a>
            <ul class="treeview-menu">

                <li class="<?php if($this->uri->segment(3)=="AddSubCategory"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/SubCategory/AddSubCategory"> <i
                            class="fa fa-plus-square"></i><span>Add / View SubCategory</span></a> </li>

            </ul>
        </li>

        

        <li class="treeview <?php if($this->uri->segment(2)=="Product")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-cart-plus" aria-hidden="true"></i> <span>Manage Product</span> </a>
            <ul class="treeview-menu">

                <li class="<?php if($this->uri->segment(3)=="AddProduct"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/Product/AddProduct"> <i
                            class="fa fa-plus-square"></i><span>Add Product</span></a> </li>
                <li
                    class="<?php if(($this->uri->segment(3)=="EditProduct") || ($this->uri->segment(3)=="")):echo 'active'; endif; ?>">
                    <a href="<?php echo base_url();?>admin/Product"> <i class="fa fa-plus-square"></i> <span>View / Edit
                            Product</span></a> </li>
            </ul>
        </li>




         
        <!--<li class="treeview <?php if($this->uri->segment(2)=="Features")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-picture-o" aria-hidden="true"></i> <span>Manage Features</span> </a>
            <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(3)=="Features"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/Features"> <i class="fa fa-plus-square"></i><span>Add / View
                        Features</span></a> </li>

            </ul>
        </li>--->




        




        <!--<li class="treeview <?php if($this->uri->segment(2)=="Testimonial")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-quote-right" aria-hidden="true"></i> <span>Manage Testimonial</span> </a>
            <ul class="treeview-menu">

                <li class="<?php if($this->uri->segment(3)=="AddTestimonial"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/Testimonial/AddTestimonial"> <i
                            class="fa fa-plus-square"></i><span>Add Testimonial</span></a> </li>
                <li
                    class="<?php if(($this->uri->segment(3)=="EditTestimonial") || ($this->uri->segment(3)=="")):echo 'active'; endif; ?>">
                    <a href="<?php echo base_url();?>admin/Testimonial"> <i class="fa fa-plus-square"></i> <span>View /
                            Edit Testimonial</span></a> </li>
            </ul>
        </li>--->
		
		
		
		 <li class="treeview <?php if($this->uri->segment(2)=="Clients")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-cogs" aria-hidden="true"></i> <span>Manage Clients</span> </a>
            <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(3)=="AddClients"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/Clients/AddClients"> <i
                            class="fa fa-plus-square"></i><span>Add Clients</span></a> </li>
                <li
                    class="<?php if(($this->uri->segment(3)=="EditClients") || ($this->uri->segment(3)=="")):echo 'active'; endif; ?>">
                    <a href="<?php echo base_url();?>admin/Clients"> <i class="fa fa-plus-square"></i> <span>View / Edit
                            Clients</span></a> </li>
            </ul>
        </li>






        <li class="treeview <?php if($this->uri->segment(2)=="Contact")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa  fa-map-marker" aria-hidden="true"></i> <span>Manage Contact Us</span> </a>
            <ul class="treeview-menu">


                <li class="<?php if(($this->uri->segment(2)=="EditContact")):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/Contact/ViewContact"> <i class="fa fa-plus-square"></i>
                        <span>Manage Contact Us</span></a> </li>


            </ul>
        </li>





        <li class="treeview <?php if($this->uri->segment(2)=="CMS")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-file-code-o" aria-hidden="true"></i> <span>Manage CMS Page</span> </a>
            <ul class="treeview-menu">
                <li
                    class="<?php if(($this->uri->segment(3)=="ViewCMS") || ($this->uri->segment(3)=="EditCMS")):echo 'active'; endif; ?>">
                    <a href="<?php echo base_url();?>admin/CMS/ViewCMS"> <i class="fa fa-plus-square"></i>
                        <span>Edit/View Pages</span></a> </li>
            </ul>
        </li>








        <li class="treeview <?php if($this->uri->segment(2)=="Seo")  :echo 'active'; endif; ?>"> <a href="#"> <i
                    class="fa fa-file-text" aria-hidden="true"></i> <span>Manage Seo Page</span> </a>
            <ul class="treeview-menu">
                <li
                    class="<?php if(($this->uri->segment(3)=="EditSeo") || ($this->uri->segment(3)=="")):echo 'active'; endif; ?>">
                    <a href="<?php echo base_url();?>admin/Seo"> <i class="fa fa-plus-square"></i> <span>View Seo
                            Page</span></a> </li>
            </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(2)=="change_password" ):echo 'active'; endif; ?>"> <a href="#">
                <i class="fa fa-cog"></i> <span>Settings</span> </a>
            <ul class="treeview-menu">
                <li class="<?php if($this->uri->segment(2)=="change_password"):echo 'active'; endif; ?>"> <a
                        href="<?php echo base_url();?>admin/change_password"> <i class="fa fa-lock"></i> <span>Change
                            Password</span></a> </li>
                <li> <a href="<?php echo base_url();?>admin/login/logout"> <i class="fa fa-sign-out"></i>
                        <span>Logout</span></a> </li>
            </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->