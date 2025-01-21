<footer class="footer-wrapper footer-layout1" >
  <div class="widget-area">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-6 col-lg-4">
          <div class="widget footer-widget">
		  <div class="footer-logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/footerlogo.png" alt="" ></a></div>
           
            <div class="as-widget-about">
              <p ><?php echo text_cutter(strip_tags($common_about['content_dsec']),30);?>...<a href="<?php echo base_url();?>About" style="color: var(--body-color);">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-2">
          <div class="widget widget_nav_menu footer-widget">
            <h3 class="widget_title">Quick Link</h3>
            <div class="menu-all-pages-container">
              <ul class="menu">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo base_url();?>About">About Us</a></li>
               
                <li><a href="<?php echo base_url();?>SubCategory-Products/30-1">Products</li>
              
                <li><a href="<?php echo base_url();?>Clients">Clients</a></li>
                <li><a href="<?php echo base_url();?>Contact">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
		 <div class="col-md-6 col-lg-2">
          <div class="widget widget_nav_menu footer-widget">
            <h3 class="widget_title">Products</h3>
            <div class="menu-all-pages-container">
              <ul class="menu">

                     <?php foreach(array_slice($subcategory,0,5) as $comm_cat){?> 

                  <li><a href="<?php echo base_url();?>SubCategory-Products/<?php echo $comm_cat->subcat_slug;?>"><?php echo $comm_cat->subcat_name;?></a></li>

                <?php } ?>


              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 col-sm-6">
          <div class="widget footer-widget">
            <h3 class="widget_title">Contact Info</h3>
            <div class="as-widget-about">
              <p class="footer-info"><i class="fas fa-location-dot"></i><?php echo $common_contact['contact_adress']; ?></p>
              <p class="footer-info"><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $common_contact['contact_email1']; ?>" class="info-box_link"><?php echo $common_contact['contact_email1']; ?></a></p>
              <p class="footer-info"><i class="fas fa-phone"></i> <a href="tel:<?php echo $common_contact['contact_phone1']; ?>" class="info-box_link"><?php echo $common_contact['contact_phone1']; ?></a>, <a href="tel:<?php echo $common_contact['contact_phone2']; ?>" class="info-box_link"><?php echo $common_contact['contact_phone2']; ?></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-wrap">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-8">
          <p class="copyright-text ">Copyright <i class="fal fa-copyright"></i> 2023 <span>Esqube</span> All Rights Reserved. <a href="https://www.techsoftweb.com/" target="_blank">Web  Design Company</a> -<a href="https://www.techsoftweb.com/" target="_blank"> Kochi - Techsoft</a></p>
        </div>
        <div class="col-lg-4 text-end copy-so d-lg-block">
          <div class="footer-links">
            <div class="as-social"><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a> <a href="#" target="_blank"><i class="fab fa-twitter"></i></a> <a href="#" target="_blank"><i class="fab fa-instagram"></i></a> <a href="#" target="_blank"><i class="fab fa-youtube"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<a href="#" class="scrollToTop scroll-btn"><i class="far fa-long-arrow-up"></i></a>
 <a href="tel:+971 58 839 2634"  class="DZ-bt-callnow-now DZ-theme-btn"><i class="fa fa-phone" aria-hidden="true" ></i></a> 
 <a href="mailto:sales@esqubeplastics.com" class="DZ-bt-email-now DZ-theme-btn"><i class="far fa-envelope" aria-hidden="true" ></i></a> 
 <a href="https://api.whatsapp.com/send/?phone=+971 588392634&text=%2AHey Esqube+&app_absent=0" target="_blank" class="DZ-bt-whatsapp-now DZ-theme-btn"><i class="fab fa-whatsapp" aria-hidden="true" ></i></a>  
 
<script src="<?php echo base_url();?>assets/js/vendor/jquery-3.6.0.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/app.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/main.js"></script> 
<!-- <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

$("img.lazyload").lazyload();

</script>



<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>




<?php

	if($this->session->flashdata('success')){ 
	
?>

<script>
swal({
    title: "Message Sent Successfully",
    icon: "success",
    button: "oh yes!",
});
</script>

<?php
    }  
?>



  


<script>


 var header = $('#header-sticky');
    var win = $(window);
    
    win.on('scroll', function() {
        if ($(this).scrollTop() > 300) {
           
			 $(".DZ-theme-btn").addClass("DZ-theme-btn-sticky");
			 
        } else {
           
			$(".DZ-theme-btn").removeClass("DZ-theme-btn-sticky");
			
        }
    });
</script>