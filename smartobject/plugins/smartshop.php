<?php

/**
* $Id: smartshop.php,v 1.1 2007/06/05 18:31:44 marcan Exp $
* Module: SmartClone
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

function smartobject_plugin_smartshop() {
	$pluginInfo = array();

	$pluginInfo['items']['item']['caption'] = 'Item';
	$pluginInfo['items']['item']['url'] = 'item.php?itemid=%u';
	$pluginInfo['items']['item']['request'] = 'itemid';

	$pluginInfo['items']['category']['caption'] = 'Category';
	$pluginInfo['items']['category']['url'] = 'category.php?categoryid=%u';
	$pluginInfo['items']['category']['request'] = 'categoryid';

	return $pluginInfo;
}

?>