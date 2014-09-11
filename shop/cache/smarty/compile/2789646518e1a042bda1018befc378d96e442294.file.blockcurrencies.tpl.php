<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:27:35
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/themes/leometr/modules/blockcurrencies/blockcurrencies.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55900059652a1faf7841b84-03893277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2789646518e1a042bda1018befc378d96e442294' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/themes/leometr/modules/blockcurrencies/blockcurrencies.tpl',
      1 => 1386266695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55900059652a1faf7841b84-03893277',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'request_uri' => 0,
    'blockcurrencies_name' => 0,
    'blockcurrencies_sign' => 0,
    'currencies' => 0,
    'cookie' => 0,
    'f_currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1faf786aa44_70355015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1faf786aa44_70355015')) {function content_52a1faf786aa44_70355015($_smarty_tpl) {?>

<!-- Block currencies module -->
<script type="text/javascript">
$(document).ready(function () {
	$("#setCurrency").mouseover(function(){
		$(this).addClass("countries_hover");
		$(".currencies_ul").addClass("currencies_ul_hover");
	});
	$("#setCurrency").mouseout(function(){
		$(this).removeClass("countries_hover");
		$(".currencies_ul").removeClass("currencies_ul_hover");
	});

	$('ul#first-currencies li:not(.selected)').css('opacity', 0.3);
	$('ul#first-currencies li:not(.selected)').hover(function(){
		$(this).css('opacity', 1);
	}, function(){
		$(this).css('opacity', 0.3);
	});
});
</script>

<div id="currencies_block_top" class="nav-item">
	<form id="setCurrency" action="<?php echo $_smarty_tpl->tpl_vars['request_uri']->value;?>
" method="post">
		<div class="item-top">
			<input type="hidden" name="id_currency" id="id_currency" value=""/>
			<input type="hidden" name="SubmitCurrency" value="" />
			<span>
				<?php if (isset($_smarty_tpl->tpl_vars['blockcurrencies_name']->value)){?>
					<?php echo $_smarty_tpl->tpl_vars['blockcurrencies_name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['blockcurrencies_sign']->value;?>

				<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['blockcurrencies_sign']->value;?>

				<?php }?>
			</span>
		</div>
		<div class="nav-item-content hide">
			<ul id="first-currencies" class="currencies_ul">
				<?php  $_smarty_tpl->tpl_vars['f_currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f_currency']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f_currency']->key => $_smarty_tpl->tpl_vars['f_currency']->value){
$_smarty_tpl->tpl_vars['f_currency']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['f_currency']->key;
?>
					<li <?php if ($_smarty_tpl->tpl_vars['cookie']->value->id_currency==$_smarty_tpl->tpl_vars['f_currency']->value['id_currency']){?>class="selected"<?php }?>>
						<a href="javascript:setCurrency(<?php echo $_smarty_tpl->tpl_vars['f_currency']->value['id_currency'];?>
);" title="<?php echo $_smarty_tpl->tpl_vars['f_currency']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['f_currency']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['f_currency']->value['sign'];?>
</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</form>
</div>
<!-- /Block currencies module -->
<?php }} ?>