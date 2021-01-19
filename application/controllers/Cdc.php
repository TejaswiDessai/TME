<?php
	class Cdc extends CI_Controller
	{
		


		function addlead($page = 'add-lead'){

			$data['title'] = 'Create Lead';
			
						$postData = $this->input->post();
						$postData1 = $postData['campaign_id'];
						// print_r($postData1);

						$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData1);

						foreach ($data['campaigns'] as $camp) {
						
						}
						// echo $camp['cnid'];
						$camp_id = $camp['cnid'];
						// print_r($data['campaigns']);
						

                        $data['countries'] = $this->Administrator_Model->get_countriesbyCampaign($camp_id);
                       
						$data['industries'] = $this->Administrator_Model->get_industries_byCampaign($camp_id);
						$data['industries'] = $this->Administrator_Model->get_subindustries_byCampaign($camp_id);

                        $data['departments'] = $this->Administrator_Model->get_depts_byCampaign($camp_id);
                       
						$data['designation'] = $this->Administrator_Model->get_designation_byCampaign($camp_id);
						$data['joblevel'] = $this->Administrator_Model->get_joblevels_byCampaign($camp_id);
					
						$data['timezones'] = $this->Administrator_Model->get_timezonesbyCampaign($camp_id);
						$data['currency'] = $this->Administrator_Model->get_currencybyCampaign($camp_id);
						// print_r($data['timezones']);
						$data['comptype'] = $this->Administrator_Model->get_comptype();
						
						$data['assetitle'] = $this->Administrator_Model->get_assetitle_byCampaign($camp_id);
						// $data['questions'] = $this->Administrator_Model->get_questions_byCampaign($camp_id);
			
						


			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			 $this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		
		}
		function selectCampaign($page = 'select-campaign'){
			$data['title'] = 'Create Lead';
			$data['campaigns'] = $this->Administrator_Model->get_campaign();
                        $data['clients'] = $this->Administrator_Model->get_clients();
                        $data['countries'] = $this->Administrator_Model->get_countries();
                        $data['regions'] = $this->Administrator_Model->get_regions();
                        $data['industries'] = $this->Administrator_Model->get_industries();
                        $data['departments'] = $this->Administrator_Model->get_depts();
                        $data['empsize'] = $this->Administrator_Model->get_empsize();
                        $data['revsize'] = $this->Administrator_Model->get_revenuesize();
						$data['designation'] = $this->Administrator_Model->get_designation();
						$data['timezones'] = $this->Administrator_Model->get_timezones();
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
		
		}

		public function checkemail(){ 
			
			
			$email = $_GET['email'];
			
			// get data 
			// $data = $this->Administrator_Model->check_unique_email($email);

			$data['inclusionemail'] = $this->Administrator_Model->check_inclusion_email($email);


			// if ($data['inclusionemail'] == true){
				$data['exclusionemail'] = $this->Administrator_Model->check_suppression_email($email);
				// print_r($data['exclusionemail']);
			// }
			
			
			echo json_encode($data); 
		  }
		public function checkdomain(){ 
			
			
			$domain = $_GET['domain'];
			
			// get data 
			// $data = $this->Administrator_Model->check_unique_email($email);

			$data['domainchecksupp'] = $this->Administrator_Model->check_domain_suppression($domain);
			$data['domaincheckincl'] = $this->Administrator_Model->check_domain_incl($domain);

			// print_r($data['domainchecksupp']); die;
			
			echo json_encode($data); 
		  }
		public function checkcompanylist(){ 
			
			
			$company_name = $_GET['company_name'];
			
			// get data 
			// $data = $this->Administrator_Model->check_unique_email($email);

			$data['companychecksupp'] = $this->Administrator_Model->check_company_suppression($company_name);
			$data['companycheckincl'] = $this->Administrator_Model->check_company_incl($company_name);

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



	}