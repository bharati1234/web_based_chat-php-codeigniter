<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Profile</title>
  <?php $this->load->view('style'); ?>
</head>

<body>
  <?php $this->load->view('nav.php'); ?>

  <div class="container-fluid">
    <div class="row">
      <?php $this->load->view('header.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">My Profile Details</h1>
        </div>


        <?php $success = $this->session->userdata('success');
        if (!empty($success)) {
        ?>
          <div class="alert alert-success">
            <?php echo $success; ?>
          </div>
        <?php } ?>



        <form name="list_user" id="list_user" method="post" action="<?php ?>">
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Usename</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th width="200">Date Creted</th>

                  <th width="200">Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php if (!empty($User)) {

                  foreach ($User as $Users) { ?>
                    <tr>
                      <td><?php echo $Users['username']; ?></td>
                      <td><?php echo $Users['email']; ?></td>
                      <td><?php echo $Users['phone']; ?></td>
                      <td><?php echo $Users['created_date']; ?></td>

                      <td>
                        <a href="<?php echo base_url() . 'index.php/User/edit/' . $Users['user_id'] . ''; ?>" class="btn btn-primary">Edit Profile</a>

                      </td>

                    </tr>
                  <?php }
                } else {
                  ?>
                  <tr>
                    <td colspan="4">Records Not Fount..</td>
                  </tr>
                <?php
                } ?>

              </tbody>
            </table>
          </div>

        </form>
      </main>
    </div>
  </div>



</body>

</html>