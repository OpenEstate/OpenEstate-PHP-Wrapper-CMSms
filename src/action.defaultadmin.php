<?php
/**
 * PHP-Wrapper für CMSms.
 * Darstellung des Formulars im Administrationsbereich.
 * $Id: action.defaultadmin.php 1616 2012-07-03 08:11:12Z andy $
 *
 * @author Andreas Rudolph & Walter Wagner
 * @copyright 2009-2011, OpenEstate.org
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * For separated methods, you'll always want to start with the following
 * line which check to make sure that method was called from the module
 * API, and that everything's safe to continue:
 */
if (!isset($gCms)) exit;

// Tab Infrastructure for Admin Area -- create two tabs, one of which
// is only accessible if permissions are right
if (FALSE == empty($params['active_tab'])) {
  $tab = $params['active_tab'];
} else {
  $tab = '';
}

$tab_header = $this->StartTabHeaders();

// general tab
$tab_header .= $this->SetTabHeader('general',$this->Lang('title_general'),('general' == $tab)?true:false);
$this->smarty->assign('start_general_tab',$this->StartTab('general', $params));

// prefs tab
$tab_header .= $this->SetTabHeader('prefs',$this->Lang('title_mod_prefs'), ('prefs' == $tab)?true:false);
$this->smarty->assign('start_prefs_tab',$this->StartTab('prefs', $params));

// integration tab
$tab_header .= $this->SetTabHeader('integration',$this->Lang('title_mod_integration'), ('integration' == $tab)?true:false);
$this->smarty->assign('start_integration_tab',$this->StartTab('integration', $params));

