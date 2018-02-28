<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct()	{
		parent::__construct();		
       $this->load->model('user_model');
       $this->load->model('item_model');
       $this->load->model('inventory_model');
       $this->load->model('import_model');
	}	

	public function index()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['title'] 		= 'Item List';
			$data['site_title'] = APP_NAME;
			$data['user'] 		= $this->user_model->userdetails($userdata['username']); //fetches users record

			//Fetch Data
			$data['units']		= $this->item_model->fetch_unit();
			$data['category']		= $this->item_model->fetch_category();

			//Search 
			$search = '';
			if(isset($_GET['search'])) {
				$search = $_GET['search'];
			}

			//Paginated data				            
	   		$config['num_links'] = 5;
			$config['base_url'] = base_url('/items/index/');
			$config["total_rows"] = $this->item_model->count_items($search);
			$config['per_page'] = 10;				
			$this->load->config('pagination'); //LOAD PAGINATION CONFIG

			$this->pagination->initialize($config);
		    if($this->uri->segment(3)){
		       $page = ($this->uri->segment(3)) ;
		  	}	else 	{
		       $page = 1;		               
		    }

		    $data["results"] = $this->item_model->fetch_items($config["per_page"], $page, $search);
		    $str_links = $this->pagination->create_links();
		    $data["links"] = explode('&nbsp;',$str_links );

		    //ITEM NUMBERING
		    $data['per_page'] = $config['per_page'];
		    $data['page'] = $page;

		    //GET TOTAL RESULT
		    $data['total_result'] = $config["total_rows"];
		    //END PAGINATION		
		
			$this->load->view('items/list', $data);
		
		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


	public function inventory()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['title'] 		= 'Item Inventory';
			$data['site_title'] = APP_NAME;
			$data['user'] 		= $this->user_model->userdetails($userdata['username']); //fetches users record

			//Fetch Data
			$data['units']		= $this->item_model->fetch_unit();
			$data['category']		= $this->item_model->fetch_category();

			//Search 
			$search = '';
			if(isset($_GET['search'])) {
				$search = $_GET['search'];
			}

			//Paginated data				            
	   		$config['num_links'] = 5;
			$config['base_url'] = base_url('/items/inventory/');
			$config["total_rows"] = $this->inventory_model->count_items($search);
			$config['per_page'] = 10;				
			$this->load->config('pagination'); //LOAD PAGINATION CONFIG

			$this->pagination->initialize($config);
		    if($this->uri->segment(3)){
		       $page = ($this->uri->segment(3)) ;
		  	}	else 	{
		       $page = 1;		               
		    }

		    $data["results"] = $this->inventory_model->fetch_items($config["per_page"], $page, $search);
		    $str_links = $this->pagination->create_links();
		    $data["links"] = explode('&nbsp;',$str_links );

		    //ITEM NUMBERING
		    $data['per_page'] = $config['per_page'];
		    $data['page'] = $page;

		    //GET TOTAL RESULT
		    $data['total_result'] = $config["total_rows"];
		    //END PAGINATION		
			
			if($data['user']['usertype'] == 'Administrator') {
				$this->load->view('items/inventory', $data);
			} else {
				show_error('Oops! You do not have the privilege to view the content! Please contact the System Administrator', 403);
			}
				
		
		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}		
		

	}


	public function view($id)		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['site_title'] = APP_NAME;
			$data['user'] = $this->user_model->userdetails($userdata['username']); //fetches users record

			//Page Data
			$data['units']		= $this->item_model->fetch_unit();
			$data['category']		= $this->item_model->fetch_category();			
			$data['inventory']		= $this->item_model->fetch_item_inventory($id);	

			$data['items'] =   $this->inventory_model->view_item_inventory($id);		

			$data['info']		= $this->item_model->view($id);
			$data['title'] 		= $data['info']['name'];

			//Validate if record exist
			 //IF NO ID OR NO RESULT, REDIRECT
				if(!$id || !$data['info'] || $data['info']['is_deleted']) {
					redirect('items', 'refresh');
			}	

			//Form Validation
			$this->form_validation->set_rules('id', 'ID', 'trim|required'); 
			$this->form_validation->set_rules('name', 'Item Name', 'trim|required'); 
			$this->form_validation->set_rules('serial', 'Serial No', 'trim|callback_check_serial'); 
			$this->form_validation->set_rules('category', 'Category', 'trim|required'); 
			$this->form_validation->set_rules('unit', 'Unit', 'trim|required'); 
			$this->form_validation->set_rules('srp', 'Selling Price', 'trim|decimal'); 
			$this->form_validation->set_rules('dp', 'Dealers Price', 'trim|decimal|callback_validate'); 
			$this->form_validation->set_rules('desc', 'Description', 'trim'); 
					
			//Validate Usertype
			if($data['user']['usertype'] == 'Administrator') {
				if($this->form_validation->run() == FALSE)	{
					//Check URI Request 
					if($this->uri->segment(4) == 'barcode') {
						$this->load->view('items/print_barcode', $data);						
					} elseif($this->uri->segment(4) == 'batch') {
						//Batch View
						$batch_id 			= $this->uri->segment(5);
						$data['batch']		= $this->inventory_model->view_item($batch_id, NULL);
						$data['items'] =   $this->inventory_model->view_item_inventory($batch_id);	
						$data['logs']		= $this->logs_model->fetch_logs('inventory', $batch_id, 50);
						$this->load->view('items/batch_view', $data);

					} elseif(!$this->uri->segment(4)) {
						//Item View
						//Admin
						if ($data['user']['usertype'] == 'Administrator') {
							$data['logs']		= $this->logs_model->fetch_logs('item', $id, 50);
							$this->load->view('items/view', $data);
						} else {
							$data['exports'] = $this->item_model->fetch_exports($id);
							$this->load->view('items/supplier_view', $data);
						}
						
					} else {
						show_404();
					}
				} else {	

					//Proceed saving candidate				
					$key_id = $this->encryption->decrypt($this->input->post('id')); //ID of the row
					$img    = $this->encryption->decrypt($this->input->post('img'));

					if($this->item_model->update($key_id, $img)) {		

						$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'item',
							'tag_id'	=> 	$key_id,
							'action' 	=> 	'Updated Item Information'
							);

				
						//Save log loop
						foreach($log as $lg) {
							$this->logs_model->create_log($lg['user'], $lg['tag'], $lg['tag_id'], $lg['action']);				
						}		
						////////////////////////////////////
						
					
						$this->session->set_flashdata('success', 'Succes! Item Updated!');
						redirect($_SERVER['HTTP_REFERER'], 'refresh');
					} else {
						//failure
						$this->session->set_flashdata('error', 'Oops! Error occured!');
						redirect($_SERVER['HTTP_REFERER'], 'refresh');
					}			
					
				}	
			} else {
				show_error('Oops! Your account does not have the privilege to view the content. Please Contact the Administrator', 403, 'Access Denied!');				
			}		

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


	public function create()  {

		$userdata = $this->session->userdata('admin_logged_in');

		if ($userdata) {
			$data['site_title'] = APP_NAME;
			$data['title'] = 'Register Item';
			$data['user'] = $this->user_model->userdetails($userdata['username']);

			//Fetch Data
			$data['units']		= $this->item_model->fetch_unit();
			$data['category']		= $this->item_model->fetch_category();

			//Form Validation for user
			$this->form_validation->set_rules('name', 'Item Name', 'trim|required|is_unique[items.name]'); 
			$this->form_validation->set_rules('serial', 'Serial No', 'trim|is_unique[items.serial]'); 
			$this->form_validation->set_rules('category', 'Category', 'trim|required');  
			$this->form_validation->set_rules('unit', 'Unit', 'trim|required'); 			
			$this->form_validation->set_rules('desc', 'Description', 'trim'); 
			$this->form_validation->set_rules('srp', 'Selling Price', 'trim|decimal'); 
			$this->form_validation->set_rules('dp', 'Dealers Price', 'trim|decimal|callback_validate'); 

			if($data['user']['usertype'] == 'Administrator') {
								
			}
			

			if($this->form_validation->run() == FALSE)	{
					$this->load->view('items/create', $data);
				} else {	
					

					if($this->item_model->create()) {

						$create_tag = $this->input->post('name');

					$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'items',
							'tag_id'	=> 	$create_tag,
							'action' 	=> 	'Item Created'
							);

				
						//Save log loop
						foreach($log as $lg) {
							$this->logs_model->create_log($lg['user'], $lg['tag'], $lg['tag_id'], $lg['action']);				
						}		
						////////////////////////////////////

						$this->session->set_flashdata('success', 'Successfully Created!');
						redirect($_SERVER['HTTP_REFERER'], 'refresh');

				} else {
						//failure
						$this->session->set_flashdata('error', 'Error occured!');
						redirect($_SERVER['HTTP_REFERER'], 'refresh');
					}		
			}

		} else { 

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}
	}


	/**
	 *  Validating the value of dp and srp. Returns True if the dealers is greater than srp
	 */
	function validate() {

		$userdata = $this->session->userdata('admin_logged_in');

		if (!($this->input->post('dp') >= $this->input->post('srp'))) {
			return TRUE;
		} else {
			$this->form_validation->set_message('validate', 'Selling Price must be greater than Dealers Price!');
			return FALSE;
		}
	}

	/**
	 * Checks the Serial of the Item. Returns True if Serial Exist from another Record
	 * @param  [type] $item [description]
	 * @return [type]       [description]
	 */
	function check_serial($serial) {


		if($serial) {
			$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata
			$item = $this->encryption->decrypt($this->input->post('id')); 

			if($this->item_model->check_serial($item, $serial)) {
				$this->form_validation->set_message('check_serial', 'Serial is Registered from another Item!');		
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			return TRUE;
		}
	}



	public function delete()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{
			
			//FORM VALIDATION
			$this->form_validation->set_rules('id', 'ID', 'trim|required');   
		 
		   if($this->form_validation->run() == FALSE)	{

				$this->session->set_flashdata('error', 'An Error has Occured!');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');

			} else {

				$key_id = $this->encryption->decrypt($this->input->post('id')); //ID of the row				

				if($this->item_model->delete($key_id)) {

					$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'item',
							'tag_id'	=> 	$key_id,
							'action' 	=> 	'Deleted Item'
							);

				
						//Save log loop
						foreach($log as $lg) {
							$this->logs_model->create_log($lg['user'], $lg['tag'], $lg['tag_id'], $lg['action']);				
						}		
						////////////////////////////////////
					$this->session->set_flashdata('success', 'Item Deleted!');
					redirect('items', 'refresh');
				}
			}

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}



	public function print_total_inventory()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['site_title'] = APP_NAME;
			$data['user'] = $this->user_model->userdetails($userdata['username']); //fetches users record

			//Page Data 
			//$data['items']		= $this->inventory_model->fetch_items(NULL, NULL, NULL, NULL);
			$data['items']     = $this->inventory_model->total_inventory();
			$data['total_items'] = $this->inventory_model->count_items(NULL, NULL);
			$data['title'] 		= 'Total Inventory Report';

		
			//Validate Usertype
			if($data['user']['usertype'] == 'Administrator') {
				
				$this->load->view('items/print_total_inventory', $data);
				
			} else {
				show_error('Oops! Your account does not have the privilege to view the content. Please Contact the Administrator', 403, 'Access Denied!');				
			}		

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}



	public function rebatch()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{
			
			//FORM VALIDATION
			$this->form_validation->set_rules('id', 'ID', 'trim|required');   
		 
		   if($this->form_validation->run() == FALSE)	{

				$this->session->set_flashdata('error', 'An Error has Occured!');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');

			} else {

				$key_id = $this->encryption->decrypt($this->input->post('id')); //ID of the row				
				$batch 	= $this->inventory_model->view_item($key_id, NULL); 
				$qty 	= $this->input->post('qty'); 
				$srp 	= $this->input->post('srp'); 
				$dp 	= $this->input->post('dp'); 

				//Subract inventory from current batch
				$this->inventory_model->add_inventory($batch['item_id'], ($qty*-1), $batch['srp'], $batch['dp']);
				//Add inventory to new batch
				$new_batch = $this->inventory_model->add_inventory($batch['item_id'], ($qty), $srp, $dp);
				

				$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'inventory',
							'tag_id'	=> 	$key_id,
							'action' 	=> 	'Rebatched ' . $qty . ' items to Batch ' . $new_batch
							);

				$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'inventory',
							'tag_id'	=> 	$new_batch,
							'action' 	=> 	'Rebatched ' . $qty . ' items from Batch ' . $key_id
							);

				
						//Save log loop
						foreach($log as $lg) {
							$this->logs_model->create_log($lg['user'], $lg['tag'], $lg['tag_id'], $lg['action']);				
						}		
						////////////////////////////////////
					$this->session->set_flashdata('success', 'Successfully Rebatched!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				
			}

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


		public function restock_inventory() {

			$userdata = $this->session->userdata('admin_logged_in');

			if ($userdata) {
				$data['site_title'] = APP_NAME;
				$data['title'] = 'Restock Inventory';
				$data['user'] = $this->user_model->userdetails($userdata['username']);

				$data['items'] = $this->item_model->fetch_import_items(0);

				$this->load->view('items/restock_inventory', $data);

			} else {

				$this->session->set_flashdata('error', 'You need to login!');
				redirect('dashboard/login', 'refresh');
			}

		}

		public function add_restock()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{
			
			//Form Validation for user
			$this->form_validation->set_rules('item', 'Inventory', 'trim|required');   
		 
		   if($this->form_validation->run() == FALSE)	{

				$this->session->set_flashdata('error', 'An Error has Occured!');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');

			} else {

				$post_name = $this->input->post('item');
				$item_id = $this->item_model->view($this->input->post('item')); //ID of the row		
				$id      = $this->encryption->decrypt($this->input->post('id'));

				$info = $this->item_model->view_cart_item($item_id['id'], $id);
				//add item if it doesn't exist in the list; else update qty + 1
				if ($info) {
					//update
					$flag = $this->item_model->update_cart_qty($info['id'], $info['qty'] + 1);					
				} else {
					//create / add to cart
					$flag = $this->item_model->add_cart_item($post_name, 1, $item_id['dp'], $item_id['srp']);
				}		

				if($flag) {

					$this->session->set_flashdata('success', 'Added to Cart!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Error Occured!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			}

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


/* *****************************************************************************************************/


	public function update_cart()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{
			
			//Form Validation for user
			$this->form_validation->set_rules('id[]', 'ID', 'trim|required');
			$this->form_validation->set_rules('dp[]', 'Dealers Price', 'trim|required|callback_validate'); 
			$this->form_validation->set_rules('srp[]', 'Selling Price', 'trim|required');
			$this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required');   
		 
		   if($this->form_validation->run() == FALSE)	{

				$notif['warning'] = array_values($this->form_validation->error_array());
		   		$this->sessnotif->setNotif($notif);
				redirect($_SERVER['HTTP_REFERER'], 'refresh');

			} else {

				$import_id = $this->encryption->decrypt($this->input->post('imp_id'));

				foreach ($this->input->post('id') as $key =>$item) {

					$qty = $this->input->post('qty')[$key];
					$dp  = $this->input->post('dp')[$key];
					$srp = $this->input->post('srp')[$key];

				$flag = $this->import_model->update_item_qty($this->encryption->decrypt($item), $qty, $dp, $srp, $import_id);
				}
				

				if($flag) {

					$this->session->set_flashdata('success', 'Items Updated!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Error Occured!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			}

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}

/* SUBMIT CART *****************************************************************************************/
	/**
	 * Submits Add Stock / Restock Batch Cart
	 * @return [type] [description]
	 */
	public function submit_cart()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{	

			//Form Validation for user  
			$this->form_validation->set_rules('description', 'Description', 'trim|required');  
		

				if($this->form_validation->run() == FALSE)	{

				$this->session->set_flashdata('error', 'An Error has Occured!');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
				} else {			

					$import_id = $this->item_model->submit_cart($userdata['username']);
					//Proceed saving candidate				
					if($import_id) {		
						$items = $this->inventory_model->fetch_import_items($import_id); //fetch all items from the last import


						if ($items) {
							//Loop and add to inventory
							foreach ($items as $item) {
								$this->inventory_model->add_inventory($item['item_id'], $item['qty'], $item['srp'], $item['dp']);
							}
						}
						
						$this->session->set_flashdata('success', 'Succes! Successfully Submitted!');
						redirect($_SERVER['HTTP_REFERER'], 'refresh');
					} else {
						//failure
						$this->session->set_flashdata('error', 'Oops! Error occured!');
						redirect($_SERVER['HTTP_REFERER'], 'refresh');
					}			
					
				}	
			}	 else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


	/*************************************************************************************************************
	*/
	public function autocomplete()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata
		$user = $this->user_model->userdetails($userdata['username']); //fetches users record

		if($userdata)	{

			if (isset($_GET['term'])){
		      $q = strtolower($_GET['term']);
		      $result = $this->item_model->fetch_items(10, NULL, $q);

		      foreach($result as $row) {
		      	if ($row['is_deleted'] == 0) {
		      	$new_row['label']=htmlentities(stripslashes($row['id'] . ' - ' . $row['name'] . ' - ' . $row['dp'] . ' - ' . $row['srp']));
	            $new_row['value']=htmlentities(stripslashes($row['id']));
	            $row_set[] = $new_row; //build an array
	          	}
	          }
	          echo json_encode($row_set); //format the array into json data     
		    }				


		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


}
