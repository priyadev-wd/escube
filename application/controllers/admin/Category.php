<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends MY_Controller 
 {
	  public function __construct()
		{
				parent::__construct();
				$this->load->database();
                $this->load->library('form_validation');
				$this->load->helper(array('form', 'url', 'text'));
                $this->load->model("Admin_model");
				$this->load->library('image_lib');
				
				$this->load->library('session');
				if(!$this->session->userdata('adminId'))
				{
					redirect(base_url().'admin/login');	
				}	
				
        }
		
		
	public function index(){
		
		
		}	
		
	
		
public function AddCategory()
    {
	    $data['seo_title']= "Category | ".$this->data['admin_title']."";
	    $data['category'] = $this->Admin_model->fetch_all_by_desc('category','category_id');
	    if($_POST):
	   
	    $catdata  	= array(  
	                         'category_name'       => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('name')),
							 //'category_desc'       => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('desc')),
							 //'category_dimension'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('dimension')),
							 'category_slug'       => $this->create_slug($this->input->post('name')),
							
							
								  
							);
							
		  $cid = $this->Admin_model->insertsection('category',$catdata);
		  
		  if(!empty($_FILES["image"]["name"]))
		   {
			
			for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
			{
				if($_FILES["image"]["name"][$i]!='')
				{	
					
										
					$filename2 	= 	basename($_FILES["image"]["name"][$i]);
					$ext2 		= 	@end(explode('.', $filename2));
					$ext2 		= 	strtolower($ext2);			
					$gallery2    = 	"cat_".rand().'.'.$ext2;			
					$uploadfile2 = 	"uploads/category";
					move_uploaded_file($_FILES["image"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
					
					
					$config_manip = array(
						'image_library' => 'gd2',
						'source_image' => $uploadfile2."/".$gallery2,
						'new_image' => $uploadfile2."/thumb/".$gallery2,
						'maintain_ratio' => TRUE,
						'quality' => '50%',
						'width' => 450,
						'height' => 450
					);

					$this->image_lib->initialize($config_manip);

					$this->image_lib->resize();

					$this->image_lib->clear();
					
					
					$data_imgg  	= array('category_img'  =>$gallery2);
					$condd  	= 	array('category_id'  =>$cid);
					$add_imgg	=	$this->Admin_model->update_all($data_imgg,$condd,'category');

		        }
	        }
		}
		



		if(!empty($_FILES["ban"]["name"]))
		{
		 
		 for ($i = 0; $i < count($_FILES['ban']['name']); $i++) 
		 {
			 if($_FILES["ban"]["name"][$i]!='')
			 {	
				 
									 
				 $filename2 	= 	basename($_FILES["ban"]["name"][$i]);
				 $ext2 		= 	@end(explode('.', $filename2));
				 $ext2 		= 	strtolower($ext2);			
				 $gallery2    = 	"cat_".rand().'.'.$ext2;			
				 $uploadfile2 = 	"uploads/innerbanners";
				 move_uploaded_file($_FILES["ban"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
				 
				 
				 $config_manip = array(
					 'image_library' => 'gd2',
					 'source_image' => $uploadfile2."/".$gallery2,
					 'new_image' => $uploadfile2."/thumb/".$gallery2,
					 'maintain_ratio' => TRUE,
					 'quality' => '50%',
					 'width' => 450,
					 'height' => 450
				 );

				 $this->image_lib->initialize($config_manip);

				 $this->image_lib->resize();

				 $this->image_lib->clear();
				 
				 
				 $data_imgg  	= array('category_banner'  =>$gallery2);
				 $condd  	= 	array('category_id'  =>$cid);
				 $add_imgg	=	$this->Admin_model->update_all($data_imgg,$condd,'category');

			 }
		 }
	 }
	 
		  
		  
		  $this->session->set_flashdata('success','Category Added Succesfully');
		  
		   
		  
		  redirect(base_url().'admin/Category/AddCategory');
		  endif;
		  $this->load->view('admin/add_category',$data);
	}
		
    public function EditCategory($cid)
	{
		 $cond	=	array('category_id' => $cid);
		 $data['category']	=	$this->Admin_model->fetch_one_row('category',$cond);
		
		 $data['seo_title']=  "Edit Category | ".$this->data['admin_title']."";
		 if($_POST):
		
		 $catdata  	= array(  
		                         'category_name'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('name')),
								 //'category_dimension'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('dimension')),
								 //'category_desc'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('desc_i')),
								 'category_slug'  => $this->change_slug($this->input->post('name'),$cid),	
									
							);
										
										
		$cond	=	array('category_id'	=>	$cid);
		$edit 	= 	$this->Admin_model->update_all($catdata,$cond,'category');
		$this->session->set_flashdata('success','Category Updated Succesfully');
		
		if(!empty($_FILES["image"]["name"]))
				{
								
					for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
						{
							if($_FILES["image"]["name"][$i]!='')
								{				
										
									@unlink('uploads/category/'.$data['category']['category_img']);		
									unlink('uploads/category/thumb/'.$data['category']['category_img']);		
									$filename2 	= 	basename($_FILES["image"]["name"][$i]);
					                $ext2 		= 	@end(explode('.', $filename2));
					                $ext2 		= 	strtolower($ext2);			
					                $gallery2    = 	"cat_".rand().'.'.$ext2;			
					                $uploadfile2 = 	"uploads/category";
					                move_uploaded_file($_FILES["image"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
								   
									$config_manip = array(
										'image_library' => 'gd2',
										'source_image' => $uploadfile2."/".$gallery2,
										'new_image' => $uploadfile2."/thumb/".$gallery2,
										'maintain_ratio' => TRUE,
										'quality' => '50%',
										'width' => 450,
										'height' => 450
									);
				
									$this->image_lib->initialize($config_manip);
				
									$this->image_lib->resize();
				
									$this->image_lib->clear();
									
									
									$image  	= 	array('category_img'  => $gallery2);
					                $cond		= 	array('category_id' 	=>	$cid);
					                $add_img2	=	$this->Admin_model->update_all($image,$cond,'category');
						
				                }
				        }
				}


				if(!empty($_FILES["ban"]["name"]))
				{
								
					for ($i = 0; $i < count($_FILES['ban']['name']); $i++) 
						{
							if($_FILES["ban"]["name"][$i]!='')
								{				
										
									@unlink('uploads/innerbanners/'.$data['category']['category_banner']);		
									unlink('uploads/innerbanners/thumb/'.$data['category']['category_banner']);		
									$filename2 	= 	basename($_FILES["ban"]["name"][$i]);
					                $ext2 		= 	@end(explode('.', $filename2));
					                $ext2 		= 	strtolower($ext2);			
					                $gallery2    = 	"cat_".rand().'.'.$ext2;			
					                $uploadfile2 = 	"uploads/innerbanners";
					                move_uploaded_file($_FILES["ban"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
								   
									$config_manip = array(
										'image_library' => 'gd2',
										'source_image' => $uploadfile2."/".$gallery2,
										'new_image' => $uploadfile2."/thumb/".$gallery2,
										'maintain_ratio' => TRUE,
										'quality' => '50%',
										'width' => 450,
										'height' => 450
									);
				
									$this->image_lib->initialize($config_manip);
				
									$this->image_lib->resize();
				
									$this->image_lib->clear();
									
									
									$image  	= 	array('category_banner'  => $gallery2);
					                $cond		= 	array('category_id' 	=>	$cid);
					                $add_img2	=	$this->Admin_model->update_all($image,$cond,'category');
						
				                }
				        }
				}
		
		
		$this->session->set_flashdata('success','Category Updated Succesfully');
	    redirect(base_url().'admin/Category/EditCategory/'.$cid);
		endif;
		$this->load->view('admin/edit_category',$data);	
	}
	 
	public function  DeleteCategory($cid)
	    { 
	    
		    $cond2 = array('product_cat' => $cid);
			$data['products'] = $this->Admin_model->fetch_data('product',$cond2);
			foreach($data['products'] as $img){
			@unlink('uploads/product/'.$img->product_image); 
			@unlink('uploads/product/thumb/'.$img->product_image);
			
	    }
		$cond3 = array('category_id' => $cid);
		$data['category'] = $this->Admin_model->fetch_one_row('category',$cond3);
		@unlink('uploads/category/'.$data['category']['category_img']);
		@unlink('uploads/category/thumb/'.$data['category']['category_img']);

		@unlink('uploads/innerbanners/'.$data['category']['category_banner']);
		@unlink('uploads/innerbanners/thumb/'.$data['category']['category_banner']);
	    
	    $this->db->where('category_id',$cid);
		$this->db->delete('category');
		
		$this->db->where('subcat_parent_id',$cid);
	    $this->db->delete('subcat');
		
		$this->db->where('product_cat',$cid);
	    $this->db->delete('product');
		
		
	    $this->session->set_flashdata('success', 'Category And Realted Product Deleted Successfully.'); 
	    redirect(base_url().'admin/Category/AddCategory');
	}
		
	
	public function create_slug($name)
		{
			
			$count 	= 	0;
			$name 	= 	url_title($name);
			$slug_name 	= 	$name;             // Create temp name
			while(true) 
			{
				$this->db->select('*');
				$this->db->where('category_slug', $slug_name);   // Test temp name
				$query = $this->db->get('category');
				if ($query->num_rows() == 0) break;
				$slug_name 	=	$name . '-' . (++$count);  // Recreate new temp name
			}
			return $slug_name;
		}
			
	   
	 public function change_slug($name,$id)
		{
			$count 	= 	0;
			$name 	= 	url_title($name);
			$slug_name 	= 	$name;  
			//echo $slug_name;
			//exit;           // Create temp name
			while(true) 
			{
				$this->db->select('*');
				$this->db->where('category_slug', $slug_name); 
				$this->db->where_not_in('category_id', $id);  // Test temp name
				$query 	= 	$this->db->get('category');
				if ($query->num_rows() == 0) break;
				$slug_name 	= 	$name . '-' . (++$count);  // Recreate new temp name
			}
			return $slug_name;
		}			
	
		
		
	
	 
 }