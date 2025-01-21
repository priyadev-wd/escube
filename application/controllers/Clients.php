<?php

class Clients extends MY_Controller {

	

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
        
	

	$client_seo= array('seoid'=>'5');
	$data['client_seo'] = $this->Admin_model->fetch_one_row('seopage',$client_seo);

	$client_seo= array('id'=>'4');
	$data['client_banner'] = $this->Admin_model->fetch_one_row('innerbanner',$client_seo);
	

	$data['clients'] = $this->Admin_model->fetch_all_by_desc('client','client_img');
	$this->load->view('user/client',$data);

    }

		

	

	

	}





