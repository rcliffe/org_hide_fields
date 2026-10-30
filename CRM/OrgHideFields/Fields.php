<?php
declare(strict_types = 1);

use CRM_OrgHideFields_ExtensionUtil as E;

/**
 * Organisation fields that can be hidden, and where they appear on the contact screens.
 */
class CRM_OrgHideFields_Fields {

  /**
   * Gets the hideable fields.
   *
   * @return array
   */
  public static function getOptions(): array {
    return [
      'nick_name' => E::ts('Nickname'),
      'sic_code' => E::ts('SIC Code'),
      'contact_source' => E::ts('Contact Source'),
      'on_hold' => E::ts('Email On Hold'),
      'is_bulkmail' => E::ts('Email Bulk Mailings'),
      'phone' => E::ts('Phone (whole section)'),
      'is_deceased' => E::ts('Organisation is closed (and date closed)'),
      'external_identifier' => E::ts('External ID'),
      'contact_id' => E::ts('Contact ID'),
      'image_URL' => E::ts('Browse/Upload Image'),
    ];
  }

  /**
   * Gets the CSS selectors that hide each field.
   *
   * Each field is covered on the full edit form, the contact summary, and the summary's
   * inline edit forms. Core gives most of these cells no class of their own, so they are
   * found by the input they contain.
   *
   * @return array
   */
  public static function getSelectors(): array {
    return [
      'nick_name' => [
        'td:has(> [name="nick_name"])',
        '.crm-summary-row:has([name="nick_name"])',
        '.crm-summary-row:has(> .crm-contact-nick_name)',
      ],
      'sic_code' => [
        'td:has(> [name="sic_code"])',
        '.crm-summary-row:has([name="sic_code"])',
        '.crm-summary-row:has(> .crm-contact-sic_code)',
      ],
      'contact_source' => [
        'td:has(> [name="contact_source"])',
        '.crm-summary-row:has([name="contact_source"])',
        '.crm-summary-row:has(> .crm-contact_source)',
      ],
      'on_hold' => [
        'tr[id^="Email_Block_"] > td:has(> [name$="[on_hold]"])',
        // Column heading: the row just before the first email row.
        'tr:has(+ #Email_Block_1) > td:nth-child(2)',
      ],
      'is_bulkmail' => [
        'tr[id^="Email_Block_"] > td:has(> [name$="[is_bulkmail]"])',
        'tr:has(+ #Email_Block_1) > td:nth-child(3)',
      ],
      'phone' => [
        'tr[id^="Phone_Block_"]',
        'tr:has(+ #Phone_Block_1)',
        '#phone-block',
      ],
      'is_deceased' => [
        'td:has(> [name="is_deceased"])',
        '.crm-summary-row:has([name="is_deceased"])',
        // Date closed, on both the full and inline edit forms.
        '#showDeceasedDate',
      ],
      'external_identifier' => [
        'td:has(> [name="external_identifier"])',
        '.crm-summary-row:has(> .crm-contact_external_identifier_label)',
      ],
      'contact_id' => [
        'td:has(> #internal_identifier_display)',
        // Summary row; also holds the User ID when the contact has a user account.
        '.crm-summary-row:has(.crm-contact-contact_id)',
      ],
      'image_URL' => [
        // Upload field plus the current image and its delete link on the edit form.
        '.image_URL-section',
      ],
    ];
  }

}
