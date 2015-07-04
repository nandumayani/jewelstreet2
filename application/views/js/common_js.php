<script src="<?php echo base_url(); ?>js/jquery-1.10.2.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootbox.js"></script>

<?php if ($login != 'login_page') { ?>
  <!--DataTables JS-->
  <script src="<?php echo base_url(); ?>js/dataTables/jquery.dataTables.js" type="text/javascript"></script>
  <script type="text/javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/api/fnReloadAjax.js"></script>
<?php } ?>
<!--Bootstrap Js--> 
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>

<style type="text/css">
  div label.error { float: none; color: red; padding-left: .5em; vertical-align: top; display: inline; font-weight: normal !important; }
  label.error { float: none; color: red; padding-left: .5em; vertical-align: top; display: inline; font-weight: normal !important;}
  input.error,select.error{ color: #666 !important; }
  em { font-weight: bold; padding-right: 1em; vertical-align: top; }
  .input2{width:208px;}
  .input3{width:214px;}
  .input4{border:0;margin:5px;z-index:0;background-color:#FFFFFF;position:absolute;width:70%;}
  .textarea{color:#0033CC;width:208px;height:70px;}
  .input1,.input2,.input3,.textarea{border:0;padding:2px 3px;background-color:transparent;}
</style>

<script type="text/javascript">
  $(document).ready(function () {

<?php if ($login != 'login_page' && $login == '') { ?>
      var segments = $(location).attr('href').split('/');
      $('.' + segments[6]).addClass('active');
<?php } ?>

  });
</script>