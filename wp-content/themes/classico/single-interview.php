<?php get_header(); ?>

<!-- #################################### コンテンツ ####################################### -->

<div id="content">
<div id="single_content">
<div id="single_interview">

<!-- #################### パンくずリストここから-- #################### -->

<div id="bread_crumbs">
	<div class="bread_crumbs_inner">
		<ul>
			<li><a href="<?php echo get_option('home'); ?>">ホーム</a></li><li>クラシコインタビュー</li>
		</ul>
	</div>
</div>

<!-- #################### パンくずリストここまで-- #################### -->

<div id="single_content_inner">

<section id="main_content">

<!-- #################### 記事ページの内容-- #################### -->

<!-- ########## 記事タイトル-- ########## -->

<div id="single_main">
	<span class="date"><?php the_time('Y.m.d'); ?></span>
	<h1><?php the_title(''); ?></h1>
	<ul>
		<li><span class="position"><?php the_field( 'interview_part',$post->ID); ?></span><span class="name"><?php the_field( 'interview_name',$post->ID); ?></span></li>
	</ul>
</div>

<!-- ########## 記事タイトルここまで-- ########## -->

<?php get_template_part('content'); ?>

</section>

<!-- #################### 記事ページの内容ここまで-- #################### -->

<!-- ########## サイドバー ########## -->

<?php get_sidebar(); ?>

<!-- ########## サイドバーここまで ########## -->

</div>

</div>
</div>
</div>

<!-- #################################### コンテンツここまで ####################################### -->

<?php get_footer(); ?>