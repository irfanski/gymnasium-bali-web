<?php
/**
 * Template Name: Events
 */
get_header();

$now = current_time('timestamp');

$all_events = get_posts([
    'post_type'      => 'gb_event',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
]);

$upcoming = [];
$past     = [];

foreach ($all_events as $ev) {
    $date_raw = get_field('event_date', $ev->ID); 
    $timestamp = $date_raw ? strtotime($date_raw) : 0;

    $data = [
        'post'      => $ev,
        'timestamp' => $timestamp,
        'date_raw'  => $date_raw,
        'location'  => get_field('event_location', $ev->ID),
        'entry'     => get_field('event_entry', $ev->ID),
        'seats'     => get_field('event_seats', $ev->ID),
        'desc'      => get_field('event_description', $ev->ID),
        'featured'  => (bool) get_field('event_featured', $ev->ID),
        'image'     => get_the_post_thumbnail_url($ev->ID, 'large'),
    ];

    if ($timestamp && $timestamp < $now) {
        $past[] = $data;
    } else {
        $upcoming[] = $data;
    }
}

usort($upcoming, function($a, $b) {
    if (!$a['timestamp']) return 1;
    if (!$b['timestamp']) return -1;
    return $a['timestamp'] <=> $b['timestamp'];
});

usort($past, function($a, $b) {
    return $b['timestamp'] <=> $a['timestamp'];
});

$featured = null;
foreach ($upcoming as $ev) {
    if ($ev['featured']) {
        $featured = $ev;
        break;
    }
}

if ($featured) {
    $upcoming = array_filter($upcoming, function($ev) use ($featured) {
        return $ev['post']->ID !== $featured['post']->ID;
    });
}

function gb2_format_event_date($timestamp) {
    if (!$timestamp) return '[Date TBC]';
    return date_i18n('D, j M Y · g:i A', $timestamp);
}
?>
<section class="hero hero--sub" style="min-height:46vh">
  <div class="hero__bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/DSC08215-HDR.jpg.jpeg')"></div>
  <div class="wrap">
    <span class="eyebrow">Events</span>
    <h1>What's on at the club</h1>
    <p class="lede">Socials, fight nights, challenges and recovery sessions. Most are free for members — registration takes 30 seconds.</p>
  </div>
</section>

<?php if ($featured) : ?>
<section class="sec">
  <div class="wrap">
    <span class="eyebrow rv">Featured</span>
    <article class="event event--feat rv" style="margin-top:.5rem">
      <span class="badge">Featured</span>
      <div class="split" style="gap:0;align-items:stretch">
        <div class="shot" style="--ar:16/10;border:0;border-right:1px dashed var(--violet)<?php if ($featured['image']) : ?>;background-image:url('<?php echo esc_url($featured['image']); ?>');background-size:cover;background-position:center<?php endif; ?>">
          <?php if (!$featured['image']) : ?><span class="tag">Featured event poster — 16:9</span><?php endif; ?>
        </div>
        <div class="body">
          <h3><?php echo esc_html(get_the_title($featured['post'])); ?></h3>
          <div class="meta">
            <span>Date / <b><?php echo esc_html(gb2_format_event_date($featured['timestamp'])); ?></b></span>
            <?php if ($featured['location']) : ?><span>Location / <b><?php echo esc_html($featured['location']); ?></b></span><?php endif; ?>
            <?php if ($featured['entry']) : ?><span>Entry / <b><?php echo esc_html($featured['entry']); ?></b></span><?php endif; ?>
            <?php if ($featured['seats']) : ?><span>Seats / <b><?php echo esc_html($featured['seats']); ?></b></span><?php endif; ?>
          </div>
          <?php if ($featured['desc']) : ?><p><?php echo esc_html($featured['desc']); ?></p><?php endif; ?>
          <div class="btn-row" style="margin-top:.5rem">
            <button type="button" class="btn btn--solid" onclick="openEventRegister(this)" data-event-id="<?php echo (int) $featured['post']->ID; ?>" data-event="<?php echo esc_attr(get_the_title($featured['post'])); ?>">
              <span>Register</span>
            </button>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($upcoming)) : ?>
