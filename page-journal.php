<?php
/**
 * Template Name: Journal
 * Assign this template to a WordPress Page (e.g. slug: journal)
 */
get_header();

$selected_cat = isset($_GET['cat']) ? sanitize_title(wp_unslash($_GET['cat'])) : '';

$categories = get_categories([
    'hide_empty' => false,
    'exclude'    => [get_option('default_category')],
    'orderby'    => 'name',
    'order'      => 'ASC',
]);

$query_args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 30,
];
if ($selected_cat) {
    $query_args['category_name'] = $selected_cat;
}

$journal_query = new WP_Query($query_args);

$journal_url = get_permalink();
?>
<section class="hero hero--sub" style="min-height:46vh">
  <div class="hero__bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/img_3769_2.jpg')"></div>
  <div class="wrap">
    <span class="eyebrow">Journal</span>
    <h1>The Gymnasium Journal</h1>
    <p class="lede">Training, recovery, nutrition and what's happening at the club. Written by our coaches, for people who want to know why — not just what.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="chips rv">
      <a href="<?php echo esc_url($journal_url); ?>" class="<?php echo $selected_cat === '' ? 'is-active' : ''; ?>">All</a>
      <?php foreach ($categories as $cat) : ?>
        <a href="<?php echo esc_url(add_query_arg('cat', $cat->slug, $journal_url)); ?>" class="<?php echo $selected_cat === $cat->slug ? 'is-active' : ''; ?>">
          <?php echo esc_html($cat->name); ?>
        </a>
      <?php endforeach; ?>
    </div>

    <?php if ($journal_query->have_posts()) : ?>
      <div class="grid-3">
        <?php while ($journal_query->have_posts()) : $journal_query->the_post(); ?>
          <?php
            $post_cats = get_the_category();
            $cat_name  = !empty($post_cats) ? $post_cats[0]->name : '';
          ?>
          <a href="<?php the_permalink(); ?>" class="post rv" style="display:block;color:inherit;text-decoration:none">
            <div class="shot" style="--ar:16/10<?php if (has_post_thumbnail()) : ?>;background-image:url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>');background-size:cover;background-position:center<?php endif; ?>">
              <?php if (!has_post_thumbnail()) : ?><span class="tag">Article cover</span><?php endif; ?>
            </div>
            <div class="body">
              <?php if ($cat_name) : ?><span class="cat"><?php echo esc_html($cat_name); ?></span><?php endif; ?>
              <h3><?php the_title(); ?></h3>
            </div>
          </a>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p class="lede rv" style="margin-top:2rem">No articles in this category yet.</p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>