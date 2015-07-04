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
    <link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css" rel="stylesheet" />
    
    <link href="/css/ColumnFilterWidgets.css" rel="stylesheet" />
    <link href="/css/ColVis.css" rel="stylesheet" />
  </head>
  <body>
    <header>
      {admin_header}
    </header>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="sidebar">
            {left_menu}
          </div>
        </div>
        <div class="col-md-9 contentArea">
          {main_content}
        </div>
      </div>
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer>
      {admin_footer}
    </footer>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    {common_js}
    {admin_js}
    <div id="loaderDiv" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static">
      <div id="circularG">
        <div id="circularG_1" class="circularG"></div>
        <div id="circularG_2" class="circularG"></div>
        <div id="circularG_3" class="circularG"></div>
        <div id="circularG_4" class="circularG"></div>
        <div id="circularG_5" class="circularG"></div>
        <div id="circularG_6" class="circularG"></div>
        <div id="circularG_7" class="circularG"></div>
        <div id="circularG_8" class="circularG"></div>
      </div>
    </div>
  </body>
</html>


