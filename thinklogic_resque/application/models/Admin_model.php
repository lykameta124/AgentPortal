<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model{
    function __construct() 
    {
		parent::__construct();
    }
    public function checkUsername($username)
    {
        $this->db->select('username');
        $this->db->where('username',$username);
        $query = $this->db->get('access_registry');

        if($query->num_rows() == 0){
            return true;
        } else {
            return false;
        }
    }
/*------------------------------------------------- ADD FUNCTION --------------------------------------------------------*/
	function add_Department($data)
    {
		$this->db->insert('department',$data);
	}
	function add_Team($data)
    {
		$this->db->insert('team', $data);
	}
	function ticket($data)
    {
		$this->db->insert('ticket',$data);
	}
	public function addRegistryData($data)
    {
        $this->db->insert('access_registry', $data);
    }
	public function add_employee($data)
	{
		$this->db->insert('employee',$data);
		$last_id = $this->db->insert_id();
        return $last_id;
    }
	public function add_employeeTeam($data)
	{
		$this->db->insert('employee_group',$data);
    }
    public function add_ticketAssign($add)
    {
        $this->db->insert('ticket_assignment',$add);
    }
/*-------------------------------------------------------- END ADD FUNCTION ------------------------------------------------*/

/*------------------------------------------------------- UPDATE FUNCTION -------------------------------------------------*/
	public function update_ticket($id,$ticketData)
    {
        $this->db->set($ticketData);
        $this->db->where('ticket_id',$id);
        $this->db->update('ticket');
    }
    public function updateEmployee($id,$employeeData,$employeeTeam,$registryData)
    {
        $this->db->set($employeeData);
        $this->db->where('emp_id',$id);
        $this->db->update('employee');

        $this->db->set($employeeTeam);
        $this->db->where('emp_id',$id);
        $this->db->update('employee_group');

        $this->db->set($registryData);
        $this->db->where('emp_id',$id);
        $this->db->update('access_registry');
    }
    public function update_TicketStatusToPending($id)
    {
        $this->db->set('ticket_status','Pending');
        $this->db->where('ticket_id',$id);
        $this->db->update('ticket');
    }
    public function update_TicketStatusToAccepted($id)
    {
        $this->db->set('ticket_status','Accepted');
        $this->db->where('ticket_id',$id);
        $this->db->update('ticket');
    }
    public function update_TicketStatusToDeclined($id)
    {
        $this->db->set('ticket_status','Declined');
        $this->db->where('ticket_id',$id);
        $this->db->update('ticket');
    }
    public function update_username($id,$new_username)
    {
        $this->db->set('username',$new_username);
        $this->db->where('emp_id',$id);
        $this->db->update('access_registry');
    }
    public function update_password($id, $new_password)
    {
        $this->db->set('password',md5($new_password));
        $this->db->where('emp_id',$id);
        $this->db->update('access_registry');
        $this->session->set_userdata('password',$new_password);
    }
    public function reset_password($id)
    {
        $this->db->set('password',md5('123'));
        $this->db->where('emp_id',$id);
        $this->db->update('access_registry');
    }
    public function deactivate_account($id)
    {
        $this->db->set('status','Disabled');
        $this->db->where('emp_id',$id);
        $this->db->update('access_registry');
    }
    public function activate_account($id)
    {
        $this->db->set('status','Active');
        $this->db->where('emp_id',$id);
        $this->db->update('access_registry');
    }
    public function upload_picture($url,$id)
    {
        if($url != '')
        {
            $this->db->set('image',$url);
            $this->db->where('emp_id',$id);
            $this->db->update('employee');
            $this->session->set_userdata('image',$url);   
        }
    }
/*------------------------------------------------------ END UPDATE FUNCTION -------------------------------------------------*/

    public function get_employeeManagerType()
    {
        $this->db->select('emp_id');
        $this->db->from('access_registry');
        $this->db->where_in('access_id',3);
        $subQuery =  $this->db->get_compiled_select();
        
        $this->db->select('*');
        $this->db ->from('employee');
        $this->db ->where("emp_id IN ($subQuery)");

        $query = $this->db->get();
        return $query->result();
    }
	
}