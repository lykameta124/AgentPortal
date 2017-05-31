<?php

class Home_model extends CI_Model{

    public function can_login($username, $password)
    {
        $this->db->select("*");
        $this->db->where('username',$username);
        $this->db->where('status', 'active');
        $this->db->where('password',md5($password));
        $query = $this->db->get('access_registry');

        if($query->num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
    }
    public function getAccessType($access_id)
    {
        $this->db->select('access_type');
        $this->db->from('access_control');
        $this->db->where('access_id', $access_id);
        return $this->db->get()->row()->access_type;
    }
}