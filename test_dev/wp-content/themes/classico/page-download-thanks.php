<?php get_header();
// POSTデータがあるか確認
if (isset($_GET['post_id']) && !empty($_GET['post_id'])) {
    $post_id = intval($_GET['post_id']); // 安全に数値に変換
    $download_data_url = get_field('download_data_url', $post_id); // カスタムフィールドの値を取得
} else {
    $download_data_url = 'ダウンロードURLが見つかりません。お手数ですが、お問い合わせフォームからご連絡ください。';
}
?>
<!-- CONTENT -->
<div id="content">
    <section id="_head" class="section">
        <div class="inner">
            <div class="inner-02">
                <h2 class="head head-C"><span class="ja">送信完了</span><span class="en">DOWNLOADS</span></h2>
				<div class="thanks-download__text">
					<p>ご登録ありがとうございます。<br>以下URLよりご希望の資料をダウンロードしてください。</p>
					<p><a href="<?php echo esc_url($download_data_url); ?>" target="_blank"><?php echo $download_data_url; ?></a></p>
				</div>
            </div>
        </div>
    </section>
</div>
<!-- E CONTENT -->
<?php get_footer(); ?>