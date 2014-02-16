<?php
/**
 * Fajnij Slider module Entry Point
 *
 * @package	Fajnij Slider Module
 * @subpackage	Modules
 * @link		
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license	GNU General Public License, see LICENSE.php
 * Displays Fajnij Slider 
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$page_title = htmlspecialchars($params->get('page_title',''));
$slidewidth = $params->get('slidewidth', '740');
$slideheight = $params->get('slideheight', '370');
$transition = $params->get('transition', 'fade');
$transitionSpeed = $params->get('transitionSpeed', '3000');

$slides = modFajnijSliderHelper::renderSlides($params);
require( JModuleHelper::getLayoutPath( 'mod_slider_fajnij' ) );
