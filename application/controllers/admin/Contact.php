<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
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
		
		
		
	
		
		// View CMS Pages   
       public function ViewContact()
		{			 
		   $data['seo_title'] 	= 	"View Contact Details| ".$this->data['admin_title'].""; 
		   $parent =  $this->uri->segment(4);
		   $data['contact_data']	=	$this->Admin_model->fetch_all('contact');
		   $this->load->view('admin/view_contact', $data);
	   }
				
		
	  public function EditContact($cid)
		{
			$cond=array('contact_id' => $cid);
			$data['contact_data'] 	= 	$this->Admin_model->fetch_one_row('contact',$cond);
			$data['seo_title'] 	= 	"Edit Contact Details | ".$this->data['admin_title'].""; 
											
			if($_POST):
			 $cms_data  = array(
			                     
								   'contact_adress'=> $this->input->post('address'),
			                       'contact_phone1'=> $this->input->post('phone1'),
								   'contact_phone2	'=> $this->input->post('phone2'),
						           'contact_email1'=> $this->input->post('email1'),
								   /*'contact_email2'=> $this->input->post('email2'),*/
			                      
			                 );

				$cms_cond  		= 	array('contact_id'  => $cid,);
				$this->Admin_model->update_all($cms_data,$cms_cond,'contact');
				
				$this->session->set_flashdata('success', 'Contact Details Updated Successfully.'); 
				redirect(base_url().'admin/Contact/ViewContact');
				
			endif;
			$this->load->view('admin/edit_contactdetails', $data);
        }
		
		
		
	
				
			    			
}