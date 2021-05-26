<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <style>
    /*---------chat window---------------*/
    .container {
      max-width: 900px;
    }

    .inbox_people {
      background: #fff;
      float: left;
      overflow: hidden;
      width: 30%;
      border-right: 1px solid #ddd;
    }

    .inbox_msg {
      border: 1px solid #ddd;
      clear: both;
      overflow: hidden;
    }

    .top_spac {
      margin: 20px 0 0;
    }

    .recent_heading {
      float: left;
      width: 40%;
    }

    .srch_bar {
      display: inline-block;
      text-align: right;
      width: 60%;
      padding: 0px;
    }

    .headind_srch {
      padding: 10px 29px 10px 20px;
      overflow: hidden;
      border-bottom: 1px solid #c4c4c4;
    }

    .recent_heading h4 {
      color: #0465ac;
      font-size: 16px;
      margin: auto;
      line-height: 29px;
    }

    .srch_bar input {
      outline: none;
      border: 1px solid #cdcdcd;
      border-width: 0 0 1px 0;
      width: 80%;
      padding: 2px 0 4px 6px;
      background: none;
    }

    .srch_bar .input-group-addon button {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      padding: 0;
      color: #707070;
      font-size: 18px;
    }

    .srch_bar .input-group-addon {
      margin: 0 0 0 -27px;
    }

    .chat_ib h5 {
      font-size: 15px;
      color: #464646;
      margin: 0 0 8px 0;
    }

    .chat_ib h5 span {
      font-size: 13px;
      float: right;
    }

    .chat_ib p {
      font-size: 12px;
      color: #989898;
      margin: auto;
      display: inline-block;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .chat_img {
      float: left;
      width: 11%;
    }

    .chat_img img {
      width: 100%
    }

    .chat_ib {
      float: left;
      padding: 0 0 0 15px;
      width: 88%;
    }

    .chat_people {
      overflow: hidden;
      clear: both;
    }

    .chat_list {
      border-bottom: 1px solid #ddd;
      margin: 0;
      padding: 18px 16px 10px;
    }

    .inbox_chat {
      height: 550px;
      overflow-y: scroll;
    }

    .active_chat {
      background: #e8f6ff;
    }

    .incoming_msg_img {
      display: inline-block;
      width: 6%;
    }

    .incoming_msg_img img {
      width: 100%;
    }

    .received_msg {
      display: inline-block;
      padding: 0 0 0 10px;
      vertical-align: top;
      width: 92%;
    }

    .received_withd_msg p {
      background: #ebebeb none repeat scroll 0 0;
      border-radius: 0 15px 15px 15px;
      color: #646464;
      font-size: 14px;
      margin: 0;
      padding: 5px 10px 5px 12px;
      width: 100%;
    }

    .time_date {
      color: #747474;
      display: block;
      font-size: 12px;
      margin: 8px 0 0;
    }

    .received_withd_msg {
      width: 57%;
    }

    .mesgs {
      float: left;
      padding: 30px 15px 0 25px;
      width: 70%;
    }

    .sent_msg p {
      background: #0465ac;
      border-radius: 12px 15px 15px 0;
      font-size: 14px;
      margin: 0;
      color: #fff;
      padding: 5px 10px 5px 12px;
      width: 100%;
    }

    .outgoing_msg {
      overflow: hidden;
      margin: 26px 0 26px;
    }

    .sent_msg {
      float: right;
      width: 46%;
    }

    .input_msg_write input {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      color: #4c4c4c;
      font-size: 15px;
      min-height: 48px;
      width: 100%;
      outline: none;
    }

    .type_msg {
      border-top: 1px solid #c4c4c4;
      position: relative;
    }

    .msg_send_btn {
      background: #05728f none repeat scroll 0 0;
      border: none;
      border-radius: 50%;
      color: #fff;
      cursor: pointer;
      font-size: 15px;
      height: 33px;
      position: absolute;
      right: 0;
      top: 11px;
      width: 33px;
    }

    .messaging {
      padding: 0 0 50px 0;
    }

    .msg_history {
      height: 516px;
      overflow-y: auto;
    }
  </style>


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
          <h1 class="h2">My Friends</h1>

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
        <!-- <div class="messaging">
          <div class="inbox_msg">
            <div class="inbox_people">
              <div class="headind_srch">
                <div class="recent_heading">
                  <h4>Recent</h4>
                </div>
                <div class="srch_bar">
                  <div class="stylish-input-group">
                    <input type="text" class="search-bar" placeholder="Search">
                  </div>
                </div>
              </div>
              <div class="inbox_chat scroll">
                <div class="chat_list active_chat">
                  <div class="chat_people">
                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                    <div class="chat_ib">
                      <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                      <p>Test, which is a new approach to have all solutions
                        astrology under one roof.</p>
                    </div>
                  </div>
                </div>
                <div class="chat_list">
                  <div class="chat_people">
                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                    <div class="chat_ib">
                      <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                      <p>Test, which is a new approach to have all solutions
                        astrology under one roof.</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="mesgs">
              <div class="msg_history">
                <div class="incoming_msg">
                  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p>Test which is a new approach to have all
                        solutions</p>
                      <span class="time_date"> 11:01 AM | June 9</span>
                    </div>
                  </div>
                </div>
                <div class="outgoing_msg">
                  <div class="sent_msg">
                    <p>Test which is a new approach to have all
                      solutions</p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                  </div>
                </div>
                <div class="incoming_msg">
                  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p>Test, which is a new approach to have</p>
                      <span class="time_date"> 11:01 AM | Yesterday</span>
                    </div>
                  </div>
                </div>
                <div class="outgoing_msg">
                  <div class="sent_msg">
                    <p>Apollo University, Delhi, India Test</p>
                    <span class="time_date"> 11:01 AM | Today</span>
                  </div>
                </div>
                <div class="incoming_msg">
                  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p>We work directly with our designers and suppliers,
                        and sell direct to you, which means quality, exclusive
                        products, at a price anyone can afford.</p>
                      <span class="time_date"> 11:01 AM | Today</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="type_msg">
                <div class="input_msg_write">
                  <input type="text" class="write_msg" placeholder="Type a message" />
                  <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <form name="list_user" id="list_user" method="post">
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
                <?php if (!empty($Friends)) {

                  foreach ($Friends as $friend) {

                ?>
                    <tr>
                      <td><?php echo $friend['username']; ?></td>
                      <td><?php echo $friend['email']; ?></td>
                      <td>
                        <a href="<?php echo base_url() . 'index.php/User/chat_with_user/' . $friend['user_id'] . '';
                                  ?>" class="btn btn-primary">Chat with Freind</a>
                      </td>
                      <!-- <button type="submit" id="chat_with_user<?php echo $friend['user_id']; ?>" class="btn btn-primary chat_with_user">Chat with Freind</button>
                        <input type="hidden" id="user_id" value="<?php echo $friend['user_id']; ?>"  -->
                    </tr>
                  <?php }
                } else {
                  ?>
                  <tr>
                    <td colspan="4">Sorry...There are not any Friend yet.</td>
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
    // $(".chat_with_user").click(function() {
    //   /// var user_id = $(this).attr('id');
    //   var user_id = $('input[name=id]').val();
    //   console.log(user_id);
    //   $.ajax({
    //     url: "<?php echo base_url() ?>index.php/User/chat_with_user",
    //     type: "GET",
    //     data: {
    //       user_id: user_id
    //     },
    //     success: function(data) {
    //       console.log(data);

    //     }
    //   });
    // });
    // $(function() {
    //   $(".chat_with_user").click(function(event) {
    //     event.preventDefault();
    //     var user_id = $("#user_id").val();
    //     $.ajax({
    //       type: "post",
    //       url: "http://localhost/loginproject/index.php/User/chat_with_user",
    //       data: {
    //         'user_id': user_id,
    //       },
    //       dataType: 'JSON',
    //       success: function(data) {
    //         console.log(data);
    //       }
    //     });
    //   });
    // });
  </script>
</body>

</html>