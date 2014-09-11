<?php /* Smarty version Smarty-3.1.13, created on 2013-12-09 11:58:04
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/bankwire/views/templates/hook/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151540576052a5f69c820529-70103789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f792c1fedf8b58e1337f070cb136e9bbf38682b' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/bankwire/views/templates/hook/payment.tpl',
      1 => 1386265655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151540576052a5f69c820529-70103789',
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
  'unifunc' => 'content_52a5f69c82f4e5_15564202',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a5f69c82f4e5_15564202')) {function content_52a5f69c82f4e5_15564202($_smarty_tpl) {?>

<p class="payment_module">
	<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('bankwire','payment');?>
" title="<?php echo smartyTranslate(array('s'=>'Pay by bank wire','mod'=>'bankwire'),$_smarty_tpl);?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
bankwire.jpg" alt="<?php echo smartyTranslate(array('s'=>'Pay by bank wire','mod'=>'bankwire'),$_smarty_tpl);?>
" width="86" height="49"/>
		<?php echo smartyTranslate(array('s'=>'Pay by bank wire (order process will be longer)','mod'=>'bankwire'),$_smarty_tpl);?>

	</a>
</p><?php }} ?>