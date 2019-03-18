<<<<<<< HEAD
<?php

/**
 * Implements template_preprocess_html().
 * 
 * Add JS & CSS that is out of the scope of depot_theme.info
 */
function depot_theme_preprocess_html(&$variables) {
  
  global $base_url;

  // Use non-relative paths except for CSS
  $theme_path = $base_url . '/' . path_to_theme();

  $rp = depot_get_active_regionalpartner();

  if ($variables['is_front']) {

    // Programatically enable AJAX-mode search for resources-views filter
    drupal_add_js(drupal_get_path('module', 'jquery_update') . '/replace/jquery.form/4/jquery.form.min.js');
    drupal_add_js(drupal_get_path('module', 'views') . '/js/base.js');
    drupal_add_js('misc/progress.js');
    drupal_add_js('misc/ajax.js');
    drupal_add_js(drupal_get_path('module', 'views') . '/js/ajax_view.js');
  
  } else {
    
    drupal_add_css(path_to_theme(). '/RessourceCalendar/src/css/resourceCal.css');
    drupal_add_js($theme_path.'/RessourceCalendar/src/js/resourceCal.js'); //, array('scope' => 'footer'));
    drupal_add_js($theme_path.'/RessourceCalendar/src/js/fastclick.js'); //, array('scope' => 'footer'));
  
  }

  // @todo Assets for local use see https://www.npmjs.com/package/here-js-api
  drupal_add_js('//js.api.here.com/v3/3.0/mapsjs-core.js', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_js('//js.api.here.com/v3/3.0/mapsjs-service.js', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_js('//js.api.here.com/v3/3.0/mapsjs-ui.js', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_js('//js.api.here.com/v3/3.0/mapsjs-mapevents.js', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_css('//js.api.here.com/v3/3.0/mapsjs-ui.css', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_js(array('depot' => array(
    't_filterKategorienPlaceholder' => t('Ressourcen nach Kategorie und/oder Schlagwort filtern'),
    't_addKategorienPlaceholder' => t('Max. 3 Kategorien'),
    't_map_open_resource' => t('Ressource öffnen (neues Fenster)'),
    't_search_type_category' => t('Kategorie'),
    't_search_type_query' => t('Schlagwort'),
    'maps_app_id' => MAPS_APP_ID,
    'maps_app_code' => MAPS_APP_CODE,
    'maps_default_lng' => $rp['region']['lng'],
    'maps_default_lat' => $rp['region']['lat']
  )), 'setting');

  // Favicon's & web-app icon's
  $html_heads = array(
    'apple-touch-icon' => array(
     '#tag' => 'link',
     '#attributes' => array(
      'rel' => 'apple-touch-icon',
      'sizes' => '180x180',
      'href' => $theme_path.'/icons/apple-touch-icon.png',
     )
    ),
    'iconLarge' => array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'type' => 'image/png',
        'sizes' => '32x32',
        'href' => $theme_path.'/icons/favicon-32x32.png',
      )
    ),
    'iconSmall' => array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'type' => 'image/png',
        'sizes' => '16x16',
        'href' => $theme_path.'/icons/favicon-16x16.png',
      )
    ),
    'manifest' => array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'manifest',
        'href' => $theme_path.'/site.webmanifest'
      )
    ),
    'maskIcon' => array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'mask-icon',
        'href' => $theme_path.'/icons/safari-pinned-tab.svg',
        'color' => '#d8340a'
      )
    ),
    'name1' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'apple-mobile-web-app-title',
        'content' => 'Depot'
      )
    ),
    'name2' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'application-name',
        'content' => 'Depot'
      )
    ),
    'tileColor' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'msapplication-TileColor',
        'content' => '#da532c'
      )
    ),
    'themeColor' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'theme-color',
        'content' => '#ffffff'
      )
    ),
    'flattr' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'flattr:id',
        'content' => 'pdz00n'
      )
    )
  );

  foreach ($html_heads as $key => $data) {
    drupal_add_html_head($data, $key);
  }

}

/**
 * Implements theme_menu_local_task().
 * @overwrites zurb_foundation_menu_local_task(), inc/menu.inc
 */
