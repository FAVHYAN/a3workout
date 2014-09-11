<style type="text/css">
	.placeholder {
		display:none;
	}
</style>

<?php if (validation_errors()):?>
	<div class="alert alert-danger">
		<a class="close" data-dismiss="alert">&times;</a>
		<?php echo validation_errors();?>
	</div>
<?php endif;?>

<script type="text/javascript">
	$(document).ready(function(){
		
		//if we support placeholder text, remove all the labels
		if(!supports_placeholder())
		{
			$('.placeholder').show();
		}
		
	});
	
	function supports_placeholder()
	{
		return 'placeholder' in document.createElement('input');
	}
</script>



<script type="text/javascript">
$(document).ready(function() {
	$('#country_id').change(function(){
		populate_zone_menu();
	});	

});
// context is ship or bill
function populate_zone_menu(value)
{
	$.post('<?php echo site_url('locations/get_zone_menu');?>',{id:$('#country_id').val()}, function(data) {
		$('#zone_id').html(data);
	});
}
</script>
<?php /* Only show this javascript if the user is logged in */ ?>
<?php if($this->Customer_model->is_logged_in(false, false)) : ?>
<script type="text/javascript">	
	<?php
	$add_list = array();
	foreach($customer_addresses as $row) {
		// build a new array
		$add_list[$row['id']] = $row['field_data'];
	}


	$add_list = json_encode($add_list);
	echo "eval(addresses=$add_list);";
	?>
		
	function populate_address(address_id)
	{
		if(address_id == '')
		{
			return;
		}
		
		// - populate the fields
		$.each(addresses[address_id], function(key, value){
			
			$('.address[name='+key+']').val(value);

			// repopulate the zone menu and set the right value if we change the country
			if(key=='zone_id')
			{
				zone_id = value;
			}
		});
		
		// repopulate the zone list, set the right value, then copy all to billing
		$.post('<?php echo site_url('locations/get_zone_menu');?>',{id:$('#country_id').val()}, function(data) {
			$('#zone_id').html(data);
			$('#zone_id').val(zone_id);
		});		
	}
	
</script>
<?php endif;?>

<?php
$countries = $this->Location_model->get_countries_menu();

if(!empty($customer[$address_form_prefix.'_address']['country_id']))
{
	$zone_menu	= $this->Location_model->get_zones_menu($customer[$address_form_prefix.'_address']['country_id']);
}
else
{
	$zone_menu = array(''=>'')+$this->Location_model->get_zones_menu(array_shift(array_keys($countries)));
}

//form elements

 // echo '<pre>';
	// print_r($customer['address']);
	// exit();
			                                   

if( empty($customer )){
$company	= array('placeholder'=>lang('address_company'),'class'=>'address form-control', 'name'=>'company', 'value'=> set_value('company', @$customer[$address_form_prefix.'_address']['company']));
$address1	= array('placeholder'=>lang('address1'), 'class'=>'address form-control', 'name'=>'address1', 'value'=> set_value('address1', @$customer[$address_form_prefix.'_address']['address1']));
$address2	= array('placeholder'=>lang('address2'), 'class'=>'address form-control', 'name'=>'address2', 'value'=>  set_value('address2', @$customer[$address_form_prefix.'_address']['address2']));
$first		= array('placeholder'=>lang('address_firstname'), 'class'=>'address form-control', 'name'=>'firstname', 'value'=>  set_value('firstname', @$customer[$address_form_prefix.'_address']['firstname']));
$last		= array('placeholder'=>lang('address_lastname'), 'class'=>'address form-control', 'name'=>'lastname', 'value'=>  set_value('lastname', @$customer[$address_form_prefix.'_address']['lastname']));
$email		= array('placeholder'=>lang('address_email'), 'class'=>'address form-control', 'name'=>'email', 'value'=> set_value('email', @$customer[$address_form_prefix.'_address']['email']));
$phone		= array('placeholder'=>lang('address_phone'), 'class'=>'address form-control', 'name'=>'phone', 'value'=> set_value('phone', @$customer[$address_form_prefix.'_address']['phone']));
$city		= array('placeholder'=>lang('address_city'), 'class'=>'address form-control', 'name'=>'city', 'value'=> set_value('city', @$customer[$address_form_prefix.'_address']['city']));
$zip		= array('placeholder'=>lang('address_postcode'), 'maxlength'=>'10', 'class'=>'address form-control', 'name'=>'zip', 'value'=> set_value('zip', @$customer[$address_form_prefix.'_address']['zip']));

}else{
	
$company	= array('placeholder'=>lang('address_company'),'class'=>'address form-control', 'name'=>'company', 'value'=> set_value('company', @$customer[$address_form_prefix.'_address']['company']));
$address1	= array('placeholder'=>lang('address1'), 'class'=>'address form-control', 'name'=>'address1', 'value'=> set_value('address1', @$customer['address']));
$address2	= array('placeholder'=>lang('address2'), 'class'=>'address form-control', 'name'=>'address2', 'value'=>  set_value('address2', @$customer['address']));
$first		= array('placeholder'=>lang('address_firstname'), 'class'=>'address form-control', 'name'=>'firstname', 'value'=>  set_value('firstname', @$customer['firstname']));
$last		= array('placeholder'=>lang('address_lastname'), 'class'=>'address form-control', 'name'=>'lastname', 'value'=>  set_value('lastname', @$customer['lastname']));
$email		= array('placeholder'=>lang('address_email'), 'class'=>'address form-control', 'name'=>'email', 'value'=> set_value('email', @$customer['email']));
$phone		= array('placeholder'=>lang('address_phone'), 'class'=>'address form-control', 'name'=>'phone', 'value'=> set_value('phone', @$customer['phone']));
$city		= array('placeholder'=>lang('address_city'), 'class'=>'address form-control', 'name'=>'city', 'value'=> set_value('city', @$customer['city']));
$zip		= array('placeholder'=>lang('address_postcode'), 'maxlength'=>'10', 'class'=>'address form-control', 'name'=>'zip', 'value'=> set_value('zip', @$customer['zip']));

}




