<?php
get_header();
?>

<?php while (have_posts()) : the_post(); ?>

  <section class="hero hero--sub" style="min-height:40vh">
    <?php if (has_post_thumbnail()) : ?>
      <div class="hero__bg" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>')"></div>
    <?php endif; ?>
    <div class="wrap">
      <?php
        $post_cats = get_the_category();
        if (!empty($post_cats)) :
      ?>
        <span class="eyebrow"><?php echo esc_html($post_cats[0]->name); ?></span>
      <?php endif; ?>
      <h1><?php the_title(); ?></h1>
      <p class="lede" style="font-family:var(--ff-mono);font-size:.85rem;letter-spacing:.04em">
        <?php echo esc_html(get_the_date()); ?><?php $author = get_the_author(); if ($author) : ?> · By <?php echo esc_html($author); ?><?php endif; ?>
      </p>
    </div>
  </section>

  <section class="sec">
    <div class="wrap" style="max-width:760px">
      <div class="article-content rv">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <section class="sec--tight cta-band sec">
    <div class="wrap rv">
      <h2>More from the Journal</h2>
      <p class="lede" style="margin-inline:auto">Training, recovery and club news, written by our coaches.</p>
      <div class="btn-row">
        <a class="btn btn--solid" href="<?php echo esc_url(home_url('/journal/')); ?>"><span>Back to Journal</span></a>
      </div>
    </div>
  </section>

<?php endwhile; ?>

<?php get_footer(); ?>