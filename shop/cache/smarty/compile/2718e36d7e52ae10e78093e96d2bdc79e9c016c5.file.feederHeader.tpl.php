<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:15:54
         compiled from "C:\wamp\www\a3shop\modules\feeder\feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11487529f472af19e18-26966909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2718e36d7e52ae10e78093e96d2bdc79e9c016c5' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\feeder\\feederHeader.tpl',
      1 => 1364329058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11487529f472af19e18-26966909',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f472b03b857_48868165',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f472b03b857_48868165')) {function content_529f472b03b857_48868165($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\wamp\\www\\a3shop\\tools\\smarty\\plugins\\modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>