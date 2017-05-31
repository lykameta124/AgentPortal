<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp_Controller extends CI_Controller {
	function  __construct() {
        parent::__construct();
		 	$this->load->model('Sign_model');

        
    }
	
	public function index()
	{	
		$data['teamQuery'] = $this->Sign_model->getTeam();
		$data['departmentQuery'] = $this->Sign_model->getDepartment();
		$data['accessType'] = $this->Sign_model->getAccessType();
		$this->load->view('sign_up',$data);
	}
	
	
	public function sign_up(){
		
		$this->form_validation->set_rules('first_name','First Name','trim|required|alpha_numeric_spaces',
            array('alpha_numeric_spaces' => 'The %s is incorrect.'));
		if($this->form_validation->run())  
       {  
   
			$employeeData = array(
			'first_name' => $this->input->post('first_name'),
			'middle_name' => $this->input->post('middle_name'),
			'last_name' => $this->input->post('last_name'),
			'gender' => $this->input->post('gender'),
			'civil_status' => $this->input->post('civil_status'),
			'birthdate' => $this->input->post('birthdate'),
			'age' => $this->input->post('age'),
			'address' => $this->input->post('address'),
			'contact_no' => $this->input->post('number')
			);
			
			$employeeTeam = array (
				'emp_id' => $this->input->post('emp_id'),
				'team_id' => $this->input->post('team_id'),
				'department_id' => $this->input->post('department_id')
			);
			
			$this->Sign_model->add_employee($employeeData);
			$this->Sign_model->add_employeeTeam($employeeTeam);
			redirect(base_url() . 'User_home.php');      
		}else  
			{  
				//false  
				$this->load->view('sign_up');  
			}
		}

	}

