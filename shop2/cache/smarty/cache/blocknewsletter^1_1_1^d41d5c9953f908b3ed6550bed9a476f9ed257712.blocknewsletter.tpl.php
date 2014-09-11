<?php /*%%SmartyHeaderCode:9671529f4733e18a76-70516582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd41d5c9953f908b3ed6550bed9a476f9ed257712' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\modules\\blocknewsletter\\blocknewsletter.tpl',
      1 => 1359563196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9671529f4733e18a76-70516582',
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a0b8ac650dd6_92539285',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a0b8ac650dd6_92539285')) {function content_52a0b8ac650dd6_92539285($_smarty_tpl) {?>
<!-- Block Newsletter module-->
<div id="newsletter_block_left" class="block">
	<h3 class="title_block">Newsletter</h3>
	<div class="block_content">
			<form action="http://127.0.0.1/a3shop/index.php" method="post">
			<p>
				
				<input type="text" name="email" size="18" 
					value="your e-mail" 
					onfocus="javascript:if(this.value=='your e-mail')this.value='';" 
					onblur="javascript:if(this.value=='')this.value='your e-mail';" 
					class="inputNew" />
				<!--<select name="action">
					<option value="0">Subscribe</option>
					<option value="1">Unsubscribe</option>
				</select>-->
					<input type="submit" value="ok" class="button_mini" name="submitNewsletter" />
				<input type="hidden" name="action" value="0" />
			</p>
		</form>
	</div>
</div>
<!-- /Block Newsletter module-->
<?php }} ?>