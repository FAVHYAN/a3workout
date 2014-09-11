<style>
#btno{
     text-decoration:none;   
    background-color: #0a374a;
background-image: -moz-linear-gradient(top, #0a374a, #0a374a);
background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0a374a), to(#0a374a));
background-image: -webkit-linear-gradient(top, #0a374a, #0a374a);
background-image: -o-linear-gradient(top, #0a374a, #0a374a);
background-image: linear-gradient(to bottom, #0a374a, #0a374a);
background-repeat: repeat-x;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#0a374acc', GradientType=0);
border-color: #0a374a #0a374a #0a374a;
border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: normal;
line-height: 1.428571429;
text-align: center;
white-space: nowrap;
vertical-align: middle;
cursor: pointer;
border: 1px solid transparent;
border-radius: 4px;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
color:#ffffff;
}
#btno:hover{
    color: #ffffff;
background-color: #e32322;
}
#btno:active{
    background-color: #e32322;
}</style>
<?php include('header.php'); ?>

<div class="page-header">
	<h2><?php echo lang('order_number');?>: <?php echo $order_id;?></h2>
</div>

<?php
// content defined in canned messages
echo $download_section;
?>

<div class="row">
	<div class="span4">
		<h3><?php echo lang('account_information');?></h3>
		<?php echo (!empty($customer['company']))?$customer['company'].'<br/>':'';?>
		<?php echo $customer['firstname'];?> <?php echo $customer['lastname'];?><br/>
		<?php echo $customer['phone'];?>
	</div>
	<?php
	$ship = $customer['ship_address'];
	$bill = $customer['bill_address'];
	
	// echo '<pre>';
	// print_r($customer);
	// exit();

	?>
	<div class="span4">
		<h3><?php echo ($ship != $bill)?lang('shipping_information'):lang('shipping_and_billing');?></h3>
		<?php echo $customer['firstname'];?> <?php echo $customer['lastname'];?><br/>
		<?php echo $customer['company'];?><br/>
		<?php echo $customer['ship_address']['address1'];?><br/>
		<?php echo $customer['ship_address']['address2'];?><br/>
		<?php echo $customer['ship_address']['city'];?>, <?php echo $customer['ship_address']['zip'];?><br/>
		<?php echo $customer['ship_address']['country'];?><br/>
		<?php echo $ship['phone'];?>
	</div>
	<?php if($ship != $bill):?>
	<div class="span4">
		<h3><?php echo lang('billing_information');?></h3>
		<?php echo $customer['firstname'];?> <?php echo $customer['lastname'];?><br/>
		<?php echo $customer['company'];?><br/>
		<?php echo $customer['bill_address']['address1'];?><br/>
		<?php echo $customer['bill_address']['address2'];?><br/>
		<?php echo $customer['bill_address']['city'];?>, <?php echo $customer['bill_address']['zip'];?><br/>
		<?php echo $customer['bill_address']['country'];?><br/>
		<?php echo $ship['phone'];?>
	</div>
	<?php endif;?>
</div>

<div class="row">
	<div class="span4">
		<h3><?php echo lang('additional_details');?></h3>
		<?php
		if(!empty($referral)):?><div><strong><?php echo lang('heard_about');?></strong> <?php echo $referral;?></div><?php endif;?>
		<?php if(!empty($shipping_notes)):?><div><strong><?php echo lang('shipping_instructions');?></strong> <?php echo $shipping_notes;?></div><?php endif;?>
	</div>

	<div class="span4">
		<h3 style="padding-top:10px;"><?php echo lang('shipping_method');?></h3>
		<?php echo $shipping['method']; ?>
	</div>
	
	<div class="span4">
		<h3><?php echo lang('payment_information');?></h3>
		<?php echo $payment['description']; ?>
	</div>
	
</div>

<table class="table table-bordered table-striped" style="margin-top:20px;">
	<thead>
		<tr>
			<th style="width:10%;"><?php echo lang('sku');?></th>
			<th style="width:20%;"><?php echo lang('name');?></th>
			<th style="width:10%;"><?php echo lang('price');?></th>
			<th><?php echo lang('description');?></th>
			<th style="width:10%;"><?php echo lang('quantity');?></th>
			<th style="width:8%;"><?php echo lang('totals');?></th>
		</tr>
	</thead>
	
	<tfoot>
		<?php if($go_cart['group_discount'] > 0)  : ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('group_discount');?></strong></td>
			<td><?php echo format_currency(0-$go_cart['group_discount']); ?></td>
		</tr>
		<?php endif; ?>

		<tr>
			<td colspan="5"><strong><?php echo lang('subtotal');?></strong></td>
			<td><?php echo format_currency($go_cart['subtotal']); ?></td>
		</tr>
		
		<?php if($go_cart['coupon_discount'] > 0)  : ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('coupon_discount');?></strong></td>
			<td><?php echo format_currency(0-$go_cart['coupon_discount']); ?></td>
		</tr>

		<?php if($go_cart['order_tax'] != 0) : // Only show a discount subtotal if we still have taxes to add (to show what the tax is calculated from) ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('discounted_subtotal');?></strong></td>
			<td><?php echo format_currency($go_cart['discounted_subtotal']); ?></td>
		</tr>
		<?php endif;

		endif; ?>
		<?php // Show shipping cost if added before taxes
		if($this->config->item('tax_shipping') && $go_cart['shipping_cost']>0) : ?>
		<tr>
			<td colspan="5"><strong><?php echo lang('shipping');?></strong></td>
			<td><?php echo format_currency($go_cart['shipping_cost']); ?></td>
		</tr>
		<?php endif ?>
		
		<?php if($go_cart['order_tax'] != 0) : ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('taxes');?></strong></td>
			<td><?php echo format_currency($go_cart['order_tax']); ?></td>
		</tr>
		<?php endif;?>
		
		<?php // Show shipping cost if added after taxes
		if(!$this->config->item('tax_shipping') && $go_cart['shipping_cost']>0) : ?>
		<tr>
			<td colspan="5"><strong><?php echo lang('shipping');?></strong></td>
			<td><?php echo format_currency($go_cart['shipping_cost']); ?></td>
		</tr>
		<?php endif;?>
		
		<?php if($go_cart['gift_card_discount'] != 0) : ?> 
		<tr>
			<td colspan="5"><strong><?php echo lang('gift_card');?></strong></td>
			<td><?php echo format_currency(0-$go_cart['gift_card_discount']); ?></td>
		</tr>
		<?php endif;?>
		<tr> 
			<td colspan="5"><strong><?php echo lang('grand_total');?></strong></td>
			<td><?php echo format_currency($go_cart['total']); ?></td>
		</tr>
	</tfoot>

	<tbody>
	<?php
	$subtotal = 0;
	foreach ($go_cart['contents'] as $cartkey=>$product):?>
		<tr>
			<td><?php echo $product['sku'];?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo format_currency($product['base_price']);   ?></td>
			<td><?php echo $product['excerpt'];
				if(isset($product['options'])) {
					foreach ($product['options'] as $name=>$value)
					{
						if(is_array($value))
						{
							echo '<div><span class="gc_option_name">'.$name.':</span><br/>';
							foreach($value as $item)
								echo '- '.$item.'<br/>';
							echo '</div>';
						} 
						else 
						{
							echo '<div><span class="gc_option_name">'.$name.':</span> '.$value.'</div>';
						}
					}
				}
				?></td>
			<td><?php echo $product['quantity'];?></td>
			<td><?php echo format_currency($product['price']*$product['quantity']); ?>				</td>
		</tr>
			
	<?php endforeach; ?>
	<p style="margin-bottom: 40px;position: relative;top: 20px;text-align:center;">

<a id="btno" href="<?php echo site_url('secure/'.$link_user.'');?>">PROFILE</a>

	</p>
	</tbody>
</table>
<?php include('footer.php');?>