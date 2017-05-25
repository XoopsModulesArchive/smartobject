<?php

/**
 *
 * Module: SmartSection
 * Author: The SmartFactory <www.smartfactory.ca>
 * Licence: GNU
 */

include_once __DIR__ . '/admin_header.php';
include_once(SMARTCONTENT_ROOT_PATH . 'class/dbupdater.php');

smartcontent_xoops_cp_header();

// =========================================================================================
// This function updates any existing table of a 2.x version to the format used
// in the release of WF-Downloads 3.00
// =========================================================================================
function update_tables_to_300()
{
    $dbupdater = new WfdownloadsDbupdater();

    if (!wfdownloads_TableExists('wfdownloads_meta')) {
        // Create table wfdownloads_meta
        $table = new WfdownloadsTable('wfdownloads_meta');
        $table->setStructure("CREATE TABLE %s (
                                metakey varchar(50) NOT NULL default '',
                                metavalue varchar(255) NOT NULL default '',
                                PRIMARY KEY (metakey))
                                ENGINE=MyISAM;");

        $table->setData(sprintf("'version', %s", round($GLOBALS['xoopsModule']->getVar('version') / 100, 2)));
        if ($dbupdater->updateTable($table)) {
            echo 'wfdownloads_meta table created<br>';
        }
    }

    $download_fields = array(
        'lid'           => array('Type' => 'int(11) unsigned NOT NULL auto_increment', 'Default' => false),
        'cid'           => array('Type' => "int(5) unsigned NOT NULL default '0'", 'Default' => true),
        'title'         => array('Type' => "varchar(100) NOT NULL default ''", 'Default' => true),
        'url'           => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'filename'      => array('Type' => "varchar(150) NOT NULL default ''", 'Default' => true),
        'filetype'      => array('Type' => "varchar(100) NOT NULL default ''", 'Default' => true),
        'homepage'      => array('Type' => "varchar(100) NOT NULL default ''", 'Default' => true),
        'version'       => array('Type' => "varchar(20) NOT NULL default ''", 'Default' => true),
        'size'          => array('Type' => "int(8) NOT NULL default '0'", 'Default' => true),
        'platform'      => array('Type' => "varchar(50) NOT NULL default ''", 'Default' => true),
        'screenshot'    => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'submitter'     => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'publisher'     => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'status'        => array('Type' => "tinyint(2) NOT NULL default '0'", 'Default' => true),
        'date'          => array('Type' => "int(10) NOT NULL default '0'", 'Default' => true),
        'hits'          => array('Type' => "int(11) unsigned NOT NULL default '0'", 'Default' => true),
        'rating'        => array('Type' => "double(6,4) NOT NULL default '0.0000'", 'Default' => true),
        'votes'         => array('Type' => "int(11) unsigned NOT NULL default '0'", 'Default' => true),
        'comments'      => array('Type' => "int(11) unsigned NOT NULL default '0'", 'Default' => true),
        'license'       => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'mirror'        => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'price'         => array('Type' => "varchar(10) NOT NULL default 'Free'", 'Default' => true),
        'paypalemail'   => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'features'      => array('Type' => 'text NOT NULL', 'Default' => false),
        'requirements'  => array('Type' => 'text NOT NULL', 'Default' => false),
        'homepagetitle' => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'forumid'       => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'limitations'   => array('Type' => "varchar(255) NOT NULL default '30 day trial'", 'Default' => true),
        'dhistory'      => array('Type' => 'text NOT NULL', 'Default' => false),
        'published'     => array('Type' => "int(11) NOT NULL default '1089662528'", 'Default' => true),
        'expired'       => array('Type' => "int(10) NOT NULL default '0'", 'Default' => true),
        'updated'       => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'offline'       => array('Type' => "tinyint(1) NOT NULL default '0'", 'Default' => true),
        'description'   => array('Type' => 'text NOT NULL', 'Default' => false),
        'ipaddress'     => array('Type' => "varchar(120) NOT NULL default '0'", 'Default' => true),
        'notifypub'     => array('Type' => "int(1) NOT NULL default '0'", 'Default' => true),
        'summary'       => array('Type' => 'text NOT NULL', 'Default' => false)
    );

    $renamed_fields = array(
        'logourl' => 'screenshot'
    );

    echo '<br><b>Checking Download table</b><br>';
    $downloadHandler = xoops_getModuleHandler('download', 'wfdownloads');
    $download_table  = new WfdownloadsTable('wfdownloads_downloads');
    $fields          = get_table_info($downloadHandler->table, $download_fields);
    // Check for renamed fields
    rename_fields($download_table, $renamed_fields, $fields, $download_fields);
    update_table($download_fields, $fields, $download_table);
    if ($dbupdater->updateTable($download_table)) {
        echo 'Downloads table updated<br>';
    }
    unset($fields);

    $mod_fields = array(
        'requestid'       => array('Type' => 'int(11) NOT NULL auto_increment', 'Default' => false),
        'lid'             => array('Type' => "int(11) unsigned NOT NULL default '0'", 'Default' => true),
        'cid'             => array('Type' => "int(5) unsigned NOT NULL default '0'", 'Default' => true),
        'title'           => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'url'             => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'filename'        => array('Type' => "varchar(150) NOT NULL default ''", 'Default' => true),
        'filetype'        => array('Type' => "varchar(100) NOT NULL default ''", 'Default' => true),
        'homepage'        => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'version'         => array('Type' => "varchar(20) NOT NULL default ''", 'Default' => true),
        'size'            => array('Type' => "int(8) NOT NULL default '0'", 'Default' => true),
        'platform'        => array('Type' => "varchar(50) NOT NULL default ''", 'Default' => true),
        'screenshot'      => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'submitter'       => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'publisher'       => array('Type' => 'text NOT NULL', 'Default' => false),
        'status'          => array('Type' => "tinyint(2) NOT NULL default '0'", 'Default' => true),
        'date'            => array('Type' => "int(10) NOT NULL default '0'", 'Default' => true),
        'hits'            => array('Type' => "int(11) unsigned NOT NULL default '0'", 'Default' => true),
        'rating'          => array('Type' => "double(6,4) NOT NULL default '0.0000'", 'Default' => true),
        'votes'           => array('Type' => "int(11) unsigned NOT NULL default '0'", 'Default' => true),
        'comments'        => array('Type' => "int(11) unsigned NOT NULL default '0'", 'Default' => true),
        'license'         => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'mirror'          => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'price'           => array('Type' => "varchar(10) NOT NULL default 'Free'", 'Default' => true),
        'paypalemail'     => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'features'        => array('Type' => 'text NOT NULL', 'Default' => false),
        'requirements'    => array('Type' => 'text NOT NULL', 'Default' => false),
        'homepagetitle'   => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'forumid'         => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'limitations'     => array('Type' => "varchar(255) NOT NULL default '30 day trial'", 'Default' => true),
        'dhistory'        => array('Type' => 'text NOT NULL', 'Default' => false),
        'published'       => array('Type' => "int(10) NOT NULL default '0'", 'Default' => true),
        'expired'         => array('Type' => "int(10) NOT NULL default '0'", 'Default' => true),
        'updated'         => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'offline'         => array('Type' => "tinyint(1) NOT NULL default '0'", 'Default' => true),
        'summary'         => array('Type' => 'text NOT NULL', 'Default' => false),
        'description'     => array('Type' => 'text NOT NULL', 'Default' => false),
        'modifysubmitter' => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'requestdate'     => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true)
    );

    $renamed_fields = array(
        'logourl' => 'screenshot'
    );

    echo '<br><b>Checking Modified Downloads table</b><br>';
    $modHandler = xoops_getModuleHandler('modification', 'wfdownloads');
    $mod_table  = new WfdownloadsTable('wfdownloads_mod');
    $fields     = get_table_info($modHandler->table, $mod_fields);
    rename_fields($mod_table, $renamed_fields, $fields, $mod_fields);
    update_table($mod_fields, $fields, $mod_table);
    if ($dbupdater->updateTable($mod_table)) {
        echo 'Modified Downloads table updated <br>';
    }
    unset($fields);

    $cat_fields = array(
        'cid'          => array('Type' => 'int(5) unsigned NOT NULL auto_increment', 'Default' => false),
        'pid'          => array('Type' => "int(5) unsigned NOT NULL default '0'", 'Default' => true),
        'title'        => array('Type' => "varchar(50) NOT NULL default ''", 'Default' => true),
        'imgurl'       => array('Type' => "varchar(255) NOT NULL default ''", 'Default' => true),
        'description'  => array('Type' => "text NOT NULL default ''", 'Default' => true),
        'total'        => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'summary'      => array('Type' => 'text NOT NULL', 'Default' => false),
        'spotlighttop' => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'spotlighthis' => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'dohtml'       => array('Type' => "tinyint(1) NOT NULL default '1'", 'Default' => true),
        'dosmiley'     => array('Type' => "tinyint(1) NOT NULL default '1'", 'Default' => true),
        'doxcode'      => array('Type' => "tinyint(1) NOT NULL default '1'", 'Default' => true),
        'doimage'      => array('Type' => "tinyint(1) NOT NULL default '1'", 'Default' => true),
        'dobr'         => array('Type' => "tinyint(1) NOT NULL default '1'", 'Default' => true),
        'weight'       => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true)
    );
    echo '<br><b>Checking Category table</b><br>';
    $catHandler = xoops_getModuleHandler('category', 'wfdownloads');
    $cat_table  = new WfdownloadsTable('wfdownloads_cat');
    $fields     = get_table_info($catHandler->table, $cat_fields);
    update_table($cat_fields, $fields, $cat_table);
    if ($dbupdater->updateTable($cat_table)) {
        echo 'Category table updated<br>';
    }
    unset($fields);

    $broken_fields = array(
        'reportid'     => array('Type' => 'int(5) NOT NULL auto_increment', 'Default' => false),
        'lid'          => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'sender'       => array('Type' => "int(11) NOT NULL default '0'", 'Default' => true),
        'ip'           => array('Type' => "varchar(20) NOT NULL default ''", 'Default' => true),
        'date'         => array('Type' => "varchar(11) NOT NULL default '0'", 'Default' => true),
        'confirmed'    => array('Type' => "enum('0','1') NOT NULL default '0'", 'Default' => true),
        'acknowledged' => array('Type' => "enum('0','1') NOT NULL default '0'", 'Default' => true)
    );
    echo '<br><b>Checking Broken Report table</b><br>';
    $brokenHandler = xoops_getModuleHandler('report', 'wfdownloads');
    $broken_table  = new WfdownloadsTable('wfdownloads_broken');
    $fields        = get_table_info($brokenHandler->table, $broken_fields);
    update_table($broken_fields, $fields, $broken_table);
    if ($dbupdater->updateTable($broken_table)) {
        echo 'Broken Reports table updated<br>';
    }
    unset($fields);
}

