<?php /*%%SmartyHeaderCode:35830422352a1fccfcc9503-02570070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b782bcb86dc6ed02de8caef4a0dc94a0a1a0388' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/modules/blocknewsletter/blocknewsletter.tpl',
      1 => 1386266726,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35830422352a1fccfcc9503-02570070',
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a23fbc28a159_73818662',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a23fbc28a159_73818662')) {function content_52a23fbc28a159_73818662($_smarty_tpl) {?>
<!-- Block Newsletter module-->
<div id="newsletter_block_left" class="block">
	<h3 class="title_block">Newsletter</h3>
	<div class="block_content">
			<form action="http://www.a3workout.com/shop/index.php" method="post">
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