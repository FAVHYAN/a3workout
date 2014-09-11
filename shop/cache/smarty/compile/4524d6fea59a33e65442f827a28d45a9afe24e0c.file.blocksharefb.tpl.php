<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:33:32
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/modules/blocksharefb/blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8801401852a1fc5c4a1eb4-46160565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4524d6fea59a33e65442f827a28d45a9afe24e0c' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/modules/blocksharefb/blocksharefb.tpl',
      1 => 1386264596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8801401852a1fc5c4a1eb4-46160565',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_link' => 0,
    'product_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fc5c4aa6b9_97856470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fc5c4aa6b9_97856470')) {function content_52a1fc5c4aa6b9_97856470($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="js-new-window"><?php echo smartyTranslate(array('s'=>'Share on Facebook!','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>