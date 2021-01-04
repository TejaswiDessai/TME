<?php
	class Campaigns extends CI_Controller
	{
		
         public function add_campaign($page = 'add-campaign')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Create Campaigns';
                        $data['clients'] = $this->Administrator_Model->get_clients();
                        $data['countries'] = $this->Administrator_Model->get_countries();
                        $data['regions'] = $this->Administrator_Model->get_regions();
                        $data['industries'] = $this->Administrator_Model->get_industries();
                        $data['departments'] = $this->Administrator_Model->get_depts();
                        $data['empsize'] = $this->Administrator_Model->get_empsize();
                        $data['revsize'] = $this->Administrator_Model->get_revenuesize();
                        $data['designation'] = $this->Administrator_Model->get_designation();
                        


			$this->form_validation->set_rules('client_id', 'Client ID', 'required');
			$this->form_validation->set_rules('campaign_name', 'Campaign Name', 'required');
			$this->form_validation->set_rules('campaign_id', 'Campaign ID', 'required|numeric');
			$this->form_validation->set_rules('country_id[]', 'Country', 'required');
			$this->form_validation->set_rules('region_id[]', 'World Region', 'required');
			$this->form_validation->set_rules('industrycd[]', 'Industry', 'required');
			$this->form_validation->set_rules('dcd[]', 'Department', 'required');
			$this->form_validation->set_rules('emplzid[]', 'Employee', 'required');
			$this->form_validation->set_rules('revid[]', 'Revenue', 'required');
			$this->form_validation->set_rules('desid[]', 'Designation', 'required');
			$this->form_validation->set_rules('quantity', 'Number', 'required');
			$this->form_validation->set_rules('estclosedt', 'Est completion Date ', 'required');
			$this->form_validation->set_rules('startdt', 'Start Date', 'required');
                        $this->form_validation->set_error_delimiters(' <spann style="font-size:12px;color:red">', '</span><br>');
                        
                        
//			$this->form_validation->set_rules('campaign_name', 'campaign_name', 'required|callback_check_username_exists');
//			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

                         
//                            if(!empty($_POST['country_id'])) {
//                                $country_id = array();
//                                foreach($_POST['country_id'] as $utjtdlist){
//                                    if(!empty($utjtdlist)){
//                                        $country_id[] = $utjtdlist;
//                                    }
//                                }
//
//
//                            $campaigncountryStr = implode(',',$country_id);
//                            }
                        if($_POST){
                        $checkedsupp = (isset($_POST['suppchk']))?true:false;
                        $checkedinc = (isset($_POST['inclist']))?true:false;
                        $checkecdqa = (isset($_POST['cdqa']))?true:false;
                        
                      
                        $campaigncountryStr = '';
                        if(!empty($_POST['country_id'])) {
                        $campaigncountryStr = implode(',',$_POST['country_id']);
//                        echo $campaigncountryStr;
                         }
                        $regionStr = '';
                        if(!empty($_POST['region_id'])) {
                        $regionStr = implode(',',$_POST['region_id']);
//                        echo $regionStr;
                         }
                        $industryStr = '';
                        if(!empty($_POST['industrycd'])) {
                        $industryStr = implode(',',$_POST['industrycd']);
//                        echo $industryStr;
                         }
                        $deptStr = '';
                        if(!empty($_POST['dcd'])) {
                        $deptStr = implode(',',$_POST['dcd']);
//                        echo $deptStr;
                         }
                        $empsizeStr = '';
                        if(!empty($_POST['emplzid'])) {
                        $empsizeStr = implode(',',$_POST['emplzid']);
//                        echo $deptStr;
                         }
                        $revStr = '';
                        if(!empty($_POST['revid'])) {
                        $revStr = implode(',',$_POST['revid']);
//                        echo $deptStr;
                         }
                        $desiStr = '';
                        if(!empty($_POST['desid'])) {
                        $desiStr = implode(',',$_POST['desid']);
//                        echo $deptStr;
                         }
                         
                        
                        $datacampaign = array(
                                                        'clientids' => $this->input->post('client_id'), 
							'cids' => $this->input->post('campaign_id'),
							'campnm' => $this->input->post('campaign_name'),
							'countrycd' => $campaigncountryStr,
							'regioncode' => $regionStr,
							'industrycd' => $industryStr,
							'dcd' => $deptStr,
							'emplzid' => $empsizeStr,
							'comzid' => $revStr,
							'tid' => $desiStr,
							'SuplistNew' =>$checkedsupp,
							'Inclistnew' =>$checkedinc,
							'cdcneed' =>$checkecdqa,
							'questnos' =>$this->input->post('quantity'),
							'status' => $this->input->post('selectstatus'),
							
//							'image' => $post_image,
							
							'estclosedt' => $this->input->post('estclosedt'),
							'startdt' => $this->input->post('startdt'),
							'Modifieddt' => date("Y-m-d H:i:s")
                            
                                          
						  );
                        
//                        print_r($datacampaign);
//                        exit();
                        }
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
//				$config['upload_path'] = './assets/images/users';
//				$config['allowed_types'] = 'gif|jpg|png|jpeg';
//				$config['max_size'] = '2048';
//				$config['max_width'] = '2000';
//				$config['max_height'] = '2000';
//
//				$this->load->library('upload', $config);
//
//				if(!$this->upload->do_upload()){
//					$errors =  array('error' => $this->upload->display_errors());
//					$post_image = 'noimage.jpg';
//				}else{
//					$data =  array('upload_data' => $this->upload->data());
//					$post_image = $_FILES['userfile']['name'];
//				}
                            
//                               $post_image = $this->input->post('campaign_name');
                            
                            
                                $this->Administrator_Model->add_campaign($datacampaign);

				//Set Message
				$this->session->set_flashdata('success', 'Campaign has been added Successfull.');
				redirect('administrator/dashboard');
//                                redirect('campaigns/campaign');
			}
			
		}
                
                public function campaign($offset = 0)
		{
                     $this->load->model('Administrator_Model');
			// Pagination Config
			$config['base_url'] = base_url(). 'campaigns/campaign/';
			$config['total_rows'] = $this->db->count_all('campaign');
			$config['per_page'] = 3;
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


	}