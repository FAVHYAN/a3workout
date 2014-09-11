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

if (!defined('_PS_VERSION_'))
	exit;
if( !class_exists("LeoProductsSource") ){	
	
	class LeoProductsSource extends LeoBaseSource{
		
		/**
		 * @var $name
		 */
		public $name = "ProductsSource";
		
		/**
		 * get list of Sliders Data following parameter 
		 */
		public function getData( $params ){
			global $link, $cookie;
			
			$nb = (int) $params->get( "limit", 10 );
							
			switch( $params->get( 'psmode', 'featured' ) ){
				case 'newest':
					$products = Product::getNewProducts((int)( $cookie->id_lang), 0, $nb );
					break;
				case 'special':
					$products = Product::getPricesDrop($this->context->language->id, null, $nb, true);
					break;
				case 'featured':
				default:								
					$category = new Category(Context::getContext()->shop->getCategory(), (int)Context::getContext()->language->id);
					$products = $category->getProducts(( int)Context::getContext()->language->id, 1, $nb );
					break;
			}
			
			$iwidth  = $params->get('imgwidth',960);
			$iheight = $params->get('imgheight',360);
			$twidth  = $params->get('thumbwidth',160);
			$theight = $params->get('thumbheight',90);
			
			$output = array();
			foreach( $products as $i => $product ){
				$output[] = array(
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
				
				$output[$i]['thumbnail'] = $output[$i]['image'];
				$output[$i]['mainimage'] = $output[$i]['image'];
				if( $params->get('cropthumb',1) &&   $output[$i]['image'] ){
					$output[$i]['mainimage'] = $this->renderThumb( $output[$i]['image'], $iwidth, $iheight );
					$output[$i]['thumbnail'] =  $this->renderThumb( $output[$i]['image'], $twidth, $theight );		
					
					
				}
				//	echo '<pre>'.print_r( $output, 1 ); die;
			}
			unset($products);
		//     	echo '<pre>'.print_r( $output, 1 ); die;
			return $output;
		}
		
		/**
		 * render its parameters 
		 */
		public function renderForm( $params ){
		
			$modes = array(
				'featured' => 'Featured Products',
				'special' => 'Special Products',
				'newest'  => 'Newest Product'
			);
			$html = $params->selectTag( $modes, 'Product Modes', 'psmode', $params->get('psmdole'), '',' style="width:100px"' );
		 
			return $html;
		}
		
		public function getParams(){
			return array(
				'psmdole'=>'featured',
				'psmdole'=>'featured',
				'psmdole'=>'featured',
			);
		}
		
	}
}