<?php

class Contact extends MY_Controller {

	

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
        
	

	$contact_seo= array('seoid'=>'7');
	$data['contact_seo'] = $this->Admin_model->fetch_one_row('seopage',$contact_seo);	
	
	$client_seo= array('id'=>'5');
	$data['contact_banner'] = $this->Admin_model->fetch_one_row('innerbanner',$client_seo);
	
	

	$contact= array('contact_id'=>'1');
	$data['contact'] = $this->Admin_model->fetch_one_row('contact',$contact);	
	

	if(isset($_POST['submit']))
  
	{
		
					$cname 		=  $this->input->post('name');
					$cemail	    =  $this->input->post('email');
					$cphone 	=  $this->input->post('phone');
					$csubject  	=  $this->input->post('comments');
							
					
					
					
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
								    <tr><th>Email</th><td>'.$cemail.'</td></tr>
									<tr><th>Mobile</th><td>'.$cphone.'</td></tr>
									<tr><th>Subject</th><td>'.$csubject.'</td></tr>
									
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
							redirect(base_url().'Contact');
				
				
				
				
				}


	
	$this->load->view('user/contact',$data);

    }

		

	

	

	}





