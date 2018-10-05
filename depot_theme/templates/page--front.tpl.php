<script type="text/javascript">
  var depotResourceMarkers = [<?= depot_get_resources_geodata(); ?>];
</script>
<!--.page -->
<div role="document" class="page">

    <!--.l-header -->
    <?php include_once('header.tpl.php') ?>
    <!--/.l-header -->

    <section id="front-header">
      <div class="row">
        
        <?php if (user_is_logged_in()) : ?>
            <?php global $user; ?>
            <h1>
                <?= t('Willkommen zurück, <span>@username</span>!', array('@username' => $user->name)); ?>
            </h1>

            <p>
              <?php setlocale(LC_ALL, "de_DE"); ?>
              <?= t('Mitglied seit'); ?> <?= strftime('%A, %e. %B %G', $user->created); ?><br />
                <?php if (user_has_role(ROLE_ORGANISATION_AUTH)) : ?>
                  <?= t('Status der Gemeinwohlanerkennung: <span style="font-weight:bold;color:green;">Aktiv</span>'); ?>
                <?php else : ?>
                  <?= t('Status der Gemeinwohlanerkennung: <span style="font-weight:bold;color:red;">Inaktiv</span>'); ?>
                <?php endif; ?>
            </p>

            <?php if (!user_has_role(ROLE_ORGANISATION_AUTH)) : ?>
            <div class="popup-item">
                <div class="description">
                    <?= t('Als gemeinnützig anerkanntes Mitglied stehen Dir einige Vorteile zur Verfügung. <a href="#">Mehr erfahren</a>') ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- @todo Add <span class="badge">{{ reservations.length }}</span> -->
            <div id="front-header__buttons">
                <a href="/mein-depot" class="button"><?= t('Meine Ressourcen'); ?></a>
                <a href="/mein-depot/reservierungen" class="button"><?= t('Reservierungen & Anfragen'); ?></a>
            </div>
        <?php else : ?>
            <h1>
                <?= t('Ressourcen teilen und verleihen in <span>@region</span>', array('@region' => 'Leipzig')) ?>
            </h1>

            <p>
                <?= theme_get_setting('depot_frontpage_text_header'); ?>
            </p>

            <div id="front-header__buttons">
                <a href="#main-content" class="button"><?= t('Angebote suchen'); ?></a>
                <a href="/user/register" class="button white" title="<?= t('Jetzt kostenlos registrieren und Angebot einstellen') ?>"><?= t('Verleiher werden'); ?></a>
            </div>
        <?php endif; ?>

      </div>
    </section>

    <!--.l-main -->
    <main role="main" id="main-content" class="row l-main">
        <div class="<?php print $main_grid; ?> main columns">
            
            <?php if (!empty($page['highlighted'])): ?>
                <div class="highlight panel callout">
					<?php print render($page['highlighted']); ?>
                </div>
			<?php endif; ?>

            <a id="main-content"></a>
            
            <!--.depot-blog -->
			<section class="depot-blog row">
                <h3><?= t('Aus unserem Blog'); ?></h3>

                <?php 
                  $articles = depot_get_blog_articles(3);

                  foreach ($articles as $article) :
                    // @todo More semantic and preview of node-body
                ?>
                
                <article class="depot-blog-teaser medium-4 column">
                    <div class="depot-blog-teaser__date">
                        <?= strftime('%d', $article->created); ?><br />
                        <?= strftime('%b', $article->created); ?>
                    </div>
                    <a href="<?= url('node/' . $article->nid, array('absolute' => TRUE)) ?>">
                        <h5><?= $article->title; ?></h5>
                    </a>
                </article>

                <?php endforeach; ?>
            </section>
            <!--/.depot-blog -->

            <!--.depot-resources-map -->
            <aside id="depot-resources-map-wrapper" class="row">
                <div id="depot-resources-map" class="map small-12 column"></div>
            </aside>
            <!--/.depot-resources-map -->

            <?php 
            
            $view = views_get_view('resources_list');

            $view->set_display('block_view');
            
            $view->dom_id = 'startpage';
            
            $view->execute();
            
            /** 
             * Make exposed search form become AJAXified
             * @see modules/views/theme/theme.inc
             * @see https://www.drupal.org/project/views/issues/2934135
             */

            $settings = array(
                'views' => array(
                  'ajax_path' => url('views/ajax'),
                  'ajaxViews' => array(
                    'views_dom_id_' . $view->dom_id => array(
                      'view_name' => $view->name,
                      'view_display_id' => $view->current_display,
                      'view_args' => check_plain(implode('/', $view->args)),
                      'view_path' => check_plain($_GET['q']),
                      'view_base_path' => $view->get_path(),
                      'view_dom_id' => $view->dom_id,
                      // To fit multiple views on a page, the programmer may have
                      // overridden the display's pager_element.
                      'pager_element' => isset($view->query->pager) ? $view->query->pager->get_pager_id() : 0,
                    ),
                  ),
                ),
                // Support for AJAX path validation in core 7.39.
                'urlIsAjaxTrusted' => array(
                  url('ressourcen') => TRUE,
                  url('views/ajax') => TRUE,
                ),
              );
          
            drupal_add_js($settings, 'setting');

            print $view->render('block_view');
            ?>

        </div>
        <!--/.main -->
    </main>
    <!--/.l-main -->

    <!--#front-content-i -->
    <section id="front-content-i" class="front-content">
        <div class="bg"></div>

        <div class="row">
            <div id="front-content-i__content" class="medium-6 medium-offset-6 column">
                <?= theme_get_setting('depot_frontpage_text_content_i') ?>
            </div>
        </div>
    </section>
    <!--/#front-content-i -->

    <!--#front-top-categories -->
    <section id="front-top-categories">

    </section>
    <!--/#front-top-categories -->

    <!--#front-content-ii -->
    <section id="front-content-ii" class="front-content">
        <div class="bg"></div>

        <div class="row">
            <div id="front-content-ii__content" class="medium-6 column">
                <?= theme_get_setting('depot_frontpage_text_content_ii') ?>
            </div>
        </div>
    </section>
    <!--/#front-content-ii -->

</div><!--/.page -->

<!--.l-footer -->
<?php include_once('footer.tpl.php'); ?>
<!--/.l-footer -->