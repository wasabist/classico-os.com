<?php get_header(); ?>

<div id="content">
<section id="_head" class="section">
    <div class="inner">
        <div class="inner-02">
        <h2 class="head head-C"><span class="ja">検索結果</span></h2>
        </div>
    </div>
</section>
<section id="_columns" class="section">
    <div class="inner">
        <div class="inner-02">
            <?php
            // 検索クエリを取得
            $s = get_search_query();
            $post_type = get_query_var('post_type');
            $column_category = get_query_var('column_category');
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // 現在のページ番号を取得

            if (!empty($s) || !empty($column_category)) {
                echo '<p class="search-result-header">';
                if (!empty($s)) {
                    echo 'キーワード: ' . esc_html($s) . '<br>';
                }
                if (!empty($column_category)) {
                    $column_category_name = get_term_by('slug', $column_category, 'column_category')->name;
                    echo 'カテゴリー: ' . esc_html($column_category_name) . '<br>';
                }
                echo '</p>';
            }

            // post_typeが'column'の場合にカスタムクエリを実行
            if ($post_type == 'column') {
                $args = array(
                    'post_type' => 'column',
                    's' => $s,
                    'posts_per_page' => 9, // 1ページあたり9記事
                    'paged' => $paged, // ページ番号を追加
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'column_category',
                            'field'    => 'slug',
                            'terms'    => $column_category,
                        ),
                    ),
                );
                $query = new WP_Query($args);
            } else {
                $query = $wp_query;
            }
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
                <div class="search-result-none">
                    <p>検索結果が見つかりませんでした。</p>
                    <p class="btn btn-B"><a href="/columns/">コラム一覧へ戻る</a></p>
                </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>
</div>
<?php get_footer(); ?>