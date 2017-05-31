<?php
class user extends CI_Controller{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('get_model');
		if($this->checkLogin()){
			redirect(base_url() . 'home');
		}  
    }
    public function checkLogin()
    {
    	if($this->session->userdata('username') != '')
		{
			if($this->session->userdata('access_type') == 'User'){
				return false;
			} else {
				return true;	
			}
		} else {
			return true;
		}
    }

/*------------------------------------------------------ vIEW FUNCTION -------------------------------------------------------*/
	public function index()
	{
		$this->tickets();
	}
	public function edit_ticket(){
		$id = $this->uri->segment(3);
		$data['singleTicket'] = $this->get_model->getSingleTicket($id);
		$this->load->view('include/user/user_header');
		$this->load->view('user/ticket/edit_ticket',$data);
		$this->load->view('include/user/user_footer');
	}
	public function single_ticket()
	{
		$id = $this->uri->segment(3);
		$data['singleTicket'] = $this->get_model->getSingleTicket($id);
		$data['note'] = $this->get_model->getNote($id);
		$this->load->view('include/user/user_header');
		$this->load->view('user/ticket/view_ticket',$data);
		$this->load->view('include/user/user_footer');
	}
	public function tickets()
	{
		$name = $this->session->userdata('first_name')." ".$this->session->userdata('middle_name')." ".$this->session->userdata('last_name');
		$id = $this->session->userdata('emp_id');
		$data['TicketOpen'] = $this->get_model->getTicket($name,'Open','');
		$data['TicketPending'] = $this->get_model->getTicket($name,'Pending','');
		$data['TicketAccepted'] = $this->get_model->getTicket($name,'Ongoing','');
		$data['TicketDeclined'] = $this->get_model->getTicket($name,'Declined','');
		$data['teamUnder'] = $this->get_model->getEmployeeUnder($id);
		$data['data'] = $this->get_model->getData($id);
		$data['ticket'] = $this->get_model->getTicket($name,'','');
		$data['ticketID'] = $this->get_model->getTicketID();
		$data['priority'] =  $this->get_model->getPriority();
		$data['depName'] = $this->get_model->getDepartment();
		$this->load->view('include/user/user_header');
		$this->load->view('user/ticket/ticketAll',$data);
		$this->load->view('include/user/user_footer');
	}
	public function profile()
	{
		$id = $this->session->userdata('emp_id');	
		$data['data'] = $this->get_model->getSingleEmployee($id);
		$data['teamData'] = $this->get_model->getTeam();
		$data['departmentData'] = $this->get_model->getDepartment();
		$data['accessData'] = $this->get_model->getAccessType();
		$this->load->view('include/user/user_header');
		$this->load->view('user/profile', $data);
		$this->load->view('include/user/user_footer');
	}
	public function edit_profile()
	{
		$id = $this->uri->segment(3);
		$data['data'] = $this->get_model->getSingleEmployee($id);
		$data['teamData'] = $this->get_model->getTeam();
		$data['departmentData'] = $this->get_model->getDepartment();
		$data['accessData'] = $this->get_model->getAccessType();
		$this->load->view('include/user/user_header');
		$this->load->view('user/edit_profile',$data);
		$this->load->view('include/user/user_footer');
	}
	public function myTeam()
	{
		$id = $this->session->userdata('emp_id');
		$data['teamUnder'] = $this->get_model->getEmployeeUnder($id);
		$this->load->view('include/user/user_header');
		$this->load->view('user/myTeamView',$data);
		$this->load->view('include/user/user_footer');
	}
	public function settings()
	{
		$this->load->view('include/user/user_header');
		$this->load->view('user/settings');
		$this->load->view('include/user/user_footer');
	}
/*--------------------------------------------------- END vIEW FUNCTION ---------------------------------------------*/

/*--------------------------------------------------- ADD FUNCTION  --------------------------------------------------*/
	public function add_Ticket()
	{
		$addTicket = array (
			'ticket_send' => $this->input->post('ticket_send'),
			'employee' => $this->input->post('employee'),
			'department' => $this->input->post('department'),
			'subject' => $this->input->post('subject'),
			'description' => $this->input->post('description'),
			'priority' => $this->input->post('priority'),
			'requestor' => $this->input->post('requestor')
		);
		$this->user_model->ticket($addTicket);
		redirect(base_url().'user/tickets');
	}
