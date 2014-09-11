<?php /* Smarty version Smarty-3.1.13, created on 2013-12-09 12:24:57
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blockwishlist/managewishlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114425471852a5fce9d41716-23934856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c07fa95b513cee868c0215c0d5332dd5e14bcb34' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/blockwishlist/managewishlist.tpl',
      1 => 1386264630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114425471852a5fce9d41716-23934856',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'refresh' => 0,
    'productsBoughts' => 0,
    'base_dir_ssl' => 0,
    'token_wish' => 0,
    'product' => 0,
    'id_wishlist' => 0,
    'link' => 0,
    'bought' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a5fce9e95be1_83704614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a5fce9e95be1_83704614')) {function content_52a5fce9e95be1_83704614($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/vhosts/www.a3workout.com/httpdocs/shop/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/vhosts/www.a3workout.com/httpdocs/shop/tools/smarty/plugins/modifier.date_format.php';
?>

<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
	<?php if (!$_smarty_tpl->tpl_vars['refresh']->value){?>
	<div class="wishlistLinkTop">
		<a href="#" id="hideSendWishlist" class="button_account"  onclick="WishlistVisibility('wishlistLinkTop', 'SendWishlist'); return false;"><?php echo smartyTranslate(array('s'=>'Close send this wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
		<ul class="clearfix display_list">
			<li>
				<a href="#" id="hideBoughtProducts" class="button_account"  onclick="WishlistVisibility('wlp_bought', 'BoughtProducts'); return false;"><?php echo smartyTranslate(array('s'=>'Hide products','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
				<a href="#" id="showBoughtProducts" class="button_account"  onclick="WishlistVisibility('wlp_bought', 'BoughtProducts'); return false;"><?php echo smartyTranslate(array('s'=>'Show products','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
			</li>
			<?php if (count($_smarty_tpl->tpl_vars['productsBoughts']->value)){?>
			<li>
				<a href="#" id="hideBoughtProductsInfos" class="button_account" onclick="WishlistVisibility('wlp_bought_infos', 'BoughtProductsInfos'); return false;"><?php echo smartyTranslate(array('s'=>'Hide bought product\'s info','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
				<a href="#" id="showBoughtProductsInfos" class="button_account"  onclick="WishlistVisibility('wlp_bought_infos', 'BoughtProductsInfos'); return false;"><?php echo smartyTranslate(array('s'=>'Show bought product\'s info','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
			</li>
			<?php }?>
		</ul>
		<p class="wishlisturl">Permalink : <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
modules/blockwishlist/view.php?token=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['token_wish']->value, 'htmlall', 'UTF-8');?>
" style="width:540px;" readonly="readonly" /></p>
		<p class="submit">
			<a href="#" id="showSendWishlist" class="button_account exclusive" onclick="WishlistVisibility('wl_send', 'SendWishlist'); return false;"><?php echo smartyTranslate(array('s'=>'Send this wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
		</p>
	<?php }?>
	<div class="wlp_bought">
		<ul class="clearfix wlp_bought_list">
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']++;
?>
			<li id="wlp_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
" class="clearfix address <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['index']%2){?>alternate_<?php }?>item">
				<a href="javascript:;" class="lnkdel" onclick="WishlistProductManage('wlp_bought', 'delete', '<?php echo $_smarty_tpl->tpl_vars['id_wishlist']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
', '<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
', $('#quantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
').val(), $('#priority_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
').val());" title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockwishlist'),$_smarty_tpl);?>
">&raquo; <?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
				<div class="clearfix">
					<div class="product_image">
						<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductlink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category_rewrite']);?>
" title="<?php echo smartyTranslate(array('s'=>'Product detail','mod'=>'blockwishlist'),$_smarty_tpl);?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['cover'],'medium_default');?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'htmlall', 'UTF-8');?>
" />
						</a>
					</div>
					<div class="product_infos">
						<p id="s_title" class="product_name"><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],30,'...'), 'htmlall', 'UTF-8');?>
</p>
						<span class="wishlist_product_detail">
						<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductlink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category_rewrite']);?>
" title="<?php echo smartyTranslate(array('s'=>'Product detail','mod'=>'blockwishlist'),$_smarty_tpl);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['attributes_small'], 'htmlall', 'UTF-8');?>
</a>
						<?php }?>
							<br /><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'blockwishlist'),$_smarty_tpl);?>
:<input type="text" id="quantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['quantity']);?>
" size="3"  />
							<br /><br />
							<?php echo smartyTranslate(array('s'=>'Priority','mod'=>'blockwishlist'),$_smarty_tpl);?>
: 
							<select id="priority_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
">
								<option value="0"<?php if ($_smarty_tpl->tpl_vars['product']->value['priority']==0){?> selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'High','mod'=>'blockwishlist'),$_smarty_tpl);?>
</option>
								<option value="1"<?php if ($_smarty_tpl->tpl_vars['product']->value['priority']==1){?> selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Medium','mod'=>'blockwishlist'),$_smarty_tpl);?>
</option>
								<option value="2"<?php if ($_smarty_tpl->tpl_vars['product']->value['priority']==2){?> selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Low','mod'=>'blockwishlist'),$_smarty_tpl);?>
</option>
							</select>
						</span>
					</div>
				</div>
				<div class="btn_action">
					<a href="javascript:;" class="exclusive lnksave" onclick="WishlistProductManage('wlp_bought_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
', 'update', '<?php echo $_smarty_tpl->tpl_vars['id_wishlist']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
', '<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
', $('#quantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
').val(), $('#priority_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
').val());" title="<?php echo smartyTranslate(array('s'=>'Save','mod'=>'blockwishlist'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Save','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a>
				</div>
			</li>
		<?php } ?>
		</ul>
	</div>
	<?php if (!$_smarty_tpl->tpl_vars['refresh']->value){?>
	<form method="post" class="wl_send std hidden" onsubmit="return (false);">
		<fieldset>
			<p class="required">
				<label for="email1"><?php echo smartyTranslate(array('s'=>'Email','mod'=>'blockwishlist'),$_smarty_tpl);?>
1 <sup>*</sup></label>
				<input type="text" name="email1" id="email1" />
			</p>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=11) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = (int)2;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
			<p>
				<label for="email<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
"><?php echo smartyTranslate(array('s'=>'Email','mod'=>'blockwishlist'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
</label>
				<input type="text" name="email<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" id="email<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" />
			</p>
			<?php endfor; endif; ?>
			<p class="submit">
				<input class="button" type="submit" value="<?php echo smartyTranslate(array('s'=>'Send','mod'=>'blockwishlist'),$_smarty_tpl);?>
" name="submitWishlist" onclick="WishlistSend('wl_send', '<?php echo $_smarty_tpl->tpl_vars['id_wishlist']->value;?>
', 'email');" />
			</p>
			<p class="required">
				<sup>*</sup> <?php echo smartyTranslate(array('s'=>'Required field'),$_smarty_tpl);?>

			</p>
		</fieldset>
	</form>
	<?php if (count($_smarty_tpl->tpl_vars['productsBoughts']->value)){?>
	<table class="wlp_bought_infos hidden std">
		<thead>
			<tr>
				<th class="first_item"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'blockwishlist'),$_smarty_tpl);?>
</td>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'blockwishlist'),$_smarty_tpl);?>
</td>
				<th class="item"><?php echo smartyTranslate(array('s'=>'Offered by','mod'=>'blockwishlist'),$_smarty_tpl);?>
</td>
				<th class="last_item"><?php echo smartyTranslate(array('s'=>'Date','mod'=>'blockwishlist'),$_smarty_tpl);?>
</td>
			</tr>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productsBoughts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['index']++;
?>
			<?php  $_smarty_tpl->tpl_vars['bought'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bought']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['bought']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bought']->key => $_smarty_tpl->tpl_vars['bought']->value){
$_smarty_tpl->tpl_vars['bought']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['bought']->value['quantity']>0){?>
				<tr>
					<td class="first_item">
						<span style="float:left;"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['cover'],'small');?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'htmlall', 'UTF-8');?>
" /></span>			
						<span style="float:left;">
							<?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],40,'...'), 'htmlall', 'UTF-8');?>

						<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?>
							<br /><i><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['attributes_small'], 'htmlall', 'UTF-8');?>
</i>
						<?php }?>
						</span>
					</td>
					<td class="item align_center"><?php echo intval($_smarty_tpl->tpl_vars['bought']->value['quantity']);?>
</td>
					<td class="item align_center"><?php echo $_smarty_tpl->tpl_vars['bought']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['bought']->value['lastname'];?>
</td>
					<td class="last_item align_center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['bought']->value['date_add'],"%Y-%m-%d");?>
</td>
				</tr>
			<?php }?>
			<?php } ?>
		<?php } ?>
		</tbody>
	</table>
	<?php }?>
	<?php }?>
<?php }else{ ?>
	<p class="warning"><?php echo smartyTranslate(array('s'=>'No products','mod'=>'blockwishlist'),$_smarty_tpl);?>
</p>
<?php }?><?php }} ?>