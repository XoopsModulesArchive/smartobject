<?php

// defined('XOOPS_ROOT_PATH') || exit('XOOPS root path not defined');

include_once XOOPS_ROOT_PATH . '/class/tree.php';

/**
 * Class smartobjecttree
 */
class SmartObjectTree extends XoopsObjectTree
{
    public function _initialize()
    {
        foreach (array_keys($this->_objects) as $i) {
            $key1                          = $this->_objects[$i]->getVar($this->_myId);
            $this->_tree[$key1]['obj']     = $this->_objects[$i];
            $key2                          = $this->_objects[$i]->getVar($this->_parentId, 'e');
            $this->_tree[$key1]['parent']  = $key2;
            $this->_tree[$key2]['child'][] = $key1;
            if (isset($this->_rootId)) {
                $this->_tree[$key1]['root'] = $this->_objects[$i]->getVar($this->_rootId);
            }
        }
    }
}
