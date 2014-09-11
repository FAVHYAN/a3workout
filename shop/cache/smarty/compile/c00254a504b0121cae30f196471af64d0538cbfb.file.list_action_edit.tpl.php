<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:19:12
         compiled from "C:\wamp\www\a3shop\admin123\themes\default\template\helpers\list\list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20265529f47f05c3233-04232906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c00254a504b0121cae30f196471af64d0538cbfb' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\admin123\\themes\\default\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1364329056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20265529f47f05c3233-04232906',
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
  'unifunc' => 'content_529f47f062f870_60825774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f47f062f870_60825774')) {function content_529f47f062f870_60825774($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>