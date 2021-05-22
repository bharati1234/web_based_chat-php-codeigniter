<?php
class AdminDashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    if (!$this->session->userdata('user'))
      return redirect("auth/login");
  }
  public function index()
  {
    $User = $this->User_model->getAllUsers();
    $data = array();
    $data['User'] = $User;

    $this->load->view('dashboard', $data);
  }
  public function signout()
  {
    $this->session->unset_userdata('user');
    session_destroy();
    redirect("auth/login");

    //$this->load->view('auth/login');
  }
}
