<?php get_header(); ?>
<section class="sec" style="text-align:center">
  <div class="wrap">
    <span class="eyebrow">404</span>
    <h1>Page not found</h1>
    <p class="lede" style="margin-inline:auto">The page you're looking for doesn't exist or has moved.</p>
    <div class="btn-row" style="justify-content:center;margin-top:2rem">
      <a class="btn btn--solid" href="<?php echo home_url('/'); ?>"><span>Back to home</span></a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