<section class="sec">
  <div class="wrap">
    <span class="eyebrow rv" style="<?php echo $featured ? 'margin-top:3.5rem' : ''; ?>">Upcoming</span>
    <div class="grid-3" style="margin-top:.5rem">
      <?php foreach ($upcoming as $ev) : ?>
        <article class="event rv">
          <div class="shot" style="--ar:16/10<?php if ($ev['image']) : ?>;background-image:url('<?php echo esc_url($ev['image']); ?>');background-size:cover;background-position:center<?php endif; ?>">
            <?php if (!$ev['image']) : ?><span class="tag"><?php echo esc_html(get_the_title($ev['post'])); ?></span><?php endif; ?>
          </div>
          <div class="body">
            <h3><?php echo esc_html(get_the_title($ev['post'])); ?></h3>
            <div class="meta">
              <span>Date / <b><?php echo esc_html(gb2_format_event_date($ev['timestamp'])); ?></b></span>
              <?php if ($ev['location']) : ?><span>Location / <b><?php echo esc_html($ev['location']); ?></b></span><?php endif; ?>
              <?php if ($ev['entry']) : ?><span>Entry / <b><?php echo esc_html($ev['entry']); ?></b></span><?php endif; ?>
              <?php if ($ev['seats']) : ?><span>Seats / <b><?php echo esc_html($ev['seats']); ?></b></span><?php endif; ?>
            </div>
            <?php if ($ev['desc']) : ?><p><?php echo esc_html($ev['desc']); ?></p><?php endif; ?>
            <button type="button" class="link" style="background:none;border:0;cursor:pointer;padding:0;font:inherit" onclick="openEventRegister(this)" data-event-id="<?php echo (int) $ev['post']->ID; ?>" data-event="<?php echo esc_attr(get_the_title($ev['post'])); ?>">Register →</button>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (empty($upcoming) && !$featured) : ?>
<section class="sec">
  <div class="wrap rv">
    <p class="lede">No upcoming events right now — check back soon, or follow us on Instagram for announcements.</p>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($past)) : ?>
<section class="sec">
  <div class="wrap">
    <span class="eyebrow rv">Past Events</span>
    <div class="grid-3" style="margin-top:.5rem">
      <?php foreach ($past as $ev) : ?>
        <article class="event rv" style="opacity:.6">
          <div class="shot" style="--ar:16/10<?php if ($ev['image']) : ?>;background-image:url('<?php echo esc_url($ev['image']); ?>');background-size:cover;background-position:center<?php endif; ?>">
            <?php if (!$ev['image']) : ?><span class="tag"><?php echo esc_html(get_the_title($ev['post'])); ?></span><?php endif; ?>
          </div>
          <div class="body">
            <h3><?php echo esc_html(get_the_title($ev['post'])); ?></h3>
            <div class="meta">
              <span>Date / <b><?php echo esc_html(gb2_format_event_date($ev['timestamp'])); ?></b></span>
              <?php if ($ev['location']) : ?><span>Location / <b><?php echo esc_html($ev['location']); ?></b></span><?php endif; ?>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="sec--tight cta-band sec">
  <div class="wrap rv">
    <h2>Never miss one</h2>
    <p class="lede" style="margin-inline:auto">Events are announced on Instagram first.</p>
    <div class="btn-row">
      <a class="btn btn--solid" href="https://instagram.com/gymnasium_bali"><span>Follow @gymnasium_bali</span></a>
      <a class="btn btn--ghost" href="https://wa.me/6281238581815?text=Hi%20Gymnasium%2C%20I%27d%20like%20to%20ask%20about%20an%20event."><span>Ask about an event</span></a>
    </div>
  </div>
</section>

