<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()	{
		parent::__construct();		
       $this->load->model('user_model');
       $this->load->model('sales_model');
       $this->load->model('inventory_model');
       $this->load->model('import_model');
       $this->load->model('item_model');
	}	


	public function index()		{

		$userdata = $this->session->userdata('admin_logged_in'); //it's pretty clear it's a userdata

		if($userdata)	{

			$data['title'] = 'Dashboard';
			$data['site_title'] = APP_NAME;
			$data['user'] = $this->user_model->userdetails($userdata['username']); //fetches users record
			$data['items'] = $this->inventory_model->critical_inventory();

			$data['passwordverify'] = $this->user_model->check_user($userdata['username'], 'Bianos'); //boolean - returns false if default password
			
			$data['count_inventory'] = $this->item_model->count_items(NULL); 
			$data['count_users'] = $this->user_model->count_users(NULL);
			$data['count_sales'] = $this->sales_model->count_sales(NULL, NULL, NULL);
			$data['count_imports'] = $this->import_model->count_imports(NULL);

			$data['pending'] 	= $this->sales_model->fetch_sales(NULL, NULL, NULL, NULL, 0);

			if($data['user']['usertype'] == 'Administrator') {			
			
				$this->load->view('dashboard/dashboard_admin', $data);						

			} else {

				$data['low_items'] 		= $this->sales_model->fetch_sale_items(0, $data['user']['username']);

				$this->load->view('dashboard/dashboard_user', $data);					

			}



		} else {

			$this->session->set_flashdata('error', 'You need to login!');
			redirect('dashboard/login', 'refresh');
		}

	}


	/**
	 * -------------------------------------------------------------------------------------------------------
	 * Login Functionality
	 */

	public function login()		{

		$data['title'] = 'Login';
		$data['site_title'] = APP_NAME;	


		if($this->session->userdata('admin_logged_in'))	{
		        redirect('dashboard', 'refresh');
		} else {
			
			//FORM VALIDATION
			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_user');   
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			 
			   if($this->form_validation->run() == FALSE)	{

					$this->load->view('user/admin_login', $data);

				} else {

					redirect('dashboard', 'refresh');
			}
				
		}	
	}

	public function check_user($username) {

		$result = $this->user_model->check_user($username, $this->input->post('password'));

		if($result) {
			$this->session->set_userdata('admin_logged_in', array('username' => $username)); //set userdata

			//Log Data
			$log[] = array(
							'user' 		=> 	$username,
							'tag' 		=> 	'system',
							'tag_id'	=> 	" ",
							'action' 	=> 	'User Logged in'
			);

			//Save log loop
				foreach($log as $lg) {
				$this->logs_model->create_log($lg['user'], $lg['tag'], $lg['tag_id'], $lg['action']);				
			}		

			return TRUE;
		} else {
			$this->form_validation->set_message('check_user', 'Username or Password does not match!');
			return FALSE;
		}
	}

	/**
	 * ---------------------------------------------------------------------------------------------------------
	 */



	public function logout() {
		$this->session->set_flashdata('success', 'You sucessfuly logged out!');
		$this->session->unset_userdata('admin_logged_in');		  
		redirect('dashboard/login', 'refresh');
	}


	function getTopItems() {

		echo json_encode($this->sales_model->getTopItems(10));

	}


	function getSales() {
		echo json_encode($this->sales_model->getMonthlySales(12));
	}


}
