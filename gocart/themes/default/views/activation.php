<?php include('header.php'); ?>

<div class="header-image-inside"><img src="<?php echo base_url("assets/img/yoga-in-sabina-italy.jpg");?>" width="100%"></div>
  
  <?php
  if ( ! $email) {
    redirect('secure/login');
  }
  $mail_server = explode("@", $email);
  ?>
  <div class="jumbotron zero-margin content-shadow effect-load slideDown" style="z-index: 4;">
  	<div class="container">
          <h3><strong>Email Activation</strong></h3>
  		<h4>We sent an email to activate your account to your email <?php echo $email;?>, please <a href="http://www.<?php echo $mail_server[1];?>" target="_blank">confirm</a></h4>
  	</div>
  </div>

<?php include('footer.php'); ?>