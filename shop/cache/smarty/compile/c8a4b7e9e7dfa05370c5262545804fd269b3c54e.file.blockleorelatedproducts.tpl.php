<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:36:44
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/modules/blockleorelatedproducts/blockleorelatedproducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171042212452a1fd1c01cbf6-32415166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8a4b7e9e7dfa05370c5262545804fd269b3c54e' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/modules/blockleorelatedproducts/blockleorelatedproducts.tpl',
      1 => 1386266706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171042212452a1fd1c01cbf6-32415166',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product_tpl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fd1c04bf39_95827042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fd1c04bf39_95827042')) {function content_52a1fd1c04bf39_95827042($_smarty_tpl) {?>

<!-- MODULE Block specials -->
<div id="relatedproducts" class="block products_block exclusive blockleorelatedproducts">
	<h3 class="title_block"><?php echo smartyTranslate(array('s'=>'Related product','mod'=>'blockleorelatedproducts'),$_smarty_tpl);?>
</h3>
	<div class="block_content">	
		<?php if (!empty($_smarty_tpl->tpl_vars['products']->value)){?>
			<?php $_smarty_tpl->tpl_vars['tabname'] = new Smarty_variable("leorelatedcarousel", null, 0);?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['product_tpl']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
		<?php }?>
	</div>
</div>
<!-- /MODULE Block specials -->
<script>
$(document).ready(function() {
    $('.blockleorelatedproducts .carousel').each(function(){
        $(this).carousel({
            pause: true,
            interval: false
        });
    });
	 
});
</script>
 <?php }} ?>