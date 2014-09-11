<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:18:18
         compiled from "C:\wamp\www\a3shop\modules\leocustomadvhtml\tmpl\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1806529f47bad68f03-84616240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da2b97ccf2f03df53f14cdfc02dba0974ce9e9cd' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\leocustomadvhtml\\tmpl\\default.tpl',
      1 => 1363258679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1806529f47bad68f03-84616240',
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
  'unifunc' => 'content_529f47bade49f0_34040407',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f47bade49f0_34040407')) {function content_529f47bade49f0_34040407($_smarty_tpl) {?><div class="customhtml leo-customhtml-<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['class_prefix']->value;?>
">
	<?php if ($_smarty_tpl->tpl_vars['show_title']->value){?>
		<h3 class="title_block"><?php echo $_smarty_tpl->tpl_vars['module_title']->value;?>
</h3>
	<?php }?>
	<div class="block_content clearfix">
		<div class="row-fluid">
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		</div>
	</div>
</div><?php }} ?>