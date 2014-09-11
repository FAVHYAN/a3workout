<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:35:26
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24589666752a1fcce88e829-22660802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f56a9366bef70183463be9ee85f0566b14d82f01' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1386265751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24589666752a1fcce88e829-22660802',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fcce8c50e2_91781322',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fcce8c50e2_91781322')) {function content_52a1fcce8c50e2_91781322($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),false);?>
';
	var favorite_products_url_remove = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),false);?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>