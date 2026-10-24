<?php $uri = get_template_directory_uri(); ?>
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<!-- FOOTER -->
<footer id="footer" class="l-footer">
  <div class="l-footer__inner">
    <div class="l-footer__area-nav">
		<ul class="l-footer__nav nav01">
			<li class="l-footer__nav-item">
				<a class="l-footer__nav-item-link" href="<?php echo home_url( '/' ); ?>service/">サービス</a>
				<ul class="l-footer__nav-child">
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>service/romu/">労務相談</a></li>
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>service/outsourcing/">手続きアウトソーシング</a></li>
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>service/consulting/">コンサルティング</a></li>
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>service/romukansa/">労務監査</a></li>
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>service/iposupport/">社労士によるIPO支援</a></li>
				</ul>
			</li>
			<li class="l-footer__nav-item">
				<a class="l-footer__nav-item-link" href="<?php echo home_url( '/' ); ?>sharoshi/">社労士の委託替え</a>
			</li>
			<li class="l-footer__nav-item">
				<a class="l-footer__nav-item-link" href="<?php echo home_url( '/' ); ?>plan/">報酬</a>
			</li>
		</ul>
		<ul class="l-footer__nav nav02">
			<li class="l-footer__nav-item">
				<span class="l-footer__nav-item-title">最新情報・コンテンツ</span>
				<ul class="l-footer__nav-child">
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>seminar/">セミナー</a></li>
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>columns/">コラム</a></li>
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>news/">新着情報</a></li>
				</ul>
			</li>
			<li class="l-footer__nav-item">
				<span class="l-footer__nav-item-title">当社について</span>
				<ul class="l-footer__nav-child">
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>company/">事務所概要</a></li>
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>voices/">お客様の声</a></li>
					<li class="l-footer__nav-child-item"><a href="<?php echo home_url( '/' ); ?>media/">メディア掲載</a></li>
				</ul>
			</li>			
		</ul>
		<div class="l-footer__nav-btn-area">
			<p class="l-footer__nav-btn btn btn-D footer-top"><a href="<?php echo home_url( '/' ); ?>download/">資料請求</a></p>
			<p class="l-footer__nav-btn btn btn-D"><a href="<?php echo home_url( '/' ); ?>mail-magazine/">メルマガ登録</a></p>
			<p class="l-footer__nav-btn btn btn-B"><a href="<?php echo home_url( '/' ); ?>classico-recruit/fulltime/">採用情報 正社員</a></p>
			<p class="l-footer__nav-btn btn btn-B"><a href="<?php echo home_url( '/' ); ?>classico-recruit/parttime/">採用情報 パート社員</a></p>
		</div>
    </div>
    <div class="l-footer__area-group">
		<ul class="l-footer__group">
			<li class="l-footer__group-item">
				<a class="l-footer__group-item-link" href="<?php echo home_url( '/' ); ?>">HOME</a>
			</li>
			<li class="l-footer__group-item">
				<span class="l-footer__group-item-title">医療機関のお客様はこちら</span>
				<ul class="l-footer__group-child">
					<li class="l-footer__group-child-item">
						<a href="https://classico-medical.com/" target="_blank" rel="noopener noreferrer">クラシコメディカル</a>
					</li>
				</ul>
			</li>
			<li class="l-footer__group-item">
				<span class="l-footer__group-item-title">グループ会社サイト</span>
				<ul class="l-footer__group-child">
					<li class="l-footer__group-child-item">
						<a href="https://classico-inc.com/" target="_blank" rel="noopener noreferrer">株式会社クラシコ</a>
					</li>
				</ul>
			</li>			
		</ul>
		<p class="l-footer__privacy"><a href="<?php echo home_url( '/' ); ?>privacypolicy/">プライバシーポリシー</a></p>
		<div class="l-footer__srp">
			<div class="l-footer__srp-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/common/img_srp.png" width="64" height="64" alt=""></div>
			<p class="l-footer__srp-txt">当社は企業情報を適切に管理し、国が定める厳格な基準をクリアしたSRPⅡ認証を取得しています。<br><a href="https://www.shakaihokenroumushi.jp/organization/tabid/507/Default.aspx" target="_blank" rel="noopener noreferrer">詳しくはこちら</a></p>
		</div>
    </div>
	<p class="l-footer__copyright">©2024 社会保険労務士法人クラシコ All Rights Reserved.</p>
  </div>
</footer>
<!-- E FOOTER -->
<?php if (!is_page(array('contact', 'test_contact', 'mail-magazine'))&& !is_singular('column')): ?>
<div class="fixed__nav">
	<a href="tel:0649632970" class="fixed__nav__tel" id="ga_fixed_tel">
		<span>電話で相談</span>
	</a>
	<a href="<?php echo home_url( '/' ); ?>contact/" class="fixed__nav__contact" id="ga_fixed_contact">
		<span>無料お問い合わせ</span>
	</a>
</div>
<?php endif; ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
<script src="<?php echo $uri; ?>/js/slick.min.js" defer></script>
<script src="<?php echo $uri; ?>/js/common.js" defer></script>
<?php if(is_page(array('contact', 'test_contact', 'mail-magazine'))): ?>
<script src="<?php echo $uri; ?>/js/validation.js" defer>></script>
<?php endif; ?>
<style>
	#contact-error #header + .has-text-align-center,
	#mail-magazine-error #header + .has-text-align-center{
		margin-top: 300px;
	}
	#contact-error .has-text-align-center,
	#mail-magazine-error .has-text-align-center{
		font-size: 14px;
    line-height: 2;
	}
	#contact-error #footer,
	#mail-magazine-error #footer{
		margin-top: 300px;
	}
</style>
<?php wp_footer(); ?>
</body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M6R2DLH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</html>