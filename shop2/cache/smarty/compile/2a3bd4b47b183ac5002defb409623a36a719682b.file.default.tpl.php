<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:00
         compiled from "C:\wamp\www\a3shop\modules\leocustomhometop\tmpl\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14331529f4730ea6052-69520216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a3bd4b47b183ac5002defb409623a36a719682b' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\leocustomhometop\\tmpl\\default.tpl',
      1 => 1363258687,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14331529f4730ea6052-69520216',
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
  'unifunc' => 'content_529f4730ed1f84_20657172',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f4730ed1f84_20657172')) {function content_529f4730ed1f84_20657172($_smarty_tpl) {?><div class="customhtml leo-customhtml-<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
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