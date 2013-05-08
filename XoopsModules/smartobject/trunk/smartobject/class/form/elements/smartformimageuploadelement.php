<?php

/**
 * Contains the SmartObjectControl class
 *
 * @license GNU
 * @author marcan <marcan@smartfactory.ca>
 * @version $Id: smartformimageuploadelement.php,v 1.1 2007/06/05 18:31:49 marcan Exp $
 * @link http://smartfactory.ca The SmartFactory
 * @package SmartObject
 * @subpackage SmartObjectForm
 */
include_once SMARTOBJECT_ROOT_PATH."class/form/elements/smartformfileelement.php";
class SmartFormImageUploadElement extends SmartFormFileElement {
    function SmartFormImageUploadElement($object, $key) {
        $this->SmartFormFileElement($object, $key);
        // Override name for upload purposes
        $this->setName('upload_'.$key);
    }
/**
	 * prepare HTML for output
	 *
	 * @return	string	HTML
	 */
    function render(){
        return "<input type='hidden' name='MAX_FILE_SIZE' value='".$this->getMaxFileSize()."' />
        <input type='file' name='".$this->getName()."' id='".$this->getName()."'".$this->getExtra()." />
        <input type='hidden' name='smart_upload_image[]' id='smart_upload_image[]' value='".$this->getName()."' />";
    }
}
?>