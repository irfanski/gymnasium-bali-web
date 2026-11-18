<?php
/**
 * Template Name: Personal Training
 * Assign this template to a WordPress Page (e.g. slug: personal-training)
 */
get_header();
?>
<section class="hero hero--sub">
  <div class="hero__bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/img_3770_2.jpg')"></div>
  <div class="wrap">
    <span class="eyebrow">Coaching</span>
    <h1>Personal Training</h1>
    <p class="lede">Real programmes, written for you, by coaches who've done the work.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap split rv">
    <div>
      <h2>Coaching, not supervision</h2>
      <p>A personal trainer should do more than count your reps. Ours build you an actual programme — progressive, structured, and adjusted as you go — then coach you through it.</p>
      <p class="muted">Every programme starts with an InBody scan and a conversation about what you're actually trying to achieve. From there it's structured training with someone tracking your progress properly.</p>
      <h3 style="margin-top:2em">What's included</h3>
      <ol class="protocol">
        <li><b>Assessment.</b> <span>An initial assessment and InBody body-composition scan.</span></li>
        <li><b>Programme.</b> <span>A written training programme built around your goal.</span></li>
        <li><b>Coached sessions.</b> <span>Technique correction throughout every session.</span></li>
        <li><b>Reviews.</b> <span>Progress reviews and programme adjustments as you improve.</span></li>
        <li><b>Nutrition.</b> <span>Nutrition guidance where you want it.</span></li>
      </ol>
    </div>
    <figure class="ph split__media" style="--ar:3/4"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dsc09749.jpg" alt="Coached cable work on the training floor"><figcaption>Coached session</figcaption></figure>
  </div>
</section>

<section class="sec sec--coal seam-top">
  <div class="wrap">
    <span class="eyebrow rv">Who it's for</span>
    <h2 class="rv">Start where you are</h2>
    <div class="grid-2" style="margin-top:2rem">
      <div class="feat rv"><h3>Building strength or size</h3><p>Progressive overload done properly, with the technique work that keeps you training instead of recovering from injury.</p></div>
      <div class="feat rv"><h3>Losing fat</h3><p>A structured plan combining training and nutrition — measured with InBody, not guesswork.</p></div>
      <div class="feat rv"><h3>Returning to training</h3><p>Coming back after a long break, an injury, or a life change. We'll start where you are, not where you think you should be.</p></div>
      <div class="feat rv"><h3>Combat sports</h3><p>Boxing and MMA coaching for beginners through to competitive fighters.</p></div>
    </div>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <span class="eyebrow rv">The Team</span>
    <h2 class="rv">The reason people stay</h2>
    <p class="lede rv">Read our reviews and you'll notice something: people don't name the equipment. They name the coaches. Our team is the difference between a gym you use and a gym you belong to.</p>

    <div class="grid-2" style="grid-template-columns:repeat(auto-fill,minmax(270px,1fr));margin-top:2rem">

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
    <h2>Train with a coach</h2>
    <p class="lede" style="margin-inline:auto">Personal training is priced separately from membership. Message us and we'll match you with the right coach.</p>
    <div class="btn-row"><a class="btn btn--solid" href="https://wa.me/6281238581815?text=Hi%20Gymnasium%2C%20I%27d%20like%20to%20ask%20about%20membership."><span>Enquire on WhatsApp</span></a></div>
  </div>
</section>
<?php get_footer(); ?>