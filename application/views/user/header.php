<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P6VSFZCD');</script>
<!-- End Google Tag Manager -->

<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<link rel="icon" type="image/png"  href="<?php echo base_url();?>assets/img/favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/respondive.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="canonical" href="https://www.esqube.com/">
<meta name="robots" content="index, follow">
<style>
    .banimg .inner_banner_text {
    color: #fff !important;
}
</style>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P6VSFZCD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="sidemenu-wrapper d-none d-lg-block">
  <div class="sidemenu-content ">
    <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
    <div class="widget footer-widget">
      <div class="as-widget-about">
        <div class="about-logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/sidelogo.png" alt=""></a></div>
        <p class="about-text"><?php echo text_cutter(strip_tags($common_about['content_dsec']),30); ?>...<a href="<?php echo base_url();?>About" style="color: var(--body-color);"> ReadMore</a></p>
      </div>
    </div>
    <div class="widget footer-widget">
      <h3 class="widget_title">Contact Info</h3>
      <div class="as-widget-about">
        <p class="footer-info"><i class="fas fa-location-dot"></i><?php echo $common_contact['contact_adress']; ?></p>
        <p class="footer-info"><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $common_contact['contact_email1']; ?>" class="info-box_link"><?php echo $common_contact['contact_email1']; ?></a></p>
        <p class="footer-info"><i class="fas fa-phone"></i> <a href="tel:<?php echo $common_contact['contact_phone1']; ?>" class="info-box_link"><?php echo $common_contact['contact_phone1']; ?></a>, <a href="tel:<?php echo $common_contact['contact_phone2']; ?>" class="info-box_link"><?php echo $common_contact['contact_phone2']; ?></a></p>
      </div>
      <div class="as-social"><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a> <a href="#" target="_blank"><i class="fab fa-twitter"></i></a> <a href="#" target="_blank"><i class="fab fa-instagram"></i></a> <a href="#" target="_blank"><i class="fab fa-youtube"></i></a> </div>
    </div>
  </div>
</div>
<div class="popup-search-box  d-lg-block">
  <button class="searchClose"><i class="fal fa-times"></i></button>
  <form action="<?php echo base_url();?>Products" method="GET">
    <input type="text" name="search" placeholder="Search Products?">
    <button type="submit"><i class="fal fa-search"></i></button>
  </form>
</div>
<div class="as-menu-wrapper">
  <div class="as-menu-area text-center">
    <button class="as-menu-toggle"><i class="fal fa-times"></i></button>
    <div class="mobile-logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" alt=""  style="width: 100%; height: auto;"></a></div>
    <div class="as-mobile-menu">
      <ul>
        <li ><a class="current" href="<?php echo base_url();?>">Home</a> </li>
        <li ><a href="<?php echo base_url();?>About">About Us</a> </li>
      
        <li class="menu-item-has-children"><a href="#">Products</a>
        <ul class="sub-menu">
    <?php foreach($common_category as $comm_cat): ?>
      <li>
        <a href="<?php echo base_url(); ?>#"><?php echo $comm_cat->category_name; ?></a>
        <ul class="sub-menu">
          <?php foreach($comm_cat->subcategory as $subcat): ?>
            <li><a href="<?php echo base_url(); ?>SubCategory-Products/<?php echo $subcat->subcat_slug; ?>"><?php echo $subcat->subcat_name; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>
    <?php endforeach; ?>
  </ul>
        </li>
        
        <li ><a href="<?php echo base_url();?>Clients">Clients</a> </li>
       
        <li ><a href="<?php echo base_url();?>Contact">Contact Us</a> </li>
      </ul>
    </div>
  </div>
</div>
<header class="as-header header-layout2">
  <div class="sticky-wrapper">
    <div class="sticky-active">
      <div class="container">
        <div class="menu-area">
          <div class="row align-items-center justify-content-between">
            <div class="col-auto">
              <div class="header-logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" alt=""></a></div>
            </div>
            <div class="col-auto mob-me-auto">
              <nav class="main-menu d-none d-lg-inline-block">
                <ul>
                 <li ><a class="<?php if($this->uri->segment(1)==""){echo "current";}?>" href="<?php echo base_url();?>">Home</a> </li>
                 <li ><a class="<?php if($this->uri->Segment(1)=="About"){echo "current";}?>" href="<?php echo base_url();?>About">About Us</a> </li>
      
        <li class="menu-item-has-children"><a class="<?php if($this->uri->segment(1)=="Products" || $this->uri->segment(1)=="Product" || $this->uri->segment(1)=="SubCategory-Products"){echo "current";}?>" href="#">Products</a>
          <ul class="sub-menu">
           
           <?php foreach($common_category as $common_cat){?> 

              <li><a ><?php echo $common_cat->category_name;?></a>
            
              <ul class="sub-menu">
                 
                 <?php foreach($common_cat->subcategory as $subcat){ ?> 

                    
                      <li><a href="<?php echo base_url();?>SubCategory-Products/<?php echo $subcat->subcat_slug;?>"><?php echo $subcat->subcat_name;?></a></li>


                  <?php } ?>

                 
              </ul>
            
             </li>
               
             
              

           <?php } ?>

          </ul>
        </li>
        
        <li ><a class="<?php if($this->uri->segment(1)=="Clients"){echo "current"; }?>" href="<?php echo base_url();?>Clients">Clients</a> </li>
       
        <li ><a class="<?php if($this->uri->segment(1)=="Contact"){echo "current";}?>" href="<?php echo base_url();?>Contact">Contact Us</a> </li>
                </ul>
              </nav>
            </div>
            <div class="col-auto d-xl-block">
              <div class="header-button">
                <button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button>
                <button type="button" class="simple-icon sideMenuToggler d-none d-xxl-inline-block d-lg-inline-block"><i class="far fa-bars"></i></button>
              </div>
            </div>
            <div class="col-auto d-lg-none">
              <button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<style>

@font-face {
    font-family: 'Avenir Light'; /*a name to be used later*/
    src: url('<?php echo base_url();?>assets/font/Avenir Light/Avenir Light.ttf'); /*URL to font*/
}
.banfont{
	font-family: 'Avenir Light';
}

</style>