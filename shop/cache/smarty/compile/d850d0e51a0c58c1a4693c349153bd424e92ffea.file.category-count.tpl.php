<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:18:27
         compiled from "C:\wamp\www\a3shop\themes\leometr\category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13643529f47c3ea64c8-11523309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd850d0e51a0c58c1a4693c349153bd424e92ffea' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\category-count.tpl',
      1 => 1356448004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13643529f47c3ea64c8-11523309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f47c3f0a842_87082209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f47c3f0a842_87082209')) {function content_529f47c3f0a842_87082209($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->id==1||$_smarty_tpl->tpl_vars['nb_products']->value==0){?>
	<?php echo smartyTranslate(array('s'=>'There are no products.'),$_smarty_tpl);?>

<?php }else{ ?>
	<?php if ($_smarty_tpl->tpl_vars['nb_products']->value==1){?>
		<?php echo smartyTranslate(array('s'=>'There is %d product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }?>
<?php }?><?php }} ?>