<?php
/*
 * A CMSms module for the OpenEstate-PHP-Export
 * Copyright (C) 2010-2015 OpenEstate.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!isset($gCms)) {
  exit;
}

// set our preference
$this->SetPreference('wrap_path', isset($params['wrap_path']) ? $params['wrap_path'] : '');
$this->SetPreference('wrap_url', isset($params['wrap_url']) ? $params['wrap_url'] : '');

// write to the admin log
$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('prefsupdated'));

// set the active tab, and a message to display
$params = array('tab_message' => 'prefsupdated', 'active_tab' => 'prefs');

// redirect back to default admin page
$this->Redirect($id, 'defaultadmin', $returnid, $params);
