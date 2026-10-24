<li class="archive-download__item">
  <a href="<?php the_permalink(); ?>">
    <div class="archive-download__item-thumb">
      <?php if(has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium'); ?>
      <?php else: ?>
        <img src="https://classico-os.com/wp-content/uploads/2023/06/comecome-3.png" alt="" class="wp-post-image">
      <?php endif; ?>
    </div>
    <h3 class="archive-download__item-title"><?php the_title(); ?></h3>
  </a>
</li>