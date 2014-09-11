<?php include('header.php'); ?>

<div class="header-image-inside"><img src="<?php echo base_url("assets/img/yoga-in-sabina-italy.jpg");?>" width="100%"></div>

<div class="jumbotron zero-margin content-shadow effect-load slideDown" style="z-index: 0;">
<div class="container">
    <?php echo form_open('secure/forgot_password', 'role="form"');?>
      <div>
        <h2 class="modal-title"><b><?php echo lang('forgot_password');?></b></h2>
      </div>
      <div>
            <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('email');?></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" value="submitted" name="submitted"/>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </form>
		<div style="text-align:center;">
			<a href="<?php echo site_url('secure/login'); ?>"><?php echo lang('return_to_login');?></a>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>
