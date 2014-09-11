<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:35:27
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/modules/blockadvertising/blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37702719352a1fccf799c86-73142759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f05eece9bce23c3b0cc8f507cba0375b67613eb0' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/modules/blockadvertising/blockadvertising.tpl',
      1 => 1386266672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37702719352a1fccf799c86-73142759',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adv_link' => 0,
    'adv_title' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fccf7a6077_78615897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fccf7a6077_78615897')) {function content_52a1fccf7a6077_78615897($_smarty_tpl) {?>

<!-- MODULE Block advertising -->
<div class="advertising_block">
	<a href="<?php echo $_smarty_tpl->tpl_vars['adv_link']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" width="220"  height="332" /></a>
</div>
<!-- /MODULE Block advertising -->
<?php }} ?>