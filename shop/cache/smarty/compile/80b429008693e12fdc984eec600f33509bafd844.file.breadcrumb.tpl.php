<?php /* Smarty version Smarty-3.1.13, created on 2013-12-06 11:36:31
         compiled from "/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/breadcrumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64497197552a1fd0fb476e4-58962724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80b429008693e12fdc984eec600f33509bafd844' => 
    array (
      0 => '/var/www/vhosts/www.a3workout.com/httpdocs/shop/themes/leometr/breadcrumb.tpl',
      1 => 1386266040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64497197552a1fd0fb476e4-58962724',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir' => 0,
    'path' => 0,
    'category' => 0,
    'navigationPipe' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a1fd0fb7d302_70045673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a1fd0fb7d302_70045673')) {function content_52a1fd0fb7d302_70045673($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/var/www/vhosts/www.a3workout.com/httpdocs/shop/tools/smarty/plugins/modifier.escape.php';
?>

<!-- Breadcrumb -->
<?php if (isset(Smarty::$_smarty_vars['capture']['path'])){?><?php $_smarty_tpl->tpl_vars['path'] = new Smarty_variable(Smarty::$_smarty_vars['capture']['path'], null, 0);?><?php }?>
<div id="breadcrumb">
    <ul class="breadcrumb">
        <li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'return to Home'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
</a>
        <?php if (isset($_smarty_tpl->tpl_vars['path']->value)&&$_smarty_tpl->tpl_vars['path']->value){?>
            <span class="divider" <?php if (isset($_smarty_tpl->tpl_vars['category']->value)&&$_smarty_tpl->tpl_vars['category']->value->id_category==1){?>style="display:none;"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['navigationPipe']->value, 'html', 'UTF-8');?>
</span>
        <?php }?>
        </li>
        <?php if (isset($_smarty_tpl->tpl_vars['path']->value)&&$_smarty_tpl->tpl_vars['path']->value){?>
            <?php if (!strpos($_smarty_tpl->tpl_vars['path']->value,'span')){?>
                <li><?php echo $_smarty_tpl->tpl_vars['path']->value;?>
</li>
            <?php }else{ ?>
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['path']->value;?>
</li>
            <?php }?>
        <?php }?>
    </ul>
</div>
<!-- /Breadcrumb --><?php }} ?>