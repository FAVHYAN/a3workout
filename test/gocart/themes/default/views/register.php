<?php
$additional_header_info = '<style type="text/css">#gc_page_title {text-align:center;}</style>';
include('header.php'); ?>
<?php
$company	= array('id'=>'bill_company', 'class'=>'span6', 'name'=>'company', 'value'=> set_value('company'));
$first		= array('id'=>'bill_firstname', 'class'=>'span3', 'name'=>'firstname', 'value'=> set_value('firstname'));
$last		= array('id'=>'bill_lastname', 'class'=>'span3', 'name'=>'lastname', 'value'=> set_value('lastname'));
$email		= array('id'=>'bill_email', 'class'=>'span3', 'name'=>'email', 'value'=>set_value('email'));
$phone		= array('id'=>'bill_phone', 'class'=>'span3', 'name'=>'phone', 'value'=> set_value('phone'));
?>

<div class="header-image-inside"><img src="<?php echo base_url("assets/img/yoga-in-sabina-italy.jpg");?>" width="100%"></div>

<div class="jumbotron zero-margin content-shadow effect-load slideDown" style="z-index: 4;">
<div class="container">
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
			
		<div style="text-align:center;">
			<a href="<?php echo site_url('secure/login'); ?>"><?php echo lang('go_to_login');?></a>
		</div>
</div>
</div>
<?php include('footer.php');