<?php
  // "RP stellt sich vor" profile page
  
  // Separate node-field's to avoid pre-rendered contents
  // @thanks https://www.drupal.org/forum/support/theme-development/2014-06-19/solvedrendering-fields-in-page-node-content_type
  $subtitle = field_view_field('node', $node, 'field_subtitle', array('label'=>'hidden'));
  $title = field_view_field('node', $node, 'title', array('label'=>'hidden'));
  $logo = field_view_field('node', $node, 'field_logo', array('label'=>'hidden'));
  $teaser_bild = field_view_field('node', $node, 'field_teaser_bild', array('label'=>'hidden'));
  $slogan = field_view_field('node', $node, 'field_slogan', array('label'=>'hidden'));
  $content = field_view_field('node', $node, 'body', array('label'=>'hidden'));

  // social media links
  $social_facebook = $node->field_social_media_facebook['und'][0]['value'];
  $social_twitter = $node->field_social_media_twitter['und'][0]['value'];
  $social_instagram = $node->field_social_media_instagram['und'][0]['value'];
  $social_diaspora = $node->field_social_media_diaspora['und'][0]['value'];

?>
<!--.page -->
<div role="document" class="page">

    <!--.l-header -->
    <?php include_once('header.tpl.php'); ?>
    <!--/.l-header -->

    <section id="rp-profile-header">
      <div class="row">
        <h2><?= $node->title; ?></h2>
        <?php print render($subtitle); ?>
    </div>
    </section>

    <!--.l-main -->
    <main role="main" id="main-content" class="row l-main">
        <!-- .l-main region -->
        <div id="rp-profile-teaser-bild">
            <?php print render($teaser_bild); ?>
        </div>

        <div id="rp-profile-logo">
            <?php print render($logo); ?>
        </div>

        <div id="rp-profile-slogan">
            <?php print render($slogan); ?>
        </div>

        <div class="<?php print $main_grid; ?> columns">
			<?php if (!empty($page['highlighted'])): ?>
                <div class="highlight panel callout">
					<?php print render($page['highlighted']); ?>
                </div>
			<?php endif; ?>

            <aside class="medium-3 column" id="rp-profile-quicknav">
              <ul>
                <li>
                    <a href="#">
                        <strong><?= t('Über uns'); ?></strong>
                    </a>
                </li>
                <li>
                    <a href="/contact" title="<?= t('Zum Kontaktformular'); ?>">
                        <?= t('Kontaktformular'); ?>
                    </a>
                </li>
                <!--<li>
                    <a href="#" title="">
                        <?= t('Mitmachen'); ?>
                    </a>
                </li>-->
              </ul>

              <div class="sticky article-social" data-sticky="" data-anchor="sticky1" data-sticky-on="small">
                <div class="rounded-social-buttons">
                    <?php if ($social_facebook) : ?>
                    <a class="facebook social-button fi fi-social-facebook" href="<?= $social_facebook; ?>" target="_blank" title="Seite auf Facebook besuchen (externer Link)"></a>
                    <?php endif;
                          if ($social_twitter) : ?>
                    <a class="twitter social-button fi fi-social-twitter" href="<?= $social_twitter; ?>" target="_blank" title="Twitter-Profil besuchen (externer Link)"></a>
                    <?php endif;
                          if ($social_instagram) : ?>
                    <a class="instagram social-button fi fi-social-instagram" href="<?= $social_instagram; ?>" target="_blank" title="Instagram-Profil besuchen (externer Link)"></a>
                    <?php endif;
                          if ($social_diaspora) : ?>
                    <a class="diaspora social-button fi fi-asterisk" href="<?= $social_diaspora; ?>" target="_blank" title="Seite auf Diaspora* besuchen (externer Link)"></a>
                    <?php endif; ?>
                </div>
              </div>

            </aside>

            <div class="medium-8 column" id="rp-profile-content">
              <?php print render($content); ?>
            </div>

        </div>
        <!--/.l-main region -->
    </main>
    <!--/.l-main -->

</div><!--/.page -->

<!--.l-footer -->
<?php include_once('footer.tpl.php'); ?>
<!--/.l-footer -->