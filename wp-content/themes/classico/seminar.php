          <?php $uri = get_template_directory_uri(); ?>
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
          $per = ( is_page( 'top' ) ) ? 3 : 15;
          $args = array( //新着セミナーを1番目から2件表示
			      'posts_per_page' => $per,
            'paged' => $paged,
			      'order' => 'DESC',
			      'post_type' => 'seminar'
			    ); $the_query = new WP_Query($args);
			    if($the_query->have_posts()): ?>
          <ul class="ib" id="seminar-list">
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <li class="item"><a href="<?php the_permalink(); ?>">
              <?php
				        $image_id = get_post_thumbnail_id();
				        $image_url = wp_get_attachment_image_src($image_id, 'medium', 'true');
				      ?>
              <span class="img" style="background-image: url( <?php echo $image_url[0]?> );"></span>
              <?php
              if ($terms = get_the_terms($post->ID, 'seminar_category')) {
                foreach ( $terms as $term ) {
              ?>
              <span class="cate<?php if ( $term->name === '受付終了' ) : echo ' cate-'; endif; ?>"><?php echo esc_html($term->name); ?></span>
              <?php
              }}
              ?>
              <span class="tit"><?php echo strip_tags(get_the_title()); ?></span>
              <span class="ib info">
                <span class="date"><span class="icon"><img src="<?php echo $uri; ?>/img/common/icon_c01.png" width="20" height="20" alt=""></span><span class="txt"><?php the_field( 'event_date',$post->ID); ?></span></span>
                <span class="price"><span class="icon"><img src="<?php echo $uri; ?>/img/common/icon_c02.png" width="20" height="20" alt=""></span><span class="txt"><?php the_field( 'money',$post->ID); ?></span></span>
              </span>
            </a></li>
            <?php endwhile; ?>
        </ul>
        <?php if(function_exists('wp_pagenavi') && !is_page( 'top' )){ wp_pagenavi(array('query'=>$the_query));}?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>