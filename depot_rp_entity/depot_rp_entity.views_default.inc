<?php

/**
 * @file
 * depot_rp_entity.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function depot_rp_entity_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'block_depot_admin_ausstehende_genehmigung';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'bat_types';
  $view->human_name = 'Ressourcen: Ausstehende Genehmigung';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Ressourcen: Ausstehende Genehmigung';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['reset_button_label'] = 'Zurücksetzen';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'type_id' => 'type_id',
    'field_slug' => 'field_slug',
    'name' => 'name',
    'revision_timestamp' => 'revision_timestamp',
    'uid' => 'uid',
    'field_bild_i' => 'field_bild_i',
  );
  $handler->display->display_options['style_options']['default'] = 'revision_timestamp';
  $handler->display->display_options['style_options']['info'] = array(
    'type_id' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_slug' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'name' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'revision_timestamp' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'uid' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_bild_i' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Feld: Typ: Bild I */
  $handler->display->display_options['fields']['field_bild_i']['id'] = 'field_bild_i';
  $handler->display->display_options['fields']['field_bild_i']['table'] = 'field_data_field_bild_i';
  $handler->display->display_options['fields']['field_bild_i']['field'] = 'field_bild_i';
  $handler->display->display_options['fields']['field_bild_i']['label'] = '';
  $handler->display->display_options['fields']['field_bild_i']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_bild_i']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_bild_i']['settings'] = array(
    'image_style' => 'thumbnail',
    'image_link' => '',
  );
  /* Feld: Typ: Typ ID */
  $handler->display->display_options['fields']['type_id']['id'] = 'type_id';
  $handler->display->display_options['fields']['type_id']['table'] = 'bat_types';
  $handler->display->display_options['fields']['type_id']['field'] = 'type_id';
  $handler->display->display_options['fields']['type_id']['label'] = 'ID';
  /* Feld: Typ: Slug */
  $handler->display->display_options['fields']['field_slug']['id'] = 'field_slug';
  $handler->display->display_options['fields']['field_slug']['table'] = 'field_data_field_slug';
  $handler->display->display_options['fields']['field_slug']['field'] = 'field_slug';
  $handler->display->display_options['fields']['field_slug']['label'] = '';
  $handler->display->display_options['fields']['field_slug']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_slug']['element_label_colon'] = FALSE;
  /* Feld: Type revision: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'bat_types_revision';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['path'] = 'ressourcen/[field_slug]';
  $handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
  /* Feld: Type revision: Revision date */
  $handler->display->display_options['fields']['revision_timestamp']['id'] = 'revision_timestamp';
  $handler->display->display_options['fields']['revision_timestamp']['table'] = 'bat_types_revision';
  $handler->display->display_options['fields']['revision_timestamp']['field'] = 'revision_timestamp';
  $handler->display->display_options['fields']['revision_timestamp']['label'] = 'Erstellt vor';
  $handler->display->display_options['fields']['revision_timestamp']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['revision_timestamp']['date_format'] = 'raw time ago';
  $handler->display->display_options['fields']['revision_timestamp']['second_date_format'] = 'bat_daily';
  /* Feld: Typ: Uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'bat_types';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['label'] = '';
  $handler->display->display_options['fields']['uid']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['uid']['alter']['text'] = 'Nutzerprofil öffnen';
  $handler->display->display_options['fields']['uid']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['uid']['alter']['path'] = '/user/[uid]';
  $handler->display->display_options['fields']['uid']['element_label_colon'] = FALSE;
  /* Feld: Typ: Edit Link */
  $handler->display->display_options['fields']['edit_type']['id'] = 'edit_type';
  $handler->display->display_options['fields']['edit_type']['table'] = 'bat_types';
  $handler->display->display_options['fields']['edit_type']['field'] = 'edit_type';
  $handler->display->display_options['fields']['edit_type']['label'] = '';
  $handler->display->display_options['fields']['edit_type']['alter']['text'] = 'Bearbeiten / Genehmigen';
  $handler->display->display_options['fields']['edit_type']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['edit_type']['text'] = 'Bearbeiten / Genehmigen';
  /* Filter criterion: Typ: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'bat_types';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'depot' => 'depot',
  );
  /* Filter criterion: Typ: Aktiviert (field_aktiviert) */
  $handler->display->display_options['filters']['field_aktiviert_value']['id'] = 'field_aktiviert_value';
  $handler->display->display_options['filters']['field_aktiviert_value']['table'] = 'field_data_field_aktiviert';
  $handler->display->display_options['filters']['field_aktiviert_value']['field'] = 'field_aktiviert_value';
  $handler->display->display_options['filters']['field_aktiviert_value']['value'] = array(
    0 => '0',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'ressourcen-ausstehende-genehmigung';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'field_bild_i' => 'field_bild_i',
    'type_id' => 'type_id',
    'field_slug' => 'field_slug',
    'name' => 'name',
    'revision_timestamp' => 'revision_timestamp',
    'uid' => 'uid',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'field_bild_i' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'type_id' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_slug' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'name' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'revision_timestamp' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'uid' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $translatables['block_depot_admin_ausstehende_genehmigung'] = array(
    t('Master'),
    t('Ressourcen: Ausstehende Genehmigung'),
    t('more'),
    t('Apply'),
    t('Zurücksetzen'),
    t('Sort by'),
    t('Asc'),
    t('Desc'),
    t('ID'),
    t('.'),
    t(','),
    t('Name'),
    t('Erstellt vor'),
    t('Nutzerprofil öffnen'),
    t('Bearbeiten / Genehmigen'),
    t('Page'),
    t('Block'),
  );
  $export['block_depot_admin_ausstehende_genehmigung'] = $view;

  $view = new view();
  $view->name = 'blog_rss_view';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'blog_rss_view';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Der Depot Blog (RSS Feed)';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['reset_button_label'] = 'Zurücksetzen';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['tags']['first'] = '« erste Seite';
  $handler->display->display_options['pager']['options']['tags']['previous'] = '‹ vorherige Seite';
  $handler->display->display_options['pager']['options']['tags']['next'] = 'nächste Seite ›';
  $handler->display->display_options['pager']['options']['tags']['last'] = 'letzte Seite »';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['columns'] = '3';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Feld: Inhalt: Titel */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_type'] = 'h4';
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  /* Feld: Inhalt: Post date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'node';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['label'] = '';
  $handler->display->display_options['fields']['created']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['created']['date_format'] = 'custom';
  $handler->display->display_options['fields']['created']['custom_date_format'] = 'D., d. M Y';
  $handler->display->display_options['fields']['created']['second_date_format'] = 'bat_daily';
  /* Feld: Inhalt: Artikelbild */
  $handler->display->display_options['fields']['field_bild']['id'] = 'field_bild';
  $handler->display->display_options['fields']['field_bild']['table'] = 'field_data_field_bild';
  $handler->display->display_options['fields']['field_bild']['field'] = 'field_bild';
  $handler->display->display_options['fields']['field_bild']['label'] = '';
  $handler->display->display_options['fields']['field_bild']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_bild']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_bild']['settings'] = array(
    'image_style' => 'large',
    'image_link' => 'content',
  );
  /* Feld: Inhalt: Kategorie(n) */
  $handler->display->display_options['fields']['field_tax_kategorie']['id'] = 'field_tax_kategorie';
  $handler->display->display_options['fields']['field_tax_kategorie']['table'] = 'field_data_field_tax_kategorie';
  $handler->display->display_options['fields']['field_tax_kategorie']['field'] = 'field_tax_kategorie';
  $handler->display->display_options['fields']['field_tax_kategorie']['label'] = 'Kategorie(n):';
  $handler->display->display_options['fields']['field_tax_kategorie']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_tax_kategorie']['alter']['path'] = 'blog/[field_tax_kategorie]';
  $handler->display->display_options['fields']['field_tax_kategorie']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_tax_kategorie']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_tax_kategorie']['delta_offset'] = '0';
  /* Feld: Inhalt: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['alter']['text'] = '[body]

[view_node]';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['body']['type'] = 'text_trimmed';
  $handler->display->display_options['fields']['body']['settings'] = array(
    'trim_length' => '1200',
  );
  /* Feld: Inhalt: Link */
  $handler->display->display_options['fields']['view_node']['id'] = 'view_node';
  $handler->display->display_options['fields']['view_node']['table'] = 'views_entity_node';
  $handler->display->display_options['fields']['view_node']['field'] = 'view_node';
  $handler->display->display_options['fields']['view_node']['label'] = '';
  $handler->display->display_options['fields']['view_node']['alter']['text'] = '[view_node]';
  $handler->display->display_options['fields']['view_node']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['view_node']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['view_node']['element_default_classes'] = FALSE;
  /* Feld: Inhalt: Author uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'node';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['label'] = '';
  $handler->display->display_options['fields']['uid']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['uid']['alter']['text'] = 'Depot Team';
  $handler->display->display_options['fields']['uid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['uid']['link_to_user'] = FALSE;
  /* Sort criterion: Inhalt: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Inhalt: Kategorie(n) (field_tax_kategorie:delta) */
  $handler->display->display_options['arguments']['delta']['id'] = 'delta';
  $handler->display->display_options['arguments']['delta']['table'] = 'field_data_field_tax_kategorie';
  $handler->display->display_options['arguments']['delta']['field'] = 'delta';
  $handler->display->display_options['arguments']['delta']['exception']['title'] = 'Alle';
  $handler->display->display_options['arguments']['delta']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['delta']['default_argument_skip_url'] = TRUE;
  $handler->display->display_options['arguments']['delta']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['delta']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['delta']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Inhalt: Veröffentlicht */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Inhalt: Typ */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'artikel' => 'artikel',
  );

  /* Display: Feed */
  $handler = $view->new_display('feed', 'Feed', 'artikel_rss_feed');
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '0';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'rss';
  $handler->display->display_options['style_options']['grouping'] = array(
    0 => array(
      'field' => 'created',
      'rendered' => 1,
      'rendered_strip' => 0,
    ),
  );
  $handler->display->display_options['style_options']['description'] = 'Alle Artikel von depot.social';
  $handler->display->display_options['row_plugin'] = 'node_rss';
  $handler->display->display_options['path'] = 'blog/rss.xml';
  $handler->display->display_options['displays'] = array(
    'page' => 'page',
    'default' => 0,
  );
  $handler->display->display_options['sitename_title'] = 0;
  $translatables['blog_rss_view'] = array(
    t('Master'),
    t('Der Depot Blog (RSS Feed)'),
    t('more'),
    t('Apply'),
    t('Zurücksetzen'),
    t('Sort by'),
    t('Asc'),
    t('Desc'),
    t('Items per page'),
    t('- All -'),
    t('Offset'),
    t('« erste Seite'),
    t('‹ vorherige Seite'),
    t('nächste Seite ›'),
    t('letzte Seite »'),
    t('Kategorie(n):'),
    t('[body]

[view_node]'),
    t('[view_node]'),
    t('Depot Team'),
    t('Alle'),
    t('Feed'),
  );
  $export['blog_rss_view'] = $view;

  $view = new view();
  $view->name = 'neue_nutzer';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Neue Nutzer';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Neue Nutzer';
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['reset_button_label'] = 'Zurücksetzen';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '12';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['pager']['options']['tags']['first'] = '« erste Seite';
  $handler->display->display_options['pager']['options']['tags']['previous'] = '‹ vorherige Seite';
  $handler->display->display_options['pager']['options']['tags']['next'] = 'nächste Seite ›';
  $handler->display->display_options['pager']['options']['tags']['last'] = 'letzte Seite »';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'name' => 'name',
    'field_anrede' => 'field_anrede',
    'field_nachname' => 'field_nachname',
    'field_vorname' => 'field_vorname',
    'created' => 'created',
    'status' => 'status',
    'edit_node' => 'edit_node',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'name' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_anrede' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_nachname' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_vorname' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'created' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'status' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'edit_node' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Feld: Benutzer: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = 'Nutzername';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['name']['element_label_colon'] = FALSE;
  /* Feld: Benutzer: Anrede */
  $handler->display->display_options['fields']['field_anrede']['id'] = 'field_anrede';
  $handler->display->display_options['fields']['field_anrede']['table'] = 'field_data_field_anrede';
  $handler->display->display_options['fields']['field_anrede']['field'] = 'field_anrede';
  $handler->display->display_options['fields']['field_anrede']['label'] = '';
  $handler->display->display_options['fields']['field_anrede']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_anrede']['element_label_colon'] = FALSE;
  /* Feld: Benutzer: Nachname */
  $handler->display->display_options['fields']['field_nachname']['id'] = 'field_nachname';
  $handler->display->display_options['fields']['field_nachname']['table'] = 'field_data_field_nachname';
  $handler->display->display_options['fields']['field_nachname']['field'] = 'field_nachname';
  $handler->display->display_options['fields']['field_nachname']['label'] = '';
  $handler->display->display_options['fields']['field_nachname']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_nachname']['element_label_colon'] = FALSE;
  /* Feld: Benutzer: Vorname */
  $handler->display->display_options['fields']['field_vorname']['id'] = 'field_vorname';
  $handler->display->display_options['fields']['field_vorname']['table'] = 'field_data_field_vorname';
  $handler->display->display_options['fields']['field_vorname']['field'] = 'field_vorname';
  $handler->display->display_options['fields']['field_vorname']['label'] = 'Name';
  $handler->display->display_options['fields']['field_vorname']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_vorname']['alter']['text'] = '[field_anrede] [field_vorname] [field_nachname]';
  /* Feld: Benutzer: Created date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'users';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['label'] = 'Erstellt vor';
  $handler->display->display_options['fields']['created']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['created']['date_format'] = 'raw time ago';
  $handler->display->display_options['fields']['created']['second_date_format'] = 'bat_daily';
  /* Feld: Benutzer: Aktiv */
  $handler->display->display_options['fields']['status']['id'] = 'status';
  $handler->display->display_options['fields']['status']['table'] = 'users';
  $handler->display->display_options['fields']['status']['field'] = 'status';
  $handler->display->display_options['fields']['status']['label'] = 'Inaktiv / Geblockt?';
  $handler->display->display_options['fields']['status']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['status']['not'] = 1;
  /* Feld: Benutzer: Edit link */
  $handler->display->display_options['fields']['edit_node']['id'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['table'] = 'users';
  $handler->display->display_options['fields']['edit_node']['field'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['label'] = '';
  $handler->display->display_options['fields']['edit_node']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['edit_node']['text'] = 'Bearbeiten / Genehmigen';
  /* Sort criterion: Benutzer: Created date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'users';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  $handler->display->display_options['sorts']['created']['expose']['label'] = 'Created date';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $translatables['neue_nutzer'] = array(
    t('Master'),
    t('Neue Nutzer'),
    t('more'),
    t('Apply'),
    t('Zurücksetzen'),
    t('Sort by'),
    t('Asc'),
    t('Desc'),
    t('Items per page'),
    t('- All -'),
    t('Offset'),
    t('« erste Seite'),
    t('‹ vorherige Seite'),
    t('nächste Seite ›'),
    t('letzte Seite »'),
    t('Nutzername'),
    t('Name'),
    t('[field_anrede] [field_vorname] [field_nachname]'),
    t('Erstellt vor'),
    t('Inaktiv / Geblockt?'),
    t('Bearbeiten / Genehmigen'),
    t('Created date'),
    t('Block'),
  );
  $export['neue_nutzer'] = $view;

  $view = new view();
  $view->name = 'tax';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Artikelübersicht';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Der Depot Blog';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['reset_button_label'] = 'Zurücksetzen';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['tags']['first'] = '« erste Seite';
  $handler->display->display_options['pager']['options']['tags']['previous'] = '‹ vorherige Seite';
  $handler->display->display_options['pager']['options']['tags']['next'] = 'nächste Seite ›';
  $handler->display->display_options['pager']['options']['tags']['last'] = 'letzte Seite »';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['columns'] = '3';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Kopfbereich: Global: Unfiltered text */
  $handler->display->display_options['header']['area_text_custom']['id'] = 'area_text_custom';
  $handler->display->display_options['header']['area_text_custom']['table'] = 'views';
  $handler->display->display_options['header']['area_text_custom']['field'] = 'area_text_custom';
  $handler->display->display_options['header']['area_text_custom']['content'] = '<a href="/blog/rss.xml" class="right" title="Alle Blog-Artikel als RSS-Feed abonnieren">
  <img src="/sites/all/themes/depot_theme/images/rss.svg" width="10" /> RSS-Feed abonnieren
</a>';
  /* Feld: Inhalt: Titel */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_type'] = 'h4';
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  /* Feld: Inhalt: Post date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'node';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['label'] = '';
  $handler->display->display_options['fields']['created']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['created']['date_format'] = 'custom';
  $handler->display->display_options['fields']['created']['custom_date_format'] = 'D., d. M Y';
  $handler->display->display_options['fields']['created']['second_date_format'] = 'bat_daily';
  /* Feld: Inhalt: Artikelbild */
  $handler->display->display_options['fields']['field_bild']['id'] = 'field_bild';
  $handler->display->display_options['fields']['field_bild']['table'] = 'field_data_field_bild';
  $handler->display->display_options['fields']['field_bild']['field'] = 'field_bild';
  $handler->display->display_options['fields']['field_bild']['label'] = '';
  $handler->display->display_options['fields']['field_bild']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_bild']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_bild']['settings'] = array(
    'image_style' => 'large',
    'image_link' => 'content',
  );
  /* Feld: Inhalt: Kategorie(n) */
  $handler->display->display_options['fields']['field_tax_kategorie']['id'] = 'field_tax_kategorie';
  $handler->display->display_options['fields']['field_tax_kategorie']['table'] = 'field_data_field_tax_kategorie';
  $handler->display->display_options['fields']['field_tax_kategorie']['field'] = 'field_tax_kategorie';
  $handler->display->display_options['fields']['field_tax_kategorie']['label'] = 'Kategorie(n):';
  $handler->display->display_options['fields']['field_tax_kategorie']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_tax_kategorie']['alter']['path'] = 'blog/[field_tax_kategorie]';
  $handler->display->display_options['fields']['field_tax_kategorie']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_tax_kategorie']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_tax_kategorie']['delta_offset'] = '0';
  /* Feld: Inhalt: Body */
  $handler->display->display_options['fields']['body']['id'] = 'body';
  $handler->display->display_options['fields']['body']['table'] = 'field_data_body';
  $handler->display->display_options['fields']['body']['field'] = 'body';
  $handler->display->display_options['fields']['body']['label'] = '';
  $handler->display->display_options['fields']['body']['alter']['text'] = '[body]

[view_node]';
  $handler->display->display_options['fields']['body']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['body']['type'] = 'text_trimmed';
  $handler->display->display_options['fields']['body']['settings'] = array(
    'trim_length' => '365',
  );
  /* Feld: Inhalt: Link */
  $handler->display->display_options['fields']['view_node']['id'] = 'view_node';
  $handler->display->display_options['fields']['view_node']['table'] = 'views_entity_node';
  $handler->display->display_options['fields']['view_node']['field'] = 'view_node';
  $handler->display->display_options['fields']['view_node']['label'] = '';
  $handler->display->display_options['fields']['view_node']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['view_node']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['view_node']['text'] = 'Weiterlesen...';
  /* Sort criterion: Inhalt: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Inhalt: Kategorie(n) (field_tax_kategorie:delta) */
  $handler->display->display_options['arguments']['delta']['id'] = 'delta';
  $handler->display->display_options['arguments']['delta']['table'] = 'field_data_field_tax_kategorie';
  $handler->display->display_options['arguments']['delta']['field'] = 'delta';
  $handler->display->display_options['arguments']['delta']['exception']['title'] = 'Alle';
  $handler->display->display_options['arguments']['delta']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['delta']['default_argument_skip_url'] = TRUE;
  $handler->display->display_options['arguments']['delta']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['delta']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['delta']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Inhalt: Veröffentlicht */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Inhalt: Typ */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'artikel' => 'artikel',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'blog';
  $translatables['tax'] = array(
    t('Master'),
    t('Der Depot Blog'),
    t('more'),
    t('Apply'),
    t('Zurücksetzen'),
    t('Sort by'),
    t('Asc'),
    t('Desc'),
    t('Items per page'),
    t('- All -'),
    t('Offset'),
    t('« erste Seite'),
    t('‹ vorherige Seite'),
    t('nächste Seite ›'),
    t('letzte Seite »'),
    t('<a href="/blog/rss.xml" class="right" title="Alle Blog-Artikel als RSS-Feed abonnieren">
  <img src="/sites/all/themes/depot_theme/images/rss.svg" width="10" /> RSS-Feed abonnieren
</a>'),
    t('Kategorie(n):'),
    t('[body]

[view_node]'),
    t('Weiterlesen...'),
    t('Alle'),
    t('Page'),
  );
  $export['tax'] = $view;

  return $export;
}