// =========================================================================================
// we are going to change the names for the fields like nohtml, nosmilies, noxcode, noimage, nobreak in
// the wfdownloads_cat table into dohtml, dosmilies and so on.  Therefore the logic will change
// 0=yes  1=no and the currently stored value need to be changed accordingly
// =========================================================================================
/**
 * @return array|bool
 */
function invert_nohtm_dohtml_values()
{
    $ret = array();
    global $xoopsDB;
    $catHandler = xoops_getModuleHandler('category', 'wfdownloads');
    $result     = $xoopsDB->query('SHOW COLUMNS FROM ' . $catHandler->table);
    while ($existing_field = $xoopsDB->fetchArray($result)) {
        $fields[$existing_field['field']] = $existing_field['type'];
    }
    if (in_array('nohtml', array_keys($fields))) {
        $dbupdater = new WfdownloadsDbupdater();
        //Invert column values
        // alter options in wfdownloads_cat
        $table = new WfdownloadsTable('wfdownloads_cat');
        $table->addAlteredField('nohtml', "dohtml tinyint(1) NOT NULL DEFAULT '1'");
        $table->addAlteredField('nosmiley', "dosmiley tinyint(1) NOT NULL DEFAULT '1'");
        $table->addAlteredField('noxcodes', "doxcode tinyint(1) NOT NULL DEFAULT '1'");
        $table->addAlteredField('noimages', "doimage tinyint(1) NOT NULL DEFAULT '1'");
        $table->addAlteredField('nobreak', "dobr tinyint(1) NOT NULL DEFAULT '1'");

        //inverting values no=1 <=> do=0
        // have to store teporarly as value = 2 to
        // avoid putting everithing to same value
        // if you change 1 to 0, then 0 to one,
        // every value will be 1, follow me?
        $table->addUpdatedWhere('dohtml', 2, '=1');
        $table->addUpdatedWhere('dohtml', 1, '=0');
        $table->addUpdatedWhere('dohtml', 0, '=2');

        $table->addUpdatedWhere('dosmiley', 2, '=1');
        $table->addUpdatedWhere('dosmiley', 1, '=0');
        $table->addUpdatedWhere('dosmiley', 0, '=2');

        $table->addUpdatedWhere('doxcode', 2, '=1');
        $table->addUpdatedWhere('doxcode', 1, '=0');
        $table->addUpdatedWhere('doxcode', 0, '=2');

        $table->addUpdatedWhere('doimage', 2, '=1');
        $table->addUpdatedWhere('doimage', 1, '=0');
        $table->addUpdatedWhere('doimage', 0, '=2');
        $ret = $dbupdater->updateTable($table);
    }

    return $ret;
}

