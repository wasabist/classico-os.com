<?php get_header(); ?>

    <div class="post_filter">
    	<ul>
        <li class="post_sort" data-filter=".all">全て</li>
        <li class="post_sort" data-filter=".cat1">WEB</li>
        <li class="post_sort" data-filter=".cat2">印刷物</li>
        </ul>
    </div>
	
	<div class="post_list">
		<?php query_posts('posts_per_page=9&paged='.$paged); ?>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
  		<?php $cat = get_the_category(); $cat = $cat[0]; {
echo '<div class="post_item all ' . $cat->category_nicename . '" />';
} ?> 	
        <a href="<?php the_permalink() ?>" rel="bookmark">
		<div class="post_thumb">
		<?php the_post_thumbnail('medium_thumbnail', array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?>
		</div>
		<div class="post_inner">
		<h3><?php the_title();?></h3>
		<p class="post_time"><?php the_time('Y.m'); ?></p>
		</div>
		</a>
		</div>
		<?php endwhile; ?>
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>