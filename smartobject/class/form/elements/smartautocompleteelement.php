<?php

/**
 * Contains the SmartObjectControl class
 *
 * @license GNU
 * @author marcan <marcan@smartfactory.ca>
 * @version $Id: smartautocompleteelement.php,v 1.2 2007/06/26 18:51:35 marcan Exp $
 * @link http://smartfactory.ca The SmartFactory
 * @package SmartObject
 * @subpackage SmartObjectForm
 */
class SmartAutocompleteElement extends XoopsFormText {

	var $_include_file;

    function SmartAutocompleteElement($caption, $name, $include_file, $size, $maxlength, $value="") {
		$this->_include_file = $include_file;
		$this->XoopsFormText($caption, $name, $size, $maxlength, $value);
    }

	/**
	 * Prepare HTML for output
	 *
     * @return	string  HTML
	 */
	function render(){
		$ret = "<input type='text' name='".$this->getName()."' id='".$this->getName()."' size='".$this->getSize()."' maxlength='".$this->getMaxlength()."' value='".$this->getValue()."'".$this->getExtra()." />";

		$ret .= '	<div class="smartobject_autocomplete_hint" id="smartobject_autocomplete_hint' . $this->getName() . '"></div>

	<script type="text/javascript">
		new Ajax.Autocompleter("' .$this->getName(). '","smartobject_autocomplete_hint' .$this->getName(). '","' . $this->_include_file . '?key=' . $this->getName() . '");
	</script>';

		return $ret;
	}
}
?>