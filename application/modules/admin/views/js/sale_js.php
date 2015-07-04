<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootbox.js"></script>

<script type="text/javascript" src="/js/dataTables/ColumnFilterWidgets.js"></script>
<!--<script type="text/javascript" src="/js/dataTables/ColVis.js"></script>-->

<script type="text/javascript">

  $(document).ready(function () {

    $(document).on('click', '#quantyAdd', function () {
      if ($("#form_quanty").valid()) {
        $.post("<?php echo base_url() . $this->uri->segment(1); ?>/insert_update_quantity", $('#form_quanty').serialize(), function (data) {
          if (data) {
            $('.alert').css('display', 'block').removeClass('alert-success alert-danger').addClass('alert-success').html('<b>Added successfully!!!</b>');
          } else {
            $('.alert').css('display', 'block').removeClass('alert-success alert-danger').addClass('alert-danger').html('<b>Adding failed!!!</b>');
          }
        });
      }
    });
    $.validator.addMethod("noSpace", function (value, element) {
      return value.indexOf(" ") < 0 && value != "";
    }, "Space are not allowed");
    $.validator.addMethod("notEqual", function (value, element, param) {
      return this.optional(element) || value != $(param).val();
    }, "Reference Email should NOT be your Email");
    $.validator.addMethod("alpha", function (value, element) {
      return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
    });
    $.validator.addMethod('minStrict', function (value, el, param) {
      return value.length >= param;
    });
    $("#form_quanty").validate({
      rules: {
        quantity: {
          required: true
        }
      },
      messages: {
        quantity: {
          required: "Enter numbers quantity"
        }
      }
    });


    oTablePurchaseItems = $('#TablePurchaseItems').dataTable({
      "sDom": 'W<"clear">i<"clear"><"H"Cr>tS<"F">ilp',
      "oColumnFilterWidgets": {
        "aiExclude": [2]
      },
      "ajax": '<?php echo base_url() . $this->uri->segment(1); ?>/get_sales_list/<?php echo $this->uri->segment(1); ?>',
            bInfo: false,
            "bDestroy": true
          });

          oTablePurchaseItems.fnSort([[3, 'desc']]);

        });

</script>


