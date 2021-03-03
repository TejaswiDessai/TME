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
						// if(isset($_SESSION['lmid']) && $_SESSION['lmid'] == $camp['cids']){
						// 	session_abort();
						// 	print_r($_SESSION);
						// }else {
						// 	$_SESSION['lmid'] = $camp['cids'];
						// }
						// $_SESSION['lmid'] = $camp['cids'];
						$cids = $camp['cids'];
						// print_r($data['campaigns']);  
						// print_r($cids);  
						
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaignid($cids);
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

		
			if(isset($_GET['lmid'])){
				$postDatalmid = $_GET['lmid']; 
			}
		

						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						// echo $camp['cnid'];
						$camp_id = $camp['cnid'];
						$cids = $camp['cids'];
						
						$_SESSION['campaign_id'] = $camp_id;
						
			// $data['cids_camp'] = $camp_id;
			// $data['campaign_id'] = $camp_id;
						
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaigniddv($cids);
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
			$data['campaigns'] = $this->Administrator_Model->get_campaign_fordataverification();
			// $data['campaigns'] = $this->Administrator_Model->get_campaignforCDC();		  
			
			
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
			
			$mychecked2 = implode(',', $checked);

			if($mychecked2 == "0"){  // Accept
				$dvload = "1"; // go to next level-- Accept
				$dvstat ="1"; //Data Verification|Tag for On Accept / Reject /Discard
				 $ontag = "1"; //null = new, 0 = needs to be reworked
				 $dvrejtg = $_POST['dvrejtg'];
				 $dvagtidi = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
				$dvragtidi = NULL;
				$dvsbtg = $_POST['dvsbtg']; //Data Verification|Submission Tag

				
				$dvdti = $old_date; //Data Verification Accept|date and time_I
				$dvrdti = NULL;

				
			}else{
				$dvload = "0"; // Reject
				$dvstat ="2";
				$dvrejtg = $_POST['dvrejtg'];
				$dvsbtg = $_POST['dvsbtg'];
				$dvragtidi = $_SESSION['empcode'];
				$dvagtidi = NULL;
				$ontag = "1"; //null = new, 0 = needs to be reworked
				$dvdti = NULL ;
				$dvrdti = $old_date; //Data Verification|Rej_date and time_I
			}


		
				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				'pcomt' => $_POST['pcomt'],
				
				
				// tag
				// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
				'sbsvtag' => $sbsvtag, //  Submit till 5 times
				'pload' => '0', // next level ready to load
				'rlc' => '0', // record is closed
				'dvrejtg' => $dvrejtg, 
				'dvsbtg' => $dvsbtg, 
				 'ontag' => $ontag, 
				'dvload' => $dvload, //  next level
				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
				'dvagtidi' => $dvagtidi, // submit agent name 
				'dvragtidi' => $dvragtidi, // submit agent name 
				'dvdti' => $dvdti,  // submit date time
				'dvrdti' => $dvrdti // Data Verification|Rej_date and time_I
			
								
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
				// 'ontag' => 0, // Submit and 0 = new, 1 = needs to be reworked
				'sbsvtag' => $sbsvtag, //  Submit till 5 times
				'pload' => '1', // next level ready to load
				'rlc' => '0', // record is closed
				'ontag' => '0', // record is closed

				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
				'stagtidi' => $_SESSION['empcode'], // submit agent name 
				'stdti' => $old_date  // submit date time
								
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



		public function checkemail(){ 
			
			$campaign_id = $_GET['campaign_id'];
			$email = $_GET['email'];
			$inclistnew = $_GET['inclistnew'];
			// get data 
			// $data = $this->Administrator_Model->check_unique_email($email);
			if($inclistnew == 1)
			{
				$data['inclusionemail'] = $this->Administrator_Model->check_inclusion_email($email,$campaign_id);
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
			if($inclistnew == 1)
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