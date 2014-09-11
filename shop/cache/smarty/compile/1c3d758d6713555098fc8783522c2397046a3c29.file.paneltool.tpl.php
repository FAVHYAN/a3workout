<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:35:30
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/info/paneltool.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169131187052a1fcd22273b3-20537812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c3d758d6713555098fc8783522c2397046a3c29' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/info/paneltool.tpl',
      1 => 1386266359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169131187052a1fcd22273b3-20537812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_dir' => 0,
    'LEO_THEMEINFO' => 0,
    'skin' => 0,
    'LEO_SKIN_DEFAULT' => 0,
    'LEO_THEMENAME' => 0,
    'p' => 0,
    'LEO_PATTERN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fcd2268913_67289379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fcd2268913_67289379')) {function content_52a1fcd2268913_67289379($_smarty_tpl) {?><div class="toolpanel" id="toolspanel">
  <form action="<?php echo $_smarty_tpl->tpl_vars['content_dir']->value;?>
index.php" method="get">
    <div style="min-height: 300px;   left: 0px;" class="pn-content inactive" id="toolspanelcontent">
      <div class="pn-button open"><span>&nbsp;</span> </div>
      <div id="template_theme"> 
      	 <h5><?php echo smartyTranslate(array('s'=>"Theme skin"),$_smarty_tpl);?>
</h5>
        <select name="skin">
        <?php  $_smarty_tpl->tpl_vars['skin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['skin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LEO_THEMEINFO']->value['skins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['skin']->key => $_smarty_tpl->tpl_vars['skin']->value){
$_smarty_tpl->tpl_vars['skin']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['skin']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['LEO_SKIN_DEFAULT']->value==$_smarty_tpl->tpl_vars['skin']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['skin']->value;?>
</option>
        <?php } ?> 
        </select>
       
      </div>
     
      <?php if (isset($_smarty_tpl->tpl_vars['LEO_THEMEINFO']->value['patterns'])){?>
      <div id="pnpartterns">
        <h5>Pattern</h5>
		<input type="hidden" value="" name="bgpattern" id="bgpattern"/>
        <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LEO_THEMEINFO']->value['patterns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
        	<a style="background:url('<?php echo $_smarty_tpl->tpl_vars['content_dir']->value;?>
themes/<?php echo $_smarty_tpl->tpl_vars['LEO_THEMENAME']->value;?>
/img/patterns/<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
')" onclick="return false;" href="#" title="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['LEO_PATTERN']->value==$_smarty_tpl->tpl_vars['p']->value){?>active<?php }?>">
                </a>
        <?php } ?>
        <div class="clearfix"></div>
      </div>
      <?php }?>
      <div class="clearfix" id="bottombox">
        <input type="submit" name="usercustom" class="btn button btn-green" value="Apply" />
        <a href="<?php echo $_smarty_tpl->tpl_vars['content_dir']->value;?>
index.php?leoaction=reset" class="button btn">Reset</a></div>
      <div class="clearfix"></div>
    </div>
  </form>
</div>
<script type="text/javascript">
	$("#toolspanelcontent").animate( {"left": -($("#toolspanelcontent").width()+7)} ).addClass("inactive");
	$("#toolspanel .pn-button").click(function(){ 
		if(  $("#toolspanelcontent").hasClass("inactive")  ){ 													 
			$("#toolspanelcontent").animate( {"left": 0} ).addClass("active").removeClass("inactive");
			$(this).removeClass("open").addClass("close");
		}else {
			$("#toolspanelcontent").animate( {"left": -($("#toolspanelcontent").width()+7)} ).addClass("inactive").removeClass("active");
			$(this).removeClass("close").addClass("open");
		}
	}	);
	$("#pnpartterns a").click( function(){   
			$("#pnpartterns a").removeClass("active");
			$(this).addClass("active");
 			  document.body.className = document.body.className.replace(/pattern\w*/,"");
			  $("body").addClass( $(this).attr("id").replace(/\.\w+$/,"")  );				
			$("#bgpattern").val( $(this).attr("id").replace(/\.\w+$/,"")  );
	} );
</script><?php }} ?>