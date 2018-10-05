<?php
// Make frontpage texts editable
// @todo Users of role "regionalpartner" should only
//       see these settings, not the foundation-theme default ones

/**
 * Implements hook_form_FORM_ID_alter().
 */
function depot_form_system_theme_settings_alter(&$form, &$form_state) {

    //if (isset($form['zurb_foundation'])) {
    //    $form['depot'] = $form['zurb_foundation'];
    /*} else */ if (!isset($form['depot'])) {
        $form['depot'] = array(
          '#type' => 'vertical_tabs',
          '#weight' => -10,
        );
    }

    $form['depot']['frontpage'] = array(
        '#type' => 'fieldset',
        '#title' => t('Depot (Startseite)'),
        '#description' => '<h3><strong>'.t('Startseiten-spezifische Texte') . '</strong></h3>',
    );

    $form['depot']['frontpage']['depot_frontpage_text_header'] = array(
        '#type' => 'text_format',
        '#title' => t('Header: 3-Zeiler'),
        '#rows' => 4,
        '#description' => '', //t('If enabled, the site name and main menu will appear in a bar along the top of the page.'),
        '#default_value' => theme_get_setting('depot_frontpage_text_header', 'depot_theme'),
    );
   

    $form['depot']['frontpage']['depot_frontpage_text_content_i'] = array(
        '#type' => 'text_format',
        '#title' => t('Inhaltsbereich I ("Wie funktionert das Depot?")'),
        '#rows' => 8,
        '#description' => '',
        '#default_value' => theme_get_setting('depot_frontpage_text_content_i', 'depot_theme'),
    );

    $form['depot']['frontpage']['depot_frontpage_text_content_ii'] = array(
        '#type' => 'text_format',
        '#title' => t('Inhaltsbereich II ("Wie mach´ ich mit?")'),
        '#rows' => 8,
        '#description' => '',
        '#default_value' => theme_get_setting('depot_frontpage_text_content_ii', 'depot_theme'),
    );
}
