<?php

class Testimonials extends MY_Controller {

	

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
        
	

	$testimonial_seo= array('seoid'=>'5');
	$data['testimonial_seo'] = $this->Admin_model->fetch_one_row('seopage',$testimonial_seo);	
	

	$data['testimonials'] = $this->Admin_model->fetch_all_by_desc('testimonial','testimonial_id');
	$this->load->view('user/testimonial',$data);

    }

		

	

	

	}





