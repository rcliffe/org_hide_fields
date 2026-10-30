<?php
declare(strict_types = 1);

use CRM_OrgHideFields_ExtensionUtil as E;

return [
  [
    'name' => 'Navigation_Customize_Navigation_Hide_Organisation_Fields',
    'entity' => 'Navigation',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'label' => E::ts('Hide Organisation Fields'),
        'name' => 'Hide Organisation Fields',
        'url' => 'civicrm/admin/setting/org_hide_fields?reset=1',
        'icon' => NULL,
        'permission' => 'administer CiviCRM',
        'permission_operator' => '',
        'parent_id.name' => 'Customize Data and Screens',
        'is_active' => TRUE,
        'domain_id' => 'current_domain',
      ],
      'match' => ['domain_id', 'name'],
    ],
  ],
];
