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

// [include_breadcrumb] でパーツファイルをインクルードするショートコード
function my_custom_breadcrumb_shortcode() {
    ob_start();
    // inc/breadcrumb.php を呼び出し
    get_template_part( 'inc/breadcrumb' );
    return ob_get_clean();
}
add_shortcode( 'include_breadcrumb', 'my_custom_breadcrumb_shortcode' );

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

/**
 * パンくずリストの構造化データ（JSON-LD）を自動出力
 */
function output_breadcrumb_json_ld() {
    global $post;

    $home_url = esc_url( home_url( '/' ) );
    $items = array();

    // 1. ホーム
    $items[] = array(
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'ホーム',
        'item' => $home_url
    );

    $position = 2;

    // 2. アーカイブページの場合
    if ( is_archive() ) {
        $archive_title = get_the_archive_title();
        $archive_url   = esc_url( get_pagenum_link( 1 ) );

        // カスタム投稿「voice」の個別アーカイブURL（/voices/）対応
        if ( is_post_type_archive( 'voice' ) ) {
            $archive_title = 'お客様の声'; // 必要に応じて変更可
            $archive_url   = esc_url( home_url( '/voices/' ) );
        } elseif ( is_category() ) {
            $archive_title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $archive_title = single_tag_title( '', false );
        } elseif ( is_tax() ) {
            $archive_title = single_term_title( '', false );
        } elseif ( is_post_type_archive() ) {
            $archive_title = post_type_archive_title( '', false );
        }

        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $archive_title,
            'item' => $archive_url
        );

    // 3. 個別投稿ページ（投稿／カスタム投稿）の場合
    } elseif ( is_single() ) {
        $post_type = get_post_type();
        if ( $post_type === 'voice' ) {
            // カスタム投稿「voice」の詳細ページの場合、一覧を強制的に /voices/ にする
            $items[] = array(
                '@type' => 'ListItem',
                'position' => $position++,
                'name' => 'お客様の声',
                'item' => esc_url( home_url( '/voices/' ) )
            );
        } elseif ( $post_type !== 'post' ) {
            $post_type_object = get_post_type_object( $post_type );
            if ( $post_type_object && $post_type_object->has_archive ) {
                $items[] = array(
                    '@type' => 'ListItem',
                    'position' => $position++,
                    'name' => $post_type_object->label,
                    'item' => esc_url( get_post_type_archive_link( $post_type ) )
                );
            }
        } else {
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                $items[] = array(
                    '@type' => 'ListItem',
                    'position' => $position++,
                    'name' => $categories[0]->name,
                    'item' => esc_url( get_category_link( $categories[0]->term_id ) )
                );
            }
        }
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position,
            'name' => get_the_title(),
            'item' => esc_url( get_permalink() )
        );

    // 4. 固定ページの場合
    } elseif ( is_page() ) {
        if ( isset( $post->post_parent ) && $post->post_parent ) {
            $parent_ids = array_reverse( get_post_ancestors( $post->ID ) );
            foreach ( $parent_ids as $parent_id ) {
                $items[] = array(
                    '@type' => 'ListItem',
                    'position' => $position++,
                    'name' => get_the_title( $parent_id ),
                    'item' => esc_url( get_permalink( $parent_id ) )
                );
            }
        }
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position,
            'name' => get_the_title(),
            'item' => esc_url( get_permalink() )
        );

    // 5. 検索結果ページの場合
    } elseif ( is_search() ) {
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position,
            'name' => '「' . get_search_query() . '」の検索結果',
            'item' => esc_url( get_search_link( get_search_query() ) )
        );
    }

    // トップページ以外の場合のみ構造化データを出力
    if ( ! is_front_page() && ! is_home() ) {
        $breadcrumb_list = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items
        );

        echo '<script type="application/ld+json">' . wp_json_encode( 
            $breadcrumb_list, 
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE 
        ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'output_breadcrumb_json_ld', 1 );

