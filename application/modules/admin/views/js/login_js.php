<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function () {

    $(document).on('keypress', '#admin_login', function (event) {
      if (event.which == 13) {
        $('#admin_submit').click();
      }
    });

    $(document).on('click', '#admin_submit', function () {
      $('.db_error').html('');
      if ($("#admin_login").valid()) {
        $.post("<?php echo base_url() . $this->uri->segment(1); ?>/login_authenticate", $('#admin_login').serialize(), function (data) {
          if (data.status == 'y' && data.uri_segment == 'admin') {
            location.href = '<?php echo base_url() . URL_ADMIN_DASHBOARD; ?>';
          } else if (data.status == 'y' && data.uri_segment == 'user') {
            location.href = '<?php echo base_url() . URL_CLIENT_DASHBOARD; ?>';
          } else {
            $('.db_error').html('Login Failed.').css('color', 'red');
          }
        }, "json");
      }
    });

    $.validator.addMethod("noSpace", function (value, element) {
      return value.indexOf(" ") < 0 && value != "";
    }, "Space are not allowed");

    $("#admin_login").validate({
      ignore: ".ignore",
      rules: {
        username: {
          required: true,
          noSpace: true
        },
        password: {
          required: true
        }
      },
      messages: {
        username: {
          required: "Enter Username",
          noSpace: "Spaces are not allowed"
        },
        "password": {
          required: "Enter Password"
        }
      }
    });

  });
</script>
