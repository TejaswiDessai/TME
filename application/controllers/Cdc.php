<?php
	class Cdc extends CI_Controller
	{
		


		function addlead($page = 'add-lead'){
			// print_r($_SESSION['timeout']);
			
			$data['title'] = 'Create Lead';
			// print_r($_SESSION);
			// print_r($_SESSION['timeout']);
			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
			}
		

						
						// print_r($postData1);

						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						// echo $camp['cnid'];
						$camp_id = $camp['cnid'];
						// print_r($data['campaigns']);  
						

						$data['countries'] = $this->Administrator_Model->get_countriesbyCampaign($camp_id);
				
							foreach($data['countries'] as $co){
							$myArray = implode(',', $co);
							}

							$myArray1 = explode(',', $myArray);
							$data['countriesofcampaign'] = $this->Administrator_Model->get_countriesofCampaign($camp_id,$myArray1);
							// print_r($data['countriesofcampaign']);

						// $data['countries'] = $this->Administrator_Model->get_countries();
						$data['industries1'] = $this->Administrator_Model->get_industries_byCampaign($camp_id);
						foreach($data['industries1'] as $ind){
							$myind = implode(',', $ind);
							}
							$myind1 = explode(',', $myind);
						$data['industries'] = $this->Administrator_Model->get_industries_ofCampaign($camp_id,$myind1);

						$data['industriessub'] = $this->Administrator_Model->get_subindustries_byCampaign($camp_id,$myind1);

						$data['departments1'] = $this->Administrator_Model->get_departmentsbyCampaign($camp_id);
						foreach($data['departments1'] as $dp){
							$mydpArray = implode(',', $dp);
							}
							$mydpArray1 = explode(',', $mydpArray);
							$data['departments'] = $this->Administrator_Model->get_depts_byCampaign($camp_id,$mydpArray1);
                        // $data['departments'] = $this->Administrator_Model->get_depts_byCampaign($mydpArray1);
                       
						$data['designation1'] = $this->Administrator_Model->get_designation_byCampaign($camp_id);
						foreach($data['designation1'] as $ds){
							$mydesi = implode(',', $ds);
							}
							$mydesiarry = explode(',', $mydesi);
						$data['designation'] = $this->Administrator_Model->get_designation_ofCampaign($camp_id,$mydesiarry);

						$data['joblevel'] = $this->Administrator_Model->get_joblevels_byCampaign($camp_id,$mydesiarry);
					
					
						$data['timezones'] = $this->Administrator_Model->get_timezonesbyCampaign($camp_id,$myArray1);

						$data['currency'] = $this->Administrator_Model->get_currencybyCampaign($camp_id,$myArray1);
						// print_r($data['timezones']);
						$data['comptype'] = $this->Administrator_Model->get_comptype();
						
						$data['assetitle'] = $this->Administrator_Model->get_assetitle_byCampaign($camp_id);

						// $data['dataforcdqa'] = $this->Administrator_Model->get_dataforCDQA_byCampaign($camp_id);
			// print_r($data['dataforcdqa']);
						


			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function addleaddata($page = 'add-leaddata'){
			
			$data['title'] = 'Create Lead';
			// print_r($_SESSION);
			// print_r($_SESSION['empcode']);
			$empcode = $_SESSION['empcode'];
			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
			}
		// print_r($postData1);

						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						// echo $camp['cnid'];
						$camp_id = $camp['cnid'];
						// if(isset($_SESSION['lmid']) && $_SESSION['lmid'] == $camp['cids']){
						// 	session_abort();
							// print_r($_SESSION);
						// }else {
						// 	$_SESSION['lmid'] = $camp['cids'];
						// }
						// $_SESSION['lmid'] = $camp['cids'];
						$cids = $camp['cids'];
						// print_r($data['campaigns']);  
						// print_r($cids);  
						
						// $data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaignid($cids);
						


						
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaignidwithempcode($cids,$empcode);
						// print_r($data['leadmaster']); 
						// foreach ($data['leadmaster'] as $ldmster) {
						
						// }
						if($data['leadmaster'] == Null){
							$data['leadmaster'] = [1];
						}
						$data['countries'] = $this->Administrator_Model->get_countriesbyCampaign($camp_id);
				
							foreach($data['countries'] as $co){
							$myArray = implode(',', $co);
							}

							$myArray1 = explode(',', $myArray);
							$data['countriesofcampaign'] = $this->Administrator_Model->get_countriesofCampaign($camp_id,$myArray1);
							// print_r($data['countriesofcampaign']);

						// $data['countries'] = $this->Administrator_Model->get_countries();
						$data['domain'] = $this->Administrator_Model->get_domain_byCampaign($camp_id);
						$data['comp_list'] = $this->Administrator_Model->get_complist_byCampaign($camp_id);
						$data['incemail'] = $this->Administrator_Model->get_incemail_byCampaign($camp_id);
						// print_r($data['incemail']); 
						// exit();

						$data['industries1'] = $this->Administrator_Model->get_industries_byCampaign($camp_id);

						foreach($data['industries1'] as $ind){
							$myind = implode(',', $ind);
							}
							$myind1 = explode(',', $myind);
						$data['industries'] = $this->Administrator_Model->get_industries_ofCampaign($camp_id,$myind1);

						$data['industriessub'] = $this->Administrator_Model->get_subindustries_byCampaign($camp_id,$myind1);
// print_r($data['industriessub']); 
						$data['departments1'] = $this->Administrator_Model->get_departmentsbyCampaign($camp_id);
						foreach($data['departments1'] as $dp){
							$mydpArray = implode(',', $dp);
							}
							$mydpArray1 = explode(',', $mydpArray);
							$data['departments'] = $this->Administrator_Model->get_depts_byCampaign($camp_id,$mydpArray1);
                        // $data['departments'] = $this->Administrator_Model->get_depts_byCampaign($mydpArray1);
                       
						$data['designation1'] = $this->Administrator_Model->get_designation_byCampaign($camp_id);
						foreach($data['designation1'] as $ds){
							$mydesi = implode(',', $ds);
							}
							$mydesiarry = explode(',', $mydesi);
						$data['designation'] = $this->Administrator_Model->get_designation_ofCampaign($camp_id,$mydesiarry);
						// print_r($data['designation']); 
						// print_r($mydesiarry); 
						$data['joblevel'] = $this->Administrator_Model->get_joblevels_byCampaign($camp_id,$mydesiarry);
					
					// print_r($data['joblevel']); 
						$data['timezones'] = $this->Administrator_Model->get_timezonesbyCampaign($camp_id,$myArray1);
						
						$data['currency'] = $this->Administrator_Model->get_currencybyCampaign($camp_id,$myArray1);
						// print_r($data['timezones']);
						$data['comptype'] = $this->Administrator_Model->get_comptype();
						
						$data['assetitle'] = $this->Administrator_Model->get_assetitle_byCampaign($camp_id);

					

						// $data['dataforcdqa'] = $this->Administrator_Model->get_dataforCDQA_byCampaign($camp_id);
			// print_r($data['dataforcdqa']);
						


			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function dataverfication($page = 'data-verification'){
			
			$data['title'] = 'Create Lead';
			// print_r($_SESSION);
			// print_r($_SESSION['timeout']);
			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
			}
		// print_r($postData1);

						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						// echo $camp['cnid'];
						$camp_id = $camp['cnid'];
						
						$cids = $camp['cids'];
					
						
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaigniddv($cids);
						// print_r($data['leadmaster']); 
						if(empty($data['leadmaster'])){
							$this->session->set_flashdata('success', 'Data verification id finished for this campaign.');
							redirect('cdc/selectCampaignforDataVerification');
							
						}

						foreach ($data['leadmaster'] as $ldmster) {
						
						}
					
						if (isset($data['leadmaster'])){
							$data['countriesdv'] = $this->Administrator_Model->get_countriesbyCampaigndv($ldmster['lmid']);
							$data['industriesdv'] = $this->Administrator_Model->get_industries_ofleadmaster($ldmster['lmid']);
							$data['subindustriesdv'] = $this->Administrator_Model->get_subindustries_ofleadmaster($ldmster['lmid']);
							$data['currencydv'] = $this->Administrator_Model->get_currency_ofleadmaster($ldmster['lmid']);
							$data['timezonedv'] = $this->Administrator_Model->get_timezone_ofleadmaster($ldmster['lmid']);
							$data['designationdv'] = $this->Administrator_Model->get_designation_ofleadmaster($ldmster['lmid']);
							$data['departmentsdv'] = $this->Administrator_Model->get_depts_byleadmaster($ldmster['lmid']);
							$data['assetitledv'] = $this->Administrator_Model->get_assetitle_byleadmaster($ldmster['lmid']);
							$data['comptypedv'] = $this->Administrator_Model->get_comptype_byleadmaster($ldmster['lmid']);
						}else if(empty($data['leadmaster'])){
							// $this->session->set_flashdata('success', 'Data verification id finished.');
							redirect('administrator/dashboard');
						}

						


			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		// function cdcform($page = 'cdc-form'){
		function cdcform(){
			
			$data['title'] = 'Create Lead';
			// print_r($_SESSION);
			// print_r($_SESSION['timeout']);



			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
				// $postData2 = $postData['campaign_idcids'];
			}

		
			// if(isset($_GET['lmid'])){
			// 	$postDatalmid = $_GET['lmid']; 
			// }

			$postDatalmid = NULL;
						if(isset($_GET['lmid']))
							$postDatalmid = $_GET['lmid'];
		

						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						// echo $camp['cnid'];
						$camp_id = NULL;
						if(isset($camp['cnid']))
							$camp_id = $camp['cnid'];

						$camp_id2 = NULL;
						if(isset($camp['camp_id']))
						  	$camp_id2 = $camp['camp_id'];

						$cids = NULL;
						if(isset($camp['cids']))
							$cids = $camp['cids'];
						
						$_SESSION['campaign_id'] = $camp_id;
						
			// $data['cids_camp'] = $camp_id;
			// $data['campaign_id'] = $camp_id;
						
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaign_CDC($cids,$postDatalmid,$camp_id2);
						// print_r($data['leadmaster']); 
						if(empty($data['leadmaster'])){
							$this->session->set_flashdata('success', 'Data verification id finished for this campaign.');
							// redirect('cdc/selectCampaignforDataVerification');
							
						}
						// print_r($postDatalmid);
						foreach ($data['leadmaster'] as $ldmster) {
						
						}
						$lmid = $ldmster['lmid'];
						
						$_SESSION['lmid'] = $lmid;


						$data['countries'] = $this->Administrator_Model->get_countriesbyCampaign($camp_id);
				
							foreach($data['countries'] as $co){
							$myArray = implode(',', $co);
							}

							$myArray1 = explode(',', $myArray);
							$data['countriesofcampaign'] = $this->Administrator_Model->get_countriesofCampaign($camp_id,$myArray1);
							// print_r($data['countriesofcampaign']);
							$data['industries1'] = $this->Administrator_Model->get_industries_byCampaign($camp_id);
							foreach($data['industries1'] as $ind){
								$myind = implode(',', $ind);
								}
								$myind1 = explode(',', $myind);
							$data['industries'] = $this->Administrator_Model->get_industries_ofCampaign($camp_id,$myind1);
	
							$data['industriessub'] = $this->Administrator_Model->get_subindustries_byCampaign($camp_id,$myind1);
	// print_r($data['industriessub']); 
							$data['departments1'] = $this->Administrator_Model->get_departmentsbyCampaign($camp_id);
							foreach($data['departments1'] as $dp){
								$mydpArray = implode(',', $dp);
								}
								$mydpArray1 = explode(',', $mydpArray);
								$data['departments'] = $this->Administrator_Model->get_depts_byCampaign($camp_id,$mydpArray1);
							// $data['departments'] = $this->Administrator_Model->get_depts_byCampaign($mydpArray1);
						   
							$data['designation1'] = $this->Administrator_Model->get_designation_byCampaign($camp_id);
							foreach($data['designation1'] as $ds){
								$mydesi = implode(',', $ds);
								}
								$mydesiarry = explode(',', $mydesi);
							$data['designation'] = $this->Administrator_Model->get_designation_ofCampaign($camp_id,$mydesiarry);
							// print_r($data['designation']); 
							// print_r($mydesiarry); 
							$data['joblevel'] = $this->Administrator_Model->get_joblevels_byCampaign($camp_id,$mydesiarry);
						
						// print_r($data['joblevel']); 
							$data['timezones'] = $this->Administrator_Model->get_timezonesbyCampaign($camp_id,$myArray1);
							
							$data['currency'] = $this->Administrator_Model->get_currencybyCampaign($camp_id,$myArray1);
							// print_r($data['timezones']);
							$data['comptype'] = $this->Administrator_Model->get_comptype();
							
							$data['assetitle'] = $this->Administrator_Model->get_assetitle_byCampaign($camp_id);
							// print_r($data['assetitle']);

						if (isset($data['leadmaster'])){
							$data['countriesdv'] = $this->Administrator_Model->get_countriesbyCampaigndv($ldmster['lmid']);
							$data['industriesdv'] = $this->Administrator_Model->get_industries_ofleadmaster($ldmster['lmid']);
							$data['subindustriesdv'] = $this->Administrator_Model->get_subindustries_ofleadmaster($ldmster['lmid']);
							$data['currencydv'] = $this->Administrator_Model->get_currency_ofleadmaster($ldmster['lmid']);
							$data['timezonedv'] = $this->Administrator_Model->get_timezone_ofleadmaster($ldmster['lmid']);
							$data['designationdv'] = $this->Administrator_Model->get_designation_ofleadmaster($ldmster['lmid']);
							$data['departmentsdv'] = $this->Administrator_Model->get_depts_byleadmaster($ldmster['lmid']);
							$data['assetitledv'] = $this->Administrator_Model->get_assetitle_byleadmaster($ldmster['lmid']);
							$data['comptypedv'] = $this->Administrator_Model->get_comptype_byleadmaster($ldmster['lmid']);
						}else if(empty($data['leadmaster'])){
							// $this->session->set_flashdata('success', 'Data verification id finished.');
							redirect('administrator/dashboard');
						}

						


			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			if(isset($_GET['rec_type_id']) && $_GET['rec_type_id']== 2 ){
				$rectype = $_GET['rec_type_id'];
			}else{
				$rectype=0;	
			}
			// print_R($rectype);
			if($rectype == 2){
				// print_r($data['leadmaster']); 
				$this->load->view('administrator/add-leaddata-cdc', $data);
				// $this->load->view('administrator/cdc-form', $data);
			}else{
				// print_r($data['leadmaster']);
				$this->load->view('administrator/cdc-form', $data);
				
			}
			//  $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		// function cdcform($page = 'cdc-form'){
		function qualityform($page = 'qa-form'){
			
			$data['title'] = 'Create Lead';
			// print_r($_SESSION);
			// print_r($_SESSION['timeout']);
			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
			}
		// print_r($postData1);

						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						// echo $camp['cnid'];
						$camp_id = $camp['cnid'];
						
						$cids = $camp['cids'];
					
						
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaignQA($cids);
						// print_r($data['leadmaster']); 
						if(empty($data['leadmaster'])){
							$this->session->set_flashdata('success', 'Data verification id finished for this campaign.');
							redirect('cdc/selectCampaignforDataVerification');
							
						}

						foreach ($data['leadmaster'] as $ldmster) {
						
						}
					
						if (isset($data['leadmaster'])){
							$data['countriesdv'] = $this->Administrator_Model->get_countriesbyCampaigndv($ldmster['lmid']);
							$data['industriesdv'] = $this->Administrator_Model->get_industries_ofleadmaster($ldmster['lmid']);
							$data['subindustriesdv'] = $this->Administrator_Model->get_subindustries_ofleadmaster($ldmster['lmid']);
							$data['currencydv'] = $this->Administrator_Model->get_currency_ofleadmaster($ldmster['lmid']);
							$data['timezonedv'] = $this->Administrator_Model->get_timezone_ofleadmaster($ldmster['lmid']);
							$data['designationdv'] = $this->Administrator_Model->get_designation_ofleadmaster($ldmster['lmid']);
							$data['departmentsdv'] = $this->Administrator_Model->get_depts_byleadmaster($ldmster['lmid']);
							$data['assetitledv'] = $this->Administrator_Model->get_assetitle_byleadmaster($ldmster['lmid']);
							$data['comptypedv'] = $this->Administrator_Model->get_comptype_byleadmaster($ldmster['lmid']);
						}else if(empty($data['leadmaster'])){
							// $this->session->set_flashdata('success', 'Data verification id finished.');
							redirect('administrator/dashboard');
						}

						


			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function selectCampaign($page = 'select-campaign'){
			$data['title'] = 'Create Lead';
			$data['campaigns'] = $this->Administrator_Model->get_campaign();
                        // $data['clients'] = $this->Administrator_Model->get_clients();
                        // $data['countries'] = $this->Administrator_Model->get_countries();
                        // $data['regions'] = $this->Administrator_Model->get_regions();
                        // $data['industries'] = $this->Administrator_Model->get_industries();
                        // $data['departments'] = $this->Administrator_Model->get_depts();
                        // $data['empsize'] = $this->Administrator_Model->get_empsize();
                        // $data['revsize'] = $this->Administrator_Model->get_revenuesize();
						// $data['designation'] = $this->Administrator_Model->get_designation();
						// $data['timezones'] = $this->Administrator_Model->get_timezones();
						// $data['lbound'] = $this->Administrator_Model->get_empsize();
						// $data['ubound'] = $this->Administrator_Model->get_empsize();

						// $data['revnlbound'] = $this->Administrator_Model->get_revenuesize();
						// $data['revnubound'] = $this->Administrator_Model->get_revenuesize();
						// $data['assetitle'] = $this->Administrator_Model->get_assetitle();
			
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function selectCampaignforlead($page = 'select-campaign-lead'){
			$data['title'] = 'Create Lead';
			$data['campaigns'] = $this->Administrator_Model->get_campaign();
                      
			
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function selectCampaignforDataVerification($page = 'select-campaign-dataverification'){
			$data['title'] = 'Create Lead';
			$data['campaigns'] = $this->Administrator_Model->get_campaign_fordataverification();
                      
			
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}

		function selectCampaignForCDC($page = 'select-campaign-cdc'){
			$data['title'] = 'Create Lead';
			// $data['campaigns'] = $this->Administrator_Model->get_campaign_fordataverification();
			$data['campaigns'] = $this->Administrator_Model->get_campaignforCDC();		  
			
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function selectCampaignForQA($page = 'select-campaign-QA'){
			$data['title'] = 'Create Lead';
			// $data['campaigns'] = $this->Administrator_Model->get_campaign_fordataverification();
			$data['campaigns'] = $this->Administrator_Model->get_campaignforQA();		  
			
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		public function getJobTitle(){ 
		
			$levelid = $_GET['jlevel'];
			// $desiStr = implode(',',$levelid);
			// get data 
			$data = $this->Administrator_Model->getJobTitle($levelid);
			echo json_encode($data); 
		}
		
		public function getsearcresultofindustry(){ 
			
			// $postquery = $_POST['query'];
			
			// // get data 
			// $data = $this->Administrator_Model->getsearchresult($postquery);
			// return $data;
			// echo json_encode($data); 



			$output = '';
			$query = '';
			// $this->load->model('ajaxsearch_model');
			if($this->input->post('query'))
			{
			 $query = $this->input->post('query');
			}
			$data = $this->Administrator_Model->fetch_data($query);
			$output .= '
			<div class="table-responsive">
			   <table class="table table-bordered table-striped">
				<tr>
				 <th>Industry</th>
				 <th>Sub Industry</th>
				 <th>Description</th>
				 
				</tr>
			';
			if($data->num_rows() > 0)
			{
			 foreach($data->result() as $row)
			 {
			  $output .= '
				<tr>
				 <td>'.$row->industry.'</td>
				 <td>'.$row->subindustry.'</td>
				 <td>'.$row->description.'</td>
				
				</tr>
			  ';
			 }
			}
			else
			{
			 $output .= '<tr>
				 <td colspan="5">No Data Found</td>
				</tr>';
			}
			$output .= '</table>';
			echo $output;
		




		}

		function fetch($page = 'fetch'){
			// $data['title'] = 'Create Lead';
			// $data['campaigns'] = $this->Administrator_Model->get_campaign();
                      
			
			
			// $this->load->view('administrator/header-script');
			// $this->load->view('administrator/header');
			// $this->load->view('administrator/header-bottom');
			//  $this->load->view('administrator/'.$page, $data);
			// $this->load->view('administrator/footer');
		
		}
		public function gettimezones(){ 
			
			$country_id = $_GET['country_id'];
			
			// get data 
			$data = $this->Administrator_Model->gettimezonesbycountry($country_id);
			echo json_encode($data); 
		}
		public function gettcurrency(){ 
			
			$country_id = $_GET['country_id'];
			
			// get data 
			$data = $this->Administrator_Model->getcurrencybycountry($country_id);
			echo json_encode($data); 
		}
		public function getIndustry(){ 
		
			$industrycd = $_GET['industrycd'];
			
			// get data 
			$data = $this->Administrator_Model->getIndustry($industrycd);
			echo json_encode($data); 
			}
	
		public function ajax_add_new_leadandcdc()
		{
			$campaign_id = $_GET['campaign_id'];
			$cids = $_GET['campaign_idcids'];
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}
			// $revnlbound_range = '';
			// if(!empty($_GET['revnlbound_range'])) {
			// $revnlbound_range = $_GET['revnlbound_range'];
			// }
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				if(!empty($_GET['aum']))
				{
					$aum = $_GET['aum'];
				} else{
				$aum = 0 ;
				}
				if(!empty($_GET['arevenue']))
				{
					$arrevenue = $_GET['arevenue'];
				} else{
				$arrevenue = 0 ;
				}
				if(!empty($_GET['phext']))
				{
					$phext = $_GET['phext'];
				} else{
				$phext = 0 ;
				}
			   if(!empty($_GET['sectyp']))
				{
					$sectype = $_GET['sectyp'];
				} else{
				$sectype = 0 ;
				}


				if(!empty($_GET['optin']))
				{
					$optin = 1;
				} else{
				    $optin = 0 ;
				}
				if(!empty($_GET['optpst']))
				{
					$optpost = 1;
				} else{
				    $optpost = 0 ;
				}
				if(!empty($_GET['optph']))
				{
					$optph = 1;
				} else{
				    $optph = 0 ;
				}
				if(!empty($_GET['opteml']))
				{
					$opteml = 1;
				} else{
				    $opteml = 0 ;
				}
				if(!empty($_GET['timezone']))
				{
					$timezones = $_GET['timezone'];
				} else{
				    $timezones = 0 ;
				}


				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' =>$arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				// 'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				// 'atitle' => $_GET['assetid'],

				// 'optin' => $optin,
				// 'optpst' => $optpost,
				// 'optph' => $optph,
				// 'opteml' => $opteml,
				

				// 'aa1' => $_GET['aa1'],
				// 'aa2' => $_GET['aa2'],
				// 'aa3' => $_GET['aa3'],
				// 'aa4' => $_GET['aa4'],
				// 'aa5' => $_GET['aa5'],
				// 'aa6' => $_GET['aa6'],
				// 'aa7' => $_GET['aa7'],
				// 'aa8' => $_GET['aa8'],
				// 'aa9' => $_GET['aa9'],
				// 'aa10' => $_GET['aa10'],
				// 'aa11' => $_GET['aa11'],
				// 'aa12' => $_GET['aa12'],

				// tag
				'pload' => '1', // next level ready to load

				

				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
				'stagtidi' => $_SESSION['empcode'], // submit agent name
				'stdti' => $old_date  // submit date time
								
				);
			
			//   print_r($datacdcandlead);
			//      exit();
			
				$addleadandcdcdata = $this->Administrator_Model->add_leadandcdc($datacdcandlead);
				// print_r($addcampaigndata);  die;
				

				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$addleadandcdcdata,
						"message"=>"Lead Added Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
								
			
		}
		public function ajax_save_leadandcdc()
		{
			$campaign_id = $_GET['campaign_id'];
			// $revnlbound_range = '';
			// if(!empty($_GET['revnlbound_range'])) {
			// $revnlbound_range = $_GET['revnlbound_range'];
			// }
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first." ".$last; 


				$old_date = date('Y-m-d H:i:s');           // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				if(!empty($_GET['aum']))
				{
					$aum = $_GET['aum'];
				} else{
				$aum = 0 ;
				}
				if(!empty($_GET['arevenue']))
				{
					$arrevenue = $_GET['arevenue'];
				} else{
				$arrevenue = 0 ;
				}
				if(!empty($_GET['phext']))
				{
					$phext = $_GET['phext'];
				} else{
				$phext = 0 ;
				}


			   if(!empty($_GET['sectyp']))
				{
					$sectype = $_GET['sectyp'];
				} else{
				$sectype = 0 ;
				}


				if(!empty($_GET['optin']))
				{
					$optin = 1;
				} else{
				    $optin = 0 ;
				}
				if(!empty($_GET['optpst']))
				{
					$optpost = 1;
				} else{
				    $optpost = 0 ;
				}
				if(!empty($_GET['optph']))
				{
					$optph = 1;
				} else{
				    $optph = 0 ;
				}
				if(!empty($_GET['opteml']))
				{
					$opteml = 1;
				} else{
				    $opteml = 0 ;
				}

				if(!empty($_GET['timezone']))
				{
					$timezones = $_GET['timezone'];
				} else{
				    $timezones = 0;
				}

				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' => $arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				// 'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' =>$aum,
				// 'atitle' => $_GET['assetid'],

				// 'optin' => $optin,
				// 'optpst' => $optpost,
				// 'optph' => $optph,
				// 'opteml' => $opteml,
				

				// 'aa1' => $_GET['aa1'],
				// 'aa2' => $_GET['aa2'],
				// 'aa3' => $_GET['aa3'],
				// 'aa4' => $_GET['aa4'],
				// 'aa5' => $_GET['aa5'],
				// 'aa6' => $_GET['aa6'],
				// 'aa7' => $_GET['aa7'],
				// 'aa8' => $_GET['aa8'],
				// 'aa9' => $_GET['aa9'],
				// 'aa10' => $_GET['aa10'],
				// 'aa11' => $_GET['aa11'],
				// 'aa12' => $_GET['aa12'],

				// tag
				'pload' => '0', // No next level ready to load- save means here

				

				'svagtidi' => $_SESSION['empcode'], // save Agent Name
				'svdti' => $old_date // save date time
				//'stagtidi' => '1', // submit agent name
				//'stdti' => $new_date // submit date time
				


								
				);
			
			//   print_r($datacdcandlead);
			    //  exit();
			
				$addleadandcdcdata = $this->Administrator_Model->add_leadandcdc($datacdcandlead);
				

				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$addleadandcdcdata,
						"message"=>"Lead Added Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
								
			
		}
		public function ajax_submit_leadandcdcbyCDQA()
		{
			$campaign_id = $_GET['campaign_id'];
			// $revnlbound_range = '';
			// if(!empty($_GET['revnlbound_range'])) {
			// $revnlbound_range = $_GET['revnlbound_range'];
			// }
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');            // works
				// $middle = strtotime($old_date);             // returns bool(false)
				// $new_date = date('Y-m-d H:i:s', $middle);
				// print_r($old_date);
				if(!empty($_GET['aum']))
					{
						$aum = $_GET['aum'];
					} else{
					$aum = 0 ;
					}

					if(!empty($_GET['arevenue']))
					{
						$arrevenue = $_GET['arevenue'];
					} else{
					$arrevenue = 0 ;
					}
					if(!empty($_GET['phext']))
					{
						$phext = $_GET['phext'];
					} else{
					$phext = 0 ;
					}
	
					
				if(!empty($_GET['sectyp']))
					{
						$sectype = $_GET['sectyp'];
					} else{
					$sectype = 0 ;
					}
				
					if(!empty($_GET['optin']))
					{
						$optin = 1;
					} else{
						$optin = 0 ;
					}
					if(!empty($_GET['optpst']))
					{
						$optpost = 1;
					} else{
						$optpost = 0 ;
					}
					if(!empty($_GET['optph']))
					{
						$optph = 1;
					} else{
						$optph = 0 ;
					}
					if(!empty($_GET['opteml']))
					{
						$opteml = 1;
					} else{
						$opteml = 0 ;
					}
					if(!empty($_GET['timezone']))
					{
						$timezones = $_GET['timezone'];
					} else{
						$timezones = 0 ;
					}

				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' => $arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				'atitle' => $_GET['assetid'],

				'optin' => $optin,
				'optpst' => $optpost,
				'optph' => $optph,
				'opteml' => $opteml,
				

				'aa1' => $_GET['aa1'],
				'aa2' => $_GET['aa2'],
				'aa3' => $_GET['aa3'],
				'aa4' => $_GET['aa4'],
				'aa5' => $_GET['aa5'],
				'aa6' => $_GET['aa6'],
				'aa7' => $_GET['aa7'],
				'aa8' => $_GET['aa8'],
				'aa9' => $_GET['aa9'],
				'aa10' => $_GET['aa10'],
				'aa11' => $_GET['aa11'],
				'aa12' => $_GET['aa12'],

				
				
				// tag
				'cdcload' => '1', // submit to next level

				

				'cdcsbagti' => $_SESSION['empcode'], // save Agent Name
				'cdcsbdti' => $old_date // save date time
				//'stagtidi' => '1', // submit agent name
				//'stdti' => $new_date // submit date time
				


								
				);
			
			//   print_r($datacdcandlead);
			    //  exit();
				
				// $updateleadandcdcdata = $this->Administrator_Model->update_leadandcdcbyCDQA($datacdcandlead,$campaign_id);
				$updateleadandcdcdata = $this->Administrator_Model->add_leadandcdcbyCDQA($datacdcandlead);
				// print_r(addcampaigndata); 

				if($updateleadandcdcdata == true){
			
					echo json_encode(array(
						'statusCode'=>'Success',
						"lead_id"=>$updateleadandcdcdata,
						'message'=>'Lead added Successfully..'
					));
				}else{
					echo json_encode(array(
						'statusCode'=>'Fail',
						'message'=>'Lead  failed..'
					));
				}
								
			
		}
		public function ajax_save_leadandcdcbyCDQA()
		{
			$campaign_id = $_GET['campaign_id'];
			// $revnlbound_range = '';
			// if(!empty($_GET['revnlbound_range'])) {
			// $revnlbound_range = $_GET['revnlbound_range'];
			// }
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');           // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				if(!empty($_GET['aum']))
					{
						$aum = $_GET['aum'];
					} else{
					$aum = 0 ;
					}

					if(!empty($_GET['arevenue']))
					{
						$arrevenue = $_GET['arevenue'];
					} else{
					$arrevenue = 0 ;
					}
					if(!empty($_GET['phext']))
					{
						$phext = $_GET['phext'];
					} else{
					$phext = 0 ;
					}
					
				if(!empty($_GET['sectyp']))
					{
						$sectype = $_GET['sectyp'];
					} else{
					$sectype = 0 ;
					}
				

				if(!empty($_GET['optin']))
				{
					$optin = 1;
				} else{
				    $optin = 0 ;
				}
				if(!empty($_GET['optpst']))
				{
					$optpost = 1;
				} else{
				    $optpost = 0 ;
				}
				if(!empty($_GET['optph']))
				{
					$optph = 1;
				} else{
				    $optph = 0 ;
				}
				if(!empty($_GET['opteml']))
				{
					$opteml = 1;
				} else{
				    $opteml = 0 ;
				}
				if(!empty($_GET['timezone']))
				{
					$timezones = $_GET['timezone'];
				} else{
				    $timezones = 0 ;
				}

				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' => $arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				'atitle' => $_GET['assetid'],

				'optin' => $optin,
				'optpst' => $optpost,
				'optph' => $optph,
				'opteml' => $opteml,
				

				'aa1' => $_GET['aa1'],
				'aa2' => $_GET['aa2'],
				'aa3' => $_GET['aa3'],
				'aa4' => $_GET['aa4'],
				'aa5' => $_GET['aa5'],
				'aa6' => $_GET['aa6'],
				'aa7' => $_GET['aa7'],
				'aa8' => $_GET['aa8'],
				'aa9' => $_GET['aa9'],
				'aa10' => $_GET['aa10'],
				'aa11' => $_GET['aa11'],
				'aa12' => $_GET['aa12'],

				
				// tag
				'cdcsv' => '1', // Save only

				

				'cdcsvagti' => $_SESSION['empcode'], // save Agent Name
				'cdcsvdti' => $old_date // save date time
				//'stagtidi' => '1', // submit agent name
				//'stdti' => $new_date // submit date time
				


								
				);
			
			
			
				// $updateleadandcdcdata = $this->Administrator_Model->update_leadandcdcbyCDQA($datacdcandlead,$campaign_id);
				// print_r(addcampaigndata); 
				$updateleadandcdcdata = $this->Administrator_Model->add_leadandcdcbyCDQA($datacdcandlead);
				
				// echo json_encode($updateleadandcdcdata );
				if($updateleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$updateleadandcdcdata,
						"message"=>"Lead added Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}

		public function ajax_add_new_leaddata()
		{
			$campaign_id = $_GET['campaign_id'];
			$cids = $_GET['campaign_idcids'];
			
			// $_SESSION['empcode']= NULL;
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			// $revnlbound_range = '';
			// if(!empty($_GET['revnlbound_range'])) {
			// $revnlbound_range = $_GET['revnlbound_range'];
			// }
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				if(!empty($_GET['aum']))
				{
					$aum = $_GET['aum'];
				} else{
				$aum = 0 ;
				}
				if(!empty($_GET['arevenue']))
				{
					$arrevenue = $_GET['arevenue'];
				} else{
				$arrevenue = 0 ;
				}
				if(!empty($_GET['phext']))
				{
					$phext = $_GET['phext'];
				} else{
				$phext = 0 ;
				}
			   if(!empty($_GET['sectyp']))
				{
					$sectype = $_GET['sectyp'];
				} else{
				$sectype = 0 ;
				}


				if(!empty($_GET['optin']))
				{
					$optin = 1;
				} else{
				    $optin = 0 ;
				}
				if(!empty($_GET['optpst']))
				{
					$optpost = 1;
				} else{
				    $optpost = 0 ;
				}
				if(!empty($_GET['optph']))
				{
					$optph = 1;
				} else{
				    $optph = 0 ;
				}
				if(!empty($_GET['opteml']))
				{
					$opteml = 1;
				} else{
				    $opteml = 0 ;
				}
				if(!empty($_GET['timezone']))
				{
					$timezones = $_GET['timezone'];
				} else{
				    $timezones = 0 ;
				}


				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				// 'jlevel' => $_GET['jlevel'],
				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' =>$arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				// 'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				// tag
				// 'ontag' => 0, // Submit and 0 = new
				'sbsvtag' => '1', // Submit 1st time
				'pload' => '1', // next level ready to load
				'rlc' => '0', // record is closed
				'dvload' => '1', // record is closed
			

				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
				'stagtidi' => $_SESSION['empcode'], // submit agent name 
				'stdti' => $old_date  // submit date time
								
				);
			
			//   print_r($datacdcandlead);
			//      exit();
			
				$addleadandcdcdata = $this->Administrator_Model->add_leaddata($datacdcandlead);
				// print_r($addcampaigndata);  die;
				

				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$addleadandcdcdata,
						"message"=>"Lead Added Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
								
			
		}
		public function ajax_save_leaddata()
		{
			$campaign_id = $_GET['campaign_id'];
			$cids = $_GET['campaign_idcids'];
			$lmid = $_GET['lmid'];

			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}
		
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				if(!empty($_GET['aum']))
				{
					$aum = $_GET['aum'];
				} else{
				$aum = 0 ;
				}
				if(!empty($_GET['arevenue']))
				{
					$arrevenue = $_GET['arevenue'];
				} else{
				$arrevenue = 0 ;
				}
				if(!empty($_GET['phext']))
				{
					$phext = $_GET['phext'];
				} else{
				$phext = 0 ;
				}
			   if(!empty($_GET['sectyp']))
				{
					$sectype = $_GET['sectyp'];
				} else{
				$sectype = 0 ;
				}


				if(!empty($_GET['optin']))
				{
					$optin = 1;
				} else{
				    $optin = 0 ;
				}
				if(!empty($_GET['optpst']))
				{
					$optpost = 1;
				} else{
				    $optpost = 0 ;
				}
				if(!empty($_GET['optph']))
				{
					$optph = 1;
				} else{
				    $optph = 0 ;
				}
				if(!empty($_GET['opteml']))
				{
					$opteml = 1;
				} else{
				    $opteml = 0 ;
				}
				if(!empty($_GET['timezone']))
				{
					$timezones = $_GET['timezone'];
				} else{
				    $timezones = 0 ;
				}


				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' =>$arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				// tag
				'ontag' => '0', // Submit and 0 = new
				'sbsvtag' => '0', // Save
				'rlc' => '0', // Save
				'pload' => '0', // next level ready to load

				'svagtidi' => $_SESSION['empcode'], // save Agent Name
				'svdti' => $old_date // save date time
				// 'stagtidi' => $_SESSION['empcode'], // submit agent name 
				// 'stdti' => $old_date  // submit date time
								
				);
			
			//   print_r($datacdcandlead);
			//      exit();
			if($lmid > 1){
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			}else{
				$addleadandcdcdata = $this->Administrator_Model->save_leaddata($datacdcandlead);
			}
				
				
				// print_r($addcampaigndata);  die;
				

				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$addleadandcdcdata,
						"message"=>"Lead Saved Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}
		
		public function ajax_update_dataverification()
		{
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
			$sbsvtag = $_POST['sbsvtag'];
			$dvrejtg = $_POST['dvrejtg'];
			$dvsbtg = $_POST['dvsbtg'];

			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

			// $mychecked = explode(',', $checked);
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}
			if(!empty($_POST['dvragtidi']))
				{
					$postagent1 =  $_POST['dvragtidi'];
				} else{
				$postagent1 = NULL;
				}
			if(!empty($_POST['dvrdti']))
				{
					$postdate1 =  $_POST['dvrdti'];
				} else{
				$postdate1 = NULL;
				}

			if(!empty($_POST['dvragtidii']))
				{
					$postagent2 =  $_POST['dvragtidii'];
				} else{
				$postagent2 = NULL;
				}
			if(!empty($_POST['dvrdtii']))
				{
					$postdate2 =  $_POST['dvrdtii'];
				} else{
				$postdate2 = NULL;
				}



				if(!empty($_POST['dvagtidi']))
				{
					$postagentaccept1 =  $_POST['dvagtidi'];
				} else{
				$postagentaccept1 = NULL;
				}
				if(!empty($_POST['dvdti']))
				{
					$postdateaccept1 =  $_POST['dvdti'];
				} else{
				$postdateaccept1 = NULL;
				}
				if(!empty($_POST['dvagtidii']))
				{
					$postagentaccept2 =  $_POST['dvagtidii'];
				} else{
				$postagentaccept2 = NULL;
				}
				if(!empty($_POST['dvdtii']))
				{
					$postdateaccept2 =  $_POST['dvdtii'];
				} else{
				$postdateaccept2 = NULL;
				}


			$mychecked2 = implode(',', $checked);
			
			// if((($_POST['dvrejtg'] >= 1) AND ($_POST['dvsbtg'] != 0) ) OR (($_POST['dvrejtg'] != 0) AND ($_POST['dvsbtg'] >= 1 )))
			
			// best if((($_POST['dvsbtg'] == 1) AND ($_POST['dvrejtg'] == 0)) OR (($_POST['dvsbtg'] == 0) AND ($_POST['dvrejtg'] == 1)))
			
			// if(!empty($_POST['dvdti'] ) AND !empty($_POST['dvrdti'] ))

			if(($_POST['dvrejtg'] > 1) OR ($_POST['dvsbtg'] > 1) )
			{

				if($mychecked2 == "0"){  // Accept
					$dvload = "1"; // go to next level-- Accept
					$dvstat ="1"; //Data Verification|Tag for On Accept / Reject /Discard
					 $ontag = "1"; //null = new, 0 = needs to be reworked
					 $dvrejtg = $_POST['dvrejtg'];
					 $dvsbtg = $_POST['dvsbtg']; //Data Verification|Submission Tag
					
					 $dvagtidii = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
					// $dvragtidi = NULL;
					$dvragtidii = $postagent2;
					
					$dvdtii = $old_date; //Data Verification Accept|date and time_I
					// $dvrdti = NULL;
					$dvrdtii = $postdate2;
					$dvragtidi = $postagent1;
					$dvrdti = $postdate1;
	
					$dvagtidi = $postagentaccept1;
					$dvdti = $postdateaccept1;
	
					
				}else{
					$dvload = "0"; // Reject
					$dvstat ="2";
					$dvrejtg = $_POST['dvrejtg'];
					$dvsbtg = $_POST['dvsbtg'];
					$ontag = "1"; //null = new, 0 = needs to be reworked
	
					$dvragtidii = $_SESSION['empcode'];
					// $dvagtidi = NULL;
					$dvagtidii = $postagentaccept2;
					
					// $dvdti = NULL ;
					$dvdtii = $postdateaccept2;
					$dvrdtii = $old_date; //Data Verification|Rej_date and time_I
					
					$dvragtidi = $postagent1;
					$dvrdti = $postdate1;
					
	
					$dvagtidi = $postagentaccept1;
					$dvdti = $postdateaccept1;
	
				}




			}else{

				if($mychecked2 == "0"){  // Accept
								$dvload = "1"; // go to next level-- Accept
								$dvstat ="1"; //Data Verification|Tag for On Accept / Reject /Discard
								$ontag = "1"; //null = new, 0 = needs to be reworked
								$dvsbtg = $_POST['dvsbtg']; //Data Verification|Submission Tag
								$dvrejtg = $_POST['dvrejtg'];
		
								$dvagtidi = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
								// $dvragtidi = NULL;
								$dvragtidi = $postagent1;
								$dvdti = $old_date; //Data Verification Accept|date and time_I
								// $dvrdti = NULL;
								$dvrdti = $postdate1;
								$dvrdtii = $postdate2;
								$dvdtii = $postdateaccept2;
								$dvagtidii = $postagentaccept2;
								$dvragtidii = $postagent2;
								
							
								
							}else{
								$dvload = "0"; // Reject
								$dvstat ="2";
								$dvrejtg = $_POST['dvrejtg'];
								$dvsbtg = $_POST['dvsbtg'];
								$ontag = "1"; //null = new, 0 = needs to be reworked
		
								$dvragtidi = $_SESSION['empcode'];
								// $dvagtidi = NULL;
								$dvagtidi = $postagentaccept1;
								
								// $dvdti = NULL ;
								$dvdti = $postdateaccept1;
								$dvrdti = $old_date; //Data Verification|Rej_date and time_I
								$dvrdtii = $postdate2;
								$dvdtii = $postdateaccept2;
								$dvagtidii = $postagentaccept2;
								$dvragtidii = $postagent2;
		
								
							}

			
			}

					if($sbsvtag == 0){
					$svdti = $old_date;	
					$svagtidi = $_SESSION['empcode'];
					}else{
						$svdti = NULL;
						$svagtidi= NULL;
					}
					
					$datacdcandlead = array(
						'dvrejectreason' => $mychecked2,
						'pcomt' => $_POST['pcomt'],
						
						
						// tag
						// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
						'sbsvtag' => $sbsvtag, //  Submit till 5 times
						'svagtidi' => $svagtidi, 
						'svdti' => $svdti, 
						'pload' => '0', // next level ready to load
						'rlc' => '0', // record is closed
						'dvrejtg' => $dvrejtg, 
						'dvsbtg' => $dvsbtg, 
						'ontag' => $ontag, 
						'dvload' => $dvload, //  next level
						'dvstat' => $dvstat, //  dvstat
						// 'svagtidi' => '1' // save Agent Name
						// 'svdti' => '1' // save date time
						'dvagtidi' => $dvagtidi, // submit agent name 
						'dvragtidi' => $dvragtidi, // submit agent name 
						'dvdti' => $dvdti,  // submit date time
						'dvrdti' => $dvrdti, // Data Verification|Rej_date and time_I

						'dvagtidii' => $dvagtidii, // submit agent name 
						'dvragtidii' => $dvragtidii, // submit agent name 
						'dvdtii' => $dvdtii,  // submit date time
						'dvrdtii' => $dvrdtii // Data Verification|Rej_date and time_I
					
										
					);
			
			// 	print_r($lmid); echo "Hiii";
			// 	print_r($_POST['sbsvtag']); echo "Hiii";
			//   print_r($datacdcandlead);
			 
			    
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				// print_r($addcampaigndata);  die;
				
				// exit();
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						// "lead_id"=>$addleadandcdcdata,
						"message"=>"Data Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}
		public function ajax_update_datacdc()
		{
			
			
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
			$cdcsv = $_POST['cdcsv'];
			$cdcrjt = $_POST['cdcrjt'];
			$cdcsb = $_POST['cdcsb'];
			$evloadposted = $_POST['evload'];
			
			// print_r($_POST['checked']);
			// // exit();
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

			// $mychecked = explode(',', $checked);
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			if(!empty($_POST['cdcrjtagti']))
			{
				$postagent1 =  $_POST['cdcrjtagti'];
			} else{
			$postagent1 = NULL;
			}
		if(!empty($_POST['cdcrjtdti']))
			{
				$postdate1 =  $_POST['cdcrjtdti'];
			} else{
			$postdate1 = NULL;
			}

		if(!empty($_POST['cdcrjtagtii']))
			{
				$postagent2 =  $_POST['cdcrjtagtii'];
			} else{
			$postagent2 = NULL;
			}
		if(!empty($_POST['cdcrjtdtii']))
			{
				$postdate2 =  $_POST['cdcrjtdtii'];
			} else{
			$postdate2 = NULL;
			}



			if(!empty($_POST['cdcsbagti']))
			{
				$postagentaccept1 =  $_POST['cdcsbagti'];
			} else{
			$postagentaccept1 = NULL;
			}
			if(!empty($_POST['cdcsbdti']))
			{
				$postdateaccept1 =  $_POST['cdcsbdti'];
			} else{
			$postdateaccept1 = NULL;
			}
			if(!empty($_POST['cdcsbagtii']))
			{
				$postagentaccept2 =  $_POST['cdcsbagtii'];
			} else{
			$postagentaccept2 = NULL;
			}
			if(!empty($_POST['cdcsbdtii']))
			{
				$postdateaccept2 = $_POST['cdcsbdtii'];
			} else{
			$postdateaccept2 = NULL;
			}

			if(!empty($_POST['lcalldisp'])|| ($_POST['lcalldisp'] =='0'))
			{
				$lcalldisp =  $_POST['lcalldisp'];
			} else{
			$lcalldisp = NULL;
			}
			
			if(!empty($_POST['lcallstat']) || ($_POST['lcallstat'] =='0') )
			{
				$lcallstat =  $_POST['lcallstat'];
			} else{
			$lcallstat = NULL;
			}

	
			if(!empty($_POST['cdclst']) || ($_POST['cdclst'] =='0') )
			{
				$cdclst =  $_POST['cdclst'];
			} else{
			$cdclst = NULL;
			}

		
			
				$ddispositionclass = $_POST['ddispositionclass'];
			
				$cvr = $_POST['cvr'];
			

			$mychecked2 = implode(',', $checked);
			
		

			if(($_POST['cdcrjt'] > 1) OR ($_POST['cdcsb'] > 1) )
			{

				if($mychecked2 == "0"){  // Accept
					$cdcload = "1"; // go to next level-- Accept
					
					 $ontag = "1"; //null = new, 0 = needs to be reworked
					 $cdcrjt = $_POST['cdcrjt'];
					 $cdcsb = $_POST['cdcsb']; //Data Verification|Submission Tag
					
					 $cdcsbagtii = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
					// $dvragtidi = NULL;
					$cdcrjtagtii = $postagent2;
					
					$cdcsbdtii = $old_date; //Data Verification Accept|date and time_I
					// $dvrdti = NULL;
					$cdcrjtdtii = $postdate2;
					$cdcrjtagti = $postagent1;
					$cdcrjtdti = $postdate1;
	
					$cdcsbagti = $postagentaccept1;
					$cdcsbdti = $postdateaccept1;
					$evload = $evloadposted;
				
					
				}else{
					$cdcload = "0"; // Reject
				
					$cdcrjt = $_POST['cdcrjt'];
					$cdcsb = $_POST['cdcsb'];
					$ontag = "1"; //null = new, 0 = needs to be reworked
	
					$cdcrjtagtii = $_SESSION['empcode'];
					// $dvagtidi = NULL;
					$cdcsbagtii = $postagentaccept2;
					
					// $dvdti = NULL ;
					$cdcsbdtii = $postdateaccept2;
					$cdcrjtdtii = $old_date; //Data Verification|Rej_date and time_I
					
					$cdcrjtagti = $postagent1;
					$cdcrjtdti = $postdate1;
					
	
					$cdcsbagti = $postagentaccept1;
					$cdcsbdti = $postdateaccept1;
					$evload = 0;
	
				}


			}else{

				if($mychecked2 == "0"){  // Accept
								$cdcload = "1"; // go to next level-- Accept
							
								$ontag = "1"; //null = new, 0 = needs to be reworked
								$cdcsb = $_POST['cdcsb']; //Data Verification|Submission Tag
								$cdcrjt = $_POST['cdcrjt'];
		
								$cdcsbagti = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
								// $dvragtidi = NULL;
								$cdcrjtagti = $postagent1;
								$cdcsbdti = $old_date; //Data Verification Accept|date and time_I
								// $dvrdti = NULL;
								$cdcrjtdti = $postdate1;
								$cdcrjtdtii = $postdate2;
								$cdcsbdtii = $postdateaccept2;
								$cdcsbagtii = $postagentaccept2;
								$cdcrjtagtii = $postagent2;
								$evload = $evloadposted;
							
								
							}else{
								$cdcload = "0"; // Reject
							
								$cdcrjt = $_POST['cdcrjt'];
								$cdcsb = $_POST['cdcsb'];
								$ontag = "1"; //null = new, 0 = needs to be reworked
		
								$cdcrjtagti = $_SESSION['empcode'];
								// $dvagtidi = NULL;
								$cdcsbagti = $postagentaccept1;
								
								// $dvdti = NULL ;
								$cdcsbdti = $postdateaccept1;
								$cdcrjtdti = $old_date; //Data Verification|Rej_date and time_I
								$cdcrjtdtii = $postdate2;
								$cdcsbdtii = $postdateaccept2;
								$cdcsbagtii = $postagentaccept2;
								$cdcrjtagtii = $postagent2;
								$evload = 0;
								
							}

			
			}

					if($cdcsv == 0){
					$cdcsvdti = $old_date;	
					$cdcsvagti = $_SESSION['empcode'];
					}else{
						$cdcsvdti = NULL;
						$cdcsvagti= NULL;
					}
					
					$pcomt= "CDC:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					// $arr = explode("/", $pcomt);
					// $firsts = $arr[0];
// 		print_r($first);
// exit();

				$datacdcandlead = array(
				'cdcrjfields' => $mychecked2,
				// tag
				// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
				'cdcsv' => $cdcsv, //  Submit till 5 times
				'cdcsvagti' => $cdcsvagti, 
				'cdcsvdti' => $cdcsvdti, 
				'rlc' => '0', // record is closed
				'cdcrjt' => $cdcrjt, 
				'cdcsb' => $cdcsb, 
				 'ontag' => $ontag, 
				'cdcload' => $cdcload, //  next level
				'evload' => $evload, //  next level

				'lcalldisp' => $lcalldisp, 
				'lcallstat' => $lcallstat, 
				'cvr' => $cvr, 
				'ddispositionclass' => $ddispositionclass, 
				'cdclst' => $cdclst, 
			
				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
			
				'cdcsbagti' => $cdcsbagti, // submit agent name 
				'cdcrjtagti' => $cdcrjtagti, // submit agent name 
				'cdcsbdti' => $cdcsbdti,  // submit date time
				'cdcrjtdti' => $cdcrjtdti, // Data Verification|Rej_date and time_I

				'cdcsbagtii' => $cdcsbagtii, // submit agent name 
				'cdcrjtagtii' => $cdcrjtagtii, // submit agent name 
				'cdcsbdtii' => $cdcsbdtii,  // submit date time
				'cdcrjtdtii' => $cdcrjtdtii, // Data Verification|Rej_date and time_I


				'dvcomt' => 1, //accept/rejection by cdc
				'pcomt' => $pcomt, //accept/rejection by cdc
				 'optin' => $_POST['optin'],
				'optpst' => $_POST['optpst'],
				'optph' => $_POST['optph'],
				'opteml' => $_POST['opteml'],
				'dnd' => $_POST['dnd'],
				

				'aa1' => $_POST['aa1'],
				'aa2' => $_POST['aa2'],
				'aa3' => $_POST['aa3'],
				'aa4' => $_POST['aa4'],
				'aa5' => $_POST['aa5'],
				'aa6' => $_POST['aa6'],
				'aa7' => $_POST['aa7'],
				'aa8' => $_POST['aa8'],
				'aa9' => $_POST['aa9'],
				'aa10' => $_POST['aa10'],
				'aa11' => $_POST['aa11'],
				'aa12' => $_POST['aa12']


			
								
				);
			// 	print_r($lmid); echo "Hiii";
			// 	print_r($_POST['cdcsv']); echo "Hiii";
			//   print_r($datacdcandlead);
			 
			    // exit();
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				// $addleadandcdcdatacomment = $this->Administrator_Model->update_leaddatacomment( $_POST['pcomt'],$lmid);
				// print_r($addcampaigndata);  die;
				
				// exit();
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						// "lead_id"=>$addleadandcdcdata,
						"message"=>"Data Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}
		public function ajax_update_qatolead()
		{
			exit();
			
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
			$cdcsv = $_POST['cdcsv'];
			$cdcrjt = $_POST['cdcrjt'];
			$cdcsb = $_POST['cdcsb'];
			$evloadposted = $_POST['evload'];
			
			// print_r($_POST['checked']);
			// // exit();
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

			// $mychecked = explode(',', $checked);
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			if(!empty($_POST['cdcrjtagti']))
			{
				$postagent1 =  $_POST['cdcrjtagti'];
			} else{
			$postagent1 = NULL;
			}
		if(!empty($_POST['cdcrjtdti']))
			{
				$postdate1 =  $_POST['cdcrjtdti'];
			} else{
			$postdate1 = NULL;
			}

		if(!empty($_POST['cdcrjtagtii']))
			{
				$postagent2 =  $_POST['cdcrjtagtii'];
			} else{
			$postagent2 = NULL;
			}
		if(!empty($_POST['cdcrjtdtii']))
			{
				$postdate2 =  $_POST['cdcrjtdtii'];
			} else{
			$postdate2 = NULL;
			}



			if(!empty($_POST['cdcsbagti']))
			{
				$postagentaccept1 =  $_POST['cdcsbagti'];
			} else{
			$postagentaccept1 = NULL;
			}
			if(!empty($_POST['cdcsbdti']))
			{
				$postdateaccept1 =  $_POST['cdcsbdti'];
			} else{
			$postdateaccept1 = NULL;
			}
			if(!empty($_POST['cdcsbagtii']))
			{
				$postagentaccept2 =  $_POST['cdcsbagtii'];
			} else{
			$postagentaccept2 = NULL;
			}
			if(!empty($_POST['cdcsbdtii']))
			{
				$postdateaccept2 =  $_POST['cdcsbdtii'];
			} else{
			$postdateaccept2 = NULL;
			}


			$mychecked2 = implode(',', $checked);
			
		

			if(($_POST['cdcrjt'] > 1) OR ($_POST['cdcsb'] > 1) )
			{

				if($mychecked2 == "0"){  // Accept
					$cdcload = "1"; // go to next level-- Accept
					
					 $ontag = "1"; //null = new, 0 = needs to be reworked
					 $cdcrjt = $_POST['cdcrjt'];
					 $cdcsb = $_POST['cdcsb']; //Data Verification|Submission Tag
					
					 $cdcsbagtii = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
					// $dvragtidi = NULL;
					$cdcrjtagtii = $postagent2;
					
					$cdcsbdtii = $old_date; //Data Verification Accept|date and time_I
					// $dvrdti = NULL;
					$cdcrjtdtii = $postdate2;
					$cdcrjtagti = $postagent1;
					$cdcrjtdti = $postdate1;
	
					$cdcsbagti = $postagentaccept1;
					$cdcsbdti = $postdateaccept1;
					$evload = $evloadposted;
				
					
				}else{
					$cdcload = "0"; // Reject
				
					$cdcrjt = $_POST['cdcrjt'];
					$cdcsb = $_POST['cdcsb'];
					$ontag = "1"; //null = new, 0 = needs to be reworked
	
					$cdcrjtagtii = $_SESSION['empcode'];
					// $dvagtidi = NULL;
					$cdcsbagtii = $postagentaccept2;
					
					// $dvdti = NULL ;
					$cdcsbdtii = $postdateaccept2;
					$cdcrjtdtii = $old_date; //Data Verification|Rej_date and time_I
					
					$cdcrjtagti = $postagent1;
					$cdcrjtdti = $postdate1;
					
	
					$cdcsbagti = $postagentaccept1;
					$cdcsbdti = $postdateaccept1;
					$evload = 0;
	
				}


			}else{

				if($mychecked2 == "0"){  // Accept
								$cdcload = "1"; // go to next level-- Accept
							
								$ontag = "1"; //null = new, 0 = needs to be reworked
								$cdcsb = $_POST['cdcsb']; //Data Verification|Submission Tag
								$cdcrjt = $_POST['cdcrjt'];
		
								$cdcsbagti = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
								// $dvragtidi = NULL;
								$cdcrjtagti = $postagent1;
								$cdcsbdti = $old_date; //Data Verification Accept|date and time_I
								// $dvrdti = NULL;
								$cdcrjtdti = $postdate1;
								$cdcrjtdtii = $postdate2;
								$cdcsbdtii = $postdateaccept2;
								$cdcsbagtii = $postagentaccept2;
								$cdcrjtagtii = $postagent2;
								$evload = $evloadposted;
							
								
							}else{
								$cdcload = "0"; // Reject
							
								$cdcrjt = $_POST['cdcrjt'];
								$cdcsb = $_POST['cdcsb'];
								$ontag = "1"; //null = new, 0 = needs to be reworked
		
								$cdcrjtagti = $_SESSION['empcode'];
								// $dvagtidi = NULL;
								$cdcsbagti = $postagentaccept1;
								
								// $dvdti = NULL ;
								$cdcsbdti = $postdateaccept1;
								$cdcrjtdti = $old_date; //Data Verification|Rej_date and time_I
								$cdcrjtdtii = $postdate2;
								$cdcsbdtii = $postdateaccept2;
								$cdcsbagtii = $postagentaccept2;
								$cdcrjtagtii = $postagent2;
								$evload = 0;
								
							}

			
			}

					if($cdcsv == 0){
					$cdcsvdti = $old_date;	
					$cdcsvagti = $_SESSION['empcode'];
					}else{
						$cdcsvdti = NULL;
						$cdcsvagti= NULL;
					}
					
					$pcomt= "CDC:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					// $arr = explode("/", $pcomt);
					// $firsts = $arr[0];
// 		print_r($first);
// exit();

				$datacdcandlead = array(
				'cdcrjfields' => $mychecked2,
				// tag
				// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
				'cdcsv' => $cdcsv, //  Submit till 5 times
				'cdcsvagti' => $cdcsvagti, 
				'cdcsvdti' => $cdcsvdti, 
				'rlc' => '0', // record is closed
				'cdcrjt' => $cdcrjt, 
				'cdcsb' => $cdcsb, 
				 'ontag' => $ontag, 
				'cdcload' => $cdcload, //  next level
				'evload' => $evload, //  next level
			
				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
			
				'cdcsbagti' => $cdcsbagti, // submit agent name 
				'cdcrjtagti' => $cdcrjtagti, // submit agent name 
				'cdcsbdti' => $cdcsbdti,  // submit date time
				'cdcrjtdti' => $cdcrjtdti, // Data Verification|Rej_date and time_I

				'cdcsbagtii' => $cdcsbagtii, // submit agent name 
				'cdcrjtagtii' => $cdcrjtagtii, // submit agent name 
				'cdcsbdtii' => $cdcsbdtii,  // submit date time
				'cdcrjtdtii' => $cdcrjtdtii, // Data Verification|Rej_date and time_I


				'dvcomt' => 1, //accept/rejection by cdc
				'pcomt' => $pcomt, //accept/rejection by cdc
				 'optin' => $_POST['optin'],
				'optpst' => $_POST['optpst'],
				'optph' => $_POST['optph'],
				'opteml' => $_POST['opteml'],
				'dnd' => $_POST['dnd'],
				

				'aa1' => $_POST['aa1'],
				'aa2' => $_POST['aa2'],
				'aa3' => $_POST['aa3'],
				'aa4' => $_POST['aa4'],
				'aa5' => $_POST['aa5'],
				'aa6' => $_POST['aa6'],
				'aa7' => $_POST['aa7'],
				'aa8' => $_POST['aa8'],
				'aa9' => $_POST['aa9'],
				'aa10' => $_POST['aa10'],
				'aa11' => $_POST['aa11'],
				'aa12' => $_POST['aa12']


			
								
				);
			// 	print_r($lmid); echo "Hiii";
			// 	print_r($_POST['cdcsv']); echo "Hiii";
			//   print_r($datacdcandlead);
			 
			    // exit();
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				// $addleadandcdcdatacomment = $this->Administrator_Model->update_leaddatacomment( $_POST['pcomt'],$lmid);
				// print_r($addcampaigndata);  die;
				
				// exit();
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						// "lead_id"=>$addleadandcdcdata,
						"message"=>"Data Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}


		public function ajax_update_leaddata()
		{
			$campaign_id = $_GET['campaign_id'];
			$cids = $_GET['campaign_idcids'];
			$sbsvtag = $_GET['sbsvtag'];
			$lmid = $_GET['lmid'];

			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			// print_r($cids);
			// print_r($sbsvtag);

			// die;
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				if(empty($_GET['stagtidi']))
				{
					$stagtidi = $_SESSION['empcode'];
				}else{
					$stagtidi = $_GET['stagtidi'];
				}
				if(!empty($_GET['stagtidi']) AND empty($_GET['stagtidii']))
				{
					$stagtidii = $_SESSION['empcode'];
				}else{
					$stagtidii = NULL;
				}
				if(!empty($_GET['stagtidi']) AND !empty($_GET['stagtidii']))
				{
					$stagtidii = $_SESSION['empcode'];
				}
				// else{
				// 	$stagtidii = NULL;
				// }


				if(empty($_GET['stdti']))
				{
					$stdti = $old_date;
				}else{
					$stdti = $_GET['stdti'];
				}
				if(!empty($_GET['stdti']) AND (empty($_GET['stdtii'])))
				{
					$stdtii = $old_date;
				}else{
					$stdtii = NULL;
				}
				if(!empty($_GET['stdti']) AND !(empty($_GET['stdtii'])))
				{
					$stdtii = $old_date;
				}
				// else{
				// 	$stdtii = NULL;
				// }

				// 'stagtidii' => $_SESSION['empcode'], // submit agent name 

				if(!empty($_GET['aum']))
				{
					$aum = $_GET['aum'];
				} else{
				$aum = 0 ;
				}
				if(!empty($_GET['arevenue']))
				{
					$arrevenue = $_GET['arevenue'];
				} else{
				$arrevenue = 0 ;
				}
				if(!empty($_GET['phext']))
				{
					$phext = $_GET['phext'];
				} else{
				$phext = 0 ;
				}
			   if(!empty($_GET['sectyp']))
				{
					$sectype = $_GET['sectyp'];
				} else{
				$sectype = 0 ; 
				}  


				if(!empty($_GET['optin']))
				{
					$optin = 1;
				} else{
				    $optin = 0 ;
				}
				if(!empty($_GET['optpst']))
				{
					$optpost = 1;
				} else{
				    $optpost = 0 ;
				}
				if(!empty($_GET['optph']))
				{
					$optph = 1;
				} else{
				    $optph = 0 ;
				}
				if(!empty($_GET['opteml']))
				{
					$opteml = 1;
				} else{
				    $opteml = 0 ;
				}
				if(!empty($_GET['timezone']))
				{
					$timezones = $_GET['timezone'];
				} else{
				    $timezones = 0 ;
				}

				// $atitle =$_GET['assetid'];
				// if(!empty($atitle){
				// 	$atitle =$_GET['assetid'];	
				// }else{
				// 	$atitle= NULL;
				// }
				
				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' =>$arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				// tag
				// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
				'sbsvtag' => $sbsvtag, //  Submit till 5 times
				'pload' => '1', // next level ready to load
				'rlc' => '0', // record is closed
				'ontag' => '0', // record is closed

				
				// 'stagtidii' => $_SESSION['empcode'], // submit agent name 
				// 'stdtii' => $old_date  // submit date time
				'stagtidi' => $stagtidi,
				'stagtidii' => $stagtidii, // submit agent name 

				'stdti' => $stdti,
				'stdtii' => $stdtii
				// 'stdti' => $stdtii,  // submit date time
				// 'stdtii' => $old_date  // submit date time
								
				);
			
			//   print_r($datacdcandlead);
			//      exit();
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				// print_r($addcampaigndata);  die;
				

				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$addleadandcdcdata,
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
								
			
		}
		public function ajax_update_leaddatacdc()
		{
			$campaign_id = $_GET['campaign_id'];
			$cids = $_GET['campaign_idcids'];
			$sbsvtag = $_GET['sbsvtag'];
			$lmid = $_GET['lmid'];

			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			// print_r($cids);
			// print_r($sbsvtag);

			// die;
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				if(!empty($_GET['aum']))
				{
					$aum = $_GET['aum'];
				} else{
				$aum = 0 ;
				}
				if(!empty($_GET['arevenue']))
				{
					$arrevenue = $_GET['arevenue'];
				} else{
				$arrevenue = 0 ;
				}
				if(!empty($_GET['phext']))
				{
					$phext = $_GET['phext'];
				} else{
				$phext = 0 ;
				}
			   if(!empty($_GET['sectyp']))
				{
					$sectype = $_GET['sectyp'];
				} else{
				$sectype = 0 ; 
				}  


				if(!empty($_GET['optin']))
				{
					$optin = 1;
				} else{
				    $optin = 0 ;
				}
				if(!empty($_GET['optpst']))
				{
					$optpost = 1;
				} else{
				    $optpost = 0 ;
				}
				if(!empty($_GET['optph']))
				{
					$optph = 1;
				} else{
				    $optph = 0 ;
				}
				if(!empty($_GET['opteml']))
				{
					$opteml = 1;
				} else{
				    $opteml = 0 ;
				}
				if(!empty($_GET['timezone']))
				{
					$timezones = $_GET['timezone'];
				} else{
				    $timezones = 0 ;
				}


				$pcomt= "CDC:".$_SESSION['empcode'].":".$old_date."#".$_GET['pcomt'];
				
				if(empty($_GET['cdcsbagti']))
				{
					$cdcsbagti = $_SESSION['empcode'];
				}else{
					$cdcsbagti = $_GET['cdcsbagti'];
				}
				if(!empty($_GET['cdcsbagti']) AND empty($_GET['cdcsbagtii']))
				{
					$cdcsbagtii = $_SESSION['empcode'];
				}else{
					$cdcsbagtii = NULL;
				}
				if(!empty($_GET['cdcsbagti']) AND !empty($_GET['cdcsbagtii']))
				{
					$cdcsbagtii = $_SESSION['empcode'];
				}
				


				if(empty($_GET['cdcsbdti']))
				{
					$cdcsbdti = $old_date;
				}else{
					$cdcsbdti = $_GET['cdcsbdti'];
				}
				if(!empty($_GET['cdcsbdti']) AND (empty($_GET['cdcsbdtii'])))
				{
					$cdcsbdtii = $old_date;
				}else{
					$cdcsbdtii = NULL;
				}
				if(!empty($_GET['cdcsbdti']) AND !(empty($_GET['cdcsbdtii'])))
				{
					$cdcsbdtii = $old_date;
				}


				$atitle =$_GET['assetid'];
				if(!empty($atitle)){
					$atitle =$_GET['assetid'];	
				}else{
					$atitle= NULL;
				}

				if(!empty($_POST['lcalldisp'])|| ($_GET['lcalldisp'] =='0'))
				{
					$lcalldisp =  $_GET['lcalldisp'];
				} else{
				$lcalldisp = NULL;
				}
				
				if(!empty($_GET['lcallstat']) || ($_GET['lcallstat'] =='0') )
				{
					$lcallstat =  $_GET['lcallstat'];
				} else{
				$lcallstat = NULL;
				}
		
				if(!empty($_GET['cdclst']) || ($_GET['cdclst'] =='0') )
				{
					$cdclst =  $_GET['cdclst'];
				} else{
				$cdclst = NULL;
				}
		
			
				$ddispositionclass = $_GET['ddispositionclass'];
				
				$cvr = $_GET['cvr'];


				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' =>$arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $pcomt,

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				'atitle' => $atitle,
				
				'optin' => $optin,
				'optpst' => $optpost,
				'optph' => $optph,
				'opteml' => $opteml,
				'dnd' => $_GET['dnd'],
				

				'aa1' => $_GET['aa1'],
				'aa2' => $_GET['aa2'],
				'aa3' => $_GET['aa3'],
				'aa4' => $_GET['aa4'],
				'aa5' => $_GET['aa5'],
				'aa6' => $_GET['aa6'],
				'aa7' => $_GET['aa7'],
				'aa8' => $_GET['aa8'],
				'aa9' => $_GET['aa9'],
				'aa10' => $_GET['aa10'],
				'aa11' => $_GET['aa11'],
				'aa12' => $_GET['aa12'],

				'lcalldisp' => $lcalldisp, 
				'lcallstat' => $lcallstat, 
				'cvr' => $cvr, 
				'ddispositionclass' => $ddispositionclass, 
				'cdclst' => $cdclst, 

				// tag
				// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
				'cdccomp' => '1', //  if updated in cdc, set to 1
				'cdcsb' => $_GET['cdcsb'], //  if updated in cdc, set to 1
				
				'rlc' => '0', // record is closed
				'ontag' => '0', // record is closed
				'cdcload' => '1', // next level

				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
				'cdcsbagti' => $cdcsbagti, // submit agent name 
				'cdcsbagtii' => $cdcsbagtii, // submit agent name 
				'cdcsbdti' => $cdcsbdti,  // submit date time
				'cdcsbdtii' => $cdcsbdtii  // submit date time
								
				);
			
			//   print_r($datacdcandlead);
			//      exit();
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				// print_r($addcampaigndata);  die;
				

				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$addleadandcdcdata,
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
								
			
		}
		public function ajax_save_updateleaddatacdc()
		{
			$campaign_id = $_GET['campaign_id'];
			$cids = $_GET['campaign_idcids'];
			// $sbsvtag = $_GET['sbsvtag'];
			$lmid = $_GET['lmid'];

			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			// print_r($cids);
			// print_r($sbsvtag);

			// die;
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				if(!empty($_GET['aum']))
				{
					$aum = $_GET['aum'];
				} else{
				$aum = 0 ;
				}
				if(!empty($_GET['arevenue']))
				{
					$arrevenue = $_GET['arevenue'];
				} else{
				$arrevenue = 0 ;
				}
				if(!empty($_GET['phext']))
				{
					$phext = $_GET['phext'];
				} else{
				$phext = 0 ;
				}
			   if(!empty($_GET['sectyp']))
				{
					$sectype = $_GET['sectyp'];
				} else{
				$sectype = 0 ; 
				}  


				if(!empty($_GET['optin']))
				{
					$optin = 1;
				} else{
				    $optin = 0 ;
				}
				if(!empty($_GET['optpst']))
				{
					$optpost = 1;
				} else{
				    $optpost = 0 ;
				}
				if(!empty($_GET['optph']))
				{
					$optph = 1;
				} else{
				    $optph = 0 ;
				}
				if(!empty($_GET['opteml']))
				{
					$opteml = 1;
				} else{
				    $opteml = 0 ;
				}
				if(!empty($_GET['timezone']))
				{
					$timezones = $_GET['timezone'];
				} else{
				    $timezones = 0 ;
				}

				$pcomt= "CDC:".$_SESSION['empcode'].":".$old_date."#".$_GET['pcomt'];

				if(!empty($_POST['lcalldisp'])|| ($_GET['lcalldisp'] =='0'))
				{
					$lcalldisp =  $_GET['lcalldisp'];
				} else{
				$lcalldisp = NULL;
				}
				
				if(!empty($_GET['lcallstat']) || ($_GET['lcallstat'] =='0') )
				{
					$lcallstat =  $_GET['lcallstat'];
				} else{
				$lcallstat = NULL;
				}
		
				if(!empty($_GET['cdclst']) || ($_GET['cdclst'] =='0') )
				{
					$cdclst =  $_GET['cdclst'];
				} else{
				$cdclst = NULL;
				}
		
			
				$ddispositionclass = $_GET['ddispositionclass'];
				
				$cvr = $_GET['cvr'];


				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $timezones,
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $sectype,
				'empsize' => $_GET['empsize'],
				'arevenue' =>$arrevenue,
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $pcomt,

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				
				'optin' => $optin,
				'optpst' => $optpost,
				'optph' => $optph,
				'opteml' => $opteml,
				'dnd' => $_GET['dnd'],

				'lcalldisp' => $lcalldisp, 
				'lcallstat' => $lcallstat, 
				'cvr' => $cvr, 
				'ddispositionclass' => $ddispositionclass, 
				'cdclst' => $cdclst, 
				

				'aa1' => $_GET['aa1'],
				'aa2' => $_GET['aa2'],
				'aa3' => $_GET['aa3'],
				'aa4' => $_GET['aa4'],
				'aa5' => $_GET['aa5'],
				'aa6' => $_GET['aa6'],
				'aa7' => $_GET['aa7'],
				'aa8' => $_GET['aa8'],
				'aa9' => $_GET['aa9'],
				'aa10' => $_GET['aa10'],
				'aa11' => $_GET['aa11'],
				'aa12' => $_GET['aa12'],

				// tag
				// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
				'cdcsv' => '0', //  Submit till 5 times
				'cdccomp' => '1', //  if updated in cdc, set to 1
				'rlc' => '0', // record is closed
				'ontag' => '0', // record is closed

				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
				'cdcsvagti' => $_SESSION['empcode'], // submit agent name 
				'cdcsvdti' => $old_date  // submit date time
								
				);
			
			//   print_r($datacdcandlead);
			//      exit();
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				// print_r($addcampaigndata);  die;
				

				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$addleadandcdcdata,
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
								
			
		}

		public function ajax_save_leaddatacdc()
		{
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
			$cdcsv = $_POST['cdcsv'];
			$cdcrjt = $_POST['cdcrjt'];
			$cdcsb = $_POST['cdcsb'];
			// echo "Hiiiiiiiiiiiiiiiiii";
			// print_r($_POST['checked']);
			// // exit();
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

			// $mychecked = explode(',', $checked);
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}


			if(!empty($_POST['lcalldisp'])|| ($_POST['lcalldisp'] =='0'))
			{
				$lcalldisp =  $_POST['lcalldisp'];
			} else{
			$lcalldisp = NULL;
			}
			
			if(!empty($_POST['lcallstat']) || ($_POST['lcallstat'] =='0') )
			{
				$lcallstat =  $_POST['lcallstat'];
			} else{
			$lcallstat = NULL;
			}

	
			if(!empty($_POST['cdclst']) || ($_POST['cdclst'] =='0') )
			{
				$cdclst =  $_POST['cdclst'];
			} else{
			$cdclst = NULL;
			}
			
			$ddispositionclass = $_POST['ddispositionclass'];
			$cvr = $_POST['cvr'];
			
			$mychecked2 = implode(',', $checked);
			
			if($mychecked2 == "0"){  // Accept
				// $dvload = "1"; // go to next level-- Accept
				$dvstat ="1"; //Data Verification|Tag for On Accept / Reject /Discard
				//  $ontag = "1"; //null = new, 0 = needs to be reworked
				 $cdcrjt = $_POST['cdcrjt'];
				//  $dvagtidi = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
				// $dvragtidi = 0;
				$cdcsb = $_POST['cdcsb']; //Data Verification|Submission Tag

				
				// $dvdti = $old_date; //Data Verification Accept|date and time_I
				// $dvrdti = NULL;

				
			}else{
				// $dvload = "0"; // Reject
				$dvstat ="2";
				$cdcrjt = $_POST['cdcrjt'];
				$cdcsb = $_POST['cdcsb'];
				// $dvragtidi = $_SESSION['empcode'];
				// $dvagtidi = 0;
				// $ontag = "1"; //null = new, 0 = needs to be reworked
				// $dvdti = NULL ;
				// $dvrdti = $old_date; //Data Verification|Rej_date and time_I
			}

			if($cdcsv == 0){
				$cdcsvdti = $old_date;	
				$cdcsvagti = $_SESSION['empcode'];
				}else{
					$cdcsvdti = NULL;
					$cdcsvagti= NULL;
				}
		
				$pcomt= "CDC:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

				$datacdcandlead = array(
				'cdcrjfields' => $mychecked2,
				'pcomt' => $pcomt,
				
				// tag
				// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
				// 'cdcsv' => $cdcsv, //  Submit till 5 times
				'cdcsv' => 0, //  Submit till 5 times
				'cdcsvagti' => $cdcsvagti, 
				'cdcsvdti' => $cdcsvdti, 
				
				'lcalldisp' => $lcalldisp, 
				'lcallstat' => $lcallstat, 
				'cvr' => $cvr, 
				'ddispositionclass' => $ddispositionclass, 
				'cdclst' => $cdclst, 


				'cdcload' => '0', // next level ready to load
				'rlc' => '0', // record is closed
				'cdcrjt' => $cdcrjt, 
				'cdcsb' => $cdcsb, 
				//  'ontag' => $ontag, 
				// 'dvload' => $dvload, //  next level
				// 'dvstat' => $dvstat, //  dvstat
				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
				// 'dvagtidi' => $dvagtidi, // submit agent name 
				// 'dvragtidi' => $dvragtidi, // submit agent name 
				// 'dvdti' => $dvdti,  // submit date time
				// 'dvrdti' => $dvrdti, // Data Verification|Rej_date and time_I


				'dvcomt' => 1, //accept/rejection by cdc
				 'optin' => $_POST['optin'],
				'optpst' => $_POST['optpst'],
				'optph' => $_POST['optph'],
				'opteml' => $_POST['opteml'],
				'dnd' => $_POST['dnd'],
				

				'aa1' => $_POST['aa1'],
				'aa2' => $_POST['aa2'],
				'aa3' => $_POST['aa3'],
				'aa4' => $_POST['aa4'],
				'aa5' => $_POST['aa5'],
				'aa6' => $_POST['aa6'],
				'aa7' => $_POST['aa7'],
				'aa8' => $_POST['aa8'],
				'aa9' => $_POST['aa9'],
				'aa10' => $_POST['aa10'],
				'aa11' => $_POST['aa11'],
				'aa12' => $_POST['aa12']


			
								
				);
			// 	print_r($lmid); echo "Hiii";
			// 	print_r($_POST['cdcsv']); echo "Hiii";
			//   print_r($datacdcandlead);
			 
			    // exit();
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				// print_r($addcampaigndata);  die;
				
				// exit();
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						// "lead_id"=>$addleadandcdcdata,
						"message"=>"Data Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
			
		}



		public function checkemail(){ 
			
			$campaign_id = $_GET['campaign_id'];
			$email = $_GET['email'];
			$inclistnew = $_GET['inclistnew'];
			// get data 
			// $data = $this->Administrator_Model->check_unique_email($email);
			$incemail = $this->Administrator_Model->get_incemail_byCampaign($campaign_id);
			// print_r($incemail);
			if($inclistnew == 1 && !empty($incemail))
			// if($inclistnew == 1)
			{
				$data['inclusionemail'] = $this->Administrator_Model->check_inclusion_email($email,$campaign_id);
				// print_r($data['inclusionemail']); 
				// exit();
			}
			


			// if ($data['inclusionemail'] == true){
				$data['exclusionemail'] = $this->Administrator_Model->check_suppression_email($email,$campaign_id);
				// print_r($data['exclusionemail']);
			// }
			
			
			echo json_encode($data); 
		  }
		public function checkdomain(){ 
			
			$campaign_id = $_GET['campaign_id'];
			$domain = $_GET['domain'];
			$inclistnew = $_GET['inclistnew'];
			// get data 
			// $data = $this->Administrator_Model->check_unique_email($email);

			$data['domainchecksupp'] = $this->Administrator_Model->check_domain_suppression($domain,$campaign_id);
			$incdomain = $this->Administrator_Model->get_incdomain_byCampaign($campaign_id);
			// print_r($incemail);
			if($inclistnew == 1 && !empty($incdomain))
			if($inclistnew == 1)
			{
				$data['domaincheckincl'] = $this->Administrator_Model->check_domain_incl($domain,$campaign_id);
			}
			// print_r($data['domainchecksupp']); die;
			
			echo json_encode($data); 
		  }
		public function checkcompanylist(){ 
			
			$campaign_id = $_GET['campaign_id'];
			$company_name = $_GET['company_name'];
			$inclistnew = $_GET['inclistnew'];
			// get data 
			// $data = $this->Administrator_Model->check_unique_email($email);

			$data['companychecksupp'] = $this->Administrator_Model->check_company_suppression($company_name,$campaign_id);
			$inccomp = $this->Administrator_Model->get_inccomp_byCampaign($campaign_id);
			// print_r($incemail);
			if($inclistnew == 1 && !empty($inccomp))
			
			// if($inclistnew == 1)
			{
				$data['companycheckincl'] = $this->Administrator_Model->check_company_incl($company_name,$campaign_id);
			}
			// print_r($data['domainchecksupp']); die;
			
			echo json_encode($data); 
		  }

		  public function getquestion(){ 
			
			$campaign_id = $_GET['campaign_id'];
			// print_r($_GET['campaign_id']); die;
			// $desiStr = implode(',',$sub_region_id);
			// get data 
			$data = $this->Administrator_Model->getquestions_byCampaign($campaign_id);
			echo json_encode($data); 
		}
		  public function updaterecordlock(){ 
			
			$lmid = $_GET['lmid'];
			$rlc = $_GET['rlc'];
			$emp_id = $_GET['emp_id'];
			
			$datarecord = array(
				'rlc' => $rlc,
				'agent' => $emp_id
			);

			// get data 
			$data = $this->Administrator_Model->update_recordlock($lmid,$datarecord);
			if($data == true){
			
				echo json_encode(array(
					"statusCode"=>"Success",
					"message"=>"record Updated Successfully.."
				));
			}else{
				echo json_encode(array(
					"statusCode"=>"Fail",
					"message"=>"Update failed.."
				));
			}
		}



	}