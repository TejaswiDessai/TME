<?php
	class Cdc extends CI_Controller
	{
		


		function addlead($page = 'add-lead'){

			$data['title'] = 'Create Lead';
			// print_r($_SESSION);
			// print_r($_SESSION['user_id']);
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

						$data['dataforcdqa'] = $this->Administrator_Model->get_dataforCDQA_byCampaign($camp_id);
			// print_r($data['dataforcdqa']);
						


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

		public function ajax_add_new_leadandcdc()
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


				$old_date = date('y-m-d-h-i-s');            // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				$datacdcandlead = array(
				'cnid' => $_GET['campaign_id'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['jlevel'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $_GET['phext'],
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $_GET['timezone'],
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $_GET['sectyp'],
				'empsize' => $_GET['empsize'],
				'arevenue' => $_GET['arevenue'],
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $_GET['aum'],
				'atitle' => $_GET['assetid'],

				'optin' => $_GET['optin'],
				'optpst' => $_GET['optpst'],
				'optph' => $_GET['optph'],
				'opteml' => $_GET['opteml'],
				

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
				'pload' => '1', // next level ready to load

				

				// 'svagtidi' => '1' // save Agent Name
				// 'svdti' => '1' // save date time
				'stagtidi' => $_SESSION['user_id'], // submit agent name
				'stdti' => $new_date // submit date time
								
				);
			
			//   print_r($datacdcandlead);
			    //  exit();
			
				$addleadandcdcdata = $this->Administrator_Model->add_leadandcdc($datacdcandlead);
				// print_r(addcampaigndata); 

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


				$old_date = date('y-m-d-h-i-s');            // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				$datacdcandlead = array(
				'cnid' => $_GET['campaign_id'],
				
				'sal' => $_GET['sal'],
				'fname' => $_GET['fname'],
				'lname' => $_GET['lname'],
				'conname' => $conname, //concate strings
				'jtitle' => $_GET['jtitle'],
				// 'desid' => $_GET['desid'],

				'jlevel' => $_GET['jlevel'],
				'dname' => $_GET['dcd'], //department
				'email' => $_GET['email'],
				'phone' => $_GET['phone'],
				'altphn' => $_GET['altphn'],

				'phext' => $_GET['phext'],
				'plink' => $_GET['plink'],
				'cname' => $_GET['company_name'],
				'address' => $_GET['address'],

				'city' => $_GET['city'],
				'state' => $_GET['state'],
				'zipcode' => $_GET['zip_code'],
				'country' => $_GET['country_id'],
				'timez' => $_GET['timezone'],
				'ctyp' => $_GET['ctype'],
			
				'linetype' => $_GET['linetype'],
				'indtry' => $_GET['industrycd'],
				'sindtry' => $_GET['subindustrycd'],

				'sectyp' => $_GET['sectyp'],
				'empsize' => $_GET['empsize'],
				'arevenue' => $_GET['arevenue'],
				'mlbl' => $_GET['mlbl'],
				'curr' => $_GET['curr'],

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				'aum' => $_GET['aum'],
				'atitle' => $_GET['assetid'],

				'optin' => $_GET['optin'],
				'optpst' => $_GET['optpst'],
				'optph' => $_GET['optph'],
				'opteml' => $_GET['opteml'],
				

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
				'pload' => '0', // No next level ready to load- save means here

				

				'svagtidi' => $_SESSION['user_id'], // save Agent Name
				'svdti' => $new_date // save date time
				//'stagtidi' => '1', // submit agent name
				//'stdti' => $new_date // submit date time
				


								
				);
			
			//   print_r($datacdcandlead);
			    //  exit();
			
				$addleadandcdcdata = $this->Administrator_Model->add_leadandcdc($datacdcandlead);
				// print_r(addcampaigndata); 

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
			
				

				$old_date = date('y-m-d-h-i-s');            // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				$datacdcandlead = array(
				// 'cnid' => $_GET['campaign_id'],
				
				
				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				
				// tag
				'cdcload' => '1', // submit to next level

				

				'cdcsbagti' => $_SESSION['user_id'], // save Agent Name
				'cdcsbdti' => $new_date // save date time
				//'stagtidi' => '1', // submit agent name
				//'stdti' => $new_date // submit date time
				


								
				);
			
			//   print_r($datacdcandlead);
			    //  exit();
				
				$updateleadandcdcdata = $this->Administrator_Model->update_leadandcdcbyCDQA($datacdcandlead,$campaign_id);
				// print_r(addcampaigndata); 

				if($updateleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$updateleadandcdcdata,
						"message"=>"Lead updated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead updated  failed.."
					));
				}
								
			
		}
		public function ajax_save_leadandcdcbyCDQA()
		{
			$campaign_id = $_GET['campaign_id'];
			
				

				$old_date = date('y-m-d-h-i-s');            // works
				$middle = strtotime($old_date);             // returns bool(false)
				$new_date = date('Y-m-d H:i:s', $middle);

				$datacdcandlead = array(
				// 'cnid' => $_GET['campaign_id'],
				
				

				'domain' => $_GET['domain'],
				'indlink' => $_GET['indlink'],
				'revszlink' => $_GET['revszlink'],
				'empszlink' => $_GET['empszlink'],
				'pcomt' => $_GET['pcomt'],

				'othrlink' => $_GET['othrlink'],

				'emailver' => $_GET['emailver'],
				
				// tag
				'cdcsv' => '1', // Save only

				

				'cdcsvagti' => $_SESSION['user_id'], // save Agent Name
				'cdcsvdti' => $new_date // save date time
				//'stagtidi' => '1', // submit agent name
				//'stdti' => $new_date // submit date time
				


								
				);
			
			//   print_r($datacdcandlead);
			    //  exit();
			
				$updateleadandcdcdata = $this->Administrator_Model->update_leadandcdcbyCDQA($datacdcandlead,$campaign_id);
				// print_r(addcampaigndata); 

				if($updateleadandcdcdata == true){
			
					echo json_encode(array(
						"statusCode"=>"Success",
						"lead_id"=>$updateleadandcdcdata,
						"message"=>"Lead updated Successfully.."
					));
				}else{
					echo json_encode(array(
						"statusCode"=>"Fail",
						"message"=>"Lead updated  failed.."
					));
				}
								
			
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