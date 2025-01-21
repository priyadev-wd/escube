<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="author" content="">


<meta name="description" content="<?php echo $home_seo['meta_description']; ?>">
<meta name="keywords" content="<?php echo $home_seo['meta_keyword']; ?>">
<title><?php if(!empty($home_seo['meta_title'])){ echo $home_seo['meta_title'];} else{ echo "Esqube"; } ?></title>




<!---header section start----->

<?php $this->load->view('user/header'); ?>

<!---header section end---->


<style>
    .esqube--h1{
            font-family: 'Avenir Light' !important;
    }
    .clr-txt{
        color:var(--theme-color);
    }
     .clr-txt1{
        color: var(--theme-color1);
    }
</style>
<!-- Slider Section Start -->
<div class="rs-slider slide-home-style2">
    <div class="container">
        <div class="row y-middle pb-0 pb-sm-5">
            <div class="col-lg-5">
                <div class="content-wrap py-5">
                    <div class="brush-content mb-20">
                        
- <span class="sub-text"><h1 class="esqube--h1"><span class="clr-txt">Manufacturers</span> of Innovative Plastic <span class="clr-txt1">Goods</span></h1></span> 

                    </div>
                    <div class="btn-part mt-30" style="text-align: center;">
                        <img src="<?php echo base_url(); ?>assets/img/new logo.png" alt="Logo" style="max-height: 300px; width: auto;">
                        <br>
                        <a class="readon view-slide" href="<?php echo base_url(); ?>assets/img/Esqube.pdf" target="_blank">
                            <span style="color: #fff;">HomeWare Brochure</span>
                        </a>
                        <a class="readon view-slide second" href="<?php echo base_url(); ?>assets/img/Escube-brochure2.pdf" target="_blank">
                            <span style="color: #fff;">Material Handling Brochure</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
    <div class="slide-img">
        <div class="rs-carousel owl-carousel" id="carousel_one" data-loop="true" data-items="1" data-margin="0" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-center-mode="true" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="1" data-md-device-nav="false" data-md-device-dots="true">
            <?php foreach($home_banner as $h_ban): ?>
                <div class="slider-item">
                    <div class="images-part">
                        <img src="<?php echo base_url(); ?>uploads/banners/<?php echo $h_ban->ban_image; ?>" alt="Banner Image" width="1200" min-height="600" loading="lazy">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
        </div>
    </div>
</div>


			<!-- Slider Section End -->






            <div class="Aboutsecs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 aboutimh">
                <div class="about-img">
                    <img src="<?php echo base_url();?>assets/img/about1.jpg" alt="About Image" style="width: 345px; height: 300px;">
                </div>
            </div>
            <div class="col-lg-6 aboutdesc">
                <div class="aby-sec">
                    <div class="title-area mb-10">
                        <span class="sub-title">About</span>
                        <h2 class="sec-title"><?php echo $home_about['content_pagename']; ?></h2>
                    </div>
                    <p><?php echo text_cutter(strip_tags($home_about['content_dsec']), 76); ?></p>
                    <div class="btn-wrap mt-30">
                        <a href="<?php echo base_url();?>About" class="as-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="product-brandsec has-bg--shape" >

