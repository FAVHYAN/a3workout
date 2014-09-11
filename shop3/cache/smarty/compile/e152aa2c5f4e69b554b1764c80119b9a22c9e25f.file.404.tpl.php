<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:26:33
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop3/themes/default/mobile/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1462921752a1fab9c94175-40504474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e152aa2c5f4e69b554b1764c80119b9a22c9e25f' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop3/themes/default/mobile/404.tpl',
      1 => 1364336258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1462921752a1fab9c94175-40504474',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'base_dir' => 0,
    'img_mobile_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fab9cafd61_81033496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fab9cafd61_81033496')) {function content_52a1fab9cafd61_81033496($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'page_title', null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'This page is not available'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('./page-title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	
	
	<div data-role="content" id="content">
		<div id="not_found">
			<p><?php echo smartyTranslate(array('s'=>'We\'re sorry, but the Web address you\'ve entered is no longer available.'),$_smarty_tpl);?>
</p>
			<p><?php echo smartyTranslate(array('s'=>'To find a product, please type its name in the field below.'),$_smarty_tpl);?>
</p>
			<div data-role="fieldcontain" class="input_search_404">
				<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('search');?>
" method="post" class="std">
				<input type="search" name="search_query" id="search_query" value="<?php echo smartyTranslate(array('s'=>'Search'),$_smarty_tpl);?>
" />
				</form>
			</div>
			<p>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" class="lnk_my-account_home" title="<?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
" data-ajax="false">
					<img class="" alt="<?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
" src="<?php echo $_smarty_tpl->tpl_vars['img_mobile_dir']->value;?>
icon/home.png">
					<?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>

				</a>
			</p>
		</div>
	
	</div><!-- /content -->
<?php }} ?>