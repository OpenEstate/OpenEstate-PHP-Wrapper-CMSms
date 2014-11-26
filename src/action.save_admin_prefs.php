<?php
/**
 * PHP-Wrapper für CMSms.
 * Eingaben im Administrationsbereich übernehmen.
 * $Id: action.save_admin_prefs.php 2049 2013-02-12 07:47:36Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009-2013, OpenEstate.org
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!isset($gCms)) exit;

// set our preference
$this->SetPreference('wrap_path', isset($params['wrap_path'])?$params['wrap_path']:'');
$this->SetPreference('wrap_url', isset($params['wrap_url'])?$params['wrap_url']:'');

// write to the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('prefsupdated') );

// set the active tab, and a message to display
$params = array('tab_message'=> 'prefsupdated', 'active_tab' => 'prefs');

// redirect back to default admin page
$this->Redirect($id, 'defaultadmin', $returnid, $params);
?>