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
        <h1>Manage Product</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i>Admin Home</a></li>
        </ol>
    </section>




    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">

                    <div class="box-header with-border">
                        <div>
                            <h2 class="box-title">View Product</h2>
                        </div>

                    </div>




                    <div class="box-body">

                        <table id="datatable" class="table table-bordered table-striped delTable">


                            <thead>
                                <tr>
                                    <th class="no-sort">Sl no</th>
                                    <th>Tittle</th>
                                    <th>Description</th>
                                    <th>Position</th>
                                    <th>Image</th>
                                    <th>Action</th>


                                </tr>
                            </thead>



                            <tbody>
                                <?php $i=1;?>
                                <?php 
									              foreach($product as $prod_data):?>
                                <tr>

                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $prod_data->product_name; ?></td>
                                    <?php $desc_data = strip_tags($prod_data->product_desc); ?>
                                    <td><?php echo substr($desc_data,0,50) ?></td>
                                    <td><?php echo $prod_data->position; ?></td>
                                   
                                    <td>
                                        <a href="<?php echo base_url();?>uploads/product/<?php echo $prod_data->product_image; ?>"
                                            class="fancybox-media">
                                            <img src="<?php echo base_url(); ?>uploads/product/<?php echo $prod_data->product_image;?>"
                                                height="100px" width="150px" />
                                        </a>
                                    </td>

                                    <td>

                                        <a style="color:rgb(102, 102, 102);"
                                            href="<?php echo base_url(); ?>admin/Product/EditProduct/<?php echo $prod_data->product_id;?>"
                                            class="edit" data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="Edit"><i style="color:rgb(255, 204, 102);"
                                                class="fa fa-pencil-square-o"></i> Edit
                                        </a><br>

                                        <a style="color:rgb(102, 102, 102);"
                                            href="<?php echo base_url();?>admin/Product/DeleteProduct/<?php echo $prod_data->product_id;?>"
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








    <!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>