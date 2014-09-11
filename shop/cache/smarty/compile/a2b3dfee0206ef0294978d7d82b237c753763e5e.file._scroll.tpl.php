<?php /* Smarty version Smarty-3.1.13, created on 2013-12-04 10:16:03
         compiled from "C:\wamp\www\a3shop\modules\loftwitter\tmpl\default\_scroll.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8008529f4733714e40-04306294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2b3dfee0206ef0294978d7d82b237c753763e5e' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\loftwitter\\tmpl\\default\\_scroll.tpl',
      1 => 1328612234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8008529f4733714e40-04306294',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'moduleWidth' => 0,
    'moduleHeight' => 0,
    'site_url' => 0,
    'theme' => 0,
    'title' => 0,
    'prfSlide' => 0,
    'blockid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529f47337468a1_29147990',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529f47337468a1_29147990')) {function content_529f47337468a1_29147990($_smarty_tpl) {?><div class="twitter-ticker" id="twitter-ticker1" style="width:<?php echo $_smarty_tpl->tpl_vars['moduleWidth']->value;?>
; height:<?php echo $_smarty_tpl->tpl_vars['moduleHeight']->value;?>
; margin-top:10px; display: block;">
	<div class="top-bar">
		<div class="twitIcon"><img src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
/modules/loftwitter/tmpl/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/assets/images/twitter_64.png" width="64" height="64" alt="Twitter icon" /></div>
		<h2 class="tut"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
	</div>
	<div id="lof_twitter<?php echo $_smarty_tpl->tpl_vars['prfSlide']->value;?>
<?php echo $_smarty_tpl->tpl_vars['blockid']->value;?>
" class="tweet-container" style="width:300px;height:360px;"></div>
	<div id="scroll"></div>
</div><?php }} ?>