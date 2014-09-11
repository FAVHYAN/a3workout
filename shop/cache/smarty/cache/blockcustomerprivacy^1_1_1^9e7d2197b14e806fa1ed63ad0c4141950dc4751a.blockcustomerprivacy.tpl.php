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
  'variables' => 
  array (
    'privacy_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a2526dd467e5_42360303',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a2526dd467e5_42360303')) {function content_52a2526dd467e5_42360303($_smarty_tpl) {?>
<div class="error_customerprivacy" style="color:red;"></div>
<fieldset class="account_creation customerprivacy">
	<h3>Customer data privacy</h3>
	<p class="required">
		<input type="checkbox" value="1" id="customer_privacy" name="customer_privacy" style="float:left;margin: 15px;" />				
	</p>
	<label for="customer_privacy">The personal data you provide is used to answer to your queries, process your orders or allow you to access specific information. You have a right to modify and delete all the personal information which we hold concerning yourself in the &quot;my account&quot; page.</label>		
</fieldset><?php }} ?>