<div id="eventRegisterModal" class="ev-modal" hidden>
  <div class="ev-modal__box">
    <button type="button" class="ev-modal__close" onclick="closeEventRegister()" aria-label="Close">&times;</button>
    <span class="eyebrow" style="margin-bottom:.4em;display:block">Register</span>
    <h3 style="margin-bottom:1.2em">Event: <span id="evModalEventName">Event</span></h3>
    <form id="evRegisterForm">
      <div id="evFields"></div>
      <div class="btn-row" style="margin-top:1.4em">
        <button type="submit" class="btn btn--solid" id="evSubmitBtn"><span>Send registration</span></button>
      </div>
      <p class="ev-hint" id="evHint">We'll email the club and open WhatsApp so you can send us a message too.</p>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
  var EV_WA_NUMBER = "6281238581815";
  var HINT_DEFAULT = "We'll email the club and open WhatsApp so you can send us a message too.";

  var GB_COUNTRIES = [
    "Indonesia","Australia","United States","United Kingdom","Germany","France",
    "Netherlands","Canada","Japan","South Korea","China","Singapore","Malaysia",
    "Thailand","Philippines","Vietnam","India","Russia","Brazil","Italy","Spain",
    "Sweden","Switzerland","New Zealand","South Africa","Mexico","Argentina",
    "Portugal","Belgium","Ireland","Norway","Denmark","Finland","Poland","Ukraine",
    "Turkey","United Arab Emirates","Saudi Arabia","Israel","Egypt","Nigeria",
    "Kenya","Other"
  ];

  var COUNTRY_CODES = [
    ['Indonesia','ID','62'],['Australia','AU','61'],['United States','US','1'],['United Kingdom','GB','44'],
    ['Singapore','SG','65'],['Malaysia','MY','60'],['Germany','DE','49'],['France','FR','33'],
    ['Netherlands','NL','31'],['Russia','RU','7'],['India','IN','91'],['China','CN','86'],
    ['Japan','JP','81'],['South Korea','KR','82'],['New Zealand','NZ','64'],['Canada','CA','1'],
    ['---'],
    ['Argentina','AR','54'],['Austria','AT','43'],['Bahrain','BH','973'],['Bangladesh','BD','880'],
    ['Belgium','BE','32'],['Brazil','BR','55'],['Brunei','BN','673'],['Bulgaria','BG','359'],
    ['Cambodia','KH','855'],['Chile','CL','56'],['Colombia','CO','57'],['Croatia','HR','385'],
    ['Cyprus','CY','357'],['Czech Republic','CZ','420'],['Denmark','DK','45'],['Egypt','EG','20'],
    ['Estonia','EE','372'],['Finland','FI','358'],['Greece','GR','30'],['Hong Kong','HK','852'],
    ['Hungary','HU','36'],['Iceland','IS','354'],['Iran','IR','98'],['Ireland','IE','353'],
    ['Israel','IL','972'],['Italy','IT','39'],['Jordan','JO','962'],['Kazakhstan','KZ','7'],
    ['Kenya','KE','254'],['Kuwait','KW','965'],['Laos','LA','856'],['Latvia','LV','371'],
    ['Lebanon','LB','961'],['Lithuania','LT','370'],['Luxembourg','LU','352'],['Macau','MO','853'],
    ['Maldives','MV','960'],['Malta','MT','356'],['Mexico','MX','52'],['Mongolia','MN','976'],
    ['Morocco','MA','212'],['Myanmar','MM','95'],['Nepal','NP','977'],['Nigeria','NG','234'],
    ['Norway','NO','47'],['Oman','OM','968'],['Pakistan','PK','92'],['Peru','PE','51'],
    ['Philippines','PH','63'],['Poland','PL','48'],['Portugal','PT','351'],['Qatar','QA','974'],
    ['Romania','RO','40'],['Saudi Arabia','SA','966'],['Serbia','RS','381'],['Slovakia','SK','421'],
    ['Slovenia','SI','386'],['South Africa','ZA','27'],['Spain','ES','34'],['Sri Lanka','LK','94'],
    ['Sweden','SE','46'],['Switzerland','CH','41'],['Taiwan','TW','886'],['Thailand','TH','66'],
    ['Timor-Leste','TL','670'],['Turkey','TR','90'],['Ukraine','UA','380'],
    ['United Arab Emirates','AE','971'],['Uruguay','UY','598'],['Uzbekistan','UZ','998'],['Vietnam','VN','84']
  ];

  var modal     = document.getElementById('eventRegisterModal');
  var form      = document.getElementById('evRegisterForm');
  var fieldsBox = document.getElementById('evFields');
  var submitBtn = document.getElementById('evSubmitBtn');
  var hint      = document.getElementById('evHint');

  var cfg     = (typeof evAjax !== 'undefined') ? evAjax : {};
  var ajaxUrl = cfg.ajax_url || '/wp-admin/admin-ajax.php';
  var nonce   = cfg.nonce || '';
  var refreshAction = cfg.refreshAction || 'gb_refresh_nonces';
  var forms   = cfg.forms || {};

  var current = null;

  function el(tag, attrs, text){
    var e = document.createElement(tag);
    for (var k in (attrs || {})) e.setAttribute(k, attrs[k]);
    if (text) e.textContent = text;
    return e;
  }

  function addOptions(select, list){
    select.appendChild(el('option', {value: ''}, 'Select'));
    list.forEach(function(o){ select.appendChild(el('option', {value: o}, o)); });
  }

  function setFlag(img, iso2){
    var c = iso2.toLowerCase();
    img.src    = 'https://flagcdn.com/24x18/' + c + '.png';
    img.srcset = 'https://flagcdn.com/48x36/' + c + '.png 2x';
  }

  function buildPhoneField(f){
    var wrap  = el('div', {'class': 'ev-field'});
    wrap.appendChild(document.createTextNode(f.label));
    if (!f.required) wrap.appendChild(el('span', {'class': 'ev-optional'}, ' (optional)'));

    var row   = el('div', {'class': 'ev-phone'});
    var btn   = el('button', {type: 'button', 'class': 'cc__btn', 'aria-expanded': 'false', 'aria-label': 'Country code'});
    var flag  = el('img', {'class': 'cc__flag', width: '24', height: '18', alt: ''});
    setFlag(flag, 'ID');
    var code  = el('span', {'class': 'cc__code'}, '+62');
    btn.appendChild(flag);
    btn.appendChild(code);
    btn.appendChild(el('span', {'class': 'cc__caret'}));

    var num = el('input', {type: 'tel', inputmode: 'tel', autocomplete: 'tel-national', placeholder: f.placeholder || 'Phone number'});
    if (f.required) num.required = true;
    var hidden = el('input', {type: 'hidden', name: 'f_' + f.key});

    var panel  = el('div', {'class': 'cc__panel'});
    panel.hidden = true;
    var search = el('input', {type: 'text', 'class': 'cc__search', placeholder: 'Search country or code', autocomplete: 'off'});
    var list   = el('ul', {'class': 'cc__list'});
    panel.appendChild(search);
    panel.appendChild(list);

    var dial = '62';

    function sync(){
      var local = num.value.replace(/\D/g, '').replace(/^0+/, '');
      if (local.indexOf(dial) === 0 && local.length > 9) local = local.slice(dial.length);
      hidden.value = local ? '+' + dial + ' ' + local : '';
    }
    function renderList(q){
      q = (q || '').toLowerCase().replace(/^\+/, '');
      list.innerHTML = '';
      var shown = 0;
      COUNTRY_CODES.forEach(function(c){
        if (c[0] === '---') {
          if (!q) list.appendChild(el('li', {'class': 'cc__sep'}));
          return;
        }
        if (q && c[0].toLowerCase().indexOf(q) === -1 && c[2].indexOf(q) !== 0 && c[1].toLowerCase() !== q) return;
        var li = el('li', {'class': 'cc__item'});
        var fl = el('img', {'class': 'cc__flag', width: '24', height: '18', alt: '', loading: 'lazy'});
        setFlag(fl, c[1]);
        li.appendChild(fl);
        li.appendChild(el('span', {}, c[0]));
        li.appendChild(el('span', {'class': 'cc__dial'}, '+' + c[2]));
        li.addEventListener('click', function(){ pick(c); });
        list.appendChild(li);
        shown++;
      });
      if (!shown) list.appendChild(el('li', {'class': 'cc__empty'}, 'No country found'));
    }
    function openCC(){ panel.hidden = false; btn.setAttribute('aria-expanded', 'true'); search.value = ''; renderList(''); search.focus(); }
    function closeCC(){ panel.hidden = true; btn.setAttribute('aria-expanded', 'false'); }
    function pick(c){ dial = c[2]; setFlag(flag, c[1]); code.textContent = '+' + c[2]; closeCC(); sync(); num.focus(); }

    btn.addEventListener('click', function(e){ e.stopPropagation(); if (panel.hidden) openCC(); else closeCC(); });
    search.addEventListener('input', function(){ renderList(search.value.trim()); });
    search.addEventListener('keydown', function(e){
      if (e.key === 'Enter') { e.preventDefault(); var a = list.querySelector('.cc__item'); if (a) a.click(); }
      if (e.key === 'Escape') { e.stopPropagation(); closeCC(); btn.focus(); }
    });
    num.addEventListener('input', sync);
    document.addEventListener('click', function(e){
      if (!panel.hidden && !panel.contains(e.target) && !btn.contains(e.target)) closeCC();
    });

    row.appendChild(btn);
    row.appendChild(num);
    row.appendChild(panel);
    wrap.appendChild(row);
    wrap.appendChild(hidden);
    return wrap;
  }

  function buildField(f){
    var name = 'f_' + f.key;
    var label = el('label');
    var input;

    if (f.type === 'checkbox') {
      label.className = 'ev-check';
      input = el('input', {type: 'checkbox', name: name, value: '1'});
      if (f.required) input.required = true;
      label.appendChild(input);
      label.appendChild(document.createTextNode(' ' + f.label));
      return label;
    }

    if (f.type === 'tel') return buildPhoneField(f);

    label.appendChild(document.createTextNode(f.label));
    if (!f.required) label.appendChild(el('span', {'class': 'ev-optional'}, ' (optional)'));

    if (f.type === 'textarea') {
      input = el('textarea', {name: name, rows: '3'});
    } else if (f.type === 'select') {
      input = el('select', {name: name});
      addOptions(input, f.options);
    } else if (f.type === 'country') {
      input = el('select', {name: name});
      addOptions(input, GB_COUNTRIES);
    } else {
      var t = {email:'email', tel:'tel', number:'number'}[f.type] || 'text';
      input = el('input', {type: t, name: name});
      if (t === 'number') input.setAttribute('min', '0');
    }
    if (f.placeholder && input.tagName !== 'SELECT') input.setAttribute('placeholder', f.placeholder);
    if (f.required) input.required = true;
    label.appendChild(input);

    if (f.type === 'country') {
      var otherWrap  = el('label', {style: 'display:none;margin-top:1.1em'}, 'Please specify');
      var otherInput = el('input', {type: 'text', name: name + '__other', placeholder: 'Your nationality'});
      otherWrap.appendChild(otherInput);
      input.addEventListener('change', function(){
        var other = input.value === 'Other';
        otherWrap.style.display = other ? 'block' : 'none';
        otherInput.required = other;
        if (!other) otherInput.value = '';
      });
      var frag = document.createDocumentFragment();
      frag.appendChild(label);
      frag.appendChild(otherWrap);
      return frag;
    }
    return label;
  }

  function render(fields){
    fieldsBox.innerHTML = '';
    fields.forEach(function(f){ fieldsBox.appendChild(buildField(f)); });
  }

  function getFreshNonce() {
    var body = new URLSearchParams();
    body.append('action', refreshAction);
    return fetch(ajaxUrl, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: body.toString()
    })
      .then(function(res){ return res.json(); })
      .then(function(json){ return (json && json.success) ? json.data.event_nonce : null; })
      .catch(function(){ return null; });
  }

  window.openEventRegister = function(btn){
    var id = btn.getAttribute('data-event-id');
    current = forms[id] ? { id: id, name: forms[id].name, fields: forms[id].fields } : null;
    if (!current) return;
    document.getElementById('evModalEventName').textContent = current.name;
    render(current.fields);
    hint.textContent = HINT_DEFAULT;
    modal.hidden = false;
  };

  window.closeEventRegister = function(){ modal.hidden = true; };

  modal.addEventListener('click', function(e){ if (e.target === modal) closeEventRegister(); });
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape' && !modal.hidden) closeEventRegister();
  });

  form.addEventListener('submit', function(e){
    e.preventDefault();
    if (!current) return;

    var f = new FormData(form);
    var values = {};
    current.fields.forEach(function(fd){
      var v = (f.get('f_' + fd.key) || '').toString().trim();
      if (fd.type === 'country' && v === 'Other') {
        var o = (f.get('f_' + fd.key + '__other') || '').toString().trim();
        if (o) v = o;
      }
      values[fd.key] = v;
    });

    var waLines = ["Hi Gymnasium, I'd like to register for: " + current.name];
    current.fields.forEach(function(fd){
      var v = values[fd.key];
      if (!v) return;
      waLines.push(fd.label + ": " + (fd.type === 'checkbox' ? 'Yes' : v));
    });
    window.open("https://wa.me/" + EV_WA_NUMBER + "?text=" + encodeURIComponent(waLines.join("\n")), '_blank');

    submitBtn.disabled = true;
    submitBtn.querySelector('span').textContent = 'Sending…';

    getFreshNonce().then(function(freshNonce){
      var body = new URLSearchParams();
      body.append('action', 'gb_event_register');
      body.append('nonce', freshNonce || nonce);
      body.append('eventId', current.id);
      Object.keys(values).forEach(function(k){ body.append('f[' + k + ']', values[k]); });

      return fetch(ajaxUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: body.toString()
      });
    })
    .then(function(res){ return res.json(); })
    .then(function(data){
      submitBtn.disabled = false;
      submitBtn.querySelector('span').textContent = 'Send registration';
      if (data && data.success) {
        hint.textContent = "Done — we've got your registration. See you there!";
        form.reset();
        render(current.fields);
        setTimeout(closeEventRegister, 1500);
      } else {
        hint.textContent = (data && data.data && data.data.message) ||
          "Email couldn't be sent, but your WhatsApp message should still go through.";
      }
    })
    .catch(function(){
      submitBtn.disabled = false;
      submitBtn.querySelector('span').textContent = 'Send registration';
      hint.textContent = "Email couldn't be sent, but your WhatsApp message should still go through.";
    });
  });
});
</script>

<?php get_footer(); ?>