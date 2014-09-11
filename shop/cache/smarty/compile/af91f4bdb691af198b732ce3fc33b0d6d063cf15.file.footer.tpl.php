<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:35:30
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/layout/default/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162238044352a1fcd220d2b5-80573950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af91f4bdb691af198b732ce3fc33b0d6d063cf15' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/layout/default/footer.tpl',
      1 => 1386266645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162238044352a1fcd220d2b5-80573950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_CONTENTBOTTOM' => 0,
    'page_name' => 0,
    'LAYOUT_COLUMN_SPANS' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fcd22250f6_26916599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fcd22250f6_26916599')) {function content_52a1fcd22250f6_26916599($_smarty_tpl) {?>	</div>
	<!-- end div block_home -->
<?php if ($_smarty_tpl->tpl_vars['HOOK_CONTENTBOTTOM']->value&&in_array($_smarty_tpl->tpl_vars['page_name']->value,array('index'))){?>
	<div id="contentbottom">
	<?php echo $_smarty_tpl->tpl_vars['HOOK_CONTENTBOTTOM']->value;?>

	</div>
<?php }?>
</section>
<?php if (isset($_smarty_tpl->tpl_vars['LAYOUT_COLUMN_SPANS']->value[2])&&$_smarty_tpl->tpl_vars['LAYOUT_COLUMN_SPANS']->value[2]){?> 
<!-- Right -->
<section id="right_column" class="column span<?php echo $_smarty_tpl->tpl_vars['LAYOUT_COLUMN_SPANS']->value[2];?>
 sidebar">
	<?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>

</section>
<?php }?><?php }} ?>