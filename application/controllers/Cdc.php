<?php
	class Cdc extends CI_Controller
	{
		


		function addlead($page = 'add-lead'){
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