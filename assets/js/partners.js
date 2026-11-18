document.addEventListener('DOMContentLoaded', function () {
  const dialogs = document.querySelectorAll('dialog.pt-modal');
  if (!dialogs.length) return;

  let current = null;
  const findDialog = (slug) => (slug ? document.getElementById('partner-' + slug) : null);

  function loadMedia(dlg) {
    dlg.querySelectorAll('iframe[data-src]').forEach((f) => { if (!f.src) f.src = f.dataset.src; });
    dlg.querySelectorAll('video').forEach((v) => { v.preload = 'metadata'; });
  }

  function stopMedia(dlg) {
    dlg.querySelectorAll('iframe[data-src]').forEach((f) => f.removeAttribute('src'));
    dlg.querySelectorAll('video').forEach((v) => v.pause());
  }

  function open(dlg) {
    if (current && current !== dlg) current.close();
    loadMedia(dlg);
    if (!dlg.open) dlg.showModal();
    current = dlg;
  }

  dialogs.forEach(function (dlg) {
    dlg.querySelector('.pt-modal__close').addEventListener('click', () => dlg.close());
    dlg.addEventListener('click', (e) => { if (e.target === dlg) dlg.close(); });
    dlg.addEventListener('close', function () {
      stopMedia(dlg);
      if (current === dlg) current = null;
      if (location.hash) history.replaceState(null, '', location.pathname + location.search);
    });
  });

  function syncWithHash() {
    const dlg = findDialog(decodeURIComponent(location.hash.slice(1)));
    if (dlg && dlg.tagName === 'DIALOG') open(dlg);
    else if (current) current.close();
  }

  window.addEventListener('hashchange', syncWithHash);
  syncWithHash();
});

document.addEventListener('DOMContentLoaded', function () {
  const dlg  = document.getElementById('pt-enquiry');
  const form = document.getElementById('pt-form');
  if (!dlg || !form) return;

  const status  = document.getElementById('pt-form-status');
  const success = document.getElementById('pt-form-success');
  const done    = document.getElementById('pt-form-done');
  const ajaxUrl = form.dataset.ajax;

  document.querySelectorAll('[data-open-dialog="pt-enquiry"]').forEach(function (el) {
    el.addEventListener('click', function (e) {
      if (typeof dlg.showModal !== 'function') return;
      e.preventDefault();
      if (!dlg.open) dlg.showModal();
    });
  });

  dlg.addEventListener('close', function () {
    if (!success.hidden) {
      form.reset();
      success.hidden = true;
      form.hidden = false;
    }
    say('', false);
  });
  if (done) done.addEventListener('click', () => dlg.close());

  function getFreshNonce() {
    const data = new FormData();
    data.append('action', 'gb_refresh_nonces');
    return fetch(ajaxUrl, { method: 'POST', body: data })
      .then((r) => r.json())
      .then((j) => (j.success ? j.data.contact_nonce : null))
      .catch(() => null);
  }

  function say(text, isError) {
    status.textContent = text;
    status.style.color = isError ? '#ff8080' : 'var(--ash)';
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const btn = form.querySelector('button[type="submit"]');
    btn.disabled = true;
    say('Sending...', false);

    getFreshNonce().then(function (nonce) {
      if (!nonce) {
        say('Something went wrong. Please try again or use WhatsApp.', true);
        btn.disabled = false;
        return;
      }

      const data = new FormData(form);
      data.append('action', 'gb_partner_submit');
      data.append('nonce', nonce);

      fetch(ajaxUrl, { method: 'POST', body: data })
        .then((r) => r.json())
        .then(function (json) {
          if (json.success) {
            say('', false);
            form.hidden = true;
            success.hidden = false;
          } else {
            say((json.data && json.data.message) || 'Could not send. Please try again.', true);
          }
        })
        .catch(() => say('Network error. Please try again.', true))
        .finally(() => { btn.disabled = false; });
    });
  });
});