<?php

class About extends MY_Controller {

	

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
        
	

	$about_seo= array('seoid'=>'2');
	$data['about_seo'] = $this->Admin_model->fetch_one_row('seopage',$about_seo);
	
	
	$about_seo= array('id'=>'1');
	$data['about_banner'] = $this->Admin_model->fetch_one_row('innerbanner',$about_seo);	
	
	

	

    $about = array('content_id'=>'1');
	$data['about'] = $this->Admin_model->fetch_one_row('content',$about);	
	

	$this->load->view('user/about',$data);

    }

		

	

	

	}