function depot_theme_menu_local_task(&$variables) {
  
  $link = $variables['element']['#link'];
  $link_text = $link['title'];
  $li_class = (!empty($variables['element']['#active']) ? ' class="active"' : '');

  if (!empty($variables['element']['#active'])) {
    // Add text to indicate active tab for non-visual users.
    $active = '<span class="element-invisible">' . t('(aktiver Reiter)') . '</span>';

    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }

    // Add section tab styling
    $link['localized_options']['attributes']['class'] = array('small', 'button');
  
    $link['localized_options']['html'] = TRUE;
    $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
  
  } else {

    // Add section tab styling
    $link['localized_options']['attributes']['class'] = array('small', 'button', 'white');
  
  }

  $output = '';
  $output .= '<li' . $li_class . '>';
  $output .= l($link_text, $link['href'], $link['localized_options']);
  $output .= "</li>\n";
  return  $output;
}

/**
 * Implements template_preprocess_page().
 */
function depot_theme_preprocess_page(&$variables) {

  if (isset($variables['node']->type)) {
    // Add support for "page--wiki.tpl.php" like templates
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }
  
  if (isset($variables['page']['content']['system_main']['locale'])){
    // user-edit-form
    $variables['page']['content']['system_main']['account']['mail']['#description'] = '';    
    $variables['page']['content']['system_main']['account']['pass']['pass1']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['account']['pass']['pass1']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['account']['pass']['pass2']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['account']['pass']['pass2']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['locale']['#access'] = FALSE;
    $variables['page']['content']['system_main']['timezone']['#access'] = FALSE;
    $variables['page']['content']['system_main']['contact']['#weight'] = 99;
    $variables['page']['content']['system_main']['actions']['submit']['#attributes']['class'] = array('button expand');    
  }

  if (isset($variables['page']['content']['system_main']['name']) && isset($variables['page']['content']['system_main']['pass'])){
    // user/login
    $variables['page']['content']['system_main']['name']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['name']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['name']['#description'] = '';
    
    $variables['page']['content']['system_main']['pass']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['pass']['#suffix'] = '</div>'; 
    $variables['page']['content']['system_main']['pass']['#description'] = ''; 
    $variables['page']['content']['system_main']['actions']['submit']['#attributes']['class'] = array('button expand');
    $variables['page']['content']['system_main']['actions']['submit']['#value'] = t('Im depot anmelden');  
  } 

  if (isset($variables['page']['content']['system_main']['account']['mail']) && !isset($variables['page']['content']['system_main']['locale'])){
    // user/register
    $variables['page']['content']['system_main']['account']['mail']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['account']['mail']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['account']['name']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['account']['name']['#suffix'] = '</div>';
  }
    
}

/**
 * Implements template_preprocess_node().
 */
function depot_theme_preprocess_node(&$variables) {
}

/**
 * Implements template_preprocess_menu_link().
 * 
 * Required to add styles to topbar-menu links
 */
function depot_theme_preprocess_menu_link(&$variables) {

  if ($variables['element']['#theme'] == 'menu_link__user_menu') {

    if ($variables['element']['#href'] == 'user' ||
        $variables['element']['#href'] == 'user/login') {
      $variables['element']['#attributes']['class'][] = 'user-menu-user-link';
    }
  }

}

/**
 * Implements hook_menu_local_tasks_alter().
 * 
 * Append depot-specific pages to user-"mein depot"-menu
 */
