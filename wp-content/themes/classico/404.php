<?php get_header(); ?>
<style>
	.errorpage .inner{
		padding: 0 calc( 0.9375rem + ( ( 1vw - 3.75px ) * 3.8674 )) 90px;
		min-height:64vh;
	}
	.errorpage .head{
		text-align: center;
		color: #003988;
		margin-bottom: 20px;
		margin-top: 12vh;
	}
	.errorpage .txt{text-align: center; line-height: 2;}
	.errorpage .btn{margin: 30px auto 0;}
</style>
<div id="content">
	<section class="section errorpage">
		<div class="inner">
			<?php include("inc/breadcrumb.php"); ?>
			<h2 class="head head-A">404 Not Found</h2>
			<p class="txt">お探しのページは見つかりません。<br>一時的にアクセスできない状態にあるか、<br>移動もしくは削除された可能性があります。</p>
			<p class="btn btn-B"><a href="<?php echo home_url( '/' ); ?>">トップに戻る</a></p>
		</div>
	</section><!-- /_cv01 -->

	<?php include("contact.php"); ?>
</div>
<?php get_footer(); ?>