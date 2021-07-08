<?php
	class Administrator_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function adminLogin($emp_id, $encrypt_password,$ctype)
		{
			//Validate
			$this->db->where('cid_type', $ctype);
			$this->db->where('emp_id', $emp_id);
			$this->db->where('status', 0);
			$this->db->where('password', $encrypt_password);
          	//$this->db->join('userlog', 'userlog.empid = users.emp_id');
			$result = $this->db->get('users');
			if ($result->num_rows() == 1) 
			{
				
	
// //                            print_r($result->row(0));
//                            echo $this->db->last_query();
						//    die;
						   
						
				// $this->db->insert('userlog', array('empid' => $emp_id,'login'=> date('Y-m-d H:i:s'))); 
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
		public function get_company()
		{
			$query = $this->db->get('comptype');
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
			// echo $this->db->last_query(); 
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
			// echo $this->db->last_query(); 
			return $query->result_array();

			// $this->db->select('joblids,joblevel');
			// $this->db->group_by('joblids');
			// $this->db->group_by('joblevel');
			// $this->db->join('joblevels',  'cast(joblevels.jid as character varying) = campaign.tid');
			// $this->db->where('campaign.cnid', $cnid);
			// $query = $this->db->get('campaign');
			// return $query->result_array(); 
			
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
		public function get_domain_byCampaign($cnid){
			$this->db->select('domainnms');
			$this->db->where('cid', $cnid);
			$this->db->where('inclexcl', 1 ); // check inclusion
					$this->db->group_start();
					$this->db->where('is_dispo', NULL ); // check disposition
					$this->db->OR_where('is_dispo', 0);
				
					$this->db->group_end(); 
		    $this->db->order_by("is_dispo", "desc");
			$query = $this->db->get('domainlist');
			// echo $this->db->last_query(); 
			return $query->result_array(); 

		}
		public function get_complist_byCampaign($cnid){
			$this->db->select('companynms');
			$this->db->where('cid', $cnid);
			$this->db->where('exlincl', 1 ); // check inclusion
			$this->db->group_start();
					$this->db->where('is_disp', NULL ); // check disposition
					$this->db->OR_where('is_disp', 0);
				
					$this->db->group_end(); 
			$this->db->order_by("is_disp", "desc");
			$query = $this->db->get('complist');
			
			// echo $this->db->last_query(); 
			return $query->result_array(); 

		}
		public function get_comp_dispo_status_byCampaign($cnid){
			$this->db->select('dispo_comp');
			$this->db->where('cnid', $cnid);
			$this->db->where('dispo_comp', 1);
		
			$query = $this->db->get('campaign');
			
			// echo $this->db->last_query(); 
			return $query->result_array(); 

		}
		public function get_domain_dispo_status_byCampaign($cnid){
			$this->db->select('dispo_domain');
			$this->db->where('cnid', $cnid);
			$this->db->where('dispo_domain', 1);
		
			$query = $this->db->get('campaign');
			
			// echo $this->db->last_query(); 
			return $query->result_array(); 

		}
		public function get_incemail_byCampaign($cnid){
			$this->db->select('emailids');
			$this->db->where('cid', $cnid);
			$this->db->where('exclincl', 1 ); // check inclusion
			$query = $this->db->get('emaillist');
			// echo $this->db->last_query(); 
			// return $query->result_array(); 

			// $ret = $query->row();
			$ret = $query->result_array(); 
			// echo $this->db->last_query(); 
			// return $ret->emailids;
			return $ret;
		

		}
		public function get_inccomp_byCampaign($cnid){
			$this->db->select('companynms');
			$this->db->where('cid', $cnid);
			$this->db->where('exlincl', 1 ); // check inclusion
			$query = $this->db->get('complist');
			// echo $this->db->last_query(); 
			// return $query->result_array(); 

			// $ret = $query->row();
			$ret = $query->result_array(); 
			// echo $this->db->last_query(); 
			// return $ret->emailids;
			return $ret;
		

		}
		public function get_incdomain_byCampaign($cnid){
			$this->db->select('domainnms');
			$this->db->where('cid', $cnid);
			$this->db->where('inclexcl', 1 ); // check inclusion
			$query = $this->db->get('domainlist');
			// echo $this->db->last_query(); 
			// return $query->result_array(); 

			// $ret = $query->row();
			$ret = $query->result_array(); 
			// echo $this->db->last_query(); 
			// return $ret->emailids;
			return $ret;
		

		}
		public function get_subindustries_byCampaign($cnid,$myarray){
		
			$this->db->select('*');
			
			if($myarray[0] != 0)
			{
				$this->db->where_in('industrycd', $myarray );  //this is condition 
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
		public function get_countriesbyCampaigndv($lmid){
			$this->db->select('countryname');
			$this->db->join('country', 'country.countrycd = leadmaster.country');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('leadmaster');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
		}
		public function get_industries_ofleadmaster($lmid){
			$this->db->select('industry');
			$this->db->join('industry', 'industry.industrycd = leadmaster.indtry');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('leadmaster');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
		}
		public function get_subindustries_ofleadmaster($lmid){
			$this->db->select('subindustry');
			$this->db->join('industry', 'industry.subindustrycd = leadmaster.sindtry');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('leadmaster');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
		}
		public function get_designation_ofleadmaster($lmid){
			$this->db->select('joblist');
			$this->db->join('joblevels', 'joblevels.jid = leadmaster.jlevel');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('leadmaster');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
		}
		public function get_depts_byleadmaster($lmid){
			$this->db->select('department');
			$this->db->join('dept', 'dept.dcd = leadmaster.dname');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('leadmaster');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
		}
		public function get_comptype_byleadmaster($lmid){
			$this->db->select('ctypname');
			$this->db->join('comptype', 'comptype.ctypid = leadmaster.ctyp');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('leadmaster');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
		}
		public function get_assetitle_byleadmaster($lmid){
			$this->db->select('title');
			$this->db->join('leadmaster', 'assettitle.assetid = leadmaster.atitle');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('assettitle');
			
		// echo $this->db->last_query(); 
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
		}
		public function get_currency_ofleadmaster($lmid){
			
			$this->db->select('country.currab,country.currnme,country.currid');
			$this->db->group_by('country.currab');
			$this->db->group_by('country.currnme');
			$this->db->group_by('country.currid');
			
			$this->db->join('country', 'country.currid = leadmaster.curr');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('leadmaster');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
		}
		public function get_timezone_ofleadmaster($lmid){
			
			$this->db->select('timezone.zoneid,timezone.abbrev,timezone.zids');
			$this->db->group_by('timezone.zoneid');
			$this->db->group_by('timezone.abbrev');
			$this->db->group_by('timezone.zids');
			
			$this->db->join('timezone', 'timezone.zids = leadmaster.timez');
			
			$this->db->where('lmid', $lmid);
			$query = $this->db->get('leadmaster');
			
		
			$response = $query->result_array();
			return $response;
			// echo $this->db->last_query(); 

			
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
			$this->db->select('timezone.zoneid,timezone.abbrev,timezone.zids');
			$this->db->group_by('timezone.zoneid');
			$this->db->group_by('timezone.abbrev');
			$this->db->group_by('timezone.zids');
			foreach ($myarray as $arr)
			{	
				$this->db->OR_where('countrycd', $arr);
			}
			$query = $this->db->get('timezone');
			// echo $this->db->last_query(); 
			return $query->result_array();
			
		}

		function gettimezonesbycountry($country_id)
		{
			$response = array();
			
			// Select record
			$this->db->select('timezone.zoneid,timezone.abbrev,timezone.zids');
			$this->db->group_by('timezone.zoneid');
			$this->db->group_by('timezone.abbrev');
			$this->db->group_by('timezone.zids');
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
		public function add_ini_data($addinidataarray)
		{
                        
			 $this->db->insert('ini_data', $addinidataarray);
			 $insert_id = $this->db->insert_id();
			 return true;
			//  return  $insert_id;
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
			$manager = $this->get_manager_by_emp($emp_id);
			
			// if ($limit) {
			// 	$this->db->limit($limit, $offset);
			// }

			if($emp_id == 103 || $emp_id = 101){
				$this->db->order_by('users.id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('mngr' => $manager));
			// echo $this->db->last_query(); 
			return $query->result_array();
		}
		public function get_users_for_accpted_report($username = FALSE, $limit = FALSE, $offset = FALSE)
		{
		
		

		
				$this->db->order_by('users.id', 'DESC');
				$this->db->where('users.status',0);	
				$this->db->where('users.role',5);	
				$query = $this->db->get('users');
				return $query->result_array(); 
			

		
		}
		public function get_userslist($userstatus,$cid_type,$roles)
		{
			
			$emp_id = $this->session->userdata('emp_id');
			$manager = $this->get_manager_by_emp($emp_id);
			$this->db->join('roles', 'roles.rid = users.role');

			if(isset($userstatus) && $userstatus == "deactivated")
			{
				$this->db->where('users.status',1);
			}
			if(isset($userstatus) && $userstatus == "active"){
				$this->db->where('users.status',0);	
			}
			if(isset($cid_type) && $cid_type == "TMB")
			{
				$this->db->where('users.cid_type','TMB');
			}
			if(isset($cid_type) && $cid_type == "HP")
			{
				$this->db->where('users.cid_type','HP');
			}
			if(isset($cid_type) && $cid_type == "ME")
			{
				$this->db->where('users.cid_type','ME');
			
			}
			if(isset($roles) && $roles == "1")
			{
				$this->db->where('users.role','1');
			}
			if(isset($roles) && $roles == "2")
			{
				$this->db->where('users.role','2');
			}
			if(isset($roles) && $roles == "3")
			{
				$this->db->where('users.role','3');
			}
			if(isset($roles) && $roles == "4")
			{
				$this->db->where('users.role','4');
			}
			if(isset($roles) && $roles == "5")
			{
				$this->db->where('users.role','5');
			}
			if(isset($roles) && $roles == "6")
			{
				$this->db->where('users.role','6');
			}
			if(!isset($userstatus) && !isset($roles) && !isset($cid_type))
			{
				$this->db->where('users.status',0);
			}
			
			
			$this->db->order_by('users.id', 'DESC');
			$query = $this->db->get('users');
			
			// echo $this->db->last_query(); 
			return $query->result_array();
		}
		public function get_usersforreport($username = FALSE, $limit = FALSE, $offset = FALSE)
		{
			$emp_id = $this->session->userdata('emp_id');
			$empcode = $this->session->userdata('empcode');
			$manager = $this->get_manager_by_emp($emp_id);
			
			// if ($limit) {
			// 	$this->db->limit($limit, $offset);
			// }

			if($emp_id == 103){
				$this->db->order_by('users.id', 'DESC');
				//$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('mngr' => $manager));
			return $query->result_array();
		}
		public function get_campaign($campaigns = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($campaigns === FALSE){
				$this->db->order_by('campaign.cids', 'DESC');
				$this->db->join('clientscd', 'clientscd.clientid = campaign.clientids');
				$query = $this->db->where('campaign.status', 2);
				$query = $this->db->get('campaign');
				// echo $this->db->last_query(); 
				return $query->result_array(); 
			}

			// $query = $this->db->where('campaign.status', 2);
			$query = $this->db->get('campaign');
			
			return $query->row_array();
		}

		public function enable($id,$table){
			$data = array(
				'status' => 1,
				'exp_date' => date("Y-m-d H:i:s")
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'status' => 0,
				'exp_date' => date("Y-m-d H:i:s")
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
			$cid_type = $this->input->post('ctype');
			if($cid_type == 'TMB')
			{
				$code = 93;
			}
			else if($cid_type == 'ME')
			{
				$code = 91;
			}
			else if($cid_type == 'HP')
			{
				$code = 92;
			}
			$empcode = $code.$this->input->post('emp_id');
			$teamstr = implode(',',$this->input->post('team'));
			$data = array('fname' => $this->input->post('Fname'),
							'lname' => $this->input->post('Lname'),
							'mngr' => $this->input->post('Manager'),
							'role' => $this->input->post('user_role'),
							'team' => $teamstr,
							// 'password' => $this->input->post('dob'),
							// 'status' => $post_image,
							'last_login' => date("Y-m-d H:i:s"),
							'cid_type' => $this->input->post('ctype'),
							'empcode' => $empcode,
						  );
                        // $data = array('usertype' =>$this->input->post('usertype'));
			$this->db->where('emp_id', $this->input->post('emp_id'));
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
			$id = $this->session -> userdata('emp_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('emp_id' => $id));
			return $query->row_array();
		}

		public function change_password($new_password,$emp_id){
			$data = array(
				'password' => md5($new_password)
			    );
			$this->db->where('emp_id', $emp_id);
			$this->db->or_where('empcode', $emp_id);
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
public function get_employee_rlc_record($empcode){
    $this->db->where('agent', $empcode);
    $this->db->where('rlc', 1);
    $query = $this->db->get('leadmaster');
	return $query->num_rows();

    // if($query->num_rows() >= 3){
    //     return TRUE;
    // }
    // else return FALSE;
}

function saverecords($emp_id,$Fname,$Lname,$Manager,$status1,$user_role,$team,$password,$register_date,$cid_type,$empcode)
{
	$query="INSERT INTO users( emp_id, fname, lname,mngr,role,team,password,status,last_login,cid_type,empcode) 
		VALUES ('$emp_id','$Fname','$Lname','$Manager','$user_role','$team','$password',$status1,'$register_date','$cid_type',$empcode)";
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
function check_inclusion_email($email,$campaign_id)
{
	// Select record
	$this->db->select('emailids');
	$this->db->where('emailids', $email);
	$this->db->where('cid', $campaign_id);
	$this->db->where('exclincl', 1 ); // check inclusion
	$result = $this->db->get('emaillist');
	// echo $this->db->last_query();  
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

		// return $result->result_array(); 


}
function check_suppression_email($email,$campaign_id)
{
	// Select record
	$this->db->select('emailids');
	$this->db->where('emailids', $email);
	$this->db->where('cid', $campaign_id);
	$this->db->where('exclincl', 0 ); // check Exclusion
	$result = $this->db->get('emaillist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_domain_suppression($domain,$campaign_id)
{
	// Select record
	$this->db->select('domainnms');
	$this->db->where('domainnms', $domain);
	$this->db->where('cid', $campaign_id);
	$this->db->where('inclexcl', 0 ); // check Exclusion
	$result = $this->db->get('domainlist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_domain_incl($domain,$campaign_id)
{
	// Select record
	$this->db->select('domainnms');
	$this->db->where('domainnms', $domain);
	$this->db->where('cid', $campaign_id);
	$this->db->where('inclexcl', 1 ); // check inclusion
	$result = $this->db->get('domainlist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_company_incl($company_name,$campaign_id)
{
	// Select record
	$this->db->select('companynms');
	$this->db->where('companynms', $company_name);
	$this->db->where('cid', $campaign_id);
	$this->db->where('exlincl', 1 ); // check inclusion
	$result = $this->db->get('complist');
	// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return "true";        
			}else{
				return "false";
			}

}
function check_company_suppression($company_name,$campaign_id)
{
	// Select record
	$this->db->select('companynms');
	$this->db->where('companynms', $company_name);
	$this->db->where('cid', $campaign_id);
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

public function get_campaign_cids_by_leadmaster_for_candidate($id = FALSE)
{
		// if($id === FALSE){
		// 	$query = $this->db->get('campaign');
		// 	return $query->result_array(); 
		// }

		$query = $this->db->get_where('campaign', array('cids' => $id));
		// echo $this->db->last_query(); 
		// echo $string;
		// die;
		return $query->result_array();
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
public function get_campaign_with_status($id = FALSE)
{
	$response = array();
	
	// Select record
	$this->db->select('cnid,campnm');
	 $this->db->where('status', $id);
	
	$this->db->order_by("cnid", "desc");
	$q = $this->db->get('campaign');
	$response = $q->result_array();

	return $response;

		// $query = $this->db->get_where('campaign', array('status' => $id));
		// // echo $this->db->last_query(); 
		
		// return $query->result_array();
	}
public function get_campaign_with_status_initialise($cnid,$status)
{
	$response = array();
	
	// Select record
	$this->db->where('cnid', $cnid);
	$this->db->where('status', $status);
	
	$this->db->order_by("cnid", "desc");
	$q = $this->db->get('campaign');
	$response = $q->result_array();
	// echo $this->db->last_query(); 
	return $response;
		
	
	}

	public function get_ev_cleared($id = FALSE,$leadlimit = false)
{
		
	
		$this->db->where('sbsvtag !=', 0);
		$this->db->where('qasv', NULL);
		$this->db->where('cdcsv', NULL);
		$this->db->where('evload',1);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		
		if(isset($leadlimit) && $leadlimit != null){
			$this->db->limit($leadlimit);	
		}
	
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
	
		return $query->result_array(); 
	}
	public function get_dv_cleared($id = FALSE,$leadlimit = false)
{
		
	
		$this->db->where('sbsvtag !=', 0);
		$this->db->where('qasv', NULL);
		$this->db->where('cdcsv', NULL);
		$this->db->where('dvload',1);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		
		if(isset($leadlimit) && $leadlimit != null){
			$this->db->limit($leadlimit);	
		}
	
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
	
		return $query->result_array(); 
	}
	public function get_cdc_cleared($id = FALSE,$leadlimit = false)
{
		
	
		$this->db->where('sbsvtag !=', 0);
		$this->db->where('cdcsv', NULL);
		$this->db->where('qasv', NULL);
		$this->db->where('cdcload',1);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		
		if(isset($leadlimit) && $leadlimit != null){
			$this->db->limit($leadlimit);	
		}
	
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
	
		return $query->result_array(); 
	}
	public function get_dc_cleared($id = FALSE,$leadlimit = false)
{
		
		
		$this->db->where('sbsvtag <', 6);
		$this->db->where('sbsvtag !=', 0);
		$this->db->where('qaacpt', NULL);
		$this->db->where('qasv', NULL);
		$this->db->where('cdcsv', NULL);

			$this->db->group_start();
			$this->db->where('dvrejtg < 3 AND dvsbtg < 3');
			$this->db->OR_where('qarej', 1);
			$this->db->OR_where('cdcrjt <', '4');
			$this->db->group_end(); 
		
		$this->db->where('ontag', 0);
		$this->db->where('pload', 1);
		$this->db->where('dvload',0);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		$this->db->order_by('stdti','ASC');
		$this->db->order_by('stdtii','ASC');
		if(isset($leadlimit) && $leadlimit != null){
			$this->db->limit($leadlimit);	
		}
	
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
	
		return $query->result_array(); 
	}

	public function get_dc_pending($id = FALSE,$leadlimit = false)
	{
			
			
			$this->db->where('sbsvtag <', 6);
			$this->db->where('sbsvtag !=', 0);
			$this->db->where('qasv', NULL);
			$this->db->where('cdcsv', NULL);
			$this->db->where('qaacpt', NULL);
	
			$this->db->group_start();
			$this->db->where('dvrejtg < 3 AND dvsbtg < 3');
			$this->db->OR_where('dvrejtg is NULL AND dvsbtg is NULL');
			$this->db->OR_where('qarej', 1);
			$this->db->OR_where('cdcrjt <', '4');//if dvrej is 3, then check cdcrjt
			$this->db->group_end(); 
		
			$this->db->where('ontag', 1);
			$this->db->where('pload', 0);
			$this->db->where('dvload',0);
			$this->db->where('evload',null);
			$this->db->where('cdcload',null);
			$this->db->where('qaload',null);
			$this->db->where('rlc !=', 1);
		
		
				$this->db->order_by('dvrdti','ASC');
				$this->db->order_by('dvrdtii','ASC');
				if(isset($leadlimit) && $leadlimit != null){
					$this->db->limit($leadlimit);	
				}
			
		
			$query = $this->db->get_where('leadmaster', array('cids' => $id));
		
			return $query->result_array();
		} 
	public function get_dc_saved($id = FALSE,$leadlimit = false)
	{
			
			
			
			$this->db->where('sbsvtag', 0);
			$this->db->where('qasv', NULL);
			$this->db->where('cdcsv', NULL);
			$this->db->where('qaacpt', NULL);
	
			// $this->db->group_start();
			// $this->db->where('dvrejtg < 3 AND dvsbtg < 3');
			// $this->db->OR_where('dvrejtg is NULL AND dvsbtg is NULL');
			// $this->db->OR_where('qarej', 1);
			// $this->db->OR_where('cdcrjt <', '4');//if dvrej is 3, then check cdcrjt
			// $this->db->group_end(); 
		
			// $this->db->where('ontag', 1);
			// $this->db->where('pload', 0);
			// $this->db->where('dvload',0);
			$this->db->where('evload',null);
			$this->db->where('cdcload',null);
			$this->db->where('qaload',null);
			$this->db->where('rlc !=', 1);
		
		
				$this->db->order_by('dvrdti','ASC');
				$this->db->order_by('dvrdtii','ASC');
				if(isset($leadlimit) && $leadlimit != null){
					$this->db->limit($leadlimit);	
				}
			
		
			$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
			return $query->result_array();
		} 
	public function get_dv_rejected($id = FALSE,$leadlimit = false)
	{
			
			
			
			$this->db->where('sbsvtag <', 6);
		
			$this->db->where('sbsvtag !=', 0);
			$this->db->where('dvstat', 2);
			$this->db->where('qasv', NULL);
			$this->db->where('cdcsv', NULL);
			$this->db->where('qaacpt', NULL);
	
			// $this->db->group_start();
			// $this->db->where('dvrejtg < 3 AND dvsbtg < 3');
			// $this->db->OR_where('dvrejtg is NULL AND dvsbtg is NULL');
			// $this->db->OR_where('qarej', 1);
			// $this->db->OR_where('cdcrjt <', '4');//if dvrej is 3, then check cdcrjt
			// $this->db->group_end(); 
		
			// $this->db->where('ontag', 1);
			// $this->db->where('pload', 0);
			$this->db->where('dvload',0);
			$this->db->where('evload',null);
			$this->db->where('cdcload',null);
			$this->db->where('qaload',null);
			$this->db->where('rlc !=', 1);
		
		
				$this->db->order_by('dvrdti','ASC');
				$this->db->order_by('dvrdtii','ASC');
				if(isset($leadlimit) && $leadlimit != null){
					$this->db->limit($leadlimit);	
				}
			
		
			$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
			return $query->result_array();
		} 
	public function get_cdc_rejected($id = FALSE,$leadlimit = false)
	{
			
			
			
			$this->db->where('sbsvtag <', 6);
		
			$this->db->where('sbsvtag !=', 0);
			
			$this->db->where('qasv', NULL);
			$this->db->where('cdcsv', NULL);
			$this->db->where('qaacpt', NULL);
	
			$this->db->group_start();
			$this->db->where('cdcrjtdti  is NOT NULL');
			$this->db->OR_where('cdcrjtdtii is NOT NULL');
			// $this->db->OR_where('qarej', 1);
			
			
			$this->db->group_end(); 
		
			// $this->db->where('ontag', 1);
			// $this->db->where('pload', 0);
			// $this->db->where('dvload',0);
			$this->db->where('cdcrjt <', '4');
			$this->db->where('cdcsbdti',null);
			$this->db->where('evload',null);
			$this->db->where('cdcload',null);
			$this->db->where('qaload',null);
			$this->db->where('rlc !=', 1);
		
		
				$this->db->order_by('dvrdti','ASC');
				$this->db->order_by('dvrdtii','ASC');
				if(isset($leadlimit) && $leadlimit != null){
					$this->db->limit($leadlimit);	
				}
			
		
			$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
			return $query->result_array();
		} 
	public function get_ev_rejected($id = FALSE,$leadlimit = false)
	{
			$this->db->where('sbsvtag <', 6);
		
			$this->db->where('sbsvtag !=', 0);
			
			$this->db->where('qasv', NULL);
			$this->db->where('cdcsv', NULL);
			$this->db->where('qaacpt', NULL);
	
			$this->db->group_start();
			$this->db->where('evdisp','5');
			$this->db->OR_where('evdisp','6');
			$this->db->OR_where('evdisp','2');
			$this->db->OR_where('evdisp','3');
			
			$this->db->group_end(); 
		
			// $this->db->where('ontag', 1);
			// $this->db->where('pload', 0);
			// $this->db->where('dvload',0);
			// $this->db->where('cdcrjt <', '4');
			// $this->db->where('cdcsbdti',null);
			
			$this->db->where('cdcload',null);
			$this->db->where('qaload',null);
			$this->db->where('rlc !=', 1);
		
		
				$this->db->order_by('dvrdti','ASC');
				$this->db->order_by('dvrdtii','ASC');
				if(isset($leadlimit) && $leadlimit != null){
					$this->db->limit($leadlimit);	
				}
			
		
			$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
			return $query->result_array();
		} 
	public function get_cdc_saved($id = FALSE,$leadlimit = false)
	{
			
			
			$this->db->where('sbsvtag <', 6);	
			// $this->db->where('sbsvtag', 0);
			$this->db->where('qasv', NULL);
			$this->db->where('cdcsv', 0);
			// $this->db->where('qaacpt', NULL);
	
			// $this->db->group_start();
			// $this->db->where('dvrejtg < 3 AND dvsbtg < 3');
			// $this->db->OR_where('dvrejtg is NULL AND dvsbtg is NULL');
			// $this->db->OR_where('qarej', 1);
			// $this->db->OR_where('cdcrjt <', '4');//if dvrej is 3, then check cdcrjt
			// $this->db->group_end(); 
		
			// $this->db->where('ontag', 1);
			// $this->db->where('pload', 0);
			// $this->db->where('dvload',0);
			// $this->db->where('evload',null);
			// $this->db->where('cdcload',null);
			$this->db->where('qaload',null);
			$this->db->where('rlc !=', 1);
		
		
				$this->db->order_by('cdcrjtdti','ASC');
				$this->db->order_by('cdcrjtdtii','ASC');
				if(isset($leadlimit) && $leadlimit != null){
					$this->db->limit($leadlimit);	
				}
			
		
			$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
			return $query->result_array();
		} 
		
	public function get_asis_count($id = FALSE,$leadlimit = false)
	{
			
			
			// $this->db->where('sbsvtag <', 6);	
			// $this->db->where('sbsvtag', 0);
			// $this->db->where('qasv', NULL);
			// $this->db->where('cdcsv', 0);
			// $this->db->where('qaacpt', NULL);
	
			// $this->db->group_start();
			// $this->db->where('dvrejtg < 3 AND dvsbtg < 3');
			// $this->db->OR_where('dvrejtg is NULL AND dvsbtg is NULL');
			// $this->db->OR_where('qarej', 1);
			// $this->db->OR_where('cdcrjt <', '4');//if dvrej is 3, then check cdcrjt
			// $this->db->group_end(); 
		
			// $this->db->where('ontag', 1);
			// $this->db->where('pload', 0);
			// $this->db->where('dvload',0);
			// $this->db->where('evload',null);
			// $this->db->where('cdcload',null);
			// $this->db->where('qaload',null);
			// $this->db->where('rlc !=', 1);
		
		
				// $this->db->order_by('cdcrjtdti','ASC');
				// $this->db->order_by('cdcrjtdtii','ASC');
				if(isset($leadlimit) && $leadlimit != null){
					$this->db->limit($leadlimit);	
				}
			
		
			$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
			return $query->result_array();
		} 
		

public function get_leadmasterby_campaignid($id = FALSE)
{
		
		
		$this->db->where('sbsvtag <', 6);
		// $this->db->where('sbsvtag <', 3);
		$this->db->where('sbsvtag !=', 0);
		$this->db->where('dvrejtg <', '3');
		// $this->db->where('dvrejtg <', '2');
		$this->db->where('dvsbtg <', '3');
		// $this->db->where('dvsbtg <', '2');
		$this->db->where('ontag', 1);
		$this->db->where('pload', 0);
		$this->db->where('dvload',0);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		$this->db->order_by('dvrdti','ASC');
		$this->db->limit(1);
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
		// echo $string;
		// die;
		return $query->result_array();
	}
public function get_leadmasterby_campaignidwithempcode($id = FALSE,$empcode)
{
		
		
		$this->db->where('sbsvtag <', 6);
		// $this->db->where('sbsvtag <', 3);
		$this->db->where('sbsvtag !=', 0);
		$this->db->where('qasv', NULL);
		// $this->db->where('dvrejtg <', '3');
		// $this->db->where('dvsbtg <', '3');
		$this->db->where('qaacpt', NULL);

		$this->db->group_start();
		$this->db->where('dvrejtg < 3 AND dvsbtg < 3');
		$this->db->OR_where('dvrejtg is NULL AND dvsbtg is NULL');
		$this->db->OR_where('qarej', 1);
		$this->db->OR_where('cdcrjt <', '4');//if dvrej is 3, then check cdcrjt
		$this->db->group_end(); 
	
		$this->db->where('ontag', 1);
		$this->db->where('pload', 0);
		$this->db->where('dvload',0);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		// $this->db->group_start();
		// 		$this->db->where('stagtidi',$empcode);
				// $this->db->OR_where('stagtidii',$empcode);
		// 		$this->db->OR_where('stagtidi', NULL);
		// $this->db->group_end(); 
	
			// $this->db->order_by('dvrejtg','DESC');
			$this->db->order_by('dvrdti','ASC');
			$this->db->order_by('dvrdtii','ASC');
		
		
		$this->db->limit(1);
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query();  
		// echo $string;
		// die;
		return $query->result_array();
	} 
	
public function get_leadmasterby_campaigniddv($id = FALSE)
{
		
		
		$this->db->where('sbsvtag <', 6);
		// $this->db->where('sbsvtag <', 3);
		$this->db->where('sbsvtag !=', 0);
		// $this->db->where('dvrejtg <', '3');
		// $this->db->where('dvsbtg <', '3');
		$this->db->where('qaacpt', NULL);
		$this->db->where('qasv', NULL);

			$this->db->group_start();
			$this->db->where('dvrejtg < 3 AND dvsbtg < 3');
			$this->db->OR_where('qarej', 1);
			$this->db->OR_where('cdcrjt <', '4');
			$this->db->group_end(); 
		
		$this->db->where('ontag', 0);
		$this->db->where('pload', 1);
		$this->db->where('dvload',0);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		$this->db->order_by('stdti','ASC');
		$this->db->order_by('stdtii','ASC');
		$this->db->limit(1);
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
		// echo $string;
		// die;
		return $query->result_array(); 
	}
public function get_leadmasterby_campaignQA($id = FALSE)
{
		
		
	$this->db->where('cdcsb <', '4');
	$this->db->where('cdcrjt <', '4');
	// $this->db->where('cdcsv !=', 0);
	$this->db->where('cdcsv', NULL);
	$this->db->where('qasv', NULL);
	$this->db->where('sbsvtag !=', 0);
	// $this->db->where('evload',0); 
	$this->db->where('cdcload',1);
	$this->db->where('qaload',null);
	$this->db->where('qalsload',null);
	$this->db->where('rlc !=', 1);
		$this->db->group_start();
		$this->db->where('ddispositionclass', '0');
		$this->db->OR_where('ddispositionclass', NULL);
		$this->db->group_end(); 
	$this->db->order_by('cdcsbdti','ASC');
	$this->db->order_by('cdcsbdtii','ASC');
	$this->db->limit(1);
	$query = $this->db->get_where('leadmaster', array('cids' => $id));
	// echo $this->db->last_query(); 
	// echo $string;
	// die;

		return $query->result_array();
	}

	public function get_leadmasterby_campaign_lead_generation($id = FALSE,$leadlimit,$leadrectype,$empcode =FALSE)
{
	if(isset($leadrectype) && $leadrectype == "new"){
		$this->db->where('leadmaster.cdcsb <', '4');
		$this->db->where('leadmaster.cdcrjt <', '4');
		$this->db->where('leadmaster.cdcsv', NULL);
		$this->db->where('leadmaster.qasv', NULL);
		$this->db->where('leadmaster.sbsvtag !=', 0);
		$this->db->where('leadmaster.dnd !=', '1');
		$this->db->where('leadmaster.lsagent',NULL);
		$this->db->group_start();
		$this->db->where('leadmaster.cdclst', 0);
		$this->db->OR_where('leadmaster.cdclst', NULL);
		$this->db->group_end(); 
		$this->db->where('leadmaster.cvr', 1);
		
		$this->db->where('leadmaster.rlc !=', 1);
		$this->db->where('leadmaster.qalsload', 1);
				$this->db->group_start();
				$this->db->where('leadmaster.lsfinal', '0');
				$this->db->OR_where('leadmaster.lsfinal', NULL);
				$this->db->group_end(); 
		// $this->db->where('lsfinal !=', 1);
		$this->db->join('country', 'leadmaster.country = country.countrycd');
		
		$this->db->order_by('leadmaster.qaacptdti','ASC');
		// $this->db->limit(5);	
		// $this->db->limit($leadlimit);
		$this->db->limit($leadlimit);		
		$query = $this->db->get_where('leadmaster', array('leadmaster.cids' => $id));
	
	}
	else{ // assigned
		$this->db->where('leadmaster.cdcsb <', '4');
		$this->db->where('leadmaster.cdcrjt <', '4');
		
		$this->db->where('leadmaster.cdcsv', NULL);
		$this->db->where('leadmaster.qasv', NULL);
		$this->db->where('leadmaster.sbsvtag !=', 0);
		$this->db->where('leadmaster.dnd !=', '1');
			$this->db->group_start();
			$this->db->where('leadmaster.cdclst', 0);
			$this->db->OR_where('leadmaster.cdclst', NULL);
			$this->db->group_end(); 
		$this->db->where('leadmaster.cvr', 1);
		
		$this->db->where('leadmaster.rlc !=', 1);
		$this->db->where('leadmaster.qalsload', 1);
	
		$this->db->where('leadmaster.lsagent', $empcode);
	
				$this->db->group_start();
				$this->db->where('leadmaster.lsfinal', '0');
				$this->db->OR_where('leadmaster.lsfinal', NULL);
				$this->db->group_end(); 
		// $this->db->where('lsfinal !=', 1);
		$this->db->join('country', 'leadmaster.country = country.countrycd');
		
		$this->db->order_by('leadmaster.qaacptdti','ASC');
		// $this->db->limit(5);
		if(isset($leadlimit) && $leadlimit != null){
			$this->db->limit($leadlimit);	
		}
		
		else{
		$this->db->limit(5);	
		}
		$query = $this->db->get_where('leadmaster', array('leadmaster.cids' => $id));


	}
		
	
	// $this->db->limit(1);
	if(isset($leadlimit) && $leadlimit != null){
		$this->db->limit($leadlimit);	
	}
	
	else{
	$this->db->limit(5);	
	}
	
	
	// echo $this->db->last_query(); 
	
	
		return $query->result_array();
	}
	public function get_leadmasterby_campaign_lead_generation_with_rlc_lock($id = FALSE,$postDatalmid)
{
	
		
	$this->db->where('cdcsb <', '4');
	$this->db->where('cdcrjt <', '4');
	$this->db->where('cdcsv', NULL);
	$this->db->where('qasv', NULL);
	$this->db->where('sbsvtag !=', 0);
	$this->db->where('dnd !=', '1');
		$this->db->group_start();
			$this->db->where('cdclst', 0);
			$this->db->OR_where('cdclst', NULL);
		$this->db->group_end(); 
	$this->db->where('cvr', 1);
	if(isset($postDatalmid)){
		
		$this->db->where('lmid', $postDatalmid);
		$this->db->where('rlc =', 1);	
	}else{
		$this->db->where('rlc !=', 1);
	}
	
	
	$this->db->where('qalsload', 1);
			$this->db->group_start();
			$this->db->where('lsfinal', '0');
			$this->db->OR_where('lsfinal', NULL);
			$this->db->group_end(); 
	

	
	$this->db->order_by('qaacptdti','ASC');
	$this->db->limit(1);
	$query = $this->db->get_where('leadmaster', array('cids' => $id));
	// echo $this->db->last_query(); 
	

		return $query->result_array();
	}
public function get_leadmasterby_campaign_CDC($id = FALSE,$postDatalmid,$camp_id2)
{
	
		
		$this->db->where('cdcsb <', '4');
		$this->db->where('cdcrjt <', '4');
		$this->db->where('sbsvtag !=', 0);
		// $this->db->where('cdcsv !=', 0);
		$this->db->where('cdcsv', NULL);
		$this->db->where('qasv',NULL);
		$this->db->where('evload',1);
		// $this->db->where('cdcload',0);
		$this->db->where('cdcload',NULL);

		$this->db->where('qaload',null);
		$this->db->where('qalsload',null);
		// $this->db->where('rlc !=', 1);
		// if(isset($postDatalmid) && isset($camp_id2)){
		if(isset($postDatalmid)){
			// $this->db->where('cids', $camp_id2);	
			$this->db->where('lmid', $postDatalmid);
			$this->db->where('rlc =', 1);	
		}else{
			$this->db->where('rlc !=', 1);
		}
		$this->db->order_by('evdti','ASC');
		$this->db->limit(1);
		$query = $this->db->get_where('leadmaster', array('cids' => $id));
		// echo $this->db->last_query(); 
		// echo $string;
		// die;


		return $query->result_array();
	}
	public function get_leadmasterby_campaignid_for_email($id = FALSE)
	{
			
			
			$this->db->where('sbsvtag <', 6);
			$this->db->where('sbsvtag !=', 0);
			$this->db->where('ontag', 1);
			$this->db->where('pload', 0);
			$this->db->where('dvload',0);
			$this->db->where('evload',null);
			$this->db->where('cdcload',null);
			$this->db->where('qaload',null);
			$this->db->where('rlc !=', 1);
			$this->db->limit(10);
			$query = $this->db->get_where('leadmaster', array('cids' => $id));
			// echo $this->db->last_query(); 
			// echo $string;
			// die;
			return $query->result_array();
		}
public function get_campaign_fordataverification()
{
	// $this->db->select('subregion,subregioncode');
	// $this->db->group_by('subregioncode');
	//  $this->db->group_by('subregion');
	 
		$this->db->select('campaign.cids,campaign.cnid,campaign.campnm');
		$this->db->group_by('campaign.cids');
		$this->db->group_by('campaign.campnm');
		$this->db->group_by('campaign.cnid');
		$this->db->where('leadmaster.sbsvtag <', '6');		
		$this->db->where('leadmaster.sbsvtag !=', 0);
		$this->db->where('leadmaster.qaacpt', NULL); //should not be accepted in qa
		$this->db->where('leadmaster.qasv', NULL); //should not be accepted in qa
	
		// $this->db->where('leadmaster.dvrejtg <', '3');	
		// $this->db->where('leadmaster.dvsbtg <', '3');
		$this->db->group_start();
		$this->db->where('leadmaster.dvrejtg < 3 AND leadmaster.dvsbtg < 3');
		$this->db->OR_where('leadmaster.qarej', 1);
		$this->db->OR_where('leadmaster.cdcrjt <', '4');
		// $this->db->OR_where('leadmaster.cdcmandt', 1);
		$this->db->group_end(); 
	
		$this->db->where('leadmaster.ontag', 0); 
		$this->db->where('leadmaster.pload', 1);
		$this->db->where('leadmaster.dvload',0);
		$this->db->where('leadmaster.evload',null);
		$this->db->where('leadmaster.cdcload',null);
		$this->db->where('leadmaster.qaload',null);
		$this->db->where('leadmaster.rlc !=', 1);
		$this->db->where('campaign.status', 2);	
		$this->db->join('leadmaster', 'leadmaster.cids = campaign.cids');
		
	
	$query = $this->db->get('campaign');
		
	
		// echo $this->db->last_query(); 
		// echo $string;
		// die;
		 return $query->result_array();
	}
	public function get_campaignforCDC()
	{
		
		
			$this->db->select('campaign.cids,campaign.cnid,campaign.campnm');
			$this->db->group_by('campaign.cids');
			$this->db->group_by('campaign.campnm');
			$this->db->group_by('campaign.cnid');
			$this->db->where('leadmaster.sbsvtag !=', 0);

			// $this->db->where('leadmaster.cdcsv !=', 0);
			$this->db->where('leadmaster.cdcsv', null);
			$this->db->where('leadmaster.cdcsb <', '4');
			$this->db->where('leadmaster.cdcrjt <', '4');
			$this->db->where('leadmaster.evload',1);
			// $this->db->where('leadmaster.cdcload',0);
			$this->db->where('leadmaster.cdcload',NULL);
			$this->db->where('leadmaster.qaload',null);
			$this->db->where('leadmaster.qalsload',null);
			$this->db->where('leadmaster.rlc !=', 1);	
			$this->db->where('campaign.status', 2);	
			$this->db->join('leadmaster', 'leadmaster.cids = campaign.cids');
			
		
			$query = $this->db->get('campaign');
			
		
			// echo $this->db->last_query(); 
			// echo $string;
			// die;
			return $query->result_array();
		}
	public function get_campaignforQA()
	{
		
		
			$this->db->select('campaign.cids,campaign.cnid,campaign.campnm');
			$this->db->group_by('campaign.cids');
			$this->db->group_by('campaign.campnm');
			$this->db->group_by('campaign.cnid');
			// $this->db->where('leadmaster.cdcsv !=', 0);
			$this->db->where('leadmaster.cdcsv', NULL);
			$this->db->where('leadmaster.qasv',NULL);
			$this->db->where('leadmaster.sbsvtag !=', 0);
			$this->db->where('leadmaster.cdcsb <', '4');
			$this->db->where('leadmaster.cdcrjt <', '4');
				$this->db->group_start();
				$this->db->where('leadmaster.ddispositionclass', '0');
				$this->db->OR_where('leadmaster.ddispositionclass', NULL);
				$this->db->group_end(); 
			// $this->db->where('leadmaster.ddispositionclass !=', 1);
			// $this->db->where('leadmaster.evload',0);
			$this->db->where('leadmaster.cdcload',1);
			$this->db->where('leadmaster.qaload',null);
			$this->db->where('leadmaster.qalsload',null);
			$this->db->where('leadmaster.rlc !=', 1);	
			$this->db->where('campaign.status', 2);	
			$this->db->join('leadmaster', 'leadmaster.cids = campaign.cids');
			
		
			$query = $this->db->get('campaign');
			
		
			// echo $this->db->last_query(); 
			// echo $string;
			// die;
			return $query->result_array();
		}
	public function get_campaignforlead_generation()
	{
		  
		
			$this->db->select('campaign.cids,campaign.cnid,campaign.campnm');
			$this->db->group_by('campaign.cids');
			$this->db->group_by('campaign.campnm');
			$this->db->group_by('campaign.cnid');
			// $this->db->where('leadmaster.cdcsv !=', 0);
			$this->db->where('leadmaster.cdcsv', NULL);
			$this->db->where('leadmaster.qasv',NULL);
			$this->db->where('leadmaster.sbsvtag !=', 0);
			$this->db->where('leadmaster.cdcsb <', '4');
			$this->db->where('leadmaster.cdcrjt <', '4');
			$this->db->where('leadmaster.dnd !=', '1');
			// $this->db->where('leadmaster.cdclst', 0);
					$this->db->group_start();
					$this->db->where('cdclst', 0);
					$this->db->OR_where('cdclst', NULL);
					$this->db->group_end(); 
			$this->db->where('leadmaster.cvr', 1);
			
			$this->db->where('leadmaster.qalsload', 1);
			$this->db->group_start();
			$this->db->where('leadmaster.lsfinal', '0');
			$this->db->OR_where('leadmaster.lsfinal', NULL);
			$this->db->group_end(); 

			// $this->db->where('leadmaster.lsfinal !=', 1);

			// $this->db->where('leadmaster.evload',0);
			// $this->db->where('leadmaster.cdcload',1);
			// $this->db->where('leadmaster.qaload',null);
			$this->db->where('leadmaster.rlc !=', 1);	
			$this->db->where('campaign.status', 2);	
			$this->db->join('leadmaster', 'leadmaster.cids = campaign.cids');
			
		
			$query = $this->db->get('campaign');
			
		
			// echo $this->db->last_query(); 
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
			// echo $this->db->last_query(); 
			return true;
			
		}
		public function update_complist($new_array,$campaign_id,$cname)
		{
			$this->db->where('companynms', $cname);
			$this->db->where('cid', $campaign_id);
			$this->db->update('complist', $new_array);
			// echo $this->db->last_query();  exit;
			return true;
			
		}
		public function update_domainlist($new_array1,$campaign_id,$cname)
		{
			$this->db->where('domainnms', $cname);
			$this->db->where('cid', $campaign_id);
			$this->db->update('domainlist', $new_array1);
			// echo $this->db->last_query();  exit;
			return true;
			
		}
		public function add_leaddata_candidate($datacdcandlead)
		{
                        
			$this->db->insert('testleadmaster', $datacdcandlead);
			//  $insert_id = $this->db->insert_id();
			// echo $this->db->last_query(); 
			return true;
			
			//  return  $insert_id;
                       
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
		public function update_recordlockonlogin($empcode)
		{
			$this->db->where('agent', $empcode);
			$this->db->where('rlc', 1);
			$this->db->update('leadmaster', array('rlc' => 0));
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
		public function get_manager_by_emp($emp_id)
		{
			$this->db->order_by('id','desc');
			$this->db->where('emp_id', $emp_id);
			$query = $this->db->get('users');
			
			$ret = $query->row();
			// show_error($this->db->last_query(), 200, "SQL");
			return $ret->fname;
		}
		// Added by Amol
		public function get_emp_usertype($id = FALSE)
		{
			$this->db->order_by('id','desc');
			$this->db->where('emp_id', $id);
			$query = $this->db->get('users');
			
			$ret = $query->row();
			// echo $this->db->last_query(); exit;
			return $ret->role;
			// return $ret->team;
		}

		public function get_emp_team($id = FALSE)
		{
			$this->db->order_by('id','desc');
			$this->db->where('emp_id', $id);
			$query = $this->db->get('users');
			
			$ret = $query->row();
			// echo $this->db->last_query(); exit;
			// return $ret->role;
			return $ret->team;
		}
		// Added by Tejaswi
		
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

		//Added by Amol
		public function get_teams(){
			$this->db->order_by("formid", "ASC");
			$query = $this->db->get('privilege');
			return $query->result_array();
		}

		//Added by Tejaswi
		// public function fetch_data($postquery){
			function fetch_data($postquery)
			{
			$this->db->select("*");
			$this->db->from("industry");
			if($postquery != '')
			{
			$this->db->like('industry', $postquery);
			$this->db->or_like('description', $postquery);
			$this->db->or_like('subindustry', $postquery);
			
			}
			$this->db->order_by('industrycd', 'DESC');
			return $this->db->get();
			}
		// }
		
		public function get_user_report($campid,$user_id,$from,$to,$stage)
		{
			$this->db->select('leadmaster.cids,users.fname,users.empcode,users.last_login,campaign.campnm,
			count(leadmaster.stagtidi) as numbers,count(leadmaster.svagtidi) as savednumbers,count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi) as numberveri,
			count(leadmaster.stagtidi) - (count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi)) as pending,
			count(leadmaster.dvagtidi) as accepted ,count(leadmaster.dvragtidi) as rejected');
			$this->db->from('leadmaster');
			$this->db->join('users', 'users.empcode = leadmaster.stagtidi OR users.empcode = leadmaster.stagtidi OR users.empcode = leadmaster.svagtidi','left OR users.emp_id = leadmaster.dvagtidi OR users.empcode = leadmaster.dvagtidi','left');
			$this->db->join('campaign', 'campaign.cids = leadmaster.cids','left');
			if(isset($campid) && $campid != null)
			{
				$this->db->where('leadmaster.cids', $campid);
			}
			// if(isset($stage) && $stage != null)
			// {
			// 	$this->db->where('leadmaster.aa10', $stage);
			// }
			if(isset($stage) && $stage == 'datacollect')
			{
				// $this->db->where('leadmaster.sbsvtag >', 1);
				$this->db->where('leadmaster.stagtidi !=', null);
			
				
			}
			if(isset($stage) && $stage == 'Verified') // data verfied
			{
				$this->db->where('leadmaster.dvagtidi !=', null);
				$this->db->OR_where('leadmaster.dvragtidi !=', null);
			}
			if(isset($stage) && $stage == 'unverified')
			{
				$this->db->where('leadmaster.dvagtidi =', null);
				$this->db->where('leadmaster.dvragtidi =', null);
			}
			if(isset($stage) && $stage == 'Rejection')
			{
				$this->db->where('leadmaster.dvragtidi !=', null);
			}
			if(isset($stage) && $stage == 'Accepted')
			{
				$this->db->where('leadmaster.dvagtidi !=', null);
			}
			if(isset($stage) && $stage == 'pending')
			{
				$this->db->where('leadmaster.dvagtidi =', null);
				$this->db->where('leadmaster.dvragtidi =', null);
			}
			if(isset($user_id) && $user_id != null)
			{
				$this->db->where('users.empcode', $user_id);
			}
			if(isset($from) && isset($to) && $from != '' && $to != '')
			{
				$this->db->where('stdti >=', $from);
				$this->db->where('stdti <=', $to);
			}
			// if(isset($from) && isset($to) && $from != '' && $to != '' && isset($stage) && $stage == 'Verified')
			// {
			// 	$this->db->where('stdti >=', $from);
			// 	$this->db->where('stdti <=', $to);
			// }
			else
			{
				$this->db->group_start();
				$this->db->where("stdti >= now()::date + interval '0h'");
				$this->db->OR_where("svdti>= now()::date + interval '0h'");
				$this->db->group_end();
			}
			$this->db->group_by('leadmaster.cids');
			$this->db->group_by('users.fname');
			$this->db->group_by('users.empcode');
			$this->db->group_by('users.last_login');
			// $this->db->group_by('campaign.cnid');
			// $this->db->group_by('campaign.clientids');
			$this->db->group_by('campaign.cids');
			$this->db->group_by('campaign.campnm');
			$query=$this->db->get();
			// echo $this->db->last_query(); 
			// show_error($this->db->last_query(), 200, "SQL");
			return $data=$query->result_array();

		}	

		public function get_user_report_timelog($campid,$user_id,$from,$to,$stage)
		{
			// $this->db->select('leadmaster.cids,users.fname,users.empcode,users.last_login,campaign.campnm,
			// count(leadmaster.stagtidi) as numbers,count(leadmaster.svagtidi) as savednumbers,count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi) as numberveri,
			// count(leadmaster.stagtidi) - (count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi)) as pending,
			// count(leadmaster.dvagtidi) as accepted ,count(leadmaster.dvragtidi) as rejected');
			// $this->db->from('leadmaster');
			// $this->db->join('users', 'users.empcode = leadmaster.stagtidi OR users.empcode = leadmaster.stagtidi OR users.empcode = leadmaster.svagtidi','left OR users.emp_id = leadmaster.dvagtidi OR users.empcode = leadmaster.dvagtidi','left');
			// $this->db->join('campaign', 'campaign.cids = leadmaster.cids','left');

// 	given by abiel sir	
	// --create extension tablefunc;
// 			select * from crosstab ($$ select agent, stage, count(lmid) from timelog where cids = 1012 group by agent, stage order by agent, stage $$,$$ select distinct(stage) from timelog order by stage $$ )
// as ct (agent text, "dc save" text, "i submit" text, "idv accept" text, "idv reject" text, "ii submit" text, "iidv accept" text, "iidv reject" text)


			// $this->db->select('select users.fname,timelog.agent, count(timelog.agent) as sub1 from timelog join users on users.empcode = timelog.agent where stage="i submit"  ');
			//below by sir
			// $this->db->select('select users.fname,timelog.agent, count(timelog.agent) as sub1 from timelog join users on users.empcode = timelog.agent where stage="i submit"  ');
			$this->db->select('users.fname,users.empcode,campaign.campnm,timelog.cids');
			$this->db->from('timelog');
			$this->db->join('users', 'users.empcode = timelog.agent');
			$this->db->join('campaign', 'campaign.cids = timelog.cids');
			 $this->db->group_by('users.empcode');
			 $this->db->group_by('users.fname');
			 $this->db->group_by('campaign.campnm');
			 $this->db->group_by('timelog.cids');

			if(isset($campid) && $campid != null)
			{
				$this->db->where('timelog.cids', $campid);
			}
			// // if(isset($stage) && $stage != null)
			// // {
			// // 	$this->db->where('leadmaster.aa10', $stage);
			// // }
			// if(isset($stage) && $stage == 'datacollect')
			// {
			// 	// $this->db->where('leadmaster.sbsvtag >', 1);
			// 	$this->db->where('leadmaster.stagtidi !=', null);
			
				
			// }
			// if(isset($stage) && $stage == 'Verified') // data verfied
			// {
			// 	$this->db->where('leadmaster.dvagtidi !=', null);
			// 	$this->db->OR_where('leadmaster.dvragtidi !=', null);
			// }
			// if(isset($stage) && $stage == 'unverified')
			// {
			// 	$this->db->where('leadmaster.dvagtidi =', null);
			// 	$this->db->where('leadmaster.dvragtidi =', null);
			// }
			// if(isset($stage) && $stage == 'Rejection')
			// {
			// 	$this->db->where('leadmaster.dvragtidi !=', null);
			// }
			// if(isset($stage) && $stage == 'Accepted')
			// {
			// 	$this->db->where('leadmaster.dvagtidi !=', null);
			// }
			// if(isset($stage) && $stage == 'pending')
			// {
			// 	$this->db->where('leadmaster.dvagtidi =', null);
			// 	$this->db->where('leadmaster.dvragtidi =', null);
			// }
			// if(isset($user_id) && $user_id != null)
			// {
			// 	$this->db->where('users.empcode', $user_id);
			// }
			if(isset($from) && isset($to) && $from != '' && $to != '')
			{
				$this->db->where('tim >=',$from);
				$this->db->where('tim <=',$to);
			}
			// // if(isset($from) && isset($to) && $from != '' && $to != '' && isset($stage) && $stage == 'Verified')
			// // {
			// // 	$this->db->where('stdti >=', $from);
			// // 	$this->db->where('stdti <=', $to);
			// // }
			else
			{
				
				// $this->db->group_start();
				// $this->db->where("tim >= now()::date + interval '1h'");
				// $this->db->OR_where("tim>= now()::date + interval '1h'");
				// $this->db->group_end();

				
				// $this->db->where('timelog.cids','1001');
				// $this->db->where('tim <=', '2021-03-26 13:36:27');
				
			
			}
			// $this->db->group_by('leadmaster.cids');
			// $this->db->group_by('users.fname');
			// $this->db->group_by('users.empcode');
			// $this->db->group_by('users.last_login');
			// // $this->db->group_by('campaign.cnid');
			// // $this->db->group_by('campaign.clientids');
			// $this->db->group_by('campaign.cids');
			// $this->db->group_by('campaign.campnm');
			$query=$this->db->get();
			// echo $this->db->last_query(); 
			// show_error($this->db->last_query(), 200, "SQL");
			return $data=$query->result_array();

		}	
		public function get_user_reportfordv($campid,$user_id,$from,$to,$stage) //rejection
		{
			$this->db->select('leadmaster.cids,users.fname,users.empcode,users.last_login,campaign.campnm,
			count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi) as number,count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi) as numberveri,
			(count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi)) - (count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi)) as pending,
			count(leadmaster.dvagtidi) as numberdv ,count(leadmaster.dvragtidi) as numberdvrej');
			$this->db->from('leadmaster');
			$this->db->join('users', 'users.empcode = leadmaster.dvragtidi OR users.empcode = leadmaster.dvagtidi','left');
			
			$this->db->join('campaign', 'campaign.cids = leadmaster.cids','left');
			
			// $sql = "select l1.id, l1.reject, l2.accepted, u.fname,u.empcode from
			// (select dvagtidi as id, count(dvagtidi) as reject  from leadmaster where dvagtidi is not null
			// group by dvagtidi ) as l1
			// inner join 
			// (select dvragtidi as ids, count(dvragtidi)as accepted  from leadmaster where dvragtidi is not null
			// group by dvragtidi ) as l2
			
			// on l1.id = l2.ids
			// left join users as u
			// on u.empcode =l2.ids";
			// $query = $this->db->query($sql);
			
			
			
			if(isset($campid) && $campid != null)
			{
				$this->db->where('leadmaster.cids', $campid);
			}
			// if(isset($stage) && $stage != null)
			// {
			// 	$this->db->where('leadmaster.aa10', $stage);
			// }
			if(isset($stage) && $stage == 'datacollect')
			{
				// $this->db->where('leadmaster.sbsvtag >', 1);
				$this->db->where('leadmaster.stagtidi !=', null);
			
			}
			if(isset($stage) && $stage == 'Rejected') // data verfied
			{
				$this->db->where('leadmaster.dvragtidi !=', null);
				// $this->db->OR_where('leadmaster.dvragtidi !=', null);
			}
			
			
			if(isset($user_id) && $user_id != null)
			{
				$this->db->where('users.empcode', $user_id);
				$this->db->where('leadmaster.dvragtidi', $user_id);
				// $this->db->where('users.empcode', $user_id);
				// $this->db->Or_where('leadmaster.dvagtidi =', $user_id);
				
			}
			if(isset($from) && isset($to) && $from != '' && $to != '')
			{
				$this->db->where('leadmaster.dvrdti >=', $from);
				$this->db->where('leadmaster.dvrdti <=', $to);
			
			}
			
			else
			{
				$this->db->where("leadmaster.dvrdti >= now()::date + interval '1h'");
				// $this->db->OR_where("leadmaster.dvdti >= now()::date + interval '1h'");
				// $this->db->where('stdti <=', date('Y-m-d H:i:s'));
			}
			$this->db->group_by('leadmaster.cids');
			$this->db->group_by('users.fname');
			$this->db->group_by('users.empcode');
			$this->db->group_by('users.last_login');
			// $this->db->group_by('campaign.cnid');
			// $this->db->group_by('campaign.clientids');
			$this->db->group_by('campaign.cids');
			$this->db->group_by('campaign.campnm');
			$query=$this->db->get();
			// echo $this->db->last_query(); 
			// show_error($this->db->last_query(), 200, "SQL");
			return $data=$query->result_array();

		}	
		public function get_user_reportfordvverified($campid,$user_id,$from,$to,$stage)
		{
			
			if(isset($from) && isset($to) && $from != '' && $to != ''){
				$this->db->select("lms.id, lms.rejected, lms.accepted, (lms.accepted+lms.rejected) as numbers,(lms.accepted+lms.rejected) as numberveri, (lms.accepted+lms.rejected)-(lms.accepted+lms.rejected) as pending, users.fname, campaign.cids,campaign.campnm from
			(select l1.cids, l1.id, l1.accepted, l2.rejected from
			(select cids, dvagtidi as id, count(dvagtidi) as accepted  from leadmaster where dvagtidi is not null
			AND  dvdti >= '$from' AND dvdti <= '$to'
			group by dvagtidi, cids ) as l1
			inner join 
			(select cids, dvragtidi as ids, count(dvragtidi)as rejected from leadmaster where dvragtidi is not null
			  AND  dvrdti >= '$from' AND dvrdti <= '$to'   group by dvragtidi, cids) as l2
			on l1.id = l2.ids) as lms");
			}else{
				$this->db->select("lms.id, lms.rejected, lms.accepted, (lms.accepted+lms.rejected) as numbers,(lms.accepted+lms.rejected) as numberveri, (lms.accepted+lms.rejected)-(lms.accepted+lms.rejected) as pending, users.fname, campaign.cids,campaign.campnm from
				(select l1.cids, l1.id, l1.accepted, l2.rejected from
				(select cids, dvagtidi as id, count(dvagtidi) as accepted  from leadmaster where dvagtidi is not null
				
				group by dvagtidi, cids ) as l1
				inner join 
				(select cids, dvragtidi as ids, count(dvragtidi)as rejected from leadmaster where dvragtidi is not null
				and dvrdti >= now()::date  group by dvragtidi, cids) as l2
				on l1.id = l2.ids) as lms");
			}
			
		
			$this->db->join('users', 'lms.id = users.empcode');
			
			$this->db->join('campaign', 'lms.cids = campaign.cids');
			
		

			if(isset($user_id) && $user_id != null)
			{
				
				$this->db->where('users.empcode', $user_id);
			}
			
			if(isset($campid) && $campid != null)
			{
				$this->db->where('campaign.cids', $campid);
			}
			
			
			// if(isset($from) && isset($to) && $from != '' && $to != '')
			// {
			// 	$this->db->where('lms.dvrdti >=', $from);
			// 	$this->db->where('lms.dvrdti <=', $to);
			// 	$this->db->where('lms.dvdti >=', $from);
			// 	$this->db->where('lms.dvdti <=', $to);
			
			// }
			
			else
			{
				
				// $this->db->where("lms.rdate >= now()::date + interval '1h'");
				// $this->db->where("lms.adate >= now()::date + interval '1h'");
				
			}
			// $this->db->group_by('users.fname');
			// $this->db->group_by('lms.id');
			// $this->db->group_by('lms.rejected');
			// $this->db->group_by('lms.accepted');
			// $this->db->group_by('campaign.cids');
			// $this->db->group_by('campaign.campnm');
			
			$query=$this->db->get();
			// echo $this->db->last_query(); 
			return $data=$query->result_array();

		}	
		public function get_user_reportfordvaccepted($campid,$user_id,$from,$to,$stage)
		{
			$this->db->select('leadmaster.cids,users.fname,users.empcode,users.last_login,campaign.campnm,
			count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi) as numbers,count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi) as numberveri,
			(count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi)) - (count(leadmaster.dvagtidi)+count(leadmaster.dvragtidi)) as pending,
			count(leadmaster.dvagtidi) as numberdv ,count(leadmaster.dvragtidi) as numberdvrej');
			$this->db->from('leadmaster');
			$this->db->join('users', 'users.empcode = leadmaster.dvragtidi OR users.empcode = leadmaster.dvagtidi','left');
			
			$this->db->join('campaign', 'campaign.cids = leadmaster.cids','left');
			
		
			if(isset($campid) && $campid != null)
			{
				$this->db->where('leadmaster.cids', $campid);
			}
			
			if(isset($stage) && $stage == 'datacollect')
			{
				// $this->db->where('leadmaster.sbsvtag >', 1);
				$this->db->where('leadmaster.stagtidi !=', null);
			
			}
			if(isset($stage) && $stage == 'rejected') // data verfied
			{
				$this->db->where('leadmaster.dvragtidi !=', null);
				// $this->db->OR_where('leadmaster.dvragtidi !=', null);
			}
			if(isset($stage) && $stage == 'accepeted') // data verfied
			{
				$this->db->where('leadmaster.dvagtidi !=', null);
				// $this->db->OR_where('leadmaster.dvragtidi !=', null);
			}
			
			
			if(isset($user_id) && $user_id != null)
			{
				$this->db->where('users.empcode', $user_id);
				$this->db->where('leadmaster.dvagtidi', $user_id);
				// $this->db->where('users.empcode', $user_id);
				// $this->db->Or_where('leadmaster.dvagtidi =', $user_id);
				
			}
			if(isset($from) && isset($to) && $from != '' && $to != '')
			{
				$this->db->where('leadmaster.dvdti >=', $from);
				$this->db->where('leadmaster.dvdti <=', $to);
			
			}
			
			else
			{
				$this->db->where("leadmaster.dvdti >= now()::date + interval '1h'");
				// $this->db->OR_where("leadmaster.dvdti >= now()::date + interval '1h'");
				// $this->db->where('stdti <=', date('Y-m-d H:i:s'));
			}
			$this->db->group_by('leadmaster.cids');
			$this->db->group_by('users.fname');
			$this->db->group_by('users.empcode');
			$this->db->group_by('users.last_login');
			// $this->db->group_by('campaign.cnid');
			// $this->db->group_by('campaign.clientids');
			$this->db->group_by('campaign.cids');
			$this->db->group_by('campaign.campnm');
			$query=$this->db->get();
			// echo $this->db->last_query(); 
			// show_error($this->db->last_query(), 200, "SQL");
			return $data=$query->result_array();

		}	
		public function get_from_email_count($from)
		{
			$this->db->select('*');
			$this->db->from('ev');
			// $this->db->join('leadmaster', 'ev.lmid = leadmaster.lmid','left');
			$this->db->where('ev.fmail',$from);
			$this->db->where("loaddt >= now()::date + interval '1h'");
			$this->db->group_by('ev.fmail');
			$this->db->group_by('ev.elmid');
			$this->db->group_by('ev.lmid');
			$query=$this->db->get();
			// show_error($this->db->last_query(), 200, "SQL");
			return $data=$query->num_rows();
		}
		public function get_email_list($campid,$user_id,$from,$to,$leadstatus,$search_email,$search_email_status,$email_sent_time,$leadlimit)
		{
			
			if(isset($leadstatus) && $leadstatus == "New")
			{
				$this->db->select('leadmaster.cids,leadmaster.lmid,leadmaster.plink,leadmaster.jtitle,leadmaster.empsize,leadmaster.email,leadmaster.city,leadmaster.state,leadmaster.domain,leadmaster.fname,leadmaster.lname,users.emp_id,users.last_login,campaign.campnm,count(leadmaster.stagtidi) as number');
				$this->db->from('leadmaster');
				// $this->db->join('ev', 'ev.lmid = leadmaster.lmid','left');
				$this->db->where('leadmaster.dvload', 1);
				$this->db->where('leadmaster.rlc !=', 1);
				$this->db->where('leadmaster.sbsvtag !=', 0);
				$this->db->where('leadmaster.evcomp', null);
				$this->db->where('leadmaster.lmid NOT IN (select lmid from ev)',NULL,FALSE);
				$this->db->limit($leadlimit);
			}	
			else
			{
				$this->db->select('leadmaster.cids,leadmaster.lmid,leadmaster.plink,leadmaster.jtitle,leadmaster.empsize,leadmaster.email,leadmaster.city,leadmaster.state,leadmaster.domain,leadmaster.fname,leadmaster.lname,users.emp_id,users.last_login,campaign.campnm,count(leadmaster.stagtidi) as number,ev.status as mailstatus,ev.comment as evcomment,ev.loaddt as sent_mail_date,ev.fmail,ev.closer_status,ev.email as evemail');
				$this->db->from('ev');
				$this->db->join('leadmaster', 'ev.lmid = leadmaster.lmid','left');
				$this->db->where('ev.evagnt',$this->session->userdata('empcode'));
			}
			
			// $this->db->join('leadmaster', 'leadmaster.lmid = (select max(lmid) from ev where ev.lmid = leadmaster.lmid)', 'left');
			$this->db->join('users', 'users.empcode = leadmaster.stagtidi','left');
			$this->db->join('campaign', 'campaign.cids = leadmaster.cids','left');
			
			if(isset($campid) && $campid != null)
			{
				$this->db->where('leadmaster.cids', $campid);
			}
			if( ($leadstatus != "New" && $search_email_status == null && $search_email == null && $leadstatus != "Closed"))
			{
				$this->db->where('ev.curr_active', 1);
				// $this->db->where('ev.closer_status !=', "Closed");
			}
			if(isset($leadstatus) && $leadstatus == 'Closed')
			{
				$this->db->where('ev.closer_status', 'Closed');
			}
			if(isset($leadstatus) && $leadstatus == 'Open')
			{
				$this->db->where('ev.closer_status', 'Open');
			}
			if($leadstatus == '' && $leadstatus != "New")
			{
				$this->db->where('ev.closer_status', 'Open');
			}
			if(isset($search_email) && $search_email != null)
			{
				$this->db->where('ev.email', $search_email);
			}
			if(isset($search_email_status) && $search_email_status != null)
			{
				$this->db->where('ev.status', $search_email_status);
			}
			if(isset($email_sent_time) && $email_sent_time != null)
			{
				// Current date and time
				$datetime = date("Y-m-d H:i:s");

				// Convert datetime to Unix timestamp
				$timestamp = strtotime($datetime);

				// Subtract time from datetime
				$time = $timestamp - ($email_sent_time * 60 * 60);

				// Date and time after subtraction
				$datetime = date("Y-m-d H:i:s", $time);

				$this->db->where('ev.loaddt <=', $datetime);
			}
			if(isset($user_id) && $user_id != null)
			{
				$this->db->where('users.emp_id', $user_id);
			}
			if(isset($from) && isset($to) && $from != '' && $to != '')
			{
				$this->db->where('stdti >=', $from);
				$this->db->where('stdti <=', $to);
			}
			// else
			// {
			// 	$this->db->where('stdti >=', date('Y-m-d 00:00:00'));
			// 	$this->db->where('stdti <=', date('Y-m-d H:i:s'));
			// }
			$this->db->group_by('leadmaster.cids');
			$this->db->group_by('leadmaster.lmid');
			$this->db->group_by('leadmaster.fname');
			$this->db->group_by('leadmaster.lname');
			$this->db->group_by('users.emp_id');
			$this->db->group_by('users.last_login');
			$this->db->group_by('leadmaster.domain');
			$this->db->group_by('leadmaster.empsize');
			$this->db->group_by('campaign.cids');
			$this->db->group_by('campaign.campnm');
			$this->db->group_by('leadmaster.city');
			$this->db->group_by('leadmaster.state');
			$this->db->group_by('leadmaster.email');
			$this->db->group_by('leadmaster.plink');
			$this->db->group_by('leadmaster.jtitle');
			if( ($leadstatus != "New"))
			{
				$this->db->group_by('ev.status');
				$this->db->group_by('ev.loaddt');
				$this->db->group_by('ev.comment');
				$this->db->group_by('ev.fmail');
				$this->db->group_by('ev.closer_status');
				$this->db->group_by('ev.email');
				$this->db->group_by('ev.elmid');
				$this->db->order_by('ev.elmid','desc');
			}
			// $this->db->limit(5);
			$query=$this->db->get();
			// show_error($this->db->last_query(), 200, "SQL");
			return $data=$query->result_array();

		}	

		public function send_email_status($datacampaign)
		{
			// $this->db->where('cids', $campaign_id);
			$this->db->insert('ev', $datacampaign);
			// $this->db->last_query(); 
			return true;
			//  $this->db->insert('campaign', $datacampaign);
			//  return true;
                        // echo $this->db->last_query(); 
		}

		public function update_email_status($datacampaign,$email)
		{
			// echo $lmid."<br>";
			// for($i=0;$i<$cnt;$i++)
			// {
				$this->db->where('email', $email);
				$this->db->update('ev', $datacampaign);
			// $this->db->last_query(); 
			// }
			return true;
			//  $this->db->insert('campaign', $datacampaign);
			//  return true;
                        // echo $this->db->last_query(); 
		}

		public function update_email_lead__status($datacampaign,$lmid)
		{
			$this->db->where('lmid', $lmid);
			$this->db->update('leadmaster', $datacampaign);
			return true;
		}

		// get campaign list for campaign list - Added by Amol
		public function get_campaign_list($campaigns = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($campaigns === FALSE){
				$this->db->order_by('campaign.cids', 'DESC');
				$this->db->join('clientscd', 'clientscd.clientid = campaign.clientids');
				// $query = $this->db->where('campaign.status', 2);
				$query = $this->db->get('campaign');
				// echo $this->db->last_query(); 
				return $query->result_array(); 
			}

			// $query = $this->db->where('campaign.status', 2);
			$query = $this->db->get('campaign');
			
			return $query->row_array();
		}

		function get_lmid_duplication_count($leadid)
		{
			$this->db->select('lmid');
			$this->db->where('lmid', $leadid);
			$result = $this->db->get('ev');
			// echo $this->db->last_query(); 
			if ($result->num_rows() >= 12) {
               return true;        
			}else{
				return false;
			}
		}

		public function get_email_duplication_count($FinalEmail,$agent_id)
		{
			$email = strtolower($FinalEmail);
			$this->db->select('lmid');
			$this->db->where('email', $email);
			$this->db->where('evagnt', $agent_id);
			$result = $this->db->get('ev');
			// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return true;        
			}else{
				return false;
			}
		}

		public function get_email_duplication_count_leadmaster($email)
		{
			$this->db->select('lmid');
			$this->db->where('email', $email);			
			$result = $this->db->get('leadmaster');
			// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return true;        
			}else{
				return false;
			}
		}
		public function get_email_duplication_count_leadmaster_update($email,$lmid)
		{
			$this->db->select('lmid');
			$this->db->where('email', $email);
			$this->db->where('lmid !=', $lmid);
			$result = $this->db->get('leadmaster');
			// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return true;        
			}else{
				return false;
			}
		}
		public function get_plink_duplication_count_leadmaster($plink)
		{
			$this->db->select('lmid');
			$this->db->where('plink', $plink);
			$result = $this->db->get('leadmaster');
			// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return true;        
			}else{
				return false;
			}
		}
		public function get_plink_duplication_count_leadmaster_update($plink,$lmid)
		{
			$this->db->select('lmid');
			$this->db->where('plink', $plink);
			$this->db->where('lmid !=', $lmid);
			$result = $this->db->get('leadmaster');
			// echo $this->db->last_query(); 
			if ($result->num_rows() >= 1) {
               return true;        
			}else{
				return false;
			}
		}
		public function get_email_id($campid,$user_id){
			$this->db->select('fmail');
			$this->db->where('evagnt', $user_id);
			$this->db->group_by('ev.fmail');
			$query = $this->db->get('ev');                       
			return $query->result_array();
		}

		public function get_user_report_dc($campid,$user_id,$from,$to,$stage)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('users.cid_type', 'ME');
			$this->db->where('users.status', 0);
			
			if(isset($user_id) && $user_id != null)
			{
				$this->db->where('users.empcode', $user_id);
			}
			
			else
			{
				// $this->db->group_start();
				// $this->db->where("stdti >= now()::date + interval '0h'");
				// // $this->db->OR_where("svdti>= now()::date + interval '0h'");
				// $this->db->group_end();
			}
			// $this->db->group_by('leadmaster.cids');
			$this->db->group_by('users.fname');
			$this->db->group_by('users.empcode');
			$this->db->group_by('users.last_login');
			// $this->db->group_by('leadmaster.lmid');
			$this->db->group_by('users.id');
			
			// $this->db->group_by('campaign.cids');
			// $this->db->group_by('campaign.campnm');
			$query=$this->db->get();
			// echo $this->db->last_query(); 
			// show_error($this->db->last_query(), 200, "SQL");
			return $data=$query->result_array();

		}	

		public function get_delivery_leads($username = FALSE, $limit = FALSE, $offset = FALSE,$campid,$delivery_status,$qa_status,$ls_status)
		{
			
			if(isset($campid) && $campid != '' && $delivery_status != '' && $qa_status != ''  && $ls_status != '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.dytg = $delivery_status and leadmaster.qastat = '$qa_status' and leadmaster.clscored  = $ls_status";
			}
			else if(isset($campid) && $campid != '' && $delivery_status != '' && $qa_status != '' && $qa_status == 'qualified' && $ls_status != '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.dytg = $delivery_status and leadmaster.qastat = '$qa_status' and leadmaster.qaload = 1 and leadmaster.clscored  = $ls_status";
			}
			else if(isset($campid) && $campid != '' && $delivery_status != '' && $qa_status != '' && $qa_status == 'disqualified'  && $ls_status != '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.dytg = $delivery_status and leadmaster.qastat = '$qa_status' and leadmaster.clscored  = $ls_status";
			}
			else if($campid != '' && $delivery_status != '' && $delivery_status == '0' && $qa_status == '' && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid and  leadmaster.dytg is null  and leadmaster.qaload = 1";
			}
			else if($campid != '' && $delivery_status != '' && $delivery_status == '1' && $qa_status == '' && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid and  leadmaster.dytg = 1  and leadmaster.qaload = 1";
			}
			else if(isset($campid) && $campid != '' && $delivery_status == '0' && $qa_status != '' && $qa_status == 'qualified'  && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.qastat = '$qa_status'  and leadmaster.qaload = 1 and qaacpt = 1 and leadmaster.dytg is null";
			}
			else if(isset($campid) && $campid != '' && $delivery_status == '0' && $qa_status != '' && $qa_status == 'disqualified'  && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.qastat = '$qa_status' and (leadmaster.qaload = 0 OR leadmaster.qaload is null) and qaacpt = 1 and leadmaster.dytg is null";
			}
			else if(isset($campid) && $campid != '' && $delivery_status == '1' && $qa_status != '' && $qa_status == 'qualified'  && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.qastat = '$qa_status'  and leadmaster.qaload = 1 and qaacpt = 1 and leadmaster.dytg = 1";
			}
			else if(isset($campid) && $campid != '' && $delivery_status == '1' && $qa_status != '' && $qa_status == 'disqualified'  && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.qastat = '$qa_status' and (leadmaster.qaload = 0 OR leadmaster.qaload is null) and qaacpt = 1 and leadmaster.dytg = 1 ";
			}
			else if(isset($campid) && $campid != '' && $delivery_status == '' && $qa_status != '' && $qa_status == 'qualified'  && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.qastat = '$qa_status'  and leadmaster.qaload = 1 and qaacpt = 1";
			}
			else if(isset($campid) && $campid != '' && $delivery_status == '' && $qa_status != '' && $qa_status == 'disqualified'  && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.qastat = '$qa_status' and (leadmaster.qaload = 0 OR leadmaster.qaload is null) and qaacpt = 1 ";
			}
			else if(isset($campid) && $campid != '' && $delivery_status == '' && $qa_status == ''  && $ls_status != '')
			{
				$cond = "and leadmaster.cids = $campid and leadmaster.clscored = $ls_status";
			}
			else if(isset($campid) && $campid != '' && $delivery_status == '' && $qa_status == ''  && $ls_status == '')
			{
				$cond = "and leadmaster.cids = $campid  and leadmaster.qaload = 1 and (leadmaster.dytg = 0 OR leadmaster.dytg is null)";
			}
			else if($campid == '' && $delivery_status != '')
			{
				$cond = "and leadmaster.dytg = $delivery_status";
			}
			else
			{
				$cond = "and leadmaster.qaload = 1";
			}
			// echo $cond;
			$sql = " SELECT leadmaster.lmid,
			leadmaster.cids,
			leadmaster.sal,
			leadmaster.fname,
			leadmaster.dytg,
			leadmaster.lname,
			leadmaster.jtitle,
			joblevels.joblevel,
			joblevels.joblist,
			dept.department,
			leadmaster.cname,
			comptype.ctypname,
			industry.industry,
			industry.subindustry,
			leadmaster.sectyp,
				CASE
					WHEN (leadmaster.sectyp = 0) THEN 'Unknown'::text
					WHEN (leadmaster.sectyp = 1) THEN 'Public'::text
					WHEN (leadmaster.sectyp = 2) THEN 'Private'::text
					WHEN (leadmaster.sectyp = 3) THEN 'Government'::text
					WHEN (leadmaster.sectyp = 4) THEN 'Non - Profit'::text
					ELSE NULL::text
				END AS sector,
			leadmaster.empsize,
			leadmaster.arevenue,
			leadmaster.mlbl,
				CASE
					WHEN (leadmaster.mlbl = 0) THEN 'Thousands'::text
					WHEN (leadmaster.mlbl = 1) THEN 'Millions'::text
					WHEN (leadmaster.mlbl = 2) THEN 'Billions'::text
					WHEN (leadmaster.mlbl = 3) THEN 'Trillions'::text
					ELSE NULL::text
				END AS denomination,
			leadmaster.email,
			leadmaster.phone,
			leadmaster.linetype,
				CASE
					WHEN (leadmaster.linetype = 1) THEN 'Unknown'::text
					WHEN (leadmaster.linetype = 2) THEN 'Direct'::text
					WHEN (leadmaster.linetype = 3) THEN 'Board'::text
					ELSE NULL::text
				END AS linetypes,
			leadmaster.phext,
			leadmaster.altphn,
			leadmaster.address,
			leadmaster.city,
			leadmaster.state,
			leadmaster.zipcode,
			country.countryname,
			country.currnme,
			timezone.abbrev,
			leadmaster.domain,
			leadmaster.plink,
			leadmaster.empszlink,
			leadmaster.indlink,
			leadmaster.revszlink,
			leadmaster.othrlink,
			leadmaster.aum
		   FROM ((((((leadmaster
			 LEFT JOIN country ON ((leadmaster.country = country.countrycd)))
			 LEFT JOIN timezone ON ((leadmaster.timez = timezone.zids)))
			 LEFT JOIN industry ON ((leadmaster.sindtry = industry.subindustrycd)))
			 LEFT JOIN joblevels ON ((leadmaster.jlevel = joblevels.jid)))
			 LEFT JOIN dept ON ((leadmaster.dname = dept.dcd)))
			 LEFT JOIN comptype ON ((leadmaster.ctyp = comptype.ctypid)))
			
			where leadmaster.cdcsb <=4 and
			 leadmaster.cdcrjt <=4
			 $cond 
		  ORDER BY leadmaster.lmid limit 20;";
		  $query = $this->db->query($sql);
		//   return $query->result_array();
		return $query;
		}

		public function check_cdc_tag_cdcsb($leadid)
		{
			$this->db->select('cdcsb');
			$this->db->from('leadmaster');
			$this->db->where('lmid',$leadid);
			$row = $this->db->get()->row();
			if (isset($row)) {
				return $row->cdcsb;
			} else {
				return false;
			}
		}

		public function  check_cdc_tag_cdcrjt($leadid)
		{
			$this->db->select('cdcsb');
			$this->db->from('leadmaster');
			$this->db->where('lmid',$leadid);
			$row = $this->db->get()->row();
			if (isset($row)) {
				return $row->cdcsb;
			} else {
				return false;
			}
		}

		public function get_delivery_leads_export($username = FALSE, $limit = FALSE, $offset = FALSE,$campid,$delivery_status,$qa_status,$ls_status,$ids)
		{
			
			$ids= implode(",", $ids);
			if(isset($campid) && $delivery_status != '' && $qa_status != '' && $ls_status != '')
			{
				$cond = "where leadmaster.cids = '$campid' and leadmaster.dytg = $delivery_status and leadmaster.qastat = '$qa_status' and leadmaster.clscored  = $ls_status";
			}
			else if(isset($campid) && $delivery_status != '' && $qa_status == '' && $ls_status == '')
			{
				$cond = "where leadmaster.cids = '$campid' and leadmaster.dytg = $delivery_status";
			}
			else if(isset($campid) && $delivery_status == '' && $qa_status != ''  && $ls_status == '')
			{
				$cond = "where leadmaster.cids = '$campid' and leadmaster.qastat = '$qa_status'";
			}
			else if(isset($campid) && $delivery_status == '' && $qa_status == ''  && $ls_status != '')
			{
				$cond = "where leadmaster.cids = '$campid' and leadmaster.clscored = $ls_status";
			}
			else if(isset($campid) && $delivery_status == '' && $qa_status == ''  && $ls_status == '')
			{
				$cond = "where leadmaster.cids = '$campid'";
			}
			else if(!isset($campid) && $delivery_status != '')
			{
				$cond = "where leadmaster.dytg = $delivery_status";
			}
			else
			{
				$cond = null;
			}
			// echo $cond;
			$sql = " SELECT leadmaster.lmid,
			leadmaster.cids,
			leadmaster.sal,
			leadmaster.fname,
			leadmaster.lname,
			leadmaster.jtitle,
			joblevels.joblevel,
			joblevels.joblist,
			dept.department,
			leadmaster.cname,
			comptype.ctypname,
			industry.industry,
			industry.subindustry,
			leadmaster.sectyp,
				CASE
					WHEN (leadmaster.sectyp = 0) THEN 'Unknown'::text
					WHEN (leadmaster.sectyp = 1) THEN 'Public'::text
					WHEN (leadmaster.sectyp = 2) THEN 'Private'::text
					WHEN (leadmaster.sectyp = 3) THEN 'Government'::text
					WHEN (leadmaster.sectyp = 4) THEN 'Non - Profit'::text
					ELSE NULL::text
				END AS sector,
			leadmaster.empsize,
			leadmaster.arevenue,
			leadmaster.mlbl,
				CASE
					WHEN (leadmaster.mlbl = 0) THEN 'Thousands'::text
					WHEN (leadmaster.mlbl = 1) THEN 'Millions'::text
					WHEN (leadmaster.mlbl = 2) THEN 'Billions'::text
					WHEN (leadmaster.mlbl = 3) THEN 'Trillions'::text
					ELSE NULL::text
				END AS denomination,
			leadmaster.email,
			leadmaster.phone,
			leadmaster.linetype,
				CASE
					WHEN (leadmaster.linetype = 1) THEN 'Unknown'::text
					WHEN (leadmaster.linetype = 2) THEN 'Direct'::text
					WHEN (leadmaster.linetype = 3) THEN 'Board'::text
					ELSE NULL::text
				END AS linetypes,
			leadmaster.phext,
			leadmaster.altphn,
			leadmaster.address,
			leadmaster.city,
			leadmaster.state,
			leadmaster.zipcode,
			country.countryname,
			country.currnme,
			timezone.abbrev,
			leadmaster.domain,
			leadmaster.plink,
			leadmaster.empszlink,
			leadmaster.indlink,
			leadmaster.revszlink,
			leadmaster.othrlink,
			leadmaster.aum
		   FROM ((((((leadmaster
			 LEFT JOIN country ON ((leadmaster.country = country.countrycd)))
			 LEFT JOIN timezone ON ((leadmaster.timez = timezone.zids)))
			 LEFT JOIN industry ON ((leadmaster.sindtry = industry.subindustrycd)))
			 LEFT JOIN joblevels ON ((leadmaster.jlevel = joblevels.jid)))
			 LEFT JOIN dept ON ((leadmaster.dname = dept.dcd)))
			 LEFT JOIN comptype ON ((leadmaster.ctyp = comptype.ctypid)))
			-- $cond 
			WHERE leadmaster.lmid IN ($ids)
			--  where leadmaster.qaload = 1 and leadmaster.cdcsb <=4 and
			--  leadmaster.cdcrjt <=4
		  ORDER BY leadmaster.lmid limit 20;";
		  $query = $this->db->query($sql);
		  return $query->result_array();
		// return $query;
		}
		// get_campaign_report function Added by Amol 
		public function get_campaign_report($campaigns = FALSE, $limit = FALSE, $offset = FALSE, $camp_status,$campaign_id)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}
			if($camp_status != '')
			{
				$query = $this->db->where('campaign.status', $camp_status);
			}
			else
			{
				$query = $this->db->where('campaign.status', 2);
			}
			$this->db->where_in('cids',$campaign_id);
			if($campaigns === FALSE){
				$this->db->order_by('campaign.cids', 'DESC');
				$this->db->join('clientscd', 'clientscd.clientid = campaign.clientids');
				
				$query = $this->db->get('campaign');
				// echo $this->db->last_query(); 
				return $query->result_array(); 
			}

			// $query = $this->db->where('campaign.status', 2);
			$query = $this->db->get('campaign');
			
			return $query->row_array();
		}
		public function update_otp_in_users($update_otp,$empcode)
		{
				$this->db->where('empcode', $empcode);
				$this->db->update('users', $update_otp);
			return true;
		}

		public function get_otp_from_users($empcode)
		{
			
			$this->db->select('otp,otp_time');
			// $this->db->from('users');
			$this->db->where('empcode',$empcode);
			return $this->db->get('users');
		}

		public function get_user_report_ev($campid,$user_id,$from,$to,$stage)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('users.cid_type', 'ME');
			$this->db->where('users.status', 0);
			
			if(isset($user_id) && $user_id != null)
			{
				$this->db->where('users.empcode', $user_id);
			}
			
			else
			{
				// $this->db->group_start();
				// $this->db->where("stdti >= now()::date + interval '0h'");
				// // $this->db->OR_where("svdti>= now()::date + interval '0h'");
				// $this->db->group_end();
			}
			// $this->db->group_by('leadmaster.cids');
			$this->db->group_by('users.fname');
			$this->db->group_by('users.empcode');
			$this->db->group_by('users.last_login');
			// $this->db->group_by('leadmaster.lmid');
			$this->db->group_by('users.id');
			
			// $this->db->group_by('campaign.cids');
			// $this->db->group_by('campaign.campnm');
			$query=$this->db->get();
			// echo $this->db->last_query(); 
			// show_error($this->db->last_query(), 200, "SQL");
			return $data=$query->result_array();

		}	

		// public function get_available_leads($username = FALSE, $limit = FALSE, $offset = FALSE,$dcd,$ctype,$levelid,$sector_id)
		// {
		// 	$deptStr = '';
		// 	if(isset($dcd) && $dcd != 0) {
		// 	$deptStr = implode(',',$dcd);
		// 	}
			
		// 	$levelid1 = '';
		// 	if(isset($levelid) && $levelid != 0) {
		// 	$levelid1 = implode(',',$levelid);

		// 	}
		// 	$company_type = '';
		// 	if(isset($ctype) && $ctype != 0) {
		// 	$company_type = implode(',',$ctype);
		// 	}
			
		// 	$sector_id_industry = '';
		// 	if(isset($sector_id) && $sector_id != 0) {
		// 	$sector_id_industry = implode(',',$sector_id);

		// 	}
		// 	if($deptStr != '' &&  $levelid1 != '' && $company_type != '' && $sector_id_industry!= '' ) {
		// 	$cond = "where dname = $deptStr AND jlevel = $levelid1 AND sectyp = $sector_id_industry AND ctyp = $company_type";
		// 	}
		// 	elseif($deptStr != '' &&  $levelid1 != '' && $company_type != '' && $sector_id_industry == '' ) {
		// 	$cond = "where dname = $deptStr AND jlevel = $levelid1 AND ctyp = $company_type";
		// 	}
		// 	elseif($deptStr != '' &&  $levelid1 != '' && $company_type == '' && $sector_id_industry != '' ) {
		// 	$cond = "where dname = $deptStr AND jlevel = $levelid1 AND sectyp = $sector_id_industry";
		// 	}
		// 	elseif($deptStr != '' &&  $levelid1 != '' && $company_type == '' && $sector_id_industry == '' ) {
		// 	$cond = "where dname = $deptStr AND jlevel = $levelid1 ";
		// 	}
		// 	elseif($deptStr == '' &&  $levelid1 == '' && $company_type != '' && $sector_id_industry != '' ) {
		// 	$cond = "where ctyp = $company_type AND sectyp = $sector_id_industry ";
		// 	}
		// 	elseif($deptStr == '' &&  $levelid1 != '' && $company_type != '' && $sector_id_industry == '' ) {
		// 	$cond = "where jlevel = $levelid1 AND ctyp = $company_type ";
		// 	}
		// 	elseif($deptStr != '' &&  $levelid1 == '' && $company_type != '' && $sector_id_industry == '' ) {
		// 	$cond = "where dname = $deptStr AND ctyp = $company_type ";
		// 	}
		// 	elseif($deptStr == '' &&  $levelid1 != '' && $company_type == '' && $sector_id_industry != '' ) {
		// 	$cond = "where jlevel = $levelid1 AND sectyp = $sector_id_industry ";
		// 	}
		// 	elseif($deptStr != '' &&  $levelid1 == '' && $company_type == '' && $sector_id_industry == ''){
		// 		$cond = "where dname = $deptStr";
		// 	}
		// 	elseif($deptStr == '' &&  $levelid1 != '' && $company_type == '' && $sector_id_industry == ''){
		// 		$cond = "where jlevel = $levelid1";
		// 	}
		// 	elseif($deptStr == '' &&  $levelid1 == '' && $company_type != '' && $sector_id_industry == ''){
		// 		$cond = "where ctyp = $company_type";
		// 	}
		// 	elseif($deptStr == '' &&  $levelid1 == '' && $company_type == '' && $sector_id_industry != ''){
		// 		$cond = "where sectyp = $sector_id_industry";
		// 	}
		// 	else
		// 	{
		// 		$cond = null;
		// 	}
			
		// 	// echo $cond; die;
		// 	$sql = " SELECT leadmaster.lmid,
		// 	leadmaster.cids,
		// 	leadmaster.sal,
		// 	leadmaster.fname,
		// 	leadmaster.dytg,
		// 	leadmaster.lname,
		// 	leadmaster.jtitle,
		// 	joblevels.joblevel,
		// 	joblevels.joblist,
		// 	dept.department,
		// 	leadmaster.cname,
		// 	comptype.ctypname,
		// 	industry.industry,
		// 	industry.subindustry,
		// 	leadmaster.sectyp,
		// 		CASE
		// 			WHEN (leadmaster.sectyp = 0) THEN 'Unknown'::text
		// 			WHEN (leadmaster.sectyp = 1) THEN 'Public'::text
		// 			WHEN (leadmaster.sectyp = 2) THEN 'Private'::text
		// 			WHEN (leadmaster.sectyp = 3) THEN 'Government'::text
		// 			WHEN (leadmaster.sectyp = 4) THEN 'Non - Profit'::text
		// 			ELSE NULL::text
		// 		END AS sector,
		// 	leadmaster.empsize,
		// 	leadmaster.arevenue,
		// 	leadmaster.mlbl,
		// 		CASE
		// 			WHEN (leadmaster.mlbl = 0) THEN 'Thousands'::text
		// 			WHEN (leadmaster.mlbl = 1) THEN 'Millions'::text
		// 			WHEN (leadmaster.mlbl = 2) THEN 'Billions'::text
		// 			WHEN (leadmaster.mlbl = 3) THEN 'Trillions'::text
		// 			ELSE NULL::text
		// 		END AS denomination,
		// 	leadmaster.email,
		// 	leadmaster.phone,
		// 	leadmaster.linetype,
		// 		CASE
		// 			WHEN (leadmaster.linetype = 1) THEN 'Unknown'::text
		// 			WHEN (leadmaster.linetype = 2) THEN 'Direct'::text
		// 			WHEN (leadmaster.linetype = 3) THEN 'Board'::text
		// 			ELSE NULL::text
		// 		END AS linetypes,
		// 	leadmaster.phext,
		// 	leadmaster.altphn,
		// 	leadmaster.address,
		// 	leadmaster.city,
		// 	leadmaster.state,
		// 	leadmaster.zipcode,
		// 	country.countryname,
		// 	country.currnme,
		// 	timezone.abbrev,
		// 	leadmaster.domain,
		// 	leadmaster.plink,
		// 	leadmaster.empszlink,
		// 	leadmaster.indlink,
		// 	leadmaster.revszlink,
		// 	leadmaster.othrlink,
		// 	leadmaster.aum
		//    FROM ((((((leadmaster
		// 	 LEFT JOIN country ON ((leadmaster.country = country.countrycd)))
		// 	 LEFT JOIN timezone ON ((leadmaster.timez = timezone.zids)))
		// 	 LEFT JOIN industry ON ((leadmaster.sindtry = industry.subindustrycd)))
		// 	 LEFT JOIN joblevels ON ((leadmaster.jlevel = joblevels.jid)))
		// 	 LEFT JOIN dept ON ((leadmaster.dname = dept.dcd)))
		// 	 LEFT JOIN comptype ON ((leadmaster.ctyp = comptype.ctypid)))
			
		// 	 $cond limit 10
		//    ;";
		//   $query = $this->db->query($sql);
		// //   return $query->result_array();
		// return $query;
		// }

		public function get_all_record_leadmasterby_dc($rec_stage,$period,$dcd=null,$levelid=null,$ctype,$sector_id=null,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
		{
			$this->db->select("count(*) as total,lmid");

			if($rec_stage == "Fresh")
			{
				$this->db->like('CAST(leadmaster.cids AS VARCHAR(100))', '999', 'after');
				// $this->db->where('CAST(cids AS VARCHAR(100)) LIKE "'999%'"');
				// $this->db->where('leadmaster.cids', '9999');
				
			}
			else{
				$this->db->join('campaign', 'leadmaster.cids = campaign.cids');
				$this->db->where('campaign.status !=', '2');
			}

			if(isset($period)) {
				$dt = new DateTime();
				$dt->modify('-'.$period. 'month');
				$date = $dt->format('Y-m-d');
				//$this->db->where('dydti >= "2013-08-01"');
				$this->db->group_start();
					$this->db->where('stdti <= ',$date);
					$this->db->OR_where('stdtii <= ',$date);
				$this->db->group_end(); 
				
			}
	
			if(isset($dcd) && $dcd[0] != 0)
				$this->db->where_in('dname',$dcd);

			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);


			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);

			if(isset($desid) && $desid[0] != 0)
				$this->db->where_in('jlevel',$desid);

		

			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}

		$this->db->where('sbsvtag <', 6);
	
		$this->db->where('sbsvtag !=', 0);
		
		$this->db->where('qaacpt', NULL);
		$this->db->where('cdcsv', NULL);
		$this->db->where('qasv',NULL);

			$this->db->group_start();
			$this->db->where('dvrejtg < 3 AND dvsbtg < 3');
			$this->db->OR_where('qarej', 1);
			$this->db->OR_where('cdcrjt <', '4');
			$this->db->group_end(); 
		
		$this->db->where('ontag', 0);
		$this->db->where('pload', 1);
		$this->db->where('dvload',0);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		$this->db->order_by('stdti','ASC');
		$this->db->order_by('stdtii','ASC');
		
		$this->db->group_by('lmid');
		$query = $this->db->get('leadmaster');
		// echo $this->db->last_query(); 
		// echo $string;
		// die;
		return $query;
		// return $query->num_rows(); 
	}
// Added by Amol
	public function get_all_record_leadmasterby_dv($rec_stage,$period,$dcd,$levelid,$ctype,$sector_id,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
	{
		
		$this->db->select("count(*) as total,lmid");

		if($rec_stage == "Fresh")
		{
			// $this->db->where('leadmaster.cids', '9999');
			$this->db->like('CAST(leadmaster.cids AS VARCHAR(100))', '999', 'after');
		}
		else{
			$this->db->join('campaign', 'leadmaster.cids = campaign.cids');
			$this->db->where('campaign.status !=', '2');
		}
		
		if(isset($period)) {
			$dt = new DateTime();
			$dt->modify('-'.$period. 'month');
			$date = $dt->format('Y-m-d');
			// $this->db->where('qaacptdti <= ',$date);
			
			$this->db->group_start();
				$this->db->where('dvdti <= ',$date);
				$this->db->OR_where('dvdtii <= ',$date);
			$this->db->group_end(); 
			
		}

		if(isset($dcd) && $dcd[0] != 0)
			$this->db->where_in('dname',$dcd);

		
			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

		

			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);
			
			if(isset($desid) && $desid[0] != 0)
				$this->db->where_in('jlevel',$desid);


			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}
		
		$this->db->where('sbsvtag <', 6);
		$this->db->where('sbsvtag !=', 0);
		$this->db->where('qaacpt', NULL);
		$this->db->where('cdcsv', NULL);
		$this->db->where('qasv',NULL);
	
		$this->db->where('dvload',1);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		// $this->db->order_by('stdti','ASC');
		// $this->db->order_by('stdtii','ASC');
		// $this->db->limit(1);
		$this->db->group_by('lmid');
		$query = $this->db->get('leadmaster');
		// echo $this->db->last_query(); 
		
		return $query;
		
	}

	// Added by Amol
	public function get_all_record_leadmasterby_CDC($rec_stage,$period,$dcd=null,$levelid=null,$ctype,$sector_id=null,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
	{
	
		$this->db->select("count(*) as total,lmid");
		if($rec_stage == "Fresh")
		{
			// $this->db->where('leadmaster.cids', '9999');
			$this->db->like('CAST(leadmaster.cids AS VARCHAR(100))', '999', 'after');
		}
		else{
			$this->db->join('campaign', 'leadmaster.cids = campaign.cids');
			$this->db->where('campaign.status !=', '2');
		}

		if(isset($period)) {
			$dt = new DateTime();
			$dt->modify('-'.$period. 'month');
			$date = $dt->format('Y-m-d');
			
			
			$this->db->group_start();
				$this->db->where('evdti <= ',$date);
				$this->db->OR_where('evdtii <= ',$date);
			$this->db->group_end(); 
			
		}
		if(isset($dcd) && $dcd[0] != 0)
			$this->db->where_in('dname',$dcd);

			
			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

		

			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);

			if(isset($desid) && $desid[0] != 0)
				$this->db->where_in('jlevel',$desid);

			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}
	
		$this->db->where('sbsvtag <', 6);
		$this->db->where('sbsvtag !=', 0);	
	    $this->db->where('cdcsv', NULL);
		$this->db->where('qasv',NULL);
		$this->db->where('evload',1);
		// $this->db->where('cdcload',0);
		$this->db->where('cdcload',NULL);

		$this->db->where('qaload',null);
	
		$this->db->group_by('lmid');
		$query = $this->db->get('leadmaster');
		// echo $this->db->last_query(); 
		// echo $string;
		// die;
		return $query;
		// return $query->num_rows();
		// return $query->result_array();
	}
	
	// Added by Amol 
	public function get_all_record_leadmasterby_campaignQA($rec_stage,$period,$dcd,$levelid,$ctype,$sector_id,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
	{
		$this->db->select("count(*) as total,lmid");
		if($rec_stage == "Fresh")
		{
			// $this->db->where('leadmaster.cids', '9999');
			$this->db->like('CAST(leadmaster.cids AS VARCHAR(100))', '999', 'after');
		}
		else{
			$this->db->join('campaign', 'leadmaster.cids = campaign.cids');
			$this->db->where('campaign.status !=', '2');
		}

		if(isset($period)) {
			$dt = new DateTime();
			$dt->modify('-'.$period. 'month');
			$date = $dt->format('Y-m-d');
			// $this->db->where('qaacptdti <= ',$date);
			
			$this->db->group_start();
				$this->db->where('cdcsbdti <= ',$date);
				$this->db->OR_where('cdcsbdtii <= ',$date);
			$this->db->group_end(); 
			
		}
		if(isset($dcd) && $dcd[0] != 0)
			$this->db->where_in('dname',$dcd);

			

			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

		

			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);

			if(isset($desid) && $desid[0] != 0)
				$this->db->where_in('jlevel',$desid);
			
			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}
	$this->db->where('sbsvtag <', 6);
	$this->db->where('sbsvtag !=', 0);
	$this->db->where('cdcsv', NULL);
	$this->db->where('qasv',NULL);

	$this->db->where('cdcload',1);
	$this->db->where('qaload',null);
	$this->db->group_by('lmid');
	
	$query = $this->db->get('leadmaster');
	// echo $this->db->last_query(); 
	// echo $string;
	// die;
	return $query;
	
	}
// Added by Amol 
public function get_all_record_leadmasterby_QAdone($rec_stage,$period,$dcd,$levelid,$ctype,$sector_id,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
{
	$this->db->select("count(*) as total,lmid");
	if($rec_stage == "Fresh")
		{
			// $this->db->where('leadmaster.cids', '9999');
			$this->db->like('CAST(leadmaster.cids AS VARCHAR(100))', '999', 'after');
		}
		else{
			$this->db->join('campaign', 'leadmaster.cids = campaign.cids');
			$this->db->where('campaign.status !=', '2');
		}

		if(isset($period)) {
			$dt = new DateTime();
			$dt->modify('-'.$period. 'month');
			$date = $dt->format('Y-m-d');
			// $this->db->where('qaacptdti <= ',$date);
			
			$this->db->group_start();
				$this->db->where('qaacptdti <= ',$date);
				$this->db->OR_where('qaacptdtii <= ',$date);
			$this->db->group_end(); 
			
		}

	if(isset($dcd) && $dcd[0] != 0)
		$this->db->where_in('dname',$dcd);

		
			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

			

			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);

			if(isset($desid) && $desid[0] != 0)
				$this->db->where_in('jlevel',$desid);
			

			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}
	
			$this->db->where('sbsvtag <', 6);
		    $this->db->where('sbsvtag !=', 0);
			$this->db->where('cdcsv', NULL);
			$this->db->where('qasv',NULL);

			$this->db->where('qaacpt', 1);
			// $this->db->where('sbsvtag !=', 0);
			$this->db->where('qastat','qualified'); 
			// $this->db->where('cdcload',1);
			$this->db->where('qaload',1);
			// $this->db->where('qalsload',null);
			// $this->db->where('rlc !=', 1);
			$this->db->group_start();
			$this->db->where('dytg', '0');
			$this->db->OR_where('dytg', NULL);
			$this->db->group_end(); 
			$this->db->group_by('lmid');	
			// $this->db->order_by('cdcsbdti','ASC');
			// $this->db->order_by('cdcsbdtii','ASC');
			// $this->db->limit(1);
			$query = $this->db->get('leadmaster');
			// echo $this->db->last_query(); 
			// echo $string;
			// die;
			return $query;
			// return $query->num_rows();
				// return $query->result_array();
}

public function get_all_record_leadmasterby_Delivered($rec_stage,$period,$dcd,$levelid,$ctype,$sector_id,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
{
			$this->db->select("count(*) as total,lmid");
			if($rec_stage == "Fresh")
			{
				// $this->db->where('leadmaster.cids', '9999');
				$this->db->like('CAST(leadmaster.cids AS VARCHAR(100))', '999', 'after');
			}
			else{
				$this->db->join('campaign', 'leadmaster.cids = campaign.cids');
				$this->db->where('campaign.status !=', '2');
			}

			if(isset($period)) {
				$dt = new DateTime();
				$dt->modify('-'.$period. 'month');
				$date = $dt->format('Y-m-d');
				$this->db->where('dydti <= ',$date);
				
				
			}
			if(isset($dcd) && $dcd[0] != 0)
				$this->db->where_in('dname',$dcd);

			

			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

		

			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);
			
			if(isset($desid) && $desid[0] != 0)
				$this->db->where_in('jlevel',$desid);

			

			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}
	$this->db->where('dytg', '1');
	$this->db->group_by('lmid');
	$query = $this->db->get('leadmaster');
	// echo $this->db->last_query();  die;
	// return $query->num_rows();
	return $query;
	}

	public function get_all_record_leadmasterby_dcPending($rec_stage,$period,$dcd,$levelid,$ctype,$sector_id,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
	{
		
		$this->db->select("count(*) as total,lmid");
		
		if($rec_stage == "Fresh")
		{
			// $this->db->where('leadmaster.cids', '9999');
			$this->db->like('CAST(leadmaster.cids AS VARCHAR(100))', '999', 'after');
		}
		else{
			$this->db->join('campaign', 'leadmaster.cids = campaign.cids');
			$this->db->where('campaign.status !=', '2');
		}
		if(isset($period)) {
			$dt = new DateTime();
			$dt->modify('-'.$period. 'month');
			$date = $dt->format('Y-m-d');
			//$this->db->where('dydti >= "2013-08-01"');
			$this->db->group_start();
				$this->db->where('stdti <= ',$date);
				$this->db->OR_where('stdtii <= ',$date);
			$this->db->group_end(); 
			
		}
		


		if(isset($dcd) && $dcd[0] != 0)
			$this->db->where_in('dname',$dcd);

		
			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

			

			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);

			if(isset($desid) && $desid[0] != 0)
				$this->db->where_in('jlevel',$desid);


			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}

		$this->db->where('sbsvtag <', 6);
	
		$this->db->where('sbsvtag !=', 0);
		$this->db->where('cdcsv', NULL);
		$this->db->where('qasv',NULL);
	
		$this->db->where('qaacpt', NULL);

		$this->db->group_start();
		$this->db->where('dvrejtg < 3 AND dvsbtg < 3');
		$this->db->OR_where('dvrejtg is NULL AND dvsbtg is NULL');
		$this->db->OR_where('qarej', 1);
		$this->db->OR_where('cdcrjt <', '4');//if dvrej is 3, then check cdcrjt
		$this->db->group_end(); 

		$this->db->where('ontag', 1);
		$this->db->where('pload', 0);
		$this->db->where('dvload',0);
		$this->db->where('evload',null);
		$this->db->where('cdcload',null);
		$this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
		
	

			$this->db->order_by('dvrdti','ASC');
			$this->db->order_by('dvrdtii','ASC');
			$this->db->group_by('lmid');
		
		// $this->db->limit(1);
		$query = $this->db->get('leadmaster');
		// echo $this->db->last_query();  
		// echo $string;
		// die;
		return $query;
		// return $query->num_rows();
	} 
	public function get_all_record_leadmaster_fresh($rec_stage,$dcd,$levelid,$ctype,$sector_id,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
	{
		
		$this->db->select("count(*) as total,lmid");
		
		if($rec_stage == "Fresh")
		{
			// $this->db->where('leadmaster.cids', '9999');
			$this->db->like('CAST(leadmaster.cids AS VARCHAR(100))', '999', 'after');
		}
		else{
			$this->db->join('campaign', 'leadmaster.cids = campaign.cids');
			$this->db->where('campaign.status !=', '2');
		}
		if(isset($dcd) && $dcd[0] != 0)
			$this->db->where_in('dname',$dcd);

			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

		
			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);

			if(isset($desid) && $desid[0] != 0)
				$this->db->where_in('jlevel',$desid);

		

			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}

			$this->db->group_by('lmid');
		$query = $this->db->get('leadmaster');
		// echo $this->db->last_query();  
		// echo $string;
		// die;
		return $query;
		// return $query->num_rows();
	} 
	public function get_all_unused_record($dcd,$levelid,$ctype,$sector_id,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound)
	{
		$this->db->select("count(*) as total,lmid");
		if(isset($dcd) && $dcd[0] != 0)
			$this->db->where_in('dname',$dcd);

			// if(isset($levelid) && $levelid != '')
			// 	$this->db->where_in('jlevel',$levelid);

			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

		

			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);

			if(isset($levelid) && $levelid[0] != 0)
				$this->db->where_in('jlevel',$levelid);

			

			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}
			$this->db->where('cids', '9999');
			$this->db->group_by('lmid');
			$query = $this->db->get('leadmaster');
			// echo $this->db->last_query();  die;
			// return $query->num_rows();
			return $query;
		
	}
	public function get_all_used_record_with_cond($dcd,$levelid,$ctype,$sector_id,$region_id,$sub_region_id,$country_id,$subindustrycd,$desid,$revnlbound,$revnlbound_range,$revnubound,$revnubound_range,$emplbound,$empubound,$period)
	{
		$this->db->select("count(*) as total,lmid");
		if(isset($dcd) && $dcd[0] != 0)
			$this->db->where_in('dname',$dcd);

			// if(isset($levelid) && $levelid != '')
			// 	$this->db->where_in('jlevel',$levelid);

			if(isset($sector_id) && $sector_id[0] != 0)
				$this->db->where_in('indtry',$sector_id);

			// if(isset($region_id) && $region_id != '')
			// 	$this->db->where_in('dname',$region_id);

			// if(isset($sub_region_id) && $sub_region_id != '')
			// 	$this->db->where_in('jlevel',$sub_region_id);

			if(isset($country_id) && $country_id[0] != 0)
				$this->db->where_in('country',$country_id);

			if(isset($subindustrycd) && $subindustrycd[0] != 0)
				$this->db->where_in('sindtry',$subindustrycd);

			if(isset($levelid) && $levelid[0] != 0)
				$this->db->where_in('jlevel',$levelid);

				
			// if(isset($revnlbound) && $revnlbound != '')
			// 	$this->db->where_in('arevenue',$revnlbound);

			// if(isset($revnlbound_range) && $revnlbound_range != '')
			// 	$this->db->where_in('arevenue',$revnlbound_range);

			// if(isset($revnubound) && $revnubound != '')
			// 	$this->db->where_in('arevenue',$revnubound);

			// if(isset($revnubound_range) && $revnubound_range != '')
			// 	$this->db->where_in('arevenue',$revnubound_range);

			if(isset($emplbound) && $emplbound[0] != 0 && isset($empubound) && $empubound[0] != 0)
			{
				$this->db->where('empsize >=', $emplbound);
				$this->db->where('empsize <=', $empubound);
			}
			$dt = new DateTime();
			// $dt->modify('-'.$period. 'month');
			// $date = $dt->format('Y-m-d');
			// //$this->db->where('dydti >= "2013-08-01"');
			// $this->db->where('qaacptdti <= ',$date);
			//  //$this->db->where('dytg', '1');
			
			$this->db->where('qaacpt', 1);
			// $this->db->where('sbsvtag !=', 0);
			$this->db->where('qastat','qualified'); 
			// $this->db->where('cdcload',1);
			$this->db->where('qaload',1);
			// $this->db->where('qalsload',null);
			// $this->db->where('rlc !=', 1);
			$this->db->group_start();
			$this->db->where('dytg', '0');
			$this->db->OR_where('dytg', NULL);
			$this->db->group_end(); 
			$this->db->group_by('lmid');
			$query = $this->db->get('leadmaster');
			// echo $this->db->last_query();  die;
			// return $query->num_rows();
			return $query;
		
	}

	public function assign_leads_to_campaign($datacampaign,$lmid)
	{
		$this->db->where('lmid', $lmid);
		$this->db->update('leadmaster', $datacampaign);
		return true;
	}
	public function get_campgroup($lmid){
		$this->db->where('lmid', $lmid);
		$query = $this->db->get('leadmaster');
		// echo $this->db->last_query();  
		return $query->result_array();
	}
	public function get_total_email_count($empcode)
	{
		$this->db->select('*');
		$this->db->from('ev');
		// $this->db->join('leadmaster', 'ev.lmid = leadmaster.lmid','left');
		$this->db->where('ev.evagnt',$empcode);
		$this->db->where("loaddt >= now()::date + interval '1h'");
		$this->db->group_by('ev.fmail');
		$this->db->group_by('ev.elmid');
		$this->db->group_by('ev.lmid');
		$query=$this->db->get();
		// show_error($this->db->last_query(), 200, "SQL");
		return $data=$query->num_rows();
	}
	function save_candidate($Fname,$email,$phone,$address,$education,$gender,$register_date,$testtime)
	{
		$query="INSERT INTO candidate( fullname, email, phone,address,education,curr_date,gender,testtime) 
			VALUES ('$Fname','$email','$phone','$address','$education','$register_date','$gender','$testtime')";
			$this->db->query($query);

			$insert_id = $this->db->insert_id();
			//  return true;
			// echo $this->db->last_query(); 
			// echo  $insert_id; 
			 return  $insert_id;
	}

	public function get_dv_cleared_for_candidate_test($id = FALSE)
	{
		
		$this->db->where('sbsvtag !=', 0);
		
	
		// $this->db->where('ontag', 1);
		// $this->db->where('pload', 0);
		$this->db->where('dvload',1);
		// $this->db->where('evload',null);
		// $this->db->where('cdcload',null);
		// $this->db->where('qaload',null);
		$this->db->where('rlc !=', 1);
	
		
			$this->db->order_by('random()');
			
		
		$this->db->limit(1);
		// $query = $this->db->get_where('leadmaster', array('cids' => $id));
		$query = $this->db->get('leadmaster');
		// echo $this->db->last_query();  
		// echo $string;
		// die;
		return $query->result_array();
	}

	public function get_candidatelist($userstatus,$cid_type,$roles)
		{
			
			// $emp_id = $this->session->userdata('emp_id');
			// $manager = $this->get_manager_by_emp($emp_id);
			// $this->db->join('roles', 'roles.rid = users.role');

			// if(isset($userstatus) && $userstatus == "deactivated")
			// {
			// 	$this->db->where('users.status',1);
			// }
			
			$this->db->order_by('candidate.candidate_id', 'DESC');
			$query = $this->db->get('candidate');
			
			// echo $this->db->last_query(); 
			return $query->result_array();
		}

		public function get_lead_record($candidate_id)
		{
			
			// echo $cond;
			$sql = " SELECT testleadmaster.lmid,
			testleadmaster.cids,
			testleadmaster.sal,
			testleadmaster.fname,
			testleadmaster.dname,
			testleadmaster.lname,
			testleadmaster.jtitle,
			joblevels.joblevel,
			joblevels.joblist,
			dept.department,
			testleadmaster.cname,
			testleadmaster.indtry,
			testleadmaster.sindtry,
			comptype.ctypname,
			industry.industry,
			industry.subindustry,
			testleadmaster.sectyp,
				CASE
					WHEN (testleadmaster.sectyp = 0) THEN 'Unknown'::text
					WHEN (testleadmaster.sectyp = 1) THEN 'Public'::text
					WHEN (testleadmaster.sectyp = 2) THEN 'Private'::text
					WHEN (testleadmaster.sectyp = 3) THEN 'Government'::text
					WHEN (testleadmaster.sectyp = 4) THEN 'Non - Profit'::text
					ELSE NULL::text
				END AS sector,
			testleadmaster.empsize,
			testleadmaster.arevenue,
			testleadmaster.mlbl,
				CASE
					WHEN (testleadmaster.mlbl = 0) THEN 'Thousands'::text
					WHEN (testleadmaster.mlbl = 1) THEN 'Millions'::text
					WHEN (testleadmaster.mlbl = 2) THEN 'Billions'::text
					WHEN (testleadmaster.mlbl = 3) THEN 'Trillions'::text
					ELSE NULL::text
				END AS denomination,
			testleadmaster.email,
			testleadmaster.phone,
			testleadmaster.timez,
			testleadmaster.phext,
			testleadmaster.altphn,
			testleadmaster.address,
			testleadmaster.city,
			testleadmaster.country,
			testleadmaster.state,
			testleadmaster.zipcode,
			country.countryname,
			country.currnme,
			country.currab,
			timezone.abbrev,
			testleadmaster.curr,
			testleadmaster.domain,
			testleadmaster.plink,
			testleadmaster.empszlink,
			testleadmaster.indlink,
			testleadmaster.revszlink,
			testleadmaster.othrlink,
			testleadmaster.ctyp,
			timezone.zonename
			-- leadmaster.aum
		   FROM ((((((testleadmaster 
			 LEFT JOIN country ON ((testleadmaster.country = country.countrycd)))
			 LEFT JOIN timezone ON ((testleadmaster.timez = timezone.zids)))
			 LEFT JOIN industry ON ((testleadmaster.sindtry = industry.subindustrycd)))
			 LEFT JOIN joblevels ON ((testleadmaster.jlevel = joblevels.jid)))
			 LEFT JOIN dept ON ((testleadmaster.dname = dept.dcd)))
			 LEFT JOIN comptype ON ((testleadmaster.ctyp = comptype.ctypid)))
			
			where 
			 stagtidi = $candidate_id
		  ORDER BY testleadmaster.lmid limit 20;";
		  $query = $this->db->query($sql);
		//   return $query->result_array();
		return $query;

		}	

		public function candidateLogin($email,$phone)
		{
			//Validate
			$this->db->where('phone', $phone);
			$this->db->where('email', $email);
			$this->db->limit(1);
			$result = $this->db->get('candidate');
			// show_error($this->db->last_query(), 200, "SQL");
			if ($result->num_rows() == 1) 
			{
				return $result->row(0);

			             
			}else{
				return false;
			}
		}
}