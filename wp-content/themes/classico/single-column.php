<?php get_header(); ?>

  <!-- CONTENT -->
  <div id="content">
    <section class="section" id="_article">
      <div class="inner">
        <div class="inner-02">
          <?php include("inc/breadcrumb.php"); ?>
          <div class="inner-03">
            <h2 class="head head-G"><?php the_title(); ?></h2>
            <div class="column-content">
              <?php 
                $content = apply_filters('the_content', get_the_content());
                if (strpos($content, '<p>') === false) {
                  $content = str_replace("\n", "<br />", $content);
                }
                echo $content;
              ?>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                  var ulListItems = document.querySelectorAll('.column-content ul li');
                  ulListItems.forEach(function(item) {
                    if (item.textContent.trim().startsWith('・')) {
                      item.textContent = item.textContent.trim().substring(1).trim();
                    }
                  });
                });
              </script>
            </div>
          <!-- 記事監修者 -->
         <?php
          $supervisor_name = get_field('supervisor_name');
          $supervisor_desc = get_field('supervisor_desc');
          $supervisor_image = get_field('supervisor_image');
          if($supervisor_name):
          ?>
          <div class="writer_box<?php if(empty($supervisor_image)): ?> noimg<?php endif; ?>">
          <?php if($supervisor_image): ?>
          <div class="writer_img"><img src="<?php echo $supervisor_image; ?>" alt="$supervisor_name"></div>
          <?php endif; ?>
          <div class="writer_content">
            <p class="writer_tit">記事監修：<?php echo $supervisor_name; ?></p>
            <p class="writer_txt"><?php echo $supervisor_desc; ?></p>
          </div>
          </div>
          <?php endif; ?><!-- E 記事監修者 -->
          </div>
        </div>
      </div>
    </section><!-- /_article -->

    <?php
    // ACFの投稿オブジェクトフィールドから関連コラムを取得
    $related_posts = get_field('recommend_post01');
    if ($related_posts):
    ?>
    <section id="_columns" class="section">
      <div class="inner">
        <div class="inner-02" style="padding-top:calc( 1.875rem + ( ( 1vw - 3.75px ) * 3.31492 ));">
          <h2 class="head head-B">関連コラム</h2>
          <ul class="ib" id="columns-list">
          <?php 
          $count = 0;
          foreach ($related_posts as $post): 
            if ($count >= 3) break;
            setup_postdata($post); 
            $count++;
          ?>
            <li class="item"><a href="<?php the_permalink(); ?>">
              <?php
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, 'medium', 'true');
              ?>
              <span class="img" style="background-image: url( <?php echo esc_url($image_url[0]) ?> );"></span>
              <span class="ib box">
                <span class="cat"><?php if ( $terms = get_the_terms( $post->ID, 'column_category' ) ) {
                    foreach ( $terms as $term ) { echo esc_html($term->name); }
                }?></span>
                <span class="date"><?php the_time('Y.m.d'); ?></span>
              </span>
              <span class="txt"><?php echo strip_tags(get_the_title()); ?></span>
            </a></li>
          <?php endforeach; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </section><!-- /_columns -->
    <?php endif; ?>

    <div id="scroll-banner" class="scroll-banner">
      <div class="scroll-banner__inner">
        <button type="button" class="scroll-banner__close" id="banner-close">&times;</button>
        <div class="scroll-banner__unit">
          <div class="scroll-banner__thumb">
            <img src="" alt="" id="banner-img">
          </div>
          <div class="scroll-banner__card" id="banner-link">
            <p class="scroll-banner__title" id="banner-title"></p>
            <p class="scroll-banner__text" id="banner-text"></p>
            <a href="#">無料でダウンロードする</a>
          </div>
        </div>
      </div>
    </div>

    <?php include( "contact.php" ); ?>
  </div><!-- E CONTENT -->

<?php get_footer(); ?>