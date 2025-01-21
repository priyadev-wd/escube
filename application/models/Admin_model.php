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



	public function fetch_data($table, $conditions = array(), $order_by_column = null, $order_by_direction = 'ASC')
{
    $this->db->from($table);

    if (!empty($conditions)) {
        $this->db->where($conditions);
    }

    if ($order_by_column !== null) {
        $this->db->order_by($order_by_column, $order_by_direction);
    }

    $query = $this->db->get();
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
		  if($cat_id !="")
				{
		  $this->db->where('product_cat',$cat_id);
				}

		   

		  if($keyword!="")
		  {
		  
		     $this->db->where("product_name LIKE '%$keyword%'");
		  
		 
		  }

		 $this->db->order_by('product_id','desc');  
		  
		 $query = $this->db->get();
		  
		 

		  return $query->result();  
	  }


	  public function fetch_sub_cat($cat_id)

		{

		

		$this->db->select('*');

		

		$this->db->from('subcat');

		

		$this->db->where('subcat_parent_id',$cat_id);

		

		$this->db->order_by('subcat_id','asc');

		

		$query = $this->db->get();

		

		return $query->result();	

			

		}

		public function fetch_subcat_by_category(){
			$this->db->select('*');
			$this->db->from('category');
			$this->db->order_by('category.category_id','Desc');
			$query= $this->db->get();
			$return_list = $query->result();
			$i=0;
			foreach($return_list as $username){
				 $cond_user = array('subcat_parent_id' => $username->category_id);
				 $return_list[$i]->subcategory = $this->fetch_data('subcat',$cond_user);
				 $i++;	
				 }
		 return $return_list; 
	  }


	  public function check_position($table,$position)
	  {
		  $this->db->select('*');
		  $this->db->from($table);
		  $this->db->where('position',$position);
		  $query = $this->db->get();
		  return $query->row_array();
	  
	  }
	  public function fetch_all_by_asc($table,$primary){



		$this->db->select('*');



		$this->db->from($table);



		$this->db->order_by($primary,'asc');



		$query = $this->db->get();	



		return $query->result();



	 } 


	public function fetch_last_row($table, $order_column) {
		$this->db->order_by($order_column, 'DESC');
		$query = $this->db->get($table, 1);
		return $query->row_array();
	}
	public function update_positions($id, $last) {
        $this->db->set('position', 'position', FALSE);
        $this->db->where('product_id >=', $id);
        $this->db->where('product_id <=', $last);
        $this->db->update('product');
    }
	public function fetch_limit($table, $limit, $offset, $order_by_column, $order_by_direction) {
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by_column, $order_by_direction);
        return $this->db->get($table)->row_array();
    }


public function get_total_products()
{
    // Query to count the total number of rows in the product table
    $query = $this->db->count_all_results('product');
    
    // Return the count
    return $query;
}





public function adjustProductPositions($newPosition, $lastProductId) {
    // Fetch products with positions greater than or equal to the new position
    $productsToAdjust = $this->db
        ->where('position >=', $newPosition)
        ->where('product_id !=', $lastProductId) // Exclude the last product
        ->order_by('position', 'ASC')
        ->get('product')
        ->result_array();

    // Increment the positions of these products
    foreach ($productsToAdjust as $product) {
        $productId = $product['product_id'];
        $currentPosition = $product['position'];
        
        // Update the position to the next sequential position
        $newPosition = $currentPosition + 1;

        $this->db->where('product_id', $productId)
                 ->update('product', array('position' => $newPosition));
    }
}
// public function fetch_data($table, $conditions = array(), $order_by_column = 'position', $order_by_direction = 'DESC') {
//     $this->db->where($conditions);
//     $this->db->order_by($order_by_column, $order_by_direction);
//     return $this->db->get($table)->result_array();
// }
public function fetch_data_prod($table,$fields)

    {

		$this->db->where($fields);

		$query = $this->db->get($table);
		
        return $query->result();

	}  

}