/*------------------------------------------------- END ADD FUNCTION -----------------------------------------------*/

/*------------------------------------------------- UPDATE FUNCTION ------------------------------------------------*/
	public function update_ticket()
	{
		$id = $this->input->post('ticket_id');
		$ticketData = array (
			'employee' => $this->input->post('employee'),
			'department' => $this->input->post('department'),
			'subject' => $this->input->post('subject'),
			'description' => $this->input->post('description'),
			'priority' => $this->input->post('priority'),
			'requestor' => $this->input->post('requestor')
			);
			$this->user_model->update_ticket($id,$ticketData);
			redirect(base_url().'user/tickets');
	}
	public function update_profile()
	{
		$id = $this->input->post('emp_id');

		$employeeData = array(
			'first_name' => ucwords($this->input->post('first_name')),
			'middle_name' => ucwords($this->input->post('middle_name')),
			'last_name' => ucwords($this->input->post('last_name')),
			'gender' => $this->input->post('gender'),
			'civil_status' => $this->input->post('civil_status'),
			'birthdate' => $this->input->post('birthdate'),
			'age' => $this->input->post('age'),
			'address' => $this->input->post('address'),
			'contact_no' => $this->input->post('number')
			);
			
			$employeeTeam = array (
				'team_id' => $this->input->post('team_id'),
				'department_id' => $this->input->post('department_id')
			);

			$registryData= array(
				'access_id' => $this->input->post('access_id'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);

		
			$this->user_model->updateProfile($id,$employeeData,$employeeTeam,$registryData);

			
			redirect(base_url() . 'user/profile');
	}
	public function update_TicketStatusToPending()
	{
		$id = $this->uri->segment(3);
		$this->user_model->update_TicketStatusToPending($id);
		redirect(base_url() . "user/single_ticket/$id");
	}
	public function update_username(){
		$id = $this->session->userdata('emp_id');
		$new_username = $this->input->post('new_username');
		$password = $this->input->post('password');
		if(md5($password) == $this->session->userdata('password')) {
			if($this->user_model->checkUsername($new_username)){
				$this->user_model->update_username($id,$new_username);
				$this->session->set_flashdata('flash','Username updated successfully.');
				redirect(base_url() . "user/settings");
			} else {
				$this->session->set_flashdata('flash', 'Username is already taken.');
				redirect(base_url() . "user/settings");
			}

		} else {
			$this->session->set_flashdata('flash', 'Incorrect password.');
			redirect(base_url() . "user/settings");
		}
	}
	public function update_password()
	{
		$id = $this->session->userdata('emp_id');
		$new_password = $this->input->post('new_password');
		$retype_password = $this->input->post('retype_password');
		$password = $this->input->post('password');

		if(md5($password) == $this->session->userdata('password')) {
			if($retype_password == $new_password){
				$this->user_model->update_password($id,$new_password);
				$this->session->set_flashdata('flash', 'Password updated successfully.');
				redirect(base_url() . "user/settings");
			} else {
				$this->session->set_flashdata('flash', '<strong>Invalid!</strong> Password did not match.');
				redirect(base_url() . "user/settings");
			}

		} else {
			$this->session->set_flashdata('flash', '<strong>Invalid!</strong> Incorrect password.');
			redirect(base_url() . "user/settings");
		}
	}
/*--------------------------------------- END UPDATE FUNCTION ---------------------------------------------------*/

	public function upload_picture()
	{	
		$id = $this->uri->segment(3);
		$url = $this->do_upload();
		$this->user_model->upload_picture($url,$id);
		redirect(base_url() . 'user/profile/' . $id);
	}
	private function do_upload()
	{
		$type = explode('.', $_FILES["img"]["name"]);
		$type = strtolower($type[count($type)-1]);
		$url = "./images/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg", "jpeg", "gif", "png")))
			if(is_uploaded_file($_FILES["img"]["tmp_name"]))
				if(move_uploaded_file($_FILES["img"]["tmp_name"],$url))
					return $url;
		return "";
	}
	public function logout()
	{
		$this->session->unset_userdata('username','usertype');
		redirect(base_url() . "home");
	}
}