
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
  public function sent_messages($session_uid, $id)
  {
    //$this->db->select('*');
    // $this->db->where('from_user_id', $session_uid);
    // $this->db->where('to_user_id', $id);
    // //$array1 = array('from_user_id' => $session_uid, 'to_user_id' => $id);
    // //$this->db->where($array1);
    //$array2 = array('to_user_id' =>  $session_uid, 'from_user_id' => $id);
    $this->db->where("(from_user_id= $session_uid and to_user_id=$id ) or (to_user_id= $session_uid and from_user_id=$id )");
    $getsent_messages = $this->db->get('chat_message')->result_array();
    //print_r($this->db->last_query());
    return $getsent_messages;
  }
  public function recieved_messages($id, $session_uid)
  {
    // echo $id;
    // echo $session_uid;
    $array = array('to_user_id' =>  $session_uid, 'from_user_id' => $id);
    $this->db->where($array);
    //$this->db->where('from_user_id', $id);
    $getrecieved_messages = $this->db->get('chat_message')->result_array();
    //print_r($this->db->last_query());
    return $getrecieved_messages;
  }
  public function update_user($id, $array)
  {
    $this->db->where('user_id', $id);
    $this->db->update('users', $array);
  }
  public function insert_chat_messages($array)
  {
    //$this->db->where('user_id', $from_user_id);
    $this->db->insert('chat_message', $array);
  }
}

?>