<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  

  public function __construct()
    {
		
        parent::__construct();
		
		$this->load->model("Admin_model");
		
		$this->data = array(
            'admin_title' => 'ESQUBE',
			'admin_theme' => '#e73e2d',
			
        );

    //$data['common_category'] = $this->Admin_model->fetch_all_by_desc('category','category_id');

    $common_about = array('content_id'=>'1');
	$data['common_about'] = $this->Admin_model->fetch_one_row('content',$common_about);	
	
    $common_contact= array('contact_id'=>'1');
	$data['common_contact'] = $this->Admin_model->fetch_one_row('contact',$common_contact);	
	
   $data['common_category']= $this->Admin_model->fetch_subcat_by_category();
 $data['subcategory'] = $this->Admin_model->fetch_all_by_desc('subcat','subcat_id');
    
	$this->load->vars($data);
		
		
	   
        // Now, all your views have $foo1 and $foo2
    }
	
	
	
	
	
	
}