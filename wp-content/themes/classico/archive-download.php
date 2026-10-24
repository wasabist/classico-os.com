<?php get_header(); ?>

<!-- CONTENT -->
<div id="content">
    <section id="_head" class="section">
        <div class="inner">
            <div class="inner-02">
                <h2 class="head head-C"><span class="ja">資料一覧</span><span class="en">DOWNLOADS</span></h2>
            </div>
        </div>
    </section>
    <section class="archive-download__sec section">
        <div class="archive-download__inner inner-02">
            <?php 
            $has_posts = false;
            $terms = get_terms('download_category', array('hide_empty' => true));
            foreach($terms as $term):
                $args = array(
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'post_type' => 'download',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'download_category',
                            'field' => 'term_id',
                            'terms' => $term->term_id
                            
                        )
                    )
                );
                $the_query = new WP_Query($args);
                if($the_query->have_posts()): 
                    $has_posts = true;
                    ?>
                    <h3 class="archive-download__head"><?php echo $term->name; ?></h3>
                    <ul class="archive-download__list">
                        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                            <?php include("inc-download.php"); ?>
                        <?php endwhile; ?>
                    </ul>
                    <?php wp_reset_postdata(); 
                endif;
            endforeach; 
            
            if(!$has_posts): ?>
                <p style="text-align: center;">準備中です。</p>
            <?php endif; ?>
        </div>
    </section>
</div>
<!-- E CONTENT -->

<?php get_footer(); ?>

<!-- #################### 固定ページの内容-- #################### -->
