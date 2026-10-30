<?php
declare(strict_types = 1);

// phpcs:disable PSR1.Files.SideEffects
require_once 'org_hide_fields.civix.php';
// phpcs:enable

use CRM_OrgHideFields_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function org_hide_fields_civicrm_config(\CRM_Core_Config $config): void {
  _org_hide_fields_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function org_hide_fields_civicrm_install(): void {
  _org_hide_fields_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function org_hide_fields_civicrm_enable(): void {
  _org_hide_fields_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * Hides the configured fields on the full contact edit form for organisations.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_buildForm
 */
function org_hide_fields_civicrm_buildForm($formName, &$form): void {
  if ($formName === 'CRM_Contact_Form_Contact' && $form->_contactType === 'Organization') {
    _org_hide_fields_add_css();
  }
}

/**
 * Implements hook_civicrm_pageRun().
 *
 * Hides the configured fields on an organisation's summary. This also covers the inline
 * edit forms, which load into the summary page.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_pageRun
 */
function org_hide_fields_civicrm_pageRun(&$page): void {
  if ($page instanceof CRM_Contact_Page_View_Summary
    && CRM_Contact_BAO_Contact::getContactType($page->getContactID()) === 'Organization') {
    _org_hide_fields_add_css();
  }
}

/**
 * Adds CSS hiding the configured fields.
 *
 * The fields are hidden rather than removed from the forms, so their existing values are
 * still submitted and kept.
 */
function _org_hide_fields_add_css(): void {
  $selectors = array_intersect_key(
    CRM_OrgHideFields_Fields::getSelectors(),
    array_flip((array) Civi::settings()->get('org_hide_fields_hidden'))
  );
  if (!$selectors) {
    return;
  }
  // page-body is rendered for full pages and popups alike. !important overrides core
  // scripts that show rows inline, such as the closed date when its checkbox is ticked.
  CRM_Core_Region::instance('page-body')->add([
    'markup' => '<style>' . implode(', ', array_merge(...array_values($selectors))) . ' { display: none !important; }</style>',
  ]);
}
