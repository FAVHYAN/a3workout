<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:33:32
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/modules/blockwishlist/blockwishlist-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163459436952a1fc5c4c9537-54114449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51e6145a92e9b1b3b1a93d9fad288eef74d4375c' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/modules/blockwishlist/blockwishlist-extra.tpl',
      1 => 1386264626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163459436952a1fc5c4c9537-54114449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fc5c4d05f6_26514287',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fc5c4d05f6_26514287')) {function content_52a1fc5c4d05f6_26514287($_smarty_tpl) {?>

<p class="buttons_bottom_block"><a href="#" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;">&raquo; <?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a></p>
<?php }} ?>