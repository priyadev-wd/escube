<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="author" content="">

<meta name="description" content="<?php echo $about_seo['meta_description']; ?>">
<meta name="keywords" content="<?php echo $about_seo['meta_keyword']; ?>">
<title><?php if(!empty($about_seo['meta_title'])){ echo $about_seo['meta_title'];} else{ echo "Esqube"; } ?></title>




<!---header section start--->

<?php $this->load->view('user/header');?>

<!--header section end--->


<!---banner section start----->

<section class="banimg">

  <img src="<?php echo base_url();?>uploads/innerbanners/<?php echo $about_banner['image'];?>" class="loaded" data-was-processed="true">

  <div class="col-lg-12 inner_banner_text">



  </div>

</section>


<!--banner section end------>



<!---page content start---->

<section class="about-style-two mb-4">
    <div class="pattern-layer" style="background-image: url(<?php echo base_url();?>assets/img/shape-2.png);"></div>
    <div class="container">
        <div class="row clearfix" style="display:block;">

            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image_block_2">
                    <div class="image-box">
                        <div class="shape">
                            <div class="shape-1" style="background-image: url(<?php echo base_url();?>assets/img/shape-13.png);"></div>
                            <div class="shape-2" style="background-image: url(<?php echo base_url();?>assets/img/shape-12.png);"></div>
                            <div class="shape-3" style="background-image: url(<?php echo base_url();?>assets/img/shape-12.png);"></div>
                        </div>
                        <figure class="image inner_about_img"><img src="<?php echo base_url();?>assets/img/about1.jpg" alt=""></figure>
                    </div>
                </div>
            </div>


            <div class="content-column">
                <div class="content_block_1">
                    <div class="content-box">
                        <div class="sec-title">
                            <!--<p>About Travio</p>-->
                            <h2><?php echo $about['content_pagename']; ?></h2>
                        </div>
                        <div class="text about">
                            
                             <?php echo $about['content_dsec']; ?>

                          </div>
                        
                    </div>
                </div>
            </div>

            



        </div>
    </div>
</section>


<!---page content end---->
  


<!---footer section start----->

<?php $this->load->view('user/footer'); ?>


<!---footer section end--->



</body>
</html>