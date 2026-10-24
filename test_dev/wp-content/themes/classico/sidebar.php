
<section id="side_content">

<!-- ########## サイトタイトル ########## -->

<div class="side_title"><span>NEW ARTICLE</span>最新コラム</div>

<!-- ########## サイトタイトルここまで ########## -->

<div class="side_content_inner">

<!-- ########## 最新記事一覧 ########## -->

<div class="recommend_list">
  <ul>
  <?php $args = array(
        'posts_per_page' => 10,
        'order' => 'DESC',
        'post_type' => 'column'
    ); $the_query = new WP_Query($args); if($the_query->have_posts()): ?>
    <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>">
        <div class="img"><?php the_post_thumbnail('medium'); ?></div>
        <div class="title_box">
          <h4><?php the_title();?></h4>
          <span class="date"><?php the_time('Y.m.d'); ?></span>
        </div>
      </a>
    </li>
    <?php endwhile; // end of the loop. ?>
    <?php else: ?>
    <?php endif; ?>
  </ul>
</div>

<!-- ########## 最新記事一覧ここまで ########## -->

</div>

</section>