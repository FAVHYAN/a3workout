<?php 
	$cart_contents = $this->session->userdata('cart_contents');
?>
<div class="row">
	<?php if(!empty($customer['bill_address'])):?>
	<div class="col-md-3">
		<a href="<?php echo site_url('checkout/step_1');?>" class="btn btn-primary">
		
			<?php if($customer['bill_address'] != @$customer['ship_address'])
			{
				echo lang('billing_address_button');
			}
			else
			{
				echo lang('address_button');
			}
			?>
		</a>
		
		<p>
			<?php echo $cart_contents['customer']['firstname'];?> <?php echo $cart_contents['customer']['lastname'];?><br/>
			<?php echo $customer['ship_address']['country'];?>, <?php echo $customer['ship_address']['city'];?><br/>
			<?php echo $customer['ship_address']['address1'];?><br/>
			<?php echo $customer['ship_address']['phone'];?><br/>
		</p>
	</div>
	<?php endif;?>
<?php if(config_item('require_shipping')):?>
	<?php if($this->go_cart->requires_shipping()):?>
		<div class="col-md-3">
			<a href="<?php echo site_url('checkout/shipping_address');?>" class="btn btn-block btn-primary"><?php echo lang('shipping_address_button');?></a>
			<p>
				<?php echo format_address($customer['ship_address'], true);?>
			</p>
			<p>
				<?php echo $customer['ship_address']['phone'];?><br/>
				<?php echo $customer['ship_address']['email'];?><br/>
			</p>
		</div>

		<?php
		
		if(!empty($shipping_method) && !empty($shipping_method['method'])):?>
		<div class="col-md-3">
			<p><a href="<?php echo site_url('checkout/step_2');?>" class="btn btn-block btn-primary"><?php echo lang('shipping_method_button');?></a></p>
			<strong><?php echo lang('shipping_method');?></strong><br/>
			<?php echo $shipping_method['method'].': '.format_currency($shipping_method['price']);?>
		</div>
		<?php endif;?>
	<?php endif;?>
<?php endif;?>

<?php if(!empty($payment_method)):?>
	<div class="col-md-3">
		<p><a href="<?php echo site_url('checkout/step_3');?>" class="btn btn-block btn-primary"><?php echo lang('billing_method_button');?></a></p>
		<?php echo $payment_method['description'];?>
	</div>
<?php endif;?>
</div>