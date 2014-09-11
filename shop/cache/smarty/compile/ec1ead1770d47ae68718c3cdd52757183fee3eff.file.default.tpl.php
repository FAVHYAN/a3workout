<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:35:27
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/leocamera/themes/default/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39452338052a1fccf0f7882-60606731%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec1ead1770d47ae68718c3cdd52757183fee3eff' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/modules/leocamera/themes/default/default.tpl',
      1 => 1386265307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39452338052a1fccf0f7882-60606731',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'leocamera' => 0,
    'leocamera_slides' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fccf11d928_01314658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fccf11d928_01314658')) {function content_52a1fccf11d928_01314658($_smarty_tpl) {?><div class="leocamera_container" style="width:100%;">
    <div id="leo-camera" class="camera_wrap <?php echo $_smarty_tpl->tpl_vars['leocamera']->value['theme'];?>
">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['leocamera_slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div data-thumb="<?php echo $_smarty_tpl->tpl_vars['item']->value['thumbnail'];?>
" data-src="<?php echo $_smarty_tpl->tpl_vars['item']->value['mainimage'];?>
" >
                <?php if ($_smarty_tpl->tpl_vars['item']->value['title']&&$_smarty_tpl->tpl_vars['leocamera']->value['show_desc']){?>                            
                    <div class="camera_caption fadeFromBottom" >             
                        <div class="leo_camera_title" >
                            <?php if ($_smarty_tpl->tpl_vars['leocamera']->value['show_title']){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
                            <?php }?>                            
                        </div>
						<div class="leo_camara_desc">
							<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

						</div>
                    </div>
                <?php }?>
            </div>
        <?php } ?>    
    </div>
</div><?php }} ?>