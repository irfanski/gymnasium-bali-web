<?php
/**
 * Template Name: Team
 * Assign this template to a WordPress Page (e.g. slug: team)
 */
get_header();
?>
<section class="hero hero--sub">
  <div class="hero__bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/img_3770_2.jpg')"></div>
  <div class="wrap">
    <span class="eyebrow">The Team</span>
    <h1>The reason people stay</h1>
    <p class="lede">Read our reviews and you'll notice something: people don't name the equipment. They name the coaches. Our team is the difference between a gym you use and a gym you belong to.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="grid-2" style="grid-template-columns:repeat(auto-fill,minmax(270px,1fr))">
      
      <article class="coach rv">
        <figure class="ph" style="--ar:4/5"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_3770_2.jpg" alt="Widya, Strength & Conditioning coach"></figure>
        <div class="body">
          <h3>Widya</h3>
          <span class="spec">Strength & Conditioning</span>
          <p>[ 2–3 sentences: background, training approach, what they're known for. Keep it human. Mention certifications where they exist. ]</p>
          <dl>
            <dt>Trains</dt><dd>[ Class types they lead ]</dd>
            <dt>Good for</dt><dd>[ Who should book them ]</dd>
          </dl>
        </div>
      </article>
      <article class="coach rv">
        <figure class="ph" style="--ar:4/5"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sequence_01_00_01_22_10_still004.jpg" alt="Edy, Boxing & MMA coach"></figure>
        <div class="body">
          <h3>Edy</h3>
          <span class="spec">Boxing & MMA</span>
          <p>[ 2–3 sentences: background, training approach, what they're known for. Keep it human. Mention certifications where they exist. ]</p>
          <dl>
            <dt>Trains</dt><dd>[ Class types they lead ]</dd>
            <dt>Good for</dt><dd>[ Who should book them ]</dd>
          </dl>
        </div>
      </article>
      <article class="coach rv">
        <div class="shot" style="--ar:4/5"><span class="tag">Desi portrait, floor, direct to camera</span></div>
        <div class="body">
          <h3>Desi</h3>
          <span class="spec">Functional & Classes</span>
          <p>[ 2–3 sentences: background, training approach, what they're known for. Keep it human. Mention certifications where they exist. ]</p>
          <dl>
            <dt>Trains</dt><dd>[ Class types they lead ]</dd>
            <dt>Good for</dt><dd>[ Who should book them ]</dd>
          </dl>
        </div>
      </article>
      <article class="coach rv">
        <div class="shot" style="--ar:4/5"><span class="tag">[Coach Name] portrait, floor, direct to camera</span></div>
        <div class="body">
          <h3>[Coach Name]</h3>
          <span class="spec">[Specialism]</span>
          <p>[ 2–3 sentences: background, training approach, what they're known for. Keep it human. Mention certifications where they exist. ]</p>
          <dl>
            <dt>Trains</dt><dd>[ Class types they lead ]</dd>
            <dt>Good for</dt><dd>[ Who should book them ]</dd>
          </dl>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="sec--tight cta-band sec">
  <div class="wrap rv">
    <h2>Want to train with one of them?</h2>
    <p class="lede" style="margin-inline:auto">Message us and we'll set it up.</p>
    <div class="btn-row"><a class="btn btn--solid" href="https://wa.me/6281238581815?text=Hi%20Gymnasium%2C%20I%27d%20like%20to%20ask%20about%20membership."><span>Enquire on WhatsApp</span></a></div>
  </div>
</section>
<?php get_footer(); ?>
