<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KHH8ZQWN');</script>
<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHH8ZQWN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="topbar">
  <a class="brand" href="<?php echo home_url('/'); ?>" aria-label="Gymnasium Bali home">
    <img class="mark" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-mark.png" alt="">
    <img class="word" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-wordmark-white.png" alt="Gymnasium">
  </a>
  <nav class="nav" aria-label="Main">
    <a href="<?php echo home_url('/membership'); ?>"<?php echo is_page('membership') ? ' aria-current="page"' : ''; ?>>Membership</a>
    <a href="<?php echo home_url('/gym'); ?>"<?php echo is_page('gym') ? ' aria-current="page"' : ''; ?>>The Gym</a>
    <?php /*
    <a href="<?php echo home_url('/recovery'); ?>"<?php echo is_page('recovery') ? ' aria-current="page"' : ''; ?>>Recovery</a>
    */ ?>
    <a href="<?php echo home_url('/classes'); ?>"<?php echo is_page('classes') ? ' aria-current="page"' : ''; ?>>Classes</a>
    <?php /*
    <a href="<?php echo home_url('/personal-training'); ?>"<?php echo is_page('personal-training') ? ' aria-current="page"' : ''; ?>>Personal Training</a>
    */ ?>
    <?php /*
    <a href="<?php echo home_url('/menu'); ?>"<?php echo is_page('menu') ? ' aria-current="page"' : ''; ?>>Bar Menu</a>
    */ ?>
    <a href="<?php echo home_url('/events'); ?>"<?php echo is_page('events') ? ' aria-current="page"' : ''; ?>>Events</a>
    <a href="<?php echo home_url('/about'); ?>"<?php echo is_page('about') ? ' aria-current="page"' : ''; ?>>About</a>
    <a href="<?php echo home_url('/partnership'); ?>"<?php echo is_page('partnership') ? ' aria-current="page"' : ''; ?>>Partners</a>
    <a href="<?php echo home_url('/journal'); ?>"<?php echo (is_page('journal') || is_singular('post')) ? ' aria-current="page"' : ''; ?>>Journal</a>
    <a class="btn btn--solid" href="<?php echo gb2_whatsapp_url(); ?>"><span>Book Day Pass</span></a>
  </nav>
  <button class="burger" aria-label="Open menu" aria-expanded="false" aria-controls="gb-mobile-menu">Menu</button>
</header>
<div class="menu" id="gb-mobile-menu" role="dialog" aria-label="Menu">
  <a href="<?php echo home_url('/membership'); ?>">Membership</a>
  <a href="<?php echo home_url('/gym'); ?>">The Gym</a>
  <?php /*
  <a href="<?php echo home_url('/recovery'); ?>">Recovery</a>
  */ ?>
  <a href="<?php echo home_url('/classes'); ?>">Classes</a>
  <?php /*
  <a href="<?php echo home_url('/personal-training'); ?>">Personal Training</a>
  */ ?>
  <?php /*
  <a href="<?php echo home_url('/menu'); ?>">Bar Menu</a>
  */ ?>
  <a href="<?php echo home_url('/events'); ?>">Events</a>
  <a href="<?php echo home_url('/about'); ?>">About</a>
  <a href="<?php echo home_url('/partnership'); ?>">Partners</a>
  <a href="<?php echo home_url('/journal'); ?>">Journal</a>
  <a class="menu__cta" href="<?php echo gb2_whatsapp_url(); ?>">Book Day Pass</a>
</div>