// トップページのよくある質問と構造化データを出力
function get_custom_faq_items() {
    return array(
        array(
            'q' => '社会保険労務士法人クラシコの強みや、他社労士事務所との違いは何ですか？',
            'a' => 'クラシコの最大の強みは、「<b>上場準備時（IPO）の労務体制整備</b>」や「<b>高度な労務監査</b>」における専門性と豊富な実績です。社会保険労務士を中心とした専門チームが、上場審査の先を見据えた持続可能な労務管理体制を、オーダーメイドでご提供します。'
        ),
        array(
            'q' => '全国対応は可能ですか？また、オンラインでの相談や打ち合わせにも対応していますか？',
            'a' => '<b>はい、オンラインによる全国対応をしております。</b><br>貴社のご都合に合わせて、Zoom等を活用したWeb会議システムでのご相談・お打ち合わせに柔軟に対応可能です。チャットツール（Chatwork等）を用いた日常的な労務コミュニケーションも完備しております。'
        ),
        array(
            'q' => 'どのような規模・業界の企業が利用していますか？',
            'a' => '上場準備企業（N-3期以前）や数十名〜数千名規模の中堅・大手企業まで幅広くご利用いただいております。IT・Web、製造、サービス、医療・福祉など、多様な業界に対応した実績がございます。'
        ),
        array(
            'q' => '単発のスポット依頼（労務監査・就業規則の改定・システム導入など）も相談できますか？',
            'a' => '<b>はい、内容に応じてスポット（単体）でのご依頼も承っております。</b><br>「まずは労務監査だけ依頼したい」「就業規則のみ改定したい」「IPO支援や専門的な労務コンサルティングを依頼したい」「勤怠・労務システムの導入設計から始めたい」など、貴社の課題や成長フェーズに応じた柔軟なサポートが可能です。<br><br>※労働保険・社会保険の各種手続き、給与計算、助成金申請などは、顧問契約の中で継続的に対応しています'
        ),
        array(
            'q' => '給与計算や社会保険手続きのアウトソーシング（代行）はクラウドシステムに対応していますか？',
            'a' => 'マネーフォワードクラウド給与、オフィスステーション労務、SmartHR、KING OF TIME、Touch on Timeなど、主要な人事労務・給与計算・勤怠管理システムに対応しています。現在の運用状況を確認しながら、必要に応じてシステム変更も含めて最適な運用方法をご提案します。委託替えの場合は、現在の社労士事務所と連携した引き継ぎにも対応しています。'
        ),
        array(
            'q' => '相談や見積もりは無料ですか？契約までの流れを教えてください。',
            'a' => '初回のご相談およびお見積もり作成は完全無料です。<br>Web問い合わせフォームまたはお電話にてご連絡いただいた後、弊社の担当者が貴社の現状や課題をヒアリングし、最適な支援プラン・お見積もりをご提示いたします。強引な営業は一切ございませんのでご安心ください。'
        ),
 );
}

// 1. <head> 内へ FAQPage 構造化データを挿入する処理
function add_faq_json_ld_to_head() {
    // 該当ページでショートコード [show_faq] が使われているか判定
    global $post;
    if ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'show_faq' ) ) {
        
        $faq_items = get_custom_faq_items();
        
        $json_ld = array(
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => array()
        );

        foreach ( $faq_items as $item ) {
            $json_ld['mainEntity'][] = array(
                '@type'          => 'Question',
                'name'           => wp_strip_all_tags( $item['q'] ),
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text'  => wp_strip_all_tags( $item['a'] )
                )
            );
        }

        echo '<script type="application/ld+json">' . wp_json_encode( 
            $json_ld, 
            JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE 
        ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'add_faq_json_ld_to_head' );

// 2. 本文中に HTML のみを出力するショートコード関数
function render_custom_faq_shortcode() {
    $faq_items = get_custom_faq_items();

    ob_start();
    ?>
    <section id="_faq" class="section faq sharoshi-faq">
        <div class="sharoshi-faq__inner inner">
            <div class="inner-02">
                <h2 class="sharoshi-faq__head head head-E"><span class="ja">よくあるご質問</span><span class="en">FAQ</span></h2>
                <?php foreach ( $faq_items as $item ) : ?>
                    <dl class="c-faq01">
                        <dt class="c-faq01__head"><span class="c-faq01__ico">Q.</span><?php echo $item['q']; ?></dt>
                        <dd class="c-faq01__txt"><span class="c-faq01__ico">A.</span><?php echo $item['a']; ?></dd>
                    </dl>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'show_faq', 'render_custom_faq_shortcode' );

?>