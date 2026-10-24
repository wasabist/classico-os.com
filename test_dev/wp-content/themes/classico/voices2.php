<?php $args = array(
	'posts_per_page' => -1,
  'order' => 'ASC',
  'post_type' => 'voice'
); $the_query = new WP_Query($args); if($the_query->have_posts()): ?>
          <ul id="voice-list">
            <?php $x=1; while ($the_query->have_posts()): $the_query->the_post(); ?>
            <li class="fl item"><a href="<?php the_permalink(); ?>" class="fl">
              <?php
		            $image_id = get_post_thumbnail_id();
		            $image_url = wp_get_attachment_image_src($image_id, 'full', 'true');
		          ?>
              <p class="img"><img src="<?php echo $image_url[0]?>" alt=""></p>
              <div class="item-inner">
                <p class="tit"><?php the_title(''); ?></p>
                <p class="name"><?php the_field( 'voice_company',$post->ID); ?></p>
                <ul class="ib cate-list">
                  <li class="item">
                    <dl class="ib unit">
                      <dt class="label">業種</dt>
                      <dd class="item"><?php the_field( 'voice_industry',$post->ID); ?></dd>
                    </dl>
                  </li>
                  <li class="item">
                    <dl class="ib unit">
                      <dt class="label">事業規模</dt>
                      <dd class="item"><?php the_field( 'voice_scale',$post->ID); ?></dd>
                    </dl>
                  </li>
                  <li class="item">
                    <dl class="ib unit">
                      <dt class="label">課題</dt>
                      <dd class="item"><?php the_field( 'voice_issue',$post->ID); ?></dd>
                    </dl>
                  </li>
                </ul>
              </div>
            </a></li>
            <?php $x++; endwhile; ?>
          </ul>
<?php endif; ?>