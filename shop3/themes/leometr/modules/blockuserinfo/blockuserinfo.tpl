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
*  @version  Release: $Revision: 6594 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- Block user information module HEADER -->
<div id="header_user" class="pull-right">
	
	<div id="header_user_info">
		<div class="nav-item"><div class="item-top hidden-phone">{l s='Default welcome msg!' mod='blockuserinfo'}</div></div>
		{if $logged}
			<div class="nav-item">
			<div class="item-top">
				<a href="{$link->getPageLink('my-account', true)}" class="account"><span>{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a></div>
			</div>
			<div class="nav-item">
			<div class="item-top">
			<a href="{$link->getPageLink('index', true, NULL, "mylogout")}" title="{l s='Log me out' mod='blockuserinfo'}" class="logout">{l s='Log out' mod='blockuserinfo'}</a></div>
			</div>
		{else}
			<div class="nav-item"><div class="item-top"><a href="{$link->getPageLink('my-account', true)}" class="login">{l s='Log in' mod='blockuserinfo'}</a></div></div>
		{/if}
		<div class="nav-item" id="your_account"><div class="item-top"><a href="{$link->getPageLink('my-account', true)}" title="{l s='Your Account' mod='blockuserinfo'}">{l s='Your Account' mod='blockuserinfo'}</a></div></div>
	</div>
</div>
<div id="topminibasket">
	<div id="header_nav">
			{if !$PS_CATALOG_MODE}
			<div id="shopping_cart">
				{if $page_name == 'index'}
					<span id="cart_block"></span>
				{/if}
				  
				<a class="kenyan_coffee_rg" href="{$link->getPageLink($order_process, true)}" title="{l s='Your Shopping Cart' mod='blockuserinfo'}">{l s='Shopping Cart:' mod='blockuserinfo'}</a>
				<span class="ajax_cart_quantity{if $cart_qties == 0} hidden{/if}">{$cart_qties}</span>
				<span class="ajax_cart_product_txt{if $cart_qties != 1} hidden{/if}">{l s='product' mod='blockuserinfo'}</span>
				<span class="ajax_cart_product_txt_s{if $cart_qties < 2} hidden{/if}">{l s='products' mod='blockuserinfo'}</span>
				<span class="ajax_cart_total{if $cart_qties == 0} hidden{/if}">
					{if $cart_qties > 0}
						{if $priceDisplay == 1}
							{assign var='blockuser_cart_flag' value='Cart::BOTH_WITHOUT_SHIPPING'|constant}
							{convertPrice price=$cart->getOrderTotal(false, $blockuser_cart_flag)}
						{else}
							{assign var='blockuser_cart_flag' value='Cart::BOTH_WITHOUT_SHIPPING'|constant}
							{convertPrice price=$cart->getOrderTotal(true, $blockuser_cart_flag)}
						{/if}
					{/if}
				</span>
				<span class="ajax_cart_no_product{if $cart_qties > 0} hidden{/if}">{l s='(empty)' mod='blockuserinfo'}</span>
				
			</div>
			{/if}
			
		</div>
</div>		
<!-- /Block user information module HEADER -->
