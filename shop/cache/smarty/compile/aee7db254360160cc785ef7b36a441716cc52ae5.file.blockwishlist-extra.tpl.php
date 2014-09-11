<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 14:41:22
         compiled from "C:\wamp\www\a3shop\modules\blockwishlist\blockwishlist-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12015529f8562d35815-36802759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aee7db254360160cc785ef7b36a441716cc52ae5' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\blockwishlist\\blockwishlist-extra.tpl',
      1 => 1364329058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12015529f8562d35815-36802759',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f8562d695f8_60408954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f8562d695f8_60408954')) {function content_529f8562d695f8_60408954($_smarty_tpl) {?>

<p class="buttons_bottom_block"><a href="#" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;">&raquo; <?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a></p>
<?php }} ?>