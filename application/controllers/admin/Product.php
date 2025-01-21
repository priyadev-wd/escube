<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends MY_Controller 
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
	
	
		
	public function index()
	{
		$data['seo_title']= "View Products | ".$this->data['admin_title']."";
		$data['product'] = $this->Admin_model->fetch_all_by_asc('product','position');
		//  print_r($data['product']);
		//  exit();
		$this->load->view('admin/view_product',$data);
	
	}	
		
	
		
	public function AddProduct()
	{
		$data['seo_title']= "Add Product | ".$this->data['admin_title']."";
		$data['category'] = $this->Admin_model->fetch_all_by_desc('category','category_id');
		if ($_POST) :

			$totalProducts = $this->Admin_model->get_total_products();

			// Increment the total number of products by 1 to get the new position
			$position = $totalProducts + 1;
		
			

			// Check if there's already a product with the same position
			$check = $this->Admin_model->fetch_one_row('product', array('position' => $position));
			if (!empty($check)) {
				// If there's a product with the same position, adjust the position of the new product
				$id = $check['product_id'] + 1;
				$data['sql_last_row'] = $this->Admin_model->fetch_limit('product', 1, 0, 'product_id', 'DESC');
				$last = $data['sql_last_row']['product_id'];
				$pid = $this->Admin_model->update_positions($id, $last);
			}
	

		$testdata  	= array(  
			           
							'product_cat'        => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('category')),
							'product_sub_cat'    => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('sucat')),
							'product_in_homepage'    => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('home_page')),
							'product_name'       => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('tittle')),
							'product_dimension'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('dimension')),
							'product_desc'       => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('desc_i')),
							'product_meta_title'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('metatitle')),
							'product_meta_desc'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('metadescription')),
							'product_meta_keyword'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('metakeyword')),
							'product_slug'  => $this->create_slug($this->input->post('tittle')),
						
							);
						
								
		$cid = $this->Admin_model->insertsection('product',$testdata);
		$this->session->set_flashdata('success','Product Added Succesfully');
			
			
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
					$uploadfile2 = 	"uploads/product";
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
					
					
					$data_imgg  	= array('product_image'  =>$gallery2);
					$condd  	= 	array('product_id'  =>$cid);
					$add_imgg	=	$this->Admin_model->update_all($data_imgg,$condd,'product');

		        }
	        }
		}
			
			
			
		$this->session->set_flashdata('success','Product Added Succesfully');
		
		redirect(base_url().'admin/Product/AddProduct');
		endif;
		$this->load->view('admin/add_product',$data);
	}

		
	public function EditProduct($cid)
{
    $cond = array('product_id' => $cid);
    $data['product'] = $this->Admin_model->fetch_one_row('product', $cond);
    $data['category'] = $this->Admin_model->fetch_all_by_desc('category', 'category_id');
    $data['subcat'] = $this->Admin_model->fetch_all_by_desc('subcat', 'subcat_id');

    
	
 
	
	 $data['seo_title'] = "Edit Product | " . $this->data['admin_title'];
 
	 if ($_POST) :
		$position = $this->input->post('position');

	
		$check = $this->Admin_model->fetch_one_row('product', array('position' => $position));
		if (!empty($check)) {
		
			$id = $check['product_id'] ; 
			$data['sql_last_row'] = $this->Admin_model->fetch_limit('product', 1, 0, 'product_id', 'DESC');
			$last = $data['sql_last_row']['product_id'];
			
			$this->Admin_model->adjustProductPositions($position, $last);
		
			$pid = $this->Admin_model->update_positions($id, $last);
		}
	

        $proddata = array(
			'position' => $position,
            'product_cat' => $this->input->post('category'),
            'product_sub_cat' => $this->input->post('subcat'),
            'product_in_homepage' => $this->input->post('home_page'),
            'product_name' => $this->input->post('tittle'),
            'product_dimension' => $this->input->post('dimension'),
            'product_desc' => $this->input->post('desc_i'),
            'product_meta_title' => $this->input->post('metatitle'),
            'product_meta_desc' => $this->input->post('metadescription'),
            'product_meta_keyword' => $this->input->post('metakeyword'),
            'product_slug' => $this->change_slug($this->input->post('tittle'), $cid),
        );

        $cond = array('product_id' => $cid);
        $edit = $this->Admin_model->update_all($proddata, $cond, 'product');
        $this->session->set_flashdata('success', 'Product Updated Successfully');

        if (!empty($_FILES["image"]["name"])) {
            for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
                if ($_FILES["image"]["name"][$i] != '') {
                    @unlink('uploads/product/' . $data['product']['product_image']);
                    @unlink('uploads/product/thumb/' . $data['product']['product_image']);
                    $filename2 = basename($_FILES["image"]["name"][$i]);
                    $ext2 = end(explode('.', $filename2));
                    $ext2 = strtolower($ext2);
                    $gallery2 = "prod_" . rand() . '.' . $ext2;
                    $uploadfile2 = "uploads/product";
                    move_uploaded_file($_FILES["image"]["tmp_name"][$i],  $uploadfile2 . "/" . $gallery2);
                    $config_manip = array(
                        'image_library' => 'gd2',
                        'source_image' => $uploadfile2 . "/" . $gallery2,
                        'new_image' => $uploadfile2 . "/thumb/" . $gallery2,
                        'maintain_ratio' => TRUE,
                        'quality' => '50%',
                        'width' => 450,
                        'height' => 450
                    );

                    $this->image_lib->initialize($config_manip);
                    $this->image_lib->resize();
                    $this->image_lib->clear();

                    $image = array('product_image'  => $gallery2);
                    $cond = array('product_id'  => $cid);
                    $add_img2 = $this->Admin_model->update_all($image, $cond, 'product');
                }
            }
        }
	

        $this->session->set_flashdata('success', 'Product Updated Successfully');
        redirect(base_url() . 'admin/Product/EditProduct/' . $cid);
    endif;

    $this->load->view('admin/edit_product', $data);
}


	public function  DeleteProduct($cid)
	{ 
	    $cond = array('product_id' => $cid);
	    $data['product'] = $this->Admin_model->fetch_one_row('product',$cond);
	    @unlink('uploads/product/'.$data['product']['product_image']);	
		@unlink('uploads/product/thumb/'.$data['product']['product_image']);	
	    $this->db->where('product_id',$cid);
	    $this->db->delete('product');
	    $this->session->set_flashdata('success', 'Product Deleted Successfully.'); 
	    redirect(base_url().'admin/Product');
	}
		
	
	public function create_slug($name)
		{
			
			$count 	= 	0;
			$name 	= 	url_title($name);
			$slug_name 	= 	$name;             // Create temp name
			while(true) 
			{
				$this->db->select('*');
				$this->db->where('product_slug', $slug_name);   // Test temp name
				$query = $this->db->get('product');
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
				$this->db->where('product_slug', $slug_name); 
				$this->db->where_not_in('product_id', $id);  // Test temp name
				$query 	= 	$this->db->get('product');
				if ($query->num_rows() == 0) break;
				$slug_name 	= 	$name . '-' . (++$count);  // Recreate new temp name
			}
			return $slug_name;
		}	
		
		
		
		
		public function GetSubcat()
		{
			
			$getsubcat = $this->input->post('getsubcat');
			
			if($getsubcat > 0)
			{
			
		  $data['all_subcat']	    = $this->Admin_model->fetch_sub_cat($getsubcat);
			
			$output = '<div class="col-xs-12 col-sm-3 row-seperate">
							 <label>  Select SubCategory<strong style="color:#F00;">*</strong></label>
                             </div>
                             <div class="col-xs-12 col-sm-9 row-seperate">
			<select class="form-control" name="sucat" required><option value="">Select SubCategory</option>';
			
			
						foreach($data['all_subcat'] as $item=>$val):
						
						
							$output .= '<option value="' . $val->subcat_id. '">' .$val->subcat_name. '</option>';
						
						 endforeach;
					$output .= '</select></div>';
			
			
			echo $output;
			}
		}



		public function GetSubcat_edit()
		
		{
			
			$getsubcat = $this->input->post('getsubcat');
			
			
			if($getsubcat > 0)
			
			{
			
		   $data['all_subcat']	    = $this->Admin_model->fetch_sub_cat($getsubcat);
			
			$output = '';
			
			            if(!empty($data['all_subcat']))
						{
						foreach($data['all_subcat'] as $item=>$val):
						
							$output .= '<option value="' . $val->subcat_id . '">' . $val->subcat_name . '</option>';
						
						 endforeach;
						 
						}
						
						else
						{
						
						$output .= '<option value="" selected required>No Sub Category Added</option>';
							
						}
						
					$output .= '</select></div>';
			
			
			echo $output;
			}
			
		}

		
	
	 
 }

 
 
