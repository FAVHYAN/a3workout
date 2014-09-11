<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:01
         compiled from "C:\wamp\www\a3shop\modules\leocustomhome\tmpl\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4182529f473170ff90-29756359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6b16538f5f46a68128f8eec19c73c626152110d' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\leocustomhome\\tmpl\\default.tpl',
      1 => 1363258683,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4182529f473170ff90-29756359',
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
  'unifunc' => 'content_529f473173a369_00337167',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f473173a369_00337167')) {function content_529f473173a369_00337167($_smarty_tpl) {?><div class="customhtml leo-customhtml-<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
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