<?php
/*
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
*/

if (!defined('_PS_VERSION_'))
	exit;
	
class LeoBlockBestSellers extends Module
{
	private $_html = '';
	private $_postErrors = array();

	public function __construct()
	{
		$this->name = 'leoblockbestsellers';
		$this->tab = 'LeoTheme';
		$this->version = '1.1';
		$this->author = 'LeoTheme';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Leo Top seller block');
		$this->description = $this->l('Add a block displaying the shop\'s top sellers.');
	}

	/**
	 * @see ModuleCore::install()
	 */
	public function install()
	{
		if (!parent::install() ||
				!$this->registerHook('DisplayContentBottom') ||
				!$this->registerHook('header') ||
				!$this->registerHook('updateOrderStatus') ||
				!ProductSale::fillProductSales())
			return false;
		return true;
	}

	/**
	 * Called in administration -> module -> configure
	 */
	public function getContent()
	{
		$output = '<h2>'.$this->displayName.'</h2>';
		if (Tools::isSubmit('submitBestSellers'))
		{
			Configuration::updateValue('PS_BLOCK_LEO_BESTSELLERS_DISPLAY', (int)(Tools::getValue('always_display')));
			Configuration::updateValue('PS_BLOCK_LEO_BESTSELLERS_LIMIT', (int)(Tools::getValue('limit')));
			$output .= '<div class="conf confirm">'.$this->l('Settings updated').'</div>';
		}
		return $output.$this->displayForm();
	}

	public function displayForm()
	{
		return '
		<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post">
			<fieldset>
				<legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
				<label>'.$this->l('Always display block').'</label>
				<div class="margin-form">
					<input type="radio" name="always_display" id="display_on" value="1" '.(Tools::getValue('always_display', Configuration::get('PS_BLOCK_LEO_BESTSELLERS_DISPLAY')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="display_on"> <img src="../img/admin/enabled.gif" alt="'.$this->l('Enabled').'" title="'.$this->l('Enabled').'" /></label>
					<input type="radio" name="always_display" id="display_off" value="0" '.(!Tools::getValue('always_display', Configuration::get('PS_BLOCK_LEO_BESTSELLERS_DISPLAY')) ? 'checked="checked" ' : '').'/>
					<label class="t" for="display_off"> <img src="../img/admin/disabled.gif" alt="'.$this->l('Disabled').'" title="'.$this->l('Disabled').'" /></label>
					<p class="clear">'.$this->l('Show the block even if no product is available.').'</p>
				</div>
				<label>'.$this->l('Limit items').'</label>
				<div class="margin-form">
					<input type="text" name="limit" value="'.Configuration::get('PS_BLOCK_LEO_BESTSELLERS_LIMIT').'"/>
				</div>
				<center><input type="submit" name="submitBestSellers" value="'.$this->l('Save').'" class="button" /></center>
			</fieldset>
		</form>';
	}
	
	public function hookRightColumn($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return;

		$currency = new Currency($params['cookie']->id_currency);
		
		if (Product::getTaxCalculationMethod((int)$this->context->customer->id) == PS_TAX_EXC)
			$usetax = false;
		else
			$usetax = true;
			
		$bestsellers = ProductSale::getBestSalesLight((int)($params['cookie']->id_lang), 0, (int)Configuration::get('PS_BLOCK_LEO_BESTSELLERS_LIMIT'));
		
		if (!$bestsellers && !Configuration::get('PS_BLOCK_LEO_BESTSELLERS_DISPLAY'))
			return;
		$best_sellers = array();

		if ($bestsellers)
			foreach ($bestsellers as $bestseller)
			{
				$bestseller['price'] = Tools::displayPrice(Product::getPriceStatic((int)($bestseller['id_product']), $usetax), $currency);
				$best_sellers[] = $bestseller;
			}

		$this->smarty->assign(array(
			'best_sellers' => $best_sellers,
			'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),
			'smallSize' => Image::getSize(ImageType::getFormatedName('small'))
		));
		return $this->display(__FILE__, 'leoblockbestsellers.tpl');
	}
		
	public function hookLeftColumn($params)
	{
		return $this->hookRightColumn($params);
	}

