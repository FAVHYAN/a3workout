<?php /*%%SmartyHeaderCode:11123529f4731d43241-83022643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e653da820a637c71f1e3882bd66797287b3d411' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\themes\\leometr\\modules\\blocksearch\\blocksearch-top.tpl',
      1 => 1362420424,
      2 => 'file',
    ),
    '59e65efdb5894ddafc9300e4bf18e91a325587f1' => 
    array (
      0 => 'C:\\wamp\\www\\a3shop\\modules\\blocksearch\\blocksearch-instantsearch.tpl',
      1 => 1364329058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11123529f4731d43241-83022643',
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52a0b8ac14b163_77516441',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52a0b8ac14b163_77516441')) {function content_52a0b8ac14b163_77516441($_smarty_tpl) {?><!-- block seach mobile -->
<div class="block-search-top">
	<div class="icon-search">Search</div>
	<!-- Block search module TOP -->
	<div id="search_block_top">

		<form method="get" action="http://127.0.0.1/a3shop/index.php?controller=search" id="searchbox">
			<p>
				<label for="search_query_top"><!-- image on background --></label>
				<input type="hidden" name="controller" value="search" />
				<input type="hidden" name="orderby" value="position" />
				<input type="hidden" name="orderway" value="desc" />
				<input class="search_query" type="text" id="search_query_top" name="search_query" value="" />
				<input type="submit" name="submit_search" value="Search" class="button" />
		</p>
		</form>
	</div>
		<script type="text/javascript">
	// <![CDATA[
		$('document').ready( function() {
			$("#search_query_top")
				.autocomplete(
					'http://127.0.0.1/a3shop/index.php?controller=search', {
						minChars: 3,
						max: 10,
						width: 500,
						selectFirst: false,
						scroll: false,
						dataType: "json",
						formatItem: function(data, i, max, value, term) {
							return value;
						},
						parse: function(data) {
							var mytab = new Array();
							for (var i = 0; i < data.length; i++)
								mytab[mytab.length] = { data: data[i], value: data[i].cname + ' > ' + data[i].pname };
							return mytab;
						},
						extraParams: {
							ajaxSearch: 1,
							id_lang: 1
						}
					}
				)
				.result(function(event, data, formatted) {
					$('#search_query_top').val(data.pname);
					document.location.href = data.product_link;
				})
		});
	// ]]>
	</script>

</div>	
<!-- /Block search module TOP -->
<?php }} ?>