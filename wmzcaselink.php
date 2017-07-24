<?php

require_once 'wmzcaselink.civix.php';

function wmzcaselink_civicrm_alterTemplateFile($formName, &$form, $context, &$tplName) {
  if ($formName == 'CRM_Caselink_Page_Cases') {
    $coach_relationship_type = civicrm_api3('RelationshipType', 'getvalue', array('name_b_a' => 'Coach', 'return' => 'id'));
    $cases = $form->get_template_vars('cases');
    foreach($cases as $idx => $case) {
      try {
        $relationship = civicrm_api3('Relationship', 'getsingle', [
          'status' => 1,
          'case_id' => $case['case_id'],
          'relationship_type_id' => $coach_relationship_type
        ]);
        $coach = civicrm_api3('Contact', 'getsingle', ['id' => $relationship['contact_id_b']]);
        $cases[$idx]['coach'] = $coach['display_name'];
      } catch (Exception $e) {
        // Do nothing.
      }
    }
    $form->assign('cases', $cases);
    $tplName = 'CRM/Wmzcaselink/Page/Cases.tpl';
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function wmzcaselink_civicrm_config(&$config) {
  _wmzcaselink_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function wmzcaselink_civicrm_xmlMenu(&$files) {
  _wmzcaselink_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function wmzcaselink_civicrm_install() {
  _wmzcaselink_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function wmzcaselink_civicrm_postInstall() {
  _wmzcaselink_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function wmzcaselink_civicrm_uninstall() {
  _wmzcaselink_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function wmzcaselink_civicrm_enable() {
  _wmzcaselink_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function wmzcaselink_civicrm_disable() {
  _wmzcaselink_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function wmzcaselink_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _wmzcaselink_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function wmzcaselink_civicrm_managed(&$entities) {
  _wmzcaselink_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function wmzcaselink_civicrm_caseTypes(&$caseTypes) {
  _wmzcaselink_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function wmzcaselink_civicrm_angularModules(&$angularModules) {
  _wmzcaselink_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function wmzcaselink_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _wmzcaselink_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function wmzcaselink_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function wmzcaselink_civicrm_navigationMenu(&$menu) {
  _wmzcaselink_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'be.werkmetzin.wmzcaselink')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _wmzcaselink_civix_navigationMenu($menu);
} // */
