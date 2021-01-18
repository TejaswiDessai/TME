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
						

                        $data['clients'] = $this->Administrator_Model->get_clients();
                        $data['countries'] = $this->Administrator_Model->get_countriesbyCampaign($camp_id);
                        $data['regions'] = $this->Administrator_Model->get_regions();
						$data['industries'] = $this->Administrator_Model->get_industries_byCampaign($camp_id);
						$data['industries'] = $this->Administrator_Model->get_subindustries_byCampaign($camp_id);

                        $data['departments'] = $this->Administrator_Model->get_depts_byCampaign($camp_id);
                        $data['empsize'] = $this->Administrator_Model->get_empsize();
                        $data['revsize'] = $this->Administrator_Model->get_revenuesize();
						$data['designation'] = $this->Administrator_Model->get_designation_byCampaign($camp_id);
					
						$data['timezones'] = $this->Administrator_Model->get_timezonesbyCampaign($camp_id);
						// print_r($data['timezones']);
						$data['lbound'] = $this->Administrator_Model->get_empsize();
						$data['ubound'] = $this->Administrator_Model->get_empsize();

						$data['revnlbound'] = $this->Administrator_Model->get_revenuesize();
						$data['revnubound'] = $this->Administrator_Model->get_revenuesize();
						$data['assetitle'] = $this->Administrator_Model->get_assetitle_byCampaign($camp_id);
			
						


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

		public function getAjaxcampaign(){ 
			// POST data 
			$postData = $this->input->post();
			// print_r($postData);
			// $desiStr = implode(',',$postData);
			// load model 
			// $this->load->model('Main_model');
			
			// get data 
			$data = $this->Administrator_Model->get_campaign($postData);
			echo json_encode($data); 
		  }


	}