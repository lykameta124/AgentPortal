<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class U_model extends CI_Model{
    function __construct() {
		parent::__construct();

    }
	public function getLoginAccount(){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $this->db->select("*");
        $this->db->from("");
        $this->db->where(array('username'=>$username,'password'=>$password));
        $query = $this->db->get();
        return $query;        
    }
    
}