<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="author" content="">

<meta name="description" content="<?php echo $contact_seo['meta_description']; ?>">
<meta name="keywords" content="<?php echo $contact_seo['meta_keyword']; ?>">
<title><?php if(!empty($contact_seo['meta_title'])){ echo $contact_seo['meta_title'];} else{ echo "Esqube"; } ?></title>





<!----header section start---->

<?php $this->load->view('user/header');?>

<!---header section end--->

<!---banner section start----->

<section class="banimg">

  <img src="<?php echo base_url();?>uploads/innerbanners/<?php echo $contact_banner['image'];?>" class="loaded" data-was-processed="true">

  <div class="col-lg-12 inner_banner_text">

      <h1 class="inner_banner_text">Contact</h1>

  </div>

</section>


<!--banner section end------>




<!--page content start----->

 
<div class="contact-area default-padding mb-5" style="margin-top: -10px;">
    <div class="container">
        <div class="row align-center">
            
            <div class="col-tact-stye-one col-lg-7 mb-md-50">
                <div class="contact-form-style-one">
                    <h5 class="sub-title">Have Questions?</h5>
                    <h2 class="heading">Send us a Message</h2>
                    <form action="" method="POST" class="contact-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email*" type="email" required>
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="phone" placeholder="Phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" required>
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group comments">
                                    <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" name="submit">
                                    <i class="fa fa-paper-plane"></i> Get in Touch
                                </button>
                            </div>
                        </div>
                        <!-- Alert Message -->
                        <div class="col-lg-12 alert-notification">
                            <div id="message" class="alert-msg"></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-tact-stye-one col-lg-5 pl-60 pl-md-15 pl-xs-15">
                <div class="contact-style-one-info">
                    <h2 class="mb-4">
                        Contact 
                       
                    </h2>
                    
                    <ul style="padding-left: 0px;">
                        <li class="wow fadeInUp">
                          
                          <div class="row mb-4">
                             <div class="col-lg-2">
                                <div class="icon">
                                  <i class="fas fa-phone-alt"></i>
                                </div>
                             </div>


                             <div class="col-lg-9">
                                 
                              <div class="content">
                                <h5 class="title">Phone</h5>
                                <a href="tel:<?php echo $contact['contact_phone1']; ?>"><?php echo $contact['contact_phone1']; ?></a>, <a href="tel:<?php echo $contact['contact_phone2'];  ?>"><?php echo $contact['contact_phone2']?></a>
                              </div>

                             </div>  

                          </div>
                          
                          

                        </li>



                        <li class="wow fadeInUp" data-wow-delay="300ms">
                            
                          <div class="row mb-4">

                              <div class="col-lg-2">
                                <div class="icon">
                                  <i class="fas fa-map-marker-alt"></i>
                              </div>

                              </div>

                              <div class="col-lg-9">
                                  
                                <div class="info">
                                  <h5 class="title">Our Location</h5>
                                  <p><?php echo $contact['contact_adress']; ?></p>
                                   
                                  
                                </div>

                              </div>


                          </div>

                         
                        </li>


                        <li class="wow fadeInUp" data-wow-delay="500ms">
                            
                          <div class="row mb-4">

                            <div class="col-lg-2">
                              
                              <div class="icon">
                                <i class="fas fa-envelope-open-text"></i>
                              </div>

                            </div>
                            
                            <div class="col-lg-9">
                              
                              <div class="info">
                                <h5 class="title">Email</h5>
                                <a href="mailto:<?php echo $contact['contact_email1']; ?>"><?php echo $contact['contact_email1']; ?></a>
                              </div>

                            </div>

                          </div>

                          
                            

                        </li>


                        <div class="col-lg-12" style="padding: 0px;">
                          <div class="map-sec">
                                  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31430.285088253644!2d76.31857128698466!3d10.03454040030306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080c45c3b48f9b%3A0x623216e285e7e76e!2sThrikkakara%2C%20Edappally%2C%20Ernakulam%2C%20Kerala!5e0!3m2!1sen!2sin!4v1675490380817!5m2!1sen!2sin"  style="border:0;height:270px;"   allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
								  <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3599.972978674684!2d55.685629315016406!3d25.539276983738212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjXCsDMyJzIxLjQiTiA1NcKwNDEnMTYuMSJF!5e0!3m2!1sen!2sae!4v1685010624680!5m2!1sen!2sae"  height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                              </div>
                      </div>





                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>



  
  
</div>
</div>



<!---page content end---->
  


<!--footer section start---->

<?php $this->load->view('user/footer');?>


<!---footer section end---->

</body>
</html>