<div class="bg-shape">
     
      <div class="shape-2"></div>
      <div class="shape-3"></div>
      <div class="shape-4"></div>
      <div class="shape-5"></div>
      <div class="shape-6"></div>
    </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="title-area text-center">
          <h2 class="sec-title text-white">Product Categories</h2>
          <!--<p class="sec-text ms-auto me-auto text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--->
        </div>
      </div>
    </div>
	<div class="my-slide">
	<div id="brand-slider" class="row as-carousel" data-autoplay="true"  data-slide-show="2" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">
  
  
  
 
  
  
  
 <div class="col-lg-6 col-md-6">
	<div class="prod-brand">
	<div class="row">
	<div class="col-lg-6 col-md-6">
	<div class="prod-brand-img">
	<a href="<?php echo base_url();?>SubCategory-Products/30-1"><img src="<?php echo base_url();?>uploads/category/thumb/<?php echo $home_mhc['category_img'];?>" data-original="<?php echo base_url();?>uploads/category/<?php echo $home_mhc['category_img'];?>" style="width: 100%; height: 300px;" alt="" class="lazyload"></a>
	</div>
	</div>
	<div class="col-lg-6 col-md-6">
	<div class="prod-brand-text">
	
	
            <h3><a href="<?php echo base_url();?>SubCategory-Products/30-1"><?php echo $home_mhc['category_name'];?></a></h3>
			    
		
          
			<div class="btn-wrap mt-10"><a href="<?php echo base_url();?>SubCategory-Products/30-1" class="as-btn">Product Range</a> </div>
          </div>
	</div>
    </div>
	</div>
    </div>



    <div class="col-lg-6 col-md-6">
	<div class="prod-brand">
	<div class="row">
	

    <div class="col-lg-6 col-md-6">
	<div class="prod-brand-img">
	<a href="<?php echo base_url();?>SubCategory-Products/28-4"><img src="<?php echo base_url();?>uploads/category/thumb/<?php echo $home_ware['category_img'];?>" data-original="<?php echo base_url();?>uploads/category/<?php echo $home_ware['category_img'];?>" style="width: 100%; height: 300px;" alt="" class="lazyload"></a>
	</div>
	</div>
	<div class="col-lg-6 col-md-6">
	<div class="prod-brand-text">
	
	
            <h3><a href="<?php echo base_url();?>SubCategory-Products/28-4"><?php echo $home_ware['category_name'];?></a></h3>
			    
		
          
			<div class="btn-wrap mt-10"><a href="<?php echo base_url();?>SubCategory-Products/28-4" class="as-btn">Product Range</a> </div>
          </div>
	</div>
    </div>
	</div>
    </div>
	
   
    <div class="col-lg-6 col-md-6">
	<div class="prod-brand">
	<div class="row">
    <div class="col-lg-6 col-md-6">
	<div class="prod-brand-img">
	<a href="<?php echo base_url();?>SubCategory-Products/29-3"><img src="<?php echo base_url();?>uploads/category/thumb/<?php echo $home_fur['category_img'];?>" data-original="<?php echo base_url();?>uploads/category/<?php echo $home_fur['category_img'];?>" style="width: 100%; height: 300px;" alt="" class="lazyload"></a>
	</div>
	</div>
	<div class="col-lg-6 col-md-6">
	<div class="prod-brand-text">
	
	
                <h3><a href="<?php echo base_url();?>SubCategory-Products/29-3"><?php echo $home_fur['category_name'];?></a></h3>
			    
		
          
			<div class="btn-wrap mt-10"><a href="<?php echo base_url();?>SubCategory-Products/29-3" class="as-btn">Product Range</a> </div>
          </div>
  </div>

	</div>
	
	</div>
	
  </div>
  

  




  


		</div>
		
		  <div class="icon-box brandslides">
          <button data-slick-prev="#brand-slider" class="slick-arrow left default"><i class="far fa-chevron-left"></i></button>
          <button data-slick-next="#brand-slider" class="slick-arrow right default"><i class="far fa-chevron-right"></i></button>
        </div>
	</div>
	
  </div>
</section>


<!----product section start--->

<section class="Productsec" data-bg-src="<?php echo base_url();?>assets/img/bg/price_bg_1.png">
    <div class="container">
        <div class="title-area text-center"> 
            <span class="sub-title">Our Products</span>
            <h2 class="sec-title">Latest Products</h2>
        </div>
        <div id="initialProducts">
        <div class="row clearfix"> 
        <?php
            $displayed_count = 0; 
            foreach($home_products as $h_prod) {
                if($h_prod->product_in_homepage == 1) {
            ?>
                <div class="product-block-two col-lg-3 col-md-4 col-sm-6 d-flex prod">
                    <div class="inner-box">
                        <div class="image"> 
                            <a href="<?php echo base_url();?>Product/<?php echo $h_prod->product_slug;?>">
                                <img src="<?php echo base_url();?>uploads/product/thumb/<?php echo $h_prod->product_image;?>" data-original="<?php echo base_url();?>uploads/product/<?php echo $h_prod->product_image;?>" alt="" class="lazyload" style="width: 100%; height: 300px;">
                            </a> 
                        </div>
                        <div class="lower-content">
                            <div class="conserv">
                                <h3><a href="<?php echo base_url();?>Product/<?php echo $h_prod->product_slug;?>"><?php echo $h_prod->product_name;?></a></h3>
                            </div>
                            <div class="btn-wrap mt-30" style="position: relative; margin-left:67px;">
                                <a href="<?php echo base_url();?>Product/<?php echo $h_prod->product_slug;?>" class="as-btn ">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
            $displayed_count++; 
            if ($displayed_count % 4 == 0) {
                $row_count++;
                if ($row_count >= 4) {
                    break; // Exit the loop after displaying four rows
                }
                echo '</div><div class="row clearfix">'; // Close current row and start a new one
            }
        }
    } 
