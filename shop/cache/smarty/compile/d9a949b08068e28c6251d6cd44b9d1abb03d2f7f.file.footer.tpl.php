<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:27:38
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/themes/leometr/layout/default/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1460808352a1fafa6fac60-85784700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9a949b08068e28c6251d6cd44b9d1abb03d2f7f' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/themes/leometr/layout/default/footer.tpl',
      1 => 1386266645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1460808352a1fafa6fac60-85784700',
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
  'unifunc' => 'content_52a1fafa712c50_66694715',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fafa712c50_66694715')) {function content_52a1fafa712c50_66694715($_smarty_tpl) {?>	</div>
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