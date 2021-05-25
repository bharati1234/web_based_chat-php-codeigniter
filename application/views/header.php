<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="<?php

                  if ($this->uri->segment(1) == 'AdminDashboard') {
                    echo 'nav-link active';
                  }  ?>" href="<?php echo base_url('index.php/AdminDashboard/index') ?>">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="<?php if ($this->uri->segment(1) == 'User') {
                    echo 'nav-link active';
                  } ?>" href="<?php echo base_url('index.php/User/index')  ?>" title="My Profile">
          <span data-feather="file"></span>
          My Profile
        </a>
      </li>
      <li class="nav-item">
        <a class="<?php if ($this->uri->segment(1) == 'Friends') {
                    echo 'nav-link active';
                  } ?>" href="<?php echo base_url('index.php/Friends/index') ?>" title="My Freinds">
          <span data-feather="file"></span>
          My Friends
        </a>
      </li>
      <li class="nav-item">
        <a class="<?php //if ($this->uri->segment(1) == 'Friends') {
                  //echo 'nav-link active';
                  ///} 
                  ?>" href="<?php echo base_url('index.php/Friends/Recieved_request') ?>" title="My Freinds">
          <span data-feather="file"></span>
          New Friend Requests
        </a>
      </li>


    </ul>

  </div>
</nav>