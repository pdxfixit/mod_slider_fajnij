<?php
/**
 * Helper class for Fajnij Slider Module
 *
 * @package	Fajnij Slider Module
 * @subpackage	Modules
 * @link		
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license	GNU General Public License, see LICENSE.php
 * Displays Fajnij Slider 
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class modFajnijSliderHelper{
    
    function renderSlides(&$params) {
        $slides = array();
        $num_slides = 10;
        
        $img1 = $params->get('img1', '');
        $img2 = $params->get('img2', '');
        $img3 = $params->get('img3', '');
        $img4 = $params->get('img4', '');
        $img5 = $params->get('img5', '');
        $img6 = $params->get('img6', '');
        $img7 = $params->get('img7', '');
        $img8 = $params->get('img8', '');
        $img9 = $params->get('img9', '');
        $img10 = $params->get('img10', '');
        
        $thumb1 = $params->get('thumb1', '');
        $thumb2 = $params->get('thumb2', '');
        $thumb3 = $params->get('thumb3', '');
        $thumb4 = $params->get('thumb4', '');
        $thumb5 = $params->get('thumb5', '');
        $thumb6 = $params->get('thumb6', '');
        $thumb7 = $params->get('thumb7', '');
        $thumb8 = $params->get('thumb8', '');
        $thumb9 = $params->get('thumb9', '');
        $thumb10 = $params->get('thumb10', '');
        
        $full1 = $params->get('full1', '');
        $full2 = $params->get('full2', '');
        $full3 = $params->get('full3', '');
        $full4 = $params->get('full4', '');
        $full5 = $params->get('full5', '');
        $full6 = $params->get('full6', '');
        $full7 = $params->get('full7', '');
        $full8 = $params->get('full8', '');
        $full9 = $params->get('full9', '');
        $full10 = $params->get('full10', '');
        
        for($i=1;$i<=$num_slides;$i++) {
            $imageNumber = 'img' . $i;
            $thumbNumber = 'thumb' . $i;
            $fullNumber = 'full' . $i;
            $tmp_var = $$imageNumber;
            if( $tmp_var != '') {
                $slides[$i]['img'] = $$imageNumber;
                $slides[$i]['thumb'] = $$thumbNumber;
                $slides[$i]['full'] = $$fullNumber;
            }
        }
       
        return $slides;
    }

}
