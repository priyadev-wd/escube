<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="author" content="">

<meta name="description" content="<?php echo $category_seo['meta_description']; ?>">
<meta name="keywords" content="<?php echo $category_seo['meta_keyword']; ?>">
<title><?php if(!empty($category_seo['meta_title'])){ echo $category_seo['meta_title'];} else{ echo "Esqube"; } ?></title>


<!--header section start---->

<?php $this->load->view('user/header'); ?>

<!---header section end--->



<style>
  .Productsec
  {
    padding:0px;
  }
</style>





<!---banner section start----->

<section class="banimg">

  <img src="<?php echo base_url();?>uploads/innerbanners/<?php echo $category['category_banner'];?>" class="loaded" data-was-processed="true">

  <div class="col-lg-12 inner_banner_text">

      <h1 class="inner_banner_text"><?php if(!empty($category)){echo $category['category_name'];}else {echo "Products";} ?></h1>

  </div>

</section>


<!--banner section end------>


<!--page content start---->

<section class="Innerpagesec mt-5 mb-3" style="margin-top: -25px !important;">
    <div class="container">
      
      <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-12">
          <div class="categoryleft">
            <div class="filter-widget">
              <h2 class="fw-title">Categories</h2>
              <ul class="category-menu">
            
              <?php foreach($all_category as $all_cat){?> 

                 <li class="<?php 
                    if(!empty($category)){
                    if($all_cat->category_id == $category['category_id']){echo "cat_active"; } }?>"><a href="<?php echo base_url();?>Products/<?php echo $all_cat->category_slug;?>"><?php echo $all_cat->category_name;?> </a></li>
                                 
                 <?php } ?>                   
                                 
                                  
                                 
              </ul>
            </div>
          </div>
        </div>
       <div class="col-lg-9 col-md-8 col-sm-12 mb-3">
        
        <div class="row ">
            
           
            <!--text start---->
            <section class="Productsec">
              <div class="container">
               
                <div class="row clearfix"> 
                  
                  
                <?php 
                if(!empty($products)){
                foreach($products as $prod){?> 
                
                <!-- Product Block Two -->
                  <div class="product-block-two col-lg-4 col-md-4 col-sm-6 d-flex cat">
                    <div class="inner-box">
                      <div class="image"> <a href="<?php echo base_url()?>Product/<?php echo $prod->product_slug;?>"><img src="<?php echo base_url();?>uploads/product/thumb/<?php echo $prod->product_image;?>" data-original="<?php echo base_url();?>uploads/product/<?php echo $prod->product_image;?>" alt="" class="lazyload"></a> 
                        <!-- Options Navs --> 
                        
                      </div>
                      <div class="lower-content">
                        <div class="servicesscontentt">
                        <h3><a href="<?php echo base_url()?>Product/<?php echo $prod->product_slug;?>"><?php echo $prod->product_name;?> </a></h3>
                </div>
                     
                        <div class="btn-wrap mt-30"style="position: relative; margin-left:67px;"><a href="<?php echo base_url();?>Product/<?php echo $prod->product_slug;?>" class="as-btn ">Read More</a> </div>
                      </div>
                    </div>
                  </div>
                  
                 
                  
                  <?php } } else{?> 
                  
                  
                   <div class="col-lg-12">

                       <div class="no_products">
                           <p>No Product Found</p>
                       </div>  

                   </div>
                 
                  
                   <?php }  ?>



                </div>
              </div>
            </section>

            <!--text end---->
           
           
             
          


         </div>


       </div>
      
      
      
      </div>
    </div>
  </section>


<!---page content end---->
  


<!---footer section start---->

<?php $this->load->view('user/footer');?>


<!---footer section end--->



</body>
</html>