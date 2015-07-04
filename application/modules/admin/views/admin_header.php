<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <b><a class="welcome-text" href="#"><?php echo strtoupper(APP_TITLE) ?></a></b>
    </div>
    <?php if (check_session_exists()) { ?>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            Welcome <?php echo ($this->uri->segment(1) == 'admin') ? 'Admin' : $this->session->userdata('username'); ?>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
          </li>
        </ul>
      </div>
    <?php } ?>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>
<!--<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="logoDiv">
        <a href="#"><img src="/images/logo.jpeg" alt=""></a>
      </div>
    </div>
  </div>
</div>-->