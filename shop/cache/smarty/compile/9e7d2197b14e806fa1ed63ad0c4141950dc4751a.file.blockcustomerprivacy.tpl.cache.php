<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 17:40:45
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blockcustomerprivacy/blockcustomerprivacy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115949293152a2526dd22cc7-89758004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e7d2197b14e806fa1ed63ad0c4141950dc4751a' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blockcustomerprivacy/blockcustomerprivacy.tpl',
      1 => 1386264243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115949293152a2526dd22cc7-89758004',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'privacy_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a2526dd44143_57935588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a2526dd44143_57935588')) {function content_52a2526dd44143_57935588($_smarty_tpl) {?>

<div class="error_customerprivacy" style="color:red;"></div>
<fieldset class="account_creation customerprivacy">
	<h3><?php echo smartyTranslate(array('s'=>'Customer data privacy','mod'=>'blockcustomerprivacy'),$_smarty_tpl);?>
</h3>
	<p class="required">
		<input type="checkbox" value="1" id="customer_privacy" name="customer_privacy" style="float:left;margin: 15px;" />				
	</p>
	<label for="customer_privacy"><?php echo $_smarty_tpl->tpl_vars['privacy_message']->value;?>
</label>		
</fieldset><?php }} ?>