function depot_theme_menu_local_tasks_alter(&$data, $router_item, $root_path){
  
  global $user;

  switch ($root_path) {
    case 'user' :
    case 'user/register' :
    case 'user/password' :
      // !logged in
      // Put "Anmelden" Tab at first place

      foreach ($data['tabs'][0]['output'] as $key => $tab) {
        if ($tab['#link']['title'] == t('Anmelden')) {
          $firstTabClone = $data['tabs'][0]['output'][0];
          $data['tabs'][0]['output'][0] = $tab;
          $data['tabs'][0]['output'][$key] = $firstTabClone;
        }
      }
    
    break;

    case 'user/%' :
    case 'user/%/edit' :
    case 'user/%/organisation' :
    case 'user/%/contact' :
    case 'user/%/ressourcen' :
    case 'user/%/buchungen' :

      // These pages are for the user and admin only
      if (!depot_admin_access_only()) {
        if ($data['tab_parent_href'] != '' && $data['tab_parent_href'] != 'user/'. $user->uid) {
          drupal_access_denied();
        }
      }

      // logged in ("Mein Konto")
      $data['tabs'][0]['output'][0]['#link']['title'] = t('Übersicht');
      $data['tabs'][0]['output'][1]['#link']['title'] = t('Kontaktdaten');

      // Remove link to "Shortcuts" module
      // :p
      //unset($data['tabs'][0]['output'][5]);
      /*
      Following paths were put into user/%user/ via Views UI

      $data['tabs'][0]['output'][] = array(
        '#theme' => 'menu_local_task',
        '#link' => array(
          'title' => t('Ressourcen'),
          'href' => 'mein-depot',
          'localized_options' => array(
            'attributes' => array(
              'title' => t('Angelegte Ressourcen einsehen'),
            ),
          ),
        ),
        '#active' => false // $router_item['path'] == $root_path,
      );

      $data['tabs'][0]['output'][] = array(
        '#theme' => 'menu_local_task',
        '#link' => array(
          'title' => t('Buchungen'),
          'href' => 'mein-depot/reservierungen',
          'localized_options' => array(
            'attributes' => array(
              'title' => t('Buchungen einsehen'),
            ),
          ),
        ),
        '#active' => false // $router_item['path'] == $root_path,
      );*/

      // Add logout button to user's "mein depot" menu
      $data['tabs'][0]['output'][] = array(
        '#theme' => 'menu_local_task',
        '#link' => array(
          'title' => t('Logout'),
          'href' => 'user/logout',
          'localized_options' => array(
            'attributes' => array(
              'title' => t('Vom depot abmelden'),
            ),
          ),
        ),
        '#active' => false // $router_item['path'] == $root_path,
      );
    break;
  }

=======
<?php
// For depot V2:
// @todo [IN DEPOT_THEME.info] remove unecessary drupal-core-stylesheets
// @todo include web app icons
// @todo [IN DEPOT_THEME.info] make several contents editable from backend
// @todo [DONE] remove CDN dependency for fonts DONE
// @todo Modify/Minify build-script 

/**
 * Implements template_preprocess_html().
 * 
 * Add JS & CSS that is out of the scope of depot_theme.info
 */
function depot_theme_preprocess_html(&$variables) {
  
  global $base_url;

  // Use non-relative paths except for CSS
  $theme_path = $base_url . '/' . path_to_theme();

  if ($variables['is_front']) {

    // Programatically enable AJAX-mode search for resources-views filter
    drupal_add_js(drupal_get_path('module', 'jquery_update') . '/replace/jquery.form/4/jquery.form.min.js');
    drupal_add_js(drupal_get_path('module', 'views') . '/js/base.js');
    drupal_add_js('misc/progress.js');
    drupal_add_js('misc/ajax.js');
    drupal_add_js(drupal_get_path('module', 'views') . '/js/ajax_view.js');
  
  } else {
    
    drupal_add_css(path_to_theme(). '/RessourceCalendar/src/css/resourceCal.css');
    drupal_add_js($theme_path.'/RessourceCalendar/src/js/resourceCal.js');
    drupal_add_js($theme_path.'/RessourceCalendar/src/js/fastclick.js');
  
  }

  // @todo Assets for local use see https://www.npmjs.com/package/here-js-api
  drupal_add_js('//js.api.here.com/v3/3.0/mapsjs-core.js', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_js('//js.api.here.com/v3/3.0/mapsjs-service.js', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_js('//js.api.here.com/v3/3.0/mapsjs-ui.js', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_js('//js.api.here.com/v3/3.0/mapsjs-mapevents.js', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_css('//js.api.here.com/v3/3.0/mapsjs-ui.css', array(
    'type' => 'external',
    'scope' => 'footer'
  ));

  drupal_add_js(array('depot' => array(
    't_filterKategorienPlaceholder' => t('Ressourcen nach Kategorien durchsuchen'),
    't_addKategorienPlaceholder' => t('Max. 3 Kategorien'),
    't_map_open_resource' => t('Ressource öffnen (neues Fenster)'),
    'maps_app_id' => MAPS_APP_ID,
    'maps_app_code' => MAPS_APP_CODE,
    'maps_default_lng' => 12.387772,
    'maps_default_lat' => 51.340321
  )), 'setting');

  // Favicon's & web-app icon's
  $html_heads = array(
    'apple-touch-icon' => array(
     '#tag' => 'link',
     '#attributes' => array(
      'rel' => 'apple-touch-icon',
      'sizes' => '180x180',
      'href' => $theme_path.'/icons/apple-touch-icon.png',
     )
    ),
    'iconLarge' => array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'type' => 'image/png',
        'sizes' => '32x32',
        'href' => $theme_path.'/icons/favicon-32x32.png',
      )
    ),
    'iconSmall' => array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'icon',
        'type' => 'image/png',
        'sizes' => '16x16',
        'href' => $theme_path.'/icons/favicon-16x16.png',
      )
    ),
    'manifest' => array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'manifest',
        'href' => $theme_path.'/site.webmanifest'
      )
    ),
    'maskIcon' => array(
      '#tag' => 'link',
      '#attributes' => array(
        'rel' => 'mask-icon',
        'href' => $theme_path.'/icons/safari-pinned-tab.svg',
        'color' => '#d8340a'
      )
    ),
    'name1' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'apple-mobile-web-app-title',
        'content' => 'Depot'
      )
    ),
    'name2' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'application-name',
        'content' => 'Depot'
      )
    ),
    'tileColor' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'msapplication-TileColor',
        'content' => '#da532c'
      )
    ),
    'themeColor' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'theme-color',
        'content' => '#ffffff'
      )
    ),
    'flattr' => array(
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'flattr:id',
        'content' => 'pdz00n'
      )
    )
  );

  foreach ($html_heads as $key => $data) {
    drupal_add_html_head($data, $key);
  }

}

