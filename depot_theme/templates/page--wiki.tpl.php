<?php
  // "So funktioniert's / FAQ" page
  
  // Get node-field's manually to avoid pre-rendered contents
  // @see https://www.drupal.org/forum/support/theme-development/2014-06-19/solvedrendering-fields-in-page-node-content_type
  $inhaltsverzeichnis = field_view_field('node', $node, 'field_inhaltsverzeichnis', array('label'=>'hidden'));
  $content = field_view_field('node', $node, 'body', array('label'=>'hidden'));

?>
<!--.page -->
<div role="document" class="page">

    <!--.l-header -->
    <?php include_once('header.tpl.php') ?>
    <!--/.l-header -->

    <section id="wiki-header">
      <div class="row">
        <h2>So funktioniert's</h2><br />

        <object data="<?= path_to_theme(); ?>/images/so_funktionierts.svg" type="image/svg+xml" width="1000"></object>  
    </div>
    </section>

    <!--.l-main -->
    <main role="main" id="main-content" class="row l-main">
        <!-- .l-main region -->
        <div class="<?php print $main_grid; ?> columns">
			<?php if (!empty($page['highlighted'])): ?>
                <div class="highlight panel callout">
					<?php print render($page['highlighted']); ?>
                </div>
			<?php endif; ?>

            <a id="main-content"></a>

            <!--
			<?php if (!empty($tabs)): ?>
				<?php print render($tabs); ?>
				<?php if (!empty($tabs2)): print render($tabs2); endif; ?>
			<?php endif; ?>

			<?php if ($action_links): ?>
                <ul class="action-links">
					<?php print render($action_links); ?>
                </ul>
            <?php endif; ?>
            -->

            <aside class="medium-3 column" id="wiki-inhaltsverzeichnis">
              <h4><?= t('Übersicht'); ?></h4><br />
              <?php print render($inhaltsverzeichnis); ?>
            </aside>

            <div class="medium-8 column" id="wiki-content">
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