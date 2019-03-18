<<<<<<< HEAD
<?php 
  // List view for owned depot resources
  global $user;
  $resources = $view->style_plugin->rendered_fields;
?>

<?php if (empty($resources)) : ?>
    <div class="text-center">
        <img src="/sites/all/themes/depot_theme/images/resources_empty.svg" style="max-width:440px;" />
        
        <br /><br />
        <p class="text-center">
            <?= t('Dein depot sieht noch leer aus.'); ?>
        </p>

        <a href="/ressourcen/neu" class="button text-center" title="<?= t('Weiter zum Ressource-anlegen Formular'); ?>">
            <?= t('Jetzt kostenfrei Angebot einstellen!'); ?>
        </a>
    </div>
<?php else : ?>

<ul class="button-group">
    <li class="medium-3 column float-right right">
        <a href="/ressourcen/neu" class="small button secondary">
            <?= t('Ressource anlegen'); ?>
        </a>
    </li>
</ul>

<?php endif; 

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

=======
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

>>>>>>> 87fefedda3330ba011fcac45dfd806f850d1afc1
?>