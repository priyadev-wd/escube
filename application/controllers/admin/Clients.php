<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clients extends MY_Controller 
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
		    $data['seo_title']= "View Clients | ".$this->data['admin_title']."";
		    $data['clients'] = $this->Admin_model->fetch_all_by_desc('client','client_id');
		    $this->load->view('admin/view_client',$data);
		
		}	
		
	
		
    public function AddClients()
        {
			
	        $data['seo_title']= "Add Clients | ".$this->data['admin_title']."";
	       
	       if(!empty($_FILES["image"]["name"]))
				{
					
				for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
								  {
										if($_FILES["image"]["name"][$i]!='')
										{
																	
					$filename2 	= 	basename($_FILES["image"]["name"][$i]);
					$ext2 		= 	@end(explode('.', $filename2));
					$ext2 		= 	strtolower($ext2);			
					$gallery2    = 	"client_".rand().'.'.$ext2;			
					$uploadfile2 = 	"uploads/client";
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
				
				
					
					$data_imgg  	= array('client_img'  =>$gallery2);
		            $pid=  $this->Admin_model->insertsection('client',$data_imgg);
				}}
				
			
		   $this->session->set_flashdata('success', 'Client Added Successfully.'); 
		   redirect(base_url().'admin/Clients/AddClients');
		   }
		    $this->load->view('admin/add_client',$data);
	    }
		
    public function EditClients($cid)
	    {
		    $cond	=	array('client_id' => $cid);
		    $data['client']	=	$this->Admin_model->fetch_one_row('client',$cond);
		    $data['seo_title']=  "Edit Clients | ".$this->data['admin_title']."";
			
		   if(!empty($_FILES["image"]["name"]))
							{
								
			for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
								  {
										if($_FILES["image"]["name"][$i]!='')
										{	
							@unlink('uploads/client/'.$data['client']['client_img']);
                            @unlink('uploads/client/thumb/'.$data['client']['client_img']);							
					$filename2 	= 	basename($_FILES["image"]["name"][$i]);
					$ext2 		= 	@end(explode('.', $filename2));
					$ext2 		= 	strtolower($ext2);			
					$gallery2    = 	"client_".rand().'.'.$ext2;			
					$uploadfile2 = 	"uploads/client";
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
					
					
					$data_imgg  	= array('client_img'  =>$gallery2);
				    $condd  	= 	array('client_id'  =>$cid);
				    $add_imgg	=	$this->Admin_model->update_all($data_imgg,$condd,'client');
				}}
			 $this->session->set_flashdata('success', 'Client Added Successfully.'); 
			 redirect(base_url().'admin/Clients/EditClients/'.$cid);
				}
		   
		   
		    $this->load->view('admin/edit_client',$data);	
	    }
	 
	public function  DeleteClients($cid)
	    { 
	        $cond = array('client_id' => $cid);
	        $data['client'] = $this->Admin_model->fetch_one_row('client',$cond);
	        @unlink('uploads/client/'.$data['client']['client_img']);
             @unlink('uploads/client/thumb/'.$data['client']['client_img']);				
	        $this->db->where('client_id',$cid);
	        $this->db->delete('client');
	        $this->session->set_flashdata('success', 'Client Deleted Successfully.'); 
	        redirect(base_url().'admin/Clients');
	    }
		
	
	
	
		
		
	
	 
 }