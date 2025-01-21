<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Features extends MY_Controller
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
		   
		   	$data['feature_data']	=	$this->Admin_model->fetch_all('feature');
		    $parent =  $this->uri->segment(4);	
			$data['seo_title'] 	= 	"View Features | ".$this->data['admin_title'].""; 
			$this->load->view('admin/view_feature',$data);
		
        }
	
	
		// Add Qualification   
       
	public function EditFeatures($bid)
		{
			
			
			$cond=array('feature_id' => $bid);
			
			$data['feature'] 	= 	$this->Admin_model->fetch_one_row('feature',$cond);
			
			$data['seo_title'] 	= 	"Edit Feature | ".$this->data['admin_title'].""; 
			
							
			if($_POST):
				
			$feature_data = array
			    (
			
					'feature_name' => $this->input->post('title'),
					'feature_desc' => $this->input->post('desc_i'),
					
			
			    );
			
			$this->Admin_model->update_all($feature_data,$cond,'feature');
			
			
		    if(!empty($_FILES["image"]["name"]))
			{
								
				for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
				{
					if($_FILES["image"]["name"][$i]!='')
					{
											
						@unlink('uploads/feature/'.$data['feature']['feature_image']);
																	
						$filename2 	= 	basename($_FILES["image"]["name"][$i]);
						$ext2 		= 	@end(explode('.', $filename2));
						$ext2 		= 	strtolower($ext2);			
						$gallery2    = 	"feat_".rand().'.'.$ext2;			
						$uploadfile2 = 	"uploads/feature";
						move_uploaded_file($_FILES["image"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
						
						$more_docs  	= 	array(
							   'feature_id'  =>$bid,
							   'feature_image'  => $gallery2,);
						$add_img2	=	$this->Admin_model->update_all($more_docs,$cond,'feature');
							
				    }
				}
			}
					
			
			$this->session->set_flashdata('success', 'We Feature updated Successfully.'); 
				
			redirect(base_url().'admin/Features/EditFeatures/'.$bid);
				
			endif;
			
			$this->load->view('admin/edit_fetaure', $data);
				
        }
		
	
}