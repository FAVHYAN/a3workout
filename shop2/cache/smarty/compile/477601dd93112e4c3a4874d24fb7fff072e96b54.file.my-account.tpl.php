<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 17:39:50
         compiled from "C:\wamp\www\a3shop\modules\blockwishlist\my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1250529faf36069ac0-20836629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '477601dd93112e4c3a4874d24fb7fff072e96b54' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\blockwishlist\\my-account.tpl',
      1 => 1364329058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1250529faf36069ac0-20836629',
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
  'unifunc' => 'content_529faf360db330_77236955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529faf360db330_77236955')) {function content_529faf360db330_77236955($_smarty_tpl) {?>

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