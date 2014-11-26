<?php
/**
 * PHP-Wrapper für CMSms.
 * Deinstallation des Moduls.
 * $Id: method.uninstall.php 897 2011-06-15 23:54:58Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009-2011, OpenEstate.org
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!isset($gCms)) exit;

// remove the preference
$this->RemovePreference('wrap_path');
$this->RemovePreference('wrap_url');

// remove the event
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
?>