<div class="<?php

print $classes;
?> clearfix"<?php

print $attributes;
?>>
  <?php

print $picture;

?>

 <article class="depot-blog-teaser medium-2 column">
    <div class="depot-blog-teaser__date">
        <?= strftime('%d', $comment->created); ?><br />
        <?= strftime('%b', $comment->created); ?>
    </div>
</article>

<div class="medium-10 column">

  <?php

if ($new) {
  ?>
    <span class="new"><?php

  print $new;
  ?></span>
  <?php

}
?>

  <?php

print render($title_prefix);
?>
  <h5<?php

?>><?php
print check_plain($comment->subject);

?></h5>
  <?php

print render($title_suffix);
?>

  <div class="submitted" style="color:#909090;">
    <?php

//print $permalink;
?>
    <?php

print $submitted;
?>
  </div>

  <div class="content"<?php

print $content_attributes;
?>>
    <?php


// We hide the comments and links now so that we can render them later.
hide($content['links']);
print render($content);
?>
    <?php

if ($signature) {
  ?>
    <div class="user-signature clearfix">
      <?php

  print $signature;
  ?>
    </div>
    <?php

}
?>
  </div>

  <?php

print render($content['links']);
?>

  </div><!-- /.medium-10.columns -->
</div>