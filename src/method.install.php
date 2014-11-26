<?php
/**
 * PHP-Wrapper für CMSms.
 * Installation des Moduls.
 * $Id: method.install.php 2049 2013-02-12 07:47:36Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009-2013, OpenEstate.org
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