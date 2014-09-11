<?php 
/**
 * Leo Slideshow Module
 * 
 * @version		$Id: file.php $Revision
 * @package		modules
 * @subpackage	$Subpackage.
 * @copyright	Copyright (C) September 2012 LeoTheme.Com <@emai:leotheme@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
 */
 
/**
 * @since 1.5.0
 * @version 1.2 (2012-03-14)
 */
if( !class_exists("CategoriesSource") ){
	/**
	 * LeoCategoriesSource Class
	 */
	class LeoCategoriesSource extends LeoBaseSource{
		
		/**
		 * @var $name
		 */
		public $name = "CategoriesSource";
		
		/**
		 *
		 */
		public function getData( $params ){
			global $link;
			$where = ' AND  1=1 ';
			if( ($tmp=$params->get('cscats','0')) ){
				$where = " AND cp.`id_category` IN (".$tmp.")";
			}

			$products = $this->getProducts( $where , 0, (int)$params->get('limit',10), $params->get( 'csorder', 'p.date_add DESC' ) );
			$iwidth  = $params->get('imgwidth',960);
			$iheight = $params->get('imgheight',360);
			$twidth  = $params->get('thumbwidth',160);
			$theight = $params->get('thumbheight',90);
			
			foreach( $products as $i => $product ){
				$output[$i] = array(
					'id_slide' => $product['id_product'],
					'image'    => $link->getImageLink($product["link_rewrite"], $product["id_image"] ),
					'title'    => $product['name'],
					'url' 	   => $product['link'],
					'oimage'   => '',
					'thumb'	   => '',
					'legend'   => '',
					'description' => $product['description_short'],
					'category' => $product['category'],
					'price'  => $product['price'],
					'price_tax_exc' => $product['price_tax_exc'],
					'attribute_price' =>$product['attribute_price'],
					'price_without_reduction'=>$product['price_without_reduction'],
					'manufacturer' =>$product['manufacturer_nam']
				);
				
				$output[$i]['thumbnail'] = $output[$i]['image'] ;
				$output[$i]['mainimage'] = $output[$i]['image'] ;
				if( $params->get('cropthumb',1) &&   $output[$i]['image'] ){
					$output[$i]['mainimage'] = $this->renderThumb( $output[$i]['image'], $iwidth, $iheight );
					$output[$i]['thumbnail'] =  $this->renderThumb( $output[$i]['image'], $twidth, $theight );		
				}			
				 
			}
			unset($products);
			return $output;
		}
			/**
        * Get data source: 
        */
    	function getProducts($where='', $limiStart=0, $limit=10, $order=''){		
    		global $cookie, $link;
        	$id_lang = intval($cookie->id_lang);
			
        	$context = Context::getContext();
			$id_country = (int)($context->country->id);
			$front = true;
			if (!in_array($context->controller->controller_type, array('front', 'modulefront')))
				$front = false;
			 
			
            $sql = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, product_attribute_shop.`id_product_attribute`, pl.`description`, pl.`description_short`, pl.`available_now`,
					pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, i.`id_image`,
					il.`legend`, m.`name` AS manufacturer_name, tl.`name` AS tax_name, t.`rate`, cl.`name` AS category_default,
					DATEDIFF(product_shop.`date_add`, DATE_SUB(NOW(),
					INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).'
						DAY)) > 0 AS new,
					(product_shop.`price` * IF(t.`rate`,((100 + (t.`rate`))/100),1)) AS orderprice
				FROM `'._DB_PREFIX_.'category_product` cp
				LEFT JOIN `'._DB_PREFIX_.'product` p ON p.`id_product` = cp.`id_product`
				'.Shop::addSqlAssociation('product', 'p').'
				LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa ON (p.`id_product` = pa.`id_product`)
				'.Shop::addSqlAssociation('product_attribute', 'pa', false, 'product_attribute_shop.`default_on` = 1').'
				'.Product::sqlStock('p', 'product_attribute_shop', false, $context->shop).'
				LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (product_shop.`id_category_default` = cl.`id_category` AND cl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('cl').')
				LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl').')
				LEFT JOIN `'._DB_PREFIX_.'image` i ON (i.`id_product` = p.`id_product` AND i.`cover` = 1)
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'tax_rule` tr ON (product_shop.`id_tax_rules_group` = tr.`id_tax_rules_group` AND tr.`id_country` = '.(int)$context->country->id.'
					AND tr.`id_state` = 0
					AND tr.`zipcode_from` = 0)
				LEFT JOIN `'._DB_PREFIX_.'tax` t ON (t.`id_tax` = tr.`id_tax`)
				LEFT JOIN `'._DB_PREFIX_.'tax_lang` tl ON (t.`id_tax` = tl.`id_tax` AND tl.`id_lang` = '.(int)$id_lang.')
				LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = p.`id_manufacturer`
				
				LEFT JOIN `'._DB_PREFIX_.'product_sale` ps ON ps.`id_product` = p.`id_product`
				LEFT JOIN `'._DB_PREFIX_.'feature_product` fp ON fp.`id_product` = p.`id_product`
				
				WHERE product_shop.`id_shop` = '.(int)$context->shop->id.'
				AND ((product_attribute_shop.id_product_attribute IS NOT NULL OR pa.id_product_attribute IS NULL) 
					OR (product_attribute_shop.id_product_attribute IS NULL AND pa.default_on=1))
					AND product_shop.`active` = 1'.$where
					.($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '').
				' ORDER BY '.$order.' LIMIT '.$limiStart.','.$limit
				
				;
	 
    		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);		
    		return Product::getProductsProperties($id_lang, $result);
    	}
        
		/**
		 * render its parameters 
		 */
		public function renderForm( $params ){
			
			$html = $params->categoryTag( 'cscats', $params->get( 'cscats',0 ), 'Categories',' multiple="multiple" size="60" style="height:100px" ' );
	 
			$data = array( 'p.date_add'	=> $params->l('Date Add'),
							  'p.date_add DESC'=>$params->l('Date Add DESC'),
							  'pl.name'		=> $params->l('Name'),
							  'pl.name DESC'=>$params->l('Name DESC'),
							  'quantity'	=> $params->l('Quantity'),'quantity DESC'=>$params->l('Quantity DESC'),
							  'p.price'		=>$params->l('Price'),'p.price DESC'=>$params->l('Price DESC'));
								
								
			$html .= $params->selectTag( $data, 'Order By:', 'csorder', $params->get('csorder','') );
			
			return $html;
		}
		
		public function getParams(){
			return array(
				'cscats'=>'0',
				'csorder'=>'p.date_add DESC'
			);
		}
		
	}
}