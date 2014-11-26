<?php
/**
 * PHP-Wrapper für CMSms.
 * Sprachdatei, deutsch
 * $Id: de.php 1705 2012-08-15 14:33:25Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009-2012, OpenEstate.org
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

$lang['friendlyname'] = 'OpenEstate PHP-Wrapper';
$lang['moddescription'] = 'Dieses Modul integriert PHP-Immobilienexporte aus dem OpenEstate-ImmoTool in CMSms.';
$lang['changelog'] = '<ul>
<li>Version 0.3. Detail-Korrekturen.</li>
<li>Version 0.2. Erstes öffentliches Release.</li>
<li>Version 0.1. Internes Release.</li>
</ul>';
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>'.$lang['moddescription'].'</p>
<h3>Wie konfiguriere ich dieses Modul?</h3>
<p>(a) Führen Sie einen PHP-Export aus dem <a href="http://www.openestate.org/immotool/" target="blank">OpenEstate-ImmoTool</a> auf Ihren Webspace durch, wo auch CMSms installiert wurde.</p>
<p>(b) Melden Sie sich in der CMSms-Administration an und klicken Sie auf \'Erweiterungen\' &raquo; \'OpenEstate PHP-Wrapper\' &raquo; \'Modul Einstellungen\'. Tragen Sie Pfad und URL ein, die auf die exportierten PHP-Skripte verweisen.</p>
<p>(c) Im Reiter \'Integration\' wird geprüft und dargestellt, ob der hinterlegte Skript-Pfad korrekt ist.</p>

<h3>Wie verwende ich das Modul?</h3>
<p>(a) Allgemein kann das Modul durch das Smarty-Tag &#123;OpenEstatePhpWrapper} in eine beliebige Seite (oder Template) eingefügt werden.</p>
<p>(b) Die Einbindung kann durch weitere Parameter konfiguriert werden. Melden Sie sich in der CMSms-Administration an und klicken Sie auf \'Erweiterungen\' &raquo; \'OpenEstate PHP-Wrapper\' &raquo; \'Integration\'. Dort finden Sie ein Formular, mit dessen Hilfe ein Smarty-Tag inkl. Parameter erzeugt werden kann.</p>

<h3>Copyright und Lizenz</h3>
<p>Copyright &copy; 2010, Andreas Rudolph &amp; Walter Wagner <a href="mailto:info@openindex.de">&lt;info@openindex.de&gt;</a>. All Rights Are Reserved.</p>
<p>Dieses Modul wurde veröffentlicht unter den Bedingungen der <a href="{module_url}gpl-3.0-standalone.html">GNU Public License v3</a>. Mit Verwendung des Moduls akzeptieren Sie die Lizenzbedingungen.</p>
';

// Meldungen
$lang['postinstall'] = 'OpenEstate PHP-Wrapper wurde erfolgreich installiert! Bitte konfigurieren Sie das Modul entsprechend.';
$lang['postuninstall'] = 'OpenEstate PHP-Wrapper wurde erfolgreich entfernt!';
$lang['really_uninstall'] = 'Soll das Modul wirklich entfernt werden?';
$lang['uninstalled'] = 'Modul entfernt.';
$lang['installed'] = 'Das Modul wurde installiert (Version %s).';
$lang['upgraded'] = 'Das Modul wurde aktualisiert tauf Version %s.';
$lang['prefsupdated'] = 'Die Einstellungen des Moduls wurden gespeichert..';
$lang['submit'] = 'Speichern';
$lang['error'] = 'Fehler!';
$lang['rebuild'] = 'Aktualisieren';

// General Info
$lang['title_general'] = 'Allgemeine Informationen';
$lang['title_about'] = 'Über dieses Modul';
$lang['title_license'] = 'Lizenzvereinbarung';
$lang['title_authors'] = 'Autoren / Entwickler';
$lang['title_support'] = 'Unterstützen Sie die weitere Entwicklung!';

// Preferences
$lang['title_mod_prefs'] = 'Modul Einstellungen';
$lang['title_wrap_path'] = 'Skript-Pfad';
$lang['title_wrap_path_help'] = 'Tragen Sie den Pfad auf Ihrem Server ein, der auf die exportierten PHP-Skripte verweist.';
$lang['title_wrap_url'] = 'Skript-URL';
$lang['title_wrap_url_help'] = 'Tragen Sie die URL auf Ihre Webseite ein, die auf die exportierten PHP-Skripte verweist.';

// Integration
$lang['title_mod_integration'] = 'Integration';
$lang['title_wrap_test'] = 'Skript-Test';
$lang['title_wrap_test_success'] = 'Die Skripte wurden korrekt eingebunden.';
$lang['title_wrap_test_error'] = 'Die Skripte konnten NICHT eingebunden werden.';
$lang['title_wrap_tag'] = 'Ein CMSms-Tag erzeugen';
$lang['title_wrap_tag_help'] = 'Der erzeugte Code kann an beliebiger Stelle in einer Seite oder einem Template eingefügt werden.';
$lang['title_wrap_listing'] = 'Immobilienübersicht';
$lang['title_wrap_tag_view'] = 'Ansicht';
$lang['title_wrap_tag_mode'] = 'Darstellung';
$lang['title_wrap_tag_lang'] = 'Sprache';
$lang['title_wrap_tag_order'] = 'Sortierung';
$lang['title_wrap_tag_filter'] = 'Filterktierien';
$lang['title_wrap_property'] = 'Immobilienansicht';
$lang['title_wrap_tag_property'] = 'Objekt-ID';

// Integration, view
$lang['view_index'] = 'Übersicht';
$lang['view_fav'] = 'Vormerkliste';
$lang['view_details'] = 'Details';
$lang['view_texts'] = 'Texte';
$lang['view_gallery'] = 'Galerie';
$lang['view_contact'] = 'Kontakt';
$lang['view_terms'] = 'AGB';

// Integration, mode
$lang['mode_entry'] = 'als Liste';
$lang['mode_gallery'] = 'als Galerie';

// Integration, order
$lang['order_asc'] = 'Aufsteigend';
$lang['order_desc'] = 'Absteigend';

// Integration, errors
$lang['error_invalid_path'] = 'Bitte tragen Sie einen gültigen Skript-Pfad ein!';
$lang['error_file_not_found'] = 'Die erforderlichte Datei \'%s\' befindet sich nicht im Skript-Pfad!';
$lang['error_version_not_found'] = 'Die Skript-Version konnte nicht ermittelt werden!';
$lang['error_update_is_running'] = '<h3>Der Immobilienbestand wird momentan aktualisiert!</h3><p>Bitte besuchen Sie diese Seite in wenigen Minuten erneut.</p>';
?>