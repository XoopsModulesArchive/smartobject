<?php

/**
 *
 * Module: SmartRental
 * Author: The SmartFactory <www.smartfactory.ca>
 * Licence: GNU
 */
// defined('XOOPS_ROOT_PATH') || exit('XOOPS root path not defined');

function smart_customtag_initiate()
{
    global $xoopsTpl, $smartobjectCustomtagHandler;
    if (is_object($xoopsTpl)) {
        foreach ($smartobjectCustomtagHandler->objects as $k => $v) {
            $xoopsTpl->assign($k, $v->render());
        }
    }
}

if (!defined('SMARTOBJECT_URL')) {
    include_once(XOOPS_ROOT_PATH . '/modules/smartobject/include/common.php');
}

smart_loadLanguageFile('smartobject', 'customtag');

include_once XOOPS_ROOT_PATH . '/modules/smartobject/include/functions.php';
include_once(SMARTOBJECT_ROOT_PATH . 'class/customtag.php');

$smartobjectCustomtagHandler = xoops_getModuleHandler('customtag', 'smartobject');
$smartobjectCustomTagsObj     = $smartobjectCustomtagHandler->getCustomtagsByName();
