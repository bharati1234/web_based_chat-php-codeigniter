<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Register page</title>
  <?php $this->load->view('style.php'); ?>

</head>

<body>

  <div class="col-lg-6 col-lg-offset-3">

    <div class="text-center">
      <h1>Register Here</h1>
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
    <form action="" method="post">
      <div class="form-group">
        <label for="username" class="label-degfault">Username:</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username'); ?>">
      </div>
      <div class="form-group">
        <label for="email" class="label-degfault">Email:</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>">
      </div>
      <div class="form-group">
        <label for="password" class="label-degfault">Password:</label>
        <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password'); ?>">
      </div>
      <div class="form-group">
        <label for="cpassword" class="label-degfault">Confirm Password:</label>
        <input type="text" name="cpassword" id="cpassword" class="form-control" value="<?php echo set_value('cpassword'); ?>">
      </div>
      <div class="form-group">
        <label for="phone" class="label-degfault">Phone:</label>
        <input type="number" name="phone" id="phone" class="form-control" value="<?php echo set_value('phone'); ?>">
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-primary" name="register">

      </div>
      <div class="text-center" style="margin-top:15px;">
        Already Registered
        <a class="nav-link" href="<?php echo base_url() . 'index.php/auth/login' ?>">
          <span data-feather="file"></span> Login Here </a>


      </div>
    </form>
  </div>
  <?php $this->load->view('script.php'); ?>
</body>

</html>