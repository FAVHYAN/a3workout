<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 14:58:35
         compiled from "C:\wamp\www\a3shop\themes\default\mobile\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20663529f431b746c45-63213929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c379de2c94418cfe1abe66f594975128446d344' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\default\\mobile\\index.tpl',
      1 => 1364329058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20663529f431b746c45-63213929',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f431b76a925_52222473',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f431b76a925_52222473')) {function content_529f431b76a925_52222473($_smarty_tpl) {?>
	<div data-role="content" id="content">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"DisplayMobileIndex"),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->getSubTemplate ('./sitemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- /content -->
<?php }} ?>