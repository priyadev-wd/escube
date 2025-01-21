<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="author" content="">


<meta name="description" content="<?php echo $client_seo['meta_description']; ?>">
<meta name="keywords" content="<?php echo $client_seo['meta_keyword']; ?>">
<title><?php if(!empty($client_seo['meta_title'])){ echo $client_seo['meta_title'];} else{ echo "Esqube"; } ?></title>






<!---header section start--->


<?php $this->load->view('user/header'); ?>


<!-----header section end-->



<!---banner section start----->

<section class="banimg">

  <img src="<?php echo base_url();?>uploads/innerbanners/<?php echo $client_banner['image'];?>" class="loaded" data-was-processed="true">

  <div class="col-lg-12 inner_banner_text">

      <h1 class="inner_banner_text">Our Clients</h1>

  </div>

</section>


<!--banner section end------>




<!---page content start----->


<div class="client-innersec mb-5">
  <div class="container">
  
 <div class=" row justify-content-center">
        
       <?php foreach($clients as $client){ ?>  
        
        <div class="col-lg-2 col-md-3 col-sm-4 col-6  d-flex ">
          <div class="onlineclass"> <img src="<?php echo base_url();?>uploads/client/<?php echo $client->client_img;?>" alt="" class="lazyload">
          
          </div>
        </div>


        <?php } ?> 
         
        
		
        
      </div>
  
    
  </div>
</div>




<!---page content end---->
  


<!---footer section start--->

<?php $this->load->view('user/footer'); ?>

<!---footer section end--->



</body>
</html>