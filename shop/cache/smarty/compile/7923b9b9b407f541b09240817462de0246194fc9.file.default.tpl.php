<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:35:27
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/leocustomtop/tmpl/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65042993352a1fccf1279f0-86566586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7923b9b9b407f541b09240817462de0246194fc9' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/leocustomtop/tmpl/default.tpl',
      1 => 1386265118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65042993352a1fccf1279f0-86566586',
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
  'unifunc' => 'content_52a1fccf134c96_56663002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fccf134c96_56663002')) {function content_52a1fccf134c96_56663002($_smarty_tpl) {?><div class="customhtml leo-customhtml-<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
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