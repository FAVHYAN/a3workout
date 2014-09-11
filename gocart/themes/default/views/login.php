<?php
$additional_header_info = '<style type="text/css">#gc_page_title {text-align:center;}</style>';
include('header.php');
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <?php echo form_open('secure/forgot_password', 'role="form"');?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('forgot_password');?></h4>
          </div>
          <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo lang('email');?></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" value="submitted" name="submitted"/>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="header-image-inside"><img src="<?php echo base_url("assets/img/yoga-in-sabina-italy.jpg");?>" width="100%"></div>

<div class="jumbotron zero-margin content-shadow effect-load slideDown" style="z-index: 4;">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3><strong>Login</strong></h3>
            <?php echo form_open('secure/login', 'role="form"');?>
                <div class="form-group">
                    <label for="useremail" class="text-medium">Username or E-mail</label>
                    <input type="text" class="form-control" id="useremail" name="useremail" placeholder="Enter username or e-mail">
                </div>
                <div class="form-group">
                    <label for="password_sign" class="text-medium">Password</label>
                    <input type="password" class="form-control" id="password_sign" name="password" placeholder="Password">
                </div>
                <div align="left">
                    <input type="checkbox" id="remember" name="remember" value="true">
                    &nbsp;
                    <label for="remember" class="text-md-small"><?php echo lang('keep_me_logged_in');?></label>
                </div>
        
                <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
                <input type="hidden" value="submitted" name="submitted"/>

                <button type="submit" class="btn btn-primary"><?php echo lang('form_login');?></button>
                
                <div align="center">
                    <br>
                    <!-- Button trigger modal -->
                    <button class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
                        Forgot your password?
                    </button>
                    <br><br>
                </div>

                <div align="center">
                    <br>
                    <!-- Button facebook modal -->
                    
                    
                </div>
                    <div class="well" align="center">

                    <!-- <a class="btn btn-default btn-lg" href="<?php echo site_url('login/fblogin');?>">Facebook</a> -->
                    <a href="<?php echo site_url('social/twitter');?>" class="btn btn-default btn-lg">Twitter</a>
                    <!-- <a class="btn btn-default btn-lg">Google +</a> -->
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="well">
                <h3><strong><?php echo lang('form_register');?></strong></h3>
                <?php echo form_open('secure/register', 'role="form"');?>

                    <div class="form-group">
                        <label for="firstname" class="text-medium">First Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo set_value('firstname');?>" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="text-medium">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo set_value('lastname');?>" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <label for="username" class="text-medium">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username');?>" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-medium">E-mail <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password_signup" class="text-medium">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_signup" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password_signup" class="text-medium">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="confirm_password_signup" name="confirm" placeholder="Confirm Password">
                    </div>
                    <div align="left">
                        <input type="checkbox" id="email_subscribe" name="email_subscribe" value="1" <?php echo set_radio('email_subscribe', '1', TRUE); ?>>
                        &nbsp;
                        <label for="email_subscribe" class="text-md-small"/><?php echo lang('account_newsletter_subscribe');?></label>
                    </div>

                    <input type="hidden" name="submitted" value="submitted" />
                    <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />

                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('footer.php'); ?>