<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Innerbanner extends MY_Controller
{
		// construct
    public function __construct()
		{
			parent::__construct();
			$this->load->database();
            $this->load->library('form_validation');
			$this->load->helper(array('form', 'url', 'text'));
            $this->load->model("Admin_model");
			//$this->pr_details=get_profile_details();
			$this->load->library('session');
				if(!$this->session->userdata('adminId'))
				{
					redirect(base_url().'admin/login');	
				}	
				
				
				//get user details
        }
		
		
	public function index()

		{  
		   
		   	$data['banner_datas']	=	$this->Admin_model->fetch_all_by_desc('innerbanner','id');
		    $parent =  $this->uri->segment(4);	
			$data['seo_title'] 	= 	"View Banners | ".$this->data['admin_title'].""; 
			$this->load->view('admin/view_innerbanners',$data);
		
        }
	
	
		// Add Qualification   
       
	public function EditBanner($bid)
		{
			
			
			$cond=array('id' => $bid);
			
			$data['banner_data'] 	= 	$this->Admin_model->fetch_one_row('innerbanner',$cond);
			
			$data['seo_title'] 	= 	"Edit Banner | ".$this->data['admin_title'].""; 
			
							
			//if($_POST):
				
			/*$ban_data = array
			    (
			
					'ban_main_heading' => $this->input->post('main_heading'),
					'ban_sub_heading' => $this->input->post('sub_heading'),
					'ban_desc' => $this->input->post('desc'),
					
			
			    );
			
			$this->Admin_model->update_all($ban_data,$cond,'banners');*/
			
			
		    if(!empty($_FILES["image"]["name"]))
			{
								
				for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
				{
					if($_FILES["image"]["name"][$i]!='')
					{
											
						@unlink('uploads/innerbanners/'.$data['banner_data']['image']);
																	
						$filename2 	= 	basename($_FILES["image"]["name"][$i]);
						$ext2 		= 	@end(explode('.', $filename2));
						$ext2 		= 	strtolower($ext2);			
						$gallery2    = 	"banner_".rand().'.'.$ext2;			
						$uploadfile2 = 	"uploads/innerbanners";
						move_uploaded_file($_FILES["image"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
						
						$more_docs  	= 	array(
							   'id'  =>$bid,
							   'image'  => $gallery2,);
						$add_img2	=	$this->Admin_model->update_all($more_docs,$cond,'innerbanner');
							
				    }
				}
			
					
			
			$this->session->set_flashdata('success', 'Banner updated Successfully.'); 
				
			redirect(base_url().'admin/Innerbanner');
			
			}
				
			//endif;
			
			$this->load->view('admin/edit_innerbanners', $data);
				
        }
		
	
}