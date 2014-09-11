<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:51:58
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/admin123/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78492255152a200ae2daf07-25993681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74d05a9ab7aee607e948261a2c771c8139e6f09c' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/admin123/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1386267608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78492255152a200ae2daf07-25993681',
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
  'unifunc' => 'content_52a200ae307124_58939532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a200ae307124_58939532')) {function content_52a200ae307124_58939532($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>