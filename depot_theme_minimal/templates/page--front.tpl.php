<?php $depot_theme_path = drupal_get_path('theme', 'depot_theme'); ?>
<script type="text/javascript">
  var depotResourceMarkers = [<?= depot_get_resources_geodata(); ?>];
</script>
<!--.page -->
<div role="document" class="page">

    <!--.l-header -->
    <?php include_once('header.tpl.php'); ?>
    <!--/.l-header -->
    
    <section id="front-header">
      <div class="row">
            <h1>
               <strong>Viele</strong> Orte, <strong> ein </strong>Depot.
            </h1>
            
            <br />
            <p>
               Das depot gibt es Dank neuer Partner bald in mehreren deutschen Städten und Gemeinden.<br />
               Wieso das so ist erfährst Du <a href="https://depot.social/depot-in-deiner-stadt" title="Zum Artikel `Depot in Deiner Stadt` (neuer Tab)" target="_blank">hier</a>.
            </p>
            
            <br />

            <div id="front-header__buttons">
                <?php foreach ($rp_sites as $rp) : if ($rp['active']) : ?>
                <a href="https://<?= $rp['domain']; ?>" class="button" title="<?= t('depot der Region @region öffnen', array('@region' => $rp['region']['name'])); ?>">
                  <?= $rp['region']['name']; ?>
                </a>
                <?php endif; endforeach; ?>
            </div>

      </div>
    </section>

    <!--.l-main -->
    <main role="main" id="main-content" class="row l-main" style="min-height:auto;">
        <div class="<?php print $main_grid; ?> main columns">
            
            <?php if (!empty($page['highlighted'])): ?>
                <div class="highlight panel callout">
					<?php print render($page['highlighted']); ?>
                </div>
			<?php endif; ?>

            <a id="main-content"></a>
            
            <!--.depot-blog -->
			<section class="depot-blog row">
                <h3>
                    <?= t('Aus unserem Blog'); ?>
                    <a href="/blog" style="text-align:right;font-size:0.85rem;padding-left:7px;border-left:1px solid #bcbcbc;margin-left:3px;">
                        <?= t('Alle Artikel'); ?>
                    </a>
                </h3>

                <?php 
                  $articles = depot_get_blog_articles(3);

                  foreach ($articles as $article) :
                    // @todo More semantic and preview of node-body
                ?>
                
                <article class="depot-blog-teaser medium-4 column">
                   <a href="<?= url('node/' . $article->nid, array('absolute' => TRUE)) ?>">
                        <div class="depot-blog-teaser__date">
                            <?= strftime('%d', $article->created); ?><br />
                            <?= strftime('%b', $article->created); ?>
                        </div>
                        <h5><?= $article->title; ?></h5>
                    </a>
                </article>

                <?php endforeach; ?>
            </section>
            <!--/.depot-blog -->

        </div>
        <!--/.main -->
    </main>
    <!--/.l-main -->

    <?php include_once($depot_theme_path . '/templates/footer.tpl.php'); ?>

</div><!--/.page -->

<style type="text/css">
.l-footer { background: unset; }
</style>
