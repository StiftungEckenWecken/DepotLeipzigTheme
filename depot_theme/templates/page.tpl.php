<style type="text/css">

* { font-family: 'Open Sans', sans-serif; }
.os { font-family: 'Open Sans', sans-serif !important; }
h1, h2, h3, h4, h5, h6 { font-family: 'Roboto Slab', serif; }
.rs, .accordion-title, .l-footer *,.form-type-checkbox:not(.form-item-field-verleihvertrag--und) .description, fieldset legend, label { font-family: 'Roboto Slab', serif !important; }

.top-bar { border-bottom:#d8d8d8; box-shadow: 0 0 6px #6f6f6f99; }
.top-bar-section ul li { background-color:#fff; }

.logged-in #button-group-logged-out { display:none; }
.not-logged-in #button-group-logged-in { display:none; }

.button-group li.active a { background-color:#fff;border-bottom:2px solid #e03b00;}
.button.ci { background-color:#e03b00; }
.button.ci:hover { background-color:#AC2F02; } /* 20% darker by default */
.l-messages { position:absolute;left:-50%;right:-50%; }
.orbit-bullets { margin-bottom: 5px; }
.fieldset-wrapper .form-type-checkbox .option { display:none; }
.form-item-pass-pass1.password-parent { width:auto; }
.form-item-pass-pass2 { padding-top:36px; }
.views-label { float: left; }
.res-elem { padding:0; transition:box-shadow 0.4s; margin-bottom:10px; }
@media only screen and (min-width: 40.063em) {
  .top-bar #top-bar-logo { width: 100px; margin: 16px 40px; }
  .top-bar .menu { float:right; }
  .top-bar .menu .makeMeCd a { background-color:#e03b00 !important;color:#fff; }
  .res-elem { width:29%;margin:2%; }
  .page-user #main-content { max-width:50%;margin:0 auto; }
  #depot-global-select-kategorie { margin:13px 0 0 4px; }
} 
@media only screen and (max-width: 40.063em) {
  .top-bar #top-bar-logo { width: 100px; margin: 16px 12px; }
  .top-bar .toggle-topbar.menu-icon a {color: #888888 !important;}
  .top-bar .toggle-topbar.menu-icon a span:after { box-shadow:0 0 0 1px #888888, 0 7px 0 1px #888888, 0 14px 0 1px #888888; }
  #depot-global-select-kategorie { margin-bottom: 5px; }
  #views-exposed-form-ressourcen-bersicht-page input,  #views-exposed-form-ressourcen-bersicht-page select { width:100%; }
  .l-footer ul { display:none; }
  #availability_calendar_btn { position:fixed;width:100%;margin:0;left:0;bottom:0;z-index:999; }
}

#main-content { margin-top:35px !important; }
.page-user .breadcrumbs { display:none; }

.res-elem { background-color: #fff; }
.res-elem .views-field-nothing .button.secondary { margin-top:12px; }
.res-elem.res-mein-depot-elem .views-field-nothing .button.secondary { margin-bottom:2px; }

.res-elem:hover { box-shadow: 0 0 6px #6f6f6f99; }
.res-elem:hover .views-field-nothing .button.secondary { background-color:#e03b00;color:#fff; }
.res-elem .views-field-field-bild-i img { width: 100%; }
.res-elem .views-field-field-bild-i .field-content { max-height:211px;overflow:hidden; }
.res-elem .views-field:not(.views-field-field-bild-i){ font-size:0.9em;margin: 0 16px 0 16px;padding:0 8px; }
.res-elem .views-field-field-kategorie { position:absolute;margin-top:-60px !important;font-size:0.7em; }
.res-elem .views-field-name { padding-top:1px !important;text-align:center;position:relative; background-color:#fff; margin-top:-35px !important; }
.res-elem .views-field-field-bezirk .fi { padding-right:5px;opacity:0.5; }
.res-elem .views-field-field-anzahl-einheiten .fi{ margin-left:-12px;padding-right:5px;opacity:0.5; }
.res-elem .views-field-field-kosten-2 {  }

.views-field-field-anzahl-einheiten {float:left;padding-left:20px !important;}
.views-field-field-kosten {float:right; }
.views-field-field-kosten .views-label-field-kosten { float: left; }
.views-field-field-kosten .field-content { float:right; }
.views-field-field-kosten-2 {float:right; }
.views-field-field-kosten-2 .views-label-field-kosten-2 { float: left; }
.views-field-field-kosten-2 .field-content { float:right; }
#res-detail-desc { padding-top:60px; }
.accordion { margin-left: 0; }

.ressource-page-button-group .fi { font-size:1.3em;padding-right:6px; }

.view-ressourcen-detailseite .fi { margin-right:7px; }
.view-ressourcen-detailseite #page-title { display:none; }
.view-ressourcen-detailseite .callout { border: 1px solid #b9b9b9;padding:14px;margin-bottom:10px; }
.view-ressourcen-detailseite #res-detail-meta-info ul { list-style:none; }
.view-ressourcen-detailseite #res-detail-meta-info ul li { text-align:center;font-size:0.85em;line-height:2.5em;float:left;width:33.3%;border-right:1px solid #b9b9b9; }
.view-ressourcen-detailseite #res-detail-meta-info ul li:last-child { border-right: unset; }
.depot-ressource-detail-slider { max-height:400px; }
.reveal-modal-bg { z-index:998; }
#verfuegbarkeitenModal { top:5px !important; }
.image-big-modal { text-align:center;padding:5px;top:40px !important; }

.button.margin-top-ten { margin-top:25px; }
.section-user .field-label { float:left; }
form label { padding-bottom:6px; }
.form-type-checkbox .option { padding-left:8px;position:absolute;margin-top:-4px; }
.form-type-textarea .description { padding-top:10px; }
fieldset legend { font-size:1.2em; }
.fieldset-toggle { height:0;overflow:hidden;padding-top:0; }
.fieldset-toggle legend { margin-left:32px;cursor:pointer; }
.fieldset-toggle legend:before { content:'▴';position:relative;transform:rotate(180deg);font-size:1.5em;cursor:pointer;margin-top:-6px;margin-left:-40px;color:#323131;background:#fff;transition:0.25s transform; }
.fieldset-toggle.toggled { height:auto; }
.fieldset-toggle.toggled legend:before { transform:rotate(90deg);}

.form-type-checkbox:not(.form-item-field-verleihvertrag--und) .description { float:right;margin-top:-32px;margin-left:3.5em; }
#wannabe-hero { display:none;background:url('/sites/all/themes/depot_theme/images/hero_sandwich.jpg') repeat-x;height:232px;opacity:0.7;width:100%;position:absolute;top:62px;}
.l-footer { border-top:1px solid #d8d8d8;padding-top:12px;margin-top:20px;background-color:rgba(255,255,255,0.7); }
.l-footer:after { opacity:0.7;content:'';background:url('sites/all/themes/depot_theme/images/logo_s.png') no-repeat;width:238px;height:238px;bottom:-50px;left:-50px;z-index:-1;position:fixed; }
.front #wannabe-hero { display:block !important; }

#user-profile-form #edit-field-agb { display:none; }

#depot-footer-menu ul li a, .l-footer p { font-size:0.85em; }
#depot-footer-menu ul { list-style:none;float:right; }
#depot-footer-menu ul li { float:left;padding-left:20px; }
#depot-footer-menu ul li.active-trail a { font-weight:bold; }
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
            <li><select id="depot-global-select-kategorie">
            <?php foreach(depot_get_kategorien(true) as $bid => $bezirk) { ?>
              <option value="<?= $bid; ?>"><?= (empty($bid)) ? t('Alle Kategorien') : $bezirk; ?></option>
            <?php } ?>
            </select></li>
          </ul>
          <?php if ($top_bar_main_menu) : ?>
            <?php //print $top_bar_main_menu; ?>
          <?php endif; ?>
          <?php $user_menu = menu_tree('user-menu');
                print drupal_render($user_menu); ?>
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

  </div><!--/.page -->

  <!--.l-footer -->
  <footer class="l-footer" role="contentinfo">
    <?php if (!empty($page['footer'])): ?>
      <div class="footer columns">
      <div class="copyright columns">
        &copy; <?php print date('Y') . ' ' . $site_name . ' ' . t('All rights reserved.'); ?>
      </div>
        <?php print render($page['main-menu']); ?>
      </div>
    <?php endif; ?>

    <?php if ($site_name) : $menu = menu_tree('main-menu');  ?>
    <div class="row">
    
      <div class="medium-4 column">
        <p>&copy; Copyright <?php print date('Y') . ', ' . $site_name; ?></p>
      </div>
      
      <div id="depot-footer-menu" class="medium-8 column">
        <?php print drupal_render($menu); ?>
      </div>

    </div>
    <?php endif; ?>
  </footer>
  <!--/.l-footer -->

  <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
