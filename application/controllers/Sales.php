<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct()	{
		parent::__construct();		
       $this->load->model('user_model');
       $this->load->model('item_model');
       $this->load->model('sales_model');
       $this->load->model('move_model');
       $this->load->model('inventory_model');
	}	



	public function index()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['title'] 		= 'Sales';
			$data['site_title'] = APP_NAME;
			$data['user'] 		= $this->user_model->userdetails($userdata['username']); //fetches users record

			//Access Control
			if($data['user']['usertype'] == 'Administrator' || $data['user']['usertype'] == 'Cashier') {
				//Search 
				$search = '';
				if(isset($_GET['search'])) {
					$search = $_GET['search'];
				}	

				//Search Date
				$date = '';
				if(isset($_GET['date'])) {
					$date = $_GET['date'];
				}	

				//Paginated data				            
		   		$config['num_links'] = 5;
				$config['base_url'] = base_url('/sales/index/');
				$config["total_rows"] = $this->sales_model->count_sales($search, $date, NULL);
				$config['per_page'] = 20;				
				$this->load->config('pagination'); //LOAD PAGINATION CONFIG

				$this->pagination->initialize($config);
			    if($this->uri->segment(3)){
			       $page = ($this->uri->segment(3)) ;
			  	}	else 	{
			       $page = 1;		               
			    }

			    $data["results"] = $this->sales_model->fetch_sales($config["per_page"], $page, $search, $date, NULL);
			    $str_links = $this->pagination->create_links();
			    $data["links"] = explode('&nbsp;',$str_links );

			    //ITEM NUMBERING
			    $data['per_page'] = $config['per_page'];
			    $data['page'] = $page;

			    //GET TOTAL RESULT
			    $data['total_result'] = $config["total_rows"];
			    //END PAGINATION
			
				$this->load->view('sales/list', $data);
				
			} else {
				show_error('Oops! Your account does not have the privilege to view the content. Please Contact the Administrator', 403, 'Access Denied!');				
			}

		
		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


	public function print_report()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['site_title'] = APP_NAME;
			$data['user'] 		= $this->user_model->userdetails($userdata['username']); //fetches users record

			//Access Control
			if($data['user']['usertype'] == 'Administrator') {
				//Search 
			
				//Search Date
				$date = '';
				if(isset($_GET['date'])) {
					$date = $_GET['date'];
				}	

				$data['title'] 		= 'Summary Sales Report -' . $date;


				$config["total_rows"] = $this->sales_model->count_sales('', $date);
			    $data["results"] = $this->sales_model->fetch_sales(0, 0, '', $date);

			    //GET TOTAL RESULT
			    $data['total_result'] = $config["total_rows"];
			    //END PAGINATION
			
				$this->load->view('sales/print', $data);
				
			} else {
				show_error('Oops! Your account does not have the privilege to view the content. Please Contact the Administrator', 403, 'Access Denied!');				
			}

		
		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


	/**
	 * Only Creates a Sales Queue / Pending for Verification
	 * @return [type] [description]
	 */
	public function create()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['title'] 		= 'Sales Register';
			$data['site_title'] = APP_NAME;
			$data['user'] 		= $this->user_model->userdetails($userdata['username']); //fetches users record
			$data['items'] 		= $this->sales_model->fetch_sale_items(0, $data['user']['username']);
		
			//Form Validation for user
			$this->form_validation->set_rules('customer', 'Customer Name', 'trim|required');  
			$this->form_validation->set_rules('remarks', 'Remarks', 'trim'); 
			$this->form_validation->set_rules('amt_tendered', 'Amount Tendered', 'trim|required|decimal'); 

			//Validate Usertype
			if($data['user']['usertype'] == 'Administrator' || $data['user']['usertype'] == 'Cashier') {

				if($this->form_validation->run() == FALSE)	{
					
					$this->load->view('sales/create', $data);

				} else {					

					//Proceed Saving Sale Queue
					$sale_id = $this->sales_model->create($userdata['username']);
					
					//On Success
					if($sale_id) {							
						
						$items = $this->sales_model->fetch_sale_items($sale_id, NULL);

						if ($items) {

							foreach ($items as $item) {
								$this->inventory_model->add_inventory($item['item_id'], ($item['qty']*-1), $item['srp'], $item['dp']);
							}

						}

						$this->session->set_flashdata('success', 'Sale Queue Generated!');
						redirect('sales/view/'.$sale_id, 'refresh');
					} else {
						//failure
						$this->session->set_flashdata('error', 'Error occured!');
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

	/**
	 * Verifies Sale and Update Inventory
	 * @return [type] [description]
	 */
	public function verify()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{
			
			//FORM VALIDATION
			$this->form_validation->set_rules('id', 'ID', 'trim|required');   
			$this->form_validation->set_rules('status', 'Status', 'trim|required');   
		 
		   if($this->form_validation->run() == FALSE)	{
				$this->session->set_flashdata('error', 'An Error has Occured!');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');

			} else {
				$id 	= $this->encryption->decrypt($this->input->post('id'));
				$status = $this->encryption->decrypt($this->input->post('status'));

				$info = $this->sales_model->view($id);

				$items = $this->sales_model->fetch_sale_items($id, NULL); //fetch all items in the Move Items

				if($this->sales_model->verify($id, $status)) {
					
					if($status == 2) {
						//proceed to purchase
						foreach ($items as $i) {
							//Update Inventory from Sending Location
							$batch_id = $this->inventory_model->add_inventory($i['item_id'], ($i['qty']*-1), $info['location'], $i['srp'], $i['dp']);
							//Save Inventory Logs
							$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'inventory',
							'tag_id'	=> 	$batch_id,
							'action' 	=> 	'Sold ' . $i['qty'] . ' items from ' . $info['location'] . ' SALE #' . prettyID($id)
							);							
							
						}
						// Save Log Data ///////////////////				

						$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'sale',
							'tag_id'	=> 	$id,
							'action' 	=> 	'Purchased by ' . $info['customer']
						);
					} elseif($status == 0) {
						$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'sale',
							'tag_id'	=> 	$id,
							'action' 	=> 	'Cancelled'
						);
					}

				
					//Save log loop
					foreach($log as $lg) {
						$this->logs_model->create_log($lg['user'], $lg['tag'], $lg['tag_id'], $lg['action']);				
					}							
					////////////////////////////////////
					
					$this->session->set_flashdata('success', 'Purchase Success!');
					redirect('sales/view/'.$id, 'refresh');
				}

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

			$data['info']		= $this->sales_model->view($id);
			$data['title']		= 'Sale #' . prettyID($data['info']['id']);
			$data['items'] 		= $this->sales_model->fetch_sale_items($id, NULL);

			
			//Validate Usertype
			if($data['user']['usertype'] == 'Administrator' || $data['user']['usertype'] == 'Cashier') {				

				$this->load->view('sales/view', $data);				
					
			} else {
				show_error('Oops! Your account does not have the privilege to view the content. Please Contact the Administrator', 403, 'Access Denied!');				
			}		

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}

	


	public function update($id)		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['site_title'] = APP_NAME;
			$data['user'] = $this->user_model->userdetails($userdata['username']); //fetches users record	

			$data['info']		= $this->sales_model->view($id);
			$data['title']		= 'Update Sale #' . prettyID($data['info']['id']);
			$data['items'] 		= $this->sales_model->fetch_sale_items($id, NULL);

			//Form Validation for user
			$this->form_validation->set_rules('id', 'ID', 'trim|required');  
			$this->form_validation->set_rules('customer', 'Customer Name', 'trim|required');  
			$this->form_validation->set_rules('remarks', 'Remarks', 'trim'); 
			$this->form_validation->set_rules('amt_tendered', 'Amount Tendered', 'trim|required|decimal'); 

			//Validate Usertype
			if($data['user']['usertype'] == 'Administrator' || $data['user']['usertype'] == 'Cashier') {				

				if($this->form_validation->run() == FALSE)	{
					if($data['info']['status'] == 1) {
					$this->load->view('sales/update', $data);			
					} else {
						$this->load->view('sales/view', $data);			
					}
				} else {					
					$id = $this->encryption->decrypt($this->input->post('id'));
					//On Success
					if($this->sales_model->update($id)) {	
						$this->session->set_flashdata('success', 'Sales Queue Updated!');
						redirect('sales/view/'.$id, 'refresh');
					} else {
						//failure
						$this->session->set_flashdata('error', 'Error occured!');
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




	public function add_item()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata
		$user = $this->user_model->userdetails($userdata['username']); //fetches users record

		if($userdata)	{
			
			//FORM VALIDATION
			$this->form_validation->set_rules('item', 'Item', 'trim|required|callback_check_item');   
		 
		   if($this->form_validation->run() == FALSE)	{

				$this->session->set_flashdata('error', 'An Error has Occured!');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');

			} else {
				$sales_id = $this->encryption->decrypt($this->input->post('sale_id'));

				$item = $this->input->post('item');
				$sale_item = $this->sales_model->check_sales_item_queue($item, $sales_id);

				//checks if it is in the actual cart
				if($sale_item) {

					$qty  = $this->sales_model->view_item($sale_item['id'], $sales_id); //gets the value of the existing quantity
					$action = $this->sales_model->update_item_qty($sale_item['id'], $qty['qty'] + 1, $sales_id); // existing qty + 1; update quantity

				} else {
					//add to cart
					$items = $this->sales_model->check_sale_item($item); //get item data					
					$action = $this->sales_model->add_item($items['batch_id'], $items['item_id'], 1, $items['srp'], $sales_id); //ID of the row	
				}
							

				if($action) {

					$this->session->set_flashdata('success', 'Item Added to Cart!');			
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			}

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


	/**
	 * Checks if ITEM Exist in the Storage Inventory / Item List
	 * @param  [type] $item [description]
	 * @return [type]       [description]
	 */
	function check_item($item) {

		$id = $this->encryption->decrypt($this->input->post('id')); //sale_id

		if($this->sales_model->check_sale_item($item)) {
			return TRUE;
		} else {
			$this->session->set_flashdata('error', 'No Item Record Found!');		
			return FALSE;
		}
	}


	public function update_items() {

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{
			
			//FORM VALIDATION
			$this->form_validation->set_rules('id[]', 'ID', 'trim|required');     
			$this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required|callback_check_quantity');   
			$this->form_validation->set_rules('disc[]', 'Discounts', 'trim');   
		 
		   if($this->form_validation->run() == FALSE)	{

			  //convert validation errors to flashdata notification
	          $notif['warning'] = array_values($this->form_validation->error_array());
	          $this->sessnotif->setNotif($notif);

	          redirect($_SERVER['HTTP_REFERER'], 'refresh');

			} else {

				$sale_id = $this->encryption->decrypt($this->input->post('sale_id'));				

				foreach ($this->input->post('id') as $key => $item) {
		                      
		            $qty   = $this->input->post('qty')[$key];        

		           	$this->sales_model->update_item_qty($this->encryption->decrypt($item), $qty, $sale_id);
             
		        }		
		        
					$this->session->set_flashdata('success', 'Items Updated!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
					
				
			}

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}
		
	}

	/**
	 * Checks the Current Quantity 
	 * @return [type] [description]
	 */
	function check_quantity() {

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata
		$user = $this->user_model->userdetails($userdata['username']); //fetches users record

		$sale_id = $this->encryption->decrypt($this->input->post('sale_id'));

		foreach ($this->input->post('qty') as $key => $qty) {

			$row_id = $this->encryption->decrypt($this->input->post('id')[$key]); //row

			$sale_item = $this->sales_model->view_item($row_id, $sale_id);

			//check if it's Served Goods 
			if ($sale_item['batch_id']) {
				//Merchandise Items
				$inv_qty = $this->inventory_model->view_item($sale_item['batch_id']); //fetches qty

				if($this->input->post('qty')[$key] > $inv_qty['qty']) {
					//returns false on Error
					$this->form_validation->set_message('check_quantity', 'Check Quantity of <span class="badge badge-flat badge-primary">' . $inv_qty['batch_id'] . '</span> Current Items in Stock: <span class="badge badge-flat badge-danger">'. $inv_qty['qty'] . '</span>');
					return FALSE;
				} 
			}
		}

		return TRUE;
		
		
	}


	public function autocomplete_items()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata
		$user = $this->user_model->userdetails($userdata['username']); //fetches users record

		if($userdata)	{

			if (isset($_GET['term'])){
		      $q = strtolower($_GET['term']);
		      $result = $this->sales_model->autocomplete_items($q);

		     foreach($result as $row) {
		      	if ($row['batch_id']) {
		      		$new_row['label']=htmlentities(stripslashes($row['batch_id'] . ' - ' . $row['name'] . ' (In Stock: ' . $row['qty']. ' ' . $row['unit']). ' | SRP:' . $row['srp'] .')');
	            	$new_row['value']=htmlentities(stripslashes($row['batch_id']));
		      	} else {
		      		$new_row['label']=htmlentities(stripslashes($row['id'] . ' - ' . $row['name'] . ' (In Stock: ' . $row['qty']. ' ' . $row['unit']). ' | SRP:' . $row['srp'] .')');
	            	$new_row['value']=htmlentities(stripslashes($row['id']));
		      	}

	            $row_set[] = $new_row; //build an array
	          }
	          echo json_encode($row_set); //format the array into json data     
		    }				


		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}








}
