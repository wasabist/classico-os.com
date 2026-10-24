<?php get_header();
/*
記事一覧-汎用
*/
?>

<!-- CONTENT -->
<div id="content">
<section id="_head" class="section">
<div class="inner">
<div class="inner-02">
<h2 class="head head-C"><span class="ja">記事一覧</span><span class="en">POSTS</span></h2>
</div>
</div>
</section>
<section id="_news" class="section">
<div class="inner">
<div class="inner-02">
	<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
	$per = ( is_page( 'top' ) ) ? 3 : 5;
	$args = array(
	  'posts_per_page' => $per,
	  'paged' => $paged,
	  'order' => 'DESC',
	);
	$the_query = new WP_Query($args); if($the_query->have_posts()): ?>
	<ul id="news-list">
	  <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
	  <?php 
			$news_url = get_field('news_url');
			if($news_url):
		?>
	 	<li class="item"><a href="<?php echo $news_url; ?>" class="ib" target="_blank" rel="noopener noreferrer"><span class="date"><?php the_time('Y.m.d'); ?></span><span class="txt"><?php the_title(''); ?></span></a></li>
	  <?php else: ?>
	  <li class="item"><a href="<?php the_permalink(); ?>" class="ib"><span class="date"><?php the_time('Y.m.d'); ?></span><span class="txt"><?php echo mb_substr( strip_tags(get_the_title()), 0, 55) . '...'; ?></span></a></li>
	  <?php endif; ?>
	  <?php endwhile; ?>
	</ul>
	<?php if(function_exists('wp_pagenavi') && !is_page( 'top' )){ wp_pagenavi(array('query'=>$the_query));}?>
	<?php wp_reset_postdata(); endif; ?>
</div>
</div>
</section>
<?php include("contact.php"); ?>
</div>
<!-- E CONTENT -->

<?php get_footer(); ?>

<!-- #################### 固定ページの内容-- #################### -->
