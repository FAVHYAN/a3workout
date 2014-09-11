<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:00
         compiled from "C:\wamp\www\a3shop\themes\leometr\modules\leobootstrapmenu\themes\default\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9610529f4730e24016-46443788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee027a3610222f4648d288b987afaff47c1335db' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\modules\\leobootstrapmenu\\themes\\default\\default.tpl',
      1 => 1363025918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9610529f4730e24016-46443788',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'leobootstrapmenu_menu_tree' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f4730e2f5b0_34641550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f4730e2f5b0_34641550')) {function content_529f4730e2f5b0_34641550($_smarty_tpl) {?><div class="navbar span9 offset3">
<div class="navbar-inner">
	<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</a>
	<div class="nav-collapse collapse">		
		<?php echo $_smarty_tpl->tpl_vars['leobootstrapmenu_menu_tree']->value;?>

	</div>
</div>
</div><?php }} ?>