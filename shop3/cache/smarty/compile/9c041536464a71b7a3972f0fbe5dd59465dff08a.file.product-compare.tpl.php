<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:26:41
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop3/themes/default/product-compare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74977285052a1fac14a3f54-69728569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c041536464a71b7a3972f0fbe5dd59465dff08a' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop3/themes/default/product-compare.tpl',
      1 => 1364336258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74977285052a1fac14a3f54-69728569',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comparator_max_item' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fac14b8008_95005905',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fac14b8008_95005905')) {function content_52a1fac14b8008_95005905($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['comparator_max_item']->value){?>
<script type="text/javascript">
// <![CDATA[
	var min_item = '<?php echo smartyTranslate(array('s'=>'Please select at least one product','js'=>1),$_smarty_tpl);?>
';
	var max_item = "<?php echo smartyTranslate(array('s'=>'You cannot add more than %d product(s) to the product comparison','sprintf'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value,'js'=>1),$_smarty_tpl);?>
";
//]]>
</script>

	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison');?>
" onsubmit="true">
		<p>
		<input type="submit" id="bt_compare" class="button" value="<?php echo smartyTranslate(array('s'=>'Compare'),$_smarty_tpl);?>
" />
		<input type="hidden" name="compare_product_list" class="compare_product_list" value="" />
		</p>
	</form>
<?php }?>

<?php }} ?>