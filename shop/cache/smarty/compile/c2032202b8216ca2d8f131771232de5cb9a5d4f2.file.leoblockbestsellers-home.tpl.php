<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:27:35
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/themes/leometr/modules/leoblockbestsellers/leoblockbestsellers-home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37779788952a1faf76c7949-07204628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2032202b8216ca2d8f131771232de5cb9a5d4f2' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/themes/leometr/modules/leoblockbestsellers/leoblockbestsellers-home.tpl',
      1 => 1386266803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37779788952a1faf76c7949-07204628',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'leo_best_sellers' => 0,
    'bslimit' => 0,
    'nbLi' => 0,
    'nbItemsPerLine' => 0,
    'nbLines' => 0,
    'liHeight' => 0,
    'ulHeight' => 0,
    'bstabname' => 0,
    'mproducts' => 0,
    'bsproducts' => 0,
    'item' => 0,
    'link' => 0,
    'homeSize' => 0,
    'PS_CATALOG_MODE' => 0,
    'static_token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1faf7795330_81198235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1faf7795330_81198235')) {function content_52a1faf7795330_81198235($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/tools/smarty/plugins/function.math.php';
if (!is_callable('smarty_modifier_escape')) include '/var/www/vhosts/www.a3workout.com/httpdocs/product_shop/tools/smarty/plugins/modifier.escape.php';
?>
 <?php $_smarty_tpl->tpl_vars['bslimit'] = new Smarty_variable(4, null, 0);?>
 <?php $_smarty_tpl->tpl_vars['bstabname'] = new Smarty_variable('bestseller', null, 0);?>
<!-- MODULE Home Block best sellers -->
<div id="leo-best-sellers_block_center" class="block products_block green">
	<h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Best sellers','mod'=>'leoblockbestsellers'),$_smarty_tpl);?>
</h4>
	<?php if (isset($_smarty_tpl->tpl_vars['leo_best_sellers']->value)&&$_smarty_tpl->tpl_vars['leo_best_sellers']->value){?>
		<div class="block_content">
				<?php $_smarty_tpl->tpl_vars['liHeight'] = new Smarty_variable(320, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['nbItemsPerLine'] = new Smarty_variable(4, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['nbLi'] = new Smarty_variable($_smarty_tpl->tpl_vars['bslimit']->value, null, 0);?>
				<?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLine",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLine'=>$_smarty_tpl->tpl_vars['nbItemsPerLine']->value,'assign'=>'nbLines'),$_smarty_tpl);?>

				<?php echo smarty_function_math(array('equation'=>"nbLines*liHeight",'nbLines'=>ceil($_smarty_tpl->tpl_vars['nbLines']->value),'liHeight'=>$_smarty_tpl->tpl_vars['liHeight']->value,'assign'=>'ulHeight'),$_smarty_tpl);?>

				<div style="min-height:<?php echo $_smarty_tpl->tpl_vars['ulHeight']->value;?>
px;" class=" carousel slide" id="<?php echo $_smarty_tpl->tpl_vars['bstabname']->value;?>
" >
					 <?php if (count($_smarty_tpl->tpl_vars['leo_best_sellers']->value)>$_smarty_tpl->tpl_vars['bslimit']->value){?>	
					<a class="carousel-control left" href="#<?php echo $_smarty_tpl->tpl_vars['bstabname']->value;?>
"   data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#<?php echo $_smarty_tpl->tpl_vars['bstabname']->value;?>
"  data-slide="next">&rsaquo;</a>
					<?php }?>
					<div class="carousel-inner"><?php $_smarty_tpl->tpl_vars['mproducts'] = new Smarty_variable(array_chunk($_smarty_tpl->tpl_vars['leo_best_sellers']->value,$_smarty_tpl->tpl_vars['bslimit']->value), null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['bsproducts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bsproducts']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mproducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['bsproducts']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['bsproducts']->key => $_smarty_tpl->tpl_vars['bsproducts']->value){
$_smarty_tpl->tpl_vars['bsproducts']->_loop = true;
 $_smarty_tpl->tpl_vars['bsproducts']->index++;
 $_smarty_tpl->tpl_vars['bsproducts']->first = $_smarty_tpl->tpl_vars['bsproducts']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['mypLoop']['first'] = $_smarty_tpl->tpl_vars['bsproducts']->first;
?>
						<div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['mypLoop']['first']){?>active<?php }?>">
						<div class="row-fluid">
						
							<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bsproducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
 $_smarty_tpl->tpl_vars['item']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoopa']['total'] = $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoopa']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->index++;
 $_smarty_tpl->tpl_vars['item']->first = $_smarty_tpl->tpl_vars['item']->index === 0;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoopa']['first'] = $_smarty_tpl->tpl_vars['item']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoopa']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoopa']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
								<div style="border-bottom:0" class="p-item span3 ajax_block_product <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoopa']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoopa']['last']){?>last_item<?php }else{ ?>item<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoopa']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerLine']->value==0){?>last_item_of_line<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoopa']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerLine']->value==1){?>clear<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoopa']['iteration']>($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoopa']['total']-($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoopa']['total']%$_smarty_tpl->tpl_vars['nbItemsPerLine']->value))){?>last_line<?php }?>">
									<div class="product-container">
										<div class="center_block">
											<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['name'], 'html', 'UTF-8');?>
" class="product_image">
											<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['item']->value['link_rewrite'],$_smarty_tpl->tpl_vars['item']->value['id_image'],'home_leometr');?>
" height="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['width'];?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['item']->value['name'], 'html', 'UTF-8');?>
" />
											</a>
										</div>
										<div class="right_block">
											<h5 class="s_title_block"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['name'],32,'...'), 'htmlall', 'UTF-8');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['name'],25,'...'), 'htmlall', 'UTF-8');?>
</a></h5>
											<div class="product_desc"><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
" title="<?php echo smartyTranslate(array('s'=>'More','mod'=>'leoblockbestsellers'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['item']->value['description_short']),100,'...');?>
</a></div>
											<div>
												<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?><p class="price_container"><span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['item']->value['price']),$_smarty_tpl);?>
</span></p><?php }else{ ?><div style="height:21px;"></div><?php }?>			
												<!--add to cart-->
												<?php if ((($_smarty_tpl->tpl_vars['item']->value['quantity']>0||$_smarty_tpl->tpl_vars['item']->value['allow_oosp']))){?>
												<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_product'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cart');?>
?qty=1&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['item']->value['id_product'];?>
&amp;token=<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
&amp;add" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'leoblockbestsellers'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'leoblockbestsellers'),$_smarty_tpl);?>
</a>
												<?php }else{ ?>
												<span class="exclusive"><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'leoblockbestsellers'),$_smarty_tpl);?>
</span>
												<?php }?>
												<!--end add to cart-->			
												
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							
						</div>
						</div>	
						<?php } ?>
					</div>
				</div>
		</div>
	<?php }else{ ?>
		<p><?php echo smartyTranslate(array('s'=>'No best sellers at this time','mod'=>'leoblockbestsellers'),$_smarty_tpl);?>
</p>
	<?php }?>
</div>
<!-- /MODULE Home Block best sellers -->
<?php }} ?>