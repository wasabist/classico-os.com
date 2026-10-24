          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
          $per = ( is_page( 'top')) ? 3 : 15;
          $args = array( //新着コラムを2件表示
					'posts_per_page' => $per,
          'paged' => $paged,
					'order' => 'DESC',
					'post_type' => 'column'
			    );
	    		$the_query = new WP_Query($args);
	    		if($the_query->have_posts()): ?>
          <ul class="ib" id="columns-list">
          <?php while ($the_query->have_posts()): $the_query->the_post(); 
            $post = get_post(); // $post変数を定義
          ?>
            <li class="item"><a href="<?php the_permalink(); ?>">
              <?php
								$image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id, 'medium', 'true');
							?>
              <span class="img" style="background-image: url( <?php echo $image_url[0]?> );"></span>
              <span class="ib box">
                <span class="cat">
                  <?php 
                  if ( $post && $terms = get_the_terms( $post->ID, 'column_category' ) ) {
                    foreach ( $terms as $term ) { 
                      echo esc_html($term->name); 
                    }
                  }
                  ?>
                </span>
                <span class="date"><?php the_time('Y.m.d'); ?></span>
              </span>
              <?php
              ?>
              <span class="txt"><?php echo strip_tags(get_the_title()); ?></span>
            </a></li>
          <?php endwhile; ?>
        </ul>
        <?php if( function_exists('wp_pagenavi') && !is_page( 'top' )){ wp_pagenavi(array('query'=>$the_query));}?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        