/**
 * Updates a table by comparing correct fields with existing ones
 *
 * @param  array            $new_fields
 * @param  array            $existing_fields
 * @param  WfDownloadsTable $table
 * @return void
 */
function update_table($new_fields, $existing_fields, &$table)
{
    foreach ($new_fields as $field => $fieldinfo) {
        $type = $fieldinfo['Type'];
        if (!in_array($field, array_keys($existing_fields))) {
            //Add field as it is missing
            $table->addNewField($field, $type);
            //$xoopsDB->query("ALTER TABLE ".$table." ADD ".$field." ".$type);
            //echo $field."(".$type.") <FONT COLOR='##22DD51'>Added</FONT><br>";
        } elseif ($existing_fields[$field] != $type) {
            $table->addAlteredField($field, $field . ' ' . $type);
            // check $fields[$field]['type'] for things like "int(10) unsigned"
            //$xoopsDB->query("ALTER TABLE ".$table." CHANGE ".$field." ".$field." ".$type);
            //echo $field." <FONT COLOR='#FF6600'>Changed to</FONT> ".$type."<br>";
        } else {
            //echo $field." <FONT COLOR='#0033FF'>Uptodate</FONT><br>";
        }
    }
}

/**
 * Get column information for a table - we'll need to send along an array of fields to determine
 * whether the "Default" index value should be appended
 *
 * @param  string $table
 * @param  array  $default_fields
 * @return array
 */
