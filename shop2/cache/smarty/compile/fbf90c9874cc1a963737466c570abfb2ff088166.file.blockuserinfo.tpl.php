<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:01
         compiled from "C:\wamp\www\a3shop\themes\leometr\modules\blockuserinfo\blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23522529f4731ba1293-13944572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbf90c9874cc1a963737466c570abfb2ff088166' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\modules\\blockuserinfo\\blockuserinfo.tpl',
      1 => 1363885059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23522529f4731ba1293-13944572',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'link' => 0,
    'cookie' => 0,
    'PS_CATALOG_MODE' => 0,
    'page_name' => 0,
    'order_process' => 0,
    'cart_qties' => 0,
    'priceDisplay' => 0,
    'blockuser_cart_flag' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f4731d1b0f7_98122583',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f4731d1b0f7_98122583')) {function content_529f4731d1b0f7_98122583($_smarty_tpl) {?>

<!-- Block user information module HEADER -->
<div id="header_user" class="pull-right">
	
	<div id="header_user_info">
		<div class="nav-item"><div class="item-top hidden-phone"><?php echo smartyTranslate(array('s'=>'Default welcome msg!','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</div></div>
		<?php if ($_smarty_tpl->tpl_vars['logged']->value){?>
			<div class="nav-item">
			<div class="item-top">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" class="account"><span><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>
</span></a></div>
			</div>
			<div class="nav-item">
			<div class="item-top">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout");?>
" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="logout"><?php echo smartyTranslate(array('s'=>'Log out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a></div>
			</div>
		<?php }else{ ?>
			<div class="nav-item"><div class="item-top"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" class="login"><?php echo smartyTranslate(array('s'=>'Log in','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a></div></div>
		<?php }?>
		<div class="nav-item" id="your_account"><div class="item-top"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a></div></div>
	</div>
</div>
<div id="topminibasket">
	<div id="header_nav">
			<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
			<div id="shopping_cart">
				<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?>
					<span id="cart_block"></span>
				<?php }?>
				  
				<a class="kenyan_coffee_rg" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink($_smarty_tpl->tpl_vars['order_process']->value,true);?>
" title="<?php echo smartyTranslate(array('s'=>'Your Shopping Cart','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shopping Cart:','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
				<span class="ajax_cart_quantity<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0){?> hidden<?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
				<span class="ajax_cart_product_txt<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value!=1){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'product','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
				<span class="ajax_cart_product_txt_s<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value<2){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'products','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
				<span class="ajax_cart_total<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0){?> hidden<?php }?>">
					<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0){?>
						<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?>
							<?php $_smarty_tpl->tpl_vars['blockuser_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['blockuser_cart_flag']->value)),$_smarty_tpl);?>

						<?php }else{ ?>
							<?php $_smarty_tpl->tpl_vars['blockuser_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['blockuser_cart_flag']->value)),$_smarty_tpl);?>

						<?php }?>
					<?php }?>
				</span>
				<span class="ajax_cart_no_product<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0){?> hidden<?php }?>"><?php echo smartyTranslate(array('s'=>'(empty)','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</span>
				
			</div>
			<?php }?>
			
		</div>
</div>		
<!-- /Block user information module HEADER -->
<?php }} ?>