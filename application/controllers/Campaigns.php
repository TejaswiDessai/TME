<?php
	class Campaigns extends CI_Controller
	{
		
		public function ajax_add_campaign()
		{
			

			// $this->form_validation->set_rules('client_id', 'Client ID', 'required');
			// $this->form_validation->set_rules('campaign_name', 'Campaign Name', 'required');
			// $this->form_validation->set_rules('campaign_id', 'Campaign ID', 'required|numeric');
			// $this->form_validation->set_rules('country_id[]', 'Country', 'required');
			// $this->form_validation->set_rules('region_id[]', 'World Region', 'required');
			// $this->form_validation->set_rules('industrycd[]', 'Industry', 'required');
			// $this->form_validation->set_rules('dcd[]', 'Department', 'required');
			// $this->form_validation->set_rules('emplzid[]', 'Employee', 'required');
			// $this->form_validation->set_rules('revid[]', 'Revenue', 'required');
			// $this->form_validation->set_rules('desid[]', 'Designation', 'required');
			// $this->form_validation->set_rules('quantity', 'Number', 'required');
			// $this->form_validation->set_rules('estclosedt', 'Est completion Date ', 'required');
			// $this->form_validation->set_rules('startdt', 'Start Date', 'required');
                        // $this->form_validation->set_error_delimiters(' <spann style="font-size:12px;color:red">', '</span><br>');
                        
                        
//			$this->form_validation->set_rules('campaign_name', 'campaign_name', 'required|callback_check_username_exists');
//			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

                     
                        $campaigncountryStr = '';
                        if(!empty($_GET['country_id'])) {
						// $campaigncountryStr = implode(',',$_GET['country_id']);
						$campaigncountryStr = $_GET['country_id'];
                         }
                        $regionStr = '';
                        if(!empty($_GET['region_id'])) {
						// $regionStr = implode(',',$_GET['region_id']);
						$regionStr =$_GET['region_id'];
                         }
                        $industryStr = '';
                        if(!empty($_GET['industrycd'])) {
						// $industryStr = implode(',',$_GET['industrycd']);
						$industryStr = $_GET['industrycd'];
                         }
                        $deptStr = '';
                        if(!empty($_GET['dcd'])) {
						// $deptStr = implode(',',$_GET['dcd']);
						$deptStr = $_GET['dcd'];
                         }
                        $empsizeStr = '';
                        if(!empty($_GET['emplzid'])) {
                        $empsizeStr = $_GET['emplzid'];
                         }
                        $revStr = '';
                        if(!empty($_GET['revid'])) {
                        $revStr = $_GET['revid'];
                         }
                        $desiStr = '';
                        if(!empty($_GET['desid'])) {
						// $desiStr = implode(',',$_GET['desid']);
						$desiStr = $_GET['desid'];
						}

						$frequency_type = '';
                        if(!empty($_GET['frequency_type'])) {
                        $frequency_type = $_GET['frequency_type'];
						}
						$frequency = '';
                        if(!empty($_GET['frequency'])) {
						// $frequency = implode(',',$_GET['frequency']);
						$frequency = $_GET['frequency'];
						}

						$emplbound = '';
						if(!empty($_GET['emplbound'])) {
						$emplbound = $_GET['emplbound'];
						}
						$empubound = "";
						if(!empty($_GET['empubound'])) {
						$empubound = $_GET['empubound'];
						}
						$emp_range = null;
						if(isset($emplbound) && $empubound)
							$emp_range = $emplbound . "-" . $empubound;

						$revnlbound = '';
						if(!empty($_GET['revnlbound'])) {
						$revnlbound = $_GET['revnlbound'];
						}
						$revnubound = "";
						if(!empty($_GET['revnubound'])) {
						$revnubound = $_GET['revnubound'];
						}
						$ren_range = null;
						if(isset($emplbound) && $empubound)
							$ren_range = $emplbound ."m -". $empubound."m";
						
						$revnlbound_range = '';
						if(!empty($_GET['revnlbound_range'])) {
						$revnlbound_range = $_GET['revnlbound_range'];
						}
						$revnubound_range = "";
						if(!empty($_GET['revnubound_range'])) {
						$revnubound_range = $_GET['revnubound_range'];
						}
						if(isset($emplbound) && $empubound)
			{
				$post_data = array(
					'emplbound' => $emplbound, 
					'empubound' => $empubound,
					'emplsizerange' => $emp_range,
					// 'loaddt' => date("Y-m-d")
					
								
				);
				$empsizeStr = $this->Administrator_Model->add_employee_size($post_data);
			}

			if(isset($revnlbound) && $revnubound)
			{
				$add_compsize = array(
					'curr' => "USD",
					'revnlbound' => $revnlbound, 
					'nmlistlbound' => $revnlbound_range,
					'revnubound' => $revnubound,
					'nmlistubound' => $revnubound_range,
					'rangelist' => $ren_range
					
								
				);
				$revStr = $this->Administrator_Model->add_compsize($add_compsize);
			}
                        $datacampaign = array(
                            'clientids' => $_GET['client_id'], 
							'cids' => $_GET['campaign_id'],
							'campnm' => $_GET['campaign_name'],
							'countrycd' => $campaigncountryStr,
							'regioncode' => $regionStr,
							'industrycd' => $industryStr,
							'dcd' => $deptStr,
							'emplzid' => $empsizeStr,
							'comzid' => $revStr,
							'tid' => $desiStr,
							'suplistnew' =>$_GET['checksupp'],
							'inclistnew' =>$_GET['inclist'],
							'cdcneed' =>$_GET['cdqa'],
							'questnos' =>$_GET['quantity'],
							'status' => $_GET['selectstatus'],			
							'estclosedt' => $_GET['estclosedt'],
							'startdt' => $_GET['startdt'],
							'freqtyp' => $frequency_type,
							'freqid' => $frequency
							// 'Modifieddt' => date("Y-m-d H:i:s")
                            
                                          
						  );
                        
						//   print_r($datacampaign);
						//      exit();
						
							$addcampaigndata = $this->Administrator_Model->add_campaign($datacampaign);
							// print_r(addcampaigndata); 

							// if(isset($addcampaigndata) && $addcampaigndata != null){
								if($addcampaigndata == true){
								echo json_encode(array(
									"statusCode"=>"Success",
									"campaign_id"=>$addcampaigndata,
									"message"=>"Campaign Added Successfully.."
								));
							}else{
								echo json_encode(array(
									"statusCode"=>"Fail",
									"message"=>"Add Campaign failed.."
								));
							}
								
				//Set Message
				// $this->session->set_flashdata('success', 'Campaign has been added Successfull.');
				// redirect('administrator/dashboard');
//                                redirect('campaigns/campaign');
			
			
		}
                
		public function campaign($offset = 0)
		{
                     $this->load->model('Administrator_Model');
			// Pagination Config
			$config['base_url'] = base_url(). 'campaigns/campaign/';
			$config['total_rows'] = $this->db->count_all('campaign');
			$config['per_page'] = '';
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Campaigns';

			$data['campaigns'] = $this->Administrator_Model->get_campaign_list(FALSE, $config['per_page'], $offset);

			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/campaigns', $data);
		  		$this->load->view('administrator/footer');
		}


		function addcampaignForm($page = 'add-campaign'){
			$data['title'] = 'Create Campaigns';
                        $data['clients'] = $this->Administrator_Model->get_clients();
                        $data['countries'] = $this->Administrator_Model->get_countries();
                        $data['regions'] = $this->Administrator_Model->get_regions();
                        $data['industries'] = $this->Administrator_Model->get_industries();
                        $data['departments'] = $this->Administrator_Model->get_depts();
                        $data['empsize'] = $this->Administrator_Model->get_empsize();
                        $data['revsize'] = $this->Administrator_Model->get_revenuesize();
						$data['designation'] = $this->Administrator_Model->get_designation();
						$data['lbound'] = $this->Administrator_Model->get_empsize();
						$data['ubound'] = $this->Administrator_Model->get_empsize();

						$data['revnlbound'] = $this->Administrator_Model->get_revenuesize();
						$data['revnubound'] = $this->Administrator_Model->get_revenuesize();
						$data['frequency_type'] = $this->Administrator_Model->get_frequency_type();
						$data['frequency'] = $this->Administrator_Model->get_frequency();
						// $data['assetitle'] = $this->Administrator_Model->get_assetitle();
			
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
			// $datacampaign1 = array(
			// 	'clientids' => $this->input->post('client_id'), 
			// 	'cids' => $this->input->post('campaign_id'));
			// $addcampaigndata = $this->Administrator_Model->add_campaign($datacampaign1);
			// if($addcampaigndata == true){
			// return json_encode(array(
			// 		"statusCode"=>200
			// 	));
			// }else{
			// 	return json_encode(array(
			// 		"statusCode"=>201
			// 	));
			// }


		}
		function addclient($page = 'add-client'){
			$data['title'] = 'Create Campaigns';
                        // $data['clients'] = $this->Administrator_Model->get_clients();
                        // $data['countries'] = $this->Administrator_Model->get_countries();
                        // $data['regions'] = $this->Administrator_Model->get_regions();
                        // $data['industries'] = $this->Administrator_Model->get_industries();
                        // $data['departments'] = $this->Administrator_Model->get_depts();
                        // $data['empsize'] = $this->Administrator_Model->get_empsize();
                        // $data['revsize'] = $this->Administrator_Model->get_revenuesize();
						// $data['designation'] = $this->Administrator_Model->get_designation();
						// $data['lbound'] = $this->Administrator_Model->get_empsize();
						// $data['ubound'] = $this->Administrator_Model->get_empsize();

						// $data['revnlbound'] = $this->Administrator_Model->get_revenuesize();
						// $data['revnubound'] = $this->Administrator_Model->get_revenuesize();
						// $data['frequency_type'] = $this->Administrator_Model->get_frequency_type();
						// $data['frequency'] = $this->Administrator_Model->get_frequency();
					
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		


		}

		function addsuppressionList($page = 'suppression-list')
		{
			$data['title'] = 'Create Campaigns';
			$data['clients'] = $this->Administrator_Model->get_clients();
			$data['countries'] = $this->Administrator_Model->get_countries();
			$data['regions'] = $this->Administrator_Model->get_regions();
			$data['industries'] = $this->Administrator_Model->get_industries();
			$data['departments'] = $this->Administrator_Model->get_depts();
			$data['empsize'] = $this->Administrator_Model->get_empsize();
			$data['revsize'] = $this->Administrator_Model->get_revenuesize();
			$data['designation'] = $this->Administrator_Model->get_designation();
			// $data['assetitle'] = $this->Administrator_Model->get_assetitle();
			$camp_id = $_GET['camp_id'];
			$data['campaign_record'] = $this->Administrator_Model->get_campaign_by_id($camp_id);
			$data['camp_id'] = $camp_id;
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
			// $datacampaign1 = array(
			// 	'clientids' => $this->input->post('client_id'), 
			// 	'cids' => $this->input->post('campaign_id'));
			// $addcampaigndata = $this->Administrator_Model->add_campaign($datacampaign1);
			// if($addcampaigndata == true){
			// return json_encode(array(
			// 		"statusCode"=>200
			// 	));
			// }else{
			// 	return json_encode(array(
			// 		"statusCode"=>201
			// 	));
			// }


		}

		public function getSubRegion(){ 
			
			$region_id = $_GET['region_id'];
			$desiStr = implode(',',$region_id);
			// get data 
			$data = $this->Administrator_Model->getSubRegion($region_id);
			echo json_encode($data); 
		}

		public function getCountry(){ 
			
			$sub_region_id = $_GET['sub_region_id'];
			$region_id = $_GET['region_id'];
			$desiStr = implode(',',$sub_region_id);
			// get data 
			$data = $this->Administrator_Model->getCountry($sub_region_id,$region_id);
			echo json_encode($data); 
		}

		public function getIndustry(){ 
		
		$sector_id = $_GET['sector_id'];
		$desiStr = implode(',',$sector_id);
		// get data 
		$data = $this->Administrator_Model->getIndustry($sector_id);
		echo json_encode($data); 
		}

		public function getJobTitle(){ 
		
			$levelid = $_GET['levelid'];
			// $desiStr = implode(',',$levelid);
			// get data 
			$data = $this->Administrator_Model->getJobTitle($levelid);
			echo json_encode($data); 
		}
		
		public function update_campaign($id = NULL)
		{
			$data['campaign_record'] = $this->Administrator_Model->get_campaign_by_id($id);
			$data['clients'] = $this->Administrator_Model->get_clients();
			$data['countries'] = $this->Administrator_Model->get_countries();
			$data['regions'] = $this->Administrator_Model->get_regions();
			$data['subregions'] = $this->Administrator_Model->get_subregions();
			$data['industries'] = $this->Administrator_Model->get_industries();
			$data['subindustries'] = $this->Administrator_Model->get_subindustries();
			$data['departments'] = $this->Administrator_Model->get_depts();
			$data['empsize'] = $this->Administrator_Model->get_empsize();
			$data['revsize'] = $this->Administrator_Model->get_revenuesize();
			$data['job_level'] = $this->Administrator_Model->get_designation();
			$data['designation'] = $this->Administrator_Model->get_sub_designation();
			$data['lbound'] = $this->Administrator_Model->get_empsize();
			$data['ubound'] = $this->Administrator_Model->get_empsize();
			$data['revnlbound'] = $this->Administrator_Model->get_revenuesize();
			$data['revnubound'] = $this->Administrator_Model->get_revenuesize();
			$data['frequency_type'] = $this->Administrator_Model->get_frequency_type();
			$data['frequency'] = $this->Administrator_Model->get_frequency();

			
			  
			  if (empty($data['campaign_record'])) {
				  show_404();
			  }
			  $data['title'] = 'Update Campaign';
  
			  $this->load->view('administrator/header-script');
				 $this->load->view('administrator/header');
				 $this->load->view('administrator/header-bottom');
				  $this->load->view('administrator/update_campaign_new', $data);
				$this->load->view('administrator/footer');
		}
		public function ajax_update_campaign()
		{

					 
			$campaign_id = $_POST['campaign_id'];

			$campaigncountryStr = '';
			if(!empty($_POST['country_id'])) {
			$campaigncountryStr = implode(',',$_POST['country_id']);
				}
		
			$regionStr = '';
			if(!empty($_POST['region_id'])) {
				if($_POST['region_id'] == 0)
				{
					$regionStr = 0;
				}
				else
				{
					$regionStr = implode(',',$_POST['region_id']);
				}
				
			}
			$subregionStr = '';
			if(!empty($_POST['sub_region_id'])) {
				if($_POST['sub_region_id'] == 0)
				{
					$subregionStr = 0;
				}
				else
				{
					$subregionStr = implode(',',$_POST['sub_region_id']);
				}
				
			}
			$industryStr = '';
			if(!empty($_POST['industrycd'])) {
			$industryStr = implode(',',$_POST['industrycd']);
				}
			$subindustryStr = '';
			if(!empty($_POST['subindustrycd'])) {
			$subindustryStr = implode(',',$_POST['subindustrycd']);
				}
			$deptStr = '';
			if(!empty($_POST['dcd'])) {
			$deptStr = implode(',',$_POST['dcd']);
				}
			// $empsizeStr = '';
			// if(!empty($_POST['emplzid'])) {
			// $empsizeStr = $_POST['emplzid'];
			// 	}
			// $revStr = '';
			// if(!empty($_POST['revid'])) {
			// $revStr = $_POST['revid'];
			// 	}
			$levelid = '';
			if(!empty($_POST['levelid'])) {
			$levelid = implode(',',$_POST['levelid']);
			}

			$desiStr = '';
			if(!empty($_POST['desid'])) {
			$desiStr = implode(',',$_POST['desid']);
			}

			$frequency_type = '';
			if(!empty($_POST['frequency_type'])) {
			$frequency_type = $_POST['frequency_type'];
			}
			$frequency = '';
			if(!empty($_POST['frequency'])) {
			$frequency = implode(',',$_POST['frequency']);
			}

			$emplbound = '';
			if(!empty($_POST['emplbound'])) {
			$emplbound = $_POST['emplbound'];
			}
			$empubound = "";
			if(!empty($_POST['empubound'])) {
			$empubound = $_POST['empubound'];
			}
			$emp_range = null;
			if(isset($emplbound) && $empubound)
				$emp_range = $emplbound . "-" . $empubound;

			$revnlbound = '';
			if(!empty($_POST['revnlbound'])) {
			$revnlbound = $_POST['revnlbound'];
			}
			$revnubound = "";
			if(!empty($_POST['revnubound'])) {
			$revnubound = $_POST['revnubound'];
			}
			$ren_range = null;
			if(isset($emplbound) && $empubound)
				$ren_range = $emplbound ."m -". $empubound."m";
			
			$revnlbound_range = '';
			if(!empty($_POST['revnlbound_range'])) {
			$revnlbound_range = $_POST['revnlbound_range'];
			}
			$revnubound_range = "";
			if(!empty($_POST['revnubound_range'])) {
			$revnubound_range = $_POST['revnubound_range'];
			}
			
			$sdate=date_create($_POST['startdt']);
			$cdate=date_create($_POST['estclosedt']);
			$closedate = date_format($cdate,"Y/m/d");
			$startdate = date_format($sdate,"Y/m/d");
			$period = $_POST['period'];
			$datacampaign = array(
				'clientids' => $_POST['client_id'], 
				'cids' => $_POST['campaign_id'],
				'campnm' => $_POST['campaign_name'],
				'countrycd' => $campaigncountryStr,
				'subregioncode' => $subregionStr,
				'regioncode' => $regionStr,
				'industrycd' => $industryStr,
				'subindustrycd' => $subindustryStr,
				'dcd' => $deptStr,
				'joblevelids' => $levelid,
				'tid' => $desiStr,
				'suplistnew' =>$_POST['checksupp'],
				'inclistnew' =>$_POST['inclist'],
				'cdcneed' =>$_POST['cdqa'],
				'assetid' => $_POST['assetid'],
				'questnos' =>$_POST['quantity'],
				'status' => $_POST['selectstatus'],			
				'estclosedt' => $closedate,
				'startdt' => $startdate,
				'freqtyp' => $frequency_type,
				'freqid' => $frequency,
				'emplbnd' => $emplbound, 
				'empubnd' => $empubound,
				'revlbnd' => $revnlbound, 
				'revubnd' => $revnubound,
				'revlbdim' => $revnlbound_range,
				'revubdim' => $revnubound_range,
				'period' => $period
				// 'Modifieddt' => date("Y-m-d H:i:s")
				
								
				);
			
			//   print_r($datacampaign);
			//      exit();
			
				$addcampaigndata = $this->Administrator_Model->update_campaign($datacampaign,$campaign_id);
				// print_r(addcampaigndata); 

				if($addcampaigndata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"message"=>"Campaign Updated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Updated Campaign failed.."
					));
				}
								
			
		}

		public function ajax_add_suppression_list()
		{
			$camp_id = $_POST['camp_id'];
			$suptyp = $_POST['suptyp'];
			
			if(isset($_POST['dispo_comp'])){
				$dispo_comp = '1';	
			}else{
				$dispo_comp = 0;	
			}
			if(isset($_POST['dispo_domain'])){
				$dispo_domain = '1';	
			}else{
				$dispo_domain = 0;	
			}

			// print_r($dispo_comp); exit;
			// $period = $_POST['period'];
			$connect = pg_connect("host=localhost dbname=Forerunner user=postgres password=password@123");

			if(isset($_FILES['suplistnew_email']['name']))
			{
				$filename = explode(".", $_FILES['suplistnew_email']['name']);
				
				// echo ;
				$ex_email_file = $filename[0].".".$filename[1];
				if($filename[1] == 'csv')
				{
					$handle = fopen($_FILES['suplistnew_email']['tmp_name'], "r");
					while($data = fgetcsv($handle))
					{
						$item1 = pg_escape_string ($connect, $data[0]);  
						// $item2 = pg_escape_string ($connect, $data[1]);
						// $item3 = pg_escape_string ($connect, $data[2]);
					
						//$item36= mysqli_real_escape_string($connect, $data[35]);

						//$item5 = mysqli_real_escape_string($connect, $data[4]);
						$query = "INSERT into emaillist(cid,filename,emailids,datatype,exclincl)values('$camp_id','$ex_email_file','$item1','$suptyp','0')";
						// show_error($this->db->last_query(), 200, "SQL");
						$result = pg_query($connect, $query);
						if (!$result) {
							die('Invalid query: ' . pg_result_error($connect));
						}
						else{
						// echo "<script>alert('Import done');</script>";
						}
							
						}
						fclose($handle);
				
					}
				}

				if(isset($_FILES['suplistnew_company']['name']))
				{
					$filename = explode(".", $_FILES['suplistnew_company']['name']);
					$ex_company_file = $filename[0].".".$filename[1];
					if($filename[1] == 'csv')
					{
						$handle = fopen($_FILES['suplistnew_company']['tmp_name'], "r");
						while($data = fgetcsv($handle))
						{
							$item1 = pg_escape_string ($connect, $data[0]);  
							$query = "INSERT into complist(cid,filename,companynms,datatype,exlincl)values('$camp_id','$ex_company_file','$item1','$suptyp','0')";
							// $item2 = pg_escape_string ($connect, $data[1]);
							// $item3 = pg_escape_string ($connect, $data[2]);
						
							//$item36= mysqli_real_escape_string($connect, $data[35]);
	
							//$item5 = mysqli_real_escape_string($connect, $data[4]);
							// $query = "INSERT into inclusion(incltyp,campid,aclist,domainlist,maillist,period
							// )values('$excltyp','$camp_id','$item1','$item2','$item3','$period')";
							// show_error($this->db->last_query(), 200, "SQL");
							$result = pg_query($connect, $query);
							if (!$result) {
								die('Invalid query: ' . pg_result_error($connect));
							}
							else{
							//echo "<script>alert('Import done');</script>";
							}
								
							}
							fclose($handle);
					
						}
				}
			if(isset($_FILES['suplistnew_domain']['name']))
			{
				$filename = explode(".", $_FILES['suplistnew_domain']['name']);
				$ex_domain_file = $filename[0].".".$filename[1];
				if($filename[1] == 'csv')
				{
					$handle = fopen($_FILES['suplistnew_domain']['tmp_name'], "r");
					while($data = fgetcsv($handle))
					{
						$item1 = pg_escape_string ($connect, $data[0]);  
						$query = "INSERT into domainlist(cid,filename,domainnms,datatype,inclexcl)values('$camp_id','$ex_domain_file','$item1','$suptyp','0')";
						// $item2 = pg_escape_string ($connect, $data[1]);
						// $item3 = pg_escape_string ($connect, $data[2]);
					
						//$item36= mysqli_real_escape_string($connect, $data[35]);

						//$item5 = mysqli_real_escape_string($connect, $data[4]);
						// $query = "INSERT into inclusion(incltyp,campid,aclist,domainlist,maillist,period
						// )values('$excltyp','$camp_id','$item1','$item2','$item3','$period')";
						// show_error($this->db->last_query(), 200, "SQL");
						$result = pg_query($connect, $query);
						if (!$result) {
							die('Invalid query: ' . pg_result_error($connect));
						}
						else{
						//echo "<script>alert('Import done');</script>";
						}
							
						}
						fclose($handle);
				
					}
				}

				// Inclusion file upload
			if(isset($_FILES['inclistnew_email']['name']))
			{
				$filename = explode(".", $_FILES['inclistnew_email']['name']);
				$in_email_file = $filename[0].".".$filename[1];
				if($filename[1] == 'csv')
				{
					$handle = fopen($_FILES['inclistnew_email']['tmp_name'], "r");
					while($data = fgetcsv($handle))
					{
						$item1 = pg_escape_string ($connect, $data[0]);  
						// $item2 = pg_escape_string ($connect, $data[1]);
						// $item3 = pg_escape_string ($connect, $data[2]);
					
						//$item36= mysqli_real_escape_string($connect, $data[35]);

						//$item5 = mysqli_real_escape_string($connect, $data[4]);
						$query = "INSERT into emaillist(cid,filename,emailids,datatype,exclincl)values('$camp_id','$in_email_file','$item1','$suptyp','1')";
						// show_error($this->db->last_query(), 200, "SQL");
						$result = pg_query($connect, $query);
						if (!$result) {
							die('Invalid query: ' . pg_result_error($connect));
						}
						else{
						// echo "<script>alert('Import done');</script>";
						}
							
						}
						fclose($handle);
				
					}
				}

				if(isset($_FILES['inclistnew_company']['name']) )
				{
					$filename = explode(".", $_FILES['inclistnew_company']['name']);
					$in_company_file = $filename[0].".".$filename[1];
					if($filename[1] == 'csv')
					{
						$handle = fopen($_FILES['inclistnew_company']['tmp_name'], "r");
						while($data = fgetcsv($handle))
						{
							$item1 = pg_escape_string ($connect, $data[0]);  
							$query = "INSERT into complist(cid,filename,companynms,datatype,exlincl)values('$camp_id','$in_company_file','$item1','$suptyp','1')";
							// $item2 = pg_escape_string ($connect, $data[1]);
							// $item3 = pg_escape_string ($connect, $data[2]);
						
							//$item36= mysqli_real_escape_string($connect, $data[35]);
	
							//$item5 = mysqli_real_escape_string($connect, $data[4]);
							// $query = "INSERT into inclusion(incltyp,campid,aclist,domainlist,maillist,period
							// )values('$excltyp','$camp_id','$item1','$item2','$item3','$period')";
							// show_error($this->db->last_query(), 200, "SQL");
							$result = pg_query($connect, $query);
							if (!$result) {
								die('Invalid query: ' . pg_result_error($connect));
							}
							else{
							//echo "<script>alert('Import done');</script>";
										if($dispo_comp == '1')
										{
											$updatequery = "update campaign set dispo_comp='1' where cnid='$camp_id'";
										// show_error($this->db->last_query(), 200, "SQL");
										$resultupdate = pg_query($connect, $updatequery);
										}else{

										}
							}
								
							}
							fclose($handle);
					
						}
				}
			if(isset($_FILES['inclistnew_domain']['name']))
			{
				$filename = explode(".", $_FILES['inclistnew_domain']['name']);
				$in_domain_file = $filename[0].".".$filename[1];
				if($filename[1] == 'csv')
				{
					$handle = fopen($_FILES['inclistnew_domain']['tmp_name'], "r");
					while($data = fgetcsv($handle))
					{
						$item1 = pg_escape_string ($connect, $data[0]);  
						$query = "INSERT into domainlist(cid,filename,domainnms,datatype,inclexcl)values('$camp_id','$in_domain_file','$item1','$suptyp','1')";
						// $item2 = pg_escape_string ($connect, $data[1]);
						// $item3 = pg_escape_string ($connect, $data[2]);
					
						//$item36= mysqli_real_escape_string($connect, $data[35]);

						//$item5 = mysqli_real_escape_string($connect, $data[4]);
						// $query = "INSERT into inclusion(incltyp,campid,aclist,domainlist,maillist,period
						// )values('$excltyp','$camp_id','$item1','$item2','$item3','$period')";
						// show_error($this->db->last_query(), 200, "SQL");
						$result = pg_query($connect, $query);
						if (!$result) {
							die('Invalid query: ' . pg_result_error($connect));
						}
						else{
						//echo "<script>alert('Import done');</script>";
							if($dispo_domain == '1')
							{
								$updatequery = "update campaign set dispo_domain='1' where cnid='$camp_id'";
							// show_error($this->db->last_query(), 200, "SQL");
							$resultupdate = pg_query($connect, $updatequery);
							}else{

							}
						}
							
						}
						fclose($handle);
				
					}
				}

				if(isset($_FILES['inclistnew_jtitile']['name'])) // job title inclusion added by Tejaswi
				{
				$filename = explode(".", $_FILES['inclistnew_jtitile']['name']);
				$in_joblist_file = $filename[0].".".$filename[1];
				if($filename[1] == 'csv')
				{
					$handle = fopen($_FILES['inclistnew_jtitile']['tmp_name'], "r");
					while($data = fgetcsv($handle))
					{
						$item1 = pg_escape_string ($connect, $data[0]);  
						// $item2 = pg_escape_string ($connect, $data[1]);
						// $item3 = pg_escape_string ($connect, $data[2]);
					
						//$item36= mysqli_real_escape_string($connect, $data[35]);

						//$item5 = mysqli_real_escape_string($connect, $data[4]);
						$query = "INSERT into jobtitlelist(cid,filename,jobtitlelist,datatype)values('$camp_id','$in_joblist_file','$item1','$suptyp')";
						// show_error($this->db->last_query(), 200, "SQL");
						$result = pg_query($connect, $query);
						if (!$result) {
							die('Invalid query: ' . pg_result_error($connect));
						}
						else{
						// echo "<script>alert('Import done');</script>";
						}
							
						}
						fclose($handle);
				
					}
				}		
				if(isset($_FILES['userfilequestion']['name']))
				{
					$filename = explode(".", $_FILES['userfilequestion']['name']);
					
					if($filename[1] == 'csv')
					{
						$handle = fopen($_FILES['userfilequestion']['tmp_name'], "r");
						$count = 0;
						while($data = fgetcsv($handle))
						{
							$item1 = pg_escape_string ($connect, $data[0]);  
							// $item2 = pg_escape_string ($connect, $data[1]);
							// $item3 = pg_escape_string ($connect, $data[2]);
						
							//$item36= mysqli_real_escape_string($connect, $data[35]);
	
							//$item5 = mysqli_real_escape_string($connect, $data[4]);
							$query = "INSERT into questions(cid,questions
							)values('$camp_id','$item1')";
							// show_error($this->db->last_query(), 200, "SQL");
							$result = pg_query($connect, $query);
							if (!$result) {
								die('Invalid query: ' . pg_result_error($connect));
							}
							else{
							// echo "<script>alert('Import done');</script>";
							}
							if($count < 11)
							{
								$count ++;
							}
							else
							{
								break;
							}
							
							}
							fclose($handle);
					
						}
					}

					if(isset($_FILES['userfileasset']['name']))
				{
					$filename = explode(".", $_FILES['userfileasset']['name']);
					if($filename[1] == 'csv')
					{
						$handle = fopen($_FILES['userfileasset']['tmp_name'], "r");
						$count = 0;
						while($data = fgetcsv($handle))
						{
							$item1 = pg_escape_string ($connect, $data[0]);  
							// $item2 = pg_escape_string ($connect, $data[1]);
							// $item3 = pg_escape_string ($connect, $data[2]);
						
							//$item36= mysqli_real_escape_string($connect, $data[35]);
	
							//$item5 = mysqli_real_escape_string($connect, $data[4]);
							$query = "INSERT into assettitle(cids,title
							)values('$camp_id','$item1')";
							// show_error($this->db->last_query(), 200, "SQL");
							$result = pg_query($connect, $query);
							if (!$result) {
								die('Invalid query: ' . pg_result_error($connect));
							}
							else{
							// echo "<script>alert('Import done');</script>";
							}
							if($count < 11)
							{
								$count ++;
							}
							else
							{
								break;
							}
							
							}
							fclose($handle);
					
						}
					}
					

					redirect('campaigns/campaign');
					
			}
		// }

		public function updateCampaignStatus()
		{
			$campaign_id = $_GET['campaign_id'];
			$client_id = $_GET['client_id'];
			$campaign_status = $_GET['campaign_status'];
			$comment = $_GET['comment'];
			$datacampaign = array(
				'status' => $campaign_status,
				// 'countrycd' => $comment
				
								
				);
				$updatecampaignStatus = $this->Administrator_Model->updatecampaignStatus($datacampaign,$campaign_id,$client_id);
				// print_r(addcampaigndata); 

				if($updatecampaignStatus == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"status" => $campaign_status,
						"message"=>"Status Updated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Updated Campaign failed.."
					));
				}

	}

	public function ajax_add_new_campaign()
		{
			$campaign_id = $_GET['campaign_id'];
			$campaigncountryStr = '';
			if(!empty($_GET['country_id'])) {
			$campaigncountryStr = $_GET['country_id'];
				}
			$regionStr = '';
			if(!empty($_GET['region_id'])) {
			$regionStr = $_GET['region_id'];
				}
			$industryStr = '';
			if(!empty($_GET['industrycd'])) {
			$industryStr = $_GET['industrycd'];
				}
			$deptStr = '';
			if(!empty($_GET['dcd'])) {
			$deptStr = $_GET['dcd'];
				}
			$empsizeStr = '';
			if(!empty($_GET['emplzid'])) {
			$empsizeStr = $_GET['emplzid'];
				}
			$revStr = '';
			if(!empty($_GET['revid'])) {
			$revStr = $_GET['revid'];
				}
			$desiStr = '';
			if(!empty($_GET['desid'])) {
			$desiStr = $_GET['desid'];
			}

			$frequency_type = '';
			if(!empty($_GET['frequency_type'])) {
			$frequency_type = $_GET['frequency_type'];
			}
			$frequency = '';
			if(!empty($_GET['frequency'])) {
			$frequency = $_GET['frequency'];
			}

			$emplbound = '';
			if(!empty($_GET['emplbound'])) {
			$emplbound = $_GET['emplbound'];
			}
			$empubound = "";
			if(!empty($_GET['empubound'])) {
			$empubound = $_GET['empubound'];
			}
			$emp_range = null;
			if(isset($emplbound) && $empubound)
				$emp_range = $emplbound . "-" . $empubound;

			$revnlbound = '';
			if(!empty($_GET['revnlbound'])) {
			$revnlbound = $_GET['revnlbound'];
			}
			$revnubound = "";
			if(!empty($_GET['revnubound'])) {
			$revnubound = $_GET['revnubound'];
			}
			$ren_range = null;
			if(isset($emplbound) && $empubound)
				$ren_range = $emplbound ."m -". $empubound."m";
			
			$revnlbound_range = '';
			if(!empty($_GET['revnlbound_range'])) {
			$revnlbound_range = $_GET['revnlbound_range'];
			}
			$revnubound_range = "";
			if(!empty($_GET['revnubound_range'])) {
			$revnubound_range = $_GET['revnubound_range'];
			}
			$sdate=date_create($_GET['startdt']);
			$cdate=date_create($_GET['estclosedt']);
			$closedate = date_format($cdate,"Y/m/d");
			$startdate = date_format($sdate,"Y/m/d");
			$datacampaign = array(
				'clientids' => $_GET['client_id'], 
				'cids' => $_GET['campaign_id'],
				'campnm' => $_GET['campaign_name'],
				'countrycd' => $campaigncountryStr,
				'regioncode' => $regionStr,
				'industrycd' => $industryStr,
				'dcd' => $deptStr,
				'emplbnd' => $emplbound, 
				'empubnd' => $empubound,
				'revlbnd' => $revnlbound, 
				'revubnd' => $revnubound,
				'revlbdim' => $revnlbound_range,
				'revubdim' => $revnubound_range,
				'tid' => $desiStr,
				'suplistnew' =>$_GET['checksupp'],
				'inclistnew' =>$_GET['inclist'],
				'cdcneed' =>$_GET['cdqa'],
				'assetid' => $_GET['assetid'],
				'questnos' =>$_GET['quantity'],
				'status' => $_GET['selectstatus'],			
				'estclosedt' => $closedate,
				'startdt' => $startdate,
				'freqtyp' => $frequency_type,
				'freqid' => $frequency
				// 'Modifieddt' => date("Y-m-d H:i:s")				
				);
			
				$addcampaigndata = $this->Administrator_Model->add_campaign($datacampaign);
				if(isset($addcampaigndata)){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"campaign_id"=>$addcampaigndata,
						"message"=>"Campaign Added Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add Campaign failed.."
					));
				}
								
			
		}

		public function ajax_add_new_campaign1()
		{
			$campaign_id = $_POST['campaign_id'];
	
			$campaigncountryStr = '';
			if(!empty($_POST['country_id'])) {
			$campaigncountryStr = implode(',',$_POST['country_id']);
				}
			$regionStr = '';
			if(!empty($_POST['region_id'])) {
				if($_POST['region_id'] == 0)
				{
					$regionStr = 0;
				}
				else
				{
					$regionStr = implode(',',$_POST['region_id']);
				}
				
			}
			$subregionStr = '';
			if(!empty($_POST['sub_region_id'])) {
				if($_POST['sub_region_id'] == 0)
				{
					$subregionStr = 0;
				}
				else
				{
					$subregionStr = implode(',',$_POST['sub_region_id']);
				}
				
			}
			$sector_id = '';
			if(!empty($_POST['sector_id'])) {
				if($_POST['sector_id'] == 0)
				{
					$sector_id = 0;
				}
				else
				{
					$sector_id = implode(',',$_POST['sector_id']);
				}
			
			}
			$industryStr = '';
			if(!empty($_POST['industrycd'])) {
				if($_POST['industrycd'] == 0)
				{
					$industryStr = 0;
				}
				else
				{
					$industryStr = implode(',',$_POST['industrycd']);
				}
			
			}
			$deptStr = '';
			if(!empty($_POST['dcd'])) {
			$deptStr = implode(',',$_POST['dcd']);
				}
			// $empsizeStr = '';
			// if(!empty($_POST['emplzid'])) {
			// $empsizeStr = $_POST['emplzid'];
			// 	}
			// $revStr = '';
			// if(!empty($_POST['revid'])) {
			// $revStr = $_POST['revid'];
			// 	}
			$joblevelids = '';
			if(!empty($_POST['levelid'])) {
				$joblevelids = implode(',',$_POST['levelid']);
			}

			$desiStr = '';
			if(!empty($_POST['desid'])) {
			$desiStr = implode(',',$_POST['desid']);
			}

			$frequency_type = '';
			if(!empty($_POST['frequency_type'])) {
			$frequency_type = $_POST['frequency_type'];
			}
			$frequency = '';
			if(!empty($_POST['frequency'])) {
			$frequency = implode(',',$_POST['frequency']);
			}

			$emplbound = '';
			if(!empty($_POST['emplbound'])) {
			$emplbound = $_POST['emplbound'];
			}
			$empubound = "";
			if(!empty($_POST['empubound'])) {
			$empubound = $_POST['empubound'];
			}
			$emp_range = null;
			if(isset($emplbound) && $empubound)
				$emp_range = $emplbound . "-" . $empubound;

			$revnlbound = '';
			if(!empty($_POST['revnlbound'])) {
			$revnlbound = $_POST['revnlbound'];
			}
			$revnubound = "";
			if(!empty($_POST['revnubound'])) {
			$revnubound = $_POST['revnubound'];
			}
			// $ren_range = null;
			// if(isset($emplbound) && $empubound)
			// 	$ren_range = $emplbound .$str[0]"-". $empubound.$str[0];;
			
			$revnlbound_range = '';
			if(!empty($_POST['revnlbound_range'])) {
			$revnlbound_range = $_POST['revnlbound_range'];
			}
			$revnubound_range = "";
			if(!empty($_POST['revnubound_range'])) {
			$revnubound_range = $_POST['revnubound_range'];
			}
			$period = $_POST['period'];

			$question = 0;
			if(!empty($_POST['quantity'])) {
				$question = $_POST['quantity'];
			}
			
			$sdate=date_create($_POST['startdt']);
			$cdate=date_create($_POST['estclosedt']);
			$closedate = date_format($cdate,"Y/m/d");
			$startdate = date_format($sdate,"Y/m/d");
			$datacampaign = array(
				'clientids' => $_POST['client_id'], 
				'cids' => $_POST['campaign_id'],
				'campnm' => $_POST['campaign_name'],
				'subregioncode' => $subregionStr,
				'countrycd' => $campaigncountryStr,
				'regioncode' => $regionStr,
				'industrycd' => $sector_id,
				'subindustrycd' => $industryStr,
				'dcd' => $deptStr,
				// 'emplzid' => $empsizeStr,
				// 'comzid' => $revStr,
				'joblevelids' => $joblevelids,
				'tid' => $desiStr,
				'suplistnew' =>$_POST['checksupp'],
				'inclistnew' =>$_POST['inclist'],
				'jobtitleexl' =>$_POST['jobtitleexl'],
				'cdcneed' =>$_POST['cdqa'],
				'assetid' => $_POST['assetid'],
				'questnos' =>$question,
				'status' => $_POST['selectstatus'],			
				'estclosedt' => $closedate,
				'startdt' => $startdate,
				'freqtyp' => $frequency_type,
				'freqid' => $frequency,
				'emplbnd' => $emplbound, 
				'empubnd' => $empubound,
				'revlbnd' => $revnlbound, 
				'revubnd' => $revnubound,
				'revlbdim' => $revnlbound_range,
				'revubdim' => $revnubound_range,
				'period' => $period,
				// 'Modifieddt' => date("Y-m-d H:i:s")
				
								
				);
			
			//   print_r($datacampaign);
			//      exit();
			
				$addcampaigndata = $this->Administrator_Model->add_campaign($datacampaign);
				// print_r(addcampaigndata); 

				if($addcampaigndata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"campaign_id"=>$addcampaigndata,
						"message"=>"Campaign Added Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Add Campaign failed.."
					));
				}
								
			
		}
}