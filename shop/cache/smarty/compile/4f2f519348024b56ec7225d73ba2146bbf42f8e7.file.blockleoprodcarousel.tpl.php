<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:02
         compiled from "C:\wamp\www\a3shop\themes\leometr\modules\blockleoprodcarousel\blockleoprodcarousel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29797529f4732d4baa4-96444366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f2f519348024b56ec7225d73ba2146bbf42f8e7' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\modules\\blockleoprodcarousel\\blockleoprodcarousel.tpl',
      1 => 1363347212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29797529f4732d4baa4-96444366',
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
  'unifunc' => 'content_529f4732d87918_74341153',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f4732d87918_74341153')) {function content_529f4732d87918_74341153($_smarty_tpl) {?>

<!-- MODULE Block specials -->
<div id="categoriesprodtabs" class="block products_block exclusive blockleoprodcarousel span6 blue">
	<h3 class="title_block"><?php echo smartyTranslate(array('s'=>'Latest Products','mod'=>'blockleoprodcarousel'),$_smarty_tpl);?>
</h3>
	<div class="block_content">	
		<?php if (!empty($_smarty_tpl->tpl_vars['products']->value)){?>
			<?php $_smarty_tpl->tpl_vars['tabname'] = new Smarty_variable("leoproductcarousel", null, 0);?>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['product_tpl']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
		<?php }?>
	</div>
</div>
<!-- /MODULE Block specials -->
<script>
$(document).ready(function() {
    $('.carousel').each(function(){
        $(this).carousel({
            pause: true,
            interval: false
        });
    });
	 
});
</script>
 <?php }} ?>