	public function hookHeader($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return;
		$this->context->controller->addCSS(($this->_path).'leoblockbestsellers.css', 'all');
	}
	
	function hooktop($params){		
		return $this->hookHome( $params);
	}
	
	function hookfooter($params){		
		return $this->hookHome( $params);
	}
	
	function hookDisplaySlideshow($params){ 		
		return $this->hookHome( $params);
	}
	
	function hookDisplayPromoteTop($params){ 		
		return $this->hookHome( $params);
	}
	
	function hookDisplayBottom($params){ 		
		return $this->hookHome( $params);
	}
	
	function hookDisplayContentBottom($params){
		return $this->hookHome( $params);
	}
	
	function hookDisplayFootNav($params){ 		
		return $this->hookHome( $params);
	}
	
	public function hookHome($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return;
			
		$bestsellers = $this->getProducts((int)$this->context->language->id, 1, (int)Configuration::get('PS_BLOCK_LEO_BESTSELLERS_LIMIT'));
		if (!$bestsellers && !Configuration::get('PS_BLOCK_LEO_BESTSELLERS_DISPLAY'))
			return;
		$this->smarty->assign(array(
			'leo_best_sellers' => $bestsellers,
			'homeSize' => Image::getSize(ImageType::getFormatedName('home'))));
		return $this->display(__FILE__, 'leoblockbestsellers-home.tpl');
	}
	
	public function getProducts($id_lang, $p, $n, $active = true, Context $context = null)
	{
		if (!$context)
			$context = Context::getContext();
		 
		$front = true;
		if (!in_array($context->controller->controller_type, array('front', 'modulefront')))
			$front = false;
			
		if ($p < 1) $p = 1;


		if (!Validate::isBool($active))
			die (Tools::displayError());

		$id_supplier = (int)Tools::getValue('id_supplier');
		$sql = 'SELECT DISTINCT p.id_product, p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, product_attribute_shop.`id_product_attribute`, product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity, pl.`description`, pl.`description_short`, pl.`available_now`,
					pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, image_shop.`id_image`,
					il.`legend`, m.`name` AS manufacturer_name, cl.`name` AS category_default, ps.`quantity` AS sales,
					DATEDIFF(product_shop.`date_add`, DATE_SUB(NOW(),
					INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).'
						DAY)) > 0 AS new, product_shop.price AS orderprice
				FROM `'._DB_PREFIX_.'category_product` cp
				LEFT JOIN `'._DB_PREFIX_.'product` p
					ON p.`id_product` = cp.`id_product`
				'.Shop::addSqlAssociation('product', 'p').'
				LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa
				ON (p.`id_product` = pa.`id_product`)
				'.Shop::addSqlAssociation('product_attribute', 'pa', false, 'product_attribute_shop.`default_on` = 1').'
				'.Product::sqlStock('p', 'product_attribute_shop', false, $context->shop).'
				LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
					ON (product_shop.`id_category_default` = cl.`id_category`
					AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
				LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
					ON (p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').')
				LEFT JOIN `'._DB_PREFIX_.'image` i
					ON (i.`id_product` = p.`id_product`)'.
				Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il
					ON (image_shop.`id_image` = il.`id_image`
					AND il.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'manufacturer` m
					ON m.`id_manufacturer` = p.`id_manufacturer`
				
				INNER JOIN `'._DB_PREFIX_.'product_sale` ps ON (ps.`id_product` = cp.`id_product`)
				
				WHERE product_shop.`id_shop` = '.(int)$context->shop->id.'
				AND (pa.id_product_attribute IS NULL OR product_attribute_shop.id_shop='.(int)$context->shop->id.') 
				AND (i.id_image IS NULL OR image_shop.id_shop='.(int)$context->shop->id.') '
					.($active ? ' AND product_shop.`active` = 1' : '')
					.($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '')
					.($id_supplier ? ' AND p.id_supplier = '.(int)$id_supplier : '');

			$sql .= ' ORDER BY sales DESC
			LIMIT '.(((int)$p - 1) * (int)$n).','.(int)$n;

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		if (!$result)
			return array();
		
		return Product::getProductsProperties($id_lang, $result);
	}
}