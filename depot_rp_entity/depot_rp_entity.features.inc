<?php

/**
 * @file
 * depot_rp_entity.features.inc
 */

/**
 * Implements hook_views_api().
 */
function depot_rp_entity_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_eck_bundle_info().
 */
function depot_rp_entity_eck_bundle_info() {
  $items = array(
    'depot_rp_report_depot_rp_report_bookings_amount' => array(
      'machine_name' => 'depot_rp_report_depot_rp_report_bookings_amount',
      'entity_type' => 'depot_rp_report',
      'name' => 'depot_rp_report_bookings_amount',
      'label' => 'Soll: Anzahl Buchungen',
      'config' => array(
        'managed_properties' => array(
          'created' => 0,
        ),
      ),
    ),
    'depot_rp_report_depot_rp_report_resources_amount' => array(
      'machine_name' => 'depot_rp_report_depot_rp_report_resources_amount',
      'entity_type' => 'depot_rp_report',
      'name' => 'depot_rp_report_resources_amount',
      'label' => 'Soll: Anzahl Ressourcen',
      'config' => array(),
    ),
    'depot_rp_report_depot_rp_report_users_amount' => array(
      'machine_name' => 'depot_rp_report_depot_rp_report_users_amount',
      'entity_type' => 'depot_rp_report',
      'name' => 'depot_rp_report_users_amount',
      'label' => 'Soll: Anzahl Nutzer',
      'config' => array(
        'managed_properties' => array(
          'created' => 0,
        ),
      ),
    ),
  );
  return $items;
}

/**
 * Implements hook_eck_entity_type_info().
 */
function depot_rp_entity_eck_entity_type_info() {
  $items = array(
    'depot_rp_report' => array(
      'name' => 'depot_rp_report',
      'label' => 'depot_rp_report',
      'properties' => array(
        'created' => array(
          'label' => 'Created',
          'type' => 'integer',
          'behavior' => 'created',
        ),
        'title' => array(
          'label' => 'Title',
          'type' => 'text',
          'behavior' => 'title',
        ),
      ),
    ),
  );
  return $items;
}

/**
 * Implements hook_node_info().
 */
function depot_rp_entity_node_info() {
  $items = array(
    'regionalpartner' => array(
      'name' => t('Regionalpartner Profilseite'),
      'base' => 'node_content',
      'description' => t('Frei gestaltbare Seite des Depot-Regionalpartner\'s'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
