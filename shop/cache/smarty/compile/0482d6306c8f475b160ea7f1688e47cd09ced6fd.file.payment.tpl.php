<?php /* Smarty version Smarty-3.1.13, created on 2013-12-09 11:58:04
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/cheque/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2419180852a5f69c7722c3-54014068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0482d6306c8f475b160ea7f1688e47cd09ced6fd' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/cheque/views/templates/hook/payment.tpl',
      1 => 1386265737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2419180852a5f69c7722c3-54014068',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'this_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a5f69c79dc22_90040296',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a5f69c79dc22_90040296')) {function content_52a5f69c79dc22_90040296($_smarty_tpl) {?>

<p class="payment_module">
	<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('cheque','payment',array(),true);?>
" title="<?php echo smartyTranslate(array('s'=>'Pay by check.','mod'=>'cheque'),$_smarty_tpl);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
cheque.jpg" alt="<?php echo smartyTranslate(array('s'=>'Pay by check.','mod'=>'cheque'),$_smarty_tpl);?>
" width="86" height="49" />
		<?php echo smartyTranslate(array('s'=>'Pay by check (order processing will take more time).','mod'=>'cheque'),$_smarty_tpl);?>

	</a>
</p>
<?php }} ?>