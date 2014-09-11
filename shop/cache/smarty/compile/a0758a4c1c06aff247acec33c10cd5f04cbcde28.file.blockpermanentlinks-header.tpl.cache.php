<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:27:35
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/themes/leometr/modules/blockpermanentlinks/blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62734428252a1faf786dea1-90159077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0758a4c1c06aff247acec33c10cd5f04cbcde28' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/themes/leometr/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1386266730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62734428252a1faf786dea1-90159077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'come_from' => 0,
    'meta_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1faf7888d34_31816496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1faf7888d34_31816496')) {function content_52a1faf7888d34_31816496($_smarty_tpl) {?><!-- Block permanent links module HEADER -->
<div class="blockparmanentlinks">
	<div class="nav-item">
		<div class="item-top">
		<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact-form.php',true);?>
" title="<?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a>
		</div>
	</div>
	<div class="nav-item">
		<div class="item-top">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('sitemap.php');?>
" title="<?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a>
		</div>
	</div>
	<div class="nav-item">
		<div class="item-top">
		<script type="text/javascript">writeBookmarkLink('<?php echo $_smarty_tpl->tpl_vars['come_from']->value;?>
', '<?php echo addslashes(addslashes($_smarty_tpl->tpl_vars['meta_title']->value));?>
', '<span class="hidden-phone"><?php echo smartyTranslate(array('s'=>'bookmark','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</span>');</script>
		</div>
	</div>
</div>
<!-- /Block permanent links module HEADER --><?php }} ?>