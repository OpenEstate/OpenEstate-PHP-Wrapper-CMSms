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
$lang['moddescription'] = 'This module integrates PHP-exported properties from OpenEstate-ImmoTool into CMSms.';
$lang['changelog'] = '<ul>
<li>Version 0.3. Some smaller improvements.</li>
<li>Version 0.2. First public release.</li>
<li>Version 0.1. Internal release.</li>
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>' . $lang['moddescription'] . '</p>
<h3>How do I configure it?</h3>
<p>(a) Execute a PHP-export from <a href="http://www.openestate.org/immotool/" target="blank">OpenEstate-ImmoTool</a> to the webspace, where CMSms is installed.</p>
<p>(b) Log in to CMSms-administration and open \'Extensions\' &raquo; \'OpenEstate PHP-Wrapper\' &raquo; \'Module Preferences\'. Enter path and URL, that points to your exported scripts.</p>
<p>(c) If path &amp; URL is correctly configured, is shown in the \'Integration\' tab.</p>

<h3>How do I use it?</h3>
<p>(a) In general, the module can be placed in a page or template using the smarty tag &#123;OpenEstatePhpWrapper}.</p>
<p>(b) The wrapping can be configured with certain parameters. Log in to CMSms-administration and open \'Extensions\' &raquo; \'OpenEstate PHP-Wrapper\' &raquo; \'Integration\'. There you can find a form, to generate parameterized smarty tags.</p>

<h3>Copyright and License</h3>
<p>Copyright &copy; 2010, Andreas Rudolph &amp; Walter Wagner <a href="mailto:info@openindex.de">&lt;info@openindex.de&gt;</a>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="{module_url}gpl-3.0-standalone.html">GNU Public License v3</a>. You must agree to this license before using the module.</p>
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