function get_table_info($table, $default_fields)
{
    global $xoopsDB;
    $result = $xoopsDB->query('SHOW COLUMNS FROM ' . $table);
    while ($existing_field = $xoopsDB->fetchArray($result)) {
        $fields[$existing_field['Field']] = $existing_field['Type'];
        if ($existing_field['Null'] !== 'YES') {
            $fields[$existing_field['Field']] .= ' NOT NULL';
        }
        if ($existing_field['Extra']) {
            $fields[$existing_field['Field']] .= ' ' . $existing_field['Extra'];
        }
        if ($default_fields[$existing_field['Field']]['Default']) {
            $fields[$existing_field['Field']] .= " default '" . $existing_field['Default'] . "'";
        }
    }

    return $fields;
}

/**
 * Renames fields in a table and updates the existing fields array to reflect it.
 *
 * @param  WfDownloadsTable $table
 * @param  array            $renamed_fields
 * @param  array            $fields
 * @param  array            $new_fields
 * @return array
 */
function rename_fields(&$table, $renamed_fields, &$fields, $new_fields)
{
    foreach (array_keys($fields) as $field) {
        if (in_array($field, array_keys($renamed_fields))) {
            $new_field_name = $renamed_fields[$field];
            $new_field_type = $new_fields[$new_field_name]['Type'];
            $table->addAltered($field, $new_field_name . ' ' . $new_field_type);
            //$xoopsDB->query("ALTER TABLE ".$table." CHANGE ".$field." ".$new_field_name." ".$new_field_type);
            //echo $field." Renamed to ".$new_field_name."<br>";
            $fields[$new_field_name] = $new_field_type;
        }
    }
    //return $fields;
}

$op = isset($_REQUEST['op']) ? (int)$_REQUEST['op'] : 0;
switch ($op) {
    case 1:
        // Make sure that nohtml is properly changed to dohtml
        invert_nohtm_dohtml_values();
        // Ensure that the proper tables are present
        update_tables_to_300();
        // Import data from MyDownloads
        import_mydownloads_to_wfdownloads();
        break;

    case 2:
        // Update WF-Downloads
        $log = invert_nohtm_dohtml_values();
        update_tables_to_300();
        break;

    default:
        //ask what to do
        include XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
        $form = new XoopsThemeForm('Upgrade WF-Downloads', 'form', $_SERVER['REQUEST_URI']);

        //Is MyDownloads installed?
        $moduleHandler     = xoops_getHandler('module');
        $mydownloadsModule = $moduleHandler->getByDirname('mydownloads');
        if (is_object($mydownloadsModule)) {
            $mydownloadsButton = new XoopsFormButton('Import data from MyDownloads', 'myd_button', 'Import', 'submit');
            $mydownloadsButton->setExtra("onclick='document.forms.form.op.value=\"1\"'");
            $form->addElement($mydownloadsButton);
        }

        if (!wfdownloads_TableExists('wfdownloads_meta')) {
            $updateButton = new XoopsFormButton('Update WF-Downloads', 'upd_button', 'Update', 'submit');
            $updateButton->setExtra("onclick='document.forms.form.op.value=\"2\"'");
            $form->addElement($updateButton);
        }

        $form->addElement(new XoopsFormHidden('op', 0));
        $form->display();
        break;
}
//wfdownloads_modFooter();
//xoops_cp_footer();
include_once __DIR__ . '/admin_footer.php';
