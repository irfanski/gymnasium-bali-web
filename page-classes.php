<?php
/**
 * Template Name: Classes
 * Assign this template to a WordPress Page (e.g. slug: classes)
 */
get_header();
?>
<section class="hero hero--sub">
  <div class="hero__bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/DSC08236.jpg.jpeg')"></div>
  <div class="wrap">
    <span class="eyebrow">Live More</span>
    <h1>Classes</h1>
    <p class="lede">Daily boxing classes led by coaches, run in English, open to every level.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap split rv">
    <div>
      <h2>Every class, every day, in English</h2>
      <p>Our classes run daily. Every session is taught in English by our coaching team, and every session is open to all levels — you don't need experience, and you don't need to book ahead.</p>
      <p class="muted">Classes are included in the Gym and Gym + Recovery tiers, or available on their own from Rp 220.000 a day.</p>
    </div>
    <figure class="ph split__media" style="--ar:3/4"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_3769_2.jpg" alt="Member training with dumbbells in a class"><figcaption>Strength class</figcaption></figure>
  </div>
</section>

<section class="sec sec--coal seam-top">
  <div class="wrap">
    <span class="eyebrow rv">The Schedule</span>
    <h2 class="rv">What's on</h2>
    <div class="grid-3" style="margin-top:2rem">
      <div class="feat rv"><h3>Boxing</h3><p>Technique, pads, bag work and conditioning. No sparring required. One of our most popular sessions and a genuinely good workout even if you never intend to fight.</p></div>
    </div>
  </div>
</section>

<section class="sec">
  <div class="wrap rv">
    <span class="eyebrow">Fight Studio</span>
    <h2>Fight Studio schedule</h2>
    <p class="lede">The same lineup runs every day, Monday to Saturday.</p>
    <table class="sched" style="margin-top:1.5rem">
      <tr><td>08:00–09:00</td><td><b>Boxing Basic</b><span>All levels</span></td></tr>
      <tr><td>09:00–10:00</td><td><b>Muay Thai Basic</b><span>All levels</span></td></tr>
      <tr><td>10:00–11:00</td><td><b>Boxing Drill</b><span>Advanced · light sparring</span></td></tr>
      <tr><td>11:00–16:00</td><td><b>Open Gym</b><span>Personal training available</span></td></tr>
      <tr><td>16:00–17:00</td><td><b>Muay Thai Basic</b><span>All levels</span></td></tr>
      <tr><td>17:00–18:00</td><td><b>Boxing Basic</b><span>All levels</span></td></tr>
      <tr><td>18:00–19:00</td><td><b>Muay Thai Drill</b><span>Advanced · light sparring</span></td></tr>
    </table>
  </div>
</section>

<section class="sec--tight cta-band sec">
  <div class="wrap rv">
    <h2>Unlimited classes from Rp 220.000 a day</h2>
    <p class="lede" style="margin-inline:auto">Or Rp 1.690.000 a month.</p>
    <div class="btn-row">
      <a class="btn btn--solid" href="<?php echo home_url('/membership#classes'); ?>"><span>View Classes pricing</span></a>
      <a class="btn btn--ghost" href="https://wa.me/6281238581815?text=Hi%20Gymnasium%2C%20I%27d%20like%20to%20ask%20about%20membership."><span>Ask about a class</span></a>
    </div>
  </div>
</section>
<?php get_footer(); ?>