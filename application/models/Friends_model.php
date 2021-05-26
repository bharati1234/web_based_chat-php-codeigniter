<?php
class Friends_model extends CI_Model
{
  public function getAllFriends()
  {
    // $this->db->where('user_id');
    $Friends = $this->db->get('users')->result_array();
    // return $Friends;
    // print_r($this->db->last_query());
    print_r($Friends);
  }
  public function getAllFriendsbyId()
  {
    $friends_details = array();

    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    $this->db->select('friends');
    $array = array('user_id' => $userid, 'friends!=' => '');
    $this->db->where($array);
    $data_Array = $this->db->get('users')->result_array();

    if (empty($data_Array)) {
      return $data_Array;
    }

    //instead of foreach i used array_shift
    $user_details = array_shift($data_Array);

    $friend_id = $user_details['friends'];
    $friend_user_ids = explode(',', $friend_id);
    // echo "<pre>";
    // print_r($friend_user_ids);
    for ($i = 0; $i < count($friend_user_ids); $i++) {
      $friend_id = $friend_user_ids[$i];
      $this->db->where('user_id', $friend_id);
      $list = $this->db->get('users')->result_array();

      $listItem = array_shift($list);
      array_push($friends_details, $listItem);
    }
    //print_r($friends_details);
    return $friends_details;
  }

  function Insert_chat_request($sender_id)
  {
    //$new_sender_id = 0;
    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    $this->db->select('sender_id');
    $array = array('user_id' => $userid, 'sender_id!=' => '');
    $this->db->where($array);
    $data_Array = $this->db->get('users')->result_array();
    // if (empty($data_Array)) {
    //   return $data_Array;
    // }
    //instead of foreach i used array_shift
    $user_details = array_shift($data_Array);


    $old_sender_id = $user_details['sender_id'];
    if (strpos($old_sender_id, $sender_id) !== false) {
      return;
    }
    //echo "Word Found!";
    $new_sender_id = "{$old_sender_id},{$sender_id}";
    $new_sender_id = ltrim($new_sender_id, ',');
    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    $this->db->where('user_id', $userid);
    $this->db->set('sender_id', $new_sender_id);
    $this->db->update('users');
  }
  function Insert_chat_request1($receiver_id)
  {

    $this->db->select('receiver_id');
    $array = array('user_id' => $receiver_id, 'receiver_id!=' => '');
    $this->db->where($array);
    //$this->db->where('user_id', $receiver_id);

    $data_Array = $this->db->get('users')->result_array();
    // if (empty($data_Array)) {
    //   return $data_Array;
    // }
    //instead of foreach i used array_shift
    $user_details = array_shift($data_Array);

    $old_receiver_id = $user_details['receiver_id'];
    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    if (strpos($old_receiver_id, $userid) !== false) {
      return;
    }
    $new_receiver_id = "{$old_receiver_id},{$userid}";
    $new_receiver_id = ltrim($new_receiver_id, ',');

    $this->db->where('user_id', $receiver_id);
    $this->db->set('receiver_id', $new_receiver_id);
    $this->db->update('users');
  }

