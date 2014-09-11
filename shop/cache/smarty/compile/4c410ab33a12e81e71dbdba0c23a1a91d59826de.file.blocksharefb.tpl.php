<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:36:44
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blocksharefb/blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39185868952a1fd1c152e31-82955117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c410ab33a12e81e71dbdba0c23a1a91d59826de' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blocksharefb/blocksharefb.tpl',
      1 => 1386264596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39185868952a1fd1c152e31-82955117',
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
  'unifunc' => 'content_52a1fd1c15b3d8_70731120',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fd1c15b3d8_70731120')) {function content_52a1fd1c15b3d8_70731120($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="js-new-window"><?php echo smartyTranslate(array('s'=>'Share on Facebook!','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>