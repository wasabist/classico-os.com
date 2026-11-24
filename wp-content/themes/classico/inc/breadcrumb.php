<?php
/**
 * テンプレートパーツ: パンくずリスト
 */
?>
<nav class="breadcrumb-nav" aria-label="breadcrumb">
  <ol class="breadcrumb-list">
    <!-- 1. ホーム -->
    <li class="breadcrumb-item">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a>
    </li>
    <?php if ( is_archive() ) : ?>
        <!-- 2. アーカイブページの場合 -->
        <li class="breadcrumb-item">
          <?php
          if ( is_post_type_archive( 'voice' ) ) {
              $archive_title = 'お客様の声';
          } else {
              $archive_title = get_the_archive_title();
              if ( is_category() ) {
                  $archive_title = single_cat_title( '', false );
              } elseif ( is_tag() ) {
                  $archive_title = single_tag_title( '', false );
              } elseif ( is_tax() ) {
                  $archive_title = single_term_title( '', false );
              } elseif ( is_post_type_archive() ) {
                  $archive_title = post_type_archive_title( '', false );
              }
          }
          ?>
          <span aria-current="page"><?php echo esc_html( $archive_title ); ?></span>
        </li>

      <?php elseif ( is_single() ) : ?>
        <!-- 3. 個別投稿ページ（投稿／カスタム投稿）の場合 -->
        <?php
        $post_type = get_post_type();
        if ( $post_type === 'voice' ) {
            // /voices/ へのリンクを出力
            echo '<li class="breadcrumb-item"><a href="' . esc_url( home_url( '/voices/' ) ) . '">お客様の声</a></li>';
        } elseif ( $post_type !== 'post' ) {
            $post_type_object = get_post_type_object( $post_type );
            if ( $post_type_object && $post_type_object->has_archive ) {
                echo '<li class="breadcrumb-item"><a href="' . esc_url( get_post_type_archive_link( $post_type ) ) . '">' . esc_html( $post_type_object->label ) . '</a></li>';
            }
        } else {
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo '<li class="breadcrumb-item"><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></li>';
            }
        }
        ?>
        <li class="breadcrumb-item">
          <span aria-current="page"><?php the_title(); ?></span>
        </li>

      <?php elseif ( is_page() ) : ?>
        <!-- 4. 固定ページの場合（親ページ・多段階層対応） -->
        <?php if ( isset( $post->post_parent ) && $post->post_parent ) : ?>
          <?php
            $parent_ids = array_reverse( get_post_ancestors( $post->ID ) );
            foreach ( $parent_ids as $parent_id ) {
              echo '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $parent_id ) ) . '">' . esc_html( get_the_title( $parent_id ) ) . '</a></li>';
            }
          ?>
        <?php endif; ?>
        <li class="breadcrumb-item">
          <span aria-current="page"><?php the_title(); ?></span>
        </li>

      <?php elseif ( is_search() ) : ?>
        <!-- 5. 検索結果ページの場合 -->
        <li class="breadcrumb-item">
          <span aria-current="page">「<?php echo esc_html( get_search_query() ); ?>」の検索結果</span>
        </li>

      <?php elseif ( is_404() ) : ?>
        <!-- 6. 404ページの場合 -->
        <li class="breadcrumb-item">
          <span aria-current="page">ページが見つかりません</span>
        </li>

      <?php endif; ?>
  </ol>
</nav>