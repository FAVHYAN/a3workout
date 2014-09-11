<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 14:41:22
         compiled from "C:\wamp\www\a3shop\themes\leometr\modules\blockleorelatedproducts\blockleorelatedproducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23699529f85621db183-42858476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '876ef77a314b0b9ad559db4344835d45d9bf0fd0' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\modules\\blockleorelatedproducts\\blockleorelatedproducts.tpl',
      1 => 1362046812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23699529f85621db183-42858476',
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
  'unifunc' => 'content_529f856229cc26_67912831',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f856229cc26_67912831')) {function content_529f856229cc26_67912831($_smarty_tpl) {?>

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