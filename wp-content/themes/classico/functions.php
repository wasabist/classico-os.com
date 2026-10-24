<?php 

//アイキャッチ設定
add_theme_support('post-thumbnails');
add_image_size( 'top_blog', 150, 100, true );
add_image_size( 'single_blog', 300, 150, true );

//投稿ラベル変更
function revcon_change_post_label() {
global $menu;
global $submenu;
$menu[5][0] = 'ブログ'; $submenu['edit.php'][5][0] = 'ブログの一覧'; $submenu['edit.php'][10][0] = 'ブログの新規追加'; $submenu['edit.php'][16][0] = 'タグ';
echo ''; }
function revcon_change_post_object() {
global $wp_post_types;
$labels = &$wp_post_types['post']->labels;
$labels->name = 'ブログ';
$labels->singular_name = 'ブログ';
$labels->add_new = '新規追加';
$labels->add_new_item = 'ブログを追加';
$labels->edit_item = 'ブログの編集';
$labels->new_item = 'ブログ';
$labels->view_item = 'ブログの表示';
$labels->search_items = 'ブログを検索';
$labels->not_found = 'ブログが見つかりませんでした。'; $labels->not_found_in_trash = 'ゴミ箱内にブログが見つかりませんでした。'; $labels->all_items = '全てのブログ';
$labels->menu_name = 'ブログ';
$labels->name_admin_bar = 'ブログ'; }
add_action( 'admin_menu', 'revcon_change_post_label' ); add_action( 'init', 'revcon_change_post_object' );


function wpcf7_main_validation_filter( $result, $tag ) {
  $type = $tag['type'];
  $name = $tag['name'];
  $_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );
  if ( 'email' == $type || 'email*' == $type ) {
    if (preg_match('/(.*)_confirm$/', $name, $matches)){
      $target_name = $matches[1];
      if ($_POST[$name] != $_POST[$target_name]) {
        if (method_exists($result, 'invalidate')) {
          $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
      } else {
          $result['valid'] = false;
          $result['reason'][$name] = '確認用のメールアドレスが一致していません';
        }
      }
    }
  }
  return $result;
}

add_filter( 'wpcf7_validate_email', 'wpcf7_main_validation_filter', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_main_validation_filter', 11, 2 );
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );


/* recaptcha */
$recaptcha_site_key = "6Lc92DAbAAAAADNpthhWpqNzC4AtCOCSDKqPs_vp";
$recaptcha_secret_key = "6Lc92DAbAAAAAM6Nzk_kqLkin5N2GpjW7E8JBuA6";
function recaptcha(){
    global $recaptcha_site_key;
    echo "<input type='hidden' name='recaptchaResponse' id='recaptchaResponse'><script src='https://www.google.com/recaptcha/api.js?render={$recaptcha_site_key}'></script><script>grecaptcha.ready(function(){grecaptcha.execute('{$recaptcha_site_key}', {action: 'sent'}).then(function(token){document.getElementById('recaptchaResponse').value = token;});});</script>";
}

function recaptcha_verify(){
    global $recaptcha_secret_key;
    $post_key = "recaptchaResponse";
    if(isset($_POST[$post_key]) && !empty($_POST[$post_key])){
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret_key."&response=".$_POST[$post_key]);
        if(json_decode($response)->success){
            return true;
        }
    }
    return false;
}

// 記事のpタグbrタグ削除
remove_filter('the_content', 'wpautop');

// 抜粋のpタグbrタグ削除
remove_filter('the_excerpt', 'wpautop');

// エディタの画像読み込み
function replaceImagePath($arg) {
    $content = str_replace('"img/', '"' . get_bloginfo('template_directory') . '/img/', $arg);
    return $content;
}
add_action('the_content', 'replaceImagePath');

//ショートコードを使ったphpファイルの呼び出し方法
function my_php_Include($params = array()) {
	extract(shortcode_atts(array('file' => 'default'), $params));
	ob_start();
	include(STYLESHEETPATH . "/$file.php");
	return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');

/* 非公開や下書きの固定ページを親ページに設定できるようにする
/* http://kachibito.net/wp-code/add-private-draft
------------------------------------------------------------ */
add_filter('page_attributes_dropdown_pages_args', 'add_private_draft');
function add_private_draft($args) {
  $args['post_status'] = 'publish,private,draft';
  return $args;
}

/* recaptcha
----------------------------------------------------*/
// add_action('wp_enqueue_scripts', function() {
//   $page_list = [
//     'form-new-employee','suksuk-kansa','creearup-form','careerup-confirm','lowson-dl','seminar_form','video-seminar2020-4','20190528-enquete','contact',
//   ];
//   if(is_page($page_list)) return;
//   wp_deregister_script('google-recaptcha');
// }, 100);

/* wpcf7
----------------------------------------------------*/
// remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_scripts' );
// remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_styles' );
// $wpc_list = [
//   'form-new-employee','suksuk-kansa','creearup-form','careerup-confirm','lowson-dl','seminar_form','video-seminar2020-4','20190528-enquete','contact',
// ];
// if(is_page($wpc_list)){
//     add_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_scripts' );
//     add_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_styles' );
// }

function my_wpcf7_enqueue_scripts() {
  global $post;

  if ( is_page(array('form-new-employee','suksuk-kansa','creearup-form','creearup-form_test','careerup-confirm','lowson-dl','seminar_form','video-seminar2020-4','20190528-enquete','contact') ) ) {
    return;
  }

  wp_dequeue_style( 'contact-form-7' );
  wp_dequeue_style( 'contact-form-7-confirm' );
  wp_dequeue_style( 'jquery-ui-smoothness' );
  wp_deregister_script( 'contact-form-7' );
  wp_deregister_script( 'google-recaptcha' );

}
add_action( 'wp_enqueue_scripts', 'my_wpcf7_enqueue_scripts', 100 );

/* delete_jquery
----------------------------------------------------*/
function delete_jquery() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
  }
}
add_action('init', 'delete_jquery');

