<section class="depot-resources-list">
    <?php
    // List view for depot resources

    $resources = $view->style_plugin->rendered_fields;

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

    foreach ($resources as $resource) {
        include('resource-list-item.tpl.php');
    }

    ?>

    <aside class="medium-12 column text-center depot-resources-list__footer">
        <?php if (drupal_is_front_page()) : ?>
        <!-- &page = 1 & items_per_page=999 -->
        <a href="#" id="depot-resources-list__btn-expand" class="button">
            <?= t('Weitere Ressourcen'); ?>
        </a>
        <a href="/ressourcen?page=1" id="depot-resources-list__btn-show-more" target="_blank" class="button hide">
            <?= t('Alle Ressourcen'); ?>
        </a>
        <br /><p class="text-center"><?= t('Nichts passendes gefunden? Dann schau doch mal ins <a href="https://dsble.de" target="_blank" title="Kleinanzeigen beim Schwarzen Brett Leipzig"><img src="https://depot-leipzig.de/sites/default/files/logo_dsbl.png" width="80" alt="Logo DSBL" /></a>'); ?></p>
        <?php else : ?>
        <br /><p class="text-center"><?= t('Nichts passendes gefunden? Neuanschaffungen können durch das Depot refinanzierbar gemacht werden! <a href=#">Mehr Informationen</a>'); ?></p>
        <?php endif; ?>
    </aside>

</section>