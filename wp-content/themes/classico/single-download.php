<?php get_header(); ?>

  <!-- CONTENT -->
  <div id="content">
    <section class="section" id="single-download">
      <div class="single-download__inner archive-download__inner inner-02">
        <div class="single-download__content">
            <?php if(has_post_thumbnail()): ?>
                <div class="single-download__eyecatch">
                    <?php echo the_post_thumbnail('medium'); ?>
                </div>
            <?php endif; ?>
            <h1 class="single-download__title"><?php the_title(); ?></h1>
            <div class="single-download__text column-content">
                <?php the_content(); ?>
                <?php $download_form_url = get_field('download_form_url'); ?>
                <p class="single-download__btn btn-B"><a href="<?php echo esc_url($download_form_url); ?>" target="_blank">ダウンロードする</a></p>
            </div>
        </div>
      </div>
    </section>
  </div><!-- E CONTENT -->


  <section class="archive-download__sec section">
      <div class="archive-download__inner inner-02">
          <?php
          $current_post_id = get_the_ID();
          $current_terms = get_the_terms($current_post_id, 'download_category');
          
          if($current_terms):
              foreach($current_terms as $term):
                  $args = array(
                      'posts_per_page' => 3,
                      'order' => 'DESC',
                      'post_type' => 'download',
                      // 'post__not_in' => array($current_post_id),
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'download_category',
                              'field' => 'term_id', 
                              'terms' => $term->term_id
                          )
                      )
                  );
                  $the_query = new WP_Query($args);
                  if($the_query->have_posts()): ?>
                      <h3 class="archive-download__head">最新<?php echo $term->name; ?></h3>
                      <ul class="archive-download__list">
                          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                              <?php include("inc-download.php"); ?>
                          <?php endwhile; ?>
                      </ul>
                      <?php wp_reset_postdata();
                  else: ?>
                      <p>関連する資料はありません。</p>
                  <?php endif;
              endforeach;
          endif; ?>
      </div>
  </section>
<?php get_footer(); ?>