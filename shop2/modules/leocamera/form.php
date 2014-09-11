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
		
		$this->_html .= '<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post">';
		/* Save */
		$this->_html .= '
		<div class="margin-form">
			<input type="submit" class="button" name="submitSlider" value="'.$this->l('Save').'" />
		</div>';
		$this->_html .= '
				<fieldset><legend><img src="'._PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name.'/logo.gif" alt="" /> '.$this->l('General configuration').'</legend>';
				
		
		$this->_html .= $this->getParams()->getThemesTag( $this->getParams()->get('theme') );		
		$this->_html .= $params->inputTag( 'Module Class:', 'modclass', $this->getParams()->get('modclass'), 'px',' size="50" ' );	
		/*
		$this->_html .= $params->inputTag( 'Module Width:', 'modwidth', $this->getParams()->get('modwidth'), 'px',' size="50" ' );	
		$this->_html .= $params->inputTag( 'Module Height:', 'modheight', $this->getParams()->get('modheight'), 'px',' size="50" ' );	
		*/
		$this->_html .= $params->statusTag( 'Cropping Thumbnail:', 'cropthumb', $this->getParams()->get('cropthumb',1), 'cropthumb' );
		$this->_html .= $params->inputTag( 'Slider Image Width:', 'imgwidth', $this->getParams()->get('imgwidth'), 'px',' size="50" ' );	
		$this->_html .= $params->inputTag( 'Slider Image Height:', 'imgheight', $this->getParams()->get('imgheight'), 'px',' size="50" ' );	

		$this->_html .= $params->inputTag( 'Thumbnail Width:', 'thumbwidth', $this->getParams()->get('thumbwidth'), 'px',' size="50" ' );	
		$this->_html .= $params->inputTag( 'Thumbnail Height:', 'thumbheight', $this->getParams()->get('thumbheight'), 'px',' size="50" ' );	
		
		$this->_html .= $params->statusTag( 'Show Title', 'show_title', $this->getParams()->get('show_title',1), 'show_title' );
		$this->_html .= $params->statusTag( 'Show Description', 'show_desc', $this->getParams()->get('show_desc',1), 'show_desc' );
		$this->_html .= '</fieldset>';
		
		// source configuration
		$this->_html .= '<br><br><fieldset class="clearfix"><legend><img src="'._PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name.'/logo.gif" alt="" /> '.$this->l('Data Source Configuration').'</legend>';
		$this->_html .= $this->getParams()->getSourceDataTag( $this->getParams()->get('source') );	
		
		
		
		$this->_html .= $params->inputTag( 'Limit Items:', 'limit', $this->getParams()->get('limit',6), '<p>'.$this->l('Enter Limit Items be feched').'</p>' );	
		$this->_html .= '</fieldset>';	


	/* Begin fieldset slides */
		$this->_html .= '<br><br>
		<fieldset class="source-group sourceimages">
			<legend><img src="'._PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name.'/logo.gif" alt="" /> '.$this->l('Slides configuration').'</legend>
			<strong>
				<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&addSlide">
					<img src="'._PS_ADMIN_IMG_.'add.gif" alt="" /> '.$this->l('Add Slide').'
				</a>
			</strong>';

		/* Display notice if there are no slides yet */
		if (!$slides)
			$this->_html .= '<p style="margin-left: 40px;">'.$this->l('You have not added any slides yet.').'</p>';
		else /* Display slides */
		{
			$this->_html .= '
			<div id="slidesContent" style="width: 400px; margin-top: 30px;">
				<ul id="slides">';

			foreach ($slides as $slide)
			{
				$this->_html .= '
					<li id="slides_'.$slide['id_slide'].'">
						<strong>#'.$slide['id_slide'].'</strong> '.$slide['title'].'
						<p style="float: right">'.
							$this->displayStatus($slide['id_slide'], $slide['active']).'
							<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&id_slide='.(int)($slide['id_slide']).'" title="'.$this->l('Edit').'"><img src="'._PS_ADMIN_IMG_.'edit.gif" alt="" /></a>
							<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&delete_id_slide='.(int)($slide['id_slide']).'" title="'.$this->l('Delete').'"><img src="'._PS_ADMIN_IMG_.'delete.gif" alt="" /></a>
						</p>
					</li>';
			}
			$this->_html .= '</ul></div>';
		}
		// End fieldset
		$this->_html .= '</fieldset>';
		

		
		/* Begin fieldset slider */
		$this->_html .= '<br><br><fieldset><legend><img src="'._PS_BASE_URL_.__PS_BASE_URI__.'modules/'.$this->name.'/logo.gif" alt="" /> '.$this->l('Slide configuration').'</legend>';
		/* Begin form */
		
		/* Height field */
		$align = array('topLeft'=> $this->l("Top Left"),'topCenter'=>$this->l("Top Center"),'topRight'=>$this->l("Top Right"),'centerLeft'=>$this->l("Top Left")
			, 'center' => $this->l('Center'), 'centerRight' => $this->l('Center Right'), 'bottomCenter' => $this->l('Bottom Center'), 'bottomRight' => $this->l('Bottom Right'));
		$this->_html .= $params->selectTag( $align, $this->l('Alignment:'), 'alignment', $this->getParams()->get('alignment','center'));
		/* Width field */
		$this->_html .= $params->statusTag( $this->l('Auto Advance:'), 'autoAdvance', $this->getParams()->get('autoAdvance',1), '' );
		$barDirection = array('leftToRight'=> $this->l("Left To Right"),'rightToLeft'=>$this->l("Right To Left"),'topToBottom'=>$this->l("Top To Bottom"),'bottomToTop'=>$this->l("Bottom To Top"));
		$this->_html .= $params->selectTag( $barDirection, $this->l('Bar Direction:'), 'barDirection', $this->getParams()->get('barDirection','leftToRight'));
		$barDirection = array('bottom'=> $this->l("Bottom"),'left'=>$this->l("Left"),'top'=>$this->l("Top"),'right'=>$this->l("Right"));
		$this->_html .= $params->selectTag( $barDirection, $this->l('Bar Position:'), 'barPosition', $this->getParams()->get('barPosition','bottom'));
		$this->_html .= $params->inputTag( $this->l('Columns:'), 'cols', $this->getParams()->get('cols',6));
		
		$easing = array('easeInOutExpo'=> $this->l("easeInOutExpo"),'easeInQuad'=>$this->l("easeInQuad"),'easeOutQuad'=>$this->l("easeOutQuad")
			,'easeInOutQuad'=>$this->l("easeInOutQuad"),'easeInCubic'=>$this->l("easeInCubic"),'easeOutCubic'=>$this->l("easeOutCubic"),'easeInOutCubic'=>$this->l("easeInOutCubic")
			,'easeInQuart'=>$this->l("easeInQuart"),'easeOutQuart'=>$this->l("easeOutQuart"),'easeInOutQuart'=>$this->l("easeInOutQuart"),'easeInQuint'=>$this->l("easeInQuint")
			,'easeOutQuint'=>$this->l("easeOutQuint"),'easeInOutQuint'=>$this->l("easeInOutQuint"),'easeInSine'=>$this->l("easeInSine"),'easeOutSine'=>$this->l("easeOutSine")
			,'easeInOutSine'=>$this->l("easeInOutSine"),'easeInExpo'=>$this->l("easeInExpo"),'easeOutExpo'=>$this->l("easeOutExpo"),'easeInCirc'=>$this->l("easeInCirc")
			,'easeOutCirc'=>$this->l("easeOutCirc"),'easeInOutCirc'=>$this->l("easeInOutCirc"),'easeInElastic'=>$this->l("easeInElastic"),'easeOutElastic'=>$this->l("easeOutElastic")
			,'easeInOutElastic'=>$this->l("easeInOutElastic"),'easeInBack'=>$this->l("easeInBack"),'easeOutBack'=>$this->l("easeOutBack"),'easeInOutBack'=>$this->l("easeInOutBack")
			,'easeInBounce'=>$this->l("easeInBounce"),'easeOutBounce'=>$this->l("easeOutBounce"),'easeInOutBounce'=>$this->l("easeInOutBounce")
		
		);
		$this->_html .= $params->selectTag( $easing, $this->l('Easing:'), 'easing', $this->getParams()->get('easing','easeInOutExpo'));
		$fx = array('random'=> $this->l("random"),'simpleFade'=>$this->l("simpleFade"),'curtainTopLeft'=>$this->l("curtainTopLeft"),'curtainTopRight'=>$this->l("curtainTopRight")
		,'curtainBottomLeft'=>$this->l("curtainBottomLeft"),'curtainBottomRight'=>$this->l("curtainBottomRight"),'curtainSliceLeft'=>$this->l("curtainSliceLeft"),'curtainSliceRight'=>$this->l("curtainSliceRight")
		,'blindCurtainTopLeft'=>$this->l("blindCurtainTopLeft"),'blindCurtainTopRight'=>$this->l("blindCurtainTopRight"),'blindCurtainBottomLeft'=>$this->l("blindCurtainBottomLeft")
		,'blindCurtainBottomRight'=>$this->l("blindCurtainBottomRight"),'blindCurtainSliceBottom'=>$this->l("blindCurtainSliceBottom"),'blindCurtainSliceTop'=>$this->l("blindCurtainSliceTop"),'stampede'=>$this->l("stampede")
		,'mosaic'=>$this->l("mosaic"),'mosaicReverse'=>$this->l("mosaicReverse"),'mosaicRandom'=>$this->l("mosaicRandom"),'mosaicSpiral'=>$this->l("mosaicSpiral"),'mosaicSpiralReverse'=>$this->l("mosaicSpiralReverse"),'topLeftBottomRight'=>$this->l("topLeftBottomRight")
		,'bottomRightTopLeft'=>$this->l("bottomRightTopLeft"),'bottomLeftTopRight'=>$this->l("bottomLeftTopRight"));
		$this->_html .= $params->selectTag( $fx, $this->l('FX:'), 'fx', $this->getParams()->get('fx','random'));
		$this->_html .= $params->statusTag( $this->l('Pause on hover:'), 'hover', $this->getParams()->get('hover',1), '' );
		
		$leoloader = array('pie'=> $this->l("Like a pie"), 'bar'=> $this->l("Like a bar"), 'none'=> $this->l("None"));
		$this->_html .= $params->selectTag( $leoloader, $this->l('Loader:'), 'leoloader', $this->getParams()->get('leoloader','pie'));
		$this->_html .= $params->statusTag( $this->l('Show navigation:'), 'navigation', $this->getParams()->get('navigation',1), '' );
		$this->_html .= $params->statusTag( $this->l('Navigation on hover:'), 'navigationHover', $this->getParams()->get('navigationHover',1), '<p>'.$this->l('if "yes" the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if "no" they will be visible always').'</p>' );
		$this->_html .= $params->statusTag( $this->l('Show pagination:'), 'pagination', $this->getParams()->get('pagination',1), '' );
		$this->_html .= $params->statusTag( $this->l('Show play/Pause button:'), 'playPause', $this->getParams()->get('playPause',1), '' );
		$this->_html .= $params->statusTag( $this->l('Pause On Click:'), 'pauseOnClick', $this->getParams()->get('pauseOnClick',1), '' );
		$this->_html .= $params->statusTag( $this->l('Show thumbnails:'), 'thumbnails', $this->getParams()->get('thumbnails',1), '' );
		
		$this->_html .= $params->inputTag( 'Slide delay:', 'time', $this->getParams()->get('time',7000), $this->l('ms') );
		/* Loop field */
		$this->_html .= $params->inputTag( 'Effect duration:', 'transPeriod', $this->getParams()->get('transPeriod',1500), $this->l('ms') );
		//$this->_html .= $params->inputTag( 'Titles Factor:', 'tfactor', $this->getParams()->get('tfactor',0), '<p>//percentage of speed for the titles animation. Speed will be speed * titlesFactor</p>' );
		
		/* End form */
	
		/* End fieldset slider */
		$this->_html .= '</fieldset>';
		
		
	$this->_html .= '</form><br><br>';
	/* Save */
		$this->_html .= '
		<div class="margin-form">
			<input type="submit" class="button" name="submitSlider" value="'.$this->l('Save').'" />
		</div>';
		$this->_html .= '<br /><br />';

	
?>