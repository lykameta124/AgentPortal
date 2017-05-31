<?php
class admin extends CI_Controller{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('get_model');
		if($this->checkLogin()){
			redirect(base_url() . 'home');
		}
    }
    public function checkLogin()
    {
    	if($this->session->userdata('username') != '')
		{
			if($this->session->userdata('access_type') == 'Admin'){
				return false;
			} else {
				return true;	
			}
		} else {
			return true;
		}	
    } 
/*----------------------------------------------------------- VIEW FUNCTION -----------------------------------------------*/
	public function index()
	{
		$this->dashboard();	
	}
	public function settings(){
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/settings');
		$this->load->view('include/admin/admin_footer');
	}
	public function dashboard()
	{

		// line chart
		$monthNow = $year = date('F', time());
		$year = date('Y', time());
		$monthsArr = array('January', 'February', 'March', 'April', 'May', 'June', 
						'July', 'August', 'September', 'October', 'November', 'December');

		foreach($monthsArr as $this_month){
			if($this_month == $monthNow){
				$months[] = $this_month;
				break;
			} else {
				$months[] = $this_month;
			}
		}

		$count = 0;

		$records = $this->get_model->ticket();	
			
		foreach($months as $month){
			$dataR[0]['name'] = 'Tickets';
			$temp = 0;
			foreach($records as $r){
				if($month == date('F',strtotime($r->ticket_send)) && $year == date('Y',strtotime($r->ticket_send)))
				{
					$temp++;
				}
			}
			$dataR[0]['data'][] = $temp;
		}
		
		// donut chart
		$result = $this->get_model->donut_chart();
        
        if($result == NULL || $result == 0){  
        	$data = false;
			$data['graph_data'] = $data;

        }else{
			foreach($result as $row){
            $data[] = array(
                    'label' => $row['ticket_status'],
                    'value' => $row['no_of_like']
                );
     	   }
     	   $data['graph_data'] = json_encode($data);        	
        }
        $data['months'] = json_encode($months);
		$data['ticketsTotal'] = json_encode($dataR);
		$data['year'] = $year;
		$data['transaction'] = $this->get_model->transaction();
		$data['totalEmployees'] = $this->get_model->total_employees();
		$data['totalTickets'] = $this->get_model->total_tickets();
		$data['totalTeam'] = $this->get_model->total_team();
		$data['totalDepartment'] = $this->get_model->total_department();
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function single_ticket()
	{
		$id = $this->uri->segment(3);
		$emp_id = $this->session->userdata('emp_id');
		$data['assign']= $this->get_model->getIfAssign($id);
		$data['employee']= $this->Admin_model->get_employeeManagerType();
		$data['singleTicket'] = $this->get_model->getSingleTicket($id);
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/ticket/view_ticket',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function tickets()
	{
		$id = $this->session->userdata('emp_id');
		$data['TicketOpen'] = $this->get_model->getTicket('','Open','');
		$data['TicketPending'] = $this->get_model->getTicket('','Pending','');
		$data['TicketAccepted'] = $this->get_model->getTicket('','Ongoing','');
		$data['TicketDeclined'] = $this->get_model->getTicket('','Declined','');
		$data['data'] = $this->get_model->getData($id);
		$data['ticket'] = $this->get_model->ticket();
		$data['ticketID'] = $this->get_model->getTicketID();
		$data['priority'] =  $this->get_model->getPriority();
		$data['depName'] = $this->get_model->getDepartment();
		$data['employee'] = $this->get_model->getEmployee();
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/ticket/ticketAll',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function employees()
	{
		$data['employees'] = $this->get_model->getEmployees();
		$data['teamData'] = $this->get_model->getTeam();
		$data['departmentData'] = $this->get_model->getDepartment();
		$data['accessData'] = $this->get_model->getAccessType();
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/employees',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function department()
	{
		$data['depName'] = $this->get_model->getDepartment();
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/department',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function team()
	{
		$data['teamName'] = $this->get_model->getTeam();
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/team',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function profile()
	{
		$id = $this->session->userdata('emp_id');	
		$data['data'] = $this->get_model->getSingleEmployee($id);
		$data['teamData'] = $this->get_model->getTeam();
		$data['departmentData'] = $this->get_model->getDepartment();
		$data['accessData'] = $this->get_model->getAccessType();
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/profile', $data);
		$this->load->view('include/admin/admin_footer');
	}
	public function edit_ticket()
	{
		$id = $this->uri->segment(3);
		$data['singleTicket'] = $this->get_model->getSingleTicket($id);
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/ticket/edit_ticket',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function edit_employee()
	{
		$id = $this->uri->segment(3);
		$data['data'] = $this->get_model->getSingleEmployee($id);
		$data['teamData'] = $this->get_model->getTeam();
		$data['departmentData'] = $this->get_model->getDepartment();
		$data['accessData'] = $this->get_model->getAccessType();
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/edit_profile',$data);
		$this->load->view('include/admin/admin_footer');
	}
/*----------------------------------------------------------- END VIEW FUNCTION --------------------------------------------------------*/

/*----------------------------------------------------------- ADD FUNCTION -------------------------------------------------------------*/
	public function sign_up()
	{
		if($this->Admin_model->checkUsername($this->input->post('username'))){
			$employeeData = array(
			'first_name' => ucwords($this->input->post('first_name')),
			'middle_name' => ucwords($this->input->post('middle_name')),
			'last_name' => ucwords($this->input->post('last_name')),
			'gender' => $this->input->post('gender'),
			'civil_status' => $this->input->post('civil_status'),
			'birthdate' => $this->input->post('birthdate'),
			'age' => $this->input->post('age'),
			'address' => ucwords($this->input->post('address')),
			'contact_no' => $this->input->post('number')
			);
			
			$emp_id = $this->Admin_model->add_employee($employeeData);
			$employeeTeam = array (
				'emp_id' => $emp_id,
				'team_id' => $this->input->post('team_id'),
				'department_id' => $this->input->post('department_id')
			);
			
			$registryData= array(
				'emp_id' => $emp_id,
				'access_id' => $this->input->post('access_id'),
				'username' => $this->input->post('username'),
				'password' => md5('123')
			);

			
			$this->Admin_model->addRegistryData($registryData);
			$this->Admin_model->add_employeeTeam($employeeTeam);
			
			redirect(base_url() . 'admin/employees');
		} else {
			$this->session->set_flashdata('invalid_email','Username is already taken.');
			redirect(base_url() . 'admin/employees');
		}
	}
	public function add_DepName()
	{
		$addDepartment = array (
			'department_name' => $this->input->post('department_name')
		);
		$this->Admin_model->add_Department($addDepartment);
		redirect(base_url() . 'admin/department');
	}
	public function add_TeamName()
	{
		$addTeam = array (
			'team_name' => $this->input->post('team_name')
		);
		$this->Admin_model->add_Team($addTeam);
		redirect(base_url() . 'admin/team');
	}
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
		$this->Admin_model->ticket($addTicket);
		redirect(base_url().'admin/tickets');
	}
	public function add_ticketAssign()
	{	
		$add = array (
			'ticket_id' => $this->input->post('ticket_id'),
			'emp_id' => $this->input->post('emp_id'),
			'assign_note' => $this->input->post('assign_note')
		);
		$this->Admin_model->add_ticketAssign($add);
		redirect(base_url().'admin/tickets');
	}
/*------------------------------------------------------------ END ADD FUNCTION --------------------------------------------------------*/
	
/*----------------------------------------------------------- UPDATES FUNCTION ---------------------------------------------------------*/
	public function update_employee()
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

		
			$this->Admin_model->updateEmployee($id,$employeeData,$employeeTeam,$registryData);

			
			redirect(base_url() . 'admin/employees');
	}
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
			$this->Admin_model->update_ticket($id,$ticketData);
			redirect(base_url().'admin/tickets');
	}
	public function update_TicketStatusToPending()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->update_TicketStatusToPending($id);
		redirect(base_url() . "admin/single_ticket/$id");
	}
	public function update_TicketStatusToAccepted()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->update_TicketStatusToAccepted($id);
		redirect(base_url() . 'admin/tickets');
	}
	public function update_TicketStatusToDeclined()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->update_TicketStatusToDeclined($id);
		redirect(base_url() . 'admin/tickets');
	}
	public function update_username()
	{
		$id = $this->session->userdata('emp_id');
		$new_username = $this->input->post('new_username');
		$password = $this->input->post('password');
		if(md5($password) == $this->session->userdata('password')) {
			if($this->admin->checkUsername($new_username)){
				$this->admin_model->update_username($id,$new_username);
				$this->session->set_flashdata('flash','Username updated successfully.');
				redirect(base_url() . "admin/settings");
			} else {
				$this->session->set_flashdata('flash', 'Username is already taken.');
				redirect(base_url() . "admin/settings");
			}

		} else {
			$this->session->set_flashdata('flash', 'Incorrect password.');
			redirect(base_url() . "admin/settings");
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
				$this->admin_model->update_password($id,$new_password);
				$this->session->set_flashdata('flash', 'Password updated successfully.');
				redirect(base_url() . "admin/settings");
			} else {
				$this->session->set_flashdata('flash', '<strong>Invalid!</strong> Password did not match.');
				redirect(base_url() . "admin/settings");
			}

		} else {
			$this->session->set_flashdata('flash', '<strong>Invalid!</strong> Incorrect password.');
			redirect(base_url() . "admin/settings");
		}
	}
/*--------------------------------------------------------- END UPDATE FUNCTION ------------------------------------------------*/

	public function reset_password()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->reset_password($id);
		redirect(base_url() . 'admin/employees');
	}
	public function delete_Ticket()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->delete_Ticket($id);
		redirect(base_url() . 'admin/tickets');
	}
	public function deactivate_account()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->deactivate_account($id);
		redirect(base_url() . 'admin/employees');
	}
	public function activate_account()
	{
		$id = $this->uri->segment(3);
		$this->Admin_model->activate_account($id);
		redirect(base_url() . 'admin/employees');
	}
	public function upload_picture()
	{	
		$id = $this->uri->segment(3);
		$url = $this->do_upload();
		$this->Admin_model->upload_picture($url,$id);
		redirect(base_url() . 'admin/edit_employee/' . $id);
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