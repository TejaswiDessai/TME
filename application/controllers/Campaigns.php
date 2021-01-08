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
                        $campaigncountryStr = implode(',',$_GET['country_id']);
                         }
                        $regionStr = '';
                        if(!empty($_GET['region_id'])) {
                        $regionStr = implode(',',$_GET['region_id']);
                         }
                        $industryStr = '';
                        if(!empty($_GET['industrycd'])) {
                        $industryStr = implode(',',$_GET['industrycd']);
                         }
                        $deptStr = '';
                        if(!empty($_GET['dcd'])) {
                        $deptStr = implode(',',$_GET['dcd']);
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
                        $desiStr = implode(',',$_GET['desid']);
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
							'startdt' => $_GET['startdt']
							// 'Modifieddt' => date("Y-m-d H:i:s")
                            
                                          
						  );
                        
						//   print_r($datacampaign);
						//      exit();
						
							$addcampaigndata = $this->Administrator_Model->add_campaign($datacampaign);
							// print_r(addcampaigndata); 

							if($addcampaigndata == true){
						
								echo json_encode(array(
									"statusCode"=>"Success",
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

			$data['campaigns'] = $this->Administrator_Model->get_campaign(FALSE, $config['per_page'], $offset);

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

		function addsuppressionList($page = 'suppression-list'){
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


	}