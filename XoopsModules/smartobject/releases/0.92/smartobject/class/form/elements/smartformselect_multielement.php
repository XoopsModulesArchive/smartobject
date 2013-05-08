<?php

/**
 * Contains the SmartObjectControl class
 *
 * @license GNU
 * @author marcan <marcan@smartfactory.ca>
 * @version $Id: smartformselect_multielement.php,v 1.1 2007/06/05 18:31:49 marcan Exp $
 * @link http://smartfactory.ca The SmartFactory
 * @package SmartObject
 * @subpackage SmartObjectForm
 */
class SmartFormSelect_multiElement extends SmartFormSelectElement  {
    function SmartFormSelect_multiElement($object, $key) {
        $this->multiple = true;
        parent::SmartFormSelectElement($object, $key);
    }
}
?>