<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 15:36:11
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/admin123/themes/default/template/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58344816752a2353b1790a1-51701929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5889cdfa9934efa39ec53628a308fa8a24704f8e' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/admin123/themes/default/template/helpers/list/list_action_duplicate.tpl',
      1 => 1386267608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58344816752a2353b1790a1-51701929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'confirm' => 0,
    'location_ok' => 0,
    'location_ko' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a2353b1857c3_94221068',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a2353b1857c3_94221068')) {function content_52a2353b1857c3_94221068($_smarty_tpl) {?>
<a class="pointer" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')) document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ok']->value;?>
'; else document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ko']->value;?>
';">
	<img src="../img/admin/duplicate.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>