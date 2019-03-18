<<<<<<< HEAD
<?php

$regionalpartner = depot_get_active_regionalpartner();
$rp_sites = depot_get_regions();

$rp_logo = null;
            
// Get RP-logo to display in right-handed header-nav
$query = new EntityFieldQuery();
$entities = $query->entityCondition('entity_type', 'node')
    ->propertyCondition('type', 'regionalpartner')
    ->propertyCondition('status', 1)
    ->range(0,1)
    ->execute();

if (!empty($entities['node'])) {
    $_node = node_load(array_shift(array_keys($entities['node'])));
    $rp_logo = field_view_field('node', $_node, 'field_logo', array('label'=>'hidden'));
}

?>
<script type="text/javascript">
  var depotRegionMarkers = [<?= depot_get_rp_geodata(); ?>];
</script>
<header role="banner" class="l-header">

    <!--.top-bar -->
    <nav class="top-bar" data-topbar <?php print $top_bar_options; ?>>
        <ul class="title-area">
            <li class="name">
                <a href="/">
                    <img id="top-bar-logo" src="<?=  base_path() . path_to_theme() . '/images/logo.svg'; ?>" alt="Logo depot <?= $regionalpartner['region']['name'] ?>"/>
                </a>
            </li>
            <li class="toggle-topbar menu-icon">
                <a href="#"><span>
                    <?php print $top_bar_menu_text; ?>
                </span></a>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul id="main-menu" class="main-nav">
                <li id="main-menu__region-selected">
                    <a href="#" class="hide-for-medium-up" title="<?= t('Aktuelle depot-Region: @name. Jetzt wechseln?', array('@name' => $regionalpartner['region']['name'])) ?>">
                        <?= t('Aktuelle depot-Region:'); ?> <?= $regionalpartner['region']['name'] ?>

                    </a>
                    <a href="#" class="hide-for-small-only" title="<?= t('Aktuelle depot-Region: @name. Jetzt wechseln?', array('@name' => $regionalpartner['region']['name'])) ?>">
                        <?= $regionalpartner['region']['name'] ?>
                    </a>
                </li>
                <div id="depot-region-select" class="row">
                  <div id="depot-region-select__header" class="small-12 column clearfix">
                      <h5 class="left">
                        <?= t('depot-Region wechseln'); ?>
                        <a href="#" title="Diese Sharing-Plattform existiert auch für andere Städte und Gemeinden!">?</a>
                      </h5>
                      <a href="#" class="close-popup right" title="<?= t('Fenster schließen'); ?>">
                          <i class="fi fi-x"></i>
                      </a>
                  </div>
                  <div id="depot-region-select__list" class="medium-6 column">
                    <ul>
                      <?php foreach ($rp_sites as $url => $region) :
                        if ($region['active']) : ?>
                          <li class="<?= ($region['domain'] == $regionalpartner['domain'] ? 'active': ''); ?>">
                              <a
                              title="<?= t('Jetzt zum depot @name (@state) wechseln', array(
                                  '@name' => $region['region']['name'],
                                  '@state' => $region['region']['state']
                              )); ?>" href="https://<?= $url; ?>"><?= $region['region']['name']; ?></a>
                          </li>
                        <?php endif;
                            endforeach; ?>
                    </ul>
                  </div>
                  <div id="depot-region-select__map" class="medium-6 column">
                    <!-- #depot-regions-map -->
                    <aside id="depot-regions-map-wrapper" class="row">
                        <div id="depot-regions-map" class="map"></div>
                    </aside>
                    <!-- /#depot-regions-map -->
                  </div>
                </div>
            </ul>
            
            <?php
                $user_menu = menu_tree('user-menu');
                print drupal_render($user_menu);
            ?>

            <?php if ($rp_logo) : ?>
            <ul class="menu depot-rp-logo-only-menu">
              <li class="hide-for-small-only" title="<?= t('Zum Profil des depot-Regionalpartners'); ?>">
                <a href="/regionalpartner-profil">
                <?php print render($rp_logo); ?>
                </a>
              </li>
            </ul>
            <?php endif; ?>
        </section>
    </nav>
    <!--/.top-bar -->

    <!-- Title, slogan and menu -->
    <?php if ($alt_header): ?>
        <section class="row <?php print $alt_header_classes; ?>">

            <?php if ($linked_logo): print $linked_logo; endif; ?>

            <?php if ($site_name): ?>
                <?php if ($title): ?>
                    <div id="site-name" class="element-invisible">
                        <strong>
                            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
                                rel="home"><span><?php print $site_name; ?></span></a>
                        </strong>
                    </div>
                <?php else: /* Use h1 when the content title is empty */ ?>
                    <h1 id="site-name">
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
                            rel="home"><span><?php print $site_name; ?></span></a>
                    </h1>
                <?php endif; ?>
            <?php endif; ?>
            
            <!--
            <?php if ($site_slogan): ?>
                <h2 title="<?php print $site_slogan; ?>" class="site-slogan"><?php print $site_slogan; ?></h2>
            <?php endif; ?>
            -->

            <?php if ($alt_main_menu): ?>
                <nav id="main-menu" class="navigation" role="navigation">
                    <?php print ($alt_main_menu); ?>
                </nav> <!-- /#main-menu -->
            <?php endif; ?>

            <?php if ($alt_secondary_menu): ?>
                <nav id="secondary-menu" class="navigation" role="navigation">
                    <?php print $alt_secondary_menu; ?>
                </nav> <!-- /#secondary-menu -->
            <?php endif; ?>

        </section>
    <?php endif; ?>
    <!-- End title, slogan and menu -->

    <?php if (!empty($page['header'])): ?>
        <!--.l-header-region -->
        <section class="l-header-region row">
            <div class="columns">
                <?php print render($page['header']); ?>
            </div>
        </section>
        <!--/.l-header-region -->
    <?php endif; ?>

