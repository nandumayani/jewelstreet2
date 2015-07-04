<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootbox.js"></script>

<script type="text/javascript" src="/js/dataTables/ColumnFilterWidgets.js"></script>
<!--<script type="text/javascript" src="/js/dataTables/ColVis.js"></script>-->


<script type="text/javascript">
  $(document).ready(function () {

<?php if ($this->uri->segment(2) == "users_list") { ?>
      oTableUserItems = $('#TableUserItems').dataTable({
        "sDom": 'W<"clear">i<"clear"><"H"Cr>tS<"F">ilp',
        "searching": true,
        "oColumnFilterWidgets": {
          "aiExclude": [0, 1, 2]
        },
        "ajax": '<?php echo base_url() . $this->uri->segment(1); ?>/get_user_list',
        bInfo: false,
        "bDestroy": true
      });
      oTableUserItems.fnSort([[4, 'asc']]);
<?php } ?>

<?php if ($this->uri->segment(2) == "users_sessions_list") { ?>
      oTableUserItems = $('#TableUserItems').dataTable({
        "sDom": 'W<"clear">i<"clear"><"H"Cr>tS<"F">ilp',
        "oColumnFilterWidgets": {
          "aiExclude": [2, 3, 4]
        },
        "ajax": '<?php echo base_url() . $this->uri->segment(1); ?>/get_user_sessions_list',
        bInfo: false,
        "bDestroy": true
      });
      oTableUserItems.fnSort([[2, 'desc']]);
<?php } ?>


  });
</script>
