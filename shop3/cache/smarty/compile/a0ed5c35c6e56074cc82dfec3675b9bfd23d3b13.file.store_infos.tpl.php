<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:26:36
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop3/themes/default/store_infos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189331209352a1fabc6e8e40-03163721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0ed5c35c6e56074cc82dfec3675b9bfd23d3b13' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop3/themes/default/store_infos.tpl',
      1 => 1364336258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189331209352a1fabc6e8e40-03163721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'days_datas' => 0,
    'one_day' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fabc6f9554_64627490',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fabc6f9554_64627490')) {function content_52a1fabc6f9554_64627490($_smarty_tpl) {?>

<br />
<br />
<span id="store_hours"><?php echo smartyTranslate(array('s'=>'working hours'),$_smarty_tpl);?>
</span>
<table style="font-size: 9px;">
	<?php  $_smarty_tpl->tpl_vars['one_day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['one_day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days_datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['one_day']->key => $_smarty_tpl->tpl_vars['one_day']->value){
$_smarty_tpl->tpl_vars['one_day']->_loop = true;
?>
	<tr>
		<td style="width: 70px;"><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['one_day']->value['day']),$_smarty_tpl);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['one_day']->value['hours'];?>
</td>
	</tr>
	<?php } ?>
</table>
<?php }} ?>