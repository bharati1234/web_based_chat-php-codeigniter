<?php
class Friends extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Friends_model');
  }

  public function index()
  {
    $Friends = $this->Friends_model->getAllFriendsbyId();
    $data = array();
    $data['Friends'] = $Friends;
    $this->load->view('admin/User/listFriends', $data);

    // $Friend_request = $this->Friends_model->getAllFriendsRequestId();
    // $data = array();
    // print_R($Friend_request);
    // $data['Friends'] = $Friend_request;

    $this->load->view('admin/User/listFriends', $data);
  }
  function send_request()
  {
    sleep(1);
    if ($this->input->post('send_userid')) {

      $sender_id = $this->input->post('send_userid');
      $this->Friends_model->Insert_chat_request($sender_id);
    }
    if ($this->input->post('receiver_userid')) {

      $receiver_id = $this->input->post('receiver_userid');

      //$receiverid =  $userid;

      $this->Friends_model->Insert_chat_request1($receiver_id);
    }
  }

  function Recieved_request()
  {
    $Friend_request = $this->Friends_model->getAllFriendsRequestId();
    $data = array();
    //print_R($Friend_request);
    $data['friend_request_list'] = $Friend_request;

    $this->load->view("notification", $data);
  }
  function accept_Friend_request()
  {
    sleep(1);
    if ($this->input->post('sender_userid')) {

      $sender_userid = $this->input->post('sender_userid');

      $this->Friends_model->accept_chat_request_add_friend($sender_userid);
      $this->Friends_model->accept_chat_request_by_sender_add_friend($sender_userid);
      $this->Friends_model->accept_chat_request_delete_reciever($sender_userid);
    }
  }
  function decline_Friend_request()
  {
    sleep(1);
    if ($this->input->post('sender_userid')) {
      $sender_userid = $this->input->post('sender_userid');
      $this->Friends_model->accept_chat_request_delete_reciever($sender_userid);
    }
  }
}
