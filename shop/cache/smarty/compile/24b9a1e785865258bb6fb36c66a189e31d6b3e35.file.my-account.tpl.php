<?php /* Smarty version Smarty-3.1.13, created on 2013-12-09 12:23:27
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blockwishlist/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52765329052a5fc8fb41ac7-20917368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24b9a1e785865258bb6fb36c66a189e31d6b3e35' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blockwishlist/my-account.tpl',
      1 => 1386264630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52765329052a5fc8fb41ac7-20917368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wishlist_link' => 0,
    'mobile_hook' => 0,
    'module_template_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a5fc8fb80982_28524431',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a5fc8fb80982_28524431')) {function content_52a5fc8fb80982_28524431($_smarty_tpl) {?>

<!-- MODULE WishList -->
<li class="lnk_wishlist">
	<a href="<?php echo $_smarty_tpl->tpl_vars['wishlist_link']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>
">
		<img <?php if (isset($_smarty_tpl->tpl_vars['mobile_hook']->value)){?> src="<?php echo $_smarty_tpl->tpl_vars['module_template_dir']->value;?>
img/gift.png" class="ui-li-icon ui-li-thumb" <?php }else{ ?> src="<?php echo $_smarty_tpl->tpl_vars['module_template_dir']->value;?>
img/gift.gif" class="icon"<?php }?>  alt="<?php echo smartyTranslate(array('s'=>'wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>

	</a>
</li>
<!-- END : MODULE WishList --><?php }} ?>