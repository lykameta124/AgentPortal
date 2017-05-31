<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user_model extends CI_Model{
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
    public function ticket($data)
    {
        $this->db->insert('ticket',$data);
    }
/*------------------------------------------------- END ADD FUNCTION ------------------------------------------------*/

/*------------------------------------------------- UPDATE FUNCTION ------------------------------------------------*/
    public function update_ticket($id,$ticketData)
    {
        $this->db->set($ticketData);
        $this->db->where('ticket_id',$id);
        $this->db->update('ticket');
    }
    public function update_TicketStatusToPending($id)
    {
        $this->db->set('ticket_status','Pending');
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
/*--------------------------------------------------------- END UPDATE FUNCTION--------------------------------------------------------*/

}