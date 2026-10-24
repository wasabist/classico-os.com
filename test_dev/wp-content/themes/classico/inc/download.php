	<section class="section" id="_download">
    <div class="inner">
      <div class="inner-02">
        <h2 class="head head-A">お役立ち資料・ホワイトペーパー一覧</h2>
        <ul class="download_list">
          <?php
            $args_service = array(
                'post_type'      => 'download', // カスタム投稿タイプ名
                'posts_per_page' => 3,           // 最大3件
                'orderby'        => 'date',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'download_category', // タクソノミー名
                        'field'    => 'slug',         // または 'name'
                        'terms'    => 'service',      // 「サービス資料」のタームスラッグ（適宜変更してください）
                    ),
                ),
            );
            $query_service = new WP_Query( $args_service );
          ?>

          <?php if ( $query_service->have_posts() ) : ?>
          <?php while ( $query_service->have_posts() ) : $query_service->the_post(); ?>
          <li class="download_list_item">
            <a href="<?php the_permalink(); ?>">
              <div class="download_list_item-thumb">
                <?php if(has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                  <img src="https://classico-os.com/wp-content/uploads/2023/06/comecome-3.png" alt="" class="wp-post-image">
                <?php endif; ?>
              </div>
              <h3 class="download_list_item-title"><?php the_title(); ?></h3>
            </a>
          </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>

          <?php
            $args_wp = array(
                'post_type'      => 'download',
                'posts_per_page' => 1,
                'title'          => 'IPO準備の基本チェックリスト', // 記事タイトルでピンポイント取得
            );
            $query_wp = new WP_Query( $args_wp );
          ?>

          <?php if ( $query_wp->have_posts() ) : ?>
          <?php while ( $query_wp->have_posts() ) : $query_wp->the_post(); ?>
            
          <li class="download_list_item">
            <a href="<?php the_permalink(); ?>">
              <div class="download_list_item-thumb">
                <?php if(has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                  <img src="https://classico-os.com/wp-content/uploads/2023/06/comecome-3.png" alt="" class="wp-post-image">
                <?php endif; ?>
              </div>
              <h3 class="download_list_item-title"><?php the_title(); ?></h3>
            </a>
          </li>
          <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
	</section>