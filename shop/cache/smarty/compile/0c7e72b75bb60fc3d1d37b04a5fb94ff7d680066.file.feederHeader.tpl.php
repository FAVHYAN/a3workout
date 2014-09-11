<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:35:26
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73893589352a1fcce8d2712-72432326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c7e72b75bb60fc3d1d37b04a5fb94ff7d680066' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/feeder/feederHeader.tpl',
      1 => 1386264658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73893589352a1fcce8d2712-72432326',
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
  'unifunc' => 'content_52a1fcce8dbbc4_67777749',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fcce8dbbc4_67777749')) {function content_52a1fcce8dbbc4_67777749($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/vhosts/www.a3workout.com/httpdocs/shop/tools/smarty/plugins/modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>