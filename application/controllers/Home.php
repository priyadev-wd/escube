<?php

class Home extends MY_Controller {

	

	function __construct()

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper('url');

		$this->load->helper('form');

        $this->load->model('Admin_model');

		$this->load->library('session');

		//$this->pr_details=get_profile_details();

		

	}

	

	//index	   

  public  function index(){  
        
		
	
	$home_seo= array('seoid'=>'1');
	$data['home_seo'] = $this->Admin_model->fetch_one_row('seopage',$home_seo);	
	

	$data['home_banner'] = $this->Admin_model->fetch_all_by_desc('banners','ban_id');
	

	$home_about = array('content_id'=>'1');
	$data['home_about'] = $this->Admin_model->fetch_one_row('content',$home_about);	
		$home_about = array('category_id'=>'28');	$data['home_ware'] = $this->Admin_model->fetch_one_row('category',$home_about);		$home_about = array('category_id'=>'29');	$data['home_fur'] = $this->Admin_model->fetch_one_row('category',$home_about);		$home_about = array('category_id'=>'30');	$data['home_mhc'] = $this->Admin_model->fetch_one_row('category',$home_about);	

	$data['home_category'] = $this->Admin_model->fetch_all_by_desc('category','category_id');
	

	$data['home_testimonial'] = $this->Admin_model->fetch_all_by_desc('testimonial','testimonial_id');
	
	$data['home_products'] = $this->Admin_model->fetch_all_by_desc('product','product_id');

	$data['home_feature'] = $this->Admin_model->fetch_all_by_desc('feature','feature_id');
	
	$data['home_clients'] = $this->Admin_model->fetch_all_by_desc('client','client_id');
	

	$this->load->view('user/index',$data);

    }

		

	

	

	}





