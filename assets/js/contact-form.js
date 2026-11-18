document.addEventListener('DOMContentLoaded', function () {
  const form       = document.getElementById('gb-contact-form');
  const status     = document.getElementById('gb-form-status');
  const successBox = document.getElementById('gb-form-success');
  const resetBtn   = document.getElementById('gb-form-reset');
  if (!form) return;

  function getFreshNonce() {
    const data = new FormData();
    data.append('action', gbContact.refreshAction);

    return fetch(gbContact.ajaxUrl, { method: 'POST', body: data })
      .then(res => res.json())
      .then(json => (json.success ? json.data.contact_nonce : null))
      .catch(() => null);
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const btn = form.querySelector('button[type="submit"]');
    btn.disabled = true;
    status.style.color = 'var(--ash)';
    status.textContent = 'Mengirim...';

    getFreshNonce().then(function (freshNonce) {
      const nonceValue = freshNonce || form.querySelector('#gb_contact_nonce').value;

      const data = new FormData();
      data.append('action', gbContact.action);
      data.append('nonce', nonceValue);
      data.append('gb_name', form.querySelector('#gb-name').value);
      data.append('gb_email', form.querySelector('#gb-email').value);
      data.append('gb_message', form.querySelector('#gb-message').value);
      data.append('gb_website', form.querySelector('#gb-website').value);

      fetch(gbContact.ajaxUrl, { method: 'POST', body: data })
        .then(res => res.json())
        .then(json => {
          if (json.success) {
            status.textContent = '';
            form.hidden = true;
            successBox.hidden = false;
          } else {
            status.textContent = json.data.message;
            status.style.color = '#ff8080';
          }
        })
        .catch(() => {
          status.textContent = 'Terjadi kesalahan jaringan.';
          status.style.color = '#ff8080';
        })
        .finally(() => { btn.disabled = false; });
    });
  });

  if (resetBtn) {
    resetBtn.addEventListener('click', function () {
      form.reset();
      status.textContent = '';
      successBox.hidden = true;
      form.hidden = false;
    });
  }
});