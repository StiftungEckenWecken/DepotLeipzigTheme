<?php global $base_url;
      global $user;
      $resource = $view->style_plugin->rendered_fields;
      foreach($resource as $res) : ?>
<div class="res-detail" itemscope itemtype="http://schema.org/Product">
  <div class="row">
    <div class="medium-7 columns" id="res-detail-images">
      <div class="orbit-container">
        <ul data-orbit class="orbit-slides-container">
        <li class="active" itemprop="image" data-orbit-slide="image-i">
          <?= $res['field_bild_i']; ?>
        </li>
        <li itemprop="image" data-orbit-slide="image-ii">
          <?= $res['field_bild_ii']; ?>
        </li>
        <li itemprop="image" data-orbit-slide="image-iii">
          <?= $res['field_bild_iii']; ?>
        </li>
      </ul>


      <!-- Navigation Arrows -->
      <a href="#" class="orbit-prev">Prev <span></span></a>
      <a href="#" class="orbit-next">Next <span></span></a>

      <!-- Slide Numbers -->
      <div class="orbit-slide-number">
        <span>1</span> <?= t('von'); ?> <span>3</span>
      </div>

    </div><!-- /.orbit-container -->

    <ol class="orbit-bullets">
      <li data-orbit-slide-number="1" class="active"></li>
      <li data-orbit-slide-number="2"></li>
      <li data-orbit-slide-number="3"></li>
    </ol>

  </div>
  
  <div class="medium-5 columns">
    <h3 itemprop="name"><?= $res['name']; ?></h3>
    <div class="panel" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
      <h5><?= t('Preis'); ?></h5>
      <p><?= t('Normal'); ?>: <span itemprop="price"><?= $res['field_kosten']; ?></span> / 24h
      <?php if (!empty($res['field_kosten_2'])) : ?>
      | <?= t('Ermäßigt'); ?>: <?= $res['field_kosten_2']; ?>
      <?php endif; ?>
      <?php if (!empty($res['field_kaution'])) : ?>
      | <?= t('Kaution'); ?>: <?= $res['field_kaution']; ?>
      <?php endif; ?></p>
      <?php if (!empty($res['field_gemeinwohl']) && $res['field_gemeinwohl'] == 'Ja') : ?>
       <p><span class="label warning"><?= t('Achtung!'); ?></span> <?= t('Reservierungen nur durch dem Gemeinwohl verpflichtete Organisationen!'); ?></p>
      <?php endif; ?>
      <a href="#" id="availability_calendar_btn" class="button small expand ci"><i class="fi fi-check"></i><?= t('Verfügbarkeit prüfen'); ?></a>
    </div><!-- /.panel -->

    <?php if ($user->uid == $res['uid']) : ?>
    <ul class="button-group even-2 stack-for-small">
      <li><a href="<?= current_path(); ?>/edit" id="contact_agent_form_btn" class="button small"><i class="fi fi-pencil"></i><?= t('Ressource bearbeiten'); ?></a></li>
      <li><a href="#" class="button small"><i class="fi fi-calendar"></i><?= t('Verfügbarkeiten ändern'); ?></a></li>
    </ul> 

    <?php else : ?>
    <a href="/user/<?= $res['uid']; ?>/contact" id="contact_agent_btn" class="button small expand"><i class="fi fi-torso"></i><?= t('Anbieter kontaktieren'); ?></a>
    <?php endif; ?>
    <a href="#" id="share_btn" class="button secondary small expand" data-dropdown="res-detail-share-dd" aria-controls="autoCloseExample" aria-expanded="false"><i class="fi fi-share"></i><?= t('Teilen'); ?></a>    
    <ul id="res-detail-share-dd" class="f-dropdown" data-dropdown-content tabindex="-1" aria-hidden="true" aria-autoclose="false" tabindex="-1">
      <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php global $base_url; echo $base_url.'/'.current_path(); ?>" title="<?= t('Auf !network teilen',array('!network'=>'Twitter')); ?>">Twitter</a></li>
      <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $base_url.'/'.current_path(); ?>" title="<?= t('Auf !network teilen',array('!network'=>'Facebook')); ?>">Facebook</a></li>
      <li><a href="#">E-Mail</a></li>
    </ul>
  </div>
</div>
  <div class="row">
    <div class="medium-7 column">
      <section id="res-detail-meta-info">
        <ul>
          <li><i class="fi fi-flag"></i><?= t('Kategorie'); ?>: <span itemprop="category"><?= $res['field_kategorie']; ?></span></li>
          <li><i class="fi fi-marker"></i><?= $res['field_adresse_postleitzahl']; ?></li>
          <li title="<?= t('Bis zu @einheiten verfügbar',array('@einheiten'=>$res['field_anzahl_einheiten'])); ?>"><?= t('Einheiten'); ?>: <span itemprop="numberOfItems"><?= $res['field_anzahl_einheiten']; ?></span></li>
        </ul>
      </section>
  
    <section id="res-detail-desc" itemprop="description">
      <p><?= strip_tags($res['field_beschreibung']); ?></p>
    </section>
    <hr />

    <ul class="accordion" data-accordion>
      <li class="accordion-navigation">
       <a href="#res-detail-anbieter" class="accordion-title"><?= t('Anbieter'); ?></a>
       <div class="content active" id="res-detail-anbieter">
         <p><?= $res['name_1']; ?></p>
       </div>
      </li>
      <li class="accordion-navigation">
       <a href="#res-detail-abholung" class="accordion-title"><?= t('Adresse für Abholung'); ?></a>
       <div class="content"  id="res-detail-abholung">
         <p><?= $res['field_adresse_strasse']; ?></p>
         <p><?= $res['field_adresse_postleitzahl']; ?> <?= $res['field_adresse_ort']; ?></p>
       </div>
      </li>
      <?php if (!empty($res['field__ffnungszeiten'])) : ?>
      <li class="accordion-navigation">
       <a href="#res-detail-oeffnungszeiten" class="accordion-title"><?= t('Öffnungszeiten'); ?></a>
       <div class="content" id="res-detail-oeffnungszeiten">
         <p><?= strip_tags($res['field__ffnungszeiten']); ?></p>
       </div>
      </li>
      <?php endif; ?>
      <?php if (!empty($res['field_links_i']) || !empty($res['field_links_ii']) || !empty($res['field_links_iii'])) : ?>
      <li class="accordion-navigation">
       <a href="#res-detail-links" class="accordion-title"><?= t('Links'); ?></a>
       <div class="content" id="res-detail-links">
         <?php if (!empty($res['field_links_i'])) : ?><p><i class="fi fi-paperclip"></i><?= $res['field_links_i']; ?></p><?php endif; ?>
         <?php if (!empty($res['field_links_ii'])) : ?><p><i class="fi fi-paperclip"></i><?= $res['field_links_ii']; ?></p><?php endif; ?>
         <?php if (!empty($res['field_links_iii'])) : ?><p><i class="fi fi-paperclip"></i><?= $res['field_links_iii']; ?></p><?php endif; ?>
       </div>
      </li>
      <?php endif; ?>
    </ul>
  </div>
  </div>
</div>
<?php endforeach; ?>