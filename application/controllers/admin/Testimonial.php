<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial extends MY_Controller 
 {
	 public function __construct()
		{
				parent::__construct();
				$this->load->database();
                $this->load->library('form_validation');
				$this->load->helper(array('form', 'url', 'text'));
                $this->load->model("Admin_model");
				$this->load->library('image_lib');
				
				$this->load->library('session');
				if(!$this->session->userdata('adminId'))
				{
					redirect(base_url().'admin/login');	
				}	
				
        }
		
		
	public function index()
	    {
		    $data['seo_title']= "View Testimonial | ".$this->data['admin_title']."";
		    $data['testimonial'] = $this->Admin_model->fetch_all_by_desc('testimonial','testimonial_id');
		    $this->load->view('admin/view_testimonial',$data);
		
		}	
		
	
		
    public function AddTestimonial()
        {
			
	        $data['seo_title']= "Add Testimonial | ".$this->data['admin_title']."";
	       
	        if($_POST):
	   
	        $testdata  	= array
	            (  
	                'testimonial_name'         => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('name')),
					'testimonial_place'          => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('place')),
					'testimonial_desc'    => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('desc_i')),
					
					
							
								  
				);
						
			$cid = $this->Admin_model->insertsection('testimonial',$testdata);
		    $this->session->set_flashdata('success','testimonial Added Succesfully');
		  
		  
		  	if(!empty($_FILES["image"]["name"]))
				{
								
					for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
						{
							if($_FILES["image"]["name"][$i]!='')
								{	
										
									$filename2 	= 	basename($_FILES["image"]["name"][$i]);
					                $ext2 		= 	@end(explode('.', $filename2));
					                $ext2 		= 	strtolower($ext2);			
					                $gallery2    = 	"test_".rand().'.'.$ext2;			
					                $uploadfile2 = 	"uploads/testimonial";
					                move_uploaded_file($_FILES["image"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
				                    $data_imgg  	= array('testimonial_img'  =>$gallery2);
				                    $condd  	= 	array('testimonial_id'  =>$cid);
				                    $add_imgg	=	$this->Admin_model->update_all($data_imgg,$condd,'testimonial');
				                }
						}
				}
				
				
		  
		    $this->session->set_flashdata('success','Testimonial Added Succesfully');
		    redirect(base_url().'admin/Testimonial/AddTestimonial');
		    endif;
		    $this->load->view('admin/add_testimonial',$data);
	    }
		
    public function EditTestimonial($cid)
	    {
		    $cond	=	array('testimonial_id' => $cid);
		    $data['testimonial']	=	$this->Admin_model->fetch_one_row('testimonial',$cond);
		    $data['seo_title']=  "Edit Testimonial | ".$this->data['admin_title']."";
		    if($_POST):
		    $testdata  	= array
			    (  
		            'testimonial_name'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('name')),
					'testimonial_place'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('place')),
					'testimonial_desc'  => preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $this->input->post('desc_i')),
					
					
					
						
									
				);
										
			$cond	=	array('testimonial_id'	=>	$cid);
		    $edit 	= 	$this->Admin_model->update_all($testdata,$cond,'testimonial');
		    $this->session->set_flashdata('success','Testimonial Updated Succesfully');
		    if(!empty($_FILES["image"]["name"]))
				{
								
					for ($i = 0; $i < count($_FILES['image']['name']); $i++) 
						{
							if($_FILES["image"]["name"][$i]!='')
								{				
										
							        @unlink('uploads/testimonial/'.$data['testimonial']['testimonial_img']);			
									$filename2 	= 	basename($_FILES["image"]["name"][$i]);
					                $ext2 		= 	@end(explode('.', $filename2));
					                $ext2 		= 	strtolower($ext2);			
					                $gallery2    = 	"test_".rand().'.'.$ext2;			
					                $uploadfile2 = 	"uploads/testimonial";
					                move_uploaded_file($_FILES["image"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
				                    $image  	= 	array('testimonial_img'  => $gallery2);
					                $cond		= 	array('testimonial_id' 	=>	$cid);
					                $add_img2	=	$this->Admin_model->update_all($image,$cond,'testimonial');
						
				                }
				        }
				}
			
			
		
		    $this->session->set_flashdata('success','Testimonial Updated Succesfully');
	        redirect(base_url().'admin/Testimonial/EditTestimonial/'.$cid);
		    endif;
		    $this->load->view('admin/edit_testimonial',$data);	
	    }
	 
	public function  DeleteTestimonial($cid)
	    { 
	        $cond = array('testimonial_id' => $cid);
	        $data['testimonial'] = $this->Admin_model->fetch_one_row('testimonial',$cond);
			
	        @unlink('uploads/testimonial/'.$data['testimonial']['testimonial_img']);	
			
	        $this->db->where('testimonial_id',$cid);
	        $this->db->delete('testimonial');
	        $this->session->set_flashdata('success', 'Testimonial Deleted Successfully.'); 
	        redirect(base_url().'admin/Testimonial');
	    }
		
	
	
	
		
		
	
	 
 }