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



  	 $data['contactline'] = "active";



  	 if(isset($_POST['contact']))

	{


     if($_POST['g-recaptcha-response']=='')

	{
		
		
		//  $_SESSION["msg_err"]="Please re-enter your reCAPTCHA.";
          $mssg="Please re-enter your reCAPTCHA.";
				  echo '<script language="javascript">';
		          echo 'alert("Please re-enter Captcha")';
		          echo '</script>';
	}
	else{

		$cname    =  $_POST['name'];

		$cemail   =  $_POST['email'];

		$phone =  $_POST['phone'];

		$cmessage =  $_POST['message'];			

		$baseurl = base_url();	

			

			   $body    = '<div style="font-family:Arial,Helvetica,sans-serif; line-height:18px;">

				<p>Dear Admin,</p>

				<p>You have received an enquiry from <b>'.$cname.'</b>. Contact him/her immediately.</p>

				

				<table width="600" border="0" cellpadding="0" cellspacing="0">

				 <tbody><tr>

				   <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #c4891f">

					 <tbody><tr style="">

					   <td align="left" valign="top" background="" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">

						 <tbody><tr>

						   

						   

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

							   <thead style="background-color:#ea1c2b;color:white">

							   <tr><th colspan="2"><h3>CONTACT MESSAGE</h3></th></tr>

							   </thead>

							   <tbody style="background-color:#eee">

							   <tr><th>Name</th><td>'.$cname.'</td></tr>

							   <tr><th>Email</th><td>'.$cemail.'</td></tr>

							   <tr><th>phone</th><td>'.$phone.'</td></tr>

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

						 <td align="center" valign="top" style="font-family:Tahoma;font-size:12px;font-weight:normal;color:#333333;text-decoration:none"><strong> New Allied Tours & Travels</strong></td>

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

			   $subject= "Contact Message";

			    $this->load->library("phpmailer_library");
			    $mail = $this->phpmailer_library->load();

			      try {
				
					  // $mail->isSMTP();                                     
					  // $mail->Host = 'smtp.gmail.com';  
					    $mail->Host = 'mail.essayssos.com';  
					   $mail->SMTPAuth = true;   
					    //$mail->Username = 'techsofttest@gmail.com';                
					   //$mail->Password = 'testpwd12345@';      
					   $mail->Username = 'techsofttest@gmail.com';                
					   $mail->Password = 'testpwd12345@';  
					   $mail->SMTPSecure = 'ssl'; 
					   $mail->Port = 465;  
					    //$mail->setFrom('techsofttest@gmail.com');                                
					   $mail->setFrom('info@newalliedtour.net');
					   $mail->FromName = 'New Allied Tours & Travels';
					 
					  $mail->addAddress('techsofttest@gmail.com');
					  
					  
					 // $mail->addAddress('techsofttest@gmail.com');
		              $mail->addReplyTo($cemail);
					   $mail->isHTML(true);                                
					   $mail->Subject = $subject;
					   $mail->Body    = $body;
					   $mail->AltBody = '';		   
					   $mail->send();
					  
					   $this->session->set_flashdata('success', 'Message has been sent');					   
					   redirect(base_url().'Contact');
				   } 
					   catch (Exception $e) {
					   $this->session->set_flashdata('error', 'Message could not be sent.Please try again later.');
					   redirect(base_url().'Contact');
				   }
				
			}
			
			
			
			
}			




  	$seo = array('seoid'=>6);     

	$data['seod'] = $this->Admin_model->fetch_one_row('alliedmaterials_seopage',$seo);	       

		

	$data['contact_data'] = $this->Admin_model->fetch_all('alliedmaterials_contact'); 

		   

	$this->load->view('user/contact',$data);



    }

		
	


	}











