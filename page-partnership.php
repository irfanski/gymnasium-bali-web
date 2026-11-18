<?php
/**
 * Template Name: Partnership
 */

$partners = [
  [
    'slug'        => 'local-expats-bali',
    'name'        => 'Local Expats Bali',
    'category'    => 'Community · Bali-wide',
    'logo'        => 'local-expats-bali.png',
    'description' => 'Bali\'s expat membership community. One app with access to 500+ partner venues, member perks and an events calendar. LEB members get 15% off GYMNASIUM day passes and memberships.',
    'video'       => '',
    'join'        => 'https://members.localexpatsbali.com/join/8024E7',
    'website'     => 'https://www.localexpatsbali.com',
    'instagram'   => 'localexpatsbali',
    'whatsapp'    => '',
    'telegram'    => '',
    'tiktok'      => '',
    'facebook'    => '',
    'appstore'    => 'https://apps.apple.com/us/app/local-expats-bali/id6753702197',
    'playstore'   => 'https://play.google.com/store/apps/details?id=com.localexpatsbali.app',
  ],
  [
    'slug'        => 'outpost',
    'name'        => 'Outpost Ubud',
    'category'    => 'Coworking & Coliving · Ubud',
    'logo'        => 'outpost.svg',
    'description' => 'Coworking, coliving and social spaces for digital nomads and creatives, with two Ubud locations in Penestanan and Nyuh Kuning. Outpost members get 15% off GYMNASIUM day passes and memberships.',
    'video'       => '',
    'website'     => 'https://destinationoutpost.co/cowork-in-ubud/',
    'instagram'   => 'destination.outpost',
    'whatsapp'    => '6285888137921',
    'telegram'    => '',
    'tiktok'      => '',
    'facebook'    => 'https://www.facebook.com/DestinationOutpost/',
  ],
  [
    'slug'        => 'born-to-be',
    'name'        => 'Born To Be',
    'category'    => 'Clothing · Sold at GYMNASIUM',
    'logo'        => 'born-to-be.svg',
    'description' => 'Don\'t pretend, just be. A lifestyle and travel clothing brand by photographer and filmmaker Alexander Tikhomirov, based in Bali. Pieces are available at GYMNASIUM, with the full range online and worldwide delivery.',
    'video'       => '',
    'website'     => 'https://www.borntobewear.com/en',
    'instagram'   => 'borntobe.wear',
    'whatsapp'    => '79687683333',
    'telegram'    => '',
    'tiktok'      => '',
    'facebook'    => '',
  ],
  [
    'slug'        => 'nudes-concept',
    'name'        => 'Nudes Concept',
    'category'    => 'Clothing · Onyx Park, Ubud',
    'logo'        => 'nudes-concept.png',
    'description' => 'Clothing in tones of skin. A Bali-based label for basics, beachwear and accessories that ships worldwide. Visit their store on the 1st floor of Onyx Park, a few steps from the gym.',
    'video'       => 'https://www.instagram.com/reel/DdoG-tYz3EM/', // Instagram, YouTube, Vimeo or .mp4 link (optional)
    'website'     => '',
    'instagram'   => 'nudes_concept',
    'whatsapp'    => '',
    'telegram'    => '',
    'tiktok'      => '',
    'facebook'    => '',
  ],
  [
    'slug'        => 'british-school-of-bali',
    'name'        => 'The British School of Bali',
    'category'    => 'International School · Onyx Park, Ubud',
    'logo'        => 'british-school-bali.png',
    'description' => 'An international school teaching the British curriculum to children aged 2 to 11, part of The Schools Trust. Located right here in Onyx Park.',
    'video'       => '',
    'website'     => 'https://www.britishschool.id',
    'instagram'   => 'britishschoolbali',
    'whatsapp'    => '6282144087507',
    'telegram'    => '',
    'tiktok'      => 'the.british.school.bali',
    'facebook'    => 'https://www.facebook.com/profile.php?id=61571069583302',
  ],
  [
    'slug'        => 'ronin',
    'name'        => 'Ronin',
    'category'    => 'Japanese Restaurant · Onyx Park, Ubud',
    'logo'        => 'ronin.png',
    'description' => 'Japanese cuisine taken to a new level, with a full bar. Open daily from 11am to 11pm in Onyx Park.',
    'video'       => '',
    'website'     => 'https://linktr.ee/roninubud',
    'instagram'   => 'roninubud',
    'whatsapp'    => '6285735300605',
    'telegram'    => '',
    'tiktok'      => '',
    'facebook'    => '',
  ],
  [
    'slug'        => 'chai-chitai',
    'name'        => 'Chai Chitai Ubud',
    'category'    => 'Tea House & Shisha · Ubud',
    'logo'        => 'chai-chitai.png',
    'description' => 'A tea house, shisha lounge and library in one. Hundreds of Chinese teas, desserts, tea ceremonies and a quiet corner to read. Open daily from 9am to midnight, with sister houses in Canggu and Seseh.',
    'video'       => '',
    'website'     => 'https://taplink.cc/chaichitaiteahouse',
    'instagram'   => 'chaichitai.ubud',
    'whatsapp'    => '6282266318816',
    'telegram'    => 'https://t.me/+6281339142837',
    'tiktok'      => '',
    'facebook'    => '',
  ],
  [
    'slug'        => 'nino',
    'name'        => 'NINO',
    'category'    => 'Caucasian Restaurant · Onyx Park, Ubud',
    'logo'        => 'nino.png',
    'description' => 'Caucasian cooking in the heart of Onyx Park: khinkali dumplings, shashlyk and fresh lavash. An open-air hall for long lunches and a private indoor room for shisha. Open daily from 11am to 11pm.',
    'video'       => '',
    'website'     => 'https://linktr.ee/ninoubud',
    'instagram'   => 'nino.ubud',
    'whatsapp'    => '6285735300605',
    'telegram'    => '',
    'tiktok'      => '',
    'facebook'    => '',
  ],
];

