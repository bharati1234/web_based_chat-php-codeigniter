<?php
class User extends CI_Controller
{
  public function index()
  {

    $this->load->model('User_model');
    $User = $this->User_model->getUsersInSession();
    $data = array();
    $data['User'] = $User;

    $this->load->view("admin/User/list_User", $data);
  }

  public function edit($id)
  {
    $data = array();
    $this->load->model('User_model');
    $User = $this->User_model->getUsersById($id);
    if (empty($User)) {
      $this->session->set_flashdata('success', "User not found");
      redirect(base_url() . 'User/index');
    }
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    //$this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('phone', 'phone', 'required');

    if ($this->form_validation->run() == true) {

      $formarray = array();
      $formarray['username'] = $this->input->post('username');
      //  $formarray['email'] = $this->input->post('email');
      $formarray['phone'] = $this->input->post('phone');

      $this->User_model->update_User($id, $formarray); //it will insert the records in Users
      $this->session->set_flashdata('success', "User Updated Successfully");
      redirect("User/index");
    } else {
      $data['User'] = $User;
      $this->load->view("admin/User/edit_User", $data);
    }
  }
  public function send_chat()
  {
    $from_user_id = $this->input->post('fromuserid');
    $data = array();
    $this->load->model('User_model');
    $User = $this->User_model->getUsersById($from_user_id);
    if (empty($User)) {
      $this->session->set_flashdata('success', "User not found");
      redirect(base_url() . 'User/index');
    }
    $formarray = array();
    $formarray['from_user_id'] = $from_user_id;
    $formarray['to_user_id'] = $this->input->post('touserid');
    $formarray['to_username'] = $this->input->post('tousername');
    $formarray['from_username'] = $this->input->post('fromusername');
    $formarray['chat_message'] = $this->input->post('message_to_send');
    $formarray['timestamp'] = date("Y-m-d H:i:s");
    $formarray['status'] = 1;
    //print_r($formarray);
    // exit;
    $this->User_model->insert_chat_messages($formarray); //it will insert the records in chat messsages
    // $this->session->set_flashdata('success', "Messsage  Sent Successfully");
  }


  public function chat_with_user($id)
  {
    $data = array();
    $messages = array();
    $timestamp = '';
    $this->load->model('User_model');
    $User = $this->User_model->getUsersById($id);
    $data['User'] = $User;
    //print_r($User);

    $session_uid = $this->session->userdata('user');
    $session_uid = $session_uid['user_id'];
    $get_messages_sent = $this->User_model->sent_messages($session_uid, $id);
    $data['messages_sent'] =  $get_messages_sent;

    // $get_messages_recieved = $this->User_model->recieved_messages($id, $session_uid);
    // $data['messages_recieved'] =  $get_messages_recieved;
    //echo "<pre>";
    // print_r($get_messages_recieved);
    //print_r($get_messages_sent);

    $this->load->view("admin/User/chat_with_user", $data);
  }

  public function delete($id)
  {
    $this->load->model('User_model');
    $User = $this->User_model->getUsersById($id);
    if (empty($User)) {
      $this->session->set_flashdata('success', "User not found");
      redirect(base_url() . 'User/index');
    }

    redirect(base_url() . 'User/index');
  }
}
