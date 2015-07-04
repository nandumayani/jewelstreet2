<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/bootbox.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
//    $('#dynamic_admin_services').html($('#add_admin_services').html());

    $(document).on('click', '#btn_vendor_sub', function() {
      $.post("<?php echo base_url(); ?>admin/insert_settings", $('#admin_settings_form').serialize(), function(data) {
//        location.reload();
        $('#service_id').val('');
        $('.admin_services').val('');
        oTableServiceItems.fnReloadAjax();
      });
    });




    $(document).on('click', '#btn_add_services', function() {
      $('#dynamic_admin_services').append('<br><br>' + $('#add_admin_services').html());
    });

    $(document).on('click', '#user_list', function() {
      location.href = '<?php echo base_url() . $this->uri->segment(1); ?>/users_list';
    });

    oTableServiceItems = $('#TableServiceItems').dataTable({
      "sDom": '<"clear">i<"clear"><"H"Cr>tS<"F">ilp',
      "ajax": '<?php echo base_url() . $this->uri->segment(1); ?>/get_service_list',
      bInfo: false,
      "bDestroy": true
              // , "order": [[7, "asc"]]
    });
    oTableServiceItems.fnSort([[0, 'asc']]);

    $(document).on('click', '.edit_service', function() {
      var service_id = $(this).parent().parent().attr('id');
      $.post("<?php echo base_url(); ?>admin/get_service_name", {"service_id": service_id}, function(data) {
        $('#service_id').val('').val(service_id);
        $('.admin_services').val('').val(data);
      });
    });

    $(document).on('click', '#edit_scope_project', function() {
      if ($('.dynamic_scope_project').css('display') == 'none') {
        $('.dynamic_scope_project').css('display', 'block');
      } else {
        $('.dynamic_scope_project').css('display', 'none');
      }
    });

    $(document).on('click', '#btn_scope', function() {
      var scope_project = $('#scope_project').val();
      $.post("<?php echo base_url(); ?>admin/insert_scope_project", {"scope_project": CKEDITOR.instances.scope_project.getData()}, function(data) {
        $('#alert_scope').css('display', 'block').html('').html('Scope of project successfully inserted');
      });
    });

  });
</script>
