<?php global $base_url;
global $user;

$resource = $view->style_plugin->rendered_fields;
if (empty($resource))
{
	// views will never reach here :(
	drupal_not_found();
	drupal_exit();
}

foreach ($resource as $res) :

	$res['user']                  = user_load($res['uid']);
	$res['user']->is_organisation = in_array(ROLE_ORGANISATION_NAME, $res['user']->roles);

	$user_is_owner = (user_has_role(ROLE_ADMINISTRATOR) || $user->uid == $res['uid']);
	$res_is_active = ($res['field_aktiviert'] != 'Genehmigung ausstehend');

	if (!$user_is_owner && !$res_is_active)
	{
		drupal_access_denied();
		drupal_exit();
	}

	// Append ONLY blocked events to DOM
	$blocked_events = depot_get_available_units_by_rid($res['type_id'], (new DateTime(date('Y-m-d')))->format('Y-m-d H:i'), (new DateTime(date('Y-m-d', strtotime(date("Y-m-d", time()) . " + 365 day"))))->format('Y-m-d H:i'));
	$blocked_events_array = array();
	foreach ($blocked_events as $key => $event)
	{
		if ($event['blocking'])
			array_push($blocked_events_array, $blocked_events[$key]);
	}

	// Re-arrange filtered views-output
	//if (strlen($res['field_adresse_postleitzahl']) == 4){
	//    $res['field_adresse_postleitzahl'] = '0'.$res['field_adresse_postleitzahl'];
	//}

	// SEO: Set individual Breadcrumbs
	$breadcrumb   = array();
	$breadcrumb[] = l('Home', '<front>');
	$breadcrumb[] = l('Ressourcen', 'ressourcen');
	$breadcrumb[] = $res['name'] . ($user_is_owner ? ' (' . t('Eigene Ressource') . ')' : '');
	drupal_set_breadcrumb($breadcrumb);

	// SEO: Set page title TODO :(
    drupal_set_title($res['name']);

	?>
    <script type="text/javascript">
        $ = jQuery;

        <?php if (user_is_logged_in()): ?>
        // kept here for debugging purpose
        var blockedEvents = <?= json_encode($blocked_events_array); ?>;
        console.log(blockedEvents);
        var now = new Date();
        var calOptions = {
            range: true,
            lang: 'de',
            weekStart: 1,
            button: '<?= t('Jetzt reservieren'); ?>!',
            blockedPeriods: blockedEvents,
            totalAmount: <?= $res['field_anzahl_einheiten']; ?>,
            onConfirm: function () {
                $('#calResFormBegin').val(this.selectedDates[0] / 1000);
                $('#calResFormEnd').val(this.selectedDates[1] / 1000);
                $('#calResFormEinheiten').val(this.selectedAmount);
                $('#calResForm').submit();
            }
        };

        <?php if (!empty($res['field__ffnungszeiten'])):?>
        calOptions.amountHint = '<div id="detail-oeffnungszeiten"><span id="link-detail-oeffnungszeiten">Öffnungszeiten</span> für Beginn/Ende beachten! ' +
            '<span id="detail-oeffnungszeiten-text">' + '<?= strip_tags($res['field__ffnungszeiten']); ?>' + '</span></div>';
        <?php endif; ?>

        var cal = new ResourceCal(calOptions);

        $(document).ready(function () {
            $('#availability_calendar_btn').click(function () {
                cal.show();
            });


        });
        <?php endif; ?>
    </script>
    <style type="text/css">.asterisk{font-size:0.7em;line-height:0;color:grey;}</style>
    <form id="calResForm" method="GET"
          action="<?= (!user_is_logged_in() ? '/user/login?destination=' : '') ?>/reservierungen/neu">
        <input type="hidden" id="calResFormRid" name="rid" value="<?= $res['type_id']; ?>"/>
        <input type="hidden" id="calResFormEinheiten" name="einheiten" value=""/>
        <input type="hidden" id="calResFormBegin" name="begin" value=""/>
        <input type="hidden" id="calResFormEnd" name="end" value=""/>
    </form>
	<?php if ($user_is_owner) : ?>
    <div id="verfuegbarkeitenModal" class="reveal-modal" data-reveal aria-hidden="true">
        <h2 id="modalTitle"><?= t('Verfügbarkeiten bestimmen.'); ?></h2>
        <p class="lead"><?= t('In diesem Kalender sehen Sie die exakten Verfügbarkeiten aller Einheiten dieser Ressource.') ?></p>
        <p>
            <span class="secondary label"><?= t('Hinweis:'); ?></span> <?= t('Um Sperrzeiten anzulegen, "markieren" Sie einen bestimmten Zeitraum mit der Maus. Bestehende Termine können auch via Drag & Drop arrangiert werden.'); ?>
        </p>
        <iframe width="900" height="600" src="/ressourcen/<?= $res['type_id']; ?>/verfuegbarkeiten" frameborder="0"
                allowfullscreen></iframe>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
