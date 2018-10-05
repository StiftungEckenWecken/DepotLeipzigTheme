<?php 
  // List view for owned depot resources
  global $user;
  $resources = $view->style_plugin->rendered_fields;
?>

<ul class="button-group">
    <li class="active">
        <a href="/mein-depot" class="small button active">
            <?= t('Ressourcen'); ?>
        </a>
    </li>
    <li>
        <a href="/mein-depot/reservierungen" class="small button white">
            <?= t('Buchungen'); ?>
        </a>
    </li>
    <li class="medium-3 column float-right right">
        <a href="/ressourcen/neu" class="small button secondary">
            <?= t('Ressource anlegen'); ?>
        </a>
    </li>
</ul>

<?php 

if (empty($resources))
{
    //@todo debug!
    //drupal_exit();
    //return;
}

/**
 * Further, yet unused resources-attributes:
 * resource.field_abrechnungstakt ["pro Tag" / "pro Stunde"]
 * resource.field_kategorie
 * resource.field_anzahl_einheiten
 */

$depot_resources_owner = $user->uid;

foreach ($resources as $resource) {
    include('resource-list-item.tpl.php');
}

unset($depot_resources_owner);

?>