<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:35:30
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35654900852a1fcd21df335-68744057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a64fd435e00af64875060d33ef5da1c8ec39449b' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/footer.tpl',
      1 => 1386266043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35654900852a1fcd21df335-68744057',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'LEO_LAYOUT_DIRECTION' => 0,
    'HOOK_BOTTOM' => 0,
    'HOOK_FOOTER' => 0,
    'PS_ALLOW_MOBILE_DEVICE' => 0,
    'link' => 0,
    'HOOK_FOOTNAV' => 0,
    'LEO_PANELTOOL' => 0,
    'LEO_PATTERN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fcd220aff7_00165636',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fcd220aff7_00165636')) {function content_52a1fcd220aff7_00165636($_smarty_tpl) {?>

		<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./layout/".((string)$_smarty_tpl->tpl_vars['LEO_LAYOUT_DIRECTION']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div></div></section>

<!-- Footer -->
			<?php if ($_smarty_tpl->tpl_vars['HOOK_BOTTOM']->value){?>
			<section id="bottom">
				<div class="container">
					<div class="row-fluid">
						 <?php echo $_smarty_tpl->tpl_vars['HOOK_BOTTOM']->value;?>

					</div>
				</div>
			</section>
			<?php }?>
			<footer id="footer" class="omega clearfix">
				<section class="footer">
					<div class="container"><div class="row-fluid">
					<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

					<?php if ($_smarty_tpl->tpl_vars['PS_ALLOW_MOBILE_DEVICE']->value){?>
						<p class="center clearBoth hidden-desktop"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true);?>
?mobile_theme_ok"><?php echo smartyTranslate(array('s'=>'Browse the mobile site'),$_smarty_tpl);?>
</a></p>
					<?php }?>
					</div></div>
				</section>	
				<section id="footer-bottom">
					<div class="container"><div class="row-fluid">
						<div class="span6">
							<div class="copyright">
									Copyright <?php echo date('Y');?>
 Powered by PrestaShop. All Rights Reserved. 
									Design by <a href="http://www.leotheme.com" title="LeoTheme - Prestashop Themes Club">LeoTheme.Com</a>
							</div>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['HOOK_FOOTNAV']->value){?>
						<div class="span6"><div class="footnav"><?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTNAV']->value;?>
</div></div>		
						<?php }?>
					</div>	
					</div>	
				</section>
				
			</footer>
		</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['LEO_PANELTOOL']->value){?>
    	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./info/paneltool.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>
		<script type="text/javascript">		  
			$('.title_block').each(function(){
				var me = $(this);
				me.html( me.text().replace(/(^\w+|\s+\w+)/,'<span class="tcolor">$1</span>') );
			});

		</script>
		<script type="text/javascript">
			var classBody = "<?php echo $_smarty_tpl->tpl_vars['LEO_PATTERN']->value;?>
";
			$("body").addClass( classBody.replace(/\.\w+$/,"")  );
		</script>
	</body>
</html>
<?php }} ?>