OpenEstate-PHP-Wrapper for CMSms 0.3
====================================

This module integrates [OpenEstate-PHP-Export](https://github.com/OpenEstate/OpenEstate-PHP-Export)
into a *CMS made simple* based website.


Description
-----------

### English

OpenEstate.org provides a freeware software - called *OpenEstate-ImmoTool* -
for small and medium sized real-estate-agencies all over the world.

As one certain feature of this software, the managed properties can be exported
to any website that supports PHP. Together with this module, the exported
properties can be easily integrated into a *CMS made simple* based website without
any frames.

#### How to configure configure the module?

1.  Execute a PHP-export from [OpenEstate-ImmoTool](http://en.openestate.org/immotool/)
    to your webspace, where *CMS made simple* is installed.
2.  Log in to administration of *CMS made simple* and open
    `Extensions` → `OpenEstate PHP-Wrapper` → `Module Preferences`. Enter path
    and URL, that points to the folder with the exported scripts.
3.  The `Integration` tab shows, if path & URL is correctly configured.

#### How to use the module?

1.  The module can be placed in any page or template with the smarty tag
    `{OpenEstatePhpWrapper}`.
2.  The wrapping can be configured with certain parameters. Log in to
    administration of *CMS made simple* and open
    `Extensions` → `OpenEstate PHP-Wrapper` → `Integration`. There you can find
    a form, to generate parameterized smarty tags.


### Deutsch

Im Rahmen des OpenEstate-Projektes wird unter Anderem eine kostenlose
Immobiliensoftware unter dem Namen *OpenEstate-ImmoTool* entwickelt. Gemeinsam
mit den Anwendern soll eine Softwarelösung für kleine bis mittelgroße
Immobilienunternehmen entwickelt werden.

Unter Anderem können die im *OpenEstate-ImmoTool* verwalteten Immobilien als
PHP-Skripte auf die eigene Webseite exportiert werden. Mit Hilfe dieses Moduls
kann dieser PHP-Export unkompliziert in eine auf *CMS made simple* basierende
Webseite integriert werden.

#### Wie konfiguriere ich dieses Modul?

1.  Führen Sie einen PHP-Export aus [OpenEstate-ImmoTool](http://de.openestate.org/immotool/)
    auf Ihren Webspace durch, wo auch *CMS made simple* installiert wurde.
2.  Melden Sie sich in der Administration von *CMS made simple* an und klicken
    Sie auf `Erweiterungen` → `OpenEstate PHP-Wrapper` → `Modul Einstellungen`.
    Tragen Sie Pfad und URL ein, die auf den Ordner mit den exportierten
    PHP-Skripten verweisen.
3.  Im Reiter `Integration` wird geprüft und dargestellt, ob der hinterlegte
    Skript-Pfad korrekt ist.

#### Wie verwende ich das Modul?

1.  Allgemein kann das Modul durch das Smarty-Tag `{OpenEstatePhpWrapper}` in
    eine beliebige Seite (oder Template) eingefügt werden.
2.  Die Einbindung kann durch weitere Parameter konfiguriert werden. Melden Sie
    sich in der Administration von *CMS made simple* an und klicken Sie auf
    `Erweiterungen` → `OpenEstate PHP-Wrapper` → `Integration`. Dort finden Sie
    ein Formular, mit dessen Hilfe ein Smarty-Tag inkl. Parameter erzeugt werden
    kann.


Changelog
---------

### 0.3

-   Some smaller improvements.

### 0.2

-   First public release


License
-------

[GNU General Public License 3](http://www.gnu.org/licenses/gpl-3.0-standalone.html)
