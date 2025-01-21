<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="author" content="">


<meta name="description" content="<?php echo $testimonial_seo['meta_description']; ?>">
<meta name="keywords" content="<?php echo $testimonial_seo['meta_keyword']; ?>">
<title><?php if(!empty($testimonial_seo['meta_title'])){ echo $testimonial_seo['meta_title'];} else{ echo "Esqube"; } ?></title>






<!---header section start--->


<?php $this->load->view('user/header'); ?>


<!-----header section end-->



<!---banner section start----->

<section class="banimg">

  <img src="<?php echo base_url();?>assets/img/banner2.jpg" class="loaded" data-was-processed="true">

  <div class="col-lg-12 inner_banner_text">

      <h1 class="inner_banner_text">Testimonial</h1>

  </div>

</section>


<!--banner section end------>




<!---page content start----->


<div class="container-xxl  testimonial  wow fadeInUp mb-3" data-wow-delay="0.1s" style="margin-top: -50px;">
    <div class="container  px-lg-5">
        <div class="owl-carousel testimonial-carousel">
            
            <div class="row">

               <?php foreach($testimonials as $test){?> 

                <div class="col-lg-4 mb-3">
                    
                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p><?php echo $test->testimonial_desc	; ?></p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle lazyload" data-original="<?php echo base_url();?>uploads/testimonial/<?php echo $test->testimonial_img;?>" style="width: 50px; height: 50px;object-fit: cover;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1"><?php echo $test->testimonial_name;?></h6>
                                <small><?php echo $test->testimonial_place; ?></small>
                            </div>
                        </div>
                    </div>


                </div>


                <?php } ?>


                




               


               

            </div>


            

            
            
           
           






        </div>
    </div>
</div>


<!---page content end---->
  


<!---footer section start--->

<?php $this->load->view('user/footer'); ?>

<!---footer section end--->



</body>
</html>