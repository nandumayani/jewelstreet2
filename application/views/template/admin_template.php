<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>:: <?php echo APP_TITLE; ?> ::</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <header>
      {admin_header}
    </header>
    <!-- Page Content -->
    <div class="container" style="background:none;">
      {main_content}
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer>
      {admin_footer}
    </footer>
    <!-- /container -->
    <!-- jQuery Js -->
    {common_js}
    {admin_js}
  </body>
</html>
