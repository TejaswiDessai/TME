<?php 
	class Administrator extends CI_Controller{

		public function __construct() {
			parent:: __construct();
	
			$this->load->helper('url');
			$this->load->library('session');
		}

		public function view($page = 'index'){
			if($this->session->userdata('login')) {
    			redirect('administrator/dashboard');
   			}

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/index');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function home($page = 'home'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function dashboard($page = 'dashboard'){
		   if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
		   $data['title'] = ucfirst($page);
		   $this->load->view('administrator/header-script');
		   $this->load->view('administrator/header');
		   $this->load->view('administrator/header-bottom');
		   $this->load->view('administrator/'.$page, $data);
		   $this->load->view('administrator/footer');
		}

	 

	  // Log in Admin
		public function adminLogin(){
			$data['title'] = 'Admin Login';

			$this->form_validation->set_rules('emp_id', 'Employee Id', 'numeric|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('ctype', 'Company Type', 'required');
			if($this->form_validation->run() === FALSE){
				//$data['title'] = ucfirst($page);
				$this->load->view('administrator/header-script');
				//$this->load->view('administrator/header');
				//$this->load->view('administrator/header-bottom');
				$this->load->view('administrator/index', $data);
				$this->load->view('administrator/footer');
			}else{
				// get email and Encrypt Password
				$emp_id = $this->input->post('emp_id');
				$encrypt_password = md5($this->input->post('password'));
				$ctype = $this->input->post('ctype');

				$user_id = $this->Administrator_Model->adminLogin($emp_id, $encrypt_password,$ctype);
				// print_r($ctype); exit();
//				$sitelogo = $this->Administrator_Model->update_siteconfiguration(1);
		if ($user_id) {
                    $tt=date_default_timezone_get();
echo $tt;
$date = new DateTime('now');
echo $date;
		
					//Create Session
					$user_data = array(
								'emp_id' => $user_id->emp_id,
								'empcode' => $user_id->empcode,
				 				'username' => $user_id->fname,
				 				'fname' => $user_id->fname,
				 				'login' => true,
								 'role' => $user_id->role,
								 'timeout' => time(),
								 
//				 				'image' => $user_id->image,
//				 				'site_logo' => $sitelogo['logo_img']
				 	);

					 $this->session->set_userdata($user_data);
					
					$empcode = $this->session -> userdata('empcode');
					// $this->Administrator_Model->update_recordlockonlogin($empcode);
					
					//Set Message
					$this->session->set_flashdata('success', 'Welcome to administrator Dashboard.');
					redirect('administrator/dashboard');

					 





				}else{
					$this->session->set_flashdata('danger', 'Login Credential in invalid!');
					redirect('administrator/index');
				}
				
			}
		}

				// log admin out
		public function logout(){
			// unset user data

			$this->Administrator_Model->update_recordlockonlogin($this->session -> userdata('empcode'));

			$this->db->where('empid',  $this->session -> userdata('emp_id'));
			$this->db->update('userlog', array('empid' => $this->session -> userdata('emp_id'),'logout'=> date('Y-m-d H:i:s'))); 

			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			$this->session->unset_userdata('emp_id');
			$this->session->unset_userdata('empcode');
			$this->session->unset_userdata('image');
			$this->session->unset_userdata('site_logo');
			$this->session->unset_userdata('token');
			//Set Message
			$this->session->set_flashdata('success', 'You are logged out.');
			
			// redirect(base_url().'administrator/index');
			redirect(base_url());
		}

		public function forget_password($page = 'forget-password'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function add_user($page = 'add-user')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Create User';

			$data['emp_id'] = $this->Administrator_Model->get_empid();
			$data['roles'] = $this->Administrator_Model->get_roles();
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				// $config['upload_path'] = './assets/images/users';
				// $config['allowed_types'] = 'gif|jpg|png|jpeg';
				// $config['max_size'] = '2048';
				// $config['max_width'] = '2000';
				// $config['max_height'] = '2000';

				// $this->load->library('upload', $config);

				// if(!$this->upload->do_upload()){
				// 	$errors =  array('error' => $this->upload->display_errors());
				// 	$post_image = 'noimage.jpg';
				// }else{
				// 	$data =  array('upload_data' => $this->upload->data());
				// 	$post_image = $_FILES['userfile']['name'];
				// }
				$post_image = 'noimage.jpg';
				$password = md5('Test@123');

				$this->Administrator_Model->add_user($post_image,$password);

				echo json_encode(array(
					"statusCode"=>200
				));
				//Set Message
				// $this->session->set_flashdata('success', 'User has been created Successfull.');
				// redirect('administrator/users');
			}
			
		}
             


		// Check user name exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}


		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}

		public function users($offset = 0)
		{
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/users/';
			$config['total_rows'] = $this->db->count_all('users');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Users';

			$data['users'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);

			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/users', $data);
		  		$this->load->view('administrator/footer');
		}

		public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->enable($id,$table);       
			// $this->session->set_flashdata('success', 'Desabled Successfully.');
			// header('Location: ' . $_SERVER['HTTP_REFERER']);
			echo json_encode(array(
				"success"=>"success"
			));
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->desable($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function update_user($id = NULL)
		{
			$data['user'] = $this->Administrator_Model->get_user($id);
			$data['roles'] = $this->Administrator_Model->get_roles();
			$data['teams'] = $this->Administrator_Model->get_teams();
			if (empty($data['user'])) {
				show_404();
			}
			$data['title'] = 'Update User';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-user', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_user_data($page = 'update-user')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Update User';

			//$data['add-user'] = $this->Administrator_Model->get_categories();

			$this->form_validation->set_rules('emp_id', 'emp_id', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$id = $this->input->post('id');
					$data['img'] = $this->Administrator_Model->get_user($id);
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->Administrator_Model->update_user_data($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('administrator/users');
			}
			
		}


		public function create_product_category()
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			
			$data['title'] = 'Create Category';
			$this->form_validation->set_rules('name', 'Category Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/add-product-category', $data);
		  		 $this->load->view('administrator/footer');
			}else{
				$this->Administrator_Model->create_product_category();

				//Set Message
				$this->session->set_flashdata('category_created', 'Your category has been created.');
				redirect('administrator/product-categories');
			}
		}
		public function product_categories()
		{
			$data['title'] = 'Product Categories';
			$data['product_categories'] = $this->Administrator_Model->product_categories();

			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/product-categories', $data);
		  		 $this->load->view('administrator/footer');
		}

		public function update_product_category($id = NULL)
		{

			$data['productcategory'] = $this->Administrator_Model->update_product_category($id);
			//print_r($data['productcategory']);exit;
			
			if (empty($data['productcategory'])) {
				show_404();
			}
			$data['title'] = 'Update Product Category';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-product-category', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_product_category_data()
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update Product Category';
			$this->form_validation->set_rules('name', 'Category Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/update-product-category', $data);
		  		 $this->load->view('administrator/footer');
			}else{
				$this->Administrator_Model->update_product_category_data();

				//Set Message
				$this->session->set_flashdata('success', 'Your category has been Updated Successfully.');
				redirect('administrator/product-categories');
			}
		}

		public function create_product($page = 'add-product')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['product_categories'] = $this->Administrator_Model->product_categories();
			
			$data['title'] = 'Create Product';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('sku', 'SKU', 'required|callback_check_sku_exists');
			$this->form_validation->set_rules('price', 'Price', 'required');
			if (empty($_FILES['userfile']['name'])){
    		$this->form_validation->set_rules('userfile', 'Document', 'required');
			}
			$this->form_validation->set_rules('description', 'Product Description', 'required');
			$this->form_validation->set_rules('quantity', 'Quantity', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/products';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$dataID = $this->Administrator_Model->create_product($post_image);

				//$dataID = 1; 
				if (!empty($_FILES['imgFiles']['name'])){
				$multipleUpload =  $this->multipleImageUpload($_FILES['imgFiles'],$dataID);
				}
				//Set Message
				$this->session->set_flashdata('success', 'Product has been Added Successfull.');
				redirect('administrator/products');
			}
			
		}

	public function multipleImageUpload($images,$dataID){
		$images == $_FILES['imgFiles'];
        $data = array();
        if(!empty($_FILES['imgFiles']['name'])){
            $filesCount = count($_FILES['imgFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['imgFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['imgFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['imgFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['imgFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['imgFiles']['size'][$i];

                $uploadPath = './assets/images/products_multiple/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                     $uploadData[$i]['product_id'] = $dataID;
                   /* $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");*/
                }
            }
            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->Administrator_Model->insertproductsmultipleImages($uploadData);
                return $insert;
               /* $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('success',$statusMsg);*/
            }
        }
    }
		// Check Product SKU  exists
		public function check_sku_exists($sku){
			$this->form_validation->set_message('check_sku_exists', 'That SKU is already taken, Please choose a different one.');

			if ($this->Administrator_Model->check_sku_exists($sku)) {
				return true;
			}else{
				return false;
			}
		}

		public function get_products()
		{
			$data['products'] = $this->Administrator_Model->get_products();
			
			if (empty($data['products'])) {
				show_404();
			}
			$data['title'] = 'List products';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/products', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_products($id = NULL)
		{
			$data['product_categories'] = $this->Administrator_Model->product_categories();
			$data['productsDetails'] = $this->Administrator_Model->update_products($id);
			$productId = $data['productsDetails']['id'];
			$data['productImages'] = $this->Administrator_Model->product_images($productId);
			
			if (empty($data['productsDetails'])) {
				show_404();
			}
			$data['title'] = 'Update Details';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-products', $data);
	  		$this->load->view('administrator/footer');
		}


		public function update_products_data($page = 'update-product')
		{

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update Product';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			$this->form_validation->set_rules('description', 'Product Description', 'required');
			$this->form_validation->set_rules('quantity', 'Quantity', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');

			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/products';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$data['productsDetails'] = $this->Administrator_Model->update_products($this->input->post('id'));
					$post_image = $data['productsDetails']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$dataID = $this->Administrator_Model->update_products_data($post_image);

				//$dataID = 1; 
				if (!empty($_FILES['imgFiles']['name'])){
				$multipleUpload =  $this->multipleImageUpload($_FILES['imgFiles'],$this->input->post('id'));
				}
				//Set Message
				$this->session->set_flashdata('success', 'Product has been Updated Successfull.');
				redirect('administrator/products');
			}
		}

		public function create_faq_category()
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Create FAQ Category';
			$this->form_validation->set_rules('name', 'FAQ Category Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/add-faq-category', $data);
		  		 $this->load->view('administrator/footer');
			}else{
				$this->Administrator_Model->create_faq_category();
				//Set Message
				$this->session->set_flashdata('success', 'category has been created successfully.');
				redirect('administrator/faq-categories');
			}
		}
		public function faq_categories()
		{
			$data['title'] = 'FAQ Categories';
			$data['faq_categories'] = $this->Administrator_Model->faq_categories();

			 	$this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/faq-categories', $data);
		  		 $this->load->view('administrator/footer');
		}

		public function update_faq_category($id = NULL)
		{

			$data['faqcategory'] = $this->Administrator_Model->update_faq_category($id);

			$data['title'] = 'Update FAQ Category';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-faq-category', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_faq_category_data()
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update FAQ Category';
			$this->form_validation->set_rules('name', 'Category Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/update-faq-category', $data);
		  		 $this->load->view('administrator/footer');
			}else{
				$this->Administrator_Model->update_faq_category_data();
				//Set Message
				$this->session->set_flashdata('success', 'Your category has been Updated Successfully.');
				redirect('administrator/faq-categories');
			}
		}

		//########################## functions start of faq ##############################

		public function create_faq($page = 'add-faq')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['faq_categories'] = $this->Administrator_Model->faq_categories();
			
			$data['title'] = 'Create FAQ';

			$this->form_validation->set_rules('question', 'Question', 'required');
			$this->form_validation->set_rules('answer', 'Answer', 'required');
			$this->form_validation->set_rules('faq_cat_id', 'FAQ Category Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				 $this->Administrator_Model->create_faq();
				//Set Message
				$this->session->set_flashdata('success', 'FAQ has been Added Successfull.');
				redirect('administrator/faqs');
			}
			
		}

	

		public function get_faqs($page = 'faqs')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}

			$data['faqs'] = $this->Administrator_Model->get_faqs();

			$data['title'] = 'List FAQS';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/faqs', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_faqs($id = NULL)
		{
			$data['faq_categories'] = $this->Administrator_Model->faq_categories();
			$data['faqsDetails'] = $this->Administrator_Model->update_faqs($id);
			
			$data['title'] = 'Update Details';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-faqs', $data);
	  		$this->load->view('administrator/footer');
		}


		public function update_faqs_data($page = 'update-faqs')
		{

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update faq';

			$this->form_validation->set_rules('question', 'Question', 'required');
			$this->form_validation->set_rules('answer', 'Answer', 'required');
			$this->form_validation->set_rules('faq_cat_id', 'FAQ Category Name', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				
				 $this->Administrator_Model->update_faq_data();
				//Set Message
				$this->session->set_flashdata('success', 'FAQ has been Updated Successfull.');
				redirect('administrator/faqs');
			}
		}

		//sco pages start
		public function get_scopages($page = 'scopages')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}

			$data['scopages'] = $this->Administrator_Model->get_scopages();

			$data['title'] = 'List SCO pages';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/scopages', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_scopages($id = NULL)
		{
			$data['scopages'] = $this->Administrator_Model->update_scopages($id);
			
			$data['title'] = 'Update Details';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-scopages', $data);
	  		$this->load->view('administrator/footer');
		}


		public function update_scopages_data($page = 'update-scopages')
		{

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update SCO Details';

			$this->form_validation->set_rules('title', 'Title', 'required');
			/*$this->form_validation->set_rules('answer', 'Answer', 'required');
			$this->form_validation->set_rules('faq_cat_id', 'FAQ Category Name', 'required');*/

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				
				 $this->Administrator_Model->update_scopages_data();
				//Set Message
				$this->session->set_flashdata('success', 'SCO Details has been Updated Successfull.');
				redirect('administrator/scopages');
			}
		}

		//social links
		public function get_sociallinks($page = 'sociallinks')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}

			$data['sociallinks'] = $this->Administrator_Model->get_sociallinks();

			$data['title'] = 'sociallinks';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/sociallinks', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_sociallinks($id = NULL)
		{
			$data['sociallinks'] = $this->Administrator_Model->update_sociallinks($id);
			
			$data['title'] = 'Update sociallinks';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-sociallinks', $data);
	  		$this->load->view('administrator/footer');
		}


		public function update_sociallinks_data($page = 'update-sociallinks')
		{

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update sociallinks';

			$this->form_validation->set_rules('link', 'Link', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				
				 $this->Administrator_Model->update_sociallinks_data();
				//Set Message
				$this->session->set_flashdata('success', 'sociallinks Details has been Updated Successfull.');
				redirect('administrator/sociallinks');
			}
		}


		// sliders
		public function create_slider($page = 'add-slider')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Create Sliders Image';

			//$data['add-user'] = $this->Administrator_Model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			if (empty($_FILES['userfile']['name'])){
    		$this->form_validation->set_rules('userfile', 'Document', 'required');
			}

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/sliders';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->create_slider($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'Slider Image has been created Successfull.');
				redirect('administrator/sliders');
			}
			
		}


		public function get_sliders()
		{
			$data['sliders'] = $this->Administrator_Model->get_sliders();

			$data['title'] = 'Sliders';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/sliders', $data);
	  		$this->load->view('administrator/footer');
		}

		

		public function update_slider($id = NULL)
		{
			$data['sliders'] = $this->Administrator_Model->get_slider_data($id);
			$data['title'] = 'Update Slider';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-slider', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_slider_data($page = 'update-slider')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update Slider';

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				
				$config['upload_path'] = './assets/images/sliders';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$id = $this->input->post('id');
					$data['img'] = $this->Administrator_Model->get_slider_data($id);
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->Administrator_Model->update_slider_data($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'Slider Images has been Updated Successfull.');
				redirect('administrator/sliders');
			}
			
		}

		// blogs functions start
		public function add_blog($page = 'add-blog')
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Add Blog';

			$data['categories'] = $this->Post_Model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.png';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->create_blog($post_image);

				//Set Message
				$this->session->set_flashdata('post_created', 'Your post has been created.');
				redirect('administrator/blogs/list-blog');
			}
			
		}

		public function list_blog($offset = 0){
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/blogs/';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List of Blogs';

			$data['blogs'] = $this->Administrator_Model->listblogs(FALSE, $config['per_page'], $offset);

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/list-blogs', $data);
			$this->load->view('administrator/footer');
		}
		public function update_blog($blog_id = false){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Edit Blog';

			$data['categories'] = $this->Post_Model->get_categories();
			$data['post'] = $this->Administrator_Model->listblogs($blog_id);

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/update-blog', $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$data['postimg'] = $this->Administrator_Model->listblogs($this->input->post('id'));
					$post_image = $data['postimg']['post_image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->Administrator_Model->update_blog_data($post_image);

			    //Set Message
			    $this->session->set_flashdata('success', 'Blog has been Updated Successfully.');
			    redirect('administrator/blogs/list-blog');
			}
		}

		public function list_blog_comments()
		{
			$data['listBlogComments'] = $this->Administrator_Model->list_blog_comments();

			$data['title'] = 'Blog Comments';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/blog-comments', $data);
	  		$this->load->view('administrator/footer');
		}

		public function view_blog_comments($id = NULL)
		{

			$data['viewBlogComments'] = $this->Administrator_Model->view_blog_comments($id);
			$data['title'] = 'View blog Comments';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/view-blog-comment', $data);
	  		$this->load->view('administrator/footer');
		}


		//Site configuration
		public function get_siteconfiguration($page = 'site-configuration')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}

			$data['siteconfiguration'] = $this->Administrator_Model->get_siteconfiguration();

			$data['title'] = 'Site Configuration';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-site-configuration', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_siteconfiguration($id = NULL)
		{
			$data['siteconfiguration'] = $this->Administrator_Model->update_siteconfiguration($id);
			$data['title'] = 'Update Configuration';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-site-configuration', $data);
	  		$this->load->view('administrator/footer');
		}


		public function update_siteconfiguration_data($page = 'update-site-configuration')
		{

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update Configuration';

			$this->form_validation->set_rules('site_title', 'Site Title', 'required');
			$this->form_validation->set_rules('site_name', 'Site Name', 'required');
			
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{

				//Upload Image
				$config['upload_path'] = './assets/images';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$data['logo_imgs'] = $this->Administrator_Model->update_siteconfiguration($this->input->post('id'));
					$post_image = $data['logo_imgs']['logo_img'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				
				 $this->Administrator_Model->update_siteconfiguration_data($post_image);
				//Set Message
				$this->session->set_flashdata('success', 'site configuration Details has been Updated Successfull.');
				redirect('administrator/site-configuration/update/1');
			}
		}



		// pages content details start
		public function get_pagecontents($page = 'page-contents')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}

			$data['pagecontents'] = $this->Administrator_Model->get_pagecontents();

			$data['title'] = 'List pages contents';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/'.$page, $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_pagecontents($id = NULL)
		{
			$data['pagecontents'] = $this->Administrator_Model->update_pagecontents($id);
			
			$data['title'] = 'Update page contents';

			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/update-page-contents', $data);
	  		$this->load->view('administrator/footer');
		}


		public function update_pagecontents_data($page = 'update-page-contents')
		{

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$data['title'] = 'Update Page contents Details';

			$this->form_validation->set_rules('page_name', 'Page Name', 'required');
			$this->form_validation->set_rules('content', 'Page Content', 'required');
			
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				
				 $this->Administrator_Model->update_pagecontents_data();
				//Set Message
				$this->session->set_flashdata('success', 'Page Contents Details has been Updated Successfull.');
				redirect('administrator/page-contents');
			}
		}


		// galleries 
		public function galleries()
		{
			$data['title'] = 'Add Galleries';
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header');
	  		$this->load->view('administrator/header-bottom');
	   		$this->load->view('administrator/add-galleries', $data);
	  		$this->load->view('administrator/footer');
		}
			
			
		public function add_team($page = 'add-team')
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Add Blog';

			$this->form_validation->set_rules('name', 'Team Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/teams';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$team_image = 'noimage.png';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$team_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->create_team($team_image);

				//Set Message
				$this->session->set_flashdata('success', 'Your team has been created.');
				redirect('administrator/team/list');
			}
			
		}

		public function list_team($offset = 0){
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
			$this->load->view('administrator/list-teams', $data);
			$this->load->view('administrator/footer');
		}

		public function update_team($teamId){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Edit Team';

			$data['team'] = $this->Administrator_Model->listteams($teamId);

			$this->form_validation->set_rules('name', 'Team Name', 'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/update-team', $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/teams';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$data['teamimg'] = $this->Administrator_Model->listteams($this->input->post('id'));
					$post_image = $data['teamimg']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->Administrator_Model->update_team_data($post_image);

			    //Set Message
			    $this->session->set_flashdata('success', 'Team has been Updated Successfully.');
			    redirect('administrator/team/list');
			}
		}

		public function add_testimonial($page = 'add-testimonial')
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Add Testimonial';

			$this->form_validation->set_rules('name', 'Testimonial Name', 'required');
			$this->form_validation->set_rules('domain', 'Domain', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/testimonials';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$uploaded_image = 'noimage.png';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$uploaded_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->create_testimonial($uploaded_image);

				//Set Message
				$this->session->set_flashdata('success', 'Testimonial has been created.');
				redirect('administrator/testimonials/list');
			}
			
		}

		public function list_testimonial($offset = 0){
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/team/';
			$config['total_rows'] = $this->db->count_all('teams');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List of Testimonials';

			$data['testimonials'] = $this->Administrator_Model->listtestimonial(FALSE, $config['per_page'], $offset);

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/list-testimonials', $data);
			$this->load->view('administrator/footer');
		}

		public function update_testimonial($id){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Edit Testimonial';

			$data['testimonial'] = $this->Administrator_Model->listtestimonial($id);

			$this->form_validation->set_rules('name', 'Testimonial Name', 'required');
			$this->form_validation->set_rules('domain', 'Domain', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/edit-testimonial', $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/testimonials';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$data['img'] = $this->Administrator_Model->listtestimonial($this->input->post('id'));
					$uploaded_image = $data['img']['image'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$uploaded_image = $_FILES['userfile']['name'];
				}

				$this->Administrator_Model->update_testimonial_data($uploaded_image);
			    //Set Message
			    $this->session->set_flashdata('success', 'Testimonial Updated Successfully.');
			    redirect('administrator/testimonials/list');
			}
		}

		public function get_admin_data()
		{
			$data['changePassword'] = $this->Administrator_Model->get_admin_data();
			$data['title'] = 'Change Password';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
		 	 $this->load->view('administrator/change-password', $data);
	  		$this->load->view('administrator/footer');
		}

		public function change_password($page = 'change_forget_passowod')
		{
			
			$EXPIRATION_TIME = '+20 minutes';
			$u_time = $this->input->get('key'); // fetching time variable from URL
			// Calculate link expiration time
			$currentTime = time();
			// echo $emp_id = $_SESSION['emp_id'];

			$keyTime = explode('-',$u_time);
			$expTime = strtotime($EXPIRATION_TIME, $keyTime[0]);
			if($currentTime <= $expTime)
			{
					// link is not expired
					

				// 	if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				//     show_404();
				//    }
					// Check login
					// if(!$this->session->userdata('login')) {
					// 	redirect('administrator/index');
					// }

					$data['title'] = 'Change password';

					//$data['add-user'] = $this->Administrator_Model->get_categories();

					$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_match_old_password');
					$this->form_validation->set_rules('new_password', 'New Password Field', 'required');
					$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'matches[new_password]');

					if($this->form_validation->run() === FALSE)
					{
						// $data['emp_id'] = $emp_id;
						$this->load->view('administrator/header-script');
						// $this->load->view('administrator/header');
						// $this->load->view('administrator/header-bottom');
						$this->load->view('administrator/'.$page, $data);
						$this->load->view('administrator/footer');
					}
					else{


						$this->Administrator_Model->change_password($this->input->post('new_password'));

						//Set Message
						$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
						redirect('administrator/change-password');
					}
			}
			else
			{
				// link has been expired
				echo "Your link is expired!";
			}
			
		}

		public function change_password_action()
		{
			$this->Administrator_Model->change_password($this->input->post('new_password'),$this->input->post('emp_id'));
			// remove all session variables
			// session_unset();

			// // destroy the session
			// session_destroy();
			// $this->session->unset_userdata('emp_id'); 
			//Set Message
			$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
			redirect('administrator/change-password');
		}
		// Check user name exists
		public function match_old_password($old_password){
			
			$this->form_validation->set_message('match_old_password', 'Current Password Does not matched, Please Try Again.');
			$password = md5($old_password);
			$que = $this->Administrator_Model->match_old_password($password);
			if ($que) {
				return true; 
			}else{
				return false;
			}
		}

		public function update_admin_profile()
		{
			$data['user'] = $this->Administrator_Model->get_admin_data();
			$data['roles'] = $this->Administrator_Model->get_roles();
			$data['title'] = 'Update Profile';

			$this->load->view('administrator/header-script');
	 	 	 $this->load->view('administrator/header');
	  		 $this->load->view('administrator/header-bottom');
	   		 $this->load->view('administrator/update-profile', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_admin_profile_data($page = 'update-profile')
		{
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Update Profile';

			//$data['add-user'] = $this->Administrator_Model->get_categories();

			$this->form_validation->set_rules('fname', 'fname', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header');
		  		 $this->load->view('administrator/header-bottom');
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

//				if(!$this->upload->do_upload()){
//					$id = $this->input->post('id');
//					$data['img'] = $this->Administrator_Model->get_user($id);
//					$errors =  array('error' => $this->upload->display_errors());
//					$post_image = $data['img']['image'];
//				}else{
//					$data =  array('upload_data' => $this->upload->data());
//					$post_image = $_FILES['userfile']['name'];
//				}
                                 $post_image =$this->input->post('usertype');
				$this->Administrator_Model->update_user_data($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('administrator/update-profile');
			}
			
		}


		//forget password functions start
                        public function forget_password_mail(){
//                            $this->load->library('form_validation');
//                            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

            //check if email is in the database
                            $this->load->model('Administrator_Model');
                            if($this->Administrator_Model->email_exists()){
                            //$them_pass is the varible to be sent to the user's email
                            $temp_pass = md5(uniqid());
                            //send email with #temp_pass as a link
                            $this->load->library('email', array('mailtype'=>'html'));
                            $this->email->from('amol.waghmare@mehp.com', "Site");
//                            $this->email->to($this->input->post('email'));
                            $this->email->to($this->input->post('amol.waghmare@mehp.com'));
                            $this->email->subject("Reset your Password");

                            $message = "<p>This email has been sent as a request to reset our password</p>";
                            $message .= "<p><a href='".base_url()."administrator/reset-password/$temp_pass'>Click here </a>if you want to reset your password,
                                        if not, then ignore</p>";
                            $this->email->message($message);

                            if($this->email->send()){
                                $this->load->model('Administrator_Model');
                                if($this->Administrator_Model->temp_reset_password($temp_pass)){
                                    echo "check your email for instructions, thank you";
                                }
                            }
                            else{
								// echo "email was not sent, please contact your administrator";
								redirect('administrator/change-password');
                            }

        }else{
            echo "your email is not in our database";
        }
}
public function reset_password($temp_pass){
    $this->load->model('Administrator_Model');
    if($this->Administrator_Model->is_temp_pass_valid($temp_pass)){

        $this->load->view('reset-password');
       //once the user clicks submit $temp_pass is gone so therefore I can't catch the new password and   //associated with the user...

    }else{
        echo "the key is not valid";    
    }

}
public function update_password(){
    $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
            if($this->form_validation->run()){
            echo "passwords match";
            }else{
            echo "passwords do not match";  
            }
}


public function savedata()
{
	// if(isset($this->input->post('emp_id')))
	// {
		$cid_type = $_GET['cid_type'];
		$emp_id=$_GET['emp_id'];
		$Fname=$_GET['Fname'];
		$Lname=$_GET['Lname'];
  
		$Manager = $_GET['Manager'];
		// $status = $_GET['status'];
		$status1 =0;
		$user_role = $_GET['user_role'];
		$team = $_GET['team'];
		$teamStr = implode(',',$team);
		$Password =$_GET['Password'];
		$password = md5($Password);
		if($cid_type == 'TMB')
		{
			$code = 93;
		}
		else if($cid_type == 'ME')
		{
			$code = 91;
		}
		else if($cid_type == 'HP')
		{
			$code = 92;
		}
		$empcode = $code.$emp_id;
		$register_date = date("Y-m-d H:i:s");
		$this->Administrator_Model->saverecords($emp_id,$Fname,$Lname,$Manager,$status1,$user_role,$teamStr,$password,$register_date,$cid_type,$empcode);	
		echo json_encode(array(
			"statusCode"=>200
		));
	// } 
}
// Added by Amol
public function getPrivillage(){ 
		
	$user_role = $_GET['user_role'];
	// $user_role = implode(',',$user_role);
	// get data 
	$data = $this->Administrator_Model->getPrivillage($user_role);
	echo json_encode($data); 
	}

	public function user_report($offset = 0){
		$this->load->model('Administrator_Model');
		// Pagination Config
		$config['base_url'] = base_url(). 'campaigns/campaign/';
		$config['total_rows'] = $this->db->count_all('campaign');
		$config['per_page'] = '';
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'paginate-link');
		if($this->input->post('campid') != null)
		{
			$campid = $this->input->post('campid');
		}
		else
		{
			$campid = 1014;
		}
		
		$user_id =$this->input->post('user_id');
		$stage =$this->input->post('stage');
		$from =$this->input->post('from');
		if($from == "")
		{
			$from = date('Y-m-d 00:00:00');
		}
		$to =$this->input->post('to');
		if($to == "")
		{
			$to = date('Y-m-d H:i:s');
		}
		// print_r($to);  
		// print_r($from);
		// Init Pagination
		$this->pagination->initialize($config);
	
		$data['title'] = 'Latest Campaigns';
		// print_r($user_id);
		if($stage =='rejected'){
			$data['users'] = $this->Administrator_Model->get_user_reportfordv($campid,$user_id,$from,$to,$stage); //reject
		}else if($stage =='accepeted'){
			$data['users'] = $this->Administrator_Model->get_user_reportfordvaccepted($campid,$user_id,$from,$to,$stage);
		}else if($stage =='verified'){
			$data['users'] = $this->Administrator_Model->get_user_report($campid,$user_id,$from,$to,$stage);
		}else{
			$data['users'] = $this->Administrator_Model->get_user_report_dc($campid,$user_id,$from,$to,$stage);
		}
		
		
		

		// print_r($data['users']);
		//  print_r($user_id);
		$data['users_name'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);
		$data['campaigns'] = $this->Administrator_Model->get_campaign();
		$data['empcode'] = $this->session->userdata('empcode');
		$data['user_id'] = $user_id;
		$data['Campid'] = $campid;
		$data['Stage'] = $stage;
		$data['From'] = $from;
		$data['To'] = $to;
		$this->load->view('administrator/header-script');
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		if($stage == "verified")
		{
			$this->load->view('administrator/user-report', $data);
		}
		else
		{
			$this->load->view('administrator/user-report-dc', $data);
		}

		$this->load->view('administrator/footer');
	}

	public function email_verification($offset = 0){
		$this->load->model('Administrator_Model');
		// Pagination Config
		$config['base_url'] = base_url(). 'campaigns/campaign/';
		$config['total_rows'] = $this->db->count_all('campaign');
		$config['per_page'] = '';
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'paginate-link');
		$campid =$this->input->post('campaign_id');
		$user_id =$this->input->post('user_id');
		$stage =$this->input->post('stage');
		$from =$this->input->post('from');
		$to =$this->input->post('to');
		// Init Pagination
		$this->pagination->initialize($config);
	
		$data['title'] = 'Latest Campaigns';
	
		$data['leadmaster'] = $this->Administrator_Model->get_email_list($campid,$user_id,$from,$to,$stage);
		$data['users_name'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);
		$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($campid);
		$data['email'] = $this->Administrator_Model->get_email_id();
		$data['user_id'] = $user_id;
		$data['Campid'] = $campid;
		$data['empcode'] = $this->session->userdata('empcode');
		$data['Stage'] = $stage;
		$data['From'] = $from;
		$data['To'] = $to;
		$this->load->view('administrator/header-script');
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		$this->load->view('administrator/email-verification', $data);
		$this->load->view('administrator/footer');
	}

	public function checkempid()
	{
		$emp_id = $_GET['emp_id'];
		$cid_type = $_GET['cid_type'];
		$data['isEmpExist'] = $this->Administrator_Model->check_suppression_email($emp_id,$cid_type);
		echo json_encode($data); 
	}

	function selectCampaignForEmailVerification($page = 'select-campaign-email'){
		$data['title'] = 'Create Lead';
		$data['campaigns'] = $this->Administrator_Model->get_campaign();
				  
		
		// $data['from_email'] = $this->Administrator_Model->get_email_id($campid,103);
		$this->load->view('administrator/header-script');
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		 $this->load->view('administrator/'.$page, $data);
		$this->load->view('administrator/footer');
	
	}

	function emailVerfication($page = 'email-verification'){
			
		$data['title'] = 'Create Lead';
			// print_r($_SESSION);
			// print_r($_SESSION['timeout']);
			$campaign_id_by_post = $this->input->post('campaign_id');
			if(isset($_GET['campaign_id'])){
				$postData = $_GET['campaign_id']; 
			}else if(isset($campaign_id_by_post)){
				$postData = $this->input->post('campaign_id');
				// $postData1 = $postData['campaign_id'];
			}
			else
			{
				$postData = $this->session -> userdata('session_campaign_id');
			}
			$session_campaign_id = array(
				'session_campaign_id' => $postData,
			);
			// $agent_id = $this->session -> userdata('empcode');
			$this->session->set_userdata($session_campaign_id);
			// print_r($postData1);

			$data['campaigns'] = $this->Administrator_Model->get_campaign_by_id($postData);

			foreach ($data['campaigns'] as $camp) {
			
			}

			$camp_cnid = $camp['cnid'];
			$cids = $camp['cids'];
						
			$config['base_url'] = base_url(). 'campaigns/campaign/';
			$config['total_rows'] = $this->db->count_all('campaign');
			$config['per_page'] = '';
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			$campid = $cids; //$this->input->post('campaign_id');
			$user_id =$this->input->post('user_id');
			$leadstatus =$this->input->post('leadstatus');
			$leadlimit = $this->input->post('leadlimit');
			$search_email = $this->input->post('search_email');
			$search_email_status = $this->input->post('search_email_status');
			$email_sent_time = $this->input->post('email_sent_time');
			$from =$this->input->post('from');
			$pass =$this->input->post('pass');
			if(isset($from) && $from != null && isset($pass) && $pass != null)
			{
				$agent_email = $from;
				$agent_password = $pass;
			}
			else
			{
				$agent_email = $this->input->post('email');
				$agent_password = $this->input->post('password');
			}

			if(isset($leadstatus) && $leadstatus == "New")
			{
				$data['display_update_email_section'] = 'display:none';
				$data['display_send_email_section'] = 'display:block';
			}
			else
			{
				$data['display_update_email_section'] = 'display:block';
				$data['display_send_email_section'] = 'display:none';
			}
			// echo $agent_email;die;
			$to =$this->input->post('to');
			// Init Pagination
			$this->pagination->initialize($config);
		
			$data['title'] = 'Latest Campaigns';
			$offset = 0;
			$data['leadmaster'] = $this->Administrator_Model->get_email_list($campid,$user_id,$from,$to,$leadstatus,$search_email,$search_email_status,$email_sent_time,$leadlimit);
			$data['users_name'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);
			// $data['campaigns'] = $this->Administrator_Model->get_campaign();
			// $data['from_email'] = $this->Administrator_Model->get_email_id($campid,103);
			$data['user_id'] = $user_id;
			$data['camp_cnid'] = $camp_cnid;
			$data['agent_email'] = $agent_email;
			$data['agent_password'] = $agent_password;
			$data['empcode'] = $this->session->userdata('empcode');
			$data['Stage'] = $leadstatus;
			$data['leadlimit'] = $leadlimit;
			$data['search_email'] = $search_email;
			$data['search_email_status'] = $search_email_status;
			$data['email_sent_time'] = $email_sent_time;
			$data['From'] =  $this->session->userdata('from');
			$data['Pass'] =  $this->session->userdata('pass');
			$data['To'] = $to;


			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
	
	}

	public function updaterecordlock(){ 
		// $lmid = "lmid";	
		$lmid_1 = $_GET['lmid1'];
		$lmid_2 = $_GET['lmid2'];
		$lmid_3 = $_GET['lmid3'];
		$lmid_4 = $_GET['lmid4'];
		$lmid_5 = $_GET['lmid5'];
		$lmid_6 = $_GET['lmid6'];
		$lmid_7 = $_GET['lmid7'];
		$lmid_8 = $_GET['lmid8'];
		$lmid_9 = $_GET['lmid9'];
		$lmid_10 = $_GET['lmid10'];
		$lmid_11 = $_GET['lmid11'];
		$lmid_12 = $_GET['lmid12'];
		$lmid_13 = $_GET['lmid13'];
		$lmid_14 = $_GET['lmid14'];
		$lmid_15 = $_GET['lmid15'];
		$rlc = $_GET['rlc'];
		$emp_id = $_GET['emp_id'];
		for($i=1;$i<=15;$i++)
		{
		$datarecord = array(
			'rlc' => $rlc,
			'agent' => $emp_id
		);
		$c = "$";
		$check =  "lmid".$i;
		 $check = $_GET[$check];
		// echo $check;
		// die;
		// get data 
		$data = $this->Administrator_Model->update_recordlock($check,$datarecord);
		}
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
	// add by Amol

	public function updaterecordlockfrom_leadgeneration(){ 
	
		$data = $this->Administrator_Model->update_recordlockonlogin($_SESSION['empcode']);
		
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
	// added by Tejaswi
	public function send_email_status()
	{
		// $string_version = $_GET['leadid'];
		$string_version= implode(",", $_GET['leadid']);
		$leadid = explode(',', $string_version);
		// print_r($leadid);die;
		// echo $_GET['leadid'];
		$email1 = $_GET['change_status_of'];
		$string_version1= implode(",", $email1);
		$comp_proSplit= explode(",", $string_version1);
		$cnt=count($comp_proSplit);
		// $cnt = 5;
		if(isset($_GET['email_status']) && $_GET['email_status'] != null)
		{
			$email_status = $_GET['email_status'];
		}
		else
		{
			$email_status = null;
		}
		if(isset($_GET['comment']) && $_GET['comment'] != null)
		{
			$comment = $_GET['comment'];
		}
		else
		{
			$comment = null;
		}
		if(isset($_GET['email_close_status']) && $_GET['email_close_status'] != null)
		{
			$closer_status = $_GET['email_close_status'];
		}
		else
		{
			$closer_status = "Open";
		}
		
		

		$campid = $_GET['campid'];
		$camp_cnid = $_GET['camp_cnid'];
		$startdate = date("Y-m-d H:i:s");
		$from = $_GET['from'];
		if(isset($_GET['pass']))
		{
			$pass = $_GET['pass'];
		}
		else
		{
			$pass = $this->session->userdata('pass');
		}
		
		$sub = $_GET['sub'];
		$body = $_GET['body'];
		
		//Create Session
		$email_data = array(
			'pass' => $pass,
			'from' => $from,
		);
		$agent_id = $this->session -> userdata('empcode');
		$this->session->set_userdata($email_data);
		for($i=0;$i<$cnt;$i++)
		{
			require_once "send-email-php/phpmailer/class.phpmailer.php";
			require_once "send-email-php/phpmailer/PHPMailerAutoload.php";
			$mail = new PHPMailer(true);
			try {
				//  $mail->Host       = "mail.gmail.com"; // SMTP server
				//  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
				 $mail->SMTPAuth   = true;                  // enable SMTP authentication
				 $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
				 $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
				 $mail->Port       = 465;   // set the SMTP port for the GMAIL server
				 $mail->SMTPKeepAlive = true;
				 $mail->Mailer = "smtp";
				 $mail->Username   = $from;  // GMAIL username
				 $mail->Password   = $pass;            // GMAIL password
				 $mail->addAddress($comp_proSplit[$i], 'Receiver Name');
				 $mail->setFrom($from, 'User');
				 $mail->Subject = $sub;
				 $mail->AltBody = $body; // optional - MsgHTML will create an alternate automatically
				 $mail->MsgHTML($body);
				 $mail->Send();
				 
				//  echo "Message Sent OK</p>\n";
				//  header("location: ../administrator/emailVerfication");

				} catch (phpmailerException $e) {
				//  echo $e->errorMessage(); //Pretty error messages from PHPMailer
					echo json_encode(array(
						"statusCode"=>"Email Fail",
						"error"=>"Google Authentication Error: Please check your Gmail Username & Password..",
					));
					return;
				} catch (Exception $e) {
				 echo $e->getMessage(); //Boring error messages from anything else!
				}

			$checkforEmail = $this->Administrator_Model->get_email_duplication_count($comp_proSplit[$i],$agent_id);
			if($checkforEmail == true)
			{
				echo json_encode(array(
					"statusCode"=>"Email Exist",
					// "campaign_id"=>$addcampaigndata,
					// "from"=>$from,
					// "pass"=>$pass,
					"message"=>"Email is already sent on this email Id"
				));
				return;
			}

			$checkforlmid = $this->Administrator_Model->get_lmid_duplication_count($leadid[$i],$agent_id);
			if($checkforlmid == true)
			{
				echo json_encode(array(
					"statusCode"=>"Exceed",
					// "campaign_id"=>$addcampaigndata,
					// "from"=>$from,
					// "pass"=>$pass,
					"message"=>"Mail Sent Successfully.."
				));
				return;
			}

			$datacampaign1 = array(
				'curr_active' => 0,
								
				);
			$updateexistinglead = $this->Administrator_Model->update_email_status($datacampaign1,$comp_proSplit[$i]);
			$update_lead_status = array(
				'evcomp' => 2,
				// 'curr_active' => 0
				'evstat' => 0,
				'evagti' =>	$agent_id,
				'evdti'	=> $startdate,
				'evmail' => $from		
				);
			$update_lead_status = $this->Administrator_Model->update_email_lead__status($update_lead_status,$leadid[$i]);
			// if($email_status == null)
			// {
				$datacampaign = array(
					'lmid' => $leadid[$i], 
					'evagnt' => $this->session -> userdata('empcode'),
					'email' => $comp_proSplit[$i],
					'status' =>$email_status,
					'fmail' =>$from,
					'comment' => $comment,
					'loaddt' => $startdate,
					'mailsub' => $sub,
					'mailby' => $body,
					'statdt' => $startdate,
					'curr_active'=> 1,
					'closer_status' =>'Open',
					'email_code' => 1				
					);
				
				$addcampaigndata = $this->Administrator_Model->send_email_status($datacampaign);
			// }
			

				
			}
			if($addcampaigndata == true){
				
				// return "{\"statusCode\":\"Success\"}";
				echo json_encode(array(
					"statusCode"=>"Success",
					"campaign_id"=>$camp_cnid,
					"from"=>$from,
					"pass"=>$pass,
					"message"=>"Mail Sent Successfully.."
				));
			}else{
				
				// return "{\"statusCode\":\"Fail\"}";
				echo json_encode(array(
					"statusCode"=>"Fail",
					"message"=>"Mail Sent failed.."
				));
			}
			
	}

	public function update_email_status_and_send()
	{
		// $string_version = $_GET['leadid'];
		$string_version= implode(",", $_GET['leadid']);
		$leadid = explode(',', $string_version);
		// print_r($leadid);die;
		// echo $_GET['leadid'];
		$email1 = $_GET['change_status_of'];
		$string_version1= implode(",", $email1);
		$comp_proSplit= explode(",", $string_version1);

		$original_email = $_GET['original_email'];
		$original_email= implode(",", $original_email);
		$original_email= explode(",", $original_email);

		$formated_mail_name = implode(",", $_GET['formated_mail']);
		$formated_mail = explode(',', $formated_mail_name);
		// $formated_mail= implode(",", $formated_mail);
		
		$cnt=count($comp_proSplit);
		// $cnt = 5;
		if(isset($_GET['email_status']) && $_GET['email_status'] != null)
		{
			$email_status = $_GET['email_status'];
		}
		else
		{
			$email_status = null;
		}
		if(isset($_GET['comment']) && $_GET['comment'] != null)
		{
			$comment = $_GET['comment'];
		}
		else
		{
			$comment = null;
		}
		if(isset($_GET['email_close_status']) && $_GET['email_close_status'] != null)
		{
			$closer_status = $_GET['email_close_status'];
		}
		else
		{
			$closer_status = "Open";
		}
		
		

		$campid = $_GET['campid'];
		$camp_cnid = $_GET['camp_cnid'];
		$startdate = date("Y-m-d H:i:s");
		$from = $_GET['from'];
		if(isset($_GET['pass']))
		{
			$pass = $_GET['pass'];
		}
		else
		{
			$pass = $this->session->userdata('pass');
		}
		
		$sub = $_GET['sub'];
		$body = $_GET['body'];
		if(isset($_GET['changeFormatcond']) && $_GET['changeFormatcond'] != null)
		{
			$changeFormatcond = $_GET['changeFormatcond'];
		}
		else
		{
			$changeFormatcond = null;
		}
		
		//Create Session
		$email_data = array(
			'pass' => $pass,
			'from' => $from,
		);
		$agent_id = $this->session -> userdata('empcode');
		$this->session->set_userdata($email_data);
		for($i=0;$i<$cnt;$i++)
		{
			
			// Check for new Email Format
			$EmailFormat = explode("@",$original_email[$i]);
			$domain = $EmailFormat [1];
			$str = strpos($EmailFormat[0], '.');
			// echo $EmailFormat[0]; die;
			if($str !== false)
			{
				$Name = explode(".",$EmailFormat[0]);
				$firstname = $Name[0];
				$lastname = $Name[1];
				$firstCharLname = substr($lastname, 0, 1);
				$firstCharFname = substr($firstname, 0, 1);
				// echo "found";
			} else {
				// $firstname = $EmailFormat[0];
				// $firstCharFname = substr($firstname, 0, 1);
				// $lastname = null;
				// echo "not found";
				$Name = explode(".",$formated_mail[$i]);
				$firstname = $Name[0];
				$lastname = $Name[1];
				$firstCharLname = substr($lastname, 0, 1);
				$firstCharFname = substr($firstname, 0, 1);
				
			}
			
			if(($firstname == null || $lastname == "" ))
			{
				$FinalEmail = $firstCharFname."@".$domain;
				$checkforEmail = $this->Administrator_Model->get_email_duplication_count($FinalEmail,$agent_id);
				if($checkforEmail == true)
				{
					echo json_encode(array(
						"statusCode"=>"Email Exist",
						// "campaign_id"=>$addcampaigndata,
						// "from"=>$from,
						// "pass"=>$pass,
						"message"=>"Email is already sent on this email Id"
					));
					return;
				}
				else
				{
					$TO = $FinalEmail;
				}
			}
			else
			{
				
				$FinalEmail = $firstname.".".$lastname."@".$domain;
			
				$checkforEmail = $this->Administrator_Model->get_email_duplication_count($FinalEmail,$agent_id);
			
				if($checkforEmail == true) //1st If
				{
					// $TO = $firstCharFname.".".$lastname."@".$domain;
					$TO = $lastname.".".$firstname."@".$domain;
					$checkforEmail = $this->Administrator_Model->get_email_duplication_count($TO,$agent_id);
					if($checkforEmail == true) //2nd If
					{
						$TO = $firstname.".".$firstCharLname."@".$domain;
						$checkforEmail = $this->Administrator_Model->get_email_duplication_count($TO,$agent_id);
						if($checkforEmail == true) //3rd If
						{
							$TO = $firstCharFname.$firstCharLname."@".$domain;
							$checkforEmail = $this->Administrator_Model->get_email_duplication_count($TO,$agent_id);
							if($checkforEmail == true) //4th If
							{
								$TO = $firstname."@".$domain;
								$checkforEmail = $this->Administrator_Model->get_email_duplication_count($TO,$agent_id);
								if($checkforEmail == true) //5th If
								{
									$TO = $lastname."@".$domain;
									$checkforEmail = $this->Administrator_Model->get_email_duplication_count($TO,$agent_id);
									if($checkforEmail == true) // 6th If
									{
										$TO = $firstCharFname.$lastname."@".$domain;
										$checkforEmail = $this->Administrator_Model->get_email_duplication_count($TO,$agent_id);
										if($checkforEmail == true) // 7th If
										{
											$TO = $firstCharFname.".".$lastname."@".$domain;
										}
										// else // 7th Else
										// {
										// 	$TO = $firstCharFname.$lastname."@".$domain;										}
										// }
									}
									else // 6th Else
									{
										$TO = $lastname."@".$domain;
									}
								}
								else // 5th Else
								{
									$TO = $firstname."@".$domain;
								}
							}
							else //4th Else
							{
								$TO = $firstCharFname.$firstCharLname."@".$domain;
								
							}
						}
						else //3rd Else
						{
							$TO = $firstname.".".$firstCharLname."@".$domain;
						}
					}
					else //2nd Else
					{
						$TO = $lastname.".".$firstname."@".$domain;
						// $TO = $firstCharFname.".".$lastname."@".$domain;
					}
				}
				else //1st Else
				{
					$TO = $FinalEmail;
				}
			}
			
			$checkforEmail = $this->Administrator_Model->get_email_duplication_count($TO,$agent_id);
			if($checkforEmail == true)
			{
				echo json_encode(array(
					"statusCode"=>"Email Exist",
					// "campaign_id"=>$addcampaigndata,
					// "from"=>$from,
					// "pass"=>$pass,
					"message"=>"Email is already sent on this email Id"
				));
				return;
			}

			$checkforlmid = $this->Administrator_Model->get_lmid_duplication_count($leadid[$i],$agent_id);
			if($checkforlmid == true)
			{
				echo json_encode(array(
					"statusCode"=>"Exceed",
					// "campaign_id"=>$addcampaigndata,
					// "from"=>$from,
					// "pass"=>$pass,
					"message"=>"Mail Sent Successfully.."
				));
				return;
			}

			
					require_once "send-email-php/phpmailer/class.phpmailer.php";
					require_once "send-email-php/phpmailer/PHPMailerAutoload.php";
					$mail = new PHPMailer(true);
					try {
						//  $mail->Host       = "mail.gmail.com"; // SMTP server
						//  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
						$mail->SMTPAuth   = true;                  // enable SMTP authentication
						$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
						$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
						$mail->Port       = 465;   // set the SMTP port for the GMAIL server
						$mail->SMTPKeepAlive = true;
						$mail->Mailer = "smtp";
						$mail->Username   = $from;  // GMAIL username
						$mail->Password   = $pass;            // GMAIL password
						$mail->addAddress($TO, 'Receiver Name');
						$mail->setFrom($from, 'User');
						$mail->Subject = $sub;
						$mail->AltBody = $body; // optional - MsgHTML will create an alternate automatically
						$mail->MsgHTML($body);
						$mail->Send();
						
						//  echo "Message Sent OK</p>\n";
						//  header("location: ../administrator/emailVerfication");

						} catch (phpmailerException $e) {
							// echo $e->errorMessage(); //Pretty error messages from PHPMailer
							echo json_encode(array(
								"statusCode"=>"Email Fail",
								"error"=>"Google Authentication Error: Please check your Gmail Username & Password..",
							));
							return;
						} catch (Exception $e) {
						echo $e->getMessage(); //Boring error messages from anything else!
						}
						
						// Update Last email status first
						$datacampaignUpdate = array(
							'status' =>$email_status,
							'comment' => $comment,
							'closer_status' => $closer_status,
							'statdt' => $startdate
											
							);
						$addcampaigndata = $this->Administrator_Model->update_email_status($datacampaignUpdate,$comp_proSplit[$i]);


						$datacampaign1 = array(
							'curr_active' =>0,
											
							);
						$updateexistinglead = $this->Administrator_Model->update_email_status($datacampaign1,$comp_proSplit[$i]);
						// $update_lead_status = array(
						// 	'evcomp' => 2,
						// 	// 'curr_active' => 0				
						// 	);
						// $update_lead_status = $this->Administrator_Model->update_email_lead__status($update_lead_status,$leadid[$i]);
						
						if($closer_status == "Closed")
							{
							$update_lead_status = array(
								'evload' => 1,
								'evcomp' => 1,
								'email'=> $comp_proSplit[$i],
								'evdisp' =>4,
								'cdcsb' => 0,
								'cdcrjt' => 0,
								'rlc' => 0,
			
								);
							$update_lead_status = $this->Administrator_Model->update_email_lead__status($update_lead_status,$leadid[$i]);
							}
							if($closer_status != "Closed")
							{
								$datacampaign = array(
									'lmid' => $leadid[$i], 
									'evagnt' => $this->session -> userdata('empcode'),
									'email' => $TO,
									'status' =>'',
									'fmail' =>$from,
									'comment' => '',
									'loaddt' => $startdate,
									'mailsub' => $sub,
									'mailby' => $body,
									'statdt' => $startdate,
									'curr_active'=> 1,
									'closer_status' =>'Open',
									'email_code' => 1				
									);
								
								$addcampaigndata = $this->Administrator_Model->send_email_status($datacampaign);
					}
				
			}
			if($addcampaigndata == true){
				
				// return "{\"statusCode\":\"Success\"}";
				echo json_encode(array(
					"statusCode"=>"Success",
					"campaign_id"=>$camp_cnid,
					"from"=>$from,
					"pass"=>$pass,
					"message"=>"Mail Sent Successfully.."
				));
			}else{
				
				// return "{\"statusCode\":\"Fail\"}";
				echo json_encode(array(
					"statusCode"=>"Fail",
					"message"=>"Mail Sent failed.."
				));
			}
			
	}

	public function update_email_status()
	{
		// $string_version = $_GET['leadid'];
		$string_version= implode(",", $_GET['leadid']);
		$leadid = explode(',', $string_version);
		// print_r($leadid);die;
		// echo $_GET['leadid'];
		$email1 = $_GET['change_status_of'];
		$string_version1= implode(",", $email1);
		$comp_proSplit= explode(",", $string_version1);
		$cnt=count($comp_proSplit);
		// $cnt = 5;
		if(isset($_GET['email_status']) && $_GET['email_status'] != null)
		{
			$email_status = $_GET['email_status'];
		}
		else
		{
			$email_status = null;
		}
		if(isset($_GET['comment']) && $_GET['comment'] != null)
		{
			$comment = $_GET['comment'];
		}
		else
		{
			$comment = null;
		}
		if(isset($_GET['email_close_status']) && $_GET['email_close_status'] != null)
		{
			$closer_status = $_GET['email_close_status'];
		}
		else
		{
			$closer_status = "Open";
		}
		$campid = $_GET['campid'];
		$camp_cnid = $_GET['camp_cnid'];
		$startdate = date("Y-m-d H:i:s");
		for($i=0;$i<$cnt;$i++)
		{
			// Update Last email status first
			$datacampaignUpdate = array(
				'status' =>$email_status,
				'comment' => $comment,
				'closer_status' => $closer_status,
				'statdt' => $startdate
								
				);
			$addcampaigndata = $this->Administrator_Model->update_email_status($datacampaignUpdate,$comp_proSplit[$i]);
			if($closer_status == "Closed")
			{
				$evdisp = null;
				if($email_status == "Accepted" || $email_status == "Confirmed" || $email_status == "Out of Office")
				{
					$evdisp = 4;
				}
				else
				{
					$evdisp = 5;
				}
				$checkForCDCTag_cdcsb = $this->Administrator_Model->check_cdc_tag_cdcsb($leadid[$i]);
				
				$checkForCDCTag_cdcrjt = $this->Administrator_Model->check_cdc_tag_cdcrjt($leadid[$i]);
				if($checkForCDCTag_cdcsb == null && $checkForCDCTag_cdcrjt == null)
				{
					$update_lead_status = array(
						'evload' => 1,
						'evcomp' => 1,
						'email'=> $comp_proSplit[$i],
						'evdisp' =>$evdisp,
						'cdcsb' => 0,
						'cdcrjt' => 0,
						'rlc' => 0,   
						);
				}
				else
				{
					$update_lead_status = array(
					'evload' => 1,
					'evcomp' => 1,
					'email'=> $comp_proSplit[$i],
					'evdisp' =>$evdisp,
					'rlc' => 0,

					);

				}
			
				
				$update_lead_status = $this->Administrator_Model->update_email_lead__status($update_lead_status,$leadid[$i]);

				$datacampaign1 = array(
					'curr_active' => 0,
									
					);
				$updateexistinglead = $this->Administrator_Model->update_email_status($datacampaign1,$comp_proSplit[$i]);
				
				}
			}
			if($addcampaigndata == true){
				
						echo json_encode(array(
							"statusCode"=>"Success",
							"campaign_id"=>$camp_cnid,
							"message"=>"Status Updated Successfully.."
						));
					}else{
						
						echo json_encode(array(
							"statusCode"=>"Fail",
							"message"=>"Status not Updated"
						));
					}
	}

	
	public function intialise_count($page = 'initialise_counter')
	{
		if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		show_404();
	   }
		// Check login
		if(!$this->session->userdata('login')) {
			redirect('administrator/index');
		}

		$data['title'] = 'Create User';

		$data['emp_id'] = $this->Administrator_Model->get_empid();
		$data['roles'] = $this->Administrator_Model->get_roles();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

		if($this->form_validation->run() === FALSE){
			 $this->load->view('administrator/header-script');
			   $this->load->view('administrator/header');
			   $this->load->view('administrator/header-bottom');
				$this->load->view('administrator/'.$page, $data);
			   $this->load->view('administrator/footer');
		}else{
			
			$post_image = 'noimage.jpg';
			$password = md5('Test@123');

			$this->Administrator_Model->add_user($post_image,$password);

			echo json_encode(array(
				"statusCode"=>200
			));
			
		}
		
	}

	public function campaign_report($offset = 0){
		$this->load->model('Administrator_Model');
		// Pagination Config
		$config['base_url'] = base_url(). 'campaigns/campaign/';
		$config['total_rows'] = $this->db->count_all('campaign');
		$config['per_page'] = '';
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'paginate-link');
		$camp_status = $this->input->post('campaign_status');
		$campid =$this->input->post('campid');
		$user_id =$this->input->post('user_id');
		$stage =$this->input->post('stage');
		$from =$this->input->post('from');
		$to =$this->input->post('to');
		// Init Pagination
		$this->pagination->initialize($config);
	
		$data['title'] = 'Latest Campaigns';
		
		
		
		

		// print_r($data['users']);
		//  print_r($user_id);
		$data['users_name'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);
		$data['users'] = $this->Administrator_Model->get_campaign_report(FALSE, $config['per_page'], $offset,$camp_status);
		$data['user_id'] = $user_id;
		$data['Campid'] = $campid;
		$data['Stage'] = $stage;
		$data['From'] = $from;
		$data['To'] = $to;
		$data['campaign_status'] = $camp_status;
		$this->load->view('administrator/header-script');
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		$this->load->view('administrator/campaign-report', $data);
		$this->load->view('administrator/footer');
	}

	public function delivery($offset = 0)
		{
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/users/';
			$config['total_rows'] = $this->db->count_all('users');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Users';
			$campid = $this->input->post('campid');
			$qa_status = $this->input->post('qa_status');
			$delivery_status = $this->input->post('delivery_status');
			$ls_status = $this->input->post('ls_status');
			$data['users'] = $this->Administrator_Model->get_delivery_leads(FALSE, $config['per_page'], $offset,$campid,$delivery_status,$qa_status,$ls_status);
			$data['campaigns'] = $this->Administrator_Model->get_campaign();
			$data['Campid'] = $campid;
			$data['qa_status'] = $qa_status;
			$data['ls_status'] = $ls_status;
			$data['delivery_status'] = $delivery_status;
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/lead_delivery', $data);
			$this->load->view('administrator/footer');
		}

		public function export_csv($offset = 0,$campid = null,$delivery_status=null,$qa_status=null,$ls_status=null){ 
			// file name 
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/users/';
			$config['total_rows'] = $this->db->count_all('users');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link'); 
			$check = $this->input->post('delivery_final_check');
			$string_version= implode(",", $check);
			$comp_proSplit= explode(",", $string_version);
			$cnt=count($comp_proSplit);
			for($i=0;$i<$cnt;$i++)
			{
				$update_lead_status = array(
					'dytg' => 1,
					'dyagti' => $this->session -> userdata('empcode'),

				);
				$update_lead_status = $this->Administrator_Model->update_email_lead__status($update_lead_status,$comp_proSplit[$i]);
			}
			$filename = 'users_'.date('Ymd').'.csv'; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$filename"); 
			header("Content-Type: application/csv; ");
		   // get data
			$check = $this->input->post('delivery_final_check');
			$string_version= implode(",", $check);
			$ids = explode(',', $string_version);
			
		   	// if(isset( $_GET['camp_id'])) 
		   	// 	$campid = $_GET['camp_id'];
			
			// if(isset( $_GET['qa_status']))		
			// 	$qa_status = $_GET['qa_status'];
			
			// if(isset($_GET['delivery_status']))
			// 	$delivery_status = $_GET['delivery_status'];
			
			// if(isset($_GET['ls_status']))
				// $ls_status = $_GET['ls_status'];
			$campid = $this->input->post('campid');
			$qa_status = $this->input->post('qa_status');
			$delivery_status = $this->input->post('delivery_status');
			$ls_status = $this->input->post('ls_status');

			$usersData = $this->Administrator_Model->get_delivery_leads_export(FALSE, $config['per_page'], $offset,$campid,$delivery_status,$qa_status,$ls_status,$ids);
			// file creation 
			$file = fopen('php://output','w');
			$header = array("Lead Id","Campaign Id","Sal","First Name","Last Name","Job Title","Job Level","Job List","Department","Company Name","Company Type Name","Industry","Subindustry","Sector Type","Sector","Empsize","Revenue","Denomination Code","Denomination","Email","Phone","Line Type Code","Line Types","phext","Alternate No","Address","City","State","Zipcode","Country Name","currancy","abbrev","Domain","Plink","Emp Size Link","indlink","revszlink","othrlink","aum"); 
			fputcsv($file, $header);
			foreach ($usersData as $key=>$line){ 
				fputcsv($file,$line); 
			}
			fclose($file); 
			exit; 
		}

		public function email_login($page = 'email-login'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$camp_id = $_GET['id'];
			$data['camp_id'] = $camp_id;
			$data['empcode'] = $this->session->userdata('empcode');
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}
		public function otp_verification($page = 'otp-verify-form'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			// echo $_GET['main_otp'];
			$cid = $_GET['cid'];
			$encryption = $_GET['c'];
			if($encryption != "no")
			{
				$ciphering = "BF-CBC";
				// Use OpenSSl encryption method
				$iv_length = openssl_cipher_iv_length($ciphering);
				$options = 0;
				$encryption_iv = random_bytes($iv_length);
				$decryption_iv = random_bytes($iv_length);
	
				// Store the decryption key
				$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
				
				// Descrypt the string
				$decryption = openssl_decrypt ($encryption, $ciphering,
				$decryption_key, $options, $encryption_iv);
				
				$newstring = substr($decryption, -6);
				$empcode = $this->session->userdata('empcode');
				$data['main_otp'] = $newstring;
				$startdate = date("Y-m-d H:i:s");
				$update_otp = array(
					'otp' =>$newstring,
					'otp_time' => $startdate
									
					);
				$addcampaigndata = $this->Administrator_Model->update_otp_in_users($update_otp,$empcode);
			}
			else
			{
				$empcode = $this->session->userdata('empcode');
				$result=$this->Administrator_Model->get_otp_from_users($empcode)->row();
				$u_time = $result->otp_time;
				$u_time = date(strtotime($u_time));
				$currentTime = time();
				// $currentTime = date("Y-m-d H:i:s");
				$EXPIRATION_TIME = '+60 minutes';
				// echo $u_time; die;
				$expTime = strtotime($EXPIRATION_TIME, $u_time);
				// echo $currentTime."---".$expTime;
				if($currentTime <= $expTime)
				{
					$data['main_otp'] = $result->otp;
				}
				else
				{
					//echo "OTP expired"; 
					echo "<script>alert('OTP expired..');location.href = 'http://localhost/TME/send-email-php/email_otp.php?cid=$cid&empcode=$empcode';</script>";
					// die;
				}
			}
			$data['campaign_id'] = $cid;
			$data['empcode'] = $this->session -> userdata('empcode');
			$this->load->view('administrator/header-script');
			//$this->load->view('administrator/header');
			//$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function otp_verification_complete()
		{
			$campaign_id = $this->input->post('campaign_id');
			$main_otp = $this->input->post('main_otp');
			$user_otp = $this->input->post('otp');
			$startdate = date("Y-m-d H:i:s");
			$empcode = $this->session -> userdata('empcode');
			// $update_otp = array(
			// 	'otp' =>$main_otp,
			// 	'otp_time' => $startdate
								
			// 	);
			// $addcampaigndata = $this->Administrator_Model->update_otp_in_users($update_otp,$empcode);

			$token = array(
				'token' => 'success',
			);
		
			$this->session->set_userdata($token);
			if($main_otp == $user_otp)
			{
				
				redirect("/cdc/addlead?camp_id=$campaign_id");
			}
			else
			{
				// echo "Please Enter Correct OTP : <a href='javascript: history.go(-1)'>Back</a>";
				
				echo "<script>alert('OTP verification Failed ! Enter correct OTP..!');location.href = 'http://mehp-dbs/administrator/email_login?id=$campaign_id';</script>";
				// redirect("administrator/email_login?id=$campaign_id");
			}

		}

		public function user_report_ev($offset = 0){
			$this->load->model('Administrator_Model');
			// Pagination Config
			$config['base_url'] = base_url(). 'campaigns/campaign/';
			$config['total_rows'] = $this->db->count_all('campaign');
			$config['per_page'] = '';
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');
			if($this->input->post('campid') != null)
			{
				$campid = $this->input->post('campid');
			}
			else
			{
				$campid = 1014;
			}
			
			$user_id =$this->input->post('user_id');
			$stage =$this->input->post('stage');
			$from =$this->input->post('from');
			if($from == "")
			{
				$from = date('Y-m-d 00:00:00');
			}
			$to =$this->input->post('to');
			if($to == "")
			{
				$to = date('Y-m-d H:i:s');
			}
			// print_r($to);  
			// print_r($from);
			// Init Pagination
			$this->pagination->initialize($config);
		
			$data['title'] = 'Latest Campaigns';
			// print_r($user_id);
			
			// 	$data['users'] = $this->Administrator_Model->get_user_report($campid,$user_id,$from,$to,$stage);
			// }else{
				$data['users'] = $this->Administrator_Model->get_user_report_ev($campid,$user_id,$from,$to,$stage);
			// }
			
			
			
	
			// print_r($data['users']);
			//  print_r($user_id);
			$data['users_name'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);
			$data['campaigns'] = $this->Administrator_Model->get_campaign();
			$data['empcode'] = $this->session->userdata('empcode');
			$data['user_id'] = $user_id;
			$data['Campid'] = $campid;
			$data['Stage'] = $stage;
			$data['From'] = $from;
			$data['To'] = $to;
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			
				$this->load->view('administrator/user-report-ev', $data);
			
	
			$this->load->view('administrator/footer');
		}
}





