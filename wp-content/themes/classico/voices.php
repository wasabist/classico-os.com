<?php $args = array(
	'posts_per_page' => 3,
  'order' => 'ASC',
  'post_status' => 'publish',
  'post_type' => 'voice'
); $the_query = new WP_Query($args); if($the_query->have_posts()): ?>
<div class="slide" id="cases-list">
  <?php $x=1; while ($the_query->have_posts()): $the_query->the_post(); ?>
 	<div class="item"><a href="<?php the_permalink(); ?>">
    <?php
		  $image_id = get_post_thumbnail_id();
		  $image_url = wp_get_attachment_image_src($image_id, 'full', 'true');
		?>
    <p class="img" style="background-image: url( <?php echo $image_url[0]?> )"></p>
    <div class="item-inner">
      <p class="tit"><span class="label"><?php the_field( 'voice_company',$post->ID); ?></span><span class="txt"><?php the_title(''); ?></span></p>
      <ul class="list">
 	      <li class="item"><span class="label">業種：</span><span class="txt"><?php the_field( 'voice_industry',$post->ID); ?></span></li>
 	      <li class="item"><span class="label">事業規模：</span><span class="txt"><?php the_field( 'voice_scale',$post->ID); ?></span></li>
 	      <li class="item"><span class="label">課題：</span><span class="txt"><?php the_field( 'voice_issue',$post->ID); ?></span></li>
      </ul>
    </div>
  </a></div>
  <?php $x++; endwhile; ?>
</div>
<?php endif; ?>