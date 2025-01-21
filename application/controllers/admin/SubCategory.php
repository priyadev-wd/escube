<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SubCategory extends MY_Controller 
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
		
	
		
public function AddSubCategory()
    {
	   $data['seo_title']= "Sub Category | ".$this->data['admin_title']."";
	   $data['subcategory'] = $this->Admin_model->fetch_all_by_desc('subcat','subcat_id');
	   $data['category'] = $this->Admin_model->fetch_all_by_desc('category','category_id');
	   if($_POST):
	   
		$pack_data  	= array
			(  
				'subcat_parent_id'         => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('category')),
				'subcat_name'          => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('Subcategory')),
				
		        'subcat_slug'          => $this->create_slug($this->input->post('Subcategory')),
						
						
							  
			);
			
		$cid = $this->Admin_model->insertsection('subcat',$pack_data);
		
	

		
		$this->session->set_flashdata('success','SubCategory Added Succesfully');




		if(!empty($_FILES["image"]["name"]))
		{
			
			for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
			{
				if($_FILES["image"]["name"][$i]!='')
				{	
					
										
					$filename2 	= 	basename($_FILES["image"]["name"][$i]);
					$ext2 		= 	@end(explode('.', $filename2));
					$ext2 		= 	strtolower($ext2);			
					$gallery2    = 	"prod_".rand().'.'.$ext2;			
					$uploadfile2 = 	"uploads/innerbanners";
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
					
					
					$data_imgg  	= array('subcat_banner'  =>$gallery2);
					$condd  	= 	array('subcat_id'  =>$cid);
					$add_imgg	=	$this->Admin_model->update_all($data_imgg,$condd,'subcat');

		        }
	        }
		}
	  
	  
		 	
			
	  
		$this->session->set_flashdata('success','Subcategory Added Succesfully');
		redirect(base_url().'admin/SubCategory/AddSubCategory');
		endif;
		  $this->load->view('admin/add_subcat',$data);
	}
		
public function EditSubCategory($cid)
	{
		 $cond	=	array('subcat_id' => $cid);
		 $data['subcategory']	=	$this->Admin_model->fetch_one_row('subcat',$cond);
		 $data['category'] = $this->Admin_model->fetch_all_by_desc('category','category_id');
		 $data['seo_title']=  "Edit Subcategory | ".$this->data['admin_title']."";
		 if($_POST):
		
		 $catdata  	= array(  
		                         'subcat_parent_id'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('cat')),
								 'subcat_name'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('subcat')),
								
								 'subcat_slug'  => $this->change_slug($this->input->post('cat'),$cid),	
									
							);
										
										
		$cond	=	array('subcat_id'	=>	$cid);
		$edit 	= 	$this->Admin_model->update_all($catdata,$cond,'subcat');
		
		$this->session->set_flashdata('success','SUbCategory Updated Succesfully');



		if(!empty($_FILES["image"]["name"]))
		{
			
			for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
			{
				if($_FILES["image"]["name"][$i]!='')
				{				
					
					@unlink('uploads/innerbanners/'.$data['subcat']['subcat_banner']);			
					
					@unlink('uploads/innerbanners/thumb/'.$data['subcat']['subcat_banner']);			
							
					$filename2 	= 	basename($_FILES["image"]["name"][$i]);
					$ext2 		= 	@end(explode('.', $filename2));
					$ext2 		= 	strtolower($ext2);			
					$gallery2    = 	"ban_".rand().'.'.$ext2;			
					$uploadfile2 = 	"uploads/innerbanners";
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

					
					$image  	= 	array('subcat_banner'  => $gallery2);
					$cond		= 	array('subcat_id' 	=>	$cid);
					$add_img2	=	$this->Admin_model->update_all($image,$cond,'subcat');
						

				}
			}
		}
		
		
		
		
		
		
		$this->session->set_flashdata('success','SubCategory Updated Succesfully');
	    redirect(base_url().'admin/SubCategory/EditSubCategory/'.$cid);
		endif;
		$this->load->view('admin/edit_subcat',$data);	
	}
	 
	public function  DeleteSubCategory($cid)
	 { 
	    
		
		$cond2 = array('product_sub_cat' => $cid);
		$data['product'] = $this->Admin_model->fetch_data('product',$cond2);
		
		foreach($data['product'] as $img){
			 @unlink('uploads/product/thumb/'.$img->product_image); 
			 @unlink('uploads/product/'.$img->product_image); 
			}

		
		$this->db->where('product_sub_cat',$cid);
		$this->db->delete('product');	
	    
	    $this->db->where('subcat_id',$cid);
	    $this->db->delete('subcat');
		
		
		
		
	    $this->session->set_flashdata('success', 'SubCategory And Realted Service Deleted Successfully.'); 
	    redirect(base_url().'admin/SubCategory/AddSubCategory');
	}
		
	
	public function create_slug($name)
		{
			
			$count 	= 	0;
			$name 	= 	url_title($name);
			$slug_name 	= 	$name;             // Create temp name
			while(true) 
			{
				$this->db->select('*');
				$this->db->where('subcat_slug', $slug_name);   // Test temp name
				$query = $this->db->get('subcat');
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
				$this->db->where('subcat_slug', $slug_name); 
				$this->db->where_not_in('subcat_id', $id);  // Test temp name
				$query 	= 	$this->db->get('subcat');
				if ($query->num_rows() == 0) break;
				$slug_name 	= 	$name . '-' . (++$count);  // Recreate new temp name
			}
			return $slug_name;
		}			
	
		
		
	
	 
 }