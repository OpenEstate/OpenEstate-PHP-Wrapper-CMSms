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

if (!isset($gCms)) {
  exit;
}

//echo '<pre>' . print_r($_REQUEST, true) . '</pre>';
//echo '<pre>' . print_r($_SERVER, true). '</pre>';
//echo '<pre>' . print_r($config, true) . '</pre>';

$cmsQueryVar = $config['query_var'];
$cmsUrlRewriting = $config['url_rewriting'];
$immotoolBasePath = trim($this->GetPreference('wrap_path', ''));
if ($immotoolBasePath[strlen($immotoolBasePath) - 1] != '/') {
  $immotoolBasePath .= '/';
}
$immotoolBaseUrl = trim($this->GetPreference('wrap_url', ''));
if ($immotoolBaseUrl[strlen($immotoolBaseUrl) - 1] != '/') {
  $immotoolBaseUrl .= '/';
}

// get current page
$currentContent = $gCms->variables['content_obj'];
if (!is_object($currentContent)) {
  echo $this->Lang('error_current_page_not_found');
  return;
}

// setup environment
if (is_file($immotoolBasePath . 'immotool.php.lock')) {
  echo $this->Lang('error_update_is_running');
  return;
}
if (!defined('IMMOTOOL_BASE_PATH')) {
  define('IMMOTOOL_BASE_PATH', $immotoolBasePath);  // Server-Pfad zu den ImmoTool-Skripten
}
if (!defined('IMMOTOOL_BASE_URL')) {
  define('IMMOTOOL_BASE_URL', $immotoolBaseUrl);   // URL zu den ImmoTool-Skripten
}
if (!defined('IMMOTOOL_PARAM_LANG')) {
  define('IMMOTOOL_PARAM_LANG', 'wrapped_lang');
}
if (!defined('IMMOTOOL_PARAM_FAV')) {
  define('IMMOTOOL_PARAM_FAV', 'wrapped_fav');
}
if (!defined('IMMOTOOL_PARAM_INDEX_PAGE')) {
  define('IMMOTOOL_PARAM_INDEX_PAGE', 'wrapped_page');
}
if (!defined('IMMOTOOL_PARAM_INDEX_RESET')) {
  define('IMMOTOOL_PARAM_INDEX_RESET', 'wrapped_reset');
}
if (!defined('IMMOTOOL_PARAM_INDEX_ORDER')) {
  define('IMMOTOOL_PARAM_INDEX_ORDER', 'wrapped_order');
}
if (!defined('IMMOTOOL_PARAM_INDEX_FILTER')) {
  define('IMMOTOOL_PARAM_INDEX_FILTER', 'wrapped_filter');
}
if (!defined('IMMOTOOL_PARAM_INDEX_FILTER_CLEAR')) {
  define('IMMOTOOL_PARAM_INDEX_FILTER_CLEAR', 'wrapped_clearFilters');
}
if (!defined('IMMOTOOL_PARAM_INDEX_VIEW')) {
  define('IMMOTOOL_PARAM_INDEX_VIEW', 'wrapped_view');
}
if (!defined('IMMOTOOL_PARAM_INDEX_MODE')) {
  define('IMMOTOOL_PARAM_INDEX_MODE', 'wrapped_mode');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_ID')) {
  define('IMMOTOOL_PARAM_EXPOSE_ID', 'wrapped_id');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_VIEW')) {
  define('IMMOTOOL_PARAM_EXPOSE_VIEW', 'wrapped_view');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_IMG')) {
  define('IMMOTOOL_PARAM_EXPOSE_IMG', 'wrapped_img');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_CONTACT')) {
  define('IMMOTOOL_PARAM_EXPOSE_CONTACT', 'wrapped_contact');
}
if (!defined('IMMOTOOL_PARAM_EXPOSE_CAPTCHA')) {
  define('IMMOTOOL_PARAM_EXPOSE_CAPTCHA', 'wrapped_captchacode');
}
if (!defined('OPENESTATE_WRAPPER')) {
  define('OPENESTATE_WRAPPER', '1');
}

// load attributes from the smarty tag
$settings = array();
if (is_array($params)) {
  foreach ($params as $key => $value) {
    $key = trim($key);
    if (substr($key, 0, 7) == 'filter_') {
      if (!isset($settings['filter'])) {
        $settings['filter'] = array();
      }
      $settings['filter'][substr($key, 7)] = $value;
    }
    else {
      $settings[$key] = $value;
    }
  }
}
//echo '<pre>' . print_r($settings, true) . '</pre>';

