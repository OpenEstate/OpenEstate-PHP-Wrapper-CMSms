<?php
/**
 * PHP-Wrapper für CMSms.
 * Installation des Moduls.
 * $Id: method.install.php 1705 2012-08-15 14:33:25Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009-2012, OpenEstate.org
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!isset($gCms)) exit;

// create preferences
global $config;
$this->SetPreference('wrap_path', $config['root_path'] . '/immotool_export');
$this->SetPreference('wrap_url', $config['root_url'] . '/immotool_export');

// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed', $this->GetVersion()) );
?>