<?php endif; ?>
    <div class="res-detail" itemscope itemtype="http://schema.org/Product">
        <div class="row">
            <div class="medium-7 columns" id="res-detail-images">
                <div class="orbit-container">

                    <ul class="depot-ressource-detail-slider" data-orbit data-options="slide_number_text:von">
                        <li class="active" itemprop="image" data-orbit-slide="image-i">
                            <a href="#" data-reveal-id="image-i-big">
								<?= $res['field_bild_i']; ?>
                            </a>
                            <div id="image-i-big" class="reveal-modal small image-big-modal" data-reveal
                                 aria-hidden="true">
								<?= $res['field_bild_i']; ?>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                        </li>
                        <li itemprop="image" data-orbit-slide="image-ii">
                            <a href="#" data-reveal-id="image-ii-big">
								<?= $res['field_bild_ii']; ?>
                            </a>
                            <div id="image-ii-big" class="reveal-modal small image-big-modal" data-reveal
                                 aria-hidden="true">
								<?= $res['field_bild_ii']; ?>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                        </li>
                        <li itemprop="image" data-orbit-slide="image-iii">
                            <a href="#" data-reveal-id="image-iii-big">
								<?= $res['field_bild_iii']; ?>
                            </a>
                            <div id="image-iii-big" class="reveal-modal small image-big-modal" data-reveal
                                 aria-hidden="true">
								<?= $res['field_bild_iii']; ?>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                        </li>
                    </ul>

                </div><!-- /.orbit-container -->
            </div>
            <div class="medium-5 columns">
                <div class="follow-box">
                    <div class="panel" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <h5><?= t('Preis'); ?></h5>
                        <?php $asterisk = (!empty($res['field_mwst']) ? '<span class="asterisk">*</span>' : ''); ?>
                        <p>
                            <span itemprop="price"><?= $res['field_kosten']; ?> <?= $res['field_abrechnungstakt'].$asterisk; ?></span>
							<?php if (!empty($res['field_kosten_2'])) : ?>
                                | <?= t('Ermäßigt'); ?>: <?= $res['field_kosten_2'].$asterisk; ?>
							<?php endif; ?>
							<?php if (!empty($res['field_kaution'])) : ?>
                                | <?= t('Kaution'); ?>: <?= $res['field_kaution']; ?> (<?= t('pro Einheit'); ?>)
							<?php endif; ?></p>
                            <?php if (!empty($res['field_gemeinwohl']) && $res['field_gemeinwohl'] == 'Ja') : ?>
                                <p>
                                    <span class="label warning"><?= t('Achtung!'); ?></span> <?= t('Reservierungen nur durch dem Gemeinwohl verpflichtete Organisationen!'); ?>
                                </p>
                            <?php endif; ?>
                            <?php if (!$res_is_active) : ?>
                                <a href="#" class="button small warning expand"><?= t('Genehmigung ausstehend :('); ?></a>
                            <?php endif; ?>
                            <?php if (!empty($res['field_mwst'])) : ?>
                                <p class="asterisk">* <?= t('Zzgl. MwSt. von @mwst%.',array('@mwst' => $res['field_mwst'])); ?></p>
                            <?php endif; ?>
                            <?php if (!user_is_logged_in()): ?>
                                <a href="/user/login?destination=/reservierungen/neu" id="availability_calendar_btn" class="button small expand ci" type="submit"
                                title="<?= t('Jetzt einloggen und reservieren'); ?>"><i
                                            class="fi fi-check"></i><?= t('Jetzt einloggen und reservieren'); ?></a>
                            <?php else: ?>
                                <?php if (isset($ressource['field_gemeinwohl']['und'][0]['value']) && !in_array(ROLE_ORGANISATION_AUTH_NAME, $user->roles)) : ?>
                                    <a href="#" class="button small expand ci"
                                    title="<?= t('Nur durch gemeinnützige Organisationen reservierbar'); ?>"><i
                                                class="fi fi-check"></i><?= t('Nur durch Organisationen reservierbar'); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="#" id="availability_calendar_btn" class="button small expand ci"
                                    title="<?= t('Verfügbarkeit prüfen'); ?>"><i
                                                class="fi fi-check"></i><?= t('Verfügbarkeit prüfen'); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>

                    </div><!-- /.panel -->

					<?php if ($user_is_owner) : ?>
                        <div class="button-group">
                            <a href="/<?= current_path(); ?>/edit" id="contact_agent_form_btn" class="button small expand">
                                <i class="fi fi-pencil"></i><?= t('Ressource bearbeiten'); ?>
                            </a>
                            <a href="#" data-reveal-id="verfuegbarkeitenModal" class="button small expand">
                                <i class="fi fi-calendar"></i><?= t('Verfügbarkeiten ändern'); ?>
                            </a>
                        </div>
					<?php elseif ($res['user']->data['contact']) : ?>
                        <a href="/user/<?= $res['uid']; ?>/contact" id="contact_agent_btn"
                           class="button small expand"><i
                                    class="fi fi-torso"></i><?= t('Anbieter kontaktieren'); ?></a>
					<?php endif; ?>
                    <a href="#" id="share_btn" class="button secondary small expand" data-dropdown="res-detail-share-dd"
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
        <div class="row">
            <div class="medium-7 column">
                <h1 class="ressource-title"
                    itemprop="name"><?= $res['name']; ?><?php echo strpos('default-thumbnail', $res['field_bild_ii']); ?></h1>
                <section id="res-detail-meta-info">
                    <ul class="clearfix">
                        <li><i class="fi fi-flag"></i><!--<?= t('Kategorie'); ?>:--><span
                                    itemprop="category"><?= $res['field_kategorie']; ?></span></li>
                        <li>
                            <i class="fi fi-marker"></i><?= $res['field_adresse_postleitzahl']; ?> <?= $res['field_adresse_ort']; ?>
                        </li>
                        <li title="<?= t('Bis zu @einheiten verfügbar', array('@einheiten' => $res['field_anzahl_einheiten'])); ?>"><?= t('Einheiten'); ?>
                            : <strong><span itemprop="numberOfItems"
                                            id="depotNumberOfItems"><?= $res['field_anzahl_einheiten']; ?></span></strong>
                        </li>
                    </ul>
                </section>

                <hr/>

                <section id="res-detail-desc" itemprop="description">
                    <p><?= strip_tags($res['field_beschreibung']); ?></p>
                </section>
                <hr/>

                <ul class="accordion" data-accordion>
                    <li class="accordion-navigation">
                        <a href="#res-detail-anbieter" class="accordion-title"><?= t('Anbieter'); ?></a>
                        <div class="row content active" id="res-detail-anbieter">
							<?php
							$created = (new DateTime())->setTimestamp($res['user']->created);

							if ($res['user']->is_organisation) : ?>
                                <div class="user-badge medium-1 column"><?= substr($res['user']->field_organisation_name['und'][0]['value'], 0, 1); ?></div>
                                <div class="medium-10 column"><p>
                                        <strong><?= $res['user']->field_organisation_name['und'][0]['value']; ?></strong>
                                        (<?= ucfirst($res['user']->field_organisation_typ['und'][0]['value']); ?>) <span
                                                class="member-since">| <?= date_format($created, 'd.m.Y'); ?></span></p>
									<?php if (isset($res['user']->field_organisation_website['und'])) : ?>
                                    <?php $arrParsedUrl = parse_url($res['user']->field_organisation_website['und'][0]['value']); ?>
                                        <p>
											<?= t('Website'); ?>:
                                            <a href="<?= !empty($arrParsedUrl['scheme']) ? $res['user']->field_organisation_website['und'][0]['value'] : 'http://' . $res['user']->field_organisation_website['und'][0]['value']; ?>"
                                               target="_blank">
												<?= $res['user']->field_organisation_website['und'][0]['value']; ?>
                                            </a>
                                        </p>
									<?php endif; ?></div>
							<?php else : ?>
                                <div class="user-badge two-digits medium-1 column"><?= substr($res['user']->field_vorname['und'][0]['value'], 0, 1); ?><?= substr($res['user']->field_nachname['und'][0]['value'], 0, 1); ?></div>
                                <div class="medium-10 column">
                                    <p><?= $res['user']->field_anrede['und'][0]['value']; ?> <?= $res['user']->field_vorname['und'][0]['value'] ?> <?= $res['user']->field_nachname['und'][0]['value'] ?>
                                        <span class="member-since">| <?= t('Mitglied seit') . ' ' . date_format($created, 'd.m.Y'); ?></span>
                                    </p>
                                </div>
							<?php endif; ?>
                        </div>
                    </li>
                    <li class="accordion-navigation">
                        <a href="#res-detail-abholung" class="accordion-title"><?= t('Abholort'); ?></a>
                        <div class="content" id="res-detail-abholung">
                            <p><?= $res['field_adresse_strasse']; ?></p>
                            <p><?= $res['field_adresse_postleitzahl']; ?> <?= $res['field_adresse_ort']; ?></p>
                        </div>
                    </li>
					<?php if (!empty($res['field__ffnungszeiten'])) : ?>
                        <li class="accordion-navigation">
                            <a href="#res-detail-oeffnungszeiten"
                               class="accordion-title"><?= t('Öffnungszeiten'); ?></a>
                            <div class="content" id="res-detail-oeffnungszeiten">
                                <p><?= strip_tags($res['field__ffnungszeiten']); ?></p>
                            </div>
                        </li>
					<?php endif; ?>
					<?php if (!empty($res['field_links_i']) || !empty($res['field_links_ii']) || !empty($res['field_links_iii'])
						|| !empty($res['field_upload_i']) || !empty($res['field_upload_ii'])) : ?>
                        <li class="accordion-navigation">
                            <a href="#res-detail-links" class="accordion-title"><?= t('Links'); ?></a>
                            <div class="content" id="res-detail-links">
								<?php if (!empty($res['field_links_i'])) : ?>
                                    <p>
                                        <i class="fi fi-paperclip"></i>
                                        <a href="<?= $res['field_links_i']; ?>" target="_blank"
                                           title="<?= t('Externen Link öffnen'); ?>">
											<?= $res['field_links_i']; ?>
                                        </a>
                                    </p>
								<?php endif; ?>
								<?php if (!empty($res['field_links_ii'])) : ?>
                                    <p>
                                        <i class="fi fi-paperclip"></i>
                                        <a href="<?= $res['field_links_ii']; ?>" target="_blank"
                                           title="<?= t('Externen Link öffnen'); ?>">
											<?= $res['field_links_ii']; ?>
                                        </a>
                                    </p>
								<?php endif; ?>
								<?php if (!empty($res['field_links_iii'])) : ?>
                                    <p>
                                        <i class="fi fi-paperclip"></i>
                                        <a href="<?= $res['field_links_iii']; ?>" target="_blank"
                                           title="<?= t('Externen Link öffnen'); ?>">
											<?= $res['field_links_iii']; ?>
                                        </a>
                                    </p>
								<?php endif; ?>
								<?php if (!empty($res['field_upload_i'])) : ?>
                                    <p><?= $res['field_upload_i']; ?></p><?php endif; ?>
								<?php if (!empty($res['field_upload_ii'])) : ?>
                                    <p><?= $res['field_upload_ii']; ?></p><?php endif; ?>
                            </div>
                        </li>
					<?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>