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
