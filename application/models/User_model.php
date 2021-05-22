
<?php
class User_model extends CI_Model
{

  public function getLogin($email, $pwd)
  {
    $this->db->where('email', $email);
    $this->db->where('password', $pwd);
    $query = $this->db->get("users");
    $users = $query->row_array();
    return $users;
  }
  public function insert_user($formarray)
  {
    $this->db->insert('users', $formarray);
  }
  public function getUsersInSession()
  {
    //  $this->db->group_by('user_id', 'DESC');
    $user = $this->session->userdata('user');
    //echo $user;
    //print_r($user);
    $username = $user['user_id'];
    // echo $user['user_id'];
    $users = $this->db->where('user_id', $username)->get('users')->result_array();
    return $users;
  }
  public function getAllUsers()
  {
    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    $this->db->where_not_in('user_id', $userid);
    $users = $this->db->get('users')->result_array();
    return $users;
  }
  public function getusersById($id)
  {
    $this->db->where('user_id', $id);
    $user = $this->db->get('users')->row_array();
    return $user;
  }
  public function update_user($id, $array)
  {
    $this->db->where('user_id', $id);
    $this->db->update('users', $array);
  }
}

?>