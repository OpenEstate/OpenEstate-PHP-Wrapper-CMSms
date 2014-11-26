<?php
/*
 * A CMSms module for the OpenEstate-PHP-Export
 * Copyright (C) 2010-2014 OpenEstate.org
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

$lang['friendlyname'] = 'OpenEstate PHP-Wrapper';
$lang['moddescription'] = 'This module integrates <em>OpenEstate-PHP-Export</em> into a <em>CMS made simple</em> based website.';
$lang['changelog'] = 'see <a href="https://github.com/OpenEstate/OpenEstate-PHP-Wrapper-WordPress/blob/master/README.md#changelog" target="_blank">project description at GitHub</a>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>
  OpenEstate.org provides a freeware software - called
  <em>OpenEstate-ImmoTool</em> - for small and medium sized real-estate-agencies
  all over the world.
</p>
<p>
  As one certain feature of this software, the managed properties can be exported
  to any website that supports PHP. Together with this module, the exported
  properties can be easily integrated into a <em>CMS made simple</em> based
  website without any frames.
</p>

<h3>How to configure the module?</h3>
<ol>
  <li>
    Execute a PHP-export from <em>OpenEstate-ImmoTool</em> to your webspace,
    where <em>CMS made simple</em> is installed.
  </li>
  <li>
    Log in to administration of <em>CMS made simple</em> and open
    <em>Extensions</em> → <em>OpenEstate PHP-Wrapper</em> →
    <em>Module Preferences</em>. Enter path and URL, that points to the folder
    with the exported scripts.
  </li>
  <li>
    The <em>Integration</em> tab shows, if the correct script path is
    configured.
  </li>
</ol>

<h3>How to use the module?</h3>
<ol>
  <li>
    The module can be placed in any page or template with the smarty tag
    <em>{OpenEstatePhpWrapper}</em>.
  </li>
  <li>
    The wrapping can be configured with certain parameters. Log in to
    administration of <em>CMS made simple</em> and open
    <em>Extensions</em> → <em>OpenEstate PHP-Wrapper</em> →
    <em>Integration</em>. There you can find a form, to generate parameterized
    smarty tags.
  </li>
</ol>

<h3>Copyright and License</h3>
<p>
  Copyright © 2010-2014, Andreas Rudolph &amp; Walter Wagner
  <a href="mailto:info@openestate.org">&lt;info@openindex.de&gt;</a>.
  All Rights Are Reserved.
</p>
<p>
  This module has been released under the terms of
  <a href="{module_url}gpl-3.0-standalone.html">GNU Public License v3</a>. You
  must agree to this license before using the module.
</p>
';

// Meldungen
$lang['postinstall'] = 'OpenEstate PHP-Wrapper was successfully installed! Please consider to configure this module.';
$lang['postuninstall'] = 'OpenEstate PHP-Wrapper was successfully uninstalled!';
$lang['really_uninstall'] = 'Really? You\'re sure you want to uninstall this module?';
$lang['uninstalled'] = 'Module Uninstalled.';
$lang['installed'] = 'Module version %s installed.';
$lang['upgraded'] = 'Module upgraded to version %s.';
$lang['prefsupdated'] = 'Module preferences updated.';
$lang['submit'] = 'Save';
$lang['error'] = 'Error!';
$lang['rebuild'] = 'Rebuild';

// General Info
$lang['title_general'] = 'General Info';
$lang['title_about'] = 'About this module';
$lang['title_license'] = 'License Agreement';
$lang['title_authors'] = 'Authors / Developers';
$lang['title_support'] = 'Support further development';

// Preferences
$lang['title_mod_prefs'] = 'Module Preferences';
$lang['title_wrap_path'] = 'Script Path';
$lang['title_wrap_path_help'] = 'Enter the path on your server, that points to the exported scripts.';
$lang['title_wrap_url'] = 'Script URL';
$lang['title_wrap_url_help'] = 'Enter the URL to your website, that points to the exported scripts.';

// Integration
$lang['title_mod_integration'] = 'Integration';
$lang['title_wrap_test'] = 'Script Test';
$lang['title_wrap_test_success'] = 'The scripts are configured correctly.';
$lang['title_wrap_test_error'] = 'The scripts are NOT configured correctly.';
$lang['title_wrap_tag'] = 'Generate a CMSms-Tag';
$lang['title_wrap_tag_help'] = 'Copy &amp; paste the generated code everywhere into your website.';
$lang['title_wrap_listing'] = 'Property Listing';
$lang['title_wrap_tag_view'] = 'View';
$lang['title_wrap_tag_mode'] = 'Mode';
$lang['title_wrap_tag_lang'] = 'Language';
$lang['title_wrap_tag_order'] = 'Ordering';
$lang['title_wrap_tag_filter'] = 'Filters';
$lang['title_wrap_property'] = 'Property Details';
$lang['title_wrap_tag_property'] = 'Property-ID';

// Integration, view
$lang['view_index'] = 'Summary';
$lang['view_fav'] = 'Favourites';
$lang['view_details'] = 'Details';
$lang['view_texts'] = 'Texts';
$lang['view_gallery'] = 'Gallery';
$lang['view_contact'] = 'Contact';
$lang['view_terms'] = 'Terms';

// Integration, mode
$lang['mode_entry'] = 'Tabular mode';
$lang['mode_gallery'] = 'Gallery mode';

// Integration, order
$lang['order_asc'] = 'Ascending';
$lang['order_desc'] = 'Descending';

// Integration, errors
$lang['error_invalid_path'] = 'Please enter a valid server-path!';
$lang['error_file_not_found'] = 'The required file \'%s\' was not in the server-path!';
$lang['error_version_not_found'] = 'The script-version was not found!';
$lang['error_update_is_running'] = '<h3>The properties are currently updated!</h3><p>Please revisit this page after some minutes.</p>';