if (is_file(IMMOTOOL_BASE_PATH . 'immotool.php.lock')) {
  return __('error_update_is_running', 'openestate-php-wrapper');
}

// keep wrapper settings in a global variable for further use
$GLOBALS['openestate_wrapper_settings'] = $settings;

// determine the script to load
$wrap = (isset($_REQUEST['wrap']) && is_string($_REQUEST['wrap'])) ? $_REQUEST['wrap'] : null;
$wrap = (!is_string($wrap) && isset($settings['wrap'])) ? $settings['wrap'] : $wrap;
if ($wrap == 'expose') {
  $wrap = 'expose';
  $script = 'expose.php';

  // set default configuration values on the first request of the page
  if (!isset($_REQUEST['wrap'])) {
    if (isset($settings['lang'])) {
      $_REQUEST[IMMOTOOL_PARAM_LANG] = $settings['lang'];
    }
    if (isset($settings['id'])) {
      $_REQUEST[IMMOTOOL_PARAM_EXPOSE_ID] = $settings['id'];
    }
    if (isset($settings['view'])) {
      $_REQUEST[IMMOTOOL_PARAM_EXPOSE_VIEW] = $settings['view'];
    }
  }
}
else {
  $wrap = 'index';
  $script = 'index.php';

  // set default configuration values on the first request of the page
  if (!isset($_REQUEST['wrap'])) {
    $_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER_CLEAR] = '1';
    if (isset($settings['lang'])) {
      $_REQUEST[IMMOTOOL_PARAM_LANG] = $settings['lang'];
    }
    if (isset($settings['view'])) {
      $_REQUEST[IMMOTOOL_PARAM_INDEX_VIEW] = $settings['view'];
    }
    if (isset($settings['mode'])) {
      $_REQUEST[IMMOTOOL_PARAM_INDEX_MODE] = $settings['mode'];
    }
    if (isset($settings['order_by'])) {
      $order = $settings['order_by'];
      if (isset($settings['order_dir'])) {
        $order .= '-' . $settings['order_dir'];
      }
      else {
        $order .= '-asc';
      }
      $_REQUEST[IMMOTOOL_PARAM_INDEX_ORDER] = $order;
    }
  }

  // clear filter selections, if this is explicitly selected
  if (isset($_REQUEST[IMMOTOOL_PARAM_INDEX_RESET])) {
    unset($_REQUEST[IMMOTOOL_PARAM_INDEX_RESET]);
    $_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER] = array();
    $_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER_CLEAR] = '1';
  }

  // load configured filter criterias into the request
  if (!isset($_REQUEST['wrap']) || isset($_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER])) {
    if (isset($settings['filter']) && is_array($settings['filter'])) {
      foreach ($settings['filter'] as $filter => $value) {
        if (!isset($_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER]) || !is_array($_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER])) {
          $_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER] = array();
        }
        if (!isset($_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER][$filter])) {
          $_REQUEST[IMMOTOOL_PARAM_INDEX_FILTER][$filter] = $value;
        }
      }
    }
  }
}

// execute the script
//echo 'wrap: ' . IMMOTOOL_BASE_PATH . $script;
ob_start();
include( IMMOTOOL_BASE_PATH . $script );
$page = ob_get_contents();
ob_end_clean();

// setup stylesheets for the generated output
$setup = new immotool_setup();
if (is_callable(array('immotool_myconfig', 'load_config_default'))) {
  immotool_myconfig::load_config_default($setup);
}
$stylesheets = array(IMMOTOOL_BASE_URL . 'style.php?wrapped=1');
if (is_string($setup->AdditionalStylesheet) && strlen($setup->AdditionalStylesheet) > 0) {
  $stylesheets[] = $setup->AdditionalStylesheet;
}

// setup base URL and hidden parameters for the generated output
$baseUrl = null;
$hiddenParams = array();
if ($cmsUrlRewriting == 'internal') {
  $baseUrl = $_SERVER['PHP_SELF'];
}
else if ($cmsUrlRewriting == 'mod_rewrite') {
  $requestUrl = explode('?', $_SERVER['REQUEST_URI']);
  $baseUrl = $requestUrl[0];
}
else {
  $baseUrl = $_SERVER['SCRIPT_NAME'] . '?' . $cmsQueryVar . '=' . $currentContent->Alias();
  $hiddenParams[$cmsQueryVar] = $currentContent->Alias();
}

// convert and return the script output
echo immotool_functions::wrap_page($page, $wrap, $baseUrl, IMMOTOOL_BASE_URL, $stylesheets, $hiddenParams);
