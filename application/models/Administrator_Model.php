<?php
	class Administrator_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function adminLogin($fname, $encrypt_password){
			//Validate
			$this->db->where('fname', $fname);
			$this->db->where('password', $encrypt_password);
//                        $this->db->join('userlog', 'userlog.empid = users.emp_id');
			$result = $this->db->get('users');


			if ($result->num_rows() == 1) {
                       

//                            print_r($result->row(0));
//                            echo $this->db->last_query(); exit;
                            $this->db->where('empid', '101');
                            $this->db->update('userlog', array('login'=> date('Y-m-d H:i:s'))); 
				return $result->row(0);
                               
			}else{
				return false;
			}
                
                        
                        
                        
                        
		}

		public function get_posts($slug = FALSE)
		{
			if($slug === FALSE){
				$query = $this->db->order_by('id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_post()
		{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id')
			    );
			return $this->db->insert('posts', $data);
		}

		public function delete($id,$table)
		{
			$this->db->where('id', $id);
			$this->db->delete($table);
			return true;
		}

//		public function get_categories(){
//			$this->db->order_by("id", "DESC");
//			$query = $this->db->get('categories');
//			return $query->result_array();
//		}
		public function get_clients(){
			$this->db->order_by("clientid", "ASC");
			$query = $this->db->get('clientscd');
			return $query->result_array();
		}
		
		public function get_countries(){
			$this->db->order_by("countrycd", "ASC");
			$query = $this->db->get('country');
			return $query->result_array();
		}
		public function get_regions(){
			 $this->db->select('region,regioncode');
              $this->db->group_by('regioncode');
               $this->db->group_by('region');
			$query = $this->db->get('country'); 
//                         echo $this->db->last_query(); exit;
			return $query->result_array();
		}
		
		public function get_industries(){
			
			$sql = "SELECT DISTINCT industrycd,industry FROM industry group by industry,industrycd order by industry";
			return $query = $this->db->query($sql);
// 			$this->db->select('industrycd,industry,subindustry,subindustrycd');
// 			$this->db->group_by('industrycd');
// 			$this->db->group_by('industry');
// 			$this->db->group_by('subindustry');
// 			$this->db->group_by('subindustrycd');
// 			$this->db->order_by("subindustry", "asc");
// 			$query = $this->db->get('industry'); 
// //                         echo $this->db->last_query(); exit;
// 			return $query->result_array();
			// $query = $this->db->get('industry');                       
			// return $query->result_array();
		}
		public function get_depts(){
			$this->db->from('dept');
			$this->db->order_by("department", "asc");
			$query = $this->db->get();                       
			return $query->result_array();
		}
		public function get_empsize(){
			
			$query = $this->db->get('emplzid');
			return $query->result_array();
		}
		public function get_revenuesize(){
			
			$query = $this->db->get('compsize');                       
			return $query->result_array();
		}
		public function get_comptype(){
			$query = $this->db->get('comptype');                       
			return $query->result_array();
		}
		public function get_designation(){

			$sql = "SELECT DISTINCT joblevel,joblids FROM joblevels group by joblids,jid";
			return $query = $this->db->query($sql);
			// show_error($this->db->last_query(), 200, "SQL");
// 			$this->db->select('joblids,joblevel,jid,joblist');
// 			$this->db->group_by('joblids');
// 			$this->db->group_by('joblevel');
// 			$this->db->group_by('jid');
// 			$this->db->group_by('joblist');
// 			$query = $this->db->get('joblevels'); 
// //                         echo $this->db->last_query(); exit;
// 			return $query->result_array();
			// $query = $this->db->get('designation');                       
			// return $query->result_array();
		}
		public function getquestions_byCampaign($cnid){
			$this->db->select('*');
			$this->db->join('questions', 'questions.cid = CAST(campaign.cnid as integer)');
			$this->db->where('campaign.cnid', $cnid);
			$query = $this->db->get('campaign');
			// echo $this->db->last_query(); 
			return $query->result_array(); 
			// echo $this->db->last_query(); 
		}
		public function get_designation_byCampaign($cnid){
			$this->db->select('tid');
			$this->db->where('campaign.cnid', $cnid);
			$query = $this->db->get('campaign');
			return $query->result_array(); 
			// echo $this->db->last_query(); 
		}
		public function get_designation_ofCampaign($cnid,$myarray){
			$this->db->select('*');
			// foreach ($myarray as $arr)
			// {	
			// 	$this->db->OR_where('jid', $arr);
			// }

			if($myarray[0] != 0)
			{
				$this->db->where_in('jid', $myarray );  //this is condition 
			}
			$this->db->order_by("jid", "asc"); 

			$query = $this->db->get('joblevels');
			
			return $query->result_array();
			
			
		}
		public function get_joblevels_byCampaign($cnid,$myarray){

			$this->db->select('joblids,joblevel');
			$this->db->group_by('joblids');
			$this->db->group_by('joblevel');
			if($myarray[0] != 0)
			{
				$this->db->where_in('jid', $myarray );  //this is condition 
			}
			$this->db->order_by("joblids", "asc"); 

			$query = $this->db->get('joblevels');
			return $query->result_array();

			// $this->db->select('joblids,joblevel');
			// $this->db->group_by('joblids');
			// $this->db->group_by('joblevel');
			// $this->db->join('joblevels',  'cast(joblevels.jid as character varying) = campaign.tid');
			// $this->db->where('campaign.cnid', $cnid);
			// $query = $this->db->get('campaign');
			// return $query->result_array(); 
			// echo $this->db->last_query(); 
		}
		public function get_depts_byCampaign($cnid,$myarray){
			$this->db->select('*');
			// foreach ($myarray as $arr)
			// {	
			// 	$this->db->OR_where('dcd', $arr);
			// }
			if($myarray[0] != 0)
			{
				$this->db->where_in('dcd', $myarray );  //this is condition 
			}
			$this->db->order_by("dcd", "asc"); 

			$query = $this->db->get('dept');
			return $query->result_array();
			
			
			// $this->db->select('*');
			// // $this->db->join('dept', 'dept.dcd = CAST(campaign.dcd as smallint)');
			// $this->db->join('dept', 'CAST(dept.dcd as character varying)= campaign.dcd');
			// $this->db->where('campaign.cnid', $cnid);
			// $query = $this->db->get('campaign');
			// return $query->result_array(); 
			// echo $this->db->last_query(); 
		}
		
		public function get_industries_ofCampaign($cnid,$myarray){
			// $this->db->select('*');
			$this->db->select('industrycd,industry');
			$this->db->group_by('industrycd');
			$this->db->group_by('industry');
			// $this->db->group_by('subindustrycd');
	
			if($myarray[0] != 0)  
			{
				$this->db->where_in('industrycd', $myarray );  //this is condition 
			}
			$this->db->order_by("industrycd", "asc"); 
			// foreach ($myarray as $arr)
			// {	
			// 	$this->db->OR_where('subindustrycd', $arr);
			// }
			$query = $this->db->get('industry');
			// echo $this->db->last_query(); 
			return $query->result_array();
			
			
		}
		
		
		public function get_industries_byCampaign($cnid){
			$this->db->select('industrycd');
			$this->db->where('cnid', $cnid);
			$query = $this->db->get('campaign');
			// echo $this->db->last_query(); 
			return $query->result_array(); 

		}
		public function get_subindustries_byCampaign($cnid,$myarray){
		
			$this->db->select('*');
			
			if($myarray[0] != 0)
			{
				$this->db->where_in('subindustrycd', $myarray );  //this is condition 
			}
			$this->db->order_by("subindustrycd", "asc"); 
			$query = $this->db->get('industry');
			// echo $this->db->last_query(); 
			return $query->result_array();
		

		}
		public function get_countriesofCampaign($cnid,$myarray){
			// print_r($myarray);

		
			$this->db->select('*');
			
			if($myarray[0] != 0)
			{
				$this->db->where_in('countrycd', $myarray );  //this is condition 
			}

			$query = $this->db->get('country');
			return $query->result_array();
			// $this->db->select('*');
			// $this->db->where('countrycd', $myarray);
			// $query = $this->db->get('country');
			// echo $this->db->last_query(); 
			// return $query->result_array();
			
		}
		public function get_countriesbyCampaign($cnid){

			$this->db->select('countrycd');
			$this->db->where('cnid', $cnid);
			$query = $this->db->get('campaign');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 
			

		// }
		// public function get_subregionbyCampaign($cnid){

		// 	$this->db->select('subregioncode');
		// 	$this->db->where('cnid', $cnid);
		// 	$query = $this->db->get('campaign');
			
		
		// 	$response = $query->result_array();
		// 	return $response;
		// 	// echo $this->db->last_query(); 
			

		}
		public function get_departmentsbyCampaign($cnid){

			$this->db->select('dcd');
			$this->db->where('cnid', $cnid);
			$query = $this->db->get('campaign');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 
			

		}
		public function get_timezonesbyCampaign($cnid,$myarray){
			// $this->db->select('*');
			$this->db->select('timezone.zoneid,timezone.abbrev');
			$this->db->group_by('timezone.zoneid');
			$this->db->group_by('timezone.abbrev');
			foreach ($myarray as $arr)
			{	
				$this->db->OR_where('countrycd', $arr);
			}
			$query = $this->db->get('timezone');
			return $query->result_array();
			
		}

		function gettimezonesbycountry($country_id)
		{
			$response = array();
			
			// Select record
			$this->db->select('timezone.zoneid,timezone.abbrev');
			$this->db->group_by('timezone.zoneid');
			$this->db->group_by('timezone.abbrev');
			$this->db->where('countrycd', $country_id);
		
			$q = $this->db->get('timezone');
				// echo $this->db->last_query(); 
			$response = $q->result_array();
	
			return $response;
		}
		function getcurrencybycountry($country_id)
		{
			$response = array();
			
			// Select record
			$this->db->select('country.currab,country.currnme,country.currid');
			$this->db->group_by('country.currab');
			$this->db->group_by('country.currnme');
			$this->db->group_by('country.currid');
			$this->db->where('countrycd', $country_id);
		
			$q = $this->db->get('country');
			$response = $q->result_array();
		
			return $response;
		}

		public function get_currencybyCampaign($cnid,$myarray){
			// $this->db->select('*');

			$this->db->select('country.currab,country.currnme,country.currid');
			$this->db->group_by('country.currab');
			$this->db->group_by('country.currnme');
			$this->db->group_by('country.currid');
			foreach ($myarray as $arr)
			{	
				$this->db->OR_where('countrycd', $arr);
			}
			$query = $this->db->get('country');
			// echo $this->db->last_query(); 
			return $query->result_array();

		

		}
		public function get_assetitle_byCampaign($cnid){
			$this->db->select('*');
			$this->db->where('cids', $cnid);
			$query = $this->db->get('assettitle');
			// echo $this->db->last_query(); 
			return $query->result_array(); 

		}
		public function get_dataforCDQA_byCampaign($cnid){
			$this->db->select('*');
			$this->db->where('pload', 1);
			$this->db->where('cnid', $cnid);
			
			$query = $this->db->get('leadmaster');
			// echo $this->db->last_query(); 
			return $query->result_array(); 

		}

		public function get_assetitle(){
			
			$query = $this->db->get('assettitle');                       
			return $query->result_array();
		}
		public function get_frequency_type(){
			
			$query = $this->db->get('freqtype');                       
			return $query->result_array();
		}
		public function get_frequency(){
			
			$query = $this->db->get('freqdays');                       
			return $query->result_array();
		}
		public function get_timezones(){
			
			$query = $this->db->get('timezone');                       
			return $query->result_array();
		}


		public function add_user($post_image,$password)
		{
			$data = array('id' => $this->input->post('name'), 
							'emp_id' => $this->input->post('email'),
							'fname' => $password,
							'lname' => $this->input->post('username'),
							'mngr' => $this->input->post('zipcode'),
							'status' => $this->input->post('status'),
							'user_type' => $post_image,
							'password' => $password,
							'last_login' => date("Y-m-d H:i:s")

						  );
			return $this->db->insert('users', $data);
		}
		public function add_Campaign($datacampaign)
		{
                        
			 $this->db->insert('campaign', $datacampaign);
			 $insert_id = $this->db->insert_id();
			//  return true;
			 return  $insert_id;
                        // echo $this->db->last_query(); 
		}
		public function add_leadandcdc($datacdcandlead)
		{
                        
			$this->db->insert('leadmaster', $datacdcandlead);
			//  $insert_id = $this->db->insert_id();
			// echo $this->db->last_query(); 
			return true;
			
			//  return  $insert_id;
                       
		}
		public function add_leaddata($datacdcandlead)
		{
                        
			$this->db->insert('leadmaster', $datacdcandlead);
			//  $insert_id = $this->db->insert_id();
			// echo $this->db->last_query(); 
			return true;
			
			//  return  $insert_id;
                       
		}
		public function save_leaddata($datacdcandlead)
		{
                        
			$this->db->insert('leadmaster', $datacdcandlead);
			//  $insert_id = $this->db->insert_id();
			// echo $this->db->last_query(); 
			return true;
			
			//  return  $insert_id;
                       
		}
		public function add_leadandcdcbyCDQA($datacdcandlead)
		{
                        
			$this->db->insert('leadmaster', $datacdcandlead);
			 $insert_id = $this->db->insert_id();
			 return true;
			// echo $this->db->last_query(); 
			//  return  $insert_id;
                       
		}

		function add_employee_size($add_compsize){
			$this->db->insert('emplzid', $add_compsize);
			$insert_id = $this->db->insert_id();
		 
			return  $insert_id;
		}

		function add_compsize($post_data){
			$this->db->insert('compsize', $post_data);
			$insert_id = $this->db->insert_id();
		 
			return  $insert_id;
		}

		public function get_users($username = FALSE, $limit = FALSE, $offset = FALSE)
		{
			$emp_id = $this->session->userdata('emp_id');
			// if ($limit) {
			// 	$this->db->limit($limit, $offset);
			// }

			if($emp_id == 103){
				$this->db->order_by('users.id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('fname' => $username));
			return $query->row_array();
		}
		public function get_campaign($campaigns = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($campaigns === FALSE){
				$this->db->order_by('campaign.cids', 'DESC');
				$this->db->join('clientscd', 'clientscd.clientid = campaign.clientids');
				$query = $this->db->get('campaign');
				return $query->result_array(); 
			}

//			$query = $this->db->get_where('campaign', array('username' => $username));
			$query = $this->db->get('campaign');
			return $query->row_array();
		}

		public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

		public function get_user($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}

		public function update_user_data($post_image)
		{ 
//			$data = array('name' => $this->input->post('name'),
//							'zipcode' => $this->input->post('zipcode'),
//							'contact' => $this->input->post('contact'),
//							'address' => $this->input->post('address'),
//							'gender' => $this->input->post('gender'),
//							'status' => $this->input->post('status'),
//							'dob' => $this->input->post('dob'),
//							'image' => $post_image,
//							'register_date' => date("Y-m-d H:i:s")
//						  );
                        $data = array('usertype' =>$this->input->post('usertype'));
			$this->db->where('id', $this->input->post('id'));
			$d = $this->db->update('users', $data);
		}

		public function create_product_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'product',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function product_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'product');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_product_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_product_category($id = FALSE)
		  {
		   if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		   }

		   $query = $this->db->get_where('categories', array('id' => $id));
		   return $query->row_array();
		  }


		  public function create_product($post_image)
		{
			$data = array('name' => $this->input->post('name'), 
							'sku' => $this->input->post('sku'),
							'save_price' => $this->input->post('save_price'),
							'price' => $this->input->post('price'),
							'user_id' => $this->session->userdata('user_id'),
							'quantity' => $this->input->post('quantity'),
							'color' => $this->input->post('color'),
							'tag' => $this->input->post('tag'),
							'short_description' => $this->input->post('short_description'),
							'cat_id' => $this->input->post('cat_id'),
							'size' => $this->input->post('size'),
							'status' => $this->input->post('status'),
							'description' => $this->input->post('description'),
							'meta_title' => $this->input->post('meta_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_tag' => $this->input->post('meta_tag'),
							'image' => $post_image,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->insert('products', $data);
			 return  $insert_id = $this->db->insert_id();
		}

		public function insertproductsmultipleImages($data = array()){
       	 $insert = $this->db->insert_batch('product_images',$data);
       	 return $insert?true:false;
    	}

		// Check Product SKU exists
		public function check_sku_exists($sku){
			$query = $this->db->get_where('products', array('sku' => $sku));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		public function get_products($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('products');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();
		}

		public function update_products($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('products');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();
		}

		public function product_images($productId = FALSE){
			$this->db->order_by('id','desc');
			$this->db->where('product_id', $productId);
			$query = $this->db->get('product_images');
			return $query->result_array();
		}

		public function update_products_data($post_image)
		{
			$data = array('name' => $this->input->post('name'), 
							'save_price' => $this->input->post('save_price'),
							'price' => $this->input->post('price'),
							'user_id' => $this->session->userdata('user_id'),
							'quantity' => $this->input->post('quantity'),
							'color' => $this->input->post('color'),
							'tag' => $this->input->post('tag'),
							'short_description' => $this->input->post('short_description'),
							'cat_id' => $this->input->post('cat_id'),
							'size' => $this->input->post('size'),
							'status' => $this->input->post('status'),
							'description' => $this->input->post('description'),
							'meta_title' => $this->input->post('meta_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_tag' => $this->input->post('meta_tag'),
							'image' => $post_image,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('products', $data);
		}

		public function create_faq_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'faq',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function faq_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'faq');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_faq_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_faq_category($id = FALSE)
		 {
		   	if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		}
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row_array();
		}


		//faq models functions start

		 public function create_faq()
		{
			$data = array('question' => $this->input->post('question'), 
							'answer' => $this->input->post('answer'),
							'faq_cat_id' => $this->input->post('faq_cat_id'),
							'status' => 1,
							'datetime' => date("Y-m-d H:i:s")
						);
			return $this->db->insert('faqs', $data);
		}


		public function get_faqs()
		{
			$this->db->select('categories.name catName, faqs.id as faqId,faqs.question,faqs.answer,faqs.datetime,faqs.status as faqStatus');
			$this->db->from('faqs');
			$this->db->join('categories', 'categories.id = faqs.faq_cat_id');
				
				$query=$this->db->get();
				return $data=$query->result_array();
		}

		public function update_faqs($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('faqs');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('faqs', array('id' => $id));
			return $query->row_array();
		}

		public function update_faq_data()
		{
			$data = array('question' => $this->input->post('question'), 
							'answer' => $this->input->post('answer'),
							'faq_cat_id' => $this->input->post('faq_cat_id'),
							'status' => 1,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('faqs', $data);
		}

		//sco pages details start
		public function get_scopages($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sco');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sco', array('id' => $id));
			return $query->row_array();
		}

		public function update_scopages($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sco');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sco', array('id' => $id));
			return $query->row_array();
		}

		public function update_scopages_data($id = FALSE)
		{
			$data = array('title' => $this->input->post('title'), 
							'keywords' => $this->input->post('keywords'),
							'description' => $this->input->post('description')
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('sco', $data);
		}

		//social links
		public function get_sociallinks($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sociallinks');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sociallinks', array('id' => $id));
			return $query->row_array();
		}

		public function update_sociallinks($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sociallinks');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sociallinks', array('id' => $id));
			return $query->row_array();
		}

		public function update_sociallinks_data($id = FALSE)
		{
			$data = array('link' => $this->input->post('link'));
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('sociallinks', $data);
		}

		//slider
		public function create_slider($post_image)
		{
			$data = array('title' => $this->input->post('title'), 
							'image' => $post_image,
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status')
						  );
			return $this->db->insert('sliders_img', $data);
		}

		public function get_sliders($id = false)
		{
			if($id === FALSE){
				$query = $this->db->get('sliders_img');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sliders_img', array('id' => $id));
			return $query->row_array();
		}

		public function get_slider_data($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sliders_img');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sliders_img', array('id' => $id));
			return $query->row_array();
		}

		public function update_slider_data($post_image)
		{
			$data = array('title' => $this->input->post('title'), 
							'image' => $post_image,
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('sliders_img', $data);
		}

		// blogs models functions starts
		public function create_blog($post_image)
		{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id'),
			    'post_image' => $post_image,
			    'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('posts', $data);
		}

		public function listblogs($blogId = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($blogId === FALSE){
				$this->db->order_by('posts.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id');
				$query = $this->db->get('posts');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('posts', array('id' => $blogId));
			return $query->row_array();
		}

	
		public function update_blog_data($post_image){
			$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id'),
			    'post_image' => $post_image
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}

		public function list_blog_comments()
		{
			$this->db->select('comments.username, comments.email, comments.comment, comments.id as commentId, comments.created_at createdAt, comments.status as commentStatus, posts.title as blogTitle');
			$this->db->from('comments');
			$this->db->join('posts', 'posts.id = comments.post_id');
			$this->db->where('comments.comment_type', 'blog');

				$query=$this->db->get();
				return $data=$query->result_array();
		}

		public function view_blog_comments($id = FALSE)
		{

			if($id === FALSE){
				$query = $this->db->get('comments');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('comments', array('id' => $id));
			return $query->row_array();

			
		}



		//social links
		public function get_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}

		public function update_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}

		public function update_siteconfiguration_data($post_image)
		{
			$data = array('site_title' => $this->input->post('site_title'),
						  'site_name' => $this->input->post('site_name'),
						  'logo_img' => $post_image
						);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('site_config', $data);
		}

		//Page Content pages details start
		public function get_pagecontents($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('page_content');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('page_content', array('id' => $id));
			return $query->row_array();
		}

		public function update_pagecontents($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('page_content');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('page_content', array('id' => $id));
			return $query->row_array();
		}

		public function update_pagecontents_data($id = FALSE)
		{
			$data = array('page_name' => $this->input->post('page_name'), 
							'content' => $this->input->post('content'),
							'updated_datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('page_content', $data);
		}

		public function get_galleries_images(){
			$this->db->order_by('id','desc');
			$query = $this->db->get('galleries');
			return $query->result_array();
		}

		public function create_team($team_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 
			    'designation' => $this->input->post('designation'),
			    'description' => $this->input->post('description'),
			    'image' => $team_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('teams', $data);
		}

		public function listteams($teamId = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($teamId === FALSE){
				$this->db->order_by('teams.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id');
				$query = $this->db->get('teams');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('teams', array('id' => $teamId));
			return $query->row_array();
		}

		public function update_team_data($post_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 
			    'designation' => $this->input->post('designation'),
			    'description' => $this->input->post('description'),
			    'image' => $post_image
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('teams', $data);
		}

		public function create_testimonial($uploaded_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 
			    'domain' => $this->input->post('domain'),
			    'description' => $this->input->post('description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('testimonials', $data);
		}

		public function listtestimonial($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				$this->db->order_by('testimonials.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('testimonials');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('testimonials', array('id' => $id));
			return $query->row_array();
		}

		public function update_testimonial_data($uploaded_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 
			    'domain' => $this->input->post('domain'),
			    'description' => $this->input->post('description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('testimonials', $data);
		}

		public function get_admin_data()
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}

		public function change_password($new_password,$emp_id){
			$data = array(
				'password' => md5($new_password)
			    );
			$this->db->where('emp_id', $emp_id);
			return $this->db->update('users', $data);
		}

		public function match_old_password($password)
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('password' => $password));
			return $query->row_array();

		}

		// function start fron forget password

		public function email_exists(){
    $email = $this->input->post('fname');
//    $email = $this->input->post('email');
//    $query = $this->db->query("SELECT email, password FROM users WHERE email='$email'");    
    $query = $this->db->query("SELECT fname, password FROM users WHERE fname='$email'");    
    if($row = $query->row()){
        return TRUE;
    }else{
        return FALSE;
    }
}
public function temp_reset_password($temp_pass){
    $data =array(
                'email' =>$this->input->post('email'),
                'reset_pass'=>$temp_pass);
                $email = $data['email'];

    if($data){
        $this->db->where('email', $email);
        $this->db->update('users', $data);  
        return TRUE;
    }else{
        return FALSE;
    }

}
public function is_temp_pass_valid($temp_pass){
    $this->db->where('reset_pass', $temp_pass);
    $query = $this->db->get('users');
    if($query->num_rows() == 1){
        return TRUE;
    }
    else return FALSE;
}

function saverecords($emp_id,$Fname,$Lname,$Manager,$status1,$user_role,$team,$password,$register_date)
{
	$query="INSERT INTO users( emp_id, fname, lname,mngr,role,team,password,status,last_login) 
		VALUES ('$emp_id','$Fname','$Lname','$Manager','$user_role','$team','$password',$status1,'$register_date')";
		$this->db->query($query);
}

function getSubRegion($region_id)
{
	$region_id = $region_id[0];
	$response = array();
	$test = null;
	if($region_id != 0)
	{
		$test = "where regioncode=$region_id";
	}
	
	$sql = "SELECT DISTINCT subregion,subregioncode FROM country $test group by subregion,subregioncode order by subregion asc";
	$query = $this->db->query($sql);
	// Select record
	// $this->db->select('intercodederived,intermedtregion');
	// // $this->db->where('regioncode', $region_id);
	// if($region_id[0] != 0)
	// {
	// 	$this->db->where_in('regioncode', $region_id );  //this is condition 
	// }
	
	// $q = $this->db->get('country');
	$response = $query->result_array();

	return $response;
}

function getCountry($sub_region_id,$region_id)
{
	$response = array();
	
	// Select record
	$this->db->select('countrycd,countryname');
	// $this->db->where('regioncode', $region_id);
	if($sub_region_id[0] != 0)
	{
		$this->db->where_in('subregioncode', $sub_region_id );  //this is condition 
	}
	if($region_id[0] != 0)
	{
		$this->db->where_in('regioncode', $region_id );  //this is condition 
	}
	$this->db->group_by('countrycd'); 
	$this->db->order_by("countryname", "asc"); 
	$q = $this->db->get('country');
	$response = $q->result_array();

	return $response;
}

function getIndustry($region_id)
{
	$response = array();
	
	// Select record
	$this->db->select('subindustrycd,subindustry');
	// $this->db->where('regioncode', $region_id);
	if($region_id[0] != 0)
	{
		$this->db->where_in('industrycd', $region_id );  //this is condition 
	}
	$this->db->order_by("subindustry", "asc");
	$q = $this->db->get('industry');
	$response = $q->result_array();

	return $response;
}
function check_unique_email($email)
{
	// Select record
	$this->db->select('email');
	$this->db->where('email', $email);
	$result = $this->db->get('leadmaster');
	// echo $this->db->last_query(); 
			if ($result->num_rows() > 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_inclusion_email($email)
{
	// Select record
	$this->db->select('emailids');
	$this->db->where('emailids', $email);
	// $this->db->where('emailids', 'test@test.com');
	$this->db->where('exclincl', 1 ); // check inclusion
	$result = $this->db->get('emaillist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_suppression_email($email)
{
	// Select record
	$this->db->select('emailids');
	$this->db->where('emailids', $email);
	// $this->db->where('emailids', 'test@test.com');
	$this->db->where('exclincl', 0 ); // check Exclusion
	$result = $this->db->get('emaillist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_domain_suppression($domain)
{
	// Select record
	$this->db->select('domainnms');
	$this->db->where('domainnms', $domain);
	// $this->db->where('emailids', 'test@test.com');
	$this->db->where('inclexcl', 0 ); // check Exclusion
	$result = $this->db->get('domainlist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_domain_incl($domain)
{
	// Select record
	$this->db->select('domainnms');
	$this->db->where('domainnms', $domain);
	// $this->db->where('emailids', 'test@test.com');
	$this->db->where('inclexcl', 1 ); // check inclusion
	$result = $this->db->get('domainlist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_company_incl($company_name)
{
	// Select record
	$this->db->select('companynms');
	$this->db->where('companynms', $company_name);
	// $this->db->where('emailids', 'test@test.com');
	$this->db->where('exlincl', 1 ); // check inclusion
	$result = $this->db->get('complist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_company_suppression($company_name)
{
	// Select record
	$this->db->select('companynms');
	$this->db->where('companynms', $company_name);
	// $this->db->where('emailids', 'test@test.com');
	$this->db->where('exlincl', 0 ); // check Exclusion
	$result = $this->db->get('complist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}

function getJobTitle($levelid)
{
	$response = array();
	
	// Select record
	$this->db->select('jid,joblist');
	// $this->db->where('regioncode', $region_id);
	if($levelid[0] != 0)
	{
		$this->db->where_in('joblids', $levelid );  //this is condition 
	}
	$this->db->order_by("joblist", "asc");
	$q = $this->db->get('joblevels');
	$response = $q->result_array();

	return $response;
}

public function get_campaign_by_id($id = FALSE)
{
		// if($id === FALSE){
		// 	$query = $this->db->get('campaign');
		// 	return $query->result_array(); 
		// }

		$query = $this->db->get_where('campaign', array('cnid' => $id));
		// echo $this->db->last_query(); 
		// echo $string;
		// die;
		return $query->result_array();
	}
public function get_leadmasterby_campaignid($id = FALSE)
{
		
		$this->db->where('rlc !=', 1);
		$this->db->where('sbsvtag <', 6);
		$this->db->where('ontag', 1);
		$this->db->where('pload', 0);
		$this->db->where('dvload',0);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		echo $this->db->last_query(); 
		// echo $string;
		// die;
		return $query->result_array();
	}

	public function update_Campaign($datacampaign,$campaign_id)
		{
			$this->db->where('cids', $campaign_id);
			$this->db->update('campaign', $datacampaign);
			// $this->db->last_query(); 
			return true;
			//  $this->db->insert('campaign', $datacampaign);
			//  return true;
                        // echo $this->db->last_query(); 
		}
		public function update_leaddata($updateleadandcdcdata,$lmid)
		{
			$this->db->where('lmid', $lmid);
			$this->db->update('leadmaster', $updateleadandcdcdata);
			return true;
		
		}
		public function update_recordlock($lmid,$datarecord)
		{
			$this->db->where('lmid', $lmid);
			$this->db->update('leadmaster', $datarecord);
			// echo $this->db->last_query(); 
			return true;
			//  $this->db->insert('campaign', $datacampaign);
			//  return true;
                        // echo $this->db->last_query(); 
		}

		function uploadData($filename)
		{
			$count=0;
			$fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
			// echo $fp;die;
			while($csv_line = fgetcsv($fp,1024))
			{
				$count++;
				if($count == 1)
				{
					continue;
				}//keep this if condition if you want to remove the first row
				for($i = 0, $j = count($csv_line); $i < $j; $i++)
				{
					$insert_csv = array();
					$insert_csv['camp_id'] = $csv_line[0];//remove if you want to have primary key,
					$insert_csv['camp_name'] = $csv_line[1];
					$insert_csv['camp_status'] = $csv_line[2];
	
				}
				$i++;
				$data = array(
					'camp_id' => $insert_csv['camp_id'] ,
					'camp_name' => $insert_csv['camp_name'],
					'camp_status' => $insert_csv['camp_status']
				   );
				$data['crane_features']=$this->db->insert('test_csv', $data);
			}
			fclose($fp) or die("can't close file");
			$data['success']="success";
			return $data;
		}

		public function updatecampaignStatus($datacampaign,$campaign_id,$client_id)
		{
			$this->db->where('cnid', $campaign_id);
			// $this->db->where('clientids', $client_id);
			$this->db->update('campaign', $datacampaign);
			return true;
		}

		// Added by Amol
		public function get_empid()
		{
			$this->db->order_by('id','desc');
			$query = $this->db->get('users');
			
			$ret = $query->row();
			return $ret->emp_id;
		}

		// Added by Amol
		public function get_emp_usertype($id = FALSE)
		{
			$this->db->order_by('id','desc');
			$this->db->where('emp_id', $id);
			$query = $this->db->get('users');
			
			$ret = $query->row();
			return $ret->role;
		}
		// Added by Amol
		public function get_sub_designation(){

			$sql = "SELECT DISTINCT joblist,jid FROM joblevels group by joblist,jid";
			return $query = $this->db->query($sql);
		}
		// Added by Amol
		public function get_subindustries(){
			
			$sql = "SELECT DISTINCT subindustrycd,subindustry FROM industry group by subindustry,subindustrycd order by subindustry";
			return $query = $this->db->query($sql);
		}
		// Added by Amol
		public function get_subregions(){
			$this->db->select('subregion,subregioncode');
			 $this->db->group_by('subregioncode');
			  $this->db->group_by('subregion');
		   $query = $this->db->get('country'); 
//                         echo $this->db->last_query(); exit;
		   return $query->result_array();
	   }

		//Added by Amol
		public function get_roles(){
			$this->db->order_by("rid", "ASC");
			$query = $this->db->get('roles');
			return $query->result_array();
		}
		// Addec by Amol
		function getPrivillage($user_role)
		{
			$response = array();
			// $role = (string)$user_role;
			$sql = "SELECT formid,formnm
			FROM
			   privilege
			WHERE
			   privilege LIKE '%$user_role%'";
			   $query = $this->db->query($sql);
			   return $query->result_array();
		}
}