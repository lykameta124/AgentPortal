<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {
	function  __construct() {
        parent::__construct();

        
    }
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function login(){
		if($this->session->userdata('type')=="User"){
			redirect('User_controller/User_home');
		}
		elseif($this->session->userdata('type')=="Manager"){
			redirect('Manager_controller/Manager_home');

		}
		elseif($this->session->userdata('type')=="Admin"){
			redirect('Admin_controller/Admin_home');

		}
		else{

	
			$this->form_validation->set_rules('username','Username','min_length[5]');
			$this->form_validation->set_rules('password','Password','min_length[8]|max_length[32]');
				

			if ($this->form_validation->run() == TRUE){
				$query = $this->U_model->getLoginAccount();
				
				if($query->row()==TRUE && $query->row()->type=="User" ){
					$this->session->set_flashdata('success','You are logged in');

					$_SESSION['user_logged'] = TRUE;

					redirect('User_controller/User_home');
				}
				else if($query->row()==TRUE && $query->row()->type=="Manager" ){
					$this->session->set_flashdata('success','You are logged in');

					$_SESSION['user_logged'] = TRUE;

					redirect('Manager_controller/Manager_home');
				}
				else{
					if($query->row()==TRUE && $query->row()->type=="Admin"){
						$this->session->set_flashdata('success','You are logged in.');
						$_SESSION['user_logged'] = TRUE;
						redirect('Admin_controller/Admin_home');
					}
						
				}
			}
			
		}
		$this->load->view('login');
	}
}