add_action( 'wp_enqueue_scripts', 'remove_global_styles' );
function remove_global_styles(){
    wp_dequeue_style( 'global-styles' );
}

/* recaptchaの閾値変更(デフォルトは0.5)
------------------------ */
add_filter( 'wpcf7_recaptcha_threshold',
  function( $threshold ) {
    $threshold = 0.3; 
    return $threshold;
  },
  10, 1
);

// 検索クエリをカスタマイズするフィルターを追加
function custom_search_query($query) {
    // 管理画面ではな��、検索クエリの場合にのみ実行
    if ($query->is_search && !is_admin()) {
        // post_typeが'column'の場合にタクソノミークエリを追加
        if ($query->get('post_type') == 'column') {
            $column_category = get_query_var('column_category');
            if (!empty($column_category)) {
                $tax_query = array(
                    array(
                        'taxonomy' => 'column_category',
                        'field'    => 'slug',
                        'terms'    => $column_category,
                    ),
                );
                $query->set('tax_query', $tax_query);
            } else {
                // column_categoryが選択されていない場合、全てのcolumn_categoryを表示
                $query->set('tax_query', array());
            }
        }
    }
    return $query;
}
add_filter('pre_get_posts', 'custom_search_query');

// download_category アーカイブページを download アーカイブページにリダイレクト
function redirect_download_category() {
  if (is_tax('download_category')) {
    wp_redirect(home_url('/download/'), 301);
    exit;
  }
}
add_action('template_redirect', 'redirect_download_category');

// ホームURLを出力するショートコード
function home_url_shortcode() {
    return home_url('/');
}
add_shortcode('home', 'home_url_shortcode');

// テンプレートディレクトリのURLを出力するショートコード
function template_url_shortcode() {
    return get_template_directory_uri();
}
add_shortcode('template_url', 'template_url_shortcode');

// コラムのsingleページへ属するカテゴリー（タクソノミー）のスラッグを body クラスに追加する
function get_custom_single_term_class() {
    if ( ! is_singular( 'column' ) ) {
        return '';
    }

    global $post;
    $taxonomy_slug = 'column_category';
    $terms = get_the_terms( $post->ID, $taxonomy_slug );

    if ( $terms && ! is_wp_error( $terms ) ) {
        $term = reset( $terms );
        return 'term-' . $term->slug;
    }

    return '';
}


// スクロールバナー用のJS設定とデータ出力
function add_scroll_banner_script() {
    if ( is_singular( 'column' ) ) {

        $ipo_download_id  = 4951; // 例: IPO向け資料（download）の投稿ID
        $romu_download_id = 4947; // 例: 労務向け資料（download）の投稿ID

        $ipo_img_url  = get_the_post_thumbnail_url( $ipo_download_id, 'full' );
        $ipo_link_url = get_permalink( $ipo_download_id );
        $ipo_title    = get_the_title( $ipo_download_id );
        $ipo_text    = '審査で問われる重要ポイントと事前対策を社労士が解説';

        $roumu_img_url  = get_the_post_thumbnail_url( $romu_download_id, 'full' );
        $roumu_link_url = get_permalink( $romu_download_id );
        $roumu_title    = get_the_title( $romu_download_id );
        $roumu_text    = '社会保険労務士法人クラシコが提供する特徴やサービス内容・料金を紹介';

        ?>
        <script>
        var scrollBannerConfig = {
          'term-ipo': {
            bannerId: 'ga_banner_ipo',
            imgSrc: '<?php echo esc_url( $ipo_img_url ); ?>',
            linkUrl: '<?php echo esc_url( $ipo_link_url ); ?>',
            title: '<?php echo esc_js( $ipo_title ); ?>',
            text: '<?php echo esc_js( $ipo_text ); ?>'
          },
          'term-roumu': {
            bannerId: 'ga_banner_roumu',
            imgSrc: '<?php echo esc_url( $roumu_img_url ); ?>',
            linkUrl: '<?php echo esc_url( $roumu_link_url ); ?>',
            title: '<?php echo esc_js( $roumu_title ); ?>',
            text: '<?php echo esc_js( $roumu_text ); ?>'
          }
        };
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'add_scroll_banner_script' );

// 特定のCSS（front.css, screen.min.css）のみ非同期（遅延）読み込みに変換する
function my_defer_specific_css( $html, $handle, $href, $media ) {
    // 遅延読み込みさせたいCSSのハンドル名（またはURLの一部分）を判定
    if ( strpos( $href, 'front.css' ) !== false || strpos( $href, 'screen.min.css' ) !== false ) {
        // rel="preload" に変更し、読み込み完了後に stylesheet へ切り替えるタグを生成
        $deferred_html = "<link rel='preload' id='{$handle}-css' href='{$href}' as='style' onload=\"this.onload=null;this.rel='stylesheet'\">\n";
        // JavaScriptが無効な環境向けのフォールバック
        $deferred_html .= "<noscript><link rel='stylesheet' id='{$handle}-css' href='{$href}' media='{$media}'></noscript>\n";
        
        return $deferred_html;
    }
    
    return $html;
}
add_filter( 'style_loader_tag', 'my_defer_specific_css', 10, 4 );


?>