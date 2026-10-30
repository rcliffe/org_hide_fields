<?php
declare(strict_types = 1);

use CRM_OrgHideFields_ExtensionUtil as E;

return [
  'org_hide_fields_hidden' => [
    'name' => 'org_hide_fields_hidden',
    'type' => 'Array',
    'html_type' => 'checkboxes',
    'pseudoconstant' => [
      'callback' => ['CRM_OrgHideFields_Fields', 'getOptions'],
    ],
    'default' => ['nick_name', 'sic_code', 'contact_source', 'on_hold', 'is_bulkmail', 'phone'],
    'is_domain' => 1,
    'is_contact' => 0,
    'title' => E::ts('Hidden organisation fields'),
    'description' => E::ts('Fields to hide on the organisation add, edit and summary screens. Existing values are kept.'),
    'settings_pages' => ['org_hide_fields' => ['weight' => 10]],
  ],
];
