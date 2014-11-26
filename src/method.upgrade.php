<?php
/**
 * PHP-Wrapper für CMSms.
 * Aktualisierung des Moduls.
 * $Id: method.upgrade.php 1705 2012-08-15 14:33:25Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009-2012, OpenEstate.org
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!isset($gCms)) exit;

$current_version = $oldversion;
switch($current_version) {
  case "0.2":
  //do magic
  case "0.3":
  //and this is here for the next version
  case "0.4":
  case "0.5":
  case "0.6":
  case "0.7":
  case "0.8":
  case "0.9":
}

// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded', $this->GetVersion()));
?>