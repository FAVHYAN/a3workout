<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:19:12
         compiled from "C:\wamp\www\a3shop\admin123\themes\default\template\helpers\list\list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25262529f47f0650495-64053721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5208c0a82d8998981ae1a87c16e88cac8f22b7b8' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\admin123\\themes\\default\\template\\helpers\\list\\list_action_delete.tpl',
      1 => 1364329056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25262529f47f0650495-64053721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f47f069ab52_84692379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f47f069ab52_84692379')) {function content_529f47f069ab52_84692379($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>