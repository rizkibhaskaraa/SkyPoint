<?php
error_reporting(0);
class login_model extends CI_model
{
    public function getuser($email)
    {
        return $this->db->get_where('master_user', array("user_username" => $email))->row_array();
    }
    
}
