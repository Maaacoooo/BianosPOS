<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Imports extends CI_Controller {

	public function __construct()	{
		parent::__construct();		
       $this->load->model('item_model');
       $this->load->model('import_model');
       $this->load->model('user_model');
       $this->load->model('inventory_model');
	}	

	public function index()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['title'] 		= 'Imports';
			$data['site_title'] = APP_NAME;
			$data['user'] 		= $this->user_model->userdetails($userdata['username']); //fetches users record

			//Access Control
			if($data['user']['usertype'] == 'Administrator') {
				//Search 
				$search = '';
				if(isset($_GET['search'])) {
					$search = $_GET['search'];
				}	

				//Paginated data				            
		   		$config['num_links'] = 5;
				$config['base_url'] = base_url('/imports/index/');
				$config["total_rows"] = $this->import_model->count_imports($search);
				$config['per_page'] = 20;				
				$this->load->config('pagination'); //LOAD PAGINATION CONFIG

				$this->pagination->initialize($config);
			    if($this->uri->segment(3)){
			       $page = ($this->uri->segment(3)) ;
			  	}	else 	{
			       $page = 1;		               
			    }

			    $data["results"] = $this->import_model->fetch_imports($config["per_page"], $page, $search);
			    $str_links = $this->pagination->create_links();
			    $data["links"] = explode('&nbsp;',$str_links );

			    //ITEM NUMBERING
			    $data['per_page'] = $config['per_page'];
			    $data['page'] = $page;

			    //GET TOTAL RESULT
			    $data['total_result'] = $config["total_rows"];
			    //END PAGINATION		
			
				$this->load->view('imports/list', $data);
			} else {
				show_error('Oops! Your account does not have the privilege to view the content. Please Contact the Administrator', 403, 'Access Denied!');				
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

			$data['info'] = $this->import_model->view($id);
			
			//Validate if record exist
			 //IF NO ID OR NO RESULT, REDIRECT
				if(!$id || !$data['info']) {
					redirect('imports', 'refresh');
			}	
		
			//Validate Usertype
			if($data['user']['username'] == $data['info']['username']) {

				$data['items'] = $this->import_model->fetch_import_items($id);

				//Form Validation
				$this->form_validation->set_rules('id', 'ID', 'trim|required');
				$this->form_validation->set_rules('remarks', 'Remarks', 'trim');   

				if($this->form_validation->run() == FALSE)	{

					if ($data['info']['status'] == 1) {
						//Updatable
						$data['title'] = 'Verify Import #'.prettyID($data['info']['id']);						
						$this->load->view('imports/update', $data);						
					} else {
						//View
						$data['title'] = 'Imports #'.prettyID($data['info']['id']);						
						$this->load->view('imports/view', $data);					
					}

				} else {	
					$key_id = $this->encryption->decrypt($this->input->post('id')); //ID of the row

					if($this->import_model->update($key_id)) {	

						// LOOP IMPORT ITEMS
						foreach ($data['items'] as $inv) {
							//Save to Actual Inventory
							$batch_id = $this->inventory_model->add_inventory($inv['item_id'], $inv['qty'], $location['title'], $inv['srp'], $inv['dp']);
							//Save Item Logs
							$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'item',
							'tag_id'	=> 	$inv['item_id'],
							'action' 	=> 	'Updated Inventory - Batch ' . $batch_id
							);

							//Save Inventory Logs
							$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'inventory',
							'tag_id'	=> 	$batch_id,
							'action' 	=> 	'Imported ' . $inv['qty'] . ' items in ' . $location['title']
							);
							//Update Item Information
							$this->item_model->update_prices($inv['item_id'], $inv['srp'], $inv['dp']);
						}

						// SAVE LOG ////////////////////////////////////////
						$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'import',
							'tag_id'	=> 	$key_id,
							'action' 	=> 	'Imported to actual inventory - ' . $location['title']
						);

						$log[] = array(
							'user' 		=> 	$userdata['username'],
							'tag' 		=> 	'location',
							'tag_id'	=> 	$location['id'],
							'action' 	=> 	'Imported Items - IMP #' . prettyID($key_id)
						);

				
						//Save log loop
						foreach($log as $lg) {
							$this->logs_model->create_log($lg['user'], $lg['tag'], $lg['tag_id'], $lg['action']);				
						}		
						////////////////////////////////////
						
					
						$this->session->set_flashdata('success', 'Items Imported!');
						redirect($_SERVER['HTTP_REFERER'], 'refresh');
					} else {
						//failure
						$this->session->set_flashdata('error', 'Oops! Error occured!');
						redirect($_SERVER['HTTP_REFERER'], 'refresh');
					}			
					
				}	
			} elseif($data['user']['usertype'] == 'Administrator') {
				//View
				$data['items'] = $this->import_model->fetch_import_items($id);					
				$this->load->view('imports/view', $data);	

			} else {
				show_error('Oops! Your account does not have the privilege to view the content. Please Contact the Administrator', 403, 'Access Denied!');				
			}		

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}



	public function autocomplete_items()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata
		$user = $this->user_model->userdetails($userdata['username']); //fetches users record

		if($userdata)	{

			if (isset($_GET['term'])){
		      $q = strtolower($_GET['term']);
		      $result = $this->item_model->search($q, $user['brand']);

		      foreach($result as $row) {
		      	$new_row['label']=htmlentities(stripslashes($row['name'] . '(' . $row['unit'].')'));
	            $new_row['value']=htmlentities(stripslashes($row['id']));
	            $row_set[] = $new_row; //build an array
	          }
	          echo json_encode($row_set); //format the array into json data     
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

				$item = $this->item_model->view($this->input->post('item'))['id'];
				$import_id = $this->encryption->decrypt($this->input->post('id'));

				if($this->import_model->view_item($item, $import_id)) {

					$qty  = $this->import_model->view_item($item, $import_id)['qty']; //gets the value of the existing quantity
					$action = $this->import_model->update_item_qty($item, ($qty+1), $import_id); // existing qty + 1; update quantity

				} else {
					$action = $this->import_model->add_item($item, 1, $import_id); //ID of the row	
				}
							

				if($action) {

					$this->session->set_flashdata('success', 'Item Added!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			}

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


	/**
	 * Checks if ITEM Exist
	 * @param  [type] $item [description]
	 * @return [type]       [description]
	 */
	function check_item($item) {

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($this->item_model->view($item)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('check_item', 'No Item Record Found!');		
			return FALSE;
		}
	}


	public function update_items() {

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{
			
			//FORM VALIDATION
			$this->form_validation->set_rules('id[]', 'ID', 'trim|required');     
			$this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required');   
			$this->form_validation->set_rules('srp[]', 'SRP', 'trim|required');   
		 
		   if($this->form_validation->run() == FALSE)	{

				$this->session->set_flashdata('error', 'An Error has Occured!');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');

			} else {

				$import_id = $this->encryption->decrypt($this->input->post('imp_id'));				

				foreach ($this->input->post('id') as $key => $item) {
		                      
		            $qty   = $this->input->post('qty')[$key];        
		            $srp   = $this->input->post('srp')[$key];        

		           	$this->import_model->update_item_qty($this->encryption->decrypt($item), $qty, $srp, $import_id);
             
		        }		
		        
					$this->session->set_flashdata('success', 'Items Updated!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
					
				
			}

		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}
		
	}



}