// execute tests on the script-environment
$environmentErrors = array();
$environmentFiles = array( 'config.php', 'include/functions.php', 'data/language.php' );
$immotoolBasePath = trim( $this->GetPreference('wrap_path','') );
if (!is_dir($immotoolBasePath)) {
  $environmentErrors[] = $this->Lang('error_invalid_path');
}
else {
  if ($immotoolBasePath[strlen($immotoolBasePath)-1]!='/') $immotoolBasePath .= '/';
  define('IMMOTOOL_BASE_PATH', $immotoolBasePath);
  foreach ($environmentFiles as $file) {
    if (!is_file(IMMOTOOL_BASE_PATH.$file))
      $environmentErrors[] = $this->Lang('error_file_not_found', $file);
  }
  if (count($environmentErrors)==0) {
    define('IN_WEBSITE', 1);
    foreach ($environmentFiles as $file) {
      //echo IMMOTOOL_BASE_PATH . $file . '<hr/>';
      include(IMMOTOOL_BASE_PATH.$file);
    }
    if (!defined('IMMOTOOL_SCRIPT_VERSION'))
      $environmentErrors[] = $this->Lang('error_version_not_found');
  }
}
$environmentIsValid = count($environmentErrors)==0;
$testResult = '';
if ($environmentIsValid) {
  $testResult = '<h3 style="color:green; margin-bottom:0;">' . $this->Lang('title_wrap_test_success') . '</h3>';
  $testResult .= '<span style="color:green;">version ' . IMMOTOOL_SCRIPT_VERSION . '</span>';

  $setupIndex = new immotool_setup_index();
  //$setupExpose = new immotool_setup_expose();
  if (is_callable(array('immotool_functions', 'init_config'))) {
    immotool_functions::init_config($setupIndex, 'load_config_index');
    //immotool_functions::init_config($setupExpose, 'load_config_expose');
  }
  $translations = null;
  $lang = immotool_functions::init_language( $setupIndex->DefaultLanguage, $setupIndex->DefaultLanguage, $translations );
  if (!is_array($translations)) {
    echo 'Übersetzung kann nicht ermittelt werden!<hr/>';
    $environmentIsValid = false;
  }

  // Create Tag-Builder-Form
  $this->smarty->assign('tag_builder','1');

  // lang
  $langs = array();
  $defaultLang = null;
  foreach (immotool_functions::get_language_codes() as $code) {
    if (is_null($defaultLang)) $defaultLang = $code;
    $lang = immotool_functions::get_language_name( $code );
    $langs[$lang] = $code;
  }
  $this->smarty->assign('input_index_lang',$this->CreateInputSelectList(
          $id,
          'index_lang',
          $langs,
          array( $defaultLang ),
          0,
          'id="tag_index_lang" onchange="build_tag();"',
          false ) );
  $this->smarty->assign('input_expose_lang',$this->CreateInputSelectList(
          $id,
          'expose_lang',
          $langs,
          array( $defaultLang ),
          0,
          'id="tag_expose_lang" onchange="build_tag();"',
          false ) );

  // index, view
  $views = array(
          $this->Lang('view_index') => 'index',
          $this->Lang('view_fav') => 'fav',
  );
  $this->smarty->assign('input_index_view',$this->CreateInputSelectList(
          $id,
          'index_view',
          $views,
          array( 'index' ),
          0,
          'id="tag_index_view" onchange="build_tag();"',
          false ) );

  // index, mode
  $modes = array(
          $this->Lang('mode_entry') => 'entry',
          $this->Lang('mode_gallery') => 'gallery',
  );
  $this->smarty->assign('input_index_mode',$this->CreateInputSelectList(
          $id,
          'index_mode',
          $modes,
          array( 'entry' ),
          0,
          'id="tag_index_mode" onchange="build_tag();"',
          false ) );

  // index, order, by
  $orders = array();
  $defaultOrder = null;
  $orderNames = array();
  if (!is_callable(array('immotool_functions', 'list_available_orders'))) {
    // Mechanismus für ältere PHP-Exporte, um die registrierten Sortierungen zu verwenden
    if (is_array($setupIndex->OrderOptions)) {
      $orderNames = $setupIndex->OrderOptions;
    }
  }
  else {
    // alle verfügbaren Sortierungen verwenden
    $orderNames = immotool_functions::list_available_orders();
  }
  foreach ($orderNames as $key) {
    if (is_null($defaultOrder)) $defaultOrder = $key;
    $orderObj = immotool_functions::get_order($key);
    $by = $orderObj->getTitle( $translations, $lang );
    $orders[$by] = $key;
  }
  asort($orders);
  $this->smarty->assign('input_index_order_by',$this->CreateInputSelectList(
          $id,
          'index_order_by',
          $orders,
          array( $defaultOrder ),
          0,
          'id="tag_index_order_by" onchange="build_tag();"',
          false ) );

  // index, order, dir
  $dirs = array(
          $this->Lang('order_asc') => 'asc',
          $this->Lang('order_desc') => 'desc',
  );
  $this->smarty->assign('input_index_order_dir',$this->CreateInputSelectList(
          $id,
          'index_order_dir',
          $dirs,
          array( 'asc' ),
          0,
          'id="tag_index_order_dir" onchange="build_tag();"',
          false ) );

  // index, filters
  $filters = array();
  $filterIds = array();
  foreach (immotool_functions::list_available_filters() as $key) {
    $filterObj = immotool_functions::get_filter( $key );
    if (!is_object($filterObj)) continue;
    $filterWidget = $filterObj->getWidget( $filterValue, $lang, $translations, $setupIndex );
    if (!is_string($filterWidget) || strlen($filterWidget)==0) continue;
    $filterWidget = str_replace( '<select ', '<select onchange="build_tag();" ', $filterWidget );
    $filterWidget = str_replace( '<input ', '<input onchange="build_tag();" ', $filterWidget );
    $filters[] = $filterWidget;
    $filterIds[] = '\'filter_' . $key . '\'';
  }
  if (count($filters)>0) $this->smarty->assign('input_index_filters', implode( '<br/>', $filters ) );
  if (count($filterIds)>0) $this->smarty->assign('filter_ids', implode( ', ', $filterIds ) );

  // expose, view
  $views = array(
          $this->Lang('view_details') => 'details',
          $this->Lang('view_texts') => 'texts',
          $this->Lang('view_gallery') => 'gallery',
          $this->Lang('view_contact') => 'contact',
          $this->Lang('view_terms') => 'terms',
  );
  $this->smarty->assign('input_expose_view',$this->CreateInputSelectList(
          $id,
          'expose_view',
          $views,
          array( 'details' ),
          0,
          'id="tag_expose_view" onchange="build_tag();"',
          false ) );

  // expose, id
  $this->smarty->assign('input_expose_id',$this->CreateInputText(
          $id,
          'expose_id',
          '',
          50,
          255,
          'onchange="build_tag();" onkeydown="build_tag();" style="width:25em;"' ) );
}
else {
  $testResult = '<h3 style="color:red;">' . $this->Lang('title_wrap_test_error') . '</h3><ul>';
  foreach ($environmentErrors as $error) {
    $testResult .= '<ul>' . $error . '</ul>';
  }
  $testResult .= '</ul>';
}
$this->smarty->assign('wrap_test',$testResult);

$this->smarty->assign('tabs_start',$tab_header.$this->EndTabHeaders().$this->StartTabContent());
$this->smarty->assign('tab_end',$this->EndTab());
$this->smarty->assign('tabs_end',$this->EndTabContent());

$this->smarty->assign('module_url',$GLOBALS['config']['root_url'] . '/modules/' . $this->GetName() . '/' );


// Content defines and Form stuff for the admin
$smarty->assign('start_form', $this->CreateFormStart($id, 'save_admin_prefs', $returnid));
//$smarty->assign('input_allow_add',$this->CreateInputCheckbox($id, 'allow_add', 1,
//   $this->GetPreference('allow_add','0')). $this->Lang('title_allow_add_help'));

$smarty->assign('input_wrap_path',$this->CreateInputTextWithLabel(
        $id,
        'wrap_path',
        $this->GetPreference('wrap_path',''),
        50,
        255,
        'style="width:75%;"',
        $this->Lang('title_wrap_path_help') . '<br/>' ) );
$smarty->assign('input_wrap_url',$this->CreateInputTextWithLabel(
        $id,
        'wrap_url',
        $this->GetPreference('wrap_url',''),
        50,
        255,
        'style="width:75%;"',
        $this->Lang('title_wrap_url_help') . '<br/>' ) );

$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));

// pass a reference to the module, so smarty has access to module methods
$smarty->assign_by_ref('mod',$this);

echo $this->ProcessTemplate('adminpanel.tpl');
/**
 * You might also want to look at other modules that have done this :)
 *  (News and Questions are good examples)
 */

?>