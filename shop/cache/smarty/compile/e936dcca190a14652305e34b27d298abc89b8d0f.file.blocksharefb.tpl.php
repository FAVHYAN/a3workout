<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 14:41:22
         compiled from "C:\wamp\www\a3shop\modules\blocksharefb\blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31945529f8562b61cb3-55690565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e936dcca190a14652305e34b27d298abc89b8d0f' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\blocksharefb\\blocksharefb.tpl',
      1 => 1364329058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31945529f8562b61cb3-55690565',
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
  'unifunc' => 'content_529f8562bfb9f2_05112088',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f8562bfb9f2_05112088')) {function content_529f8562bfb9f2_05112088($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="js-new-window"><?php echo smartyTranslate(array('s'=>'Share on Facebook!','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>