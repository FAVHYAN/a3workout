<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:36:44
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blockwishlist/blockwishlist-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97148177652a1fd1c1790d3-41498624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8b60d4535d1452d9de6eb71d3e175a592c1cd68' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blockwishlist/blockwishlist-extra.tpl',
      1 => 1386264626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97148177652a1fd1c1790d3-41498624',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fd1c180178_21380562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fd1c180178_21380562')) {function content_52a1fd1c180178_21380562($_smarty_tpl) {?>

<p class="buttons_bottom_block"><a href="#" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;">&raquo; <?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a></p>
<?php }} ?>