</header>

<?php if (!empty($page['featured'])): ?>
    <!--.l-featured -->
    <section class="l-featured row">
        <div class="columns">
            <?php print render($page['featured']); ?>
        </div>
    </section>
    <!--/.l-featured -->
<?php endif; ?>

<?php if ($messages && !$zurb_foundation_messages_modal): ?>
    <!--.l-messages -->
    <section class="l-messages row">
        <div class="columns">
            <?php if ($messages): print $messages; endif; ?>
        </div>
    </section>
    <!--/.l-messages -->
<?php endif; ?>

<?php if (!empty($page['help'])): ?>
    <!--.l-help -->
    <section class="l-help row">
        <div class="columns">
            <?php print render($page['help']); ?>
        </div>
    </section>
    <!--/.l-help -->
<?php endif; ?>

<?php if ($breadcrumb): ?>
    <div class="row">
        <?php print $breadcrumb; ?>
    </div>
<?php endif; ?>
=======
<?php global $regionalpartner; ?>
<header role="banner" class="l-header">
    
    <!--.top-bar -->
    <nav class="top-bar" data-topbar <?php print $top_bar_options; ?>>
        <ul class="title-area">
            <li class="name">
                <a href="/">
                    <img id="top-bar-logo" src="<?=  base_path() . path_to_theme() . '/images/logo.svg'; ?>" alt="Logo Depot <?= $regionalpartner['region']['name'] ?>"/>
                </a>
            </li>
            <li class="toggle-topbar menu-icon">
                <a href="#"><span>
                    <?php print $top_bar_menu_text; ?>
                </span></a>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul id="main-menu" class="main-nav">
                <li id="main-menu__region-selected">
                    <a href="#" title="<?= t('Aktuelle Depot-Region: @name. Jetzt wechseln?', array('@name' => $regionalpartner['region']['name'])) ?>">
                        Leipzig <?= $regionalpartner['region']['name'] ?>
                    </a>
                </li>
                <div id="depot-region-select" class="row">
                  <div id="depot-region-select__header" class="small-12 column clearfix">
                      <h5 class="left"><?= t('Region wechseln'); ?></h5>
                      <a href="#" class="close-popup right" title="<?= t('Fenster schließen'); ?>">
                          <i class="fi fi-x"></i>
                      </a>
                  </div>
                  <div id="depot-region-select__list" class="medium-6 column">
                    <ul>
                      <?php foreach (depot_get_regions() as $url => $region) :
                        if ($region['active']) : ?>
                          <li>
                              <a title="<?= t('Jetzt zum Depot @name (@state) wechseln', array(
                                  '@name' => $region['region']['name'],
                                  '@state' => $region['region']['state']
                              )); ?>" href="https://<?= $url; ?>"><?= $region['region']['name']; ?></a>
                          </li>
                        <?php endif;
                            endforeach; ?>
                      <li class="active"><a href="#">Leipzig</a></li>
                      <li><a href="#">Berlin</a></li>
                      <li><a href="#">Hamburg</a></li>
                      <li><a href="#">Köln</a></li>
                      <li><a href="#">Dresden</a></li>
                      <li><a href="#">Bielefeld</a></li>
                      <li><a href="#">Marburg</a></li>
                      <li><a href="#">Wien</a></li>
                    </ul>
                  </div>
                  <div id="depot-region-select__map" class="medium-6 column">
                      KARTE
                  </div>
                </div>
            </ul>
            <?php $user_menu = menu_tree('user-menu');
                  print drupal_render($user_menu); ?>
        </section>
    </nav>
    <!--/.top-bar -->

    <!-- Title, slogan and menu -->
    <?php if ($alt_header): ?>
        <section class="row <?php print $alt_header_classes; ?>">

            <?php if ($linked_logo): print $linked_logo; endif; ?>

            <?php if ($site_name): ?>
                <?php if ($title): ?>
                    <div id="site-name" class="element-invisible">
                        <strong>
                            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
                                rel="home"><span><?php print $site_name; ?></span></a>
                        </strong>
                    </div>
                <?php else: /* Use h1 when the content title is empty */ ?>
                    <h1 id="site-name">
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"
                            rel="home"><span><?php print $site_name; ?></span></a>
                    </h1>
                <?php endif; ?>
            <?php endif; ?>
            
            <!--
            <?php if ($site_slogan): ?>
                <h2 title="<?php print $site_slogan; ?>" class="site-slogan"><?php print $site_slogan; ?></h2>
            <?php endif; ?>
            -->

            <?php if ($alt_main_menu): ?>
                <nav id="main-menu" class="navigation" role="navigation">
                    <?php print ($alt_main_menu); ?>
                </nav> <!-- /#main-menu -->
            <?php endif; ?>

            <?php if ($alt_secondary_menu): ?>
                <nav id="secondary-menu" class="navigation" role="navigation">
                    <?php print $alt_secondary_menu; ?>
                </nav> <!-- /#secondary-menu -->
            <?php endif; ?>

        </section>
    <?php endif; ?>
    <!-- End title, slogan and menu -->

    <?php if (!empty($page['header'])): ?>
        <!--.l-header-region -->
        <section class="l-header-region row">
            <div class="columns">
                <?php print render($page['header']); ?>
            </div>
        </section>
        <!--/.l-header-region -->
    <?php endif; ?>

</header>

<?php if (!empty($page['featured'])): ?>
    <!--.l-featured -->
    <section class="l-featured row">
        <div class="columns">
            <?php print render($page['featured']); ?>
        </div>
    </section>
    <!--/.l-featured -->
<?php endif; ?>

<?php if ($messages && !$zurb_foundation_messages_modal): ?>
    <!--.l-messages -->
    <section class="l-messages row">
        <div class="columns">
            <?php if ($messages): print $messages; endif; ?>
        </div>
    </section>
    <!--/.l-messages -->
<?php endif; ?>

<?php if (!empty($page['help'])): ?>
    <!--.l-help -->
    <section class="l-help row">
        <div class="columns">
            <?php print render($page['help']); ?>
        </div>
    </section>
    <!--/.l-help -->
<?php endif; ?>

<?php if ($breadcrumb): ?>
    <div class="row">
        <?php print $breadcrumb; ?>
    </div>
<?php endif; ?>
>>>>>>> 87fefedda3330ba011fcac45dfd806f850d1afc1
