<?php
// Detail view for a depot resource

global $base_url;
global $user;

$resources = $view->style_plugin->rendered_fields;

if (empty($resources))
{
	// views will never reach here :(
	drupal_not_found();
    drupal_exit();
}

foreach ($resources as $resource) :
	$resource['user']                  = user_load($resource['uid']);
	$resource['user']->is_organisation = (in_array(ROLE_ORGANISATION_NAME, $resource['user']->roles) || in_array(ROLE_ORGANISATION_AUTH_NAME, $resource['user']->roles));

	$user_is_owner = (user_has_role(ROLE_ADMINISTRATOR) || $user->uid == $resource['uid']);
	$resource_is_active = ($resource['field_aktiviert'] != 'Genehmigung ausstehend');
    $resource_has_geodata = ($resource['field_adresse_latitude'] != '' && $resource['field_adresse_longitude'] != '');
    
    if (!$user_is_owner && !$resource_is_active)
	{
		drupal_access_denied();
		drupal_exit();
    }
    
    $default_image = 'files/default_images/default-thumbnail_';

    if (!$resource_is_active) {
        drupal_set_message(t('Genehmigung durch Administrator ausstehend, die Ressource ist daher noch nicht öffentlich einsehbar.'), 'alert');
    }
    
	// Append ONLY blocked events to DOM
	$blocked_events = depot_get_available_units_by_rid($resource['type_id'], (new DateTime(date('Y-m-d')))->format('Y-m-d H:i'), (new DateTime(date('Y-m-d', strtotime(date("Y-m-d", time()) . " + 365 day"))))->format('Y-m-d H:i'));
    $blocked_events_array = array();
    
	foreach ($blocked_events as $key => $event)
	{
		if ($event['blocking']) {
			array_push($blocked_events_array, $blocked_events[$key]);
        }
    }

	// Add breadcrumb
	$breadcrumb   = array();
	$breadcrumb[] = l('Home', '<front>');
	$breadcrumb[] = l('Ressourcen', 'ressourcen');
    drupal_set_breadcrumb($breadcrumb);

	?>
    <script type="text/javascript">
        <?php if ($resource_has_geodata) : ?>
        var depotResourceMarker = [{title:"<?= $resource['name']; ?>",id:<?= $resource['type_id'] ?>,lat:<?= $resource['field_adresse_latitude']; ?>,lng:<?= $resource['field_adresse_longitude']; ?>,adress:"<?= $resource['field_adresse_strasse']; ?>",slug:"<?= $resource['field_slug']; ?>"}];
        <?php endif; ?>

        if (typeof $ === 'undefined') {
            $ = jQuery || {};
        }

        <?php if (user_is_logged_in()): ?>
        var blockedEvents = <?= json_encode($blocked_events_array); ?>;
        var now = new Date();
        var calOptions = {
            range: true,
            lang: 'de',
            weekStart: 1,
            button: '<?= t('Jetzt reservieren'); ?>!',
            blockedPeriods: blockedEvents,
            totalAmount: <?= $resource['field_anzahl_einheiten']; ?>,
            onConfirm: function () {
                $('#calResFormBegin').val(this.selectedDates[0] / 1000);
                $('#calResFormEnd').val(this.selectedDates[1] / 1000);
                $('#calResFormEinheiten').val(this.selectedAmount);
                $('#calResForm').submit();
            }
        };

        <?php if (!empty($resource['field__ffnungszeiten'])):?>
            calOptions.amountHint = 
                '<div id="detail-oeffnungszeiten">' +
                '<span id="link-detail-oeffnungszeiten">' +
                    '<?= t('Öffnungszeiten'); ?></span>' +
                    ' <?= t('für Beginn/Ende beachten!'); ?> ' +
                '<span id="detail-oeffnungszeiten-text">' +
                '<?= preg_replace( "/\r|\n/", "", strip_tags($resource['field__ffnungszeiten'])); ?>'+
                '</span>'+
                '</div>';
        <?php endif; ?>

        var cal = new ResourceCal(calOptions);
        <?php endif; ?>
    </script>
    <style type="text/css">.asterisk{font-size:0.7em;line-height:0;color:grey;}</style>
    <form id="calResForm" method="GET"
          action="<?= (!user_is_logged_in() ? '/user/login?destination=/ressourcen/'. $resource['type_id'] : '/reservierungen/neu') ?>">
        <input type="hidden" id="calResFormRid" name="rid" value="<?= $resource['type_id']; ?>"/>
        <input type="hidden" id="calResFormEinheiten" name="einheiten" value=""/>
        <input type="hidden" id="calResFormBegin" name="begin" value=""/>
        <input type="hidden" id="calResFormEnd" name="end" value=""/>
    </form>
    <!--modals / offset content -->
	<?php if ($user_is_owner) : ?>
    <div id="verfuegbarkeitenModal" class="reveal-modal" data-reveal aria-hidden="true">
        <h2 id="modalTitle">
            <?= t('Verfügbarkeiten bestimmen.'); ?>
        </h2>
        <p class="lead">
            <?= t('In diesem Kalender sehen Sie die exakten Verfügbarkeiten aller Einheiten dieser Ressource.') ?>
        </p>
        <p>
            <span class="secondary label"><?= t('Hinweis:'); ?></span> <?= t('Um Sperrzeiten anzulegen, "markieren" Sie einen bestimmten Zeitraum mit der Maus. Bestehende Termine können auch via Drag & Drop arrangiert werden.'); ?>
        </p>
        <iframe width="900" height="600" src="/ressourcen/<?= $resource['type_id']; ?>/verfuegbarkeiten" frameborder="0" allowfullscreen></iframe>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <?php endif; ?>

    <div id="depot-resource-map-modal" class="reveal-modal" data-reveal aria-hidden="true" style="padding:0;">
        <div id="depot-resource-map" style="height:350px;"></div>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <!--/modals -->

    <div class="res-detail" itemscope itemtype="http://schema.org/Product">
        <div class="row">
            <div class="medium-7 columns" id="res-detail-images">
                <div class="orbit-container">

                    <ul class="depot-ressource-detail-slider" data-orbit data-options="slide_number_text:von">
                        <li class="active" itemprop="image" data-orbit-slide="image-i">
                            <a href="#" data-reveal-id="image-i-big">
								<?= $resource['field_bild_i']; ?>
                            </a>
                            <div id="image-i-big" class="reveal-modal small image-big-modal" data-reveal
                                 aria-hidden="true">
								<?= $resource['field_bild_i']; ?>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                        </li>
                        <?php if (strpos($resource['field_bild_ii'], $default_image) === FALSE) : ?>
                        <li itemprop="image" data-orbit-slide="image-ii">
                            <a href="#" data-reveal-id="image-ii-big">
								<?= $resource['field_bild_ii']; ?>
                            </a>
                            <div id="image-ii-big" class="reveal-modal small image-big-modal" data-reveal
                                 aria-hidden="true">
								<?= $resource['field_bild_ii']; ?>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php if (strpos($resource['field_bild_iii'], $default_image) === FALSE) : ?>
                        <li itemprop="image" data-orbit-slide="image-iii">
                            <a href="#" data-reveal-id="image-iii-big">
								<?= $resource['field_bild_iii']; ?>
                            </a>
                            <div id="image-iii-big" class="reveal-modal small image-big-modal" data-reveal
                                 aria-hidden="true">
								<?= $resource['field_bild_iii']; ?>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>

                </div><!-- /.orbit-container -->
            </div>
            <div class="medium-5 columns">
                <div class="follow-box">
                    <div class="panel" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <h5><?= t('Preis'); ?></h5>
                        <?php $asterisk = (!empty($resource['field_mwst']) ? '<span class="asterisk">*</span>' : ''); ?>
                        <p>
                            <span itemprop="price"><?= $resource['field_kosten']; ?> <?= $resource['field_abrechnungstakt'].$asterisk; ?></span>
							<?php if (!empty($resource['field_kosten_2'])) : ?>
                                | <?= t('Ermäßigt'); ?>: <?= $resource['field_kosten_2'].$asterisk; ?>
							<?php endif; ?>
							<?php if (!empty($resource['field_kaution'])) : ?>
                                | <?= t('Kaution'); ?>: <?= $resource['field_kaution']; ?> (<?= t('pro Einheit'); ?>)
                            <?php endif; ?>
                        </p>

                        <?php if (!empty($resource['field_gemeinwohl']) && $resource['field_gemeinwohl'] == 'Ja') : ?>
                            <p>
                                <span class="label warning">
                                    <?= t('Achtung!'); ?>
                                </span> <?= t('Reservierungen nur durch dem Gemeinwohl verpflichtete Organisationen!'); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($resource['field_mwst'])) : ?>
                            <p class="asterisk">* <?= t('Zzgl. MwSt. von @mwst%.',array('@mwst' => $resource['field_mwst'])); ?></p>
                        <?php endif; ?>

                        <?php if (!user_is_logged_in()): ?>
                            <a href="/user/login?destination=/ressourcen/<?= $resource['type_id'] ?>" id="availability_calendar_btn" class="button small expand ci" type="submit"
                            title="<?= t('Jetzt einloggen und reservieren'); ?>">
                              <i class="fi fi-check"></i><?= t('Jetzt einloggen und reservieren'); ?></a>
                        <?php else: 
                                if (isset($resource['field_gemeinwohl']['und'][0]['value']) && !in_array(ROLE_ORGANISATION_AUTH_NAME, $user->roles)) : ?>
                                <a href="#" class="button small expand ci"
                                title="<?= t('Nur durch gemeinnützige Organisationen reservierbar'); ?>">
                                  <i class="fi fi-check"></i><?= t('Nur durch Organisationen reservierbar'); ?>
                                </a>
                            <?php else : ?>
                                <a href="#" id="availability_calendar_btn" class="button small expand ci" title="<?= t('Verfügbarkeit im gewünschten Leih-Zeitraum prüfen'); ?>">
                                  <i class="fi fi-check"></i><?= t('Verfügbarkeit prüfen'); ?>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>

                        <section id="res-detail-meta-info">
                            <ul class="clearfix">
                                <li class="small-4 column"
                                    title="<?= t('Kategorien'); ?>">
                                    <div class="icon-badge secondary">
                                        <i class="fi fi-flag"></i>
                                    </div>
                                    <span itemprop="category">
                                        <?= $resource['field_kategorie']; ?>
                                    </span>
                                </li>
                                <li class="small-4 column"
                                    <?= ($resource_has_geodata) ? ' id="open-resource-map"' : ''; ?>
                                    title="<?= (!$resource_has_geodata) ? t('Ausleihbar in @ort', array('@ort' => $resource['field_adresse_postleitzahl'] . ' '. $resource['field_adresse_ort'])) : t('Abholort auf Karte anzeigen'); ?>"
                                    data-reveal-id="depot-resource-map-modal">
                                    <div class="icon-badge secondary">
                                        <i class="fi fi-marker"></i>
                                    </div>
                                    <?= $resource['field_adresse_postleitzahl']; ?> <?= $resource['field_adresse_ort']; ?>
                                </li>
                                <li class="small-4 column" 
                                    title="<?= t('Bis zu @einheiten Stück ausleihbar.', array('@einheiten' => $resource['field_anzahl_einheiten'])); ?>">
                                    <div class="icon-badge secondary">
                                        <i class="fi fi-star"></i>
                                    </div>                       
                                    <span itemprop="numberOfItems" id="depotNumberOfItems">
                                        <?= $resource['field_anzahl_einheiten']; ?>
                                    </span> <?= t('Einheit(en)'); ?>
                                </li>
                            </ul>
                        </section>

                    </div><!--/.panel -->

					<?php if ($user_is_owner) : ?>
                        <div class="button-group">
                            <a href="/ressourcen/<?= $resource['type_id']; ?>/edit" id="contact_agent_form_btn" class="button small white expand">
                                <i class="fi fi-pencil"></i><?= t('Ressource bearbeiten'); ?>
                            </a>
                            <a href="#" data-reveal-id="verfuegbarkeitenModal" class="button small white expand">
                                <i class="fi fi-calendar"></i><?= t('Verfügbarkeiten ändern'); ?>
                            </a>
                        </div>
					<?php elseif (user_is_logged_in() && $resource['user']->data['contact']) : ?>
                        <a href="/user/<?= $resource['uid']; ?>/contact" id="contact_agent_btn"
                           class="button white small expand"><i
                                    class="fi fi-torso"></i><?= t('Anbieter kontaktieren'); ?></a>
					<?php endif; ?>
                    <a href="#" id="share_btn" class="button secondary white small expand" data-dropdown="res-detail-share-dd"
                       aria-controls="autoCloseExample" aria-expanded="false"><i
                                class="fi fi-share"></i><?= t('Teilen'); ?>
                    </a>
                    <ul id="res-detail-share-dd" class="f-dropdown" data-dropdown-content tabindex="-1"
                        aria-hidden="true"
                        aria-autoclose="false" tabindex="-1">
                        <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php global $base_url;
							echo $base_url . '/' . current_path(); ?>"
                               title="<?= t('Auf !network teilen', array('!network' => 'Twitter')); ?>">Twitter</a></li>
                        <li><a target="_blank"
                               href="https://www.facebook.com/sharer/sharer.php?u=<?= $base_url . '/' . current_path(); ?>"
                               title="<?= t('Auf !network teilen', array('!network' => 'Facebook')); ?>">Facebook</a>
                        </li>
                        <li>
                            <a href="mailto:?subject=<?= t('Entdecke das Depot Leipzig!') ?>&amp;body=<?= $base_url . '/' . current_path(); ?>">E-Mail</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="medium-7 column">
            <div class="resource-content">
                <h1 class="ressource-title" itemprop="name">
                    <?= $resource['name']; ?><?php echo strpos('default-thumbnail', $resource['field_bild_ii']); ?>
                </h1>

                <section id="res-detail-desc" itemprop="description">
                    <p><?= strip_tags($resource['field_beschreibung']); ?></p>
                </section>

                <ul class="accordion" data-accordion>
                    <li class="accordion-navigation">
                        <a href="#res-detail-anbieter" class="accordion-title"><?= t('Anbieter'); ?></a>
                        <div class="row content active" id="res-detail-anbieter">
							<?php
							$created = (new DateTime())->setTimestamp($resource['user']->created);

							if ($resource['user']->is_organisation) : ?>
                                <div class="user-badge medium-1 column"><?= substr($resource['user']->field_organisation_name['und'][0]['value'], 0, 1); ?></div>
                                <div class="medium-10 column"><p>
                                        <strong><?= $resource['user']->field_organisation_name['und'][0]['value']; ?></strong>
                                        (<?= ucfirst($resource['user']->field_organisation_typ['und'][0]['value']); ?>) <span
                                                class="member-since">| <?= date_format($created, 'd.m.Y'); ?></span></p>
									<?php if (isset($resource['user']->field_organisation_website['und'])) : ?>
                                    <?php $arrParsedUrl = parse_url($resource['user']->field_organisation_website['und'][0]['value']); ?>
                                        <p>
											<?= t('Website'); ?>:
                                            <a href="<?= !empty($arrParsedUrl['scheme']) ? $resource['user']->field_organisation_website['und'][0]['value'] : 'http://' . $resource['user']->field_organisation_website['und'][0]['value']; ?>"
                                               target="_blank">
												<?= $resource['user']->field_organisation_website['und'][0]['value']; ?>
                                            </a>
                                        </p>
									<?php endif; ?></div>
							<?php else : ?>
                                <div class="user-badge two-digits medium-1 column"><?= substr($resource['user']->field_vorname['und'][0]['value'], 0, 1); ?><?= substr($resource['user']->field_nachname['und'][0]['value'], 0, 1); ?></div>
                                <div class="medium-10 column">
                                    <p><?= $resource['user']->field_anrede['und'][0]['value']; ?> <?= $resource['user']->field_vorname['und'][0]['value'] ?> <?= $resource['user']->field_nachname['und'][0]['value'] ?>
                                        <span class="member-since">| <?= t('Mitglied seit') . ' ' . date_format($created, 'd.m.Y'); ?></span>
                                    </p>
                                </div>
							<?php endif; ?>
                        </div>
                    </li>
                    <li class="accordion-navigation">
                        <a href="#res-detail-abholung" class="accordion-title"><?= t('Abholort'); ?></a>
                        <div class="content" id="res-detail-abholung">
                            <p><?= $resource['field_adresse_strasse']; ?></p>
                            <p><?= $resource['field_adresse_postleitzahl']; ?> <?= $resource['field_adresse_ort']; ?></p>                            
                        </div>
                    </li>
					<?php if (!empty($resource['field__ffnungszeiten'])) : ?>
                        <li class="accordion-navigation">
                            <a href="#res-detail-oeffnungszeiten"
                               class="accordion-title"><?= t('Öffnungszeiten'); ?></a>
                            <div class="content" id="res-detail-oeffnungszeiten">
                                <p><?= strip_tags($resource['field__ffnungszeiten']); ?></p>
                            </div>
                        </li>
					<?php endif; ?>
					<?php if (!empty($resource['field_links_i']) || !empty($resource['field_links_ii']) || !empty($resource['field_links_iii'])
						      || !empty($resource['field_upload_i']) || !empty($resource['field_upload_ii'])) : ?>
                        <li class="accordion-navigation">
                            <a href="#res-detail-links" class="accordion-title"><?= t('Links'); ?></a>
                            <div class="content" id="res-detail-links">
								<?php if (!empty($resource['field_links_i'])) : ?>
                                    <p>
                                        <i class="fi fi-paperclip"></i>
                                        <a href="<?= $resource['field_links_i']; ?>" target="_blank"
                                           title="<?= t('Externen Link öffnen'); ?>">
											<?= $resource['field_links_i']; ?>
                                        </a>
                                    </p>
								<?php endif; ?>
								<?php if (!empty($resource['field_links_ii'])) : ?>
                                    <p>
                                        <i class="fi fi-paperclip"></i>
                                        <a href="<?= $resource['field_links_ii']; ?>" target="_blank"
                                           title="<?= t('Externen Link öffnen'); ?>">
											<?= $resource['field_links_ii']; ?>
                                        </a>
                                    </p>
								<?php endif; ?>
								<?php if (!empty($resource['field_links_iii'])) : ?>
                                    <p>
                                        <i class="fi fi-paperclip"></i>
                                        <a href="<?= $resource['field_links_iii']; ?>" target="_blank"
                                           title="<?= t('Externen Link öffnen'); ?>">
											<?= $resource['field_links_iii']; ?>
                                        </a>
                                    </p>
								<?php endif; ?>
								<?php if (!empty($resource['field_upload_i'])) : ?>
                                    <p><?= $resource['field_upload_i']; ?></p><?php endif; ?>
								<?php if (!empty($resource['field_upload_ii'])) : ?>
                                    <p><?= $resource['field_upload_ii']; ?></p><?php endif; ?>
                            </div>
                        </li>
					<?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>