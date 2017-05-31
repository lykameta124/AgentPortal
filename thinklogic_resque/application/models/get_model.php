<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class get_model extends CI_Model{
    function __construct() 
    {
		parent::__construct();

    }
    public function getEmployees()
    {
        $this->db->select('e.*, t.*, d.*, ac.*, ar.*, eg.*');
        $this->db->from('employee e, team t, department d, access_registry ar, access_control ac, employee_group eg');
        $this->db->where('e.emp_id = eg.emp_id');
        $this->db->where('eg.department_id = d.department_id');
        $this->db->where('eg.team_id = t.team_id');
        $this->db->where('e.emp_id = ar.emp_id');
        $this->db->where('ar.access_id = ac.access_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getEmployeeUnder($id)
    {
        $this->db->select('team_id')->from('employee_group')->where('emp_id',$id);
        $subQuery =  $this->db->get_compiled_select();
        
        $this->db->select('emp_id');
        $this->db->from('employee_group');
        $this->db ->where("team_id IN ($subQuery)");
        $subQuery2 =  $this->db->get_compiled_select();
        
        $this->db->select('*');
        $this->db ->from('employee');
        $this->db ->where("emp_id IN ($subQuery2)");
        $query = $this->db->get();
        return $query->result();
    }
    public function getData($id)
    {
        $this->db->select('*')->from('employee')->where('emp_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getAccessType()
    {
        $this->db->select('*')->from('access_control');
        $query = $this->db->get();
        return $query->result();
    }
    public function getEmployee()
    {
        $this->db->select('*')->from('employee');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDepartment()
    {
        $this->db->select("*")->from('department');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTeam()
    {
        $this->db->select("*")->from('team');
        $query = $this->db->get();
        return $query->result();
    }
    public function ticket()
    {
        $this->db->select("*")->from('ticket');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTicket($name=NULL,$status=NULL,$department=NULL)
    {
        if($status==NULL && $department==NULL){
            $this->db->select("*")->from('ticket')->where('requestor',$name);
        }elseif($name==NULL && $department==NULL){
            $this->db->select("*")->from('ticket')->where('ticket_status',$status);
        }elseif($name==NULL && $status==NULL){
            $this->db->select("*")->from('ticket')->where('department',$department);
        }elseif($name==NULL){
             $this->db->select("*")->from('ticket')->where('department',$department)->where('ticket_status',$status);
        }elseif($department==NULL){
            $this->db->select("*")->from('ticket')->where('ticket_status',$status)->where('requestor',$name);
        }else{
            $this->db->select("*")->from('ticket');
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function getSingleTicket($id)
    {
        $this->db->select("*")->from('ticket')->where('ticket_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getNote($id)
    {
        $this->db->select("*")->from('ticket_assignment')->where('ticket_id',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();}else { }
    }
    public function getTicketID()
    {
        $this->db->select('ticket_id');
        $this->db->from('ticket');
        $this->db->order_by("ticket_id", "desc");
        $this->db->limit('1');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row_array();}else { }
    }
    public function getPriority()
    {
        $query = "SHOW COLUMNS FROM ticket LIKE 'priority'";
        $row = $this->db->query("SHOW COLUMNS FROM ticket LIKE 'priority'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all( $regex , $row, $enum_array );
        $enum_fields = $enum_array[1];
        foreach ($enum_fields as $key=>$value)
        {
            $enums[$value] = $value; 
        }
        return $enums;
    } 
    public function getSingleEmployee($id)
    {
        $this->db->select('e.*, t.*, d.*, ac.*, ar.*, eg.*');
        $this->db->from('employee e, team t, department d, access_registry ar, access_control ac, employee_group eg');
        $this->db->where('e.emp_id', $id);
        $this->db->where('e.emp_id = eg.emp_id');
        $this->db->where('eg.department_id = d.department_id');
        $this->db->where('eg.team_id = t.team_id');
        $this->db->where('e.emp_id = ar.emp_id');
        $this->db->where('ar.access_id = ac.access_id');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{}
    }
    public function getIfAssign($id)
    {
        $this->db->select("ticket_id")->from('ticket_assignment')->where('ticket_id',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function total_employees()
    {
        $query = $this->db->get('employee');
        return $query->num_rows();
    }
    public function total_team()
    {
        $query = $this->db->get('team');
        return $query->num_rows();
    }
    public function total_department()
    {
        $query = $this->db->get('department');
        return $query->num_rows();
    }
    public function total_tickets()
    {
        $query = $this->db->get('ticket');
        return $query->num_rows();
    }
    
    public function transaction()
    {
        $this->db->select('*');
        $this->db->from('ticket');
        $this->db->order_by('ticket_id','DESC');
        $this->db->limit(8);
        $query=$this->db->get();
        return $query->result();
    }
    public function donut_chart()
    {
        $query = $this->db->query("SELECT department,ticket_status, count(*) as no_of_like 
                                    FROM ticket 
                                        GROUP BY ticket_status 
                                            ORDER BY no_of_like ASC");

        return $query->result_array();  
    }

    // manager dashboard
    public function manager_donut_chart($department_name)
    {
        $query = $this->db->query("SELECT department,ticket_status, count(*) as no_of_like 
                                    FROM ticket 
                                        WHERE department = '". $department_name ."'
                                            GROUP BY ticket_status 
                                                ORDER BY no_of_like ASC");

        return $query->result_array(); 
    }

    public function dept_total_tickets($department_name){
        $this->db->select('*')->where('department',$department_name);
        $query = $this->db->get('ticket');
        return $query->num_rows();
    }

    public function assigned_tickets($emp_id)
    {
        $this->db->select('*')
                 ->where('emp_id', $emp_id)
                 ->where('date_assigned',date('Y-m-d'));
        $query = $this->db->get('ticket_assignment');
        return $query->num_rows();
    }
}