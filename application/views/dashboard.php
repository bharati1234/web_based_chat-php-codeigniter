<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Application</title>
  <?php $this->load->view('style');
  ?>
</head>

<body>
  <?php $this->load->view('nav.php');
  ?>

  <div class="container-fluid">
    <div class="row">
      <?php $this->load->view('header.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">All Members</h1>

        </div>
        <div class="col-md-6 col-md-offset-3" style="margin-bottom:30px;">
          <input class="form-control" type="text" id="search" placeholder="Search for Users...">
        </div>

        <div id="results"></div>

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
                  <th width="300">Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php if (!empty($User)) {

                  foreach ($User as $Users) { ?>
                    <tr>
                      <td><?php echo $Users['username']; ?></td>
                      <td><?php echo $Users['email']; ?></td>
                      <td>
                        <a class="btn btn-success" data-receiver_userid="<?php echo $Users['user_id']; ?>" data-send_userid="<?php echo $Users['user_id']; ?>" id="<?php echo $Users['user_id']; ?>">Send Request</a>

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
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
  </script>
  <script type="text/javascript">
    $("#search").keyup(function() {
      var value = this.value.toLowerCase().trim();

      $("table tr").each(function(index) {
        if (!index) return;
        $(this).find("td").each(function() {
          var id = $(this).text().toLowerCase().trim();
          var not_found = (id.indexOf(value) == -1);
          $(this).closest('tr').toggle(!not_found);
          return not_found;
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).on('click', '.btn-success', function() {
      var id = $(this).attr('id');
      console.log(id);
      var receiver_userid = $(this).data('receiver_userid');
      //console.log(receiver_userid);
      var send_userid = $(this).data('send_userid');
      //console.log(send_userid);
      $.ajax({

        url: "<?php echo base_url(); ?>index.php/Friends/send_request",
        method: "POST",
        data: {
          receiver_userid: receiver_userid,
          send_userid: send_userid
        },
        beforeSend: function() {
          //$('#' + id).attr('disabled', 'disabled');
        },
        success: function(data) {
          //alert("Request send");
          $('#' + id).attr('disabled', false);
          $('#' + id).removeClass('btn-success');
          $('#' + id).addClass('btn-warning');
          $('#' + id).text('Request Sent');
        }
      })
    })
  </script>

</body>

</html>