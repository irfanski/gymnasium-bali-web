<?php
get_header(); ?>
<section class="sec">
  <div class="wrap">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <div><?php the_content(); ?></div>
    <?php endwhile; else : ?>
      <h1>Nothing found</h1>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
