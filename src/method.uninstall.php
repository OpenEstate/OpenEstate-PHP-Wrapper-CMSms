<?php
/**
 * PHP-Wrapper für CMSms.
 * Deinstallation des Moduls.
 * $Id: method.uninstall.php 2049 2013-02-12 07:47:36Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009-2013, OpenEstate.org
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!isset($gCms)) exit;

// remove the preference
$this->RemovePreference('wrap_path');
$this->RemovePreference('wrap_url');

// remove the event
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
?>