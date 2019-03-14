<?php

function page_error() {
    
    drupal_set_message(t('Leider konnte keine Ressource unter dieser ID gefunden werden.'),'alert');
    drupal_goto('ressourcen');

}

// Temporary fix for a bug in views module
// when calling a not existent ressource
// (e.g. "/ressourcen/xyklsdjf")
if ($title == '[name]') {

    $id = explode('/', current_path());

    if (isset($id[1]) && is_numeric($id[1])) {
    
    $entities = entity_load('bat_type', [$id[1]]);

    if (empty($entities)) {
        page_error();
    }
    
    foreach ($entities as $type) {
      $wrapper = entity_metadata_wrapper('bat_type', $type);
      //drupal_goto('ressourcen/');
      header("HTTP/1.1 301 Moved Permanently");
      header("Location: /ressourcen/" . $wrapper->field_slug->value());
      header("Connection: close");
    }

    } else {
        page_error();
    }
}

?>
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