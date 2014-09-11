<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:27:34
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140474383652a1faf6d6f0f2-94172517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca019770656327c94bd4912795f1da1c52023921' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/modules/feeder/feederHeader.tpl',
      1 => 1386264658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140474383652a1faf6d6f0f2-94172517',
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
  'unifunc' => 'content_52a1faf6d78ae9_88039203',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1faf6d78ae9_88039203')) {function content_52a1faf6d78ae9_88039203($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/tools/smarty/plugins/modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>