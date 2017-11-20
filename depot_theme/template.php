<?php

/**
 * Implements template_preprocess_html().
 */
function depot_theme_preprocess_html(&$variables) {
  drupal_add_css('https://fonts.googleapis.com/css?family=Open+Sans:400,700,700i|Roboto+Slab:300,400', array('type' => 'external'));
}

/**
 * Implements template_preprocess_page.
 */
function depot_theme_preprocess_page(&$variables) {
#print_r($variables); exit();

/*foreach ($form as $title => $field){
  if (is_array($field) && strpos($title,'field') >= 0){
    $form[$title]['#attributes']['class'][] = 'column';
  }
}*/
  
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
 * Implements template_preprocess_node.
 */
function depot_theme_preprocess_node(&$variables) {
}

/**
 * Implements template_preprocess_menu_link.
 * Style "so funktioniert's" link for anonym users
 */
function depot_theme_preprocess_menu_link(&$variables) {

  if ($variables['element']['#theme'] == 'menu_link__user_menu' && $variables['element']['#href'] == 'node/1' && !depot_auth_user_access_only()){
    $variables['element']['#attributes']['class'][] = 'makeMeCd';
  }

}

/**
 * Implements hook_menu_local_tasks_alter()
 * Append depot-specific pages to user-dashboard-menu
 */
function depot_theme_menu_local_tasks_alter(&$data, $router_item, $root_path){
  
  global $user;

  if ($root_path == 'user'){
    // !logged in
    // Put "Anmelden" Tab at first place
    #$data['tabs'][0]['output'][0]['#weight'] = 999;
    $data['tabs'][0]['output'][0]['#weight'] = 999;
  }

  if ($root_path == 'user/%' || $root_path == 'user/%/edit' || $root_path == 'user/%/organisation' || $root_path == 'user/%/contact'){
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
  }

}

/**
 * Implements theme_menu_local_tasks().
 */
/*function depot_theme_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="side-nav">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="side-nav">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}*/