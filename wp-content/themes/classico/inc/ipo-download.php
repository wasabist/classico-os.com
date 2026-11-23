<?php 
  // 「IPO支援サービスのご紹介」の記事IDを指定
  $target_post_id = 4951; 

  $args = array(
      'post_type'      => 'download',
      'p'              => $target_post_id,
      'posts_per_page' => 1,
  );

  $the_query = new WP_Query($args);

  if ($the_query->have_posts()): ?>
<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
<div class="download_list_item">
  <div class="download_list_item-thumb">
    <?php if(has_post_thumbnail()): ?>
      <?php the_post_thumbnail('medium'); ?>
    <?php else: ?>
      <img src="https://classico-os.com/wp-content/uploads/2023/06/comecome-3.png" alt="" class="wp-post-image">
    <?php endif; ?>
  </div>
  <div class="download_list_item-card">
    <h3 class="download_list_item-title">社会保険労務士法人クラシコの<br>「IPO支援サービス資料」</h3>
    <p class="download_list_item-txt">まずはサービス内容をご覧になりたい方はこちらから</p>
    <div class="service-btn service-btn-white"><a href="<?php the_permalink(); ?>"><i class="icon-download"><img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/img/common/ico_dl_blue.svg" width="19" height="16" alt="ダウンロード"></i>無料で資料を見る</a></div>
  </div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); else: ?>
  <p class="l-g-navi__list-sub__download">準備中です。</p>
<?php endif; ?>