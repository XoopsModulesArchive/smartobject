<?php

/**
 * Contains the SmartObjectControl class
 *
 * @license GNU
 * @author marcan <marcan@smartfactory.ca>
 * @version $Id: smartformtextelement.php,v 1.3 2007/09/19 19:18:53 marcan Exp $
 * @link http://smartfactory.ca The SmartFactory
 * @package SmartObject
 * @subpackage SmartObjectForm
 */
class SmartFormTextElement extends XoopsFormText {
    function SmartFormTextElement($object, $key) {
		$var = $object->vars[$key];

		if(isset($object->controls[$key])){
			$control = $object->controls[$key];
	        $form_maxlength = isset($control['maxlength']) ? $control['maxlength'] : (isset($var['maxlength']) ? $var['maxlength'] : 255);
			$form_size = isset($control['size']) ? $control['size'] : 50;
		}else{
			$form_maxlength =  255;
			$form_size = 50;
		}

		$this->XoopsFormText($var['form_caption'], $key, $form_size, $form_maxlength, $object->getVar($key, 'e'));
    }
}
?>