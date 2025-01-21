<?php

class Products extends MY_Controller {

	

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

  public  function index($cat_slug=""){  
         
	  if(isset($_GET['search']))
	   {
		
	  
	   $keyword = trim($_GET['search']);
	    
		 
		
	   }
	   
	   else
	   {
	
	   $keyword="";   
		 
	   }

	$category_seo= array('seoid'=>'8');
	$data['category_seo'] = $this->Admin_model->fetch_one_row('seopage',$category_seo);	

	$category_seo= array('id'=>'6');
	    $data['product_banner'] = $this->Admin_model->fetch_one_row('innerbanner',$category_seo);	


	if($cat_slug=="")
	{

	//$data['category'] = $this->Admin_model->fetch_limit_one_row('category','category_id',1,0);
    $data['category'] = array();
	$cat_id="";
	
	$data['products'] = $this->Admin_model->fetch_all_by_desc('Product','product_id');
	
	}
	else
	{

		$cond= array('category_slug'=>$cat_slug);

		$data['category'] = $this->Admin_model->fetch_one_row('category',$cond);	
        $cat_id = $data['category']['category_id'];
		
		
	}

	
	
	


	//$cond2 = array('product_cat'=>$cat_id);
	
	//$data['products'] = $this->Admin_model->fetch_data('product',$cond2);
	$data['products'] = $this->Admin_model->fetch_product($cat_id,$keyword);
	
  
	 
	$data['all_category'] = $this->Admin_model->fetch_all_by_desc('category','category_id'); 

	$this->load->view('user/category',$data);

    }

		
	public function Detail($prod_slug)
	{

		$category_seo= array('id'=>'6');
	    $data['detail_banner'] = $this->Admin_model->fetch_one_row('innerbanner',$category_seo);	


	    $cond2 = array('product_slug'=>$prod_slug);
	    $data['product'] = $this->Admin_model->fetch_one_row('product',$cond2);
		


		if(isset($_POST['submit']))
  
		{
			
						$cname 		=  $this->input->post('name');
						$cemail	    =  $this->input->post('email');
						$cphone 	=  $this->input->post('phone');
						$csubject  	=  $this->input->post('subject');
						$cmessage  	=  $this->input->post('message');
						$cproduct  	=  $this->input->post('product');		
						
						
						
						$body  = '<div style="font-family:Arial,Helvetica,sans-serif; line-height:18px;">
						 <p>Dear Admin,</p>
						 <p>You have received an enquiry from <b>'.$cname.'</b>. Contact him/her immediately.</p>
						 
						 <table width="600" border="0" cellpadding="0" cellspacing="0">
						  <tbody><tr>
							<td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #c4891f">
							  <tbody><tr style="">
								<td align="left" valign="top" background="" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody><tr>
									<td width="100%" align="left" valign="top" colspan="2" style="text-align:center; padding: 2%; border-bottom:1px solid #c4891f;">
									<h4 style="text-transform: uppercase;font-size: 26px;color: #58595b;font-weight: 800;">Esqube</h4>
									</td>
									
								  </tr>
								</tbody></table></td>
							  </tr>
							  <tr>
								<td height="22" align="center" valign="top" bgcolor="#FFFFFF"><table width="92%" border="0" cellspacing="0" cellpadding="0">
								  <tbody><tr>
									<td height="14" align="left" valign="middle">&nbsp;</td>
								  </tr>
								  <tr>
									<table align="center" width="500px" cellpadding="5">
										<thead style="background-color:#ce0707;color:white">
										<tr><th colspan="2"><h3>CONTACT MESSAGE</h3></th></tr>
										</thead>
										<tbody style="background-color:#eee">
										<tr><th>Name</th><td>'.$cname.'</td></tr>
										<tr><th>Product</th><td>'.$cproduct.'</td></tr>
										<tr><th>Email</th><td>'.$cemail.'</td></tr>
										<tr><th>Mobile</th><td>'.$cphone.'</td></tr>
										<tr><th>Subject</th><td>'.$csubject.'</td></tr>
										<tr><th>Message</th><td>'.$cmessage.'</td></tr>
										</tbody>
										</table>
								  </tr>
								  
								   <tr>
									<td align="left" valign="top">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left" valign="top">&nbsp;</td>
								  </tr>
								  
								   <tr>
									<td style="border-top:1px solid #c4891f; padding:10px; text-align:center;">&nbsp;</td>
									
								  </tr>
								 
								  
								  <tr>
								  <td align="center" valign="top" style="font-family:Tahoma;font-size:12px;font-weight:normal;color:#333333;text-decoration:none"><strong>Esqube</strong></td>
								  </tr>
								
								  <tr>
									<td align="left" valign="top">&nbsp;</td>
								  </tr>
								</tbody></table></td>
							  </tr>
							  
							  <tr>
								<td align="left" valign="middle">&nbsp;</td>
							  </tr>
							  
							  
							</tbody></table></td>
						  </tr>
						</tbody></table>';
						
						
						
						
						
						
					
					
					     	$this->load->library('email');
							
							$config['protocol']    = 'sentmail';
							$config['smtp_host']    = 'ssl://smtp.googlemail.com';
							$config['smtp_port']    = '465';
							$config['smtp_timeout'] = '7';
							$config['smtp_user']    = 'techsofttest@gmail.com';
							$config['smtp_pass']    = 'testpwd12345@';
							
							$config['mailtype'] = 'text'; // or html
							$config['validation'] = TRUE; // bool whether to validate email or not  
												
												
							
							$config['charset'] = 'utf-8';				 
							$config['newline'] = "\r\n";
							$config['crlf'] = "\r\n";
							$this->email->initialize($config);
							$this->email->from('techsofttest@gmail.com','Esqube');  
																						  
								
								$subject = "Contact :: Esqube";
							
								
								//$this->email->to($user_email);
								
								
								$this->email->to("techsofttest@gmail.com");
								 
								$this->email->subject($subject);
								
								
								$this->email->message($body);                
								$this->email->set_newline("\r\n");
								$this->email->set_mailtype("html");
								//$this->email->send();
								if(!$this->email->send()){
								
								show_error($this->email->print_debugger());
									
									}
								
								$this->session->set_flashdata('success', 'Message has been sent');
								//echo $this->session->flashdata('success');
							//exit();
								redirect(base_url().'Product/'.$prod_slug);
					
					
					
					
					}





		$this->load->view('user/product_detail',$data);
	} 

