<?php get_header(); ?>

  <!-- CONTENT -->
  <div id="content">
    <section class="section" id="_article">
      <div class="inner">
        <div class="inner-02">
          <?php include("inc/breadcrumb.php"); ?>
          <div class="inner-03">
            <?php
              if ($terms = get_the_terms($post->ID, 'seminar_category')) {
                foreach ( $terms as $term ) {
            ?>
              <p class="cate<?php if ( $term->name === '受付終了' ) : echo ' cate-'; endif; ?>"><?php echo esc_html($term->name); ?></p>
            <?php
              }}
            ?>
            <h2 class="head head-G"><?php the_title(); ?></h2>
			      <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>
    <?php include( "contact.php" ); ?>
  </div><!-- E CONTENT -->

<?php get_footer(); ?>