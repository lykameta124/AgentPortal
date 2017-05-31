<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class manager_model extends CI_Model{
    function __construct() 
    {
		parent::__construct();
    }
    public function checkUsername($username)
    {
        $this->db->select('username')->where('username',$username);
        $query = $this->db->get('access_registry');
        if($query->num_rows() == 0){
            return true;
        } else {
            return false;
        }
    }

/*------------------------------------------------- ADD FUNCTION --------------------------------------------------------*/
    public function ticket($data)
    {
        $this->db->insert('ticket',$data);
    }
    public function add_ticketAssign($add)
    {
        $this->db->insert('ticket_assignment',$add);
    }
/*------------------------------------------------- END ADD FUNCTION ------------------------------------------------*/

/*------------------------------------------------- UPDATE FUNCTION ------------------------------------------------*/
    public function updateReqNote($id,$data,$stat)
    {
        $this->db->set('ticket_status',"$stat")->where('ticket_id',$id)->update('ticket');
        $this->db->set('requestor_note',"$data")->where('ticket_id',$id)->update('ticket_assignment');
    }
    public function update_TicketStatusToPending($id)
    {
        $this->db->set('ticket_status','Pending')->where('ticket_id',$id)->update('ticket');
    }
    public function update_ticket($id,$ticketData)
    {
        $this->db->set($ticketData);
        $this->db->where('ticket_id',$id);
        $this->db->update('ticket');
    }
    public function updateProfile($id,$employeeData,$employeeTeam,$registryData)
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
/*--------------------------------------------------------- END UPDATE FUNCTION ----------------------------------------*/

/*--------------------------------------------------------- GET FUNCTION ------------------------------------------------*/
    public function get_Task($id)
    {
        $this->db->select('ticket_id')->from('ticket_assignment')->where("emp_id",$id);
        $subQuery = $this->db->get_compiled_select();
        $this->db->select('*')->from('ticket')->where("ticket_id IN ($subQuery)", NULL, FALSE);
        $query = $this->db->get();
        return $query->result();
    }
    public function getDepartmentUnder($id)
    {
        $this->db->select('department_id')->from('employee_group')->where('emp_id',$id);
        $subQuery =  $this->db->get_compiled_select();

        $this->db->select('emp_id');
        $this->db ->from('employee_group');
        $this->db ->where("department_id IN ($subQuery)");
        $subQuery2 =  $this->db->get_compiled_select();

        $this->db->select('emp_id');
        $this->db->from('access_registry');
        $this->db->where_in('access_id',2);
        $this->db ->where("emp_id IN ($subQuery2)");
        $subQuery3 =  $this->db->get_compiled_select();
        
        $this->db->select('*');
        $this->db ->from('employee');
        $this->db ->where("emp_id IN ($subQuery3)");

        $query = $this->db->get();
        return $query->result();
    }
    public function getDepUnder($id)
    {
        $this->db->select('department_id')->from('employee_group')->where('emp_id',$id);
        $subQuery =  $this->db->get_compiled_select();

        $this->db->select('emp_id');
        $this->db ->from('employee_group');
        $this->db ->where("department_id IN ($subQuery)");
        $subQuery2 =  $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db ->from('employee');
        $this->db ->where("emp_id IN ($subQuery2)");

        $query = $this->db->get();
        return $query->result();
    }
/*--------------------------------------------------------- END GET FUNCTION--------------------------------------------------------*/

}