<ul class="nav in">
  <?php if ($this->session->userdata('role_id') == 1) { ?>
    <li>
      <a href="<?php echo base_url(); ?>admin/users_list" class="users_list"><i class="fa fa-users"></i> Staff Management</a>
    </li>
     <li>
      <a href="<?php echo base_url(); ?>admin/users_sessions_list" class="users_sessions_list"><i class="fa fa-users"></i> Staff Logins</a>
    </li>
    <li>
      <a href="<?php echo base_url(); ?>admin/sale_orders_list" class="sale_orders_list"><i class="fa fa-tasks"></i> Sales Management</a>
    </li>
  <?php } else if ($this->session->userdata('role_id') == 2) { ?>
    <li>
      <a href="<?php echo base_url(); ?>user/sale_orders_list" class="sale_orders_list"><i class="fa fa-credit-card"></i> Sales Management</a>
    </li>
  <?php } ?>
</ul>