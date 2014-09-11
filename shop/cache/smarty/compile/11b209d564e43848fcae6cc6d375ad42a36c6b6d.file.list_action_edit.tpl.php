<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:39:02
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/admin123/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129438978852a1fda6b7fb63-21277829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11b209d564e43848fcae6cc6d375ad42a36c6b6d' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/admin123/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1386267608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129438978852a1fda6b7fb63-21277829',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fda6b87e42_06231689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fda6b87e42_06231689')) {function content_52a1fda6b87e42_06231689($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>