<?php
/**
 * PHP-Wrapper für CMSms.
 * Darstellung der Wrapper-Ausgabe auf der Webseite.
 * $Id: action.default.php 594 2010-12-12 01:37:49Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009, OpenEstate.org
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!isset($gCms)) exit;

$immotoolBasePath = trim( $this->GetPreference('wrap_path','') );
if ($immotoolBasePath[strlen($immotoolBasePath)-1]!='/') $immotoolBasePath .= '/';
$immotoolBaseUrl = trim( $this->GetPreference('wrap_url','') );
if ($immotoolBaseUrl[strlen($immotoolBaseUrl)-1]!='/') $immotoolBaseUrl .= '/';

// setup environment
if (!defined('IMMOTOOL_BASE_PATH'))
  define( 'IMMOTOOL_BASE_PATH', $immotoolBasePath );  // Server-Pfad zu den ImmoTool-Skripten
if (!defined('IMMOTOOL_BASE_URL'))
  define( 'IMMOTOOL_BASE_URL', $immotoolBaseUrl );   // URL zu den ImmoTool-Skripten
if (!defined('IMMOTOOL_PARAM_LANG'))
  define('IMMOTOOL_PARAM_LANG', 'wrapped_lang');
if (!defined('IMMOTOOL_PARAM_FAV'))
  define('IMMOTOOL_PARAM_FAV', 'wrapped_fav');
if (!defined('IMMOTOOL_PARAM_INDEX_PAGE'))
  define('IMMOTOOL_PARAM_INDEX_PAGE', 'wrapped_page');
if (!defined('IMMOTOOL_PARAM_INDEX_RESET'))
  define('IMMOTOOL_PARAM_INDEX_RESET', 'wrapped_reset');
if (!defined('IMMOTOOL_PARAM_INDEX_ORDER'))
  define('IMMOTOOL_PARAM_INDEX_ORDER', 'wrapped_order');
if (!defined('IMMOTOOL_PARAM_INDEX_FILTER'))
  define('IMMOTOOL_PARAM_INDEX_FILTER', 'wrapped_filter');
if (!defined('IMMOTOOL_PARAM_INDEX_FILTER_CLEAR'))
  define('IMMOTOOL_PARAM_INDEX_FILTER_CLEAR', 'wrapped_clearFilters');
if (!defined('IMMOTOOL_PARAM_INDEX_VIEW'))
  define('IMMOTOOL_PARAM_INDEX_VIEW', 'wrapped_view');
if (!defined('IMMOTOOL_PARAM_INDEX_MODE'))
  define('IMMOTOOL_PARAM_INDEX_MODE', 'wrapped_mode');
if (!defined('IMMOTOOL_PARAM_EXPOSE_ID'))
  define('IMMOTOOL_PARAM_EXPOSE_ID', 'wrapped_id');
if (!defined('IMMOTOOL_PARAM_EXPOSE_VIEW'))
  define('IMMOTOOL_PARAM_EXPOSE_VIEW', 'wrapped_view');
if (!defined('IMMOTOOL_PARAM_EXPOSE_IMG'))
  define('IMMOTOOL_PARAM_EXPOSE_IMG', 'wrapped_img');
if (!defined('IMMOTOOL_PARAM_EXPOSE_CONTACT'))
  define('IMMOTOOL_PARAM_EXPOSE_CONTACT', 'wrapped_contact');
if (!defined('IMMOTOOL_PARAM_EXPOSE_CAPTCHA'))
  define('IMMOTOOL_PARAM_EXPOSE_CAPTCHA', 'wrapped_captchacode');

// Script ermitteln
$wrap = (isset($_REQUEST['wrap']) && is_string($_REQUEST['wrap']))? $_REQUEST['wrap']: null;
$wrap = (!is_string($wrap) && isset($params['wrap']))? $params['wrap']: $wrap;
if ($wrap=='expose') {
  $wrap = 'expose';
  $script = 'expose.php';

  // Standard-Parameter ggf. setzen
  //echo '<pre>';
  //print_r($_REQUEST);
  //echo '</pre>';
  $defaultParams = array( 'wrap', IMMOTOOL_PARAM_LANG, IMMOTOOL_PARAM_EXPOSE_ID, IMMOTOOL_PARAM_EXPOSE_VIEW );
  $useDefaultParams = true;
  foreach ($defaultParams as $param) {
    if (isset($_REQUEST[ $param ])) {
      $useDefaultParams = false;
      break;
    }
  }

  if ($useDefaultParams) {
    if (isset($params['lang']))
      $_REQUEST[ IMMOTOOL_PARAM_LANG ] = $params['lang'];
    if (isset($params['id']))
      $_REQUEST[ IMMOTOOL_PARAM_EXPOSE_ID ] = $params['id'];
    if (isset($params['view']))
      $_REQUEST[ IMMOTOOL_PARAM_EXPOSE_VIEW ] = $params['view'];
  }
}
else {
  $wrap = 'index';
  $script = 'index.php';

  // Standard-Parameter ggf. setzen
  //echo '<pre>';
  //print_r($_REQUEST);
  //echo '</pre>';
  $defaultParams = array( 'wrap', IMMOTOOL_PARAM_LANG, IMMOTOOL_PARAM_INDEX_VIEW, IMMOTOOL_PARAM_INDEX_MODE, IMMOTOOL_PARAM_INDEX_ORDER, IMMOTOOL_PARAM_INDEX_FILTER );
  $useDefaultParams = true;
  foreach ($defaultParams as $param) {
    if (isset($_REQUEST[ $param ])) {
      $useDefaultParams = false;
      break;
    }
  }
  if ($useDefaultParams) {
    if (isset($params['lang']))
      $_REQUEST[ IMMOTOOL_PARAM_LANG ] = $params['lang'];
    if (isset($params['view']))
      $_REQUEST[ IMMOTOOL_PARAM_INDEX_VIEW ] = $params['view'];
    if (isset($params['mode']))
      $_REQUEST[ IMMOTOOL_PARAM_INDEX_MODE ] = $params['mode'];

    // Standard-Sortierung
    if (isset($params['order_by'])) {
      $order = $params['order_by'];
      if (isset($params['order_dir'])) $order .= '-' . $params['order_dir'];
      else $order .= '-asc';
      $_REQUEST[ IMMOTOOL_PARAM_INDEX_ORDER ] = $order;
    }

    // Standard-Filter
    $filters = array();
    foreach (array_keys($params) as $param) {
      //echo $param . ' => ' .
      if (strtolower(substr($param, 0, strlen('filter_')))!='filter_') continue;
      $filterName = substr($param, strlen('filter_'));
      $filters[$filterName] = $params[$param];
    }
    //echo '<pre>';
    //print_r( $filters );
    //echo '</pre>';
    if (is_array($filters) && count($filters)>0) {
      $_REQUEST[ IMMOTOOL_PARAM_INDEX_FILTER ] = $filters;
    }
  }
}

// Script ausführen
//echo 'wrap: ' . IMMOTOOL_BASE_PATH . $script;
ob_start();
include( IMMOTOOL_BASE_PATH . $script );
$page = ob_get_contents();
ob_end_clean();

// Stylesheets
$setup = new immotool_setup();
if (is_callable(array('immotool_myconfig', 'load_config_default'))) immotool_myconfig::load_config_default( $setup );
$stylesheets = array( IMMOTOOL_BASE_URL . 'style.php' );
if (is_string($setup->AdditionalStylesheet) && strlen($setup->AdditionalStylesheet)>0) 
  $stylesheets[] = $setup->AdditionalStylesheet;

// Ausgabe erzeugen
$baseUrl = $_SERVER['SCRIPT_NAME'];
$hiddenParams = array();
if (isset($_REQUEST['page'])) {
  $baseUrl .= '?page='.$_REQUEST['page'];
  $hiddenParams['page'] = $_REQUEST['page'];
}
echo immotool_functions::wrap_page( $page, $wrap, $baseUrl, IMMOTOOL_BASE_URL, $stylesheets, $hiddenParams );
?>