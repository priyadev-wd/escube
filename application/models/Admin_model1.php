<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_model
{

    public function __construct()
	{ 

		parent::__construct();

	}



    public function get_profile_details($id)

	{

		$this->db->select('*');

        $this->db->from('admin');
		
        $this->db->where('adminId', $id);


	    $query = $this->db->get();


        return $query->result_array();


	}


	public function insertsection($table,$fields)

	{

	    $this->db->insert($table,$fields);

	    return ($this->db->insert_id());	

	}



	public function fetch_data($table,$fields)

    {

		$this->db->where($fields);

		$query = $this->db->get($table);
		
        return $query->result();

	}  



	public function fetch_all($table)

	{

		$query = $this->db->get($table);
		
	    return $query->result();

	} 



	public function update_all($fields,$cond,$table)

	{

		return $this->db->update($table, $fields, $cond);

	}

	public function fetch_one_row($table,$cond)

	{

		$this->db->select('*');

        $this->db->from($table);

        $this->db->where($cond);

        $query  = $this->db->get();

        $row    = $query->row_array();		

        return $row;


	}


	public function fetch_all_by_desc($table,$primary)
	{

		 $this->db->select('*');

		 $this->db->from($table);

		 $this->db->order_by($primary,'desc');

		 $query = $this->db->get();	

	     return $query->result();



	}  



    public function fetch_all_limit($table,$primary,$limit,$start)
	{

		$this->db->select('*');

		$this->db->from($table);

		$this->db->limit($limit,$start);

		$this->db->order_by($primary,'desc');

		$query = $this->db->get();	

		return $query->result();

    }	



    public function fetch_all_order_cond($table,$field,$cond,$array)
	{

		$this->db->order_by($field,$cond);

		$this->db->where($array);

		$query  = $this->db->get($table);

		return $query->result();

	} 

	public function fetch_limit_one_row($table,$primary,$limit,$start)
		{
			$this->db->select('*');
	
			$this->db->from($table);
	
			$this->db->limit($limit,$start);
	
			$this->db->order_by($primary,'desc');
	
			$query = $this->db->get();	
	
			$row    = $query->row_array();		
	
			return $row;
		}


	 
	  
	  public function fetch_product($cat_id,$keyword)
	  {   
	     
		  $this->db->select('*');	
		  
		  $this->db->from('product');

         // $this->db->join('category', 'category.category_id = product.product_cat', 'left');
		  
		  $this->db->where('product_cat',$cat_id);

		  if($keyword!="")
		  {
		  
		     $this->db->where("product_name LIKE '%$keyword%'");
		  
		 
		  }
		  
		 $query = $this->db->get();
		  
		  echo $this->db->last_query();

		  return $query->result();  
	  }


  

}