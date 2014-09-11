<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:02
         compiled from "C:\wamp\www\a3shop\themes\leometr\modules\blockadvertising\blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18780529f4732b7fa84-96941906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e9b88601d8a333c0ba4f5da2ca82d1d69d6a936' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\modules\\blockadvertising\\blockadvertising.tpl',
      1 => 1363001151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18780529f4732b7fa84-96941906',
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
  'unifunc' => 'content_529f4732baa232_51758571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f4732baa232_51758571')) {function content_529f4732baa232_51758571($_smarty_tpl) {?>

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