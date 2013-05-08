<?php

/**
 * Contains the SmartObjectControl class
 *
 * @license GNU
 * @author marcan <marcan@smartfactory.ca>
 * @version $Id: smartformimageelement.php,v 1.1 2007/06/05 18:31:49 marcan Exp $
 * @link http://smartfactory.ca The SmartFactory
 * @package SmartObject
 * @subpackage SmartObjectForm
 */
class SmartFormImageElement extends XoopsFormElementTray {
    function SmartFormImageElement($object, $key) {
        $var = $object->vars[$key];
        $object_imageurl = $object->getImageDir();
        $object_imagepath = $object->getImageDir(true);
        $image_array = XoopsLists::getImgListAsArray($object_imagepath);
        $image_select = new XoopsFormSelect( '', 'image', $object->getVar($key));
        $image_select->addOption ('-1', '---------------');
        $image_select->addOptionArray( $image_array );
        $imagedir = str_replace(XOOPS_URL . "/", '', $object_imageurl);
        $image_select->setExtra( "onchange='showImgSelected(\"image_selector_" . $key . "\", \"" . $key . "\", \"" . $imagedir . "\", \"\", \"" . XOOPS_URL . "\")'" );
        $this->XoopsFormElementTray( $var['form_caption'], '&nbsp;' );
        $this->addElement( $image_select );
        $this->addElement( new XoopsFormLabel( '', "<br /><br /><img src='" . $object_imageurl . $object->getVar($key) . "' name='image_selector_" . $key . "' id='image_selector_" . $key . "' alt='' />" ) );

        $this->addElement( new XoopsFormLabel( '', '<div style="padding-top: 3px; padding-bottom: 2px; padding-left: 2px;">' . _CO_SOBJECT_UPLOAD_IMAGE . '</div>' ));

        include_once SMARTOBJECT_ROOT_PATH."class/form/elements/smartformimageuploadelement.php";
        $this->addElement(new SmartFormImageUploadElement($object, $key));
    }
}
?>