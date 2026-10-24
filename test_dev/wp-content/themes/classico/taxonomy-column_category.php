<?php get_header(); ?>
<div id="content">
<section id="_head" class="section">
    <div class="inner">
        <div class="inner-02">
        <h2 class="head head-C"><span class="ja"><?php single_term_title(); ?></span></h2>
        </div>
    </div>
</section>
<section id="_columns" class="section">
    <div class="inner">
        <div class="inner-02">
            <?php
            // 現在のページ番号を取得
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $column_category = get_queried_object()->slug;

            $args = array(
                'post_type' => 'column',
                'posts_per_page' => 9, // 1ページあたり9記事
                'paged' => $paged,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'column_category',
                        'field'    => 'slug',
                        'terms'    => $column_category,
                    ),
                ),
            );
            $query = new WP_Query($args);
            ?>
            <?php if ($query->have_posts()) : ?>
                <ul class="ib" id="columns-list">
                    <?php while ($query->have_posts()) : $query->the_post(); 
                        $post = get_post(); // $post変数を定義
                        if ($post) : // $postがnullでないことを確認
                    ?>
                        <li class="item"><a href="<?php the_permalink(); ?>">
                            <?php
                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'medium', 'true');
                            ?>
                            <span class="img" style="background-image: url( <?php echo esc_url($image_url[0]) ?> );"></span>
                            <span class="ib box">
                                <span class="cat">
                                    <?php 
                                    if ( $terms = get_the_terms( $post->ID, 'column_category' ) ) {
                                        foreach ( $terms as $term ) { 
                                            echo esc_html($term->name); 
                                        }
                                    }
                                    ?>
                                </span>
                                <span class="date"><?php the_time('Y.m.d'); ?></span>
                            </span>
                            <span class="txt"><?php echo strip_tags(get_the_title()); ?></span>
                        </a></li>
                    <?php endif; // $postがnullでないことを確認終了 ?>
                    <?php endwhile; ?>
                </ul>
            <?php if (function_exists('wp_pagenavi')) { wp_pagenavi(array('query' => $query)); } ?>
            <?php else : ?>
                <p>検索結果が見つかりませんでした。</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>
</div>
<?php get_footer(); ?>