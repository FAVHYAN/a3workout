<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:36:29
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/leocustomadvhtml/tmpl/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94097325952a1fd0d6827a9-06194763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d389b8a1d5e876b5f275855f67baa3572acd5d1' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/leocustomadvhtml/tmpl/default.tpl',
      1 => 1386265103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94097325952a1fd0d6827a9-06194763',
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
  'unifunc' => 'content_52a1fd0d6a91f2_10966185',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fd0d6a91f2_10966185')) {function content_52a1fd0d6a91f2_10966185($_smarty_tpl) {?><div class="customhtml leo-customhtml-<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
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