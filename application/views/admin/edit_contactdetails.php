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
        <h1> Manage Contact Details</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin/home"><i class="fa fa-dashboard"></i>Admin Home</a></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <form name="add_menu" id="add_menu" method="POST" enctype="multipart/form-data">
                    <div class="box">
                        <div class="box-body">
                            <!-- Form Element sizes -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h2 class="box-title">Edit Contact Details</h2>
                                </div>
                                <div class="box-body">






                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 row-seperate">
                                            <label>Address<strong style="color:#F00;">*</strong></label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 row-seperate">
                                            <textarea class="form-control" name="address" id="cat_name" row="6"
                                                type="text" value=""
                                                required><?php echo $contact_data['contact_adress']; ?></textarea>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 row-seperate">
                                            <label>Phone 1<strong style="color:#F00;">*</strong></label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 row-seperate">
                                            <input class="form-control" name="phone1" id="cat_name"
                                                value="<?php echo $contact_data['contact_phone1']; ?>" required>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 row-seperate">
                                            <label>Phone 2<strong style="color:#F00;">*</strong></label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 row-seperate">
                                            <input class="form-control" name="phone2" id="cat_name"
                                                value="<?php echo $contact_data['contact_phone2']; ?>" required>
                                        </div>
                                    </div>





                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3 row-seperate">
                                            <label>Email1<strong style="color:#F00;">*</strong></label>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 row-seperate">
                                            <input class="form-control" name="email1" id="cat_name" type="email"
                                                value="<?php echo $contact_data['contact_email1']; ?>" required>
                                        </div>
                                    </div>




                                    



                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.box-body -->


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" id="submitbutton">Submit</button>
                            <a href="javascript:history.go(-1)" class="btn btn-primary">Cancel</a>
                        </div>


						
                    </div><!-- /.box -->
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>