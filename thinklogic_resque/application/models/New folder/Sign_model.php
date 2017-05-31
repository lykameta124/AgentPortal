<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sign_model extends CI_Model{
    function __construct() {
		parent::__construct();

    }
	public function add_employee($data){
		$this->db->insert('employee',$data);
		return 0;
    }
	public function add_employeeTeam($data){
		$this->db->insert('employee_group',$data);
		return 0;
    }
	public function getTeam(){
            $this->db->select('*');
            $this->db->from('team');
            $query = $this->db->get();
            return $query->result();
        }
	public function getDepartment(){
            $this->db->select('*');
            $this->db->from('department');
            $query = $this->db->get();
            return $query->result();
        }
	public function getAccessType(){
            $this->db->select('*');
            $this->db->from('access_control');
            $query = $this->db->get();
            return $query->result();
        }
    
}