	public function Subcategory($sub_cat)
	{
		$category_seo= array('seoid'=>'3');
	    $data['category_seo'] = $this->Admin_model->fetch_one_row('seopage',$category_seo);	


		$category_seo= array('id'=>'3');
	    $data['cat_banner'] = $this->Admin_model->fetch_one_row('innerbanner',$category_seo);	
		
		
		
		$cond1 = array('subcat_slug'=> $sub_cat);

        $data['subcat']= $this->Admin_model->fetch_one_row('subcat',$cond1);

		// $sub_cat_id = $data['subcat']['subcat_id'];
		// $cat_id = $data['subcat']['subcat_parent_id'];
		
		//  $cond2 = array('product_sub_cat'=> $sub_cat_id);

	    //  $data['products'] = $this->Admin_model->fetch_data('product',$cond2);


		 $sub_cat_id = $data['subcat']['subcat_id'];
		 $cat_id = $data['subcat']['subcat_parent_id'];
$conditions = array('product_sub_cat' => $sub_cat_id);

// Fetch products from the 'product' table based on the specified subcategory
// Order the results by the 'position' column in ascending order
$data['products'] = $this->Admin_model->fetch_data('product', $conditions, 'position', 'ASC');



	
		$cond3 = array('subcat_parent_id'=> $cat_id);
		$data['all_subcategory']= $this->Admin_model->fetch_data('subcat',$cond3);
		

		$this->load->view('user/sub_cat',$data);
	}
	

	

	}





