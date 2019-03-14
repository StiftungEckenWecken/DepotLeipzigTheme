<?php
// Make frontpage texts editable
// @todo Users of role "regionalpartner" should only
//       see these settings, not the foundation-theme default ones

/**
 * Implements hook_form_FORM_ID_alter().
 */
function depot_form_system_theme_settings_alter(&$form, &$form_state, $form_id = null) {

    // ALERT, ALERTA! Keep this as it is before reading
    // https://www.drupal.org/project/drupal/issues/1355242 #8 first

    //if (isset($form['zurb_foundation'])) {
    //    $form['depot'] = $form['zurb_foundation'];
    /*} else */ if (!isset($form['depot'])) {
        $form['depot'] = array(
          '#type' => 'vertical_tabs',
          '#weight' => -10,
        );
    }

    $user_is_admin = (user_has_role(ROLE_ADMINISTRATOR));

    if (!$user_is_admin) {
        unset($form['zurb_foundation']);
    }

    $form['depot']['frontpage'] = array(
        '#type' => 'fieldset',
        '#title' => t('Depot (Startseite)'),
        '#description' => '<h3><strong>'.t('Startseiten-spezifische Texte') . '</strong></h3>',
    );

    $setting = theme_get_setting('depot_frontpage_text_header', 'depot_theme');

    $form['depot']['frontpage']['depot_frontpage_text_header'] = array(
        '#type' => 'text_format',
        '#title' => t('Header: 3-Zeiler'),
        '#format' => $setting['format'],
        '#rows' => 4,
        '#description' => '',
        '#default_value' => $setting['value'],
    );

    $setting = theme_get_setting('depot_frontpage_text_content_i', 'depot_theme');

    $form['depot']['frontpage']['depot_frontpage_text_content_i'] = array(
        '#type' => 'text_format',
        '#title' => t('Inhaltsbereich I ("Wie funktionert das depot?")'),
        '#format' => $setting['format'],
        '#rows' => 8,
        '#description' => 'Nur editierbar durch Administrator',
        '#disabled' => !$user_is_admin,
        '#default_value' => $setting['value'],
    );

    $setting = theme_get_setting('depot_frontpage_text_content_ii', 'depot_theme');

    $form['depot']['frontpage']['depot_frontpage_text_content_ii'] = array(
        '#type' => 'text_format',
        '#title' => t('Inhaltsbereich II ("Wie mach´ ich mit?")'),
        '#format' => $setting['format'],
        '#rows' => 8,
        '#description' => 'Nur editierbar durch Administrator',
        '#disabled' => !$user_is_admin,
        '#default_value' => $setting['value'],
    );
}
