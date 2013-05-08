<?php

/**
* $Id: xcgal.php,v 1.1 2007/06/05 18:31:44 marcan Exp $
* Module: SmartClone
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

function smartobject_plugin_xcgal() {
	global $xoopsConfig;

	$pluginInfo = array();
	$pluginInfo['items']['album']['caption'] = 'Album';
	$pluginInfo['items']['item']['url'] = 'thumbnails.php?album=%u';
	$pluginInfo['items']['item']['request'] = 'album';

	return $pluginInfo;
}

?>