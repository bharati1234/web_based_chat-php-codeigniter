<?php

class Auth extends CI_Controller
{

  public function login()
  {
    $this->load->model('User_model');

    $this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[password]');

    if ($this->form_validation->run() == TRUE) {
      $email = $this->input->post('email');
      // $password = MD5($this->input->post('password'));
      $password = $this->input->post('password');

      $user = $this->User_model->getLogin($email, $password);

      //print_r($user);
      if (!(empty($user))) {
        $this->session->set_userdata('user', $user);
        redirect('adminDashboard');
      } else {
        $this->session->set_flashdata('errormsg', 'Invalid password/username');
        // redirect(base_url() . 'login');
        redirect("auth/login");
      }
    }


    $this->load->view('login');
  }
  public function register()
  {
    $this->load->model('Auth_model');

    if (isset($_POST['register'])) {
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[password]');
      $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|matches[password]');
      $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]');

      if ($this->form_validation->run() == TRUE) {
        $formarray = array(
          'username' => $_POST['username'],
          'email' => $_POST['email'],
          // 'password' => MD5($_POST['password']),
          'password' => $_POST['password'],
          'phone' => $_POST['phone'],
          'created_date' => date('Y-m-d H-i-s'),
        );
        // $this->db->insert('users', $data);
        $this->Auth_model->insert_user($formarray);
        $this->session->set_flashdata("success", "Your acccount has been register.You can Login now");
        redirect("auth/register");
      }
    }
    $this->load->view('register');
  }
}
