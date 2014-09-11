<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 14:39:46
         compiled from "C:\wamp\www\a3shop\admin123\themes\default\template\helpers\list\list_action_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:407529f8502d15d08-84177205%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92abd0bcd9ec597597df29efb708c005fdce6279' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\admin123\\themes\\default\\template\\helpers\\list\\list_action_default.tpl',
      1 => 1364329056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '407529f8502d15d08-84177205',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f8502dfb636_24674599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f8502dfb636_24674599')) {function content_529f8502dfb636_24674599($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="default" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['name']->value)){?>name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"<?php }?>>
	<img src="../img/admin/asterisk.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>