  public function getAllFriendsRequestId()
  {
    $friends_details = array();

    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    $this->db->select('receiver_id');
    //$this->db->where('user_id', $userid);
    $array = array('user_id' => $userid, 'receiver_id!=' => '');
    $this->db->where($array);
    $data_Array = $this->db->get('users')->result_array();
    // if (empty($data_Array)) {
    //   return $data_Array;
    // }
    //instead of foreach i used array_shift
    $user_details = array_shift($data_Array);

    $friend_id = $user_details['receiver_id'];
    $friend_user_ids = explode(',', $friend_id);
    // echo "<pre>";
    // print_r($friend_user_ids);
    for ($i = 0; $i < count($friend_user_ids); $i++) {
      $friend_id = $friend_user_ids[$i];
      $this->db->where('user_id', $friend_id);
      $list = $this->db->get('users')->result_array();

      $listItem = array_shift($list);
      array_push($friends_details, $listItem);
    }
    return $friends_details;
  }
  function accept_chat_request_add_friend($sender_userid)
  {
    //fetching already if already having freinds for session user
    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    $this->db->select('friends');
    $array = array('user_id' => $userid, 'friends!=' => '');
    $this->db->where($array);
    //$this->db->where('user_id', $userid);
    $data_Array = $this->db->get('users')->result_array();
    // if (empty($data_Array)) {
    //   return $data_Array;
    // }
    //instead of foreach i used array_shift
    $user_details = array_shift($data_Array);

    //getting one freind
    $old_friend_id = $user_details['friends'];
    //if already they are freind then it will check for unique friend
    if (strpos($old_friend_id, $sender_userid) !== false) {
      return;
    }
    //echo "Word Found!";
    //concat with old friend with semicolon 
    $new_friend_id = "{$old_friend_id},{$sender_userid}";
    $new_friend_id = ltrim($new_friend_id, ',');

    //update with new friend request accepted
    $this->db->where('user_id', $userid);
    $this->db->set('friends', $new_friend_id);
    $this->db->update('users');
  }
  function accept_chat_request_by_sender_add_friend($sender_userid)
  {
    //fetching already if already having freinds for session user
    //
    $this->db->select('friends');
    // $this->db->where('user_id', $sender_userid);
    $array = array('user_id' => $sender_userid, 'friends!=' => '');
    $this->db->where($array);
    $data_Array = $this->db->get('users')->result_array();
    // if (empty($data_Array)) {
    //   return $data_Array;
    // }
    //instead of foreach i used array_shift
    $user_details = array_shift($data_Array);

    //getting one freind
    $old_friend_id = $user_details['friends'];
    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    //if already they are freind then it will check for unique friend
    if (strpos($old_friend_id, $userid) !== false) {
      return;
    }
    //echo "Word Found!";
    //concat with old friend with semicolon 

    $new_friend_id = "{$old_friend_id},{$userid}";
    $new_friend_id = ltrim($new_friend_id, ',');

    //update with new friend request accepted
    $this->db->where('user_id', $sender_userid);
    $this->db->set('friends', $new_friend_id);
    $this->db->update('users');
  }
  function delete_chat_request_by_sender_delete_sender_id($sender_userid)
  {

    $this->db->select('sender_id');
    //$this->db->where('user_id', $sender_userid);
    $array = array('user_id' => $sender_userid, 'sender_id!=' => '');
    $this->db->where($array);
    $data_Array = $this->db->get('users')->result_array();
    // if (empty($data_Array)) {
    //   return $data_Array;
    // }
    //instead of foreach i used array_shift
    $user_details = array_shift($data_Array);

    $old_sender_id = $user_details['sender_id'];
    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    $char_to_remove = $userid . ",";

    $new_sender_id = str_replace($char_to_remove, '', $old_sender_id);
    $char_to_remove = $userid;
    $new_sender_id = str_replace($char_to_remove, '', $new_sender_id);
    //if request accepted by reciever then sender id will delete from reciever_id
    $new_sender_id = ltrim($new_sender_id, ',');

    $this->db->where('user_id', $sender_userid);
    $this->db->set('sender_id', $new_sender_id);
    $this->db->update('users');
  }
  function accept_chat_request_delete_reciever($sender_userid)
  {
    $user = $this->session->userdata('user');
    $userid = $user['user_id'];
    $this->db->select('receiver_id');
    //$this->db->where('user_id', $userid);
    $array = array('user_id' => $userid, 'receiver_id!=' => '');
    $this->db->where($array);
    $data_Array = $this->db->get('users')->result_array();
    // if (empty($data_Array)) {
    //   return $data_Array;
    // }
    //instead of foreach i used array_shift
    $user_details = array_shift($data_Array);

    $old_receiver_id = $user_details['receiver_id'];

    $char_to_remove = $sender_userid . ",";
    
    $new_reciever_id = str_replace($char_to_remove, '', $old_receiver_id);
    $char_to_remove = $sender_userid;
    $new_reciever_id = str_replace($char_to_remove, '', $old_receiver_id);
    //if request accepted by reciever then sender id will delete from reciever_id
    $new_receiver_id = ltrim($new_reciever_id, ',');

    $this->db->where('user_id', $userid);
    $this->db->set('receiver_id', $new_receiver_id);
    $this->db->update('users');
  }
}