?>


<div class="zero-margin content-shadow effect-load slideDown" style="z-index: 1; background-color: #ffffff;">
    <div class="container zero-margin zero-padding">
		<div class="row page-header" style="margin: 3em 1em;">
			<h2><?php echo lang('form_checkout');?></h2>
			<span><?php echo ($address_form_prefix == 'bill') ? lang('address') : lang('shipping_address');?></span>
		</div>
		<div class="row" align="right" style="margin: 3em 1em;">
			<?php if($this->Customer_model->is_logged_in(false, false)) : ?>
				<button type="button" class="btn btn-primary" onclick="$('#address_manager').modal().modal('show');"><i class="glyphicon glyphicon-envelope"></i> <?php echo lang('choose_address');?></button>
			<?php endif; ?>
		</div>
		<?php
		//post to the correct place.


		echo ($address_form_prefix == 'bill')?form_open('checkout/step_1'):form_open('checkout/shipping_address');?>
		<input type="hidden" value="<?php echo  $customer['id']; ?>" name="id">
			<div class="row" style="margin: 3em 1em;">                            
				<div class="col-md-6">
					<div class="well">
						<div class="form-group">
							<label for="address1"><?php echo lang('address1');?><span class="text-danger">*</span></label>
							<?php echo form_input($address1);?>
						</div>
						<div class="form-group">
							<label for="address2"><?php echo lang('address2');?></label>
							<?php echo form_input($address2);?>
						</div>
						<div class="form-group">
							<label for="phone"><?php echo lang('address_phone');?> <span class="text-danger">*</span></label>
							<?php echo form_input($phone);?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="well">
						<div class="form-group">
							<label for="country_id">Country <span class="text-danger">*</span></label>

							<?php

							if(empty($customer)){
								echo form_dropdown('country_id',$countries, @$customer[$address_form_prefix.'_address']['country_id'], 'id="country_id" class="address form-control"');
							}else{
								echo form_dropdown('country_id',$countries, @$customer['country_id'], 'id="country_id" class="address form-control"');
							}

							 ?>
						</div>
						<div class="form-group">
							<label for="city"><?php echo lang('address_city');?> <span class="text-danger">*</span></label>
							<?php echo form_input($city);?>
						</div>
						<div class="form-group">
							<label for="zip"><?php echo lang('address_postcode');?> <span class="text-danger">*</span></label>
							<?php echo form_input($zip);?>
						</div>
					</div>
				</div>
				<div align="right" style="width: 97%;">
					<input class="btn btn-primary btn-lg" type="submit" value="<?php echo lang('form_continue');?>"/>
				</div>
			</div>
		</form>
	</div>
</div>

<?php if($this->Customer_model->is_logged_in(false, false)) : ?>

<div class="modal hide" id="address_manager">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3><?php echo lang('your_addresses');?></h3>
	</div>
	<div class="modal-body">
		<p>
			<table class="table table-striped">
			<?php
			$c = 1;
			foreach($customer_addresses as $a):?>
				<tr>
					<td>
						<?php
						$b	= $a['field_data'];
						echo nl2br(format_address($b));
						?>
					</td>
					<td style="width:100px;"><input type="button" class="btn btn-primary choose_address pull-right" onclick="populate_address(<?php echo $a['id'];?>);" data-dismiss="modal" value="<?php echo lang('form_choose');?>" /></td>
				</tr>
			<?php endforeach;?>
			</table>
		</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
	</div>
</div>
<?php endif;?>