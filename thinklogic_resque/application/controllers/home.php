<?php 

class Home extends CI_Controller{

	public function  __construct() 
	{
        parent::__construct();
		$this->load->model('home_model'); 
		$this->load->model('get_model');
		if($this->session->userdata('username') == TRUE)
		{
			if($this->session->userdata('access_type') == 'Admin'){
				redirect(base_url() . 'admin');
			} else if($this->session->userdata('access_type') == 'Manager'){
				redirect(base_url() . 'manager');
			} else if($this->session->userdata('access_type') == 'User'){
				redirect(base_url() . 'user');
			}else if($this->session->userdata('access_type') == 'Agent'){
				redirect(base_url() . 'home/homepage');
			}
		}
    }
	public function index()
	{
		
		$this->homepage();
	}
	public function homepage() 
	{
		$this->load->view('login');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$results = $this->home_model->can_login($username,$password);

		if($results)
		{	
			
			foreach($this->get_model->getSingleEmployee($results['emp_id']) as $row ){
			$session_data = array(
					'emp_id' => $row->emp_id,
					'username' => $row->username,
					'password' => $row->password,
					'access_type' => $row->access_type,
					'image' => $row->image,
					'first_name' => $row->first_name,
					'middle_name' => $row->middle_name,
					'last_name' => $row->last_name,
					'department_name' => $row->department_name
				);
			}
			$this->session->set_userdata($session_data);
			$this->enter();
		} else {
			$this->session->set_flashdata('invalid','Invalid username or password.');
			redirect(base_url() . 'home/homepage');
		}
	}
	public function enter()
	{
		if($this->session->userdata('username') != '')
		{
			if($this->session->userdata('access_type') == 'Admin'){
				redirect(base_url() . 'admin');
			} else if($this->session->userdata('access_type') == 'Manager'){
				redirect(base_url() . 'manager');
			} else if($this->session->userdata('access_type') == 'User'){
				redirect(base_url() . 'user');
			}else if($this->session->userdata('access_type') == 'Agent'){
				redirect(base_url() . 'home/homepage');
			}
		} else {
			redirect(base_url() . 'home/homepage');
		}
	}
}












