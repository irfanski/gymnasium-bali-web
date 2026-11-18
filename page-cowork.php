<?php
/**
 * Template Name: Promo
 */
$img = get_template_directory_uri() . '/assets/images/DSC04966.jpg';
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="topbar">
  <a class="brand" href="<?php echo home_url('/'); ?>" aria-label="Gymnasium Bali home">
    <img class="mark" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-mark.png" alt="">
    <img class="word" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-wordmark-white.png" alt="Gymnasium">
  </a>
  <nav class="nav promo-nav" aria-label="Main">
    <a href="<?php echo home_url('/membership'); ?>">Membership</a>
    <a class="btn btn--solid" href="<?php echo gb2_whatsapp_url("Hi Gymnasium, I'd like to book a day pass with the partnership promotion."); ?>"><span>Book Day Pass</span></a>
  </nav>
</header>

<style>
  .promo{display:grid;grid-template-columns:1fr 1fr;min-height:100vh}

  .promo__visual{position:sticky;top:0;height:100vh;overflow:hidden;isolation:isolate}
  .promo__visual-bg{position:absolute;inset:0;z-index:-2;background-size:cover;background-position:center 30%}
  .promo__visual::before{
    content:"";position:absolute;inset:0;z-index:-1;
    background:
      linear-gradient(90deg, transparent 55%, var(--ink) 100%),
      linear-gradient(to top, rgba(11,11,15,.95) 5%, rgba(11,11,15,.35) 50%, rgba(11,11,15,.45));
  }
  .promo__visual-content{position:absolute;left:var(--pad);bottom:clamp(40px,6vw,72px);max-width:480px}
  .promo__visual h2{font-size:clamp(3rem,6.5vw,6rem);margin:0;white-space:nowrap}

  .promo__content{
    display:flex;align-items:center;justify-content:center;
    padding:calc(64px + clamp(32px,5vw,64px)) var(--pad) clamp(48px,6vw,80px);
    background:var(--ink);
  }
  .promo__inner{width:100%;max-width:500px}

  .promo__offer{
    position:relative;border:1px solid var(--violet);background:var(--violet-dim);
    padding:2em 1.8em 1.7em;margin-bottom:1.6rem;
    clip-path:polygon(22px 0,100% 0,100% calc(100% - 22px),calc(100% - 22px) 100%,0 100%,0 22px);
  }
  .promo__offer-label{font-family:var(--ff-mono);font-size:.7rem;letter-spacing:.2em;text-transform:uppercase;color:var(--ash)}
  .promo__discount{font-family:var(--ff-display);font-size:clamp(4rem,8vw,6.5rem);line-height:1;margin:.12em 0}
  .promo__offer p{color:var(--ash);font-size:.95rem}

  .promo__form{display:grid;gap:12px}
  .promo__form[hidden]{display:none}
  .promo__form input{
    width:100%;background:var(--smoke);border:1px solid var(--line);color:var(--bone);
    padding:1em 1.1em;font-family:var(--ff-body);font-size:1rem;
  }
  .promo__form input::placeholder{color:var(--ash)}
  .promo__form input:focus{border-color:var(--violet);outline:none}

  .promo__phone{position:relative;display:grid;grid-template-columns:auto 1fr;gap:8px}
  .cc__btn{
    display:flex;align-items:center;gap:.55em;height:100%;min-width:118px;
    background:var(--smoke);border:1px solid var(--line);color:var(--bone);
    padding:0 1em;font-family:var(--ff-mono);font-size:.95rem;letter-spacing:.04em;cursor:pointer;
  }
  .cc__btn:hover,.cc__btn[aria-expanded="true"]{border-color:var(--violet)}
  .cc__iso{font-size:.68rem;letter-spacing:.14em;color:var(--violet);padding:.2em .45em;border:1px solid var(--line)}
  .cc__caret{margin-left:auto;width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:6px solid var(--violet);transition:transform .2s}
  .cc__btn[aria-expanded="true"] .cc__caret{transform:rotate(180deg)}

  .cc__panel{
    position:absolute;left:0;right:0;top:calc(100% + 6px);z-index:30;
    background:var(--coal);border:1px solid var(--violet);box-shadow:0 20px 50px rgba(0,0,0,.6);
  }
  .cc__panel[hidden]{display:none}
  .promo__form .cc__search{
    width:100%;border:0;border-bottom:1px solid var(--line);background:var(--ink);
    padding:.9em 1em;font-size:1rem;
  }
    .cc__list{list-style:none;margin:0;padding:6px 0;max-height:232px;overflow-y:auto;overscroll-behavior:contain}
  .cc__list::-webkit-scrollbar{width:6px}
  .cc__list::-webkit-scrollbar-thumb{background:var(--line)}
  .cc__item{
    display:flex;align-items:center;gap:.8em;padding:.65em 1em;cursor:pointer;
    font-size:.95rem;color:var(--bone);
  }
  .cc__item .cc__iso{flex-shrink:0;min-width:2.6em;text-align:center}
  .cc__item .cc__dial{margin-left:auto;font-family:var(--ff-mono);font-size:.85rem;color:var(--ash)}
  .cc__item:hover,.cc__item.is-active{background:var(--violet-dim)}
  .cc__item[aria-selected="true"] .cc__dial{color:var(--neon)}
  .cc__sep{height:1px;background:var(--line);margin:6px 0}
  .cc__empty{padding:.9em 1em;color:var(--ash);font-size:.9rem}
  .promo__form .btn{width:100%;text-align:center;margin-top:6px;padding-block:1.1em}
  .promo__form .btn[disabled]{opacity:.6;cursor:wait}
  .promo__status{font-family:var(--ff-mono);font-size:.78rem;letter-spacing:.04em;min-height:1.1em;color:#ff8080}

  .promo__success{padding:1.8em;background:var(--smoke);border:1px solid var(--violet)}
  .promo__success[hidden]{display:none}
  .promo__success h3{font-size:1.8rem;color:var(--neon);margin-bottom:.3em}
  .promo__success p{color:var(--ash);font-size:.95rem}
  .promo__code{
    display:flex;align-items:center;justify-content:space-between;gap:12px;
    margin-top:1.2em;padding:.9em 1.1em;border:1px dashed var(--neon);background:var(--ink);
  }
  .promo__code strong{font-family:var(--ff-mono);font-size:1.5rem;font-weight:600;letter-spacing:.14em;color:#fff}
  .promo__copy{background:none;border:1px solid var(--line);color:var(--ash);font-family:var(--ff-mono);font-size:.7rem;letter-spacing:.14em;text-transform:uppercase;padding:.6em .9em;cursor:pointer}
  .promo__copy:hover{color:var(--neon);border-color:var(--violet)}

  .promo__terms{margin-top:1.4rem;font-size:.78rem;line-height:1.55;color:var(--ash);opacity:.75}

  @media(max-width:900px){
    .promo{grid-template-columns:1fr}
    .promo__visual{position:relative;height:auto;min-height:62vh}
    .promo__visual::before{background:linear-gradient(to top, rgba(11,11,15,1) 2%, rgba(11,11,15,.3) 55%, rgba(11,11,15,.55))}
    .promo__content{padding-top:clamp(32px,6vw,48px);padding-bottom:110px}
    .promo__visual h2{font-size:clamp(2.8rem,13vw,4rem)}
    .promo__offer{padding:1.6em 1.4em 1.4em}
    .cc__btn{min-width:104px;padding:0 .8em}
    .cc__list{max-height:190px}
    .wa{right:12px;bottom:12px;font-size:.66rem;padding:.75em 1.1em;transition:opacity .2s}
    body.promo-typing .wa{opacity:0;pointer-events:none}
  }
  .promo-nav{display:flex !important;gap:clamp(14px,2vw,26px)}
  @media(max-width:480px){
    .topbar .brand img.word{display:none}
    .promo-nav a:not(.btn){font-size:.68rem}
  }
</style>

<main class="promo">

  <section class="promo__visual">
    <div class="promo__visual-bg" style="background-image:url('<?php echo esc_url($img); ?>')"></div>
    <div class="promo__visual-content">
      <span class="eyebrow">Special Offer</span>
      <h2>Do More.<br>Be More.<br><span class="neon">Live More.</span></h2>
    </div>
  </section>

  <section class="promo__content">
    <div class="promo__inner">

      <div class="promo__offer">
        <div class="promo__offer-label">Exclusive offer</div>
        <div class="promo__discount">15% Off</div>
        <p>Gymnasium partnership promotion</p>
      </div>

      <form id="gb-promo-form" class="promo__form" novalidate>
        <input type="text" id="gb-promo-name" placeholder="Your name" autocomplete="name" required>
        <div class="promo__phone">
          <div class="cc" id="gb-cc">
            <button type="button" class="cc__btn" aria-haspopup="listbox" aria-expanded="false" aria-label="Country code">
              <span class="cc__iso">ID</span><span class="cc__code">+62</span><span class="cc__caret"></span>
            </button>
          </div>
          <div class="cc__panel" id="gb-cc-panel" hidden>
            <input type="text" class="cc__search" placeholder="Search country or code" autocomplete="off">
            <ul class="cc__list" role="listbox"></ul>
          </div>
          <input type="tel" id="gb-promo-phone" placeholder="WhatsApp number" autocomplete="tel-national" inputmode="tel" required>
        </div>

        <div style="position:absolute;left:-9999px;top:-9999px" aria-hidden="true">
          <input type="text" id="gb-promo-website" tabindex="-1" autocomplete="off">
        </div>

        <button type="submit" class="btn btn--solid"><span>Claim My 15% Off</span></button>
        <p class="promo__status" id="gb-promo-status" role="status"></p>
      </form>

      <div class="promo__success" id="gb-promo-success" hidden>
        <h3>You're in.</h3>
        <p>Show this promo code to the Gymnasium team when you visit. Screenshot it so you don't lose it.</p>
        <div class="promo__code">
          <strong id="gb-promo-code">—</strong>
          <button type="button" class="promo__copy" id="gb-promo-copy">Copy</button>
        </div>
      </div>

      <p class="promo__terms">*One code per WhatsApp number. Terms and conditions may apply.</p>

    </div>
  </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var ajaxUrl = <?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>;
  var form    = document.getElementById('gb-promo-form');
  var status  = document.getElementById('gb-promo-status');
  var success = document.getElementById('gb-promo-success');
  var codeEl  = document.getElementById('gb-promo-code');
  var copyBtn = document.getElementById('gb-promo-copy');
  if (!form) return;

  var COUNTRIES = [
    ['Indonesia','ID','62'],
    ['Australia','AU','61'],
    ['United States','US','1'],
    ['United Kingdom','GB','44'],
    ['Singapore','SG','65'],
    ['Malaysia','MY','60'],
    ['Germany','DE','49'],
    ['France','FR','33'],
    ['Netherlands','NL','31'],
    ['Russia','RU','7'],
    ['India','IN','91'],
    ['China','CN','86'],
    ['Japan','JP','81'],
    ['South Korea','KR','82'],
    ['New Zealand','NZ','64'],
    ['Canada','CA','1'],
    ['---'],
    ['Argentina','AR','54'],
    ['Austria','AT','43'],
    ['Bahrain','BH','973'],
    ['Bangladesh','BD','880'],
    ['Belgium','BE','32'],
    ['Brazil','BR','55'],
    ['Brunei','BN','673'],
    ['Bulgaria','BG','359'],
    ['Cambodia','KH','855'],
    ['Chile','CL','56'],
    ['Colombia','CO','57'],
    ['Croatia','HR','385'],
    ['Cyprus','CY','357'],
    ['Czech Republic','CZ','420'],
    ['Denmark','DK','45'],
    ['Egypt','EG','20'],
    ['Estonia','EE','372'],
    ['Finland','FI','358'],
    ['Greece','GR','30'],
    ['Hong Kong','HK','852'],
    ['Hungary','HU','36'],
    ['Iceland','IS','354'],
    ['Iran','IR','98'],
    ['Ireland','IE','353'],
    ['Israel','IL','972'],
    ['Italy','IT','39'],
    ['Jordan','JO','962'],
    ['Kazakhstan','KZ','7'],
    ['Kenya','KE','254'],
    ['Kuwait','KW','965'],
    ['Laos','LA','856'],
    ['Latvia','LV','371'],
    ['Lebanon','LB','961'],
    ['Lithuania','LT','370'],
    ['Luxembourg','LU','352'],
    ['Macau','MO','853'],
    ['Maldives','MV','960'],
    ['Malta','MT','356'],
    ['Mexico','MX','52'],
    ['Mongolia','MN','976'],
    ['Morocco','MA','212'],
    ['Myanmar','MM','95'],
    ['Nepal','NP','977'],
    ['Nigeria','NG','234'],
    ['Norway','NO','47'],
    ['Oman','OM','968'],
    ['Pakistan','PK','92'],
    ['Peru','PE','51'],
    ['Philippines','PH','63'],
    ['Poland','PL','48'],
    ['Portugal','PT','351'],
    ['Qatar','QA','974'],
    ['Romania','RO','40'],
    ['Saudi Arabia','SA','966'],
    ['Serbia','RS','381'],
    ['Slovakia','SK','421'],
    ['Slovenia','SI','386'],
    ['South Africa','ZA','27'],
    ['Spain','ES','34'],
    ['Sri Lanka','LK','94'],
    ['Sweden','SE','46'],
    ['Switzerland','CH','41'],
    ['Taiwan','TW','886'],
    ['Thailand','TH','66'],
    ['Timor-Leste','TL','670'],
    ['Turkey','TR','90'],
    ['Ukraine','UA','380'],
    ['United Arab Emirates','AE','971'],
    ['Uruguay','UY','598'],
    ['Uzbekistan','UZ','998'],
    ['Vietnam','VN','84']
  ];
  var dialCode = '62';
  var ccBtn    = document.querySelector('#gb-cc .cc__btn');
  var ccPanel  = document.getElementById('gb-cc-panel');
  var ccSearch = ccPanel.querySelector('.cc__search');
  var ccList   = ccPanel.querySelector('.cc__list');

  function renderList(q) {
    q = (q || '').toLowerCase().replace(/^\+/, '');
    ccList.innerHTML = '';
    var shown = 0;
    COUNTRIES.forEach(function (c) {
      if (c[0] === '---') {
        if (!q) { var sep = document.createElement('li'); sep.className = 'cc__sep'; ccList.appendChild(sep); }
        return;
      }
      if (q && c[0].toLowerCase().indexOf(q) === -1 && c[2].indexOf(q) !== 0 && c[1].toLowerCase() !== q) return;
      var li = document.createElement('li');
      li.className = 'cc__item';
      li.setAttribute('role', 'option');
      li.setAttribute('aria-selected', c[2] === dialCode && ccBtn.querySelector('.cc__iso').textContent === c[1] ? 'true' : 'false');
      li.innerHTML = '<span class="cc__iso">' + c[1] + '</span><span>' + c[0] + '</span><span class="cc__dial">+' + c[2] + '</span>';
      li.addEventListener('click', function () { pick(c); });
      ccList.appendChild(li);
      shown++;
    });
    if (!shown) ccList.innerHTML = '<li class="cc__empty">No country found</li>';
    var first = ccList.querySelector('.cc__item');
    if (first && q) first.classList.add('is-active');
  }
  function openCC() {
    ccPanel.hidden = false;
    document.body.classList.add('promo-typing');
    ccBtn.setAttribute('aria-expanded', 'true');
    ccSearch.value = '';
    renderList('');
    if (window.matchMedia('(pointer:fine)').matches) ccSearch.focus();
    else ccPanel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }
  function closeCC() {
    ccPanel.hidden = true;
    if (!form.contains(document.activeElement)) document.body.classList.remove('promo-typing');
    ccBtn.setAttribute('aria-expanded', 'false');
  }
  function pick(c) {
    dialCode = c[2];
    ccBtn.querySelector('.cc__iso').textContent = c[1];
    ccBtn.querySelector('.cc__code').textContent = '+' + c[2];
    closeCC();
    document.getElementById('gb-promo-phone').focus();
  }
  form.addEventListener('focusin', function () { document.body.classList.add('promo-typing'); });
  form.addEventListener('focusout', function () {
    setTimeout(function () {
      if (!form.contains(document.activeElement) && ccPanel.hidden) document.body.classList.remove('promo-typing');
    }, 100);
  });
  ccBtn.addEventListener('click', function (e) { e.stopPropagation(); ccPanel.hidden ? openCC() : closeCC(); });
  ccSearch.addEventListener('input', function () { renderList(ccSearch.value.trim()); });
  ccSearch.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') { e.preventDefault(); var a = ccList.querySelector('.cc__item'); if (a) a.click(); }
    if (e.key === 'Escape') { closeCC(); ccBtn.focus(); }
  });
  document.addEventListener('click', function (e) {
    if (!ccPanel.hidden && !ccPanel.contains(e.target) && !ccBtn.contains(e.target)) closeCC();
  });

  function post(fields) {
    var data = new FormData();
    Object.keys(fields).forEach(function (k) { data.append(k, fields[k]); });
    return fetch(ajaxUrl, { method: 'POST', body: data, credentials: 'same-origin' }).then(function (r) { return r.json(); });
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var name  = document.getElementById('gb-promo-name').value.trim();
    var local = document.getElementById('gb-promo-phone').value.replace(/\D/g, '').replace(/^0+/, '');
    var code  = dialCode;
    if (local.indexOf(code) === 0 && local.length > 9) local = local.slice(code.length);
    var phone = '+' + code + ' ' + local;

    if (!name || local.length < 6) {
      status.textContent = 'Please enter your name and a valid WhatsApp number.';
      return;
    }

    var btn = form.querySelector('button[type="submit"]');
    btn.disabled = true;
    status.style.color = 'var(--ash)';
    status.textContent = 'Sending...';

    post({ action: 'gb_promo_nonce' })
      .then(function (n) {
        return post({
          action: 'gb_promo_claim',
          nonce: n.success ? n.data.nonce : '',
          name: name,
          phone: phone,
          website: document.getElementById('gb-promo-website').value
        });
      })
      .then(function (json) {
        if (json.success) {
          codeEl.textContent = json.data.code;
          var wa = document.getElementById('gb-promo-wa');
          if (wa) {
            var msg = "Hi Gymnasium, I just claimed the partnership promotion. My code is " + json.data.code + ".";
            wa.href = 'https://wa.me/<?php echo gb2_whatsapp_number(); ?>?text=' + encodeURIComponent(msg);
          }
          form.hidden = true;
          success.hidden = false;
          status.textContent = '';
        } else {
          status.style.color = '#ff8080';
          status.textContent = (json.data && json.data.message) || 'Something went wrong. Please try again.';
        }
      })
      .catch(function () {
        status.style.color = '#ff8080';
        status.textContent = 'Network error. Please try again.';
      })
      .finally(function () { btn.disabled = false; });
  });

  copyBtn.addEventListener('click', function () {
    var code = codeEl.textContent;
    if (navigator.clipboard) {
      navigator.clipboard.writeText(code).then(function () {
        copyBtn.textContent = 'Copied';
        setTimeout(function () { copyBtn.textContent = 'Copy'; }, 1800);
      });
    }
  });
});
</script>

<a class="wa" id="gb-promo-wa" href="<?php echo gb2_whatsapp_url("Hi Gymnasium, I'd like to ask about the partnership promotion (15% off)."); ?>"><span>Chat with us</span></a>

<?php wp_footer(); ?>
</body>
</html>