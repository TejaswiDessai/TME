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
			$otp_verification = null;
			if($this->session->userdata('token') != '')
			{
				$otp_verification = $this->session->userdata('token');
			}
			$empcode = $this->session->userdata('empcode');
		
			if($otp_verification != "success")
			{
				redirect("administrator/email_login?id=$postData1&empcode=$empcode");
				// echo "<script>alert('Are you sure to generate a one time password that would last only for 1 hour?');location.href = 'http://localhost/TME/send-email-php/email_otp.php?cid=$postData1&empcode=$empcode';</script>";
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
						
						$data['rlccrec'] = $this->Administrator_Model->get_employee_rlc_record($_SESSION['empcode']);
						
						if($data['rlccrec'] >= '3'){
							
							$this->session->set_flashdata('success', 'More than 3 records were locked.');
							redirect('administrator/logout');
							
						}
						
						
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
						
						$data['rlccrec'] = $this->Administrator_Model->get_employee_rlc_record($_SESSION['empcode']);
						
						if($data['rlccrec'] >= '3'){
							
							$this->session->set_flashdata('success', 'More than 3 records were locked.');
							redirect('administrator/logout');
							
						}
						
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaigniddv($cids);
						// print_r($data['leadmaster']); 
						if(empty($data['leadmaster'])){
							$this->session->set_flashdata('success', 'Data verification is finished for this campaign.');
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
		
			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
			
			}

		
			$postDatalmid = NULL;
						if(isset($_GET['lmid']))
							$postDatalmid = $_GET['lmid'];
		

						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
					
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
			
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaign_CDC($cids,$postDatalmid,$camp_id2);
					
						if(empty($data['leadmaster'])){
							$this->session->set_flashdata('success', 'CDC finished for this campaign.');
							redirect('cdc/selectCampaignForCDC');
							
						}
					
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
							
							$data['designation1'] = $this->Administrator_Model->get_designation_byCampaign($camp_id);
							foreach($data['designation1'] as $ds){
								$mydesi = implode(',', $ds);
								}
								$mydesiarry = explode(',', $mydesi);
							$data['designation'] = $this->Administrator_Model->get_designation_ofCampaign($camp_id,$mydesiarry);
							
							$data['joblevel'] = $this->Administrator_Model->get_joblevels_byCampaign($camp_id,$mydesiarry);
					
							$data['timezones'] = $this->Administrator_Model->get_timezonesbyCampaign($camp_id,$myArray1);
							
							$data['currency'] = $this->Administrator_Model->get_currencybyCampaign($camp_id,$myArray1);
							
							$data['comptype'] = $this->Administrator_Model->get_comptype();
							
							$data['assetitle'] = $this->Administrator_Model->get_assetitle_byCampaign($camp_id);
						

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
			
			if($rectype == 2){
		
				$this->load->view('administrator/add-leaddata-cdc', $data);
			
			}else{
			
				$this->load->view('administrator/cdc-form', $data);
				
			}
			
			$this->load->view('administrator/footer');
		
		}
		
		function qualityform($page = 'qa-form'){
			
			$data['title'] = 'Create Lead';
			
			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
			}
		
						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						
						$camp_id = $camp['cnid'];
						
						$cids = $camp['cids'];
					
						
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaignQA($cids);
					
						if(empty($data['leadmaster'])){
							$this->session->set_flashdata('success', 'Quality verification is finished for this campaign.');
							redirect('cdc/selectCampaignForQA');
							
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
						
							redirect('administrator/dashboard');
						}


			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function leadgeneration($page = 'lead-generation'){
			
			$data['title'] = 'Create Lead';
			
			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
			}
		
						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
					
						$camp_id = $camp['cnid'];
						
						$cids = $camp['cids'];

						$postDatalmid = NULL;
						if(isset($_GET['lmid']))
							$postDatalmid = $_GET['lmid'];

						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaign_lead_generation_with_rlc_lock($cids,$postDatalmid);
					
						if(empty($data['leadmaster'])){
							$this->session->set_flashdata('success', 'Lead verification is finished for this campaign.');
							redirect('cdc/selectCampaignForleadGeneration');
							
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
					
							redirect('administrator/dashboard');
						}
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function leadgenerationinterface($page = 'lead-generation-interface'){
			
			$data['title'] = 'Create Lead';
			
			if(isset($_GET['camp_id'])){
				$postData1 = $_GET['camp_id']; 
			}else{
				$postData = $this->input->post();
				$postData1 = $postData['campaign_id'];
			}
						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						
						$camp_id = $camp['cnid'];
						
						$cids = $camp['cids'];
						
						$_SESSION['campaign_id'] = $camp_id;

						$data['empcode'] = $this->session->userdata('empcode');
						$data['Campid'] = $camp_id;
						$leadlimit = $this->input->post('leadlimit');
						$leadrectype = $this->input->post('leadrectype');
						$refreshbtn = $this->input->post('refreshbtn');
						$data['leadlimit'] = $leadlimit;
						$data['leadrectype'] = $leadrectype;
						$data['refreshbtn'] = $refreshbtn;
					
						$data['leadmaster'] = $this->Administrator_Model->get_leadmasterby_campaign_lead_generation($cids,$leadlimit,$leadrectype,$data['empcode']);
						

						if(empty($data['leadmaster'])){
							
						}

						foreach ($data['leadmaster'] as $ldmster) {
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
							
								redirect('administrator/dashboard');
							}
	
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
			$data['campaigns'] = $this->Administrator_Model->get_campaignforCDC();		  
			
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function selectCampaignForQA($page = 'select-campaign-QA'){
			$data['title'] = 'Create Lead';
		
			$data['campaigns'] = $this->Administrator_Model->get_campaignforQA();		  
			
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function selectCampaignForleadGeneration($page = 'select-campaign-lead-generation'){
			$data['title'] = 'Create Lead';
		
			$data['campaigns'] = $this->Administrator_Model->get_campaignforlead_generation();		  
			
			
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
		public function getcampaignwithstatus(){ 
		
			$campaign_status_from = $_GET['campaign_status_from'];
			// $desiStr = implode(',',$levelid);
			// get data 
			$data = $this->Administrator_Model->get_campaign_with_status($campaign_status_from);
			echo json_encode($data); 
		}
		public function getcampaignwithstatusto(){ 
		
			$campaign_status_to = $_GET['campaign_status_to'];
			// $desiStr = implode(',',$levelid);
			// get data 
			$data = $this->Administrator_Model->get_campaign_with_status($campaign_status_to);
			echo json_encode($data); 
		}
		
		public function getsearcresultofindustry(){ 
		

			$output = '';
			$query = '';
		
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

		public function getdccount(){ 
			$empcode = $_SESSION['empcode'];
			$campaign_cids = $_GET['campaign_cids_from'];
			
			// get data 
			// $data = $this->Administrator_Model->getdccount_cleared_of_campaign_from($campaign_cids);
			$data = $this->Administrator_Model->get_dc_cleared($campaign_cids);
			$cleareddatata = count($data);


			$datapending = $this->Administrator_Model->get_dc_pending($campaign_cids);
			$pendingdata = count($datapending);

			$datasaved = $this->Administrator_Model->get_dc_saved($campaign_cids);
			$saveddata = count($datasaved);
			
			// echo json_encode($cleareddatata); 
			
		
			echo json_encode(array(
				"statusCode"=>"Success",
				"cleareddata"=>$cleareddatata,
				"pendingdata"=>$pendingdata,
				"saveddata"=>$saveddata,
				"message"=>"Lead Added Successfully.."
			));
		
			}
		public function getdvcount(){ 
			$empcode = $_SESSION['empcode'];
			$campaign_cids = $_GET['campaign_cids_from'];
		
			$data = $this->Administrator_Model->get_dv_cleared($campaign_cids);
			$cleareddatata = count($data);


			$datapending = $this->Administrator_Model->get_dc_cleared($campaign_cids); // dc cleared are dv pending
			$pendingdata = count($datapending);

			$datasaved = $this->Administrator_Model->get_dc_saved($campaign_cids);
			$saveddata = count($datasaved);

			$datarejected = $this->Administrator_Model->get_dv_rejected($campaign_cids);
			$rejecteddata = count($datarejected);
			
				echo json_encode(array(
					"statusCode"=>"Success",
					"cleareddata"=>$cleareddatata,
					"pendingdata"=>$pendingdata,
					"saveddata"=>$saveddata,
					"rejecteddata"=>$rejecteddata,
					"message"=>"Lead Added Successfully.."
				));
		
			}
		public function getevcount(){ 
			$empcode = $_SESSION['empcode'];
			$campaign_cids = $_GET['campaign_cids_from'];
		
			$data = $this->Administrator_Model->get_ev_cleared($campaign_cids);
			$cleareddatata = count($data);


			$datapending = $this->Administrator_Model->get_dv_cleared($campaign_cids); // dv cleared are ev pending
			$pendingdata = count($datapending);

			$datarejected = $this->Administrator_Model->get_ev_rejected($campaign_cids);
			$rejecteddata = count($datarejected);
			
			
				echo json_encode(array(
					"statusCode"=>"Success",
					"cleareddata"=>$cleareddatata,
					"pendingdata"=>$pendingdata,
					"datarejected"=>$rejecteddata,
					"message"=>"Lead Added Successfully.."
				));
		
			}
		public function getcdccount(){ 
			$empcode = $_SESSION['empcode'];
			$campaign_cids = $_GET['campaign_cids_from'];
		
			$data = $this->Administrator_Model->get_cdc_cleared($campaign_cids);
			$cleareddatata = count($data);


			$datapending = $this->Administrator_Model->get_ev_cleared($campaign_cids); // ev cleared are cdc pending
			$pendingdata = count($datapending);

			$datasaved = $this->Administrator_Model->get_cdc_saved($campaign_cids);
			$saveddata = count($datasaved);

			$datarejected = $this->Administrator_Model->get_cdc_rejected($campaign_cids);
			$rejecteddata = count($datarejected);
			
			
				echo json_encode(array(
					"statusCode"=>"Success",
					"cleareddata"=>$cleareddatata,
					"pendingdata"=>$pendingdata,
					"saveddata"=>$saveddata,
					"rejecteddata"=>$rejecteddata,
					"message"=>"Lead Added Successfully.."
				));
		
			}
		public function getasiscount(){ 
			$empcode = $_SESSION['empcode'];
			$campaign_cids = $_GET['campaign_cids_from'];
		
			$data = $this->Administrator_Model->get_asis_count($campaign_cids);
			$asisdata = count($data);


			// $datapending = $this->Administrator_Model->get_ev_cleared($campaign_cids); // ev cleared are cdc pending
			// $pendingdata = count($datapending);

			// $datasaved = $this->Administrator_Model->get_cdc_saved($campaign_cids);
			// $saveddata = count($datasaved);

			// $datarejected = $this->Administrator_Model->get_cdc_rejected($campaign_cids);
			// $rejecteddata = count($datarejected);
			
			
				echo json_encode(array(
					"statusCode"=>"Success",
					"asisdata"=>$asisdata,
					// "pendingdata"=>$pendingdata,
					// "saveddata"=>$saveddata,
					// "rejecteddata"=>$rejecteddata,
					"message"=>"Lead Added Successfully.."
				));
		
			}
	
		public function ajax_add_new_leadandcdc()
		{
			$campaign_id = $_GET['campaign_id'];
			$cids = $_GET['campaign_idcids'];
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
				
				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				

				
				// tag
				'pload' => '1', // next level ready to load
				'rlc' => '0', // No next level ready to load- save means here
				'dvload' => '0', // record is closed
				'ontag' => '0', 
				'dvsbtg' => '0', // record is closed
				'dvrejtg' => '0', // record is closed
				'sbsvtag' => '1', 

				'stagtidi' => $_SESSION['empcode'], // submit agent name
				'stdti' => $old_date  // submit date time
								
				);
			
			
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
		public function ajax_save_leadandcdc()
		{
			$campaign_id = $_GET['campaign_id'];
		
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
				
				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' =>$aum,
				
				// tag
				'pload' => '0', // No next level ready to load- save means here
				'rlc' => '0', // No next level ready to load- save means here
				'sbsvtag' => '0', 
				'dvload' => '0', // record is closed
				'ontag' => '0', 
				'dvsbtg' => '0', // record is closed
				'dvrejtg' => '0', // record is closed
				

				'svagtidi' => $_SESSION['empcode'], // save Agent Name
				'svdti' => $old_date // save date time
				
								
				);
			
			
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
			
				// Concatenation Of String 
				$trimfname=$_GET['fname'];
				$trimlname=$_GET['lname'];

				$first =substr($trimfname, 0, 4);  // abcd
				$last = substr($trimlname, 0, 4);
				$conname = $first.$last; 


				$old_date = date('Y-m-d H:i:s');            // works
			
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
					if(!empty($_GET['callrec']) || ($_GET['callrec'] =='0') )
					{
						$callrec =  $_GET['callrec'];
					} else{
					$callrec = NULL;
					}
					if(!empty($_GET['ddispositionclass']) || ($_GET['ddispositionclass'] =='0') )
					{
						$ddispositionclass =  $_GET['ddispositionclass'];
					} else{
					$ddispositionclass = NULL;
					}
				
					
					$cvr = $_GET['cvr'];
					$pcomt= "CDQA:".$_SESSION['empcode'].":".$old_date."#".$_GET['pcomt'];

				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				

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
				'pcomt' => $pcomt,

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
				
				'lcalldisp' => $lcalldisp, 
				'lcallstat' => $lcallstat, 
				'cvr' => $cvr, 
				'ddispositionclass' => $ddispositionclass, 
				'cdclst' => $cdclst, 
				'callrec' => $callrec, 
				
				
				// tag
				'pload' => '1', // next level ready to load
				'rlc' => '0', // No next level ready to load- save means here
				'sbsvtag' => '1', 
				'dvload' => '0', // record is closed
				'ontag' => '0', 
				'dvsbtg' => '0', // record is closed
				'dvrejtg' => '0', // record is closed

				'cdcload' => '1', // submit to next level
				'cdcsb' => '1', // submit to next level
				'cdcrjt' => '0', // submit to next level

				

				'cdcsbagti' => $_SESSION['empcode'], // save Agent Name
				'cdcsbdti' => $old_date // save date time
							
				);
			
				
				$checkforEmail = $this->Administrator_Model->get_email_duplication_count_leadmaster($_GET['email']);
				if($checkforEmail == true)
				{
					echo json_encode(array(
						"statusCode"=>"Exist",
					
						"message"=>"Email is already Exist"
					));
					return;
				}
				$checkforplink = $this->Administrator_Model->get_plink_duplication_count_leadmaster($_GET['plink']);
				
				if($checkforplink == true)
				{
					echo json_encode(array(
						"statusCode"=>"plink",
						
						"message"=>"Prospect link is already Exist"
					));
					return;
				}
				
				
				
				$updateleadandcdcdata = $this->Administrator_Model->add_leadandcdcbyCDQA($datacdcandlead);
				

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
				'cdcsv' => '0', // Save only
				'rlc' => '0', // No next level ready to load- save means here
				'sbsvtag' => '0', 
				'dvrejtg' => '0', 

				'cdcsvagti' => $_SESSION['empcode'], // save Agent Name
				'cdcsvdti' => $old_date // save date time
								
				);
			
			
			
				$updateleadandcdcdata = $this->Administrator_Model->add_leadandcdcbyCDQA($datacdcandlead);
				
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
				
				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $aum,
				// tag
				
				'sbsvtag' => '1', // Submit 1st time
				'pload' => '1', // next level ready to load
				'rlc' => '0', // record is closed
				'dvload' => '0', // record is closed
				'ontag' => '0', 
				'dvsbtg' => '0', // record is closed
				'dvrejtg' => '0', // record is closed
			
				'stagtidi' => $_SESSION['empcode'], // submit agent name 
				'stdti' => $old_date  // submit date time
								
				);
			
			
				$checkforEmail = $this->Administrator_Model->get_email_duplication_count_leadmaster($_GET['email']);
				if($checkforEmail == true)
				{
					echo json_encode(array(
						"statusCode"=>"Exist",
						"message"=>"Email is already Exist"
					));
					return;
				}
				$checkforplink = $this->Administrator_Model->get_plink_duplication_count_leadmaster($_GET['plink']);
				
				if($checkforplink == true)
				{
					echo json_encode(array(
						"statusCode"=>"plink",
						"message"=>"Prospect link is already Exist"
					));
					return;
				}
				
				$addleadandcdcdata = $this->Administrator_Model->add_leaddata($datacdcandlead);
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$addleadandcdcdata,
						"message"=>"Lead Added Successfully.."
					));
				}else {
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

				$pcomt = "DC:".$_SESSION['empcode'].":".$old_date."#".$_GET['pcomt'];
				

				$checkforEmail = $this->Administrator_Model->get_email_duplication_count_leadmaster_update($_GET['email'],$lmid);
				if($checkforEmail == true)
				{
					
							$randno = rand(10,1000);
							$email = $_GET['email'].$randno."del";
						
				}
				else{
					$email = $_GET['email'];
				}
				$checkforplink = $this->Administrator_Model->get_plink_duplication_count_leadmaster_update($_GET['plink'],$lmid);
				
				if($checkforplink == true)
				{
	
					$randnop = rand(10,1000);
					$plink = $_GET['plink'].$randnop."del";
					
				}
				else{
					$plink = $_GET['plink'];
				}
	


				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				
				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $email,
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $plink,
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
				// tag
				'ontag' => '0', // Submit and 0 = new
				'sbsvtag' => '0', // Save
				'rlc' => '0', // Save
				'pload' => '0', // next level ready to load

				'svagtidi' => $_SESSION['empcode'], // save Agent Name
				'svdti' => $old_date // save date time
			
								
				);
			
			
			if($lmid > 1){
		
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			}else{ //new save

				$addleadandcdcdata = $this->Administrator_Model->save_leaddata($datacdcandlead);
			}
				
			
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
			$dvrejectreason = $_POST['dvrejectreason'];
			$sbsvtag = $_POST['sbsvtag'];
			$dvrejtg = $_POST['dvrejtg'];
			$dvsbtg = $_POST['dvsbtg'];

			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}
			if(!empty($_POST['dvrejectreason']))
				{
					$dvrejectreason =  $_POST['dvrejectreason'];
				} else{
				$dvrejectreason = NULL;
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
			
				if($mychecked2 == "0"){  // Accept
					$dvload = "1"; // go to next level-- Accept
					$dvstat ="1"; //Data Verification|Tag for On Accept / Reject /Discard
					 $ontag = "1"; //null = new, 0 = needs to be reworked
					 $dvrejtg = $_POST['dvrejtg'];
					 $dvsbtg = $_POST['dvsbtg']; //Data Verification|Submission Tag
					 $mychecked2 = $_POST['dvrejectreason']; //Data Verification|Submission Tag
					
					
					if(empty($_POST['dvdti'])){
					$dvagtidi = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
					$dvragtidii = $postagent2;
					$dvdti = $old_date; //Data Verification Accept|date and time_I
					$dvrdtii = $postdate2;
					$dvragtidi = $postagent1;
					$dvrdti = $postdate1;
					$dvagtidii = $postagentaccept1;
					$dvdtii = $postdateaccept1;
					}else{
					$dvagtidii = $_SESSION['empcode']; //Data Verification Accept|Agent ID_I
					$dvragtidii = $postagent2;
					$dvdtii = $old_date; //Data Verification Accept|date and time_I
					$dvrdtii = $postdate2;
					$dvragtidi = $postagent1;
					$dvrdti = $postdate1;
					$dvagtidi = $postagentaccept1;
					$dvdti = $postdateaccept1;
					}

					
				}else{
					$dvload = "0"; // Reject
					$dvstat ="2";
					$dvrejtg = $_POST['dvrejtg'];
					$dvsbtg = $_POST['dvsbtg'];
					$ontag = "1"; //null = new, 0 = needs to be reworked

					
					if(empty($_POST['dvrdti'])){
					$dvragtidi = $_SESSION['empcode'];
					$dvagtidii = $postagentaccept2;
					$dvdtii = $postdateaccept2;
					$dvrdti = $old_date; //Data Verification|Rej_date and time_I
					$dvragtidii = $postagent1;
					$dvrdtii = $postdate1;
					$dvagtidi = $postagentaccept1;
					$dvdti = $postdateaccept1;
					}else{
					$dvragtidii = $_SESSION['empcode'];
					$dvagtidii = $postagentaccept2;
					$dvdtii = $postdateaccept2;
					$dvrdtii = $old_date; //Data Verification|Rej_date and time_I
					$dvragtidi = $postagent1;
					$dvrdti = $postdate1;
					$dvagtidi = $postagentaccept1;
					$dvdti = $postdateaccept1;
					}

				}
					if($sbsvtag == 0){
					$svdti = $old_date;	
					$svagtidi = $_SESSION['empcode'];
					
					}else{
						$svdti = NULL;
						$svagtidi= NULL;
					}
					
					$pcomt= "DV:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					$datacdcandlead = array(
						'dvrejectreason' => $mychecked2,
						'pcomt' => $pcomt,
						
						
						// tag
						
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
						
						'dvagtidi' => $dvagtidi, // submit agent name 
						'dvragtidi' => $dvragtidi, // submit agent name 
						'dvdti' => $dvdti,  // submit date time
						'dvrdti' => $dvrdti, // Data Verification|Rej_date and time_I

						'dvagtidii' => $dvagtidii, // submit agent name 
						'dvragtidii' => $dvragtidii, // submit agent name 
						'dvdtii' => $dvdtii,  // submit date time
						'dvrdtii' => $dvrdtii // Data Verification|Rej_date and time_I
					
										
					);
			
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",					
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
		
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		

			if(!empty($_POST['cdcsv']))
			{
				$cdcsv =  $_POST['cdcsv'];
			} else{
			$cdcsv = NULL;
			}
		
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
			if(!empty($_POST['callrec']) || ($_POST['callrec'] =='0') )
			{
				$callrec =  $_POST['callrec'];
			} else{
			$callrec = NULL;
			}

			if(!empty($_POST['ddispositionclass']) || ($_POST['ddispositionclass'] =='0') )
			{
				$ddispositionclass =  $_POST['ddispositionclass'];
			} else{
			$ddispositionclass = NULL;
			}
			
				$cvr = $_POST['cvr'];
			

			$mychecked2 = implode(',', $checked);
			
		

				if($mychecked2 == "0"){  // Accept
					$cdcload = "1"; // go to next level-- Accept
					$mychecked2 = $_POST['dvrejectreason']; //Data Verification|Submission Tag
					 $ontag = "1"; //null = new, 0 = needs to be reworked
					 $cdcrjt = $_POST['cdcrjt'];
					 $cdcsb = $_POST['cdcsb']; //Data Verification|Submission Tag
				
					if(empty($_POST['cdcsbdti'])){
						$cdcsbagti = $_SESSION['empcode']; // Accept|Agent ID_I
						$cdcrjtagtii = $postagent2;
						$cdcsbdti = $old_date; // Accept|date and time_I
						$cdcrjtdtii = $postdate2;
						$cdcrjtagti = $postagent1;
						$cdcrjtdti = $postdate1;
						$cdcsbagtii = $postagentaccept1;
						$cdcsbdtii = $postdateaccept1;
					 }else{
						$cdcsbagtii = $_SESSION['empcode']; // Accept|Agent ID_I
						$cdcrjtagtii = $postagent2;
						$cdcsbdtii = $old_date; // Accept|date and time_I
						$cdcrjtdtii = $postdate2;
						$cdcrjtagti = $postagent1;
						$cdcrjtdti = $postdate1;
						$cdcsbagti = $postagentaccept1;
						$cdcsbdti = $postdateaccept1; 
					 }
					$evload = $evloadposted;
				
					
				}else{
				
					$cdcload = NULL; // Reject
				
					$cdcrjt = $_POST['cdcrjt'];
					$cdcsb = $_POST['cdcsb'];
					$ontag = "1"; //null = new, 0 = needs to be reworked

				
					if(empty($_POST['cdcrjtdti'])){
					$cdcrjtagti = $_SESSION['empcode'];
					$cdcsbagtii = $postagentaccept2;
					$cdcsbdtii = $postdateaccept2;
					$cdcrjtdti = $old_date; //|Rej_date and time_I
					$cdcrjtagtii = $postagent1;
					$cdcrjtdtii = $postdate1;
					$cdcsbagti = $postagentaccept1;
					$cdcsbdti = $postdateaccept1;
					}else{
						$cdcrjtagtii = $_SESSION['empcode'];
						$cdcsbagtii = $postagentaccept2;
						$cdcsbdtii = $postdateaccept2;
						$cdcrjtdtii = $old_date; //|Rej_date and time_I
						$cdcrjtagti = $postagent1;
						$cdcrjtdti = $postdate1;
						$cdcsbagti = $postagentaccept1;
						$cdcsbdti = $postdateaccept1;	
					}

					$evload = NULL;
	
				}


					if($cdcsv == '0'){
					$cdcsvdti = $old_date;	
					$cdcsvagti = $_SESSION['empcode'];
					}else{
						$cdcsvdti = NULL;
						$cdcsvagti= NULL;
					}
					
					$pcomt= "CDC:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					

				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				
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
				'callrec' => $callrec, 
			
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
			
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Data Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}
		public function ajax_update_qatodc()
		{
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			if(!empty($_POST['qarjtagti']))
			{
				$postagent1 =  $_POST['qarjtagti'];
			} else{
			$postagent1 = NULL;
			}
			if(!empty($_POST['qarjtdti']))
			{
				$postdate1 =  $_POST['qarjtdti'];
			} else{
			$postdate1 = NULL;
			}

			if(!empty($_POST['qarjtagtii']))
			{
				$postagent2 =  $_POST['qarjtagtii'];
			} else{
			$postagent2 = NULL;
			}
			if(!empty($_POST['qarjtdtii']))
			{
				$postdate2 =  $_POST['qarjtdtii'];
			} else{
			$postdate2 = NULL;
			}

			$mychecked2 = implode(',', $checked);
			
				if($mychecked2 == "0"){  // Accept
				
					exit();
				}else{				

					if(empty($_POST['qarjtdti'])){
					$qarjtagti = $_SESSION['empcode'];
					$qarjtdti = $old_date; //Data Verification|Rej_date and time_I
					$qarjtagtii = $postagent1;
					$qarjtdtii = $postdate1;
					
					}else{
					$qarjtagtii = $_SESSION['empcode'];
					
					$qarjtdtii = $old_date; //Data Verification|Rej_date and time_I
					$qarjtagti = $postagent1;
					$qarjtdti = $postdate1;
					
					}

				}
					$pcomt= "QA:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					
				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				// tag
				
				'rlc' => '0', // record is closed
				
				'ontag' => '1', 
				'pload' => '0', 
				'dvload' => '0', 
				'cdcload' => NULL, 
				'evload' => NULL, //  next level
				'qarjtagti' => $qarjtagti, // submit agent name 
				'qarjtdti' => $qarjtdti, // Data Verification|Rej_date and time_I
				'qarjtagtii' => $qarjtagtii, // submit agent name 
				'qarjtdtii' => $qarjtdtii, // Data Verification|Rej_date and time_I
				'qastat' => 'pending', //accept/rejection by cdc
				'qadcrej' => '1', //qa data rejection
				'qarej' => '1', //qa data rejection
				'pcomt' => $pcomt 
				
								
				);
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Quality Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}

		public function ajax_update_qatoCDC()
		{
			
			
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
		
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			if(!empty($_POST['qarjtagti']))
			{
				$postagent1 =  $_POST['qarjtagti'];
			} else{
			$postagent1 = NULL;
			}
			if(!empty($_POST['qarjtdti']))
			{
				$postdate1 =  $_POST['qarjtdti'];
			} else{
			$postdate1 = NULL;
			}

			if(!empty($_POST['qarjtagtii']))
			{
				$postagent2 =  $_POST['qarjtagtii'];
			} else{
			$postagent2 = NULL;
			}
			if(!empty($_POST['qarjtdtii']))
			{
				$postdate2 =  $_POST['qarjtdtii'];
			} else{
			$postdate2 = NULL;
			}

			$mychecked2 = implode(',', $checked);
			

				if($mychecked2 == "0"){  // Accept
				
					exit();
				}else{				

					if(empty($_POST['qarjtdti'])){
					$qarjtagti = $_SESSION['empcode'];
					$qarjtdti = $old_date; //Data Verification|Rej_date and time_I
					$qarjtagtii = $postagent1;
					$qarjtdtii = $postdate1;
					
					}else{
					$qarjtagtii = $_SESSION['empcode'];
					
					$qarjtdtii = $old_date; //Data Verification|Rej_date and time_I
					$qarjtagti = $postagent1;
					$qarjtdti = $postdate1;
					
					}

				}
					$pcomt= "QA:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					
				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				// tag
				
				'rlc' => '0', // record is closed
			
				'cdcload' => NULL, //  next level
				'evload' => '1', //  next level
				'qarjtagti' => $qarjtagti, // submit agent name 
				'qarjtdti' => $qarjtdti, // Data Verification|Rej_date and time_I
				'qarjtagtii' => $qarjtagtii, // submit agent name 
				'qarjtdtii' => $qarjtdtii, // Data Verification|Rej_date and time_I
				'qastat' => 'pending', //accept/rejection by cdc
				'qacdcrej' => '1', //qa cdata rejection
				'qarej' => '1', //qa data rejection
				'pcomt' => $pcomt 
				
								
				);
			
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						// "lead_id"=>$addleadandcdcdata,
						"message"=>"Quality Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}

		public function ajax_update_qatorej_disq()
		{
			
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
			
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			if(!empty($_POST['qarjtagti']))
			{
				$postagent1 =  $_POST['qarjtagti'];
			} else{
			$postagent1 = NULL;
			}
			if(!empty($_POST['qarjtdti']))
			{
				$postdate1 =  $_POST['qarjtdti'];
			} else{
			$postdate1 = NULL;
			}

			if(!empty($_POST['qarjtagtii']))
			{
				$postagent2 =  $_POST['qarjtagtii'];
			} else{
			$postagent2 = NULL;
			}
			if(!empty($_POST['qarjtdtii']))
			{
				$postdate2 =  $_POST['qarjtdtii'];
			} else{
			$postdate2 = NULL;
			}

			$mychecked2 = implode(',', $checked);
			
				if($mychecked2 == "0"){  // Accept
				
					exit();
				}else{				

					if(empty($_POST['qarjtdti'])){
					$qarjtagti = $_SESSION['empcode'];
					$qarjtdti = $old_date; //Data Verification|Rej_date and time_I
					$qarjtagtii = $postagent1;
					$qarjtdtii = $postdate1;
					
					}else{
					$qarjtagtii = $_SESSION['empcode'];
					
					$qarjtdtii = $old_date; //Data Verification|Rej_date and time_I
					$qarjtagti = $postagent1;
					$qarjtdti = $postdate1;
					
					}

				}
				$qasvdti = $old_date;	
				$qasvagti = $_SESSION['empcode'];
					$pcomt= "QA:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					
				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				// tag
				
				'rlc' => '0', // record is closed
				
				'cdcload' =>NULL, //  next level
				'evload' => '1', //  next level
				'qarjtagti' => $qarjtagti, // submit agent name 
				'qarjtdti' => $qarjtdti, // Data Verification|Rej_date and time_I
				'qarjtagtii' => $qarjtagtii, // submit agent name 
				'qarjtdtii' => $qarjtdtii, // Data Verification|Rej_date and time_I
				'qastat' => 'disqualified', //accept/rejection by cdc
				'qasv' => 0,
				'qasvagti' => $qasvagti, 
				'qasvdti' => $qasvdti,
				'qarej' => '1',
				
				'pcomt' => $pcomt 
				
								
				);
			
			    // exit();
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Quality Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}

		public function ajax_update_qatoacc_disq()
		{
		
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
			
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			if(!empty($_POST['qaacptagti']))
			{
				$postagent1 =  $_POST['qaacptagti'];
			} else{
			$postagent1 = NULL;
			}
			if(!empty($_POST['qaacptdti']))
			{
				$postdate1 =  $_POST['qaacptdti'];
			} else{
			$postdate1 = NULL;
			}

			if(!empty($_POST['qaacptagtii']))
			{
				$postagent2 =  $_POST['qaacptagtii'];
			} else{
			$postagent2 = NULL;
			}
			if(!empty($_POST['qaacptdtii']))
			{
				$postdate2 =  $_POST['qaacptdtii'];
			} else{
			$postdate2 = NULL;
			}

			$mychecked2 = implode(',', $checked);
			
				if($mychecked2 == "0"){  // Accept
					
					if(empty($_POST['qaacptdti'])){
						$qaacptagti = $_SESSION['empcode'];
						$qaacptdti = $old_date; //Data Verification|Rej_date and time_I
						$qaacptagtii = $postagent1;
						$qaacptdtii = $postdate1;
						
						}else{
						$qaacptagtii = $_SESSION['empcode'];
						
						$qaacptdtii = $old_date; //Data Verification|Rej_date and time_I
						$qaacptagti = $postagent1;
						$qaacptdti = $postdate1;
						
						}
				
				}else{				

					exit();
				
				}
				$qasvdti = $old_date;	
				$qasvagti = $_SESSION['empcode'];
					$pcomt= "QA:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					
				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				// tag
				
				'rlc' => '0', // record is closed
				'cdcload' => NULL, //  next level
				'evload' => '1', //  next level
				'qaacptagti' => $qaacptagti, // submit agent name 
				'qaacptdti' => $qaacptdti, // Data Verification|Rej_date and time_I
				'qaacptagtii' => $qaacptagtii, // submit agent name 
				'qaacptdtii' => $qaacptdtii, // Data Verification|Rej_date and time_I
				'qastat' => 'disqualified', //accept/rejection by cdc
				'qasv' => 0,
				'qasvagti' => $qasvagti, 
				'qasvdti' => $qasvdti,
				'qaacpt' => '1',
				
				'pcomt' => $pcomt 
				
								
				);
			
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Quality Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}

		public function ajax_update_qatoacc_q()
		{
		
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
		
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			if(!empty($_POST['qaacptagti']))
			{
				$postagent1 =  $_POST['qaacptagti'];
			} else{
			$postagent1 = NULL;
			}
			if(!empty($_POST['qaacptdti']))
			{
				$postdate1 =  $_POST['qaacptdti'];
			} else{
			$postdate1 = NULL;
			}

			if(!empty($_POST['qaacptagtii']))
			{
				$postagent2 =  $_POST['qaacptagtii'];
			} else{
			$postagent2 = NULL;
			}
			if(!empty($_POST['qaacptdtii']))
			{
				$postdate2 =  $_POST['qaacptdtii'];
			} else{
			$postdate2 = NULL;
			}

			$mychecked2 = implode(',', $checked);
			

				if($mychecked2 == "0"){  // Accept
					
					if(empty($_POST['qaacptdti'])){
						$qaacptagti = $_SESSION['empcode'];
						$qaacptdti = $old_date; //Data Verification|Rej_date and time_I
						$qaacptagtii = $postagent1;
						$qaacptdtii = $postdate1;
						
						}else{
						$qaacptagtii = $_SESSION['empcode'];
						
						$qaacptdtii = $old_date; //Data Verification|Rej_date and time_I
						$qaacptagti = $postagent1;
						$qaacptdti = $postdate1;
						
						}
				
				}else{				

					exit();
				

				}
			
					$pcomt= "QA:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					
				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				// tag
				
				'rlc' => '0', // record is closed
				
				'cdcload' => NULL, //  next level
				'evload' => '1', //  next level
				'qaacptagti' => $qaacptagti, // submit agent name 
				'qaacptdti' => $qaacptdti, // Data Verification|Rej_date and time_I
				'qaacptagtii' => $qaacptagtii, // submit agent name 
				'qaacptdtii' => $qaacptdtii, // Data Verification|Rej_date and time_I
				'qastat' => 'qualified', //accept/rejection by cdc
				
				'qaacpt' => '1',
				'qaload' => '1',
				
				'pcomt' => $pcomt 
				
								
				);
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Quality Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}

		public function ajax_update_qatoacc_lead()
		{
			
			
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
			$checked = $_POST['checked'];
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			if(!empty($_POST['qaacptagti']))
			{
				$postagent1 =  $_POST['qaacptagti'];
			} else{
			$postagent1 = NULL;
			}
			if(!empty($_POST['qaacptdti']))
			{
				$postdate1 =  $_POST['qaacptdti'];
			} else{
			$postdate1 = NULL;
			}

			if(!empty($_POST['qaacptagtii']))
			{
				$postagent2 =  $_POST['qaacptagtii'];
			} else{
			$postagent2 = NULL;
			}
			if(!empty($_POST['qaacptdtii']))
			{
				$postdate2 =  $_POST['qaacptdtii'];
			} else{
			$postdate2 = NULL;
			}

			$mychecked2 = implode(',', $checked);
			
				if($mychecked2 == "0"){  // Accept
					
					if(empty($_POST['qaacptdti'])){
						$qaacptagti = $_SESSION['empcode'];
						$qaacptdti = $old_date; //Data Verification|Rej_date and time_I
						$qaacptagtii = $postagent1;
						$qaacptdtii = $postdate1;
						
						}else{
						$qaacptagtii = $_SESSION['empcode'];
						
						$qaacptdtii = $old_date; //Data Verification|Rej_date and time_I
						$qaacptagti = $postagent1;
						$qaacptdti = $postdate1;
						
						}
				
				}else{				

					exit();
				

				}
			
					$pcomt= "QA:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

					
				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				'cdcrjfields' => '1', //accept to to lead
				// tag
				
				'rlc' => '0', // record is closed
				'cdcload' => NULL, //  next level
				'evload' => '1', //  next level
				'qaacptagti' => $qaacptagti, // submit agent name 
				'qaacptdti' => $qaacptdti, // Data Verification|Rej_date and time_I
				'qaacptagtii' => $qaacptagtii, // submit agent name 
				'qaacptdtii' => $qaacptdtii, // Data Verification|Rej_date and time_I
				'qastat' => 'pending', //accept/rejection by cdc
				
				'qaacpt' => '1',
				'qalsload' => '1', //send to lead generation
				
				'pcomt' => $pcomt 
				
								
				);
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Quality Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
								
			
		}
		public function ajax_update_leadgeneration()
		{
			
			$campaign_id = $_GET['campaign_id'];
			$cids = $_GET['campaign_idcids'];
			
			$lmid = $_GET['lmid'];
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}


			if(!empty($_GET['clscored']) || ($_GET['clscored'] =='0') )
			{
				$clscored =  $_GET['clscored'];
			} else{
			$clscored = NULL;
			}
			if(!empty($_GET['callrec']) || ($_GET['callrec'] =='0') )
			{
				$callrec =  $_GET['callrec'];
			} else{
			$callrec = NULL;
			}
			if(!empty($_GET['lstat']) || ($_GET['lstat'] =='0') )
			{
				$lstat =  $_GET['lstat'];
			} else{
			$lstat = NULL;
			}
			if(!empty($_GET['lsfinal']) || ($_GET['lsfinal'] =='0') )
			{
				$lsfinal =  $_GET['lsfinal'];
			} else{
			$lsfinal = NULL;
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
			
			$pcomt= "lead:".$_SESSION['empcode'].":".$old_date."#".$_GET['pcomt'];

			
			if($lsfinal == '1')
			{
				$qalsload = NULL;
			}else{
				$qalsload ='1';
			}
					
				$datacdcandlead = array(
				'rlc' => '0', // record is closed
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

				'clscored' => $clscored, 
				'callrec' => $callrec, 
				'lstat' => $lstat, 
				'lsfinal' => $lsfinal, 

				'lsload' => '1', //  next level
				'cdcload' => '1', //  next level
				'lsagti' =>  $_SESSION['empcode'], // submit agent name 
				'lsdti' => $old_date, // lead generation date time
				 'qalsload' => $qalsload,
				'lsstatdt' => $old_date,
				'lsagent' => $_SESSION['empcode'], // submit agent name 
				
				'pcomt' => $pcomt 
								
				);
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);

				$data['rlcremove'] = $this->Administrator_Model->update_recordlockonlogin($_SESSION['empcode']);
				
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Verified Successfully.."
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

				if(!empty($_GET['dvsbtg']))
				{
					$dvsbtg = $_GET['dvsbtg'];
				} else{
				$dvsbtg = 0 ;
				}
				if(!empty($_GET['dvrejtg']))
				{
					$dvrejtg = $_GET['dvrejtg'];
				} else{
				$dvrejtg = 0 ;
				}


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

				
				$pcomt= "DC:".$_SESSION['empcode'].":".$old_date."#".$_GET['pcomt'];

				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
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
				'dvsbtg' => $dvsbtg,
				'dvrejtg' => $dvrejtg,
				
				// tag
			
				'sbsvtag' => $sbsvtag, //  Submit till 5 times
				'pload' => '1', // next level ready to load
				'rlc' => '0', // record is closed
				'ontag' => '0', // record is closed

				'stagtidi' => $stagtidi,
				'stagtidii' => $stagtidii, // submit agent name 

				'stdti' => $stdti,
				'stdtii' => $stdtii
				
				);
			
		
			$checkforEmail = $this->Administrator_Model->get_email_duplication_count_leadmaster_update($_GET['email'],$lmid);
			if($checkforEmail == true)
			{
				echo json_encode(array(
					"statusCode"=>"Exist",					
					"message"=>"Email is already Exist"
				));
				return;
			}
			$checkforplink = $this->Administrator_Model->get_plink_duplication_count_leadmaster_update($_GET['plink'],$lmid);
			
			if($checkforplink == true)
			{
				echo json_encode(array(
					"statusCode"=>"plink",					
					"message"=>"Prospect link is already Exist"
				));
				return;
			}

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			

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
				if(!empty($_GET['callrec']) || ($_GET['callrec'] =='0') )
				{
					$callrec =  $_GET['callrec'];
				} else{
				$callrec = NULL;
				}
				if(!empty($_GET['ddispositionclass']) || ($_GET['ddispositionclass'] =='0') )
				{
					$ddispositionclass =  $_GET['ddispositionclass'];
				} else{
				$ddispositionclass = NULL;
				}
				
				$cvr = $_GET['cvr'];


				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				
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
				'callrec' => $callrec, 

				// tag
				
				'cdccomp' => '1', //  if updated in cdc, set to 1
				'cdcsb' => $_GET['cdcsb'], //  if updated in cdc, set to 1
				
				'rlc' => '0', // record is closed
				'ontag' => '0', // record is closed
				'cdcload' => '1', // next level

				'cdcsbagti' => $cdcsbagti, // submit agent name 
				'cdcsbagtii' => $cdcsbagtii, // submit agent name 
				'cdcsbdti' => $cdcsbdti,  // submit date time
				'cdcsbdtii' => $cdcsbdtii  // submit date time
								
				);
			
			
			$checkforEmail = $this->Administrator_Model->get_email_duplication_count_leadmaster_update($_GET['email'],$lmid);
			if($checkforEmail == true)
			{
				echo json_encode(array(
					"statusCode"=>"Exist",
					
					"message"=>"Email is already Exist"
				));
				return;
			}
			$checkforplink = $this->Administrator_Model->get_plink_duplication_count_leadmaster_update($_GET['plink'],$lmid);
			
			if($checkforplink == true)
			{
				echo json_encode(array(
					"statusCode"=>"plink",
					
					"message"=>"Prospect link is already Exist"
				));
				return;
			}
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			
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
		public function ajax_update_ini_to_asis() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_dc_cleared', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}

		public function ajax_update_ini_to_asis_dv_cleared() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_dv_cleared', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_ev_cleared() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_ev_cleared', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_cdc_cleared() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_cdc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_cdc_cleared', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_dc_pending() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_dc_pending($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_dc_pending', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_dv_pending() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_dv_pending', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_ev_pending() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_ev_pending', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_cdc_pending() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_cdc_pending', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_dv_saved() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_dc_saved($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_dv_saved', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_cdc_saved() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_cdc_saved($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_cdc_saved', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_dv_rejected() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_dv_rejected($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_dv_rejected', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_ev_rejected() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_ev_rejected($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_ev_rejected', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_asis_cdc_rejected() //As is to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				

				'cids' => $campaign_cids_to
				
				
					
				);
			// $datadccleared = $this->Administrator_Model->get_asis_count($campaign_cids_from,$leadsno);
			$datadccleared = $this->Administrator_Model->get_cdc_rejected($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'as_is_cdc_rejected', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_dc() //dc to dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				
			
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// // 'ontag' => '0', // Submit 1st time
				// // 'pload' => '1', // Submit 1st time
				// 'dvsbtg' => '0', // record is closed
				// 'dvrejtg' => '0', // record is closed
				
				// 'rlc' => '0'

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '1', 
				'dvload' => '0', 
				'pload' => '0', 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
					
				);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
			
				

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}

				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dc_to_dc_cleared', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dc_to_dv() //dc  and dv cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0', // record is closed
				// 'dvload' => '1', // record is closed
				
				// 'evload' => NULL, 
				// 'cdcload' => NULL, 
				// 'qaload' => NULL,
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0',
				// 'dvsbtg' => '0', 
				// 'dvrejtg' => '0' 

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '0', 
				'dvload' => '0', 
				'pload' => '1', 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'

			
				);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dc_to_dv_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dc_to_ev() //ev cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0', // record is closed
				// 'dvrejtg' =>'0', 
				// 'dvsbtg' => '0', 				
				// 'evload' => '1', 
				// 'cdcload' => NULL, 
				// 'qaload' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {
				
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dc_to_ev_cleared', 
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dc_to_cdc() //cd cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'cdcsb' => '0', // Submit 1st time
				// 'cdcrjt' => '0', // Submit 1st time
				
				// 'cdcload' => '1', 
				// 'qaload' => NULL,
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL,
				'cdcsb' => '0',
				'cdcrjt' => '0', 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from);

			foreach ($datadccleared as $datadccleared) {
				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dc_to_cdc_cleared',
					'empcode' => $_SESSION['empcode'], 
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}

		public function ajax_update_ini_dv_to_dc()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'ontag' => '0', 
			    // 'pload' => '1', 
			    // 'dvload' => '0', 
				// 'dvsbtg' => '0', 
				// 'dvrejtg' => '0',
				// 'rlc' => '0'

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '1',
				'pload' => '0',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_to_dc_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_dv() //dv cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0', 
				// 'dvload' => '1', 
				// 'dvsbtg' => '0', 
				// 'dvrejtg' => '0',
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0', 
				// 'evload' => NULL, 
				// 'cdcload' => NULL, 
				// 'qaload' => NULL,
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_to_dv_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}

		public function ajax_update_ini_dv_to_ev()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0', // record is closed
				// 'evload' => '1', // record is closed
				// 'cdcsb' => '0', // Submit 1st time
				// 'cdcrjt' => '0', // Submit 1st time
				// 'cdcload' => NULL, 
				// 'qaload' => NULL,
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_to_ev_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}

		public function ajax_update_ini_dv_to_cdc() //cdc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0', // record is closed
				// 'cdcload' => '1', // record is closed
				// 'cdcsb' => '0', // Submit 1st time
				// 'cdcrjt' => '0', // Submit 1st time
				// 'qaload' => NULL,
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0',
				'cdcsb' => '0',
				'cdcrjt' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_to_cdc_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_dc() //dc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0',
				// 'ontag' => '0', 
				// 'dvload' => '0',
				// 'pload' => '1', 
				// 'cdcload' => NULL, 
				// 'evload' => NULL, 
				// 'qaload' => NULL, 
				// 'dvrejtg' => '0', 
				// 'dvsbtg' => '0'

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '1',
				'pload' => '0',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_to_dc_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_dv() //ev and dv cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0', 
				// 'dvload' => '1', 
				
				// 'cdcload' => NULL, 
				// 'evload' => NULL, 
				// 'qaload' => NULL, 
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0', 
				// 'dvrejtg' => '0', 
				// 'dvsbtg' => '0',
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_to_dv_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_ev()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0',
				// 'cdcload' => NULL, 
				// 'evload' => '1', 
				// 'qaload' => NULL, 
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0', 
				// 'dvrejtg' => '0', 
				// 'dvsbtg' => '0',
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'cdcsb' => '0', 
				'cdcrjt' => '0',
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_to_ev_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_cdc()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0',
				// 'cdcload' => '1', 
				// 'evload' => NULL, 
				// 'qaload' => NULL, 
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0', 
				// 'dvrejtg' => '0', 
				// 'dvsbtg' => '0',
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0',
				'cdcsb' => '0',
				'cdcrjt' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_to_cdc_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_dc()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0', 
				// 'ontag' => '0', 
				// 'dvload' => '0',
				// 'pload' => '1',
				// 'cdcload' => NULL, 
				// 'evload' => NULL, 
				// 'qaload' => NULL,
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0', 
				// 'dvrejtg' => '0', 
				// 'dvsbtg' => '0'

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '1',
				'pload' => '0',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'cdcsb' => '0', 
				'cdcrjt' => '0', 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_to_dc_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_dv() //cdc and dv cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0', 
				// 'dvload' => '1', 
				
				// 'cdcload' => NULL, 
				// 'evload' => NULL, 
				// 'qaload' => NULL, 
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0', 
				// 'dvrejtg' => '0', 
				// 'dvsbtg' => '0',
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'cdcsb' => '0', 
				'cdcrjt' => '0',
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_to_dv_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_ev() //ev cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0',
				// 'cdcload' => NULL, 
				// 'evload' => '1', 
				// 'qaload' => NULL, 
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0', 
				// 'dvrejtg' => '0', 
				// 'dvsbtg' => '0',
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'cdcsb' => '0', 
				'cdcrjt' => '0',
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_to_ev_cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_cdc() //cdc cleared
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				// 'cids' => $campaign_cids_to,
				// 'sbsvtag' => '1', // Submit 1st time
				// 'rlc' => '0',
				// 'cdcload' => '1', 
				// 'evload' => NULL, 
				// 'qaload' => NULL, 
				// 'cdcsb' => '0', 
				// 'cdcrjt' => '0', 
				// 'dvrejtg' => '0', 
				// 'dvsbtg' => '0',
				// 'qasv' => NULL,
				// 'cdcsv' => NULL

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0',
				'cdcsb' => '0',
				'cdcrjt' => '0'
			
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_cleared($campaign_cids_from,$leadsno);

			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_to_cdc _cleared',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_dc_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '1', 
				'dvload' => '0', 
				'pload' => '0', 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'cdcrjtdti' => NULL, 
				'cdcrjtdtii' => NULL, 
				'cdcsb' => '0', 
				'cdcrjt' => '0', 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_rejected_to_dc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_dv_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'cdcrjtdti' => NULL, 
				'cdcrjtdtii' => NULL, 
				'cdcsb' => '0', 
				'cdcrjt' => '0', 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_rejected_to_dv',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_ev_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				
				'dvload' => '1',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'cdcrjtdti' => NULL, 
				'cdcrjtdtii' => NULL, 
				'cdcsb' => '0', 
				'cdcrjt' => '0', 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_rejected_to_ev',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_cdc_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'cdcrjtdti' => NULL, 
				'cdcrjtdtii' => NULL, 
				'cdcsb' => '0', 
				'cdcrjt' => '0', 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_rejected_to_cdc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_dc_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '1', 
				'dvload' => '0', 
				'pload' => '0', 
				'evdisp' => NULL, 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_ev_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_rejected_to_dc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_dc_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '1', 
				'dvload' => '0', 
				'pload' => '0',				
				'dvstat' => NULL, 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dv_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_rejected_to_dc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_dv_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'dvstat' => NULL, 
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL,
				'evdisp' => NULL,
				'dvrejtg' => '0', 
				'dvsbtg' => '0'

				
				);
			$datadccleared = $this->Administrator_Model->get_dv_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_rejected_to_dv',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_ev_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL,
				
				'cdcsb' => '0',
				'cdcrjt' => '0',
				'dvstat' => NULL, 
				
				'dvrejtg' => '0', 
				'dvsbtg' => '0'

				
				);
			$datadccleared = $this->Administrator_Model->get_dv_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_rejected_to_ev',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_cdc_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL, 
				
				'cdcsb' => '0',
				'cdcrjt' => '0',
				'dvstat' => NULL, 
				
				'dvrejtg' => '0', 
				'dvsbtg' => '0'

				
				);
			$datadccleared = $this->Administrator_Model->get_dv_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_rejected_to_cdc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_dv_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL,
				'evdisp' => NULL,
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_ev_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_rejected_to_dv',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_ev_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL,
				'evdisp' => NULL,
				'cdcsb' => '0',
				'cdcrjt' => '0',
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_ev_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_rejected_to_ev',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_cdc_rejected()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(

				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcsb' => '0',
				'cdcrjt' => '0',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'evdisp' => NULL,
				'dvsbtg' => '0'
				
				);
			$datadccleared = $this->Administrator_Model->get_ev_rejected($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_rejected_to_cdc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_dc_saved()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '1', 
				'dvload' => '0', 
				'pload' => '0', 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_saved($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_saved_to_dc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_dv_saved()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_saved($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_saved_to_dv',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_ev_saved()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_saved($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_saved_to_ev',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_cdc_saved()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcsb' => '0',
				'cdcrjt' => '0',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_saved($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_saved_to_cdc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_dc_saved()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '1',
				'pload' => '0',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL,
				'cdcsv' => NULL, 
				'qasv' => NULL,  
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_saved($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_saved_to_dc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_dv_saved()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '0', 
				'dvload' => '0', 
				'pload' => '1', 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'cdcsv' => NULL, 
				'qasv' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_saved($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_saved_to_dv',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_ev_saved()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				
				'cdcsv' => NULL, 
				'qasv' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_saved($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_saved_to_ev',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_cdc_saved()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL,
				'cdcsb' => '0',
				'cdcrjt' => '0',				
				'cdcsv' => NULL, 
				'qasv' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_cdc_saved($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_saved_to_cdc',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_to_dc_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '1', 
				'dvload' => '0', 
				'pload' => '0', 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_pending($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dc_to_dc_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dc_to_dv_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0', 
				'ontag' => '0', 
				'dvload' => '0', 
				'pload' => '1', 
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_pending($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dc_to_dv_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dc_to_ev_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_pending($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dc_to_ev_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dc_to_cdc_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL,
				'cdcsb' => '0',
				'cdcrjt' => '0', 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_pending($campaign_cids_from,$leadsno);
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dc_to_cdc_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_dc_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '1',
				'pload' => '0',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno); //dc cleared means dv pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_to_dc_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_dv_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno); //dc cleared means dv pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_to_dv_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_ev_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno); //dc cleared means dv pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_to_ev_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_dv_to_cdc_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0',
				'cdcsb' => '0',
				'cdcrjt' => '0'
				
				
				);
			$datadccleared = $this->Administrator_Model->get_dc_cleared($campaign_cids_from,$leadsno); //dc cleared means dv pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'dv_to_cdc_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_dc_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '1',
				'pload' => '0',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno); //dv cleared means ev pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_to_dc_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_dv_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno); //dv cleared means ev pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_to_dv_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_ev_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				);
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno); //dv cleared means ev pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_to_ev_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_ev_to_cdc_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0',
				'cdcsb' => '0',
				'cdcrjt' => '0'
				);
				
			$datadccleared = $this->Administrator_Model->get_dv_cleared($campaign_cids_from,$leadsno); //dv cleared means ev pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'ev_to_cdc_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_dc_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '1',
				'pload' => '0',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				);

			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno); //ev cleared means cdc pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_to_dc_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_dv_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'ontag' => '0',
				'pload' => '1',
				'dvload' => '0',
				'evload' => NULL,
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				
				);

			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno); //ev cleared means cdc pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_to_dv_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_ev_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'dvload' => '1',
				'cdcload' => NULL, 
				'evload' => NULL, 
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0'
				);

			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno); //ev cleared means cdc pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_to_ev_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_update_ini_cdc_to_cdc_pending()
		{
			
			$campaign_cids_from = $_GET['campaign_cids_from'];
			$campaign_cids_to = $_GET['campaign_cids_to'];
			$leadsno = $_GET['leadsno'];
			
		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}

			$datacdcandlead = array(
				'cids' => $campaign_cids_to,
				'sbsvtag' => '1', // Submit 1st time
				'rlc' => '0',
				'evload' => '1',
				'cdcload' => NULL,
				'qaload' => NULL, 
				'dvrejtg' => '0', 
				'dvsbtg' => '0',
				'cdcsb' => '0',
				'cdcrjt' => '0'
				);
			$datadccleared = $this->Administrator_Model->get_ev_cleared($campaign_cids_from,$leadsno); //ev cleared means cdc pending
			
			foreach ($datadccleared as $datadccleared) {

				$campgrp = $datadccleared['campgrp'];
				$campgrp = $datadccleared['campgrp'].' #'.$campaign_cids_from;
				
				$new_array = array(
					'campgrp' => $campgrp
						
					);
				$final_array=array_merge($datacdcandlead, $new_array);

				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($final_array,$datadccleared['lmid']);			
			}
		
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Lead Uptated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add data Lead failed.."
					));
				}
				$curr_date = date('Y-m-d H:i:s'); 
				$addinidataarray = array(
					'cidsto' => $campaign_cids_to,
					'cidsfrom' => $campaign_cids_from,
					'no_of_leads' => $_GET['leadsno'],
					'stages' => 'cdc_to_cdc_pending',
					'empcode' => $_SESSION['empcode'],  
					'ini_date' => $curr_date 
					
						
					);

				$addinidata = $this->Administrator_Model->add_ini_data($addinidataarray);
								
			
		}
		public function ajax_save_updateleaddatacdc()
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
				if(!empty($_GET['callrec']) || ($_GET['callrec'] =='0') )
				{
					$callrec =  $_GET['callrec'];
				} else{
				$callrec = NULL;
				}
				if(!empty($_GET['ddispositionclass']) || ($_GET['ddispositionclass'] =='0') )
				{
					$ddispositionclass =  $_GET['ddispositionclass'];
				} else{
				$ddispositionclass = NULL;
				}
		
				$cvr = $_GET['cvr'];

				$checkforEmail = $this->Administrator_Model->get_email_duplication_count_leadmaster_update($_GET['email'],$lmid);
				if($checkforEmail == true)
				{
					$randno = rand(10,1000);
					$email = $_GET['email'].$randno."del";
				}else{
					$email = $_GET['email'];
				}

				$checkforplink = $this->Administrator_Model->get_plink_duplication_count_leadmaster_update($_GET['plink'],$lmid);
				
				if($checkforplink == true)
				{
					$randnop = rand(10,1000);
					$plink = $_GET['plink'].$randnop."del";
				}else{
					$plink = $_GET['plink'];
				}



				$datacdcandlead = array(
				'cids' => $_GET['campaign_idcids'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
			
				'jlevel' => $_GET['desid'],
				'dname' => $_GET['dcd'], //department
				'email' => $email,
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $phext,
				'plink' => $plink,
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
				'callrec' => $callrec,

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
				
				'cdcsv' => '0', //  Submit till 5 times
				'cdccomp' => '1', //  if updated in cdc, set to 1
				'rlc' => '0', // record is closed
			
				'cdcsvagti' => $_SESSION['empcode'], // submit agent name 
				'cdcsvdti' => $old_date  // submit date time
								
				);
			
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			

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
			$old_date = date('Y-m-d H:i:s');         // works
			$middle = strtotime($old_date);             // returns bool(false)
			$new_date = date('Y-m-d H:i:s', $middle);

		
		
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

			if(!empty($_POST['callrec']) || ($_POST['callrec'] =='0') )
			{
				$callrec =  $_POST['callrec'];
			} else{
			$callrec = NULL;
			}
			if(!empty($_POST['ddispositionclass']) || ($_POST['ddispositionclass'] =='0') )
			{
				$ddispositionclass =  $_POST['ddispositionclass'];
			} else{
			$ddispositionclass = NULL;
			}			
		
			$cvr = $_POST['cvr'];
			
			$mychecked2 = implode(',', $checked);
			
			if($mychecked2 == "0"){  // Accept
			
				$dvstat ="1"; //Data Verification|Tag for On Accept / Reject /Discard
			
				 $cdcrjt = $_POST['cdcrjt'];
			
				$cdcsb = $_POST['cdcsb']; //Data Verification|Submission Tag		
				$mychecked2 = $_POST['dvrejectreason']; //Data Verification|Submission Tag
				
			}else{
			
				$dvstat ="2";
				$cdcrjt = $_POST['cdcrjt'];
				$cdcsb = $_POST['cdcsb'];
				$mychecked2 = $_POST['dvrejectreason']; //Data Verification|Submission Tag
			
			}

			if($cdcsv == '0'){
				$cdcsvdti = $old_date;	
				$cdcsvagti = $_SESSION['empcode'];
				}else{
					$cdcsvdti = NULL;
					$cdcsvagti= NULL;
				}
		
				$pcomt= "CDC:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

				$datacdcandlead = array(
				'dvrejectreason' => $mychecked2,
				'pcomt' => $pcomt,
				
				'cdcsv' => 0, //  Submit till 5 times
				'cdcsvagti' => $cdcsvagti, 
				'cdcsvdti' => $cdcsvdti, 
				
				'lcalldisp' => $lcalldisp, 
				'lcallstat' => $lcallstat, 
				'cvr' => $cvr, 
				'ddispositionclass' => $ddispositionclass, 
				'cdclst' => $cdclst, 
				'callrec' => $callrec, 
				'cdcload' => NULL, // next level ready to load
				'rlc' => '0', // record is closed
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
			
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
				
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
		public function ajax_save_leadqa()
		{
			$campaign_id = $_POST['campaign_id'];
			$cids = $_POST['campaign_idcids'];
			
			$lmid = $_POST['lmid'];
		
			$qasv = $_POST['qasv'];
			
				$old_date = date('Y-m-d H:i:s');         // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

		
			if(!isset($_SESSION['empcode'])){
				redirect('administrator/logout');
				Exit();
			}
			
			if($qasv == 0){
				$qasvdti = $old_date;	
				$qasvagti = $_SESSION['empcode'];
				}else{
					$qasvdti = NULL;
					$qasvagti= NULL;
				}
		
				$pcomt= "QA:".$_SESSION['empcode'].":".$old_date."#".$_POST['pcomt'];

				$datacdcandlead = array(
				'pcomt' => $pcomt,
				// tag
		
				'qasv' => 0, //  Submit till 5 times
				'qasvagti' => $qasvagti, 
				'qasvdti' => $qasvdti,
				
				'rlc' => '0' // record is closed		
				);
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Data Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
			
		}
		public function leadgenerationupdatelstat()
		{		
			
			$lmid = $_GET['ids'];
			
			$lstat = $_GET['lstat'];
			$old_date = date('Y-m-d H:i:s'); 
			$lsagent = $_SESSION['empcode'];
		

				$datacdcandlead = array(
		
				'lstat' => $lstat,
				'lsstatdt' => $old_date,
				'lsagent' => $lsagent		
				);
			
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Data Verified Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead failed.."
					));
				}
			
		}
		public function leadgenerationupdatelsfinal()
		{		
			
			$lmid = $_GET['ids'];
			
			$lsfinal = $_GET['lsfinal'];
			$old_date = date('Y-m-d H:i:s'); 
			$lsagent = $_SESSION['empcode'];
		
			if($lsfinal == '1')
					{
						$qalsload = NULL;
					}else{
						$qalsload ='1';
					}

				$datacdcandlead = array(
			
				'qalsload' => $qalsload,
				'cdcload' => '1',
				'lsfinal' => $lsfinal,
				'lsstatdt' => $old_date,
				'lsagent' => $lsagent
						
				);
			
			
				$addleadandcdcdata = $this->Administrator_Model->update_leaddata($datacdcandlead,$lmid);
			
				if($addleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
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
		
			$incemail = $this->Administrator_Model->get_incemail_byCampaign($campaign_id);
			
			if($inclistnew == 1 && !empty($incemail))
			
			{
				$data['inclusionemail'] = $this->Administrator_Model->check_inclusion_email($email,$campaign_id);
				
			}
				$data['exclusionemail'] = $this->Administrator_Model->check_suppression_email($email,$campaign_id);
				
			
			echo json_encode($data); 
		  }
		public function checkdomain(){ 
			
			$campaign_id = $_GET['campaign_id'];
			$domain = $_GET['domain'];
			$inclistnew = $_GET['inclistnew'];
			// get data 
		

			$data['domainchecksupp'] = $this->Administrator_Model->check_domain_suppression($domain,$campaign_id);
			$incdomain = $this->Administrator_Model->get_incdomain_byCampaign($campaign_id);
			
			if($inclistnew == 1 && !empty($incdomain))
			if($inclistnew == 1)
			{
				$data['domaincheckincl'] = $this->Administrator_Model->check_domain_incl($domain,$campaign_id);
			}
			
			
			echo json_encode($data); 
		  }
		public function checkcompanylist(){ 
			
			$campaign_id = $_GET['campaign_id'];
			$company_name = $_GET['company_name'];
			$inclistnew = $_GET['inclistnew'];
			// get data 
			

			$data['companychecksupp'] = $this->Administrator_Model->check_company_suppression($company_name,$campaign_id);
			$inccomp = $this->Administrator_Model->get_inccomp_byCampaign($campaign_id);
		
			if($inclistnew == 1 && !empty($inccomp))
		
			{
				$data['companycheckincl'] = $this->Administrator_Model->check_company_incl($company_name,$campaign_id);
			}
		
			
			echo json_encode($data); 
		  }

		  public function getquestion(){ 
			
			$campaign_id = $_GET['campaign_id'];
		
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


		public function timelog_report($offset = 0){
			$this->load->model('Administrator_Model');
			// Pagination Config
			$config['base_url'] = base_url(). 'campaigns/campaign/';
			$config['total_rows'] = $this->db->count_all('campaign');
			$config['per_page'] = '';
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			$campid =$this->input->post('campid');
			$user_id =$this->input->post('user_id');
			$stage =$this->input->post('stage');
			$from =$this->input->post('from');
			$to =$this->input->post('to');
			

			if($from == "")
			{
				$from = date('Y-m-d 00:00:00');
			}
			
			if($to == "")
			{
				$to = date('Y-m-d H:i:s');
			}

			$this->pagination->initialize($config);
		
			$data['title'] = 'Latest Campaigns';

			$data['users'] = $this->Administrator_Model->get_user_report_timelog($campid,$user_id,$from,$to,$stage);
			
			
			$data['campaigns'] = $this->Administrator_Model->get_campaign();
			$data['user_id'] = $user_id;
			$data['Campid'] = $campid;
			$data['Stage'] = $stage;
			$data['From'] = $from;
			$data['To'] = $to;
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/timelog-report', $data);
			$this->load->view('administrator/footer');
		}

		public function user_accpeted_report($offset = 0){
			$this->load->model('Administrator_Model');
			// Pagination Config
			$config['base_url'] = base_url(). 'campaigns/campaign/';
			$config['total_rows'] = $this->db->count_all('campaign');
			$config['per_page'] = '';
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			$campid =$this->input->post('campid');
			
			
			
			$intervaldiff =$this->input->post('intervaldiff');
			
			if(!isset($intervaldiff)){
				$intervaldiff=14;
			}

		
			$this->pagination->initialize($config);
		
			$data['title'] = 'Latest Campaigns';

			// $data['users'] = $this->Administrator_Model->get_user_report_timelog($campid,$user_id,$from,$to,$stage);
			$data['users'] = $this->Administrator_Model->get_users_for_accpted_report();
			
			
			$data['campaigns'] = $this->Administrator_Model->get_campaign();
		
			$data['intervaldiff'] = $intervaldiff;

			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/user-accepted-report', $data);
			$this->load->view('administrator/footer');
		}

		public function user_accpeted_report_weekly($offset = 0){
			$this->load->model('Administrator_Model'); 
			// Pagination Config
			$config['base_url'] = base_url(). 'campaigns/campaign/';
			$config['total_rows'] = $this->db->count_all('campaign');
			$config['per_page'] = '';
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			$campid =$this->input->post('campid');
			
			
			$txtworkingdays = $this->input->post('txtworkingdays');
			// print_r($txtworkingdays); 
			$intervaldiff =$this->input->post('intervaldiff');
			
			if(!isset($intervaldiff)){
				$intervaldiff= 6;
			}
			
			if(!isset($txtworkingdays)){
				// $txtworkingdays= date('Y-m-d H:i:s');
				$date= date('Y-m-d H:i:s');
				$txtworkingdays= date('Y-m-d H:i:s', strtotime($date.'last sunday'));

			}
// print_r($txtworkingdays); 
// print_r($intervaldiff); 
		
			$this->pagination->initialize($config);
		
			$data['title'] = 'Latest Campaigns';

			// $data['users'] = $this->Administrator_Model->get_user_report_timelog($campid,$user_id,$from,$to,$stage);
			$data['users'] = $this->Administrator_Model->get_users_for_accpted_report();
			
			
			$data['campaigns'] = $this->Administrator_Model->get_campaign();
		
			$data['intervaldiff'] = $intervaldiff;
			$data['txtworkingdays'] = $txtworkingdays;

			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			// $this->load->view('administrator/user-accepted-report', $data);
			$this->load->view('administrator/user-accepted-report_weekly', $data);
			$this->load->view('administrator/footer');
		}



	}