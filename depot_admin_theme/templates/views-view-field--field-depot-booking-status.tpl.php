<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php

$suffix = '';

$booking_status_changed_by = $row->_field_data['booking_id']['entity']->field_depot_booking_status_by['und'][0]['value'];

if (!empty($booking_status_changed_by)) {
    $_user = user_load($booking_status_changed_by);
    $suffix = ' durch ' . $_user->field_anrede['und'][0]['value'].' '.$_user->field_vorname['und'][0]['value'].' '.$_user->field_nachname['und'][0]['value'];
}

switch ($output) {

  case 'cancelled' : 
    echo t('Storniert') . $suffix;
  break;
  
  case 'requested' :
    echo t('Angefragt') . $suffix;
  break;
  
  case 'confirmed' :
    echo t('Bestätigt') . $suffix;
  break;

} ?>
