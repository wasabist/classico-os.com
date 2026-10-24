<?php get_header(); ?>

  <!-- CONTENT -->
  <div id="content">
    <section class="section" id="_article">
      <div class="inner">
        <div class="inner-02">
          <?php include("inc/breadcrumb.php"); ?>
          <div class="inner-03">
            <h2 class="head head-G"><?php the_title(); ?></h2>
			<?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>
    <?php include( "contact.php" ); ?>
  </div><!-- E CONTENT -->

<?php get_footer(); ?>