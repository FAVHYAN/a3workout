<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:00
         compiled from "C:\wamp\www\a3shop\modules\leocustomtop\tmpl\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9205529f4730cc29e6-58044238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f31a0b6fdd8244a38a09b5a056f53f8af03c179' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\leocustomtop\\tmpl\\default.tpl',
      1 => 1363258655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9205529f4730cc29e6-58044238',
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
  'unifunc' => 'content_529f4730cecc46_87192456',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f4730cecc46_87192456')) {function content_529f4730cecc46_87192456($_smarty_tpl) {?><div class="customhtml leo-customhtml-<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
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