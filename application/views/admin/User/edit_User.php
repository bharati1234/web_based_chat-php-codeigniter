<!doctype html>
<html lang="en">

<head>
  <?php $this->form_validation->set_error_delimiters('<span class=error>', '</span>'); ?>
  <style>
    .error {
      color: red;
    }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Application</title>
  <?php $this->load->view('style'); ?>



</head>

<body>
  <?php $this->load->view('nav.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <?php $this->load->view('header.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">EDIT PROFILE</h1>
        </div>

        <form name="edit_blog" id="edit_blog" method="post" action="<?php echo base_url() . 'index.php/User/edit/' . $User['user_id'] . ''; ?>">
          <div class="form-group">
            <label class="form-label">Username</label>
            <input type="text" name="username" id="username" value="<?php echo set_value('username', $User['username']); ?>" class="form-control">
            <p class="help-block"><?php echo form_error('username'); ?></p>


          </div>
          <!--<div class="form-group">
            <label>Email</label>
            <textarea name="email" id="email" class="form-control"><?php //echo set_value('email', $User['email']); 
                                                                    ?></textarea>
            <p class="help-block"><?php //echo form_error('email'); 
                                  ?></p>

          </div>-->
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" id="phone" value="<?php echo set_value('phone', $User['phone']); ?>" class="form-control">
            <p class="help-block"><?php echo form_error('phone') ?></p>

          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url() . 'index.php/User/index'; ?>" class="btn btn-secondary">Back</a>

          </div>

        </form>

      </main>
    </div>
  </div>
</body>

</html>