<?php

/**
 * @file
 * depot_rp_entity.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function depot_rp_entity_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: navigation_regionalpartner-profilseite:node/add/regionalpartner.
  $menu_links['navigation_regionalpartner-profilseite:node/add/regionalpartner'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/regionalpartner',
    'router_path' => 'node/add/regionalpartner',
    'link_title' => 'Regionalpartner Profilseite',
    'options' => array(
      'attributes' => array(
        'title' => 'Frei gestaltbare Seite des Depot-Regionalpartner\'s',
      ),
      'identifier' => 'navigation_regionalpartner-profilseite:node/add/regionalpartner',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 0,
    'parent_identifier' => 'navigation_inhalt-hinzufgen:node/add',
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Regionalpartner Profilseite');

  return $menu_links;
}
