<?php
// $Id: menu.php,v 1.3 2012/03/31 10:55:09 ohwada Exp $

// 2008-10-01 K.OHWADA
// BUG : undefined constant _AM_SOBJECT_ABOUT SMARTOBJECT_URL in "Modules Administration"
// http://community.impresscms.org/modules/newbb/viewtopic.php?topic_id=2506&post_id=23622
// for Xoops Cube Legacy
// http://community.impresscms.org/modules/newbb/viewtopic.php?topic_id=2509&post_id=23627

/**
* Id: menu.php 2341 2008-05-21 16:34:21Z malanciault 
* Module: SmartObject
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

$i = -1;

$i++;
$adminmenu[$i]['title'] = _MI_SOBJECT_INDEX;
$adminmenu[$i]['link'] = "admin/index.php";

$i++;
$adminmenu[$i]['title'] = _MI_SOBJECT_SENT_LINKS;
$adminmenu[$i]['link'] = "admin/link.php";

$i++;
$adminmenu[$i]['title'] = _MI_SOBJECT_TAGS;
$adminmenu[$i]['link'] = "admin/customtag.php";

$i++;
$adminmenu[$i]['title'] = _MI_SOBJECT_ADSENSES;
$adminmenu[$i]['link'] = "admin/adsense.php";

$i++;
$adminmenu[$i]['title'] = _MI_SOBJECT_RATINGS;
$adminmenu[$i]['link'] = "admin/rating.php";

if (!defined('SMARTOBJECT_ROOT_PATH')) {
	include_once XOOPS_ROOT_PATH . '/modules/smartobject/include/functions.php';
}

$smartobject_config = smart_getModuleConfig('smartobject');

if (isset($smartobject_config['enable_currencyman']) && $smartobject_config['enable_currencyman'] == true) {
	$i++;
	$adminmenu[$i]['title'] = _MI_SOBJECT_CURRENCIES;
	$adminmenu[$i]['link'] = "admin/currency.php";
}

global $xoopsModule;
if (isset($xoopsModule)) { 
	$i = -1;
	
	$i++;
	$headermenu[$i]['title'] = _PREFERENCES;

// --- for XCL ---	
//	$headermenu[$i]['link'] = '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid');
	$mid = $xoopsModule->getVar('mid') ;
	if ( defined( 'XOOPS_CUBE_LEGACY' ) ) {
		$link_pref = XOOPS_URL.'/modules/legacy/admin/index.php?action=PreferenceEdit&confmod_id='.$mid; 
	} else {
		$link_pref = XOOPS_URL.'/modules/system/admin.php?fct=preferences&op=showmod&mod='.$mid ;
	}
	$headermenu[$i]['link'] = $link_pref ;
// -----

	$i++;
	$headermenu[$i]['title'] = _CO_SOBJECT_UPDATE_MODULE;
	$headermenu[$i]['link'] = XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule->getVar('dirname');

// --- for XCL ---	
//	$headermenu[$i]['link'] = XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule->getVar('dirname');
	$dirname = $xoopsModule->getVar('dirname') ;
	if ( defined( 'XOOPS_CUBE_LEGACY' ) ) {
		$link_module = XOOPS_URL.'/modules/legacy/admin/index.php?action=ModuleUpdate&dirname='.$dirname;
	} else {
		$link_module = XOOPS_URL.'/modules/system/admin.php?fct=modulesadmin&op=update&module='.$dirname;
	}
	$headermenu[$i]['link'] = $link_module ;
// -----

	$i++;

// -----
// BUG : undefined constant _AM_SOBJECT_ABOUT SMARTOBJECT_URL in "Modules Administration"
//	$headermenu[$i]['title'] = _AM_SOBJECT_ABOUT;
//	$headermenu[$i]['link'] = SMARTOBJECT_URL . "admin/about.php";
	$headermenu[$i]['title'] = _MI_SOBJECT_ABOUT;
	$headermenu[$i]['link'] = XOOPS_URL . "/modules/smartobject/admin/about.php";
// -----

}
?>