/**
 * Implements theme_menu_local_task().
 * @overwrites zurb_foundation_menu_local_task(), inc/menu.inc
 */
function depot_theme_menu_local_task(&$variables) {
  
  $link = $variables['element']['#link'];
  $link_text = $link['title'];
  $li_class = (!empty($variables['element']['#active']) ? ' class="active"' : '');

  if (!empty($variables['element']['#active'])) {
    // Add text to indicate active tab for non-visual users.
    $active = '<span class="element-invisible">' . t('(aktiver Reiter)') . '</span>';

    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }

    // Add section tab styling
    $link['localized_options']['attributes']['class'] = array('small', 'button');
  
    $link['localized_options']['html'] = TRUE;
    $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
  
  } else {

    // Add section tab styling
    $link['localized_options']['attributes']['class'] = array('small', 'button', 'white');
  
  }

  $output = '';
  $output .= '<li' . $li_class . '>';
  $output .= l($link_text, $link['href'], $link['localized_options']);
  $output .= "</li>\n";
  return  $output;
}

/**
 * Implements template_preprocess_page().
 */
function depot_theme_preprocess_page(&$variables) {

  if (isset($variables['node']->type)) {
    // Add support for "page--wiki.tpl.php" like templates
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }
  
  if (isset($variables['page']['content']['system_main']['locale'])){
    // user-edit-form
    $variables['page']['content']['system_main']['account']['mail']['#description'] = '';    
    $variables['page']['content']['system_main']['account']['pass']['pass1']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['account']['pass']['pass1']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['account']['pass']['pass2']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['account']['pass']['pass2']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['locale']['#access'] = FALSE;
    $variables['page']['content']['system_main']['timezone']['#access'] = FALSE;
    $variables['page']['content']['system_main']['contact']['#weight'] = 99;
    $variables['page']['content']['system_main']['actions']['submit']['#attributes']['class'] = array('button expand');    
  }

  if (isset($variables['page']['content']['system_main']['name']) && isset($variables['page']['content']['system_main']['pass'])){
    // user/login
    $variables['page']['content']['system_main']['name']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['name']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['name']['#description'] = '';
    
    $variables['page']['content']['system_main']['pass']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['pass']['#suffix'] = '</div>'; 
    $variables['page']['content']['system_main']['pass']['#description'] = ''; 
    $variables['page']['content']['system_main']['actions']['submit']['#attributes']['class'] = array('button expand');
    $variables['page']['content']['system_main']['actions']['submit']['#value'] = t('Im Depot anmelden');  
  } 

  if (isset($variables['page']['content']['system_main']['account']['mail']) && !isset($variables['page']['content']['system_main']['locale'])){
    // user/register
    $variables['page']['content']['system_main']['account']['mail']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['account']['mail']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['account']['name']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['account']['name']['#suffix'] = '</div>';
  }
    
}