$logo_dir = get_template_directory_uri() . '/assets/img/partners/';
$mail     = 'admin@gymnasium-bali.com';

$inquiry = "I'd like to become a Gymnasium partner.\n\n"
         . "Business name:\n"
         . "Type of business (cafe, hotel, coworking, company...):\n"
         . "Location:\n"
         . "Website / Instagram:\n"
         . "Your name:\n"
         . "What would you like to offer our members?\n";

$wa       = gb2_whatsapp_url("Hi Gymnasium,\n\n" . $inquiry);
$mailto   = 'mailto:' . $mail
          . '?subject=' . rawurlencode('Partnership enquiry')
          . '&body=' . rawurlencode("Hi Gymnasium team,\n\n" . $inquiry . "\nThank you!");

$link_labels = [
  'join'      => 'Join via GYMNASIUM',
  'website'   => 'Website',
  'instagram' => 'Instagram',
  'whatsapp'  => 'WhatsApp',
  'telegram'  => 'Telegram',
  'tiktok'    => 'TikTok',
  'facebook'  => 'Facebook',
  'appstore'  => 'App Store',
  'playstore' => 'Google Play',
];

$link_url = function ($type, $value) {
  $value = trim((string) $value);
  if ($value === '') return '';
  if (preg_match('#^https?://#i', $value)) return $value;
  switch ($type) {
    case 'join':
    case 'appstore':
    case 'playstore':
    case 'website':   return 'https://' . $value;
    case 'instagram': return 'https://instagram.com/' . ltrim($value, '@');
    case 'whatsapp':  return 'https://wa.me/' . preg_replace('/\D/', '', $value);
    case 'telegram':  return 'https://t.me/' . ltrim($value, '@');
    case 'tiktok':    return 'https://www.tiktok.com/@' . ltrim($value, '@');
    case 'facebook':  return 'https://facebook.com/' . $value;
  }
  return '';
};

$video_html = function ($url) {
  $url = trim((string) $url);
  if ($url === '') return '';
  if (preg_match('~instagram\.com/(?:[\w.]+/)?(p|reel|tv)/([\w-]+)~', $url, $m)) {
    return '<div class="pt-video pt-video--ig"><iframe data-src="https://www.instagram.com/' . $m[1] . '/' . $m[2] . '/embed/" title="Instagram video" allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe></div>';
  }
  if (preg_match('~(?:youtu\.be/|youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/))([\w-]{11})~', $url, $m)) {
    $src = 'https://www.youtube-nocookie.com/embed/' . $m[1];
  } elseif (preg_match('~vimeo\.com/(?:video/)?(\d+)~', $url, $m)) {
    $src = 'https://player.vimeo.com/video/' . $m[1];
  } elseif (preg_match('~\.(mp4|webm|mov)(\?|$)~i', $url)) {
    return '<div class="pt-video"><video controls playsinline preload="none" src="' . esc_url($url) . '"></video></div>';
  } else {
    return '';
  }
  return '<div class="pt-video"><iframe data-src="' . esc_url($src) . '" title="Partner video" allow="autoplay; encrypted-media; picture-in-picture; fullscreen" allowfullscreen></iframe></div>';
};

