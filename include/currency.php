<?php

/**
 *
 * Module: SmartObject
 * Author: The SmartFactory <www.smartfactory.ca>
 * Licence: GNU
 */
// defined('XOOPS_ROOT_PATH') || exit('XOOPS root path not defined');

smart_loadCommonLanguageFile();

include_once(SMARTOBJECT_ROOT_PATH . 'class/currency.php');

static $smartobjectCurrenciesObj, $smartobjectCurrenciesArray, $smartobjectDefaultCurrency;

$smartobjectCurrencyHandler = xoops_getModuleHandler('currency', 'smartobject');

if (!$smartobjectCurrenciesObj) {
    $smartobjectCurrenciesObj = $smartobjectCurrencyHandler->getCurrencies();
}
if (!$smartobjectCurrenciesArray) {
    foreach ($smartobjectCurrenciesObj as $currencyid => $currencyObj) {
        if ($currencyObj->getVar('default_currency', 'e')) {
            $smartobjectDefaultCurrency = $currencyObj;
        }
        $smartobjectCurrenciesArray[$currencyid] = $currencyObj->getCode();
    }
}
