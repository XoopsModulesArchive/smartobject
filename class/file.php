<?php
// defined('XOOPS_ROOT_PATH') || exit('XOOPS root path not defined');

include_once XOOPS_ROOT_PATH . '/modules/smartobject/class/basedurl.php';

/**
 * Class SmartobjectFile
 */
class SmartobjectFile extends SmartobjectBasedUrl
{
    /**
     * SmartobjectFile constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->quickInitVar('fileid', XOBJ_DTYPE_TXTBOX, true, _CO_SOBJECT_RATING_DIRNAME);
    }
}

/**
 * Class SmartobjectFileHandler
 */
class SmartobjectFileHandler extends SmartPersistableObjectHandler
{
    /**
     * SmartobjectFileHandler constructor.
     * @param object|XoopsDatabase $db
     */
    public function __construct($db)
    {
        parent::__construct($db, 'file', 'fileid', 'caption', 'desc', 'smartobject');
    }
}
