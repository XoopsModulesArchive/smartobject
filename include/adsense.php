<?php

/**
 *
 * Module: SmartRental
 * Author: The SmartFactory <www.smartfactory.ca>
 * Licence: GNU
 */
// defined('XOOPS_ROOT_PATH') || exit('XOOPS root path not defined');

function smart_adsense_initiate_smartytags()
{
    global $xoopsTpl, $smartobjectAdsenseHandler;
    if (is_object($xoopsTpl)) {
        foreach ($smartobjectAdsenseHandler->objects as $k => $v) {
            $xoopsTpl->assign('adsense_' . $k, $v->render());
        }
    }
}

if (!defined('SMARTOBJECT_URL')) {
    include_once(XOOPS_ROOT_PATH . '/modules/smartobject/include/common.php');
}

include_once XOOPS_ROOT_PATH . '/modules/smartobject/include/functions.php';
include_once(SMARTOBJECT_ROOT_PATH . 'class/adsense.php');

$smartobjectAdsenseHandler = xoops_getModuleHandler('adsense', 'smartobject');
$smartobjectAdsensesObj     = $smartobjectAdsenseHandler->getAdsensesByTag();
