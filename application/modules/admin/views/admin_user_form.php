<div class="row">
  <div class="col-md-12">
    <h1 class="page-header">
      <?php echo ($user_details['id'] != "") ? "Edit" : "Add"; ?> User
    </h1>
  </div>
</div> 
<div class="alert" style="display: none;"></div>
<div class="col-sm-12 userBtnDiv" style="padding:20px; border-bottom: 1px solid #ccc; display: none;">
  <div class="col-sm-9">
    <h4>&nbsp;</h4>
  </div>
  <div class="pull-right">
    <input type="button" value="<?php echo 'User List'; ?>" id="user_list" name="" class="btn btn-success">
    <input type="button" value="<?php echo 'Add User'; ?>" id="user_add" name="" class="btn btn-success">
  </div>
</div>
<!-- /. ROW  -->
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <?php echo ($user_details['id'] != "") ? "Edit" : "Add"; ?> User Info
      </div>        
      <div class="panel-body" id="user_formdiv">
        <form class="form-horizontal" method="post" name="user_form" id="user_form">
          <div class="row">

            <div class="form-group col-sm-6">
              <label for="" class="col-sm-4 control-label">First Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_details['first_name']; ?>">
              </div>
            </div>

            <div class="form-group col-sm-6">
              <label for="" class="col-sm-4 control-label">Last Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_details['last_name']; ?>">
              </div>
            </div>

            <div class="form-group col-sm-6">
              <label for="" class="col-sm-4 control-label">User Type</label>
              <div class="col-sm-8">
                <?php echo $user_type_dropdown; ?>
              </div>
            </div>

            <div class="form-group col-sm-6">
              <label for="" class="col-sm-4 control-label">Email Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $user_details['email']; ?>">
              </div>
            </div>

            <div class="form-group col-sm-6">
              <label for="" class="col-sm-4 control-label">Username</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_details['username']; ?>">
              </div>
            </div>
            <?php if ($user_details['id'] == "") { ?>
              <div class="form-group col-sm-6">
                <label for="" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="password" name="password" placeholder="" value="<?php echo ($unique_password != "") ? $unique_password : $user_details['password']; ?>" readonly="">
                </div>
              </div>
              <div class="clearfix"></div>
            <?php } ?>



            <div class="clearfix"></div>
          </div>
          <div class="row">
            <div class="col-sm-6 text-right">
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_details['id']; ?>">
              <input type="hidden" name="uri_segment" id="uri_segment" value="<?php echo $uri_segment; ?>">
              <input type="reset" class="btn btn-primary" name="btn_user_reset" id="btn_user_reset" value="Reset">
              <input type="button" class="btn btn-primary" name="btn_user_submit" id="btn_user_submit" value="<?php echo ($user_details['id'] != "") ? "Update" : "Submit"; ?>">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>						
</div>