/**
 * Implements template_preprocess_node().
 */
function depot_theme_preprocess_node(&$variables) {
}

/**
 * Implements template_preprocess_menu_link().
 * 
 * Required to add styles to topbar-menu links
 */
function depot_theme_preprocess_menu_link(&$variables) {

  if ($variables['element']['#theme'] == 'menu_link__user_menu') {

    if ($variables['element']['#href'] == 'user' ||
        $variables['element']['#href'] == 'user/login') {
      $variables['element']['#attributes']['class'][] = 'user-menu-user-link';
    }
  }

}

/**
 * Implements hook_menu_local_tasks_alter().
 * 
 * Append depot-specific pages to user-dashboard-menu
 */
function depot_theme_menu_local_tasks_alter(&$data, $router_item, $root_path){
  
  global $user;

  switch ($root_path) {
    case 'user' :
    case 'user/register' :
    case 'user/password' :
      // !logged in
      // Put "Anmelden" Tab at first place

      foreach ($data['tabs'][0]['output'] as $key => $tab) {
        if ($tab['#link']['title'] == t('Anmelden')) {
          $firstTabClone = $data['tabs'][0]['output'][0];
          $data['tabs'][0]['output'][0] = $tab;
          $data['tabs'][0]['output'][$key] = $firstTabClone;
        }
      }
    
    break;

    case 'user/%' :
    case 'user/%/edit' :
    case 'user/%/organisation' :
    case 'user/%/contact' :

      // logged in ("Mein Konto")
      $data['tabs'][0]['output'][0]['#link']['title'] = t('Übersicht');
      $data['tabs'][0]['output'][1]['#link']['title'] = t('Kontaktdaten');
        
      /* if ($root_path != 'user/%/organisation'){
        $data['tabs'][0]['output'][] = array(
          '#theme' => 'menu_local_task',
          '#link' => array(
            'title' => t('Organisation'),
            'href' => 'user/'.$user->uid.'/organisation',
        //   'href' => 'mein-depot/organisation',    
            'localized_options' => array(
              'attributes' => array(
                'title' => t('Depot-Konto als gemeinnützige Organisation führen'),
              ),
            ),
          ),
          '#active' => false // $router_item['path'] == $root_path,
        );
        } */

      $data['tabs'][0]['output'][] = array(
        '#theme' => 'menu_local_task',
        '#link' => array(
          'title' => t('Mein Depot'),
          'href' => 'mein-depot',
          'localized_options' => array(
            'attributes' => array(
              'title' => t('Ressourcen & Reservierungen einsehen'),
            ),
          ),
        ),
        '#active' => false // $router_item['path'] == $root_path,
      );
      
      $data['tabs'][0]['output'][] = array(
        '#theme' => 'menu_local_task',
        '#link' => array(
          'title' => t('Logout'),
          'href' => 'user/logout',
          'localized_options' => array(
            'attributes' => array(
              'title' => t('Vom Depot abmelden'),
            ),
          ),
        ),
        '#active' => false // $router_item['path'] == $root_path,
      );
    break;
  }

>>>>>>> 87fefedda3330ba011fcac45dfd806f850d1afc1
}