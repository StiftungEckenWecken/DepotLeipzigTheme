<style type="text/css">

* { font-family: 'Open Sans', sans-serif; }
.os { font-family: 'Open Sans', sans-serif !important; }
h1, h2, h3, h4, h5, h6 { font-family: 'Roboto Slab', serif; }
.rs, .accordion-title { font-family: 'Roboto Slab', serif !important; }

.top-bar { border-bottom:#d8d8d8; box-shadow: 0 0 6px #6f6f6f99; }
.top-bar #top-bar-logo { width: 100px; margin: 16px 40px; }
.top-bar-section ul li { background-color:#fff; }

.button.ci { background-color:#e03b00; }
.l-messages { position:absolute;left:-50%;right:-50%; }

.views-label { float: left; }
.view-ressourcen-bersicht .medium-4.small-12 { padding:0; transition:box-shadow 0.4s; margin-bottom:10px; }
@media only screen and (min-width: 40.063em) {
  .view-ressourcen-bersicht .medium-4.small-12 { width:29%;margin:2%; }
  .page-user #main-content { max-width:70%;margin:0 auto; }
} 
#main-content { margin-top:35px !important; }

.view-ressourcen-bersicht .medium-4.small-12 .views-field-nothing .button.secondary { margin-top:12px; }
.view-ressourcen-bersicht .medium-4.small-12:hover { box-shadow: 0 0 6px #6f6f6f99; }
.view-ressourcen-bersicht .medium-4.small-12:hover .views-field-nothing .button.secondary { background-color:#e03b00;color:#fff; }
.view-ressourcen-bersicht .medium-4.small-12 .views-field-field-bild-i img { width: 100%; }
.view-ressourcen-bersicht .medium-4.small-12 .views-field-field-bild-i .field-content { max-height:211px;overflow:hidden; }
.view-ressourcen-bersicht .medium-4.small-12 .views-field:not(.views-field-field-bild-i){ font-size:0.9em;margin: 0 16px 0 16px;padding:0 8px; }
.view-ressourcen-bersicht .medium-4.small-12 .views-field-field-kategorie { position:absolute;margin-top:-60px !important;font-size:0.7em; }
.view-ressourcen-bersicht .medium-4.small-12 .views-field-name { padding-top:1px !important;text-align:center;position:relative; background-color:#fff; margin-top:-35px !important; }
.view-ressourcen-bersicht .medium-4.small-12 .views-field-field-bezirk .fi { padding-right:5px;opacity:0.5; }
.view-ressourcen-bersicht .medium-4.small-12 .views-field-field-anzahl-einheiten .fi{ margin-left:-12px;padding-right:5px;opacity:0.5; }
.view-ressourcen-bersicht .medium-4.small-12 .views-field-field-kosten-2 {  }

.views-field-field-anzahl-einheiten {float:left;padding-left:20px !important;}
.views-field-field-kosten {float:right; }
.views-field-field-kosten .views-label-field-kosten { float: left; }
.views-field-field-kosten .field-content { float:right; }
.views-field-field-kosten-2 {float:right; }
.views-field-field-kosten-2 .views-label-field-kosten-2 { float: left; }
.views-field-field-kosten-2 .field-content { float:right; }
#res-detail-desc { padding-top:60px; }
.accordion { margin-left: 0; }

.view-ressourcen-detailseite .fi { margin-right:7px; }
.view-ressourcen-detailseite #page-title { display:none; }
.view-ressourcen-detailseite .callout { border: 1px solid #b9b9b9;padding:14px;margin-bottom:10px; }
.view-ressourcen-detailseite #res-detail-meta-info ul { list-style:none; }
.view-ressourcen-detailseite #res-detail-meta-info ul li { text-align:center;font-size:0.85em;line-height:2.5em;float:left;width:33.3%;border-right:1px solid #b9b9b9; }
.view-ressourcen-detailseite #res-detail-meta-info ul li:last-child { border-right: unset; }
.orbit-slides-container { height: 480px; }

.form-type-checkbox .description { float:right;margin-top:-32px;margin-left:3.5em; }
#wannabe-hero { display:none;background:url('sites/all/themes/depot_theme/images/hero_sandwich.jpg') repeat-x;height:238px;opacity:0.7;width:100%;position:absolute;top:62px;}
.page-ressourcen #wannabe-hero { display:block !important; }
</style>
<!-- TEMPORARY!! -->

<header id="wannabe-hero"></header>

<!--.page -->
<div role="document" class="page">

  <!--.l-header -->
  <header role="banner" class="l-header">

    <?php if ($top_bar): ?>
      <!--.top-bar -->
      <?php if ($top_bar_classes): ?>
        <div class="<?php print $top_bar_classes; ?>">
      <?php endif; ?>
      <nav class="top-bar" data-topbar <?php print $top_bar_options; ?>>
        <ul class="title-area">
          <li class="name">
           <a href="/"><img id="top-bar-logo" src="<?= base_path().path_to_theme(); ?>/images/logo.png" alt="Logo Depot Leipzig" /></a>
           </li>
          <li class="toggle-topbar menu-icon">
            <a href="#"><span><?php print $top_bar_menu_text; ?></span></a></li>
        </ul>
        <section class="top-bar-section">
          <ul id="main-menu" class="main-nav left"><li class="first expanded has-dropdown">
            <li><select id="depot-global-select-kategorie" style="margin:10px 0 0 4px;">
            <?php foreach(depot_get_kategorien(true) as $bid => $bezirk) { ?>
              <option value="<?= $bid; ?>"><?= (empty($bid)) ? t('Alle Kategorien') : $bezirk; ?></option>
            <?php } ?>
            </select></li>
          </ul>
          <?php if ($top_bar_main_menu) : ?>
            <?php //print $top_bar_main_menu; ?>
          <?php endif; ?>
          <?php if ($top_bar_secondary_menu) : ?>
            <?php print $top_bar_secondary_menu; ?>
          <?php endif; ?>
        </section>
      </nav>
      <?php if ($top_bar_classes): ?>
        </div>
      <?php endif; ?>
      <!--/.top-bar -->
    <?php endif; ?>

    <!-- Title, slogan and menu -->
    <?php if ($alt_header): ?>
      <section class="row <?php print $alt_header_classes; ?>">

        <?php if ($linked_logo): print $linked_logo; endif; ?>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name" class="element-invisible">
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <h2 title="<?php print $site_slogan; ?>" class="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>

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
  <!--/.l-header -->

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

  <!--.l-main -->
  <main role="main" id="main-content" class="row l-main">
    <!-- .l-main region -->
    <div class="<?php print $main_grid; ?> main columns">
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlight panel callout">
          <?php print render($page['highlighted']); ?>
        </div>
      <?php endif; ?>

      <a id="main-content"></a>

      <?php if ($breadcrumb): print $breadcrumb; endif; ?>

      <?php if ($title): ?>
        <?php print render($title_prefix); ?>
        <h1 id="page-title" class="title"><?php print $title; ?></h1>
        <?php print render($title_suffix); ?>
      <?php endif; ?>

      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
        <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
      <?php endif; ?>

      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>

      <?php print render($page['content']); ?>
    </div>
    <!--/.l-main region -->
  </main>
  <!--/.l-main -->

  <?php if (!empty($page['triptych_first']) || !empty($page['triptych_middle']) || !empty($page['triptych_last'])): ?>
    <!--.triptych-->
    <section class="l-triptych row">
      <div class="triptych-first medium-4 columns">
        <?php print render($page['triptych_first']); ?>
      </div>
      <div class="triptych-middle medium-4 columns">
        <?php print render($page['triptych_middle']); ?>
      </div>
      <div class="triptych-last medium-4 columns">
        <?php print render($page['triptych_last']); ?>
      </div>
    </section>
    <!--/.triptych -->
  <?php endif; ?>

  <?php if (!empty($page['footer_firstcolumn']) || !empty($page['footer_secondcolumn']) || !empty($page['footer_thirdcolumn']) || !empty($page['footer_fourthcolumn'])): ?>
    <!--.footer-columns -->
    <section class="row l-footer-columns">
      <?php if (!empty($page['footer_firstcolumn'])): ?>
        <div class="footer-first medium-3 columns">
          <?php print render($page['footer_firstcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_secondcolumn'])): ?>
        <div class="footer-second medium-3 columns">
          <?php print render($page['footer_secondcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_thirdcolumn'])): ?>
        <div class="footer-third medium-3 columns">
          <?php print render($page['footer_thirdcolumn']); ?>
        </div>
      <?php endif; ?>
      <?php if (!empty($page['footer_fourthcolumn'])): ?>
        <div class="footer-fourth medium-3 columns">
          <?php print render($page['footer_fourthcolumn']); ?>
        </div>
      <?php endif; ?>
    </section>
    <!--/.footer-columns-->
  <?php endif; ?>

  <!--.l-footer -->
  <footer class="l-footer panel row" role="contentinfo">
    <?php if (!empty($page['footer'])): ?>
      <div class="footer columns">
      <div class="copyright columns">
        &copy; <?php print date('Y') . ' ' . $site_name . ' ' . t('All rights reserved.'); ?>
      </div>blubb
        <?php print render($page['main-menu']); ?>
      </div>
    <?php endif; ?>

    <?php if ($site_name) : $bla = menu_tree('main-menu');  print drupal_render($bla); ?>
    
      <div class="copyright columns">
        &copy; <?php print date('Y') . ' ' . $site_name . ' ' . t('All rights reserved.'); ?>
      </div>
    <?php endif; ?>
  </footer>
  <!--/.l-footer -->

  <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div>
<!--/.page -->
