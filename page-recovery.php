<?php
/**
 * Template Name: Recovery
 * Assign this template to a WordPress Page (e.g. slug: recovery)
 */
get_header();
?>
<section class="hero hero--sub">
  <div class="hero__bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/dsc09518.jpg')"></div>
  <div class="wrap">
    <span class="eyebrow">Be More</span>
    <h1>The Recovery Suite</h1>
    <p class="lede">Pool, sauna, hammam and cold plunge. The half of training most people skip.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap rv" style="max-width:820px">
    <h2>Training is the stimulus. Recovery is the adaptation.</h2>
    <p class="lede">You don't get stronger in the session. You get stronger in the hours after it — if you give your body what it needs to rebuild.</p>
    <p class="muted" style="margin-top:1em">That's the whole reason we built a full recovery suite rather than bolting a sauna onto a gym floor. Heat, steam, cold and water, available every day you train, in one place.</p>
  </div>
</section>

<section class="sec sec--coal seam-top">
  <div class="wrap">
    <span class="eyebrow rv">The Four Elements</span>
    <h2 class="rv">Pool. Heat. Steam. Cold.</h2>
    <div class="grid-3" style="margin-top:2rem;grid-template-columns:repeat(auto-fit,minmax(240px,1fr))">
      <div class="rv">
        <div class="shot" style="--ar:3/4"><span class="tag">Pool, wide shot, daybeds visible</span></div>
        <div class="feat" style="border-top:0"><h3>Pool</h3><p>A proper swim, not a splash pool. Loosen up before you train, float it out after, or skip the weights entirely and just swim. Day beds alongside if you'd rather sit with a coffee and watch.</p></div>
      </div>
      <div class="rv">
        <div class="shot" style="--ar:3/4"><span class="tag">Sauna interior, warm light, empty</span></div>
        <div class="feat" style="border-top:0"><h3>Sauna</h3><p>Dry heat. Sit in it long enough and your body responds — circulation opens up, muscles release, and your nervous system shifts down a gear. Twenty minutes after a hard session is the classic protocol, and it works.</p></div>
      </div>
      <div class="rv">
        <div class="shot" style="--ar:3/4"><span class="tag">Hammam, steam visible, tiled detail</span></div>
        <div class="feat" style="border-top:0"><h3>Hammam</h3><p>Steam heat, and something you'll struggle to find anywhere else in Ubud. Gentler and more humid than a dry sauna, it's better for breathing, skin and long soaks. If dry heat has never suited you, try this instead.</p></div>
      </div>
      <div class="rv">
        <div class="shot" style="--ar:3/4"><span class="tag">Cold plunge, member entering, splash</span></div>
        <div class="feat" style="border-top:0"><h3>Cold Plunge</h3><p>Thirty to sixty seconds is all it takes. Cold exposure after heat is where the real effect lives — the contrast is the point. Members describe it as the part they dread and then can't skip.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="sec">
  <div class="wrap rv">
    <span class="eyebrow">How to use it</span>
    <h2>A simple protocol</h2>
    <p class="lede">There's no wrong way to do this, but if you want a starting point:</p>
    <ol class="protocol" style="margin-top:2rem">
      <li><b>Train.</b> <span>Finish your session properly.</span></li>
      <li><b>Swim or float — 10 to 15 minutes.</b> <span>Loosen up in the pool before you move into heat.</span></li>
      <li><b>Sauna or hammam — 15 to 20 minutes.</b> <span>Let the heat do its work. Come out when you're ready.</span></li>
      <li><b>Cold plunge — 30 to 60 seconds.</b> <span>Get in, breathe slow, stay controlled.</span></li>
      <li><b>Repeat or rest.</b> <span>Two or three rounds if you have time. One is plenty if you don't.</span></li>
      <li><b>Sit down.</b> <span>Ten quiet minutes afterwards is when most of it lands.</span></li>
    </ol>
    <p class="muted" style="margin-top:1.5em">Hydrate throughout. Don't push it on your first visit.</p>
  </div>
</section>

<section class="sec--tight cta-band sec">
  <div class="wrap rv">
    <h2>How to get in</h2>
    <p class="lede" style="margin-inline:auto">Recovery is included with every Gym + Recovery membership — no per-visit fee, no booking required, unlimited use for the length of your membership. Day passes with recovery start at Rp 350.000.</p>
    <div class="btn-row">
      <a class="btn btn--solid" href="<?php echo home_url('/membership#recovery'); ?>"><span>View Gym + Recovery pricing</span></a>
      <a class="btn btn--ghost" href="https://wa.me/6281238581815?text=Hi%20Gymnasium%2C%20I%27d%20like%20to%20ask%20about%20membership."><span>Book on WhatsApp</span></a>
    </div>
  </div>
</section>
<?php get_footer(); ?>