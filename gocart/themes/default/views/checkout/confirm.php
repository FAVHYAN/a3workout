<div class="zero-margin content-shadow effect-load slideDown" style="z-index: 1; background-color: #ffffff;">
    <div class="container zero-margin">
		<div class="page-header">
			<h2><?php echo lang('form_checkout');?></small></h2>
		</div>
		<?php include('order_details.php');?>
		<?php include('summary.php');?>
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('checkout/place_order');?>"><?php echo lang('submit_order');?></a>
			</div>
		</div>
		<br>
    </div>
</div>