{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
 {assign var='bslimit' value=4}
 {assign var='bstabname' value='bestseller'}
<!-- MODULE Home Block best sellers -->
<div id="best-sellers_block_center" class="block products_block green">
	<h4 class="title_block">{l s='Best sellers' mod='leoblockbestsellers'}</h4>
	{if isset($leo_best_sellers) AND $leo_best_sellers}
		<div class="block_content">
				{assign var='liHeight' value=320}
				{assign var='nbItemsPerLine' value=4}
				{assign var='nbLi' value=$bslimit}
				{math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines}
				{math equation="nbLines*liHeight" nbLines=$nbLines|ceil liHeight=$liHeight assign=ulHeight}
				<div style="min-height:{$ulHeight}px;" class=" carousel slide" id="{$bstabname}" >
					 {if count($leo_best_sellers)>$bslimit}	
					<a class="carousel-control left" href="#{$bstabname}"   data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#{$bstabname}"  data-slide="next">&rsaquo;</a>
					{/if}
					<div class="carousel-inner">{$mproducts=array_chunk($leo_best_sellers,$bslimit)}
						{foreach from=$mproducts item=bsproducts name=mypLoop}
						<div class="item {if $smarty.foreach.mypLoop.first}active{/if}">
						<div class="row-fluid">
						
							{foreach from=$bsproducts item=item name=myLoopa}
								<div style="border-bottom:0" class="p-item span3 ajax_block_product {if $smarty.foreach.myLoopa.first}first_item{elseif $smarty.foreach.myLoopa.last}last_item{else}item{/if} {if $smarty.foreach.myLoopa.iteration%$nbItemsPerLine == 0}last_item_of_line{elseif $smarty.foreach.myLoopa.iteration%$nbItemsPerLine == 1}clear{/if} {if $smarty.foreach.myLoopa.iteration > ($smarty.foreach.myLoopa.total - ($smarty.foreach.myLoopa.total % $nbItemsPerLine))}last_line{/if}">
									<div class="product-container">
										<div class="center_block">
											<a href="{$item.link}" title="{$item.name|escape:html:'UTF-8'}" class="product_image">
											<img src="{$link->getImageLink($item.link_rewrite, $item.id_image, 'home_default')}" height="{$homeSize.height}" width="{$homeSize.width}" alt="{$item.name|escape:html:'UTF-8'}" />
											</a>
										</div>
										<div class="right_block">
											<h5 class="s_title_block"><a href="{$item.link}" title="{$item.name|truncate:32:'...'|escape:'htmlall':'UTF-8'}">{$item.name|truncate:25:'...'|escape:'htmlall':'UTF-8'}</a></h5>
											<div class="product_desc"><a href="{$item.link}" title="{l s='More' mod='leoblockbestsellers'}">{$item.description_short|strip_tags|truncate:100:'...'}</a></div>
											<div>
												{if !$PS_CATALOG_MODE}<p class="price_container"><span class="price">{convertPrice price=$item.price}</span></p>{else}<div style="height:21px;"></div>{/if}			
												<!--add to cart-->
												{if (($item.quantity > 0 OR $item.allow_oosp))}
												<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_{$item.id_product}" href="{$link->getPageLink('cart')}?qty=1&amp;id_product={$item.id_product}&amp;token={$static_token}&amp;add" title="{l s='Add to cart' mod='leoblockbestsellers'}">{l s='Add to cart' mod='leoblockbestsellers'}</a>
												{else}
												<span class="exclusive">{l s='Add to cart' mod='leoblockbestsellers'}</span>
												{/if}
												<!--end add to cart-->			
												
											</div>
										</div>
									</div>
								</div>
							{/foreach}
							
						</div>
						</div>	
						{/foreach}
					</div>
				</div>
		</div>
	{else}
		<p>{l s='No best sellers at this time' mod='leoblockbestsellers'}</p>
	{/if}
</div>
<!-- /MODULE Home Block best sellers -->