$icons = [
  'join'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12h14M13 6l6 6-6 6"/></svg>',
  'appstore'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M16.4 12.6c0-2.3 1.9-3.4 2-3.5-1.1-1.6-2.8-1.8-3.4-1.8-1.4-.1-2.8.9-3.5.9s-1.9-.9-3.1-.8c-1.6 0-3 .9-3.8 2.3-1.6 2.8-.4 7 1.2 9.3.8 1.1 1.7 2.4 2.9 2.3 1.2 0 1.6-.7 3-.7s1.8.7 3.1.7 2.1-1.1 2.8-2.3c.9-1.3 1.3-2.6 1.3-2.6s-2.5-1-2.5-3.8zM14.2 5.8c.6-.8 1.1-1.9 1-3-.9 0-2.1.6-2.7 1.4-.6.7-1.1 1.8-1 2.9 1 .1 2.1-.5 2.7-1.3z"/></svg>',
  'playstore' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M4.6 2.8c-.3.3-.4.7-.4 1.2v16c0 .5.1.9.4 1.2l9-9.2-9-9.2zm10.1 10.3 2.6 2.6-11 6.3 8.4-8.9zm0-2.2L6.3 2l11 6.3-2.6 2.6zm4-1.6 2.5 1.4c.9.5.9 1.4 0 1.9l-2.5 1.4-2.9-2.4 2.9-2.3z"/></svg>',
  'website'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.6 3.8 5.6 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.6-3.8-9S9.5 5.6 12 3z"/></svg>',
  'instagram' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1.1" fill="currentColor" stroke="none"/></svg>',
  'whatsapp'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.9a9.1 9.1 0 0 0-7.85 13.7L3 21.1l4.6-1.2A9.1 9.1 0 1 0 12 2.9zm0 1.8a7.3 7.3 0 1 1 0 14.6 7.2 7.2 0 0 1-3.7-1l-.27-.16-2.73.71.73-2.66-.18-.28A7.3 7.3 0 0 1 12 4.7zm-3.2 3.9c-.16 0-.42.06-.64.31s-.85.83-.85 2.02.87 2.35.99 2.5c.12.16 1.7 2.6 4.13 3.55.58.22 1.03.35 1.38.45.58.17 1.11.14 1.53.09.47-.06 1.43-.58 1.63-1.15.2-.56.2-1.04.14-1.15-.06-.1-.22-.16-.46-.28s-1.43-.7-1.65-.78-.38-.12-.55.12-.63.78-.78.94-.28.18-.52.06a6.55 6.55 0 0 1-1.93-1.19 7.2 7.2 0 0 1-1.34-1.66c-.14-.24 0-.37.1-.5.11-.12.24-.3.36-.45.12-.15.16-.25.24-.42.08-.16.04-.3-.02-.42-.06-.12-.55-1.36-.76-1.86-.2-.48-.4-.42-.55-.42z"/></svg>',
  'telegram'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M21.5 4.5 3.2 11.6c-.9.35-.9.9-.15 1.13l4.7 1.47 1.8 5.55c.22.6.4.84.85.84.35 0 .5-.16.72-.37l2-1.94 4.16 3.07c.77.42 1.32.2 1.5-.72l2.75-13.1c.28-1.15-.44-1.67-1.28-1.34zM8.4 13.6l9.1-5.7c.43-.26.83-.12.5.17l-7.8 7.05-.3 3.35-1.5-4.87z"/></svg>',
  'tiktok'    => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M16.6 5.2c.9.9 2 1.5 3.4 1.6v2.9c-1.4 0-2.6-.4-3.4-.9v6.6c0 3-2.4 4.9-5.1 4.9-2.8 0-5.1-2-5.1-4.9 0-2.8 2.3-4.8 5.1-4.8.4 0 .8 0 1.1.1v3c-.3-.1-.7-.2-1.1-.2-1.2 0-2.2.9-2.2 2s1 2 2.2 2c1.3 0 2.3-1 2.3-2.3V2h2.8c.1 1.2.5 2.3 1 3.2z"/></svg>',
  'facebook'  => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-7.6h2.6l.4-3h-3v-1.9c0-.9.2-1.5 1.5-1.5h1.6V4.3C15.9 4.2 15 4.1 14 4.1c-2.1 0-3.6 1.3-3.6 3.6v2h-2.4v3h2.4V21h3.1z"/></svg>',
];

get_header();
?>

<section class="sec pt-partners" id="partners">
  <div class="wrap">
    <header class="pt-head rv">
      <h1 class="pt-title">Our Partners</h1>
      <p>Trusted local businesses that share our standards.</p>
    </header>

    <?php if ($partners) : ?>
      <ul class="pt-grid rv">
        <?php foreach ($partners as $p) : ?>
          <li>
            <a class="pt-tile" href="#<?php echo esc_attr($p['slug']); ?>" aria-haspopup="dialog">
              <img src="<?php echo esc_url($logo_dir . $p['logo']); ?>" alt="<?php echo esc_attr($p['name']); ?>" loading="lazy">
              <span class="pt-tile__hint" aria-hidden="true">View</span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
      <p class="pt-tap">Tap a logo to meet the partner</p>
    <?php else : ?>
      <p class="pt-tap">Our first partners are joining soon.</p>
    <?php endif; ?>
  </div>