?>
        </div>
        </div>

        <div class="btn-wrap mt-10 new"><a href="javascript:void();" id="viewBtn" onclick="toggleProducts(true)" class="as-btn">View All</a> </div>
       
       
       
        <div id="allProducts" style="display: none;">
    <div class="row clearfix"> 
        <?php 
        foreach($home_products as  $h_prod) {
            if( $h_prod->product_in_homepage == 1) {
        ?>
            <div class="product-block-two col-lg-3 col-md-4 col-sm-6 d-flex productss">
                <div class="inner-box">
                    <div class="image"> 
                        <a href="<?php echo base_url();?>Product/<?php echo $h_prod->product_slug;?>">
                            <img src="<?php echo base_url();?>uploads/product/thumb/<?php echo $h_prod->product_image;?>" data-original="<?php echo base_url();?>uploads/product/<?php echo $h_prod->product_image;?>" alt="" class="lazyload" style="width: 100%; height: 300px;">
                        </a> 
                    </div>
                    <div class="lower-content">
                        <div class="conserv">
                            <h3><a href="<?php echo base_url();?>Product/<?php echo $h_prod->product_slug;?>"><?php echo $h_prod->product_name;?></a></h3>
                        </div>
                        <div class="btn-wrap mt-30" style="position: relative; margin-left:67px;">
                            <a href="<?php echo base_url();?>Product/<?php echo $h_prod->product_slug;?>" class="as-btn ">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        } 
        ?>  
    </div>
</div>
<div class="btn-wrap mt-10 new"><a href="javascript:void(0);" id="viewLessBtn" onclick="toggleProducts(false)" class="as-btn" style="display: none;">View Less</a> </div>

    </div>
</section>


<!----product section end--->

  

<!--client section start--->


<section>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <h2 class="sec-title">Our Clients</h2>
            </div>
            
            <div class="owl-carousel owl-theme" id="carousel_two">
                
                <?php foreach($home_clients as $h_cln): ?> 
                    <div class="item"> 
                        <div class="col-lg-12 client">
                            <img data-src="<?php echo base_url();?>uploads/client/<?php echo $h_cln->client_img;?>" 
                                 src="<?php echo base_url();?>uploads/client/thumb/<?php echo $h_cln->client_img;?>" 
                                 class="lazyload" 
                                 alt="Client Logo" >
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
            
        </div>
    </div>
</section>





<!--client section end--->

<!----testimonial section start---->





<!----footer section start---->


<?php $this->load->view('user/footer'); ?>


<!---footer section end---->

<!---owl carousel section start--->




<script>

$(document).ready(function() {
   var one = $("#carousel_one");
   var two = $("#carousel_two");

   one.owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	  autoplay: true,
	  autoplayTimeout:3000,
	  lazyLoad:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:1
        }
    }

  });  

  two.owlCarousel({
  loop:true,
  margin:10,
  nav:true,
	autoplay: true,
	autoplayTimeout:1000,
	lazyLoad:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
  });


});


</script>
<script>
  function toggleProducts(showAll) {
    var allProducts = document.getElementById('allProducts');
    var viewBtn = document.getElementById('viewBtn');
    var viewLessBtn = document.getElementById('viewLessBtn'); // Add this line to get the "View Less" button
    var initialProductsDiv = document.getElementById('initialProducts');
    
    if (showAll) {
        allProducts.style.display = 'block';
        viewBtn.style.display = 'none';
        viewLessBtn.style.display = 'block'; // Show the "View Less" button
        initialProductsDiv.style.display = 'none';
    } else {
        allProducts.style.display = 'none';
        viewBtn.style.display = 'block';
        viewLessBtn.style.display = 'none'; // Hide the "View Less" button
        initialProductsDiv.style.display = 'block';
    }
}
</script>


<!---owl carousel section end--->



</body>
</html>