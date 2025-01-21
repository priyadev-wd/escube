<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CMS extends MY_Controller
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
		
		
		
	
		
		// View CMS Pages   
    public function ViewCMS()
	    {			 
		    $data['seo_title'] 	= 	"View CMS Pages| ".$this->data['admin_title'].""; 
		    $parent =  $this->uri->segment(4);
			$data['cms_data']	=	$this->Admin_model->fetch_all('content');
		    $this->load->view('admin/view_cms_page', $data);
		}
				
		
	public function EditCMS($contentid)
	    {
			$cond=array('content_id' => $contentid);
			$data['cms_data'] 	= 	$this->Admin_model->fetch_one_row('content',$cond);
			$data['seo_title'] 	= 	"Edit CMS | ".$this->data['admin_title'].""; 
			if($_POST):
			$cms_data  = array
			    (
		     	    'content_mainpage'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('page_name')),
			        'content_pagename'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('title')),
					'content_dsec'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('page_description')),
			    );

			$cms_cond  		= 	array('content_id'  => $contentid,);
			$this->Admin_model->update_all($cms_data,$cms_cond,'content');
			$this->session->set_flashdata('success', 'CMS Page updated Successfully.'); 
			redirect(base_url().'admin/CMS/ViewCMS');
			endif;
			$this->load->view('admin/edit_cms_pages', $data);
        }
		
		
	    			
}