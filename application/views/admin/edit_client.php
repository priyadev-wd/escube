<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php $this->load->view('admin/includes/header');?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
       <?php $this->load->view('admin/includes/sidebar');?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Manage Client
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i>Admin Home</a></li>
             <!--<li><a href="<?php echo base_url();?>admin/Product"><img src="<?php echo base_url();?>assets/admin/img/images.png" style="height: 20px;padding: 0px 9px;" alt=""></a></li>-->
          </ol>
        </section>
		<section class="content">
          <div class="row">
            <div class="col-xs-12">  
            
            
             <?php if($this->session->flashdata('success')) {?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
			     	<?php echo $this->session->flashdata('success');?>
				</div>
            	<?php }?>
                <?php if($this->session->flashdata('error')) {?>
				<div class="alert alert-error">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
			     	<?php echo $this->session->flashdata('error');?>
				</div>
            	<?php }?>
            
            
            
            
			<form name="add_menu" id="add_menu" method="POST" enctype="multipart/form-data" >
			<div class="box">
                <div class="box-body">
				<!-- Form Element sizes -->
				  <div class="box box-success">
					<div class="box-header with-border">
					  <h2 class="box-title">Edit Client</h2>
					</div>
					<div class="box-body">
						 
                          <?php $parent = $this->uri->segment(4); ?>
                          
                          
                          
                          
                         
                             
                          
                          
                      <div class="row">
						     <div class="col-xs-12 col-sm-3 row-seperate">
							 <label>Default Image(124*80)<strong style="color:#F00;">*</strong></label>
                             </div>
                             <div class="col-xs-12 col-sm-9 row-seperate">
                              <a href="<?php echo base_url();?>uploads/client/<?php echo $client['client_img']; ?>" class="fancybox-media">
	                              <img src="<?php echo base_url(); ?>uploads/client/<?php echo $client['client_img']; ?>" width="150px" height="150px"/>
                               </a>   
							</div>
                          </div> 
                          
                          
                      
                          
                              
                          
                          
                          
                          <div class="row">
						     <div class="col-xs-12 col-sm-3 row-seperate">
							 <label>Update Default Image(size:184*80)<strong style="color:#F00;"></strong></label>
                             
                             </div>
                  <div class="col-xs-12 col-sm-9 row-seperate">
	    <input  class="form-control" name="image[]"  type="file"  id="typ_name" onchange="Filevalidation()" style="width:40%;display:inline-block" >
        <br /><br />
		</div>
                          </div>
                          
                          
                          
                              
                  
                          
                          
                          
                          
                          
                          
                                  				
					</div><!-- /.box-body -->
				  </div><!-- /.box -->			  

                </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" id="submitbutton">Update</button>
                    <a href="javascript:history.go(-1)" class="btn btn-primary">Cancel</a>
                    	
                  </div>
              </div><!-- /.box -->
			  </form>
              
              
                 
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
        <!-- Main content -->
        
        
    
        
        <!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
      
       <script type="text/javascript">   
	$(document).ready(function(){
		var maxField = 4; 
		var addButton = $('.add_button'); 
		var wrapper = $('.field_wrapper'); 
		var fieldHTML = '<div> <input class="form-control" name="document_more[]" multiple type="file" required style="width:40%;display:inline-block">&nbsp&nbsp;<a href="javascript:void(0);" class="remove_button" title="Remove field">&nbsp;<img src="<?php echo base_url();?>assets/admin/img/remove-icon.png"/></a></div><br>'; //New input field html 
		var x = 1; 
		$(addButton).click(function(){ 
			if(x < maxField){ 
				x++; 
				$(wrapper).append(fieldHTML); 
			}
		});
		$(wrapper).on('click', '.remove_button', function(e){ 
			e.preventDefault();
			$(this).parent('div').remove(); 
			x--; 
		});
	});
	
	
</script>
      
<script>
  function getsubcat(val) {
//alert(val)
	$.ajax({
		
	type: "POST",
   url:'<?php echo base_url('admin/Product/GetSubcat_edit'); ?>',
	data:'getsubcat='+val,
	success: function(data){
		
		$("#subcat").html(data);
		$('#subcat').css('display', 'block');
		
	}
	});
}
  </script>  
  
  

  <script>
	
	Filevalidation = () => {
		const fi = document.getElementById('typ_name');
		// Check if any file is selected.
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {
	  
				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >= 1096) {
					alert(
					  "File too Big, please select a file less than 1mb");
					  $("#typ_name").val('');
				} else if (file < 20) {
					/*alert(
					  "File too small, please select a file greater than 20kb");
					   $("#typ_name").val('');*/
				} else { 
				   /* document.getElementById('size').innerHTML = '<b>'
					+ file + '</b> KB';*/
				}
			}
		}
	}

</script>	
      
      
 <?php $this->load->view('admin/includes/footer');?>
 
   
 
 
 
  
    
 