<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LogIn page</title>
  <!-- Bootstrap -->
  <?php $this->load->view('style.php'); ?>
</head>

<body>

  <div class="col-lg-3 col-lg-offset-4">

    <div class="text-center">
      <h1>Login </h1>
    </div>

    <?php if (isset($_SESSION['success'])) {
    ?>
      <div class="alert alert-success">
        <?php echo $_SESSION['success']; ?>

      </div>

    <?php
    }
    ?>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php $errormessage = $this->session->userdata('errormsg');
    if (!empty($errormessage)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $errormessage; ?>
      </div>
    <?php } ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="email" class="label-degfault">Email:</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>">
      </div>
      <div class="form-group">
        <label for="password" class="label-degfault">Password:</label>
        <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password'); ?>">
      </div>

      <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Login" name="login">

      </div>
      <div class="text-center" style="margin-top:15px;">
        Not Registered Yet. Please Register Here
        <a class="nav-link" href="<?php echo base_url() . 'index.php/auth/register' ?>">
          <span data-feather="file"></span> Register </a>
      </div>
    </form>
  </div>

  <?php $this->load->view('script.php'); ?>
</body>

</html>