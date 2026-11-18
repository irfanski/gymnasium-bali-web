<?php
/**
 * Template Name: Location
 * Assign this template to a WordPress Page (e.g. slug: location)
 */
get_header();
?>
<section class="hero hero--sub">
  <div class="hero__bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/dsc00591.jpg')"></div>
  <div class="wrap">
    <span class="eyebrow">Location &amp; Contact</span>
    <h1>Find Us</h1>
  </div>
</section>

<section class="sec">
  <div class="wrap split">
    <address class="addr rv">
      <b>Address</b>
      GYMNASIUM BALI<br>Onyx Park<br>Jl. Sri Wedari No. 24<br>Tegallantang, Ubud<br>Gianyar Regency, Bali 80571<br>Indonesia
      <b>Phone / WhatsApp</b>
      <a class="link" href="tel:+6281238581815">+62 812-3858-1815</a>
      <b>Email</b>
      <a class="link" href="mailto:gymnasiumbali@gmail.com">gymnasiumbali@gmail.com</a>
      <b>Instagram</b>
      <a class="link" href="https://instagram.com/gymnasium_bali">@gymnasium_bali</a>
      <b>Hours</b>
      Open daily, 6:00 AM – 10:00 PM
    </address>
    <div class="rv">
      <div class="map map--embed">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.1605135431614!2d115.26561497501251!3d-8.48376909155742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23d7cb35f7055%3A0xe9a4947e0a419fd5!2sGymnasium%20Bali!5e0!3m2!1sid!2sid!4v1784739311705!5m2!1sid!2sid"
          width="100%"
          height="100%"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="strict-origin-when-cross-origin">
        </iframe>
      </div>
      <div class="btn-row"><a class="btn btn--solid" href="https://maps.google.com/?q=Gymnasium+Bali+Onyx+Park+Ubud"><span>Open in Google Maps</span></a></div>
    </div>
  </div>
</section>

<section class="sec sec--coal seam-top">
  <div class="wrap rv" style="max-width:820px">
    <h2>How to find us</h2>
    <p>Gymnasium is inside the Onyx Park complex on Jl. Sri Wedari in north Ubud, about 10 minutes from Ubud centre.</p>
    <p class="callout"><strong>Looking for PARQ?</strong> Onyx Park was formerly PARQ Ubud. Same location — if your map is set to PARQ, you're heading to the right place.</p>
    <p><strong>Once you're in the complex:</strong> Enter through the main Onyx Park entrance and continue through to the rear of the site. Gymnasium is in the last building. Parking is available on site.</p>
    <p><strong>Coming by scooter or car:</strong> Follow Jl. Sri Wedari north from Ubud centre. Look for the Onyx Park entrance on your left.</p>
  </div>
</section>

<section class="sec--tight cta-band sec">
  <div class="wrap rv">
    <h2>Get in touch</h2>
    <p class="lede" style="margin-inline:auto">WhatsApp is the fastest way to reach us — memberships, class times, personal training or anything else.</p>
    <div class="btn-row"><a class="btn btn--solid" href="https://wa.me/6281238581815?text=Hi%20Gymnasium%2C%20I%27d%20like%20to%20ask%20about%20membership."><span>Message us on WhatsApp</span></a></div>
  </div>
</section>
<?php get_footer(); ?>