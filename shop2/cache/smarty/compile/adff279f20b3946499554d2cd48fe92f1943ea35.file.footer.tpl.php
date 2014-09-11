<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:12
         compiled from "C:\wamp\www\a3shop\themes\leometr\layout\default\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9438529f473cc54c05-33757961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adff279f20b3946499554d2cd48fe92f1943ea35' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\layout\\default\\footer.tpl',
      1 => 1363345867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9438529f473cc54c05-33757961',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_CONTENTBOTTOM' => 0,
    'page_name' => 0,
    'LAYOUT_COLUMN_SPANS' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f473cca47f4_03501808',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f473cca47f4_03501808')) {function content_529f473cca47f4_03501808($_smarty_tpl) {?>	</div>
	<!-- end div block_home -->
<?php if ($_smarty_tpl->tpl_vars['HOOK_CONTENTBOTTOM']->value&&in_array($_smarty_tpl->tpl_vars['page_name']->value,array('index'))){?>
	<div id="contentbottom">
	<?php echo $_smarty_tpl->tpl_vars['HOOK_CONTENTBOTTOM']->value;?>

	</div>
<?php }?>
</section>
<?php if (isset($_smarty_tpl->tpl_vars['LAYOUT_COLUMN_SPANS']->value[2])&&$_smarty_tpl->tpl_vars['LAYOUT_COLUMN_SPANS']->value[2]){?> 
<!-- Right -->
<section id="right_column" class="column span<?php echo $_smarty_tpl->tpl_vars['LAYOUT_COLUMN_SPANS']->value[2];?>
 sidebar">
	<?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>

</section>
<?php }?><?php }} ?>