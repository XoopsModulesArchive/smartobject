<?php
/**
 * Loader for the SmartObject framework
 *
 * This file is responible for including some main files used by the smartobject framework.
 *
 * @license GNU
 * @author marcan <marcan@smartfactory.ca>
 * @version $Id: smartloader.php,v 1.4 2007/09/21 19:32:22 marcan Exp $
 * @link http://smartfactory.ca The SmartFactory
 * @package SmartObject
 * @subpackage SmartObjectCore
 */

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

include_once(XOOPS_ROOT_PATH . "/modules/smartobject/include/common.php");

/**
 * Include other classes used by the SmartObject
 */
include_once(SMARTOBJECT_ROOT_PATH . "class/smartobjecthandler.php");
include_once(SMARTOBJECT_ROOT_PATH . "class/smartobject.php");
include_once(SMARTOBJECT_ROOT_PATH . "class/smartobjectsregistry.php");

/**
 * Including SmartHook feature
 */

include_once(SMARTOBJECT_ROOT_PATH . "class/smarthookhandler.php");
$smarthook_handler = SmartHookHandler::getInstance();

if (!class_exists('smartmetagen')) {
	include_once(SMARTOBJECT_ROOT_PATH . "class/smartmetagen.php");
}
$smartobject_config = smart_getModuleConfig('smartobject');
?>