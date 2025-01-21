<?php $url = $_SERVER['HTTP_REFERER']; ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="author" content="">


<meta name="description" content="<?php echo $product['product_meta_desc']; ?>">
<meta name="keywords" content="<?php echo $product['product_meta_keyword']; ?>">
<title><?php if(!empty($product['product_meta_title'])){ echo $product['product_meta_title'];} else{ echo "Esqube"; } ?></title>

<style>
  .inner_banner_text h1 {
    font-size: 40px!important;
  }
  </style>

<!--header section start---->

<?php $this->load->view('user/header');?>

<!---header section end--->



<!---banner section start----->




<!--banner section end------>



<!--page section start----->

 
<section class="portfolio-section section-padding pt-0 mb-4" style="margin-top: -50px;">
    <div class="container">
	
	    <div class="col-lg-12 project_button pdf_box mx-auto" style="text-align: end;">
           <a href="<?php echo $url; ?>"><img src="<?php echo base_url();?>assets/img/images.png" style="height: 20px;margin-top: -40px;" class="loading det_arrow" data-was-processed="true"></a>
        </div>
	
        <div class="project-wrapper" >
            <div class="portfolio-carousel-active owl-carousel">
                <div class="single-project" >
                    <div class="project-contents" style="background-image: url(<?php echo base_url();?>assets/img/about_pattern.png);">
                        <div class="row mb-4">
                            <div class="project-details col-lg-5 offset-lg-1 pl-lg-0 order-2 order-lg-1 col-12">
                                <div class="project-meta">
                                    
                                 <div class="col-lg-12 inner_banner_text ">

      <h1 class="inner_banner_text title"><?php echo $product['product_name'];?></h1>

  </div>   
                                </div>
                                <!-- <h3><?php //echo $product['product_name'];?></h3> -->
                                <h6 class="prod_dim"><?php echo $product['product_dimension']; ?></h6>
                                <?php echo $product['product_desc'];?>
                               
                                
                            </div>
                            <div class="project-thumbnail col-lg-5 offset-lg-1 p-lg-0 order-1 order-lg-2 col-12">
                              
                                <img src="<?php echo base_url();?>uploads/product/thumb/<?php echo $product['product_image']; ?>" data-original="<?php echo base_url();?>uploads/product/<?php echo $product['product_image']; ?>" class="lazyload prod_det_img">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single-project -->
                <div class="text-center prod_det_btn">
                 
                    
                        <button onclick="openModal()">Enquiry</button>


                </div>



            </div>

            <div class="project-carousel-nav"></div>
        </div>
    </div>
</section> 



<!--page section end----->



<!---model section start---->

<div class="modal fade myshow" id="enquirymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog form-dark mdsec Profileeditor" role="document"> 

    <!--Content-->

    <div class="modal-content card card-image">

      <div class="text-white rgba-stylish-strong  z-depth-4 "> 

        <!--Header-->

        <div class="modal-header text-center divs">

          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel">Enquire Now</h3>

          <button type="button" class="close white-text" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true" data-dismiss="modal">×</span></button>

        </div>

        <!--Body-->

        <div class="modal-body pro_det_model"> 

          <!--Body--> 

          <br>

          <form method="post" action="<?php echo base_url();?>/Product/<?php echo $product['product_slug']; ?>">

            <div class="row">

              <div class="col-lg-6 col-md-6">

                <div class="md-form dform ">

                  <label for="exampleInputEmail1">Name <strong>*</strong></label>

                  <input type="text" name="name"  class="form-control validate white-text" required="">

                </div>

              </div>

               <div class="col-lg-6 col-md-6">

                <div class="md-form dform ">

                  <label for="exampleInputEmail1">Email Id <strong>*</strong></label>

                  <input type="email" name="email"   class="form-control validate white-text" required="">

                </div>

              </div>

             <div class="col-lg-6 col-md-6">

                <div class="md-form dform ">

                  <label for="exampleInputEmail1">Phone No <strong>*</strong></label>

                  <input type="text" name="phone" class="form-control validate white-text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required="">

                </div>

              </div>

			  

			   <div class="col-lg-6 col-md-6">

                <div class="md-form dform ">

                  <label for="exampleInputEmail1">Subject <strong>*</strong></label>

                  <input type="text" name="subject" class="form-control validate white-text" required="">
                  <input type="hidden" name="product" value="<?php echo $product['product_name']; ?>">
                </div>

              </div>

			  

			  

			  <div class="col-lg-12 col-md-12">

                <div class="md-form dform ">

                  <label for="exampleInputEmail1">Message <strong>*</strong></label>

                  <textarea name="message"  class="form-control validate white-text" required=""></textarea>

                </div>

              </div>

            </div>

            <div class="row d-flex align-items-center dform">

              <div class="text-center col-md-12">

                <div class="modalbuttons">

                

                  <button type="submit" name="submit" class="buttonsubmit">Submit</button>

                </div>

              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</div>



<!---model section end---->


<!--footer section start---->

<?php $this->load->view('user/footer'); ?>

<!---footer section end--->


<script>

  function openModal()
  {
  
  $('#enquirymodal').modal('show');
  
  }
  
  </script>











</body>
</html>