</section>

<?php foreach ($partners as $p) :
  $id    = 'partner-' . $p['slug'];
  $video = $video_html($p['video'] ?? '');
  $split = strpos($video, 'pt-video--ig') !== false;
  $first = true; ?>
<dialog class="pt-modal<?php echo $split ? ' pt-modal--split' : ''; ?>" id="<?php echo esc_attr($id); ?>" aria-labelledby="<?php echo esc_attr($id); ?>-name">
  <div class="pt-modal__box">
    <button class="pt-modal__close" type="button" aria-label="Close">&times;</button>
    <div class="pt-modal__info">
      <div class="pt-modal__head">
        <div class="pt-modal__logo"><img src="<?php echo esc_url($logo_dir . $p['logo']); ?>" alt=""></div>
        <div>
          <?php if (!empty($p['category'])) : ?><span class="eyebrow"><?php echo esc_html($p['category']); ?></span><?php endif; ?>
          <h2 id="<?php echo esc_attr($id); ?>-name"><?php echo esc_html($p['name']); ?></h2>
        </div>
      </div>
      <?php if (!empty($p['description'])) : ?><p class="pt-modal__desc"><?php echo esc_html($p['description']); ?></p><?php endif; ?>
      <div class="pt-links">
        <?php foreach ($link_labels as $type => $label) :
          $url = $link_url($type, $p[$type] ?? '');
          if (!$url) continue; ?>
          <a class="btn <?php echo $first ? 'btn--solid' : 'btn--ghost'; ?> pt-link" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener"><span><?php echo $icons[$type] . $label; ?></span></a>
        <?php $first = false; endforeach; ?>
      </div>
    </div>
    <?php echo $video; ?>
  </div>
</dialog>
<?php endforeach; ?>

<section class="sec cta-band" id="become-partner">
  <div class="wrap rv">
    <span class="eyebrow">Partnerships</span>
    <h2>Want to be our partner?</h2>
    <p class="lede" style="margin-inline:auto">We team up with cafes, coworking spaces, hotels, villas and companies around Ubud. Tell us about your business and we'll get back to you.</p>
    <div class="btn-row">
      <a class="btn btn--solid" href="<?php echo esc_attr($wa); ?>" target="_blank" rel="noopener"><span>Chat on WhatsApp</span></a>
      <a class="btn btn--ghost" href="<?php echo esc_attr($mailto); ?>" data-open-dialog="pt-enquiry"><span>Email Us</span></a>
    </div>
    <p class="pt-mail"><?php echo esc_html($mail); ?></p>
  </div>
</section>

<dialog class="pt-modal pt-modal--form" id="pt-enquiry" aria-labelledby="pt-enquiry-title">
  <div class="pt-modal__box">
    <button class="pt-modal__close" type="button" aria-label="Close">&times;</button>

    <form id="pt-form" class="foot-cta__form pt-form" novalidate data-ajax="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
      <div>
        <span class="eyebrow">Partnerships</span>
        <h2 id="pt-enquiry-title">Become a Partner</h2>
        <p class="pt-form__intro">Tell us about your business and our team will get back to you shortly.</p>
      </div>

      <div class="foot-cta__row">
        <input type="text" name="pt_business" placeholder="Business name *" required>
        <input type="text" name="pt_type" placeholder="Type (cafe, hotel, coworking...)">
      </div>
      <div class="foot-cta__row">
        <input type="text" name="pt_name" placeholder="Your name *" required>
        <input type="email" name="pt_email" placeholder="Email *" required>
      </div>
      <div class="foot-cta__row">
        <input type="text" name="pt_phone" placeholder="WhatsApp number">
        <input type="text" name="pt_link" placeholder="Website or Instagram">
      </div>
      <textarea name="pt_message" rows="4" placeholder="What would you like to offer our members?"></textarea>

      <div style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
        <label for="pt-website">Website</label>
        <input type="text" id="pt-website" name="gb_website" tabindex="-1" autocomplete="off">
      </div>

      <div class="pt-form__actions">
        <button type="submit" class="btn btn--solid"><span>Send Enquiry</span></button>
      </div>
      <p id="pt-form-status" class="pt-form__status" role="status"></p>
    </form>

    <div id="pt-form-success" class="foot-cta__success pt-form__success" hidden>
      <h4>Thank You!</h4>
      <p>We've received your enquiry and will get back to you shortly.</p>
      <button type="button" id="pt-form-done" class="btn btn--ghost"><span>Close</span></button>
    </div>
  </div>
</dialog>

<?php get_footer(); ?>