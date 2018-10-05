<!--.page -->
<div role="document" class="page">

    <!--.l-header -->
    <?php include_once('header.tpl.php') ?>
    <!--/.l-header -->

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

</div><!--/.page -->

<!--.l-footer -->
<?php include_once('footer.tpl.php'); ?>
<!--/.l-footer -->