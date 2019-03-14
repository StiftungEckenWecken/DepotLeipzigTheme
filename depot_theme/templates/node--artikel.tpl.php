<?php
  global $base_url;

  $renderable_categories = '';

  foreach ($content['body']['#object']->field_tax_kategorie['und'] as $key => $val) {
    $renderable_categories .= ($key >= 1 ? ', ' : '') . '<a title="'.t('Alle Blog-Beiträge dieser Kategorie (öffnet neues Fenster)').'" target="_blank" href="/blog/'.$val['taxonomy_term']->name.'">'. $val['taxonomy_term']->name .'</a>';
  }

  $postContent = render($content); 
  $word = str_word_count(strip_tags($postContent));
  $m = floor($word / 210);
  $s = floor($word % 210 / (210 / 60));
  $estimated_read_time = $m . ' Minute' . ($m == 1 ? '' : 'n') . ', ' . $s . ' Sekunde' . ($s == 1 ? '' : 'n');
?>

<p class="article-meta">
  <?= $date; ?> - <?= t('Lesezeit:'); ?> <?= $estimated_read_time; ?>
  <br />Kategorie(n): <?= $renderable_categories; ?>

</p>
<div class="article-container">

  <div class="article-image-wrapper">
    <?= $content['field_bild']['#children']; ?>
  </div>
  <div class="row article-content">
    <div class="small-2 large-2 columns" data-sticky-container>
      <div class="sticky article-social" data-sticky data-anchor="sticky1" data-sticky-on="small">
        <div class="rounded-social-buttons">
          <a class="facebook social-button fi fi-social-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= $base_url .'/'. drupal_get_path_alias(); ?>" target="_blank" title="Artikel auf Facebook teilen (externer Link)"></a>
          <a class="twitter social-button fi fi-social-twitter" href="https://twitter.com/intent/tweet?text=<?= $base_url .'/'. drupal_get_path_alias(); ?>" target="_blank" title="Artikel auf Twitter teilen (externer Link)"></a>
          <a class="instagram social-button fi fi-social-instagram" href="https://www.instagram.com/depot.social" target="_blank" title="Besuche depot.social auf Instagram (externer Link)"></a>
          <a class="diaspora social-button fi fi-asterisk" href="https://sharetodiaspora.github.io/?title=depot.social - <?= $title; ?>&url=<?= $base_url .'/'. drupal_get_path_alias(); ?>" target="_blank" title="Artikel auf Diaspora* teilen (externer Link)"></a>
        </div>
      </div>
    </div>
    <div class="small-10 large-8 columns" id="sticky1">
      <div class="article-content">
        <?php print render($content['body']); ?>
      </div>

      <!--
      <div class="article-author">
        <div class="neat-article-author">
          <div class="article-header-avatar">
            <img class="header-avatar" src="https://i.imgur.com/3AeQRbR.jpg">
          </div>
          <div class="article-header-author">
            <p class="author-name">
              <?= t('AutorIn:'); ?> Harry Manchanda
            </p>
            <p class="author-description">
              Front End Developer crawling his way to Full Stack Development. Team Member @ZURB/Yetinauts!
            </p>
          </div>
      </div>
      -->

      <aside id="artikel-comments">
        <?php print render($content['comments']); ?>
      </aside>

      <div>
        <?php print render($page['footer_blog']); ?>
      </div>

    </div>
  </div>
  </div>



