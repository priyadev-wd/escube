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
        <h1>Manage Category </h1>
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
                                    <h2 class="box-title">Add Category</h2>
                                </div>


                                <div class="box-body">

                                    <?php $parent = $this->uri->segment(4); ?>

                                   
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 row-seperate">
                                            <label>Category Name<strong style="color:#F00;">*</strong></label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 row-seperate">
                                            <select class="form-control" name="category" required>
                                                <option selected disabled value="">Select category</option>
                                                <?php
                                                    foreach($category as $cat){
									            ?>
                                                <option value="<?php echo $cat->category_id; ?>">
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
							                        <input class="form-control" name="Subcategory"  placeholder="Sub category" type="text" required>	
												</div>
                                            </div>




                                            <!-- <div class="row">
												<div class="col-xs-12 col-sm-3 row-seperate">
												    <label>Description<strong style="color:#F00;">*</strong></label>
												</div>
												<div class="col-xs-12 col-sm-9 row-seperate">
												<textarea class="form-control" name="desc"  id="editor1"  rows="5" cols="40"  type="text"></textarea>	
											</div>
                                            </div> -->



                                            <div class="row">
												<div class="col-xs-12 col-sm-3 row-seperate">
												    <label>Default Banner(345*285px)<strong style="color:#F00;"></strong></label>
											
												</div>
									            <div class="col-xs-12 col-sm-9 row-seperate">
							                        <input  class="form-control" name="image[]" id="typ_name" onchange="Filevalidation()"  type="file"  style="width:40%;display:inline-block" >
							                         <br /><br />
							                    </div>
											</div>
                                   





                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.box-body -->




                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" id="submitbutton">Add</button>
                            <a href="javascript:history.go(-1)" class="btn btn-primary">Cancel</a>

                        </div>



                    </div><!-- /.box -->
                </form>



            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    <!-- Main content -->





    <!---view page section start--->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">


                    <div class="box-header with-border">
                        <div>
                            <h2 class="box-title">View SubCategory</h2>
                        </div>
                    </div>




                    <div class="box-body">

                        <table id="datatable" class="table table-bordered table-striped delTable">


                            <thead>
                                <tr>
                                    <th class="no-sort">Sl no</th>
                                    <th>Sub Category Name</th>
                                    <!--<th>Image</th>--->__DIR__
                                    <th>Action</th>
                                </tr>
                            </thead>



                            <tbody>
                                <?php $i=1;?>
                                <?php 
								foreach($subcategory as $cat_data):?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $cat_data->subcat_name; ?></td>
                                    <!--<td>
										  <a href="<?php echo base_url();?>uploads/subcat/<?php echo $cat_data->subcat_img; ?>" class="fancybox-media">
											  <img src="<?php echo base_url(); ?>uploads/subcat/<?php echo $cat_data->subcat_img;?>" height="100px" width="150px" />
										  </a>
										</td>--->
                                    <td>

                                        <a style="color:rgb(102, 102, 102);"
                                            href="<?php echo base_url(); ?>admin/SubCategory/EditSubCategory/<?php echo $cat_data->subcat_id;?>"
                                            class="edit" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit"><i style="color:rgb(255, 204, 102);"
                                                class="fa fa-pencil-square-o"></i> Edit
                                        </a><br>


                                        <a style="color:rgb(102, 102, 102);"
                                            href="<?php echo base_url();?>admin/SubCategory/DeleteSubCategory/<?php echo $cat_data->subcat_id;?>"
                                            class="delete" data-toggle="tooltip" data-placement="top" title="Delete"
                                            onclick="return confirm('Are you absolutely sure you want to delete?');"><i
                                                style="color:red" class="fa fa-times"></i> Delete
                                        </a>

                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>



                            <input type="hidden" id="alert-notification"
                                value="Are you sure you want to delete this banner record?">
                        </table>



                    </div><!-- /.box-body -->
                </div>







            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>



    <!----view page section end--->





    <!-- /.content -->
</div><!-- /.content-wrapper -->






<script type="text/javascript">
$(document).ready(function() {
    var maxField = 4;
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var fieldHTML =
        '<div> <input class="form-control" name="cat_more[]" multiple type="text" required style="width:40%;display:inline-block">&nbsp&nbsp;<a href="javascript:void(0);" class="remove_button" title="Remove field">&nbsp;<img src="<?php echo base_url();?>assets/admin/img/remove-icon.png"/></a></div><br>'; //New input field html 
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