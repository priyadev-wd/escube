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
        <h1> Manage SubCategory</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i>Admin Home</a></li>
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




                <form name="add_menu" id="add_menu" method="POST" enctype="multipart/form-data">
                    <div class="box">
                        <div class="box-body">
                            <!-- Form Element sizes -->
                            <div class="box box-success">


                                <div class="box-header with-border">
                                    <h2 class="box-title">Edit SubCategory</h2>
                                </div>


                                <div class="box-body">

                                    <?php $parent = $this->uri->segment(4); ?>


                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 row-seperate">
                                            <label>Category Name<strong style="color:#F00;">*</strong></label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 row-seperate">
                                            <select class="form-control" name="cat" required>
                                                <option selected disabled value="">Select Category</option>
                                                <?php
                                                    foreach($category as $cat){
									            ?>
                                                <option value="<?php echo $cat->category_id; ?>"
                                                    <?php if($cat->category_id==$subcategory['subcat_parent_id']){ echo "selected"; }?>>
                                                    <?php echo $cat->category_name;?></option>
                                                <?php
									                }
								                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 row-seperate">
                                            <label>Sub Category<strong style="color:#F00;">*</strong></label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 row-seperate">
                                            <input class="form-control" name="subcat" placeholder="category" type="text"
                                                value="<?php echo $subcategory['subcat_name']; ?>" required>
                                        </div>
                                    </div>



                                    <div class="row">
						     <div class="col-xs-12 col-sm-3 row-seperate">
							 <label> Banner<strong style="color:#F00;"></strong></label>
                             </div>
                             <div class="col-xs-12 col-sm-9 row-seperate">
                             <?php if(!empty($subcategory['subcat_banner'])): ?>
	    <input class="form-control" name="image[]"  type="file">
      <img src="<?php echo base_url();?>uploads/innerbanners/<?php echo $subcategory['subcat_banner']?>" style="width:100%;height:300px;margin:20px 0px;object-fit:contain;"> 
      <?php else: ?>
            <img src="<?php echo base_url();?>assets/admin/img/default_image.jpg" style="width:100%;height:300px;margin:20px 0px;object-fit:contain;"> <!-- Replace default_image.jpg with your default image file -->
        <?php endif; ?>
     (1349 X 450)pixels
     
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
$(document).ready(function() {
    var maxField = 4;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var fieldHTML =
        '<div> <input class="form-control" name="document_more[]" multiple type="file" required style="width:40%;display:inline-block">&nbsp&nbsp;<a href="javascript:void(0);" class="remove_button" title="Remove field">&nbsp;<img src="<?php echo base_url();?>assets/admin/img/remove-icon.png"/></a></div><br>'; //New input field html 
    var x = 1;
    $(addButton).click(function() {
        if (x < maxField) {
            x++;
            $(wrapper).append(fieldHTML);
        }
    });
    $(wrapper).on('click', '.remove_button', function(e) {
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
        url: '<?php echo base_url('admin/Product/GetSubcat_edit'); ?>',
        data: 'getsubcat=' + val,
        success: function(data) {

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