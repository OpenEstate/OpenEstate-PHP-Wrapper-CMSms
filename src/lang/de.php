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
$lang['moddescription'] = 'Dieses Modul integriert den <em>OpenEstate-PHP-Export</em> in eine auf <em>CMS made simple</em> basierende Webseite.';
$lang['changelog'] = 'siehe <a href="https://github.com/OpenEstate/OpenEstate-PHP-Wrapper-WordPress/blob/master/README.md#changelog" target="_blank">Projektbeschreibung bei GitHub</a>';
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>
  Im Rahmen des OpenEstate-Projektes wird unter Anderem eine kostenlose
  Immobiliensoftware unter dem Namen <em>OpenEstate-ImmoTool</em> entwickelt.
  Gemeinsam mit den Anwendern soll eine Softwarelösung für kleine bis
  mittelgroße Immobilienunternehmen entwickelt werden.
</p>
<p>
  Unter Anderem können die im <em>OpenEstate-ImmoTool</em> verwalteten
  Immobilien als PHP-Skripte auf die eigene Webseite exportiert werden. Mit
  Hilfe dieses Moduls kann dieser PHP-Export unkompliziert in eine auf
  <em>CMS made simple</em> basierende Webseite integriert werden.
</p>

<h3>Wie konfiguriere ich das Modul?</h3>
<ol>
  <li>
    Führen Sie einen PHP-Export aus <em>OpenEstate-ImmoTool</em> auf Ihren
    Webspace durch, wo auch <em>CMS made simple</em> installiert wurde.
  </li>
  <li>
    Melden Sie sich in der Administration von <em>CMS made simple</em> an und
    klicken Sie auf <em>Erweiterungen</em> → <em>OpenEstate PHP-Wrapper</em> →
    <em>Modul Einstellungen</em>. Tragen Sie Pfad und URL ein, die auf den
    Ordner mit den exportierten PHP-Skripten verweisen.
  </li>
  <li>
    Im Reiter <em>Integration</em> wird geprüft und dargestellt, ob der
    hinterlegte Skript-Pfad korrekt ist.
  </li>
</ol>

<h3>Wie verwende ich das Modul?</h3>
<ol>
  <li>
    Allgemein kann das Modul durch das Smarty-Tag
    <em>{OpenEstatePhpWrapper}</em> in eine beliebige Seite (oder Template)
    eingefügt werden.
  </li>
  <li>
    Die Einbindung kann durch weitere Parameter konfiguriert werden. Melden Sie
    sich in der Administration von <em>CMS made simple</em> an und klicken Sie
    auf <em>Erweiterungen</em> → <em>OpenEstate PHP-Wrapper</em> →
    <em>Integration</em>. Dort finden Sie ein Formular, mit dessen Hilfe ein
    Smarty-Tag inkl. Parameter erzeugt werden kann.
  </li>
</ol>

<h3>Copyright und Lizenz</h3>
<p>
  Copyright © 2010-2014, Andreas Rudolph &amp; Walter Wagner
  <a href="mailto:info@openestate.org">&lt;info@openindex.de&gt;</a>.
  All Rights Are Reserved.
</p>
<p>
  Dieses Modul wurde veröffentlicht unter den Bedingungen der
  <a href="{module_url}gpl-3.0-standalone.html">GNU Public License v3</a>.
  Mit Verwendung des Moduls akzeptieren Sie die Lizenzbedingungen.
</p>
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
$lang['error_current_page_not_found'] = 'Die aktuelle Seite konnte nicht ermittelt werden!';
$lang['error_update_is_running'] = '<h3>Der Immobilienbestand wird momentan aktualisiert!</h3><p>Bitte besuchen Sie diese Seite in wenigen Minuten erneut.</p>';
