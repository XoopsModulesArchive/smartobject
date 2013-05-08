<?php

/**
 * Contains the SmartObjectControl class
 *
 * @license GNU
 * @author marcan <marcan@smartfactory.ca>
 * @version $Id: smartformdateelement.php,v 1.1 2007/06/05 18:31:48 marcan Exp $
 * @link http://smartfactory.ca The SmartFactory
 * @package SmartObject
 * @subpackage SmartObjectForm
 */
class SmartFormDateElement extends XoopsFormTextDateSelect {
    function SmartFormDateElement($object, $key) {
        $this->XoopsFormTextDateSelect($object->vars[$key]['form_caption'], $key, 15, $object->getVar($key, 'e'));
    }
}
?>