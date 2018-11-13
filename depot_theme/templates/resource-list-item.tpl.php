    <?php

        $resource['user'] = user_load($resource['uid']);
	    $resource['user']->is_organisation = (in_array(ROLE_ORGANISATION_NAME, $resource['user']->roles) || in_array(ROLE_ORGANISATION_AUTH_NAME, $resource['user']->roles));
        $resource['link'] = '/ressourcen/' . ($resource['field_slug'] != '' ? $resource['field_slug'] : $resource['type_id']);
        $is_owner = (isset($depot_resources_owner) && $depot_resources_owner == $resource['uid']);
        $only_for_gemeinwohl = ($resource['field_gemeinwohl'] == 'Ja'); // i18nified boolean - süüüüüß <3
        // @todo For large reveal-contents, minimize its top value
    ?>

    <div class="resource-wrapper medium-4 column<?= ($is_owner ? ' is-owner' : '') ?><?= ($only_for_gemeinwohl ? ' only-gemeinwohl' : '') ?>">
        <span class="resource-wrapper__title">
            <a href="<?= $resource['link']; ?>">
              <?= $resource['name']; ?>
            </a>
        </span>
        
        <?php if (!$is_owner) : ?>
        <a href="<?= $resource['link']; ?>" class="resource-link">
        <?php endif; ?>

            <?= $resource['field_bild_i']; ?>
           
            <?php if (!$is_owner) : ?>
                <?php if (trim($resource['field_kosten_2']) != '') : ?>
                <div class="user-badge price-badge medium-1 column">
                <?= t('Ab'); ?><br /><?= $resource['field_kosten_2']; ?>
                </div>
                <?php elseif (trim($resource['field_kosten']) != '') : ?>
                <!-- .organizations-only -->
                <div class="user-badge price-badge medium-1 column">
                <?= t('Ab'); ?><br /><?= $resource['field_kosten']; ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>

            <!--.resource-wrapper__reveal -->
            <div class="resource-wrapper__reveal">
                <div class="resource-wrapper__reveal-content">
                    <?php if ($is_owner) : ?>
                        <div class="resource-wrapper-row clearfix"> 
                            <div class="user-badge medium-1 column">
                                <i class="fi fi-pencil"></i>
                            </div>
                            <a href="/ressourcen/<?= $resource['type_id'] ?>/edit">
                                <p><?= t('Ressource bearbeiten'); ?></p>
                            </a>
                        </div>
                        <div class="resource-wrapper-row clearfix"> 
                            <div class="user-badge medium-1 column">
                                <i class="fi fi-calendar"></i>
                            </div>
                            <a href="<?= $resource['link'] ?>#sperrzeiten">
                                <p><?= t('Sperrzeiten'); ?></p>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="resource-wrapper-row clearfix">
                        <!-- @todo Make generic -->
                        <?php if ($resource['user']->is_organisation) : ?>
                            <div class="user-badge medium-1 column">
                                <?= substr($resource['user']->field_organisation_name['und'][0]['value'], 0, 1); ?>
                            </div>
                            <?php if (strlen($resource['user']->field_organisation_name['und'][0]['value']) > 55) : ?>
                                <strong><?= substr($resource['user']->field_organisation_name['und'][0]['value'], 0, 55); ?>...</strong>
                            <?php else : ?>
                                <strong><?= $resource['user']->field_organisation_name['und'][0]['value']; ?></strong>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="user-badge two-digits medium-1 column">
                                <?= substr($resource['user']->field_vorname['und'][0]['value'], 0, 1); ?><?= substr($resource['user']->field_nachname['und'][0]['value'], 0, 1); ?>
                            </div>
                            <strong><?= $resource['user']->field_vorname['und'][0]['value'] . ' ' . $resource['user']->field_nachname['und'][0]['value'] ?></strong>
                        <?php endif; ?>
                            <br /><?= $resource['field_adresse_postleitzahl'] ?> (<?= $resource['field_bezirk']; ?>)
                        </div>
                        
                        <?php if ($only_for_gemeinwohl) : ?>
                        <div class="resource-wrapper-row clearfix">
                            <div class="user-badge medium-1 column">
                                <i class="fi fi-star"></i>
                            </div>
                            <p><?= t('Nur reservierbar durch gemeinnützige Organisationen.'); ?></p>
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div><!--/.resource-wrapper__reveal -->
        <?php if (!$is_owner) : ?>
        </a>
        <?php endif; ?>
    </div>