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


  if (isset($variables['page']['content']['system_main']['name']) && isset($variables['page']['content']['system_main']['pass'])){
    // user/login
    $variables['page']['content']['system_main']['name']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['name']['#suffix'] = '</div>';
    $variables['page']['content']['system_main']['pass']['#prefix'] = '<div class="medium-6 column">';
    $variables['page']['content']['system_main']['pass']['#suffix'] = '</div>'; 
    $variables['page']['content']['system_main']['actions']['submit']['#attributes']['class'] = array('button expand');
    $variables['page']['content']['system_main']['actions']['submit']['#value'] = t('Im Depot anmelden');  
  } 

  if (isset($variables['page']['content']['system_main']['account']['mail'])){
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
