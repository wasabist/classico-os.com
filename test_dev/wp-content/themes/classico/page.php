<?php get_header(); ?>

<?php
if(have_posts()):
	while(have_posts()): the_post();
		the_content();
	endwhile;
endif;
?>

<?php if(is_page(array('manda'))): ?>
<section id="_voices" class="section c-sec02">
	<div class="inner c-sec02__inner">
		<div class="inner-02 c-sec02__inner02">
		<h2 class="c-sec02__head head head-C"><span class="ja">お客様の声</span><span class="en">VOICES</span></h2>
		<div class="c-sec02__content">
			<?php get_template_part( 'voices2' ); ?>
		</div>
		</div>
	</div>
</section><!-- /_voices -->
<section id="_cv01" class="section c-cv01">
	<div class="c-cv01__inner inner">
		<div class="c-cv01__inner02 inner-02">
		<?php if(is_page('iposupport')): ?>
			<h2 class="c-cv01__head head head-C"><div class="ja">IPO支援の資料請求はこちら</div></h2>
		<?php else: ?>
			<h2 class="c-cv01__head head head-C"><div class="ja">労務監査の資料請求はこちら</div></h2>
		<?php endif; ?>
			<p class="c-cv01__btn btn btn-B"><a href="https://form.k3r.jp/classico/kansa-siyou" target="_blank" rel="noopener noreferrer">資料請求</a></p>
		</div>
	</div>
</section><!-- /_cv01 -->
<?php endif; ?>

<?php get_footer(); ?>