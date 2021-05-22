<?php
class Auth_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  public function insert_user($formarray)
  {
    $this->db->insert('users', $formarray);
  }
  
}
