<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:01
         compiled from "C:\wamp\www\a3shop\themes\leometr\modules\blockpermanentlinks\blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23725529f4731b27761-28090957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5faefa594e596432817d4ab7870ac38bd16e09ce' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\modules\\blockpermanentlinks\\blockpermanentlinks-header.tpl',
      1 => 1362410272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23725529f4731b27761-28090957',
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
  'unifunc' => 'content_529f4731b7c820_63343412',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f4731b7c820_63343412')) {function content_529f4731b7c820_63343412($_smarty_tpl) {?><!-- Block permanent links module HEADER -->
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