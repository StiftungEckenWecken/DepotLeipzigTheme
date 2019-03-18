<?php

/**
 * @file
 * depot_rp_entity.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function depot_rp_entity_user_default_roles() {
  $roles = array();

  // Exported role: Regionalpartner.
  $roles['Regionalpartner'] = array(
    'name' => 'Regionalpartner',
    'weight' => 5,
  );

  return $roles;
}
