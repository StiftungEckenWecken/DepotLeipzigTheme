<?php

/**
 * @file
 * depot_rp_entity.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function depot_rp_entity_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'access add type service'.
  $permissions['access add type service'] = array(
    'name' => 'access add type service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access add unit service'.
  $permissions['access add unit service'] = array(
    'name' => 'access add unit service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access administration pages'.
  $permissions['access administration pages'] = array(
    'name' => 'access administration pages',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'system',
  );

  // Exported permission: 'access all views'.
  $permissions['access all views'] = array(
    'name' => 'access all views',
    'roles' => array(),
    'module' => 'views',
  );

  // Exported permission: 'access comments'.
  $permissions['access comments'] = array(
    'name' => 'access comments',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'access content'.
  $permissions['access content'] = array(
    'name' => 'access content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'node',
  );

  // Exported permission: 'access content overview'.
  $permissions['access content overview'] = array(
    'name' => 'access content overview',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'access dashboard'.
  $permissions['access dashboard'] = array(
    'name' => 'access dashboard',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'dashboard',
  );

  // Exported permission: 'access edit event service'.
  $permissions['access edit event service'] = array(
    'name' => 'access edit event service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access edit type service'.
  $permissions['access edit type service'] = array(
    'name' => 'access edit type service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access edit unit service'.
  $permissions['access edit unit service'] = array(
    'name' => 'access edit unit service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access events calendar index service'.
  $permissions['access events calendar index service'] = array(
    'name' => 'access events calendar index service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access events index service'.
  $permissions['access events index service'] = array(
    'name' => 'access events index service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access matching units calendar index service'.
  $permissions['access matching units calendar index service'] = array(
    'name' => 'access matching units calendar index service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access piwik reports'.
  $permissions['access piwik reports'] = array(
    'name' => 'access piwik reports',
    'roles' => array(),
    'module' => 'piwik_reports',
  );

  // Exported permission: 'access private fields'.
  $permissions['access private fields'] = array(
    'name' => 'access private fields',
    'roles' => array(),
    'module' => 'field_permissions',
  );

  // Exported permission: 'access site in maintenance mode'.
  $permissions['access site in maintenance mode'] = array(
    'name' => 'access site in maintenance mode',
    'roles' => array(),
    'module' => 'system',
  );

  // Exported permission: 'access site reports'.
  $permissions['access site reports'] = array(
    'name' => 'access site reports',
    'roles' => array(),
    'module' => 'system',
  );

  // Exported permission: 'access site-wide contact form'.
  $permissions['access site-wide contact form'] = array(
    'name' => 'access site-wide contact form',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'contact',
  );

  // Exported permission: 'access toolbar'.
  $permissions['access toolbar'] = array(
    'name' => 'access toolbar',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'toolbar',
  );

  // Exported permission: 'access types index service'.
  $permissions['access types index service'] = array(
    'name' => 'access types index service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access units calendar index service'.
  $permissions['access units calendar index service'] = array(
    'name' => 'access units calendar index service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access units index service'.
  $permissions['access units index service'] = array(
    'name' => 'access units index service',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_api',
  );

  // Exported permission: 'access user contact forms'.
  $permissions['access user contact forms'] = array(
    'name' => 'access user contact forms',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'contact',
  );

  // Exported permission: 'access user profiles'.
  $permissions['access user profiles'] = array(
    'name' => 'access user profiles',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'user',
  );

  // Exported permission: 'add JS snippets for piwik'.
  $permissions['add JS snippets for piwik'] = array(
    'name' => 'add JS snippets for piwik',
    'roles' => array(),
    'module' => 'piwik',
  );

  // Exported permission: 'administer CAPTCHA settings'.
  $permissions['administer CAPTCHA settings'] = array(
    'name' => 'administer CAPTCHA settings',
    'roles' => array(),
    'module' => 'captcha',
  );

  // Exported permission: 'administer EU Cookie Compliance popup'.
  $permissions['administer EU Cookie Compliance popup'] = array(
    'name' => 'administer EU Cookie Compliance popup',
    'roles' => array(
      'Administrator' => 'Administrator',
    ),
    'module' => 'eu_cookie_compliance',
  );

  // Exported permission: 'administer actions'.
  $permissions['administer actions'] = array(
    'name' => 'administer actions',
    'roles' => array(),
    'module' => 'system',
  );

  // Exported permission: 'administer bat_booking_type entities'.
  $permissions['administer bat_booking_type entities'] = array(
    'name' => 'administer bat_booking_type entities',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'administer bat_event_type entities'.
  $permissions['administer bat_event_type entities'] = array(
    'name' => 'administer bat_event_type entities',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'administer bat_type_bundle entities'.
  $permissions['administer bat_type_bundle entities'] = array(
    'name' => 'administer bat_type_bundle entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'administer bat_unit_bundle entities'.
  $permissions['administer bat_unit_bundle entities'] = array(
    'name' => 'administer bat_unit_bundle entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'administer blocks'.
  $permissions['administer blocks'] = array(
    'name' => 'administer blocks',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'block',
  );

  // Exported permission: 'administer calendar events'.
  $permissions['administer calendar events'] = array(
    'name' => 'administer calendar events',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_fullcalendar',
  );

  // Exported permission: 'administer ckeditor'.
  $permissions['administer ckeditor'] = array(
    'name' => 'administer ckeditor',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'ckeditor',
  );

  // Exported permission: 'administer comments'.
  $permissions['administer comments'] = array(
    'name' => 'administer comments',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'administer contact forms'.
  $permissions['administer contact forms'] = array(
    'name' => 'administer contact forms',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'contact',
  );

  // Exported permission: 'administer content types'.
  $permissions['administer content types'] = array(
    'name' => 'administer content types',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'administer facets'.
  $permissions['administer facets'] = array(
    'name' => 'administer facets',
    'roles' => array(),
    'module' => 'facetapi',
  );

  // Exported permission: 'administer features'.
  $permissions['administer features'] = array(
    'name' => 'administer features',
    'roles' => array(),
    'module' => 'features',
  );

  // Exported permission: 'administer field permissions'.
  $permissions['administer field permissions'] = array(
    'name' => 'administer field permissions',
    'roles' => array(),
    'module' => 'field_permissions',
  );

  // Exported permission: 'administer fields'.
  $permissions['administer fields'] = array(
    'name' => 'administer fields',
    'roles' => array(),
    'module' => 'field',
  );

  // Exported permission: 'administer file types'.
  $permissions['administer file types'] = array(
    'name' => 'administer file types',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'administer files'.
  $permissions['administer files'] = array(
    'name' => 'administer files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'administer filters'.
  $permissions['administer filters'] = array(
    'name' => 'administer filters',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'filter',
  );

  // Exported permission: 'administer image styles'.
  $permissions['administer image styles'] = array(
    'name' => 'administer image styles',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'image',
  );

  // Exported permission: 'administer languages'.
  $permissions['administer languages'] = array(
    'name' => 'administer languages',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'locale',
  );

  // Exported permission: 'administer menu'.
  $permissions['administer menu'] = array(
    'name' => 'administer menu',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'menu',
  );

  // Exported permission: 'administer modules'.
  $permissions['administer modules'] = array(
    'name' => 'administer modules',
    'roles' => array(),
    'module' => 'system',
  );

  // Exported permission: 'administer mpdf settings'.
  $permissions['administer mpdf settings'] = array(
    'name' => 'administer mpdf settings',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'pdf_using_mpdf',
  );

  // Exported permission: 'administer nodes'.
  $permissions['administer nodes'] = array(
    'name' => 'administer nodes',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'administer permissions'.
  $permissions['administer permissions'] = array(
    'name' => 'administer permissions',
    'roles' => array(),
    'module' => 'user',
  );

  // Exported permission: 'administer piwik'.
  $permissions['administer piwik'] = array(
    'name' => 'administer piwik',
    'roles' => array(),
    'module' => 'piwik',
  );

  // Exported permission: 'administer piwik reports'.
  $permissions['administer piwik reports'] = array(
    'name' => 'administer piwik reports',
    'roles' => array(),
    'module' => 'piwik_reports',
  );

  // Exported permission: 'administer recaptcha'.
  $permissions['administer recaptcha'] = array(
    'name' => 'administer recaptcha',
    'roles' => array(),
    'module' => 'recaptcha',
  );

  // Exported permission: 'administer search'.
  $permissions['administer search'] = array(
    'name' => 'administer search',
    'roles' => array(),
    'module' => 'search',
  );

  // Exported permission: 'administer search_api'.
  $permissions['administer search_api'] = array(
    'name' => 'administer search_api',
    'roles' => array(),
    'module' => 'search_api',
  );

  // Exported permission: 'administer services'.
  $permissions['administer services'] = array(
    'name' => 'administer services',
    'roles' => array(),
    'module' => 'services',
  );

  // Exported permission: 'administer site configuration'.
  $permissions['administer site configuration'] = array(
    'name' => 'administer site configuration',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'system',
  );

  // Exported permission: 'administer software updates'.
  $permissions['administer software updates'] = array(
    'name' => 'administer software updates',
    'roles' => array(),
    'module' => 'system',
  );

  // Exported permission: 'administer switch_user'.
  $permissions['administer switch_user'] = array(
    'name' => 'administer switch_user',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'switch_user',
  );

  // Exported permission: 'administer taxonomy'.
  $permissions['administer taxonomy'] = array(
    'name' => 'administer taxonomy',
    'roles' => array(),
    'module' => 'taxonomy',
  );

  // Exported permission: 'administer themes'.
  $permissions['administer themes'] = array(
    'name' => 'administer themes',
    'roles' => array(),
    'module' => 'system',
  );

  // Exported permission: 'administer unit tests'.
  $permissions['administer unit tests'] = array(
    'name' => 'administer unit tests',
    'roles' => array(),
    'module' => 'simpletest',
  );

  // Exported permission: 'administer url aliases'.
  $permissions['administer url aliases'] = array(
    'name' => 'administer url aliases',
    'roles' => array(),
    'module' => 'path',
  );

  // Exported permission: 'administer users'.
  $permissions['administer users'] = array(
    'name' => 'administer users',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'user',
  );

  // Exported permission: 'administer views'.
  $permissions['administer views'] = array(
    'name' => 'administer views',
    'roles' => array(),
    'module' => 'views',
  );

  // Exported permission: 'block IP addresses'.
  $permissions['block IP addresses'] = array(
    'name' => 'block IP addresses',
    'roles' => array(),
    'module' => 'system',
  );

  // Exported permission: 'book units'.
  $permissions['book units'] = array(
    'name' => 'book units',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'bypass bat_booking entities access'.
  $permissions['bypass bat_booking entities access'] = array(
    'name' => 'bypass bat_booking entities access',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'bypass bat_event entities access'.
  $permissions['bypass bat_event entities access'] = array(
    'name' => 'bypass bat_event entities access',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'bypass bat_type entities access'.
  $permissions['bypass bat_type entities access'] = array(
    'name' => 'bypass bat_type entities access',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'bypass bat_unit entities access'.
  $permissions['bypass bat_unit entities access'] = array(
    'name' => 'bypass bat_unit entities access',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'bypass file access'.
  $permissions['bypass file access'] = array(
    'name' => 'bypass file access',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'bypass node access'.
  $permissions['bypass node access'] = array(
    'name' => 'bypass node access',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'cancel account'.
  $permissions['cancel account'] = array(
    'name' => 'cancel account',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'user',
  );

  // Exported permission: 'change own username'.
  $permissions['change own username'] = array(
    'name' => 'change own username',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'user',
  );

  // Exported permission: 'configure bat settings'.
  $permissions['configure bat settings'] = array(
    'name' => 'configure bat settings',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat',
  );

  // Exported permission: 'create artikel content'.
  $permissions['create artikel content'] = array(
    'name' => 'create artikel content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create bat_booking entities'.
  $permissions['create bat_booking entities'] = array(
    'name' => 'create bat_booking entities',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'create bat_booking entities of bundle standard'.
  $permissions['create bat_booking entities of bundle standard'] = array(
    'name' => 'create bat_booking entities of bundle standard',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'create bat_event entities'.
  $permissions['create bat_event entities'] = array(
    'name' => 'create bat_event entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'create bat_event entities of bundle depot_availability'.
  $permissions['create bat_event entities of bundle depot_availability'] = array(
    'name' => 'create bat_event entities of bundle depot_availability',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'create bat_event entities of bundle depot_bezirk'.
  $permissions['create bat_event entities of bundle depot_bezirk'] = array(
    'name' => 'create bat_event entities of bundle depot_bezirk',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'create bat_event entities of bundle depot_kategorie'.
  $permissions['create bat_event entities of bundle depot_kategorie'] = array(
    'name' => 'create bat_event entities of bundle depot_kategorie',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'create bat_type entities'.
  $permissions['create bat_type entities'] = array(
    'name' => 'create bat_type entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'create bat_type entities of bundle depot'.
  $permissions['create bat_type entities of bundle depot'] = array(
    'name' => 'create bat_type entities of bundle depot',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'create bat_unit entities'.
  $permissions['create bat_unit entities'] = array(
    'name' => 'create bat_unit entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'create bat_unit entities of bundle default'.
  $permissions['create bat_unit entities of bundle default'] = array(
    'name' => 'create bat_unit entities of bundle default',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'create files'.
  $permissions['create files'] = array(
    'name' => 'create files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'create regionalpartner content'.
  $permissions['create regionalpartner content'] = array(
    'name' => 'create regionalpartner content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create seite content'.
  $permissions['create seite content'] = array(
    'name' => 'create seite content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create test content'.
  $permissions['create test content'] = array(
    'name' => 'create test content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'create url aliases'.
  $permissions['create url aliases'] = array(
    'name' => 'create url aliases',
    'roles' => array(),
    'module' => 'path',
  );

  // Exported permission: 'create wiki content'.
  $permissions['create wiki content'] = array(
    'name' => 'create wiki content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'customize ckeditor'.
  $permissions['customize ckeditor'] = array(
    'name' => 'customize ckeditor',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'ckeditor',
  );

  // Exported permission: 'delete any artikel content'.
  $permissions['delete any artikel content'] = array(
    'name' => 'delete any artikel content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any audio files'.
  $permissions['delete any audio files'] = array(
    'name' => 'delete any audio files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'delete any bat_booking entity'.
  $permissions['delete any bat_booking entity'] = array(
    'name' => 'delete any bat_booking entity',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'delete any bat_booking entity of bundle standard'.
  $permissions['delete any bat_booking entity of bundle standard'] = array(
    'name' => 'delete any bat_booking entity of bundle standard',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'delete any bat_event entity'.
  $permissions['delete any bat_event entity'] = array(
    'name' => 'delete any bat_event entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'delete any bat_event entity of bundle depot_availability'.
  $permissions['delete any bat_event entity of bundle depot_availability'] = array(
    'name' => 'delete any bat_event entity of bundle depot_availability',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'delete any bat_event entity of bundle depot_bezirk'.
  $permissions['delete any bat_event entity of bundle depot_bezirk'] = array(
    'name' => 'delete any bat_event entity of bundle depot_bezirk',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'delete any bat_event entity of bundle depot_kategorie'.
  $permissions['delete any bat_event entity of bundle depot_kategorie'] = array(
    'name' => 'delete any bat_event entity of bundle depot_kategorie',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'delete any bat_type entity'.
  $permissions['delete any bat_type entity'] = array(
    'name' => 'delete any bat_type entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete any bat_type entity of bundle depot'.
  $permissions['delete any bat_type entity of bundle depot'] = array(
    'name' => 'delete any bat_type entity of bundle depot',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete any bat_unit entity'.
  $permissions['delete any bat_unit entity'] = array(
    'name' => 'delete any bat_unit entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete any bat_unit entity of bundle default'.
  $permissions['delete any bat_unit entity of bundle default'] = array(
    'name' => 'delete any bat_unit entity of bundle default',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete any document files'.
  $permissions['delete any document files'] = array(
    'name' => 'delete any document files',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'delete any image files'.
  $permissions['delete any image files'] = array(
    'name' => 'delete any image files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'delete any regionalpartner content'.
  $permissions['delete any regionalpartner content'] = array(
    'name' => 'delete any regionalpartner content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any seite content'.
  $permissions['delete any seite content'] = array(
    'name' => 'delete any seite content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any test content'.
  $permissions['delete any test content'] = array(
    'name' => 'delete any test content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete any video files'.
  $permissions['delete any video files'] = array(
    'name' => 'delete any video files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'delete any wiki content'.
  $permissions['delete any wiki content'] = array(
    'name' => 'delete any wiki content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete bat_type revisions'.
  $permissions['delete bat_type revisions'] = array(
    'name' => 'delete bat_type revisions',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete own artikel content'.
  $permissions['delete own artikel content'] = array(
    'name' => 'delete own artikel content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own audio files'.
  $permissions['delete own audio files'] = array(
    'name' => 'delete own audio files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'delete own bat_booking entities'.
  $permissions['delete own bat_booking entities'] = array(
    'name' => 'delete own bat_booking entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'delete own bat_booking entities of bundle standard'.
  $permissions['delete own bat_booking entities of bundle standard'] = array(
    'name' => 'delete own bat_booking entities of bundle standard',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'delete own bat_event entities'.
  $permissions['delete own bat_event entities'] = array(
    'name' => 'delete own bat_event entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'delete own bat_event entities of bundle depot_availability'.
  $permissions['delete own bat_event entities of bundle depot_availability'] = array(
    'name' => 'delete own bat_event entities of bundle depot_availability',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'delete own bat_event entities of bundle depot_bezirk'.
  $permissions['delete own bat_event entities of bundle depot_bezirk'] = array(
    'name' => 'delete own bat_event entities of bundle depot_bezirk',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'delete own bat_event entities of bundle depot_kategorie'.
  $permissions['delete own bat_event entities of bundle depot_kategorie'] = array(
    'name' => 'delete own bat_event entities of bundle depot_kategorie',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'delete own bat_type entities'.
  $permissions['delete own bat_type entities'] = array(
    'name' => 'delete own bat_type entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete own bat_type entities of bundle depot'.
  $permissions['delete own bat_type entities of bundle depot'] = array(
    'name' => 'delete own bat_type entities of bundle depot',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete own bat_unit entities'.
  $permissions['delete own bat_unit entities'] = array(
    'name' => 'delete own bat_unit entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete own bat_unit entities of bundle default'.
  $permissions['delete own bat_unit entities of bundle default'] = array(
    'name' => 'delete own bat_unit entities of bundle default',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'delete own document files'.
  $permissions['delete own document files'] = array(
    'name' => 'delete own document files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'delete own image files'.
  $permissions['delete own image files'] = array(
    'name' => 'delete own image files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'delete own regionalpartner content'.
  $permissions['delete own regionalpartner content'] = array(
    'name' => 'delete own regionalpartner content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own seite content'.
  $permissions['delete own seite content'] = array(
    'name' => 'delete own seite content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own test content'.
  $permissions['delete own test content'] = array(
    'name' => 'delete own test content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete own video files'.
  $permissions['delete own video files'] = array(
    'name' => 'delete own video files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'delete own wiki content'.
  $permissions['delete own wiki content'] = array(
    'name' => 'delete own wiki content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete revisions'.
  $permissions['delete revisions'] = array(
    'name' => 'delete revisions',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'delete terms in kategorien'.
  $permissions['delete terms in kategorien'] = array(
    'name' => 'delete terms in kategorien',
    'roles' => array(),
    'module' => 'taxonomy',
  );

  // Exported permission: 'display EU Cookie Compliance popup'.
  $permissions['display EU Cookie Compliance popup'] = array(
    'name' => 'display EU Cookie Compliance popup',
    'roles' => array(
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'eu_cookie_compliance',
  );

  // Exported permission: 'download any audio files'.
  $permissions['download any audio files'] = array(
    'name' => 'download any audio files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'download any document files'.
  $permissions['download any document files'] = array(
    'name' => 'download any document files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'download any image files'.
  $permissions['download any image files'] = array(
    'name' => 'download any image files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'download any video files'.
  $permissions['download any video files'] = array(
    'name' => 'download any video files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'download own audio files'.
  $permissions['download own audio files'] = array(
    'name' => 'download own audio files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'download own document files'.
  $permissions['download own document files'] = array(
    'name' => 'download own document files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'download own image files'.
  $permissions['download own image files'] = array(
    'name' => 'download own image files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'download own video files'.
  $permissions['download own video files'] = array(
    'name' => 'download own video files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'eck add bundles'.
  $permissions['eck add bundles'] = array(
    'name' => 'eck add bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck add depot_rp_report bundles'.
  $permissions['eck add depot_rp_report bundles'] = array(
    'name' => 'eck add depot_rp_report bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck add depot_rp_report depot_rp_report_bookings_amount entities'.
  $permissions['eck add depot_rp_report depot_rp_report_bookings_amount entities'] = array(
    'name' => 'eck add depot_rp_report depot_rp_report_bookings_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck add depot_rp_report depot_rp_report_resources_amount entities'.
  $permissions['eck add depot_rp_report depot_rp_report_resources_amount entities'] = array(
    'name' => 'eck add depot_rp_report depot_rp_report_resources_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck add depot_rp_report depot_rp_report_users_amount entities'.
  $permissions['eck add depot_rp_report depot_rp_report_users_amount entities'] = array(
    'name' => 'eck add depot_rp_report depot_rp_report_users_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck add entities'.
  $permissions['eck add entities'] = array(
    'name' => 'eck add entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck add entity types'.
  $permissions['eck add entity types'] = array(
    'name' => 'eck add entity types',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck administer bundles'.
  $permissions['eck administer bundles'] = array(
    'name' => 'eck administer bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck administer depot_rp_report bundles'.
  $permissions['eck administer depot_rp_report bundles'] = array(
    'name' => 'eck administer depot_rp_report bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck administer depot_rp_report depot_rp_report_bookings_amount entities'.
  $permissions['eck administer depot_rp_report depot_rp_report_bookings_amount entities'] = array(
    'name' => 'eck administer depot_rp_report depot_rp_report_bookings_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck administer depot_rp_report depot_rp_report_resources_amount entities'.
  $permissions['eck administer depot_rp_report depot_rp_report_resources_amount entities'] = array(
    'name' => 'eck administer depot_rp_report depot_rp_report_resources_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck administer depot_rp_report depot_rp_report_users_amount entities'.
  $permissions['eck administer depot_rp_report depot_rp_report_users_amount entities'] = array(
    'name' => 'eck administer depot_rp_report depot_rp_report_users_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck administer entities'.
  $permissions['eck administer entities'] = array(
    'name' => 'eck administer entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck administer entity types'.
  $permissions['eck administer entity types'] = array(
    'name' => 'eck administer entity types',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck delete bundles'.
  $permissions['eck delete bundles'] = array(
    'name' => 'eck delete bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck delete depot_rp_report bundles'.
  $permissions['eck delete depot_rp_report bundles'] = array(
    'name' => 'eck delete depot_rp_report bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck delete depot_rp_report depot_rp_report_bookings_amount entities'.
  $permissions['eck delete depot_rp_report depot_rp_report_bookings_amount entities'] = array(
    'name' => 'eck delete depot_rp_report depot_rp_report_bookings_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck delete depot_rp_report depot_rp_report_resources_amount entities'.
  $permissions['eck delete depot_rp_report depot_rp_report_resources_amount entities'] = array(
    'name' => 'eck delete depot_rp_report depot_rp_report_resources_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck delete depot_rp_report depot_rp_report_users_amount entities'.
  $permissions['eck delete depot_rp_report depot_rp_report_users_amount entities'] = array(
    'name' => 'eck delete depot_rp_report depot_rp_report_users_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck delete entities'.
  $permissions['eck delete entities'] = array(
    'name' => 'eck delete entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck delete entity types'.
  $permissions['eck delete entity types'] = array(
    'name' => 'eck delete entity types',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck edit bundles'.
  $permissions['eck edit bundles'] = array(
    'name' => 'eck edit bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck edit depot_rp_report bundles'.
  $permissions['eck edit depot_rp_report bundles'] = array(
    'name' => 'eck edit depot_rp_report bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck edit depot_rp_report depot_rp_report_bookings_amount entities'.
  $permissions['eck edit depot_rp_report depot_rp_report_bookings_amount entities'] = array(
    'name' => 'eck edit depot_rp_report depot_rp_report_bookings_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck edit depot_rp_report depot_rp_report_resources_amount entities'.
  $permissions['eck edit depot_rp_report depot_rp_report_resources_amount entities'] = array(
    'name' => 'eck edit depot_rp_report depot_rp_report_resources_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck edit depot_rp_report depot_rp_report_users_amount entities'.
  $permissions['eck edit depot_rp_report depot_rp_report_users_amount entities'] = array(
    'name' => 'eck edit depot_rp_report depot_rp_report_users_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck edit entities'.
  $permissions['eck edit entities'] = array(
    'name' => 'eck edit entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck edit entity types'.
  $permissions['eck edit entity types'] = array(
    'name' => 'eck edit entity types',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck list bundles'.
  $permissions['eck list bundles'] = array(
    'name' => 'eck list bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck list depot_rp_report bundles'.
  $permissions['eck list depot_rp_report bundles'] = array(
    'name' => 'eck list depot_rp_report bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck list depot_rp_report depot_rp_report_bookings_amount entities'.
  $permissions['eck list depot_rp_report depot_rp_report_bookings_amount entities'] = array(
    'name' => 'eck list depot_rp_report depot_rp_report_bookings_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck list depot_rp_report depot_rp_report_resources_amount entities'.
  $permissions['eck list depot_rp_report depot_rp_report_resources_amount entities'] = array(
    'name' => 'eck list depot_rp_report depot_rp_report_resources_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck list depot_rp_report depot_rp_report_users_amount entities'.
  $permissions['eck list depot_rp_report depot_rp_report_users_amount entities'] = array(
    'name' => 'eck list depot_rp_report depot_rp_report_users_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck list entities'.
  $permissions['eck list entities'] = array(
    'name' => 'eck list entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck list entity types'.
  $permissions['eck list entity types'] = array(
    'name' => 'eck list entity types',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck view depot_rp_report bundles'.
  $permissions['eck view depot_rp_report bundles'] = array(
    'name' => 'eck view depot_rp_report bundles',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck view depot_rp_report depot_rp_report_bookings_amount entities'.
  $permissions['eck view depot_rp_report depot_rp_report_bookings_amount entities'] = array(
    'name' => 'eck view depot_rp_report depot_rp_report_bookings_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck view depot_rp_report depot_rp_report_resources_amount entities'.
  $permissions['eck view depot_rp_report depot_rp_report_resources_amount entities'] = array(
    'name' => 'eck view depot_rp_report depot_rp_report_resources_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck view depot_rp_report depot_rp_report_users_amount entities'.
  $permissions['eck view depot_rp_report depot_rp_report_users_amount entities'] = array(
    'name' => 'eck view depot_rp_report depot_rp_report_users_amount entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'eck view entities'.
  $permissions['eck view entities'] = array(
    'name' => 'eck view entities',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'edit any artikel content'.
  $permissions['edit any artikel content'] = array(
    'name' => 'edit any artikel content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any audio files'.
  $permissions['edit any audio files'] = array(
    'name' => 'edit any audio files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'edit any document files'.
  $permissions['edit any document files'] = array(
    'name' => 'edit any document files',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'edit any image files'.
  $permissions['edit any image files'] = array(
    'name' => 'edit any image files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'edit any regionalpartner content'.
  $permissions['edit any regionalpartner content'] = array(
    'name' => 'edit any regionalpartner content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any seite content'.
  $permissions['edit any seite content'] = array(
    'name' => 'edit any seite content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any test content'.
  $permissions['edit any test content'] = array(
    'name' => 'edit any test content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit any video files'.
  $permissions['edit any video files'] = array(
    'name' => 'edit any video files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'edit any wiki content'.
  $permissions['edit any wiki content'] = array(
    'name' => 'edit any wiki content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own artikel content'.
  $permissions['edit own artikel content'] = array(
    'name' => 'edit own artikel content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own audio files'.
  $permissions['edit own audio files'] = array(
    'name' => 'edit own audio files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'edit own comments'.
  $permissions['edit own comments'] = array(
    'name' => 'edit own comments',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'edit own document files'.
  $permissions['edit own document files'] = array(
    'name' => 'edit own document files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'edit own image files'.
  $permissions['edit own image files'] = array(
    'name' => 'edit own image files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'edit own regionalpartner content'.
  $permissions['edit own regionalpartner content'] = array(
    'name' => 'edit own regionalpartner content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own seite content'.
  $permissions['edit own seite content'] = array(
    'name' => 'edit own seite content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own test content'.
  $permissions['edit own test content'] = array(
    'name' => 'edit own test content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit own video files'.
  $permissions['edit own video files'] = array(
    'name' => 'edit own video files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'edit own wiki content'.
  $permissions['edit own wiki content'] = array(
    'name' => 'edit own wiki content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'edit terms in kategorien'.
  $permissions['edit terms in kategorien'] = array(
    'name' => 'edit terms in kategorien',
    'roles' => array(),
    'module' => 'taxonomy',
  );

  // Exported permission: 'generate features'.
  $permissions['generate features'] = array(
    'name' => 'generate features',
    'roles' => array(),
    'module' => 'features',
  );

  // Exported permission: 'generate pdf using mpdf'.
  $permissions['generate pdf using mpdf'] = array(
    'name' => 'generate pdf using mpdf',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'pdf_using_mpdf',
  );

  // Exported permission: 'get a system variable'.
  $permissions['get a system variable'] = array(
    'name' => 'get a system variable',
    'roles' => array(),
    'module' => 'services',
  );

  // Exported permission: 'get any binary files'.
  $permissions['get any binary files'] = array(
    'name' => 'get any binary files',
    'roles' => array(),
    'module' => 'services',
  );

  // Exported permission: 'get own binary files'.
  $permissions['get own binary files'] = array(
    'name' => 'get own binary files',
    'roles' => array(),
    'module' => 'services',
  );

  // Exported permission: 'manage depot_rp_report properties'.
  $permissions['manage depot_rp_report properties'] = array(
    'name' => 'manage depot_rp_report properties',
    'roles' => array(),
    'module' => 'eck',
  );

  // Exported permission: 'manage features'.
  $permissions['manage features'] = array(
    'name' => 'manage features',
    'roles' => array(),
    'module' => 'features',
  );

  // Exported permission: 'opt-in or out of tracking'.
  $permissions['opt-in or out of tracking'] = array(
    'name' => 'opt-in or out of tracking',
    'roles' => array(),
    'module' => 'piwik',
  );

  // Exported permission: 'perform unlimited index queries'.
  $permissions['perform unlimited index queries'] = array(
    'name' => 'perform unlimited index queries',
    'roles' => array(),
    'module' => 'services',
  );

  // Exported permission: 'post comments'.
  $permissions['post comments'] = array(
    'name' => 'post comments',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'reference unit calendar events'.
  $permissions['reference unit calendar events'] = array(
    'name' => 'reference unit calendar events',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_calendar_reference',
  );

  // Exported permission: 'rename features'.
  $permissions['rename features'] = array(
    'name' => 'rename features',
    'roles' => array(),
    'module' => 'features',
  );

  // Exported permission: 'revert bat_type revisions'.
  $permissions['revert bat_type revisions'] = array(
    'name' => 'revert bat_type revisions',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'revert revisions'.
  $permissions['revert revisions'] = array(
    'name' => 'revert revisions',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'save file information'.
  $permissions['save file information'] = array(
    'name' => 'save file information',
    'roles' => array(),
    'module' => 'services',
  );

  // Exported permission: 'search content'.
  $permissions['search content'] = array(
    'name' => 'search content',
    'roles' => array(),
    'module' => 'search',
  );

  // Exported permission: 'select account cancellation method'.
  $permissions['select account cancellation method'] = array(
    'name' => 'select account cancellation method',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'user',
  );

  // Exported permission: 'set a system variable'.
  $permissions['set a system variable'] = array(
    'name' => 'set a system variable',
    'roles' => array(),
    'module' => 'services',
  );

  // Exported permission: 'skip CAPTCHA'.
  $permissions['skip CAPTCHA'] = array(
    'name' => 'skip CAPTCHA',
    'roles' => array(),
    'module' => 'captcha',
  );

  // Exported permission: 'skip comment approval'.
  $permissions['skip comment approval'] = array(
    'name' => 'skip comment approval',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'comment',
  );

  // Exported permission: 'translate interface'.
  $permissions['translate interface'] = array(
    'name' => 'translate interface',
    'roles' => array(),
    'module' => 'locale',
  );

  // Exported permission: 'update any bat_booking entity'.
  $permissions['update any bat_booking entity'] = array(
    'name' => 'update any bat_booking entity',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'update any bat_booking entity of bundle standard'.
  $permissions['update any bat_booking entity of bundle standard'] = array(
    'name' => 'update any bat_booking entity of bundle standard',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'update any bat_event entity'.
  $permissions['update any bat_event entity'] = array(
    'name' => 'update any bat_event entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'update any bat_event entity of bundle depot_availability'.
  $permissions['update any bat_event entity of bundle depot_availability'] = array(
    'name' => 'update any bat_event entity of bundle depot_availability',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'update any bat_event entity of bundle depot_bezirk'.
  $permissions['update any bat_event entity of bundle depot_bezirk'] = array(
    'name' => 'update any bat_event entity of bundle depot_bezirk',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'update any bat_event entity of bundle depot_kategorie'.
  $permissions['update any bat_event entity of bundle depot_kategorie'] = array(
    'name' => 'update any bat_event entity of bundle depot_kategorie',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'update any bat_type entity'.
  $permissions['update any bat_type entity'] = array(
    'name' => 'update any bat_type entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'update any bat_type entity of bundle depot'.
  $permissions['update any bat_type entity of bundle depot'] = array(
    'name' => 'update any bat_type entity of bundle depot',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'update any bat_unit entity'.
  $permissions['update any bat_unit entity'] = array(
    'name' => 'update any bat_unit entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'update any bat_unit entity of bundle default'.
  $permissions['update any bat_unit entity of bundle default'] = array(
    'name' => 'update any bat_unit entity of bundle default',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'update own bat_booking entities'.
  $permissions['update own bat_booking entities'] = array(
    'name' => 'update own bat_booking entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'update own bat_booking entities of bundle standard'.
  $permissions['update own bat_booking entities of bundle standard'] = array(
    'name' => 'update own bat_booking entities of bundle standard',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'update own bat_event entities'.
  $permissions['update own bat_event entities'] = array(
    'name' => 'update own bat_event entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'update own bat_event entities of bundle depot_availability'.
  $permissions['update own bat_event entities of bundle depot_availability'] = array(
    'name' => 'update own bat_event entities of bundle depot_availability',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'update own bat_event entities of bundle depot_bezirk'.
  $permissions['update own bat_event entities of bundle depot_bezirk'] = array(
    'name' => 'update own bat_event entities of bundle depot_bezirk',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'update own bat_event entities of bundle depot_kategorie'.
  $permissions['update own bat_event entities of bundle depot_kategorie'] = array(
    'name' => 'update own bat_event entities of bundle depot_kategorie',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'update own bat_type entities'.
  $permissions['update own bat_type entities'] = array(
    'name' => 'update own bat_type entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'update own bat_type entities of bundle depot'.
  $permissions['update own bat_type entities of bundle depot'] = array(
    'name' => 'update own bat_type entities of bundle depot',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'update own bat_unit entities'.
  $permissions['update own bat_unit entities'] = array(
    'name' => 'update own bat_unit entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'update own bat_unit entities of bundle default'.
  $permissions['update own bat_unit entities of bundle default'] = array(
    'name' => 'update own bat_unit entities of bundle default',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'use PHP for tracking visibility'.
  $permissions['use PHP for tracking visibility'] = array(
    'name' => 'use PHP for tracking visibility',
    'roles' => array(),
    'module' => 'piwik',
  );

  // Exported permission: 'use advanced search'.
  $permissions['use advanced search'] = array(
    'name' => 'use advanced search',
    'roles' => array(),
    'module' => 'search',
  );

  // Exported permission: 'use ctools import'.
  $permissions['use ctools import'] = array(
    'name' => 'use ctools import',
    'roles' => array(),
    'module' => 'ctools',
  );

  // Exported permission: 'use text format erweiterter_text_full_html_'.
  $permissions['use text format erweiterter_text_full_html_'] = array(
    'name' => 'use text format erweiterter_text_full_html_',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'filter',
  );

  // Exported permission: 'view any bat_booking entity'.
  $permissions['view any bat_booking entity'] = array(
    'name' => 'view any bat_booking entity',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'view any bat_booking entity of bundle standard'.
  $permissions['view any bat_booking entity of bundle standard'] = array(
    'name' => 'view any bat_booking entity of bundle standard',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'view any bat_event entity'.
  $permissions['view any bat_event entity'] = array(
    'name' => 'view any bat_event entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view any bat_event entity of bundle depot_availability'.
  $permissions['view any bat_event entity of bundle depot_availability'] = array(
    'name' => 'view any bat_event entity of bundle depot_availability',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view any bat_event entity of bundle depot_bezirk'.
  $permissions['view any bat_event entity of bundle depot_bezirk'] = array(
    'name' => 'view any bat_event entity of bundle depot_bezirk',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view any bat_event entity of bundle depot_kategorie'.
  $permissions['view any bat_event entity of bundle depot_kategorie'] = array(
    'name' => 'view any bat_event entity of bundle depot_kategorie',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view any bat_type entity'.
  $permissions['view any bat_type entity'] = array(
    'name' => 'view any bat_type entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view any bat_type entity of bundle depot'.
  $permissions['view any bat_type entity of bundle depot'] = array(
    'name' => 'view any bat_type entity of bundle depot',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view any bat_type unpublished entity'.
  $permissions['view any bat_type unpublished entity'] = array(
    'name' => 'view any bat_type unpublished entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view any bat_unit entity'.
  $permissions['view any bat_unit entity'] = array(
    'name' => 'view any bat_unit entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view any bat_unit entity of bundle default'.
  $permissions['view any bat_unit entity of bundle default'] = array(
    'name' => 'view any bat_unit entity of bundle default',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view any bat_unit unpublished entity'.
  $permissions['view any bat_unit unpublished entity'] = array(
    'name' => 'view any bat_unit unpublished entity',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view bat_type revisions'.
  $permissions['view bat_type revisions'] = array(
    'name' => 'view bat_type revisions',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view calendar data for any depot_availability event'.
  $permissions['view calendar data for any depot_availability event'] = array(
    'name' => 'view calendar data for any depot_availability event',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view calendar data for any depot_bezirk event'.
  $permissions['view calendar data for any depot_bezirk event'] = array(
    'name' => 'view calendar data for any depot_bezirk event',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view calendar data for any depot_kategorie event'.
  $permissions['view calendar data for any depot_kategorie event'] = array(
    'name' => 'view calendar data for any depot_kategorie event',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view files'.
  $permissions['view files'] = array(
    'name' => 'view files',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Authentifizierte Organisation' => 'Authentifizierte Organisation',
      'Regionalpartner' => 'Regionalpartner',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'view own bat_booking entities'.
  $permissions['view own bat_booking entities'] = array(
    'name' => 'view own bat_booking entities',
    'roles' => array(
      'Administrator' => 'Administrator',
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'view own bat_booking entities of bundle standard'.
  $permissions['view own bat_booking entities of bundle standard'] = array(
    'name' => 'view own bat_booking entities of bundle standard',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_booking',
  );

  // Exported permission: 'view own bat_event entities'.
  $permissions['view own bat_event entities'] = array(
    'name' => 'view own bat_event entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view own bat_event entities of bundle depot_availability'.
  $permissions['view own bat_event entities of bundle depot_availability'] = array(
    'name' => 'view own bat_event entities of bundle depot_availability',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view own bat_event entities of bundle depot_bezirk'.
  $permissions['view own bat_event entities of bundle depot_bezirk'] = array(
    'name' => 'view own bat_event entities of bundle depot_bezirk',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view own bat_event entities of bundle depot_kategorie'.
  $permissions['view own bat_event entities of bundle depot_kategorie'] = array(
    'name' => 'view own bat_event entities of bundle depot_kategorie',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_event',
  );

  // Exported permission: 'view own bat_type entities'.
  $permissions['view own bat_type entities'] = array(
    'name' => 'view own bat_type entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view own bat_type entities of bundle depot'.
  $permissions['view own bat_type entities of bundle depot'] = array(
    'name' => 'view own bat_type entities of bundle depot',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view own bat_type unpublished entities'.
  $permissions['view own bat_type unpublished entities'] = array(
    'name' => 'view own bat_type unpublished entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view own bat_unit entities'.
  $permissions['view own bat_unit entities'] = array(
    'name' => 'view own bat_unit entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view own bat_unit entities of bundle default'.
  $permissions['view own bat_unit entities of bundle default'] = array(
    'name' => 'view own bat_unit entities of bundle default',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view own bat_unit unpublished entities'.
  $permissions['view own bat_unit unpublished entities'] = array(
    'name' => 'view own bat_unit unpublished entities',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_unit',
  );

  // Exported permission: 'view own files'.
  $permissions['view own files'] = array(
    'name' => 'view own files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'view own private files'.
  $permissions['view own private files'] = array(
    'name' => 'view own private files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'view own unpublished content'.
  $permissions['view own unpublished content'] = array(
    'name' => 'view own unpublished content',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'view past event information'.
  $permissions['view past event information'] = array(
    'name' => 'view past event information',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'bat_fullcalendar',
  );

  // Exported permission: 'view private files'.
  $permissions['view private files'] = array(
    'name' => 'view private files',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'file_entity',
  );

  // Exported permission: 'view revisions'.
  $permissions['view revisions'] = array(
    'name' => 'view revisions',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'node',
  );

  // Exported permission: 'view the administration theme'.
  $permissions['view the administration theme'] = array(
    'name' => 'view the administration theme',
    'roles' => array(
      'Regionalpartner' => 'Regionalpartner',
    ),
    'module' => 'system',
  );

  return $permissions;
}
