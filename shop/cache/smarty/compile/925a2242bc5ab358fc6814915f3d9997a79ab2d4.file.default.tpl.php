<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:27:35
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/modules/leobottomhtml/tmpl/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136707099852a1faf7643f15-70286882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '925a2242bc5ab358fc6814915f3d9997a79ab2d4' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/modules/leobottomhtml/tmpl/default.tpl',
      1 => 1386265073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136707099852a1faf7643f15-70286882',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pos' => 0,
    'class_prefix' => 0,
    'show_title' => 0,
    'module_title' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1faf76511c1_26128363',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1faf76511c1_26128363')) {function content_52a1faf76511c1_26128363($_smarty_tpl) {?><div class="customhtml leo-customhtml-<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['class_prefix']->value;?>
">
	<?php if ($_smarty_tpl->tpl_vars['show_title']->value){?>
		<h3 class="title_block"><?php echo $_smarty_tpl->tpl_vars['module_title']->value;?>
</h3>
	<?php }?>
	<div class="block_content clearfix">
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

	</div>
</div><?php }} ?>