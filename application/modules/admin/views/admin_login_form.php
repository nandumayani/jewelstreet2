<div class="row">
  <div class="col-md-offset-2 col-md-8">
    <div class="admin_wrapper">
      <form class="form-signin form-horizontal" name="admin_login" id="admin_login" method="post">
        <div class="db_error"></div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-4 control-label">Username</label>
          <div class="col-sm-8">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
          <div class="col-sm-8">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          </div>
        </div>
        <div class="loginBtns">
          <div class="form-group" style="margin-bottom:0;">
            <div class="col-sm-offset-4 col-sm-8">
              <input type="hidden" name="uri_segment" id="uri_segment" value="<?php echo $this->uri->segment(1); ?>">
              <!--<input type="hidden" name="client_code" id="client_code" value="<?php echo $this->uri->segment(2); ?>">-->
              <input type="button" name="admin_submit" id="admin_submit" class="btn btn-primary btn-block" value="Sign In">
            </div>
          </div>
        </div>
        <!--       
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-8">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me" id="remember_me" name="remember_me"> Remember me | Forgot <a href="javascript:void(0);" class="forgot_link"> Password</a>?
              </label>
            </div>
          </div>
        </div>
        -->
      </form>

    </div>
  </div>
</div>

