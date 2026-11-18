<?php
if (!defined('ABSPATH')) exit;

const GB_REG_META = 'gb_reg_fields';

function gb2_reg_field_types() {
    return [
        'text'     => 'Short text',
        'email'    => 'Email',
        'tel'      => 'Phone / WhatsApp',
        'number'   => 'Number',
        'textarea' => 'Long text',
        'select'   => 'Dropdown',
        'country'  => 'Country (nationality list)',
        'checkbox' => 'Checkbox (yes/no)',
    ];
}

function gb2_default_reg_fields() {
    return [
        ['key' => 'first_name',  'label' => 'First name',  'type' => 'text',    'required' => 1, 'options' => '', 'placeholder' => ''],
        ['key' => 'last_name',   'label' => 'Last name',   'type' => 'text',    'required' => 1, 'options' => '', 'placeholder' => ''],
        ['key' => 'age',         'label' => 'Age',         'type' => 'number',  'required' => 1, 'options' => '', 'placeholder' => ''],
        ['key' => 'gender',      'label' => 'Gender',      'type' => 'select',  'required' => 1, 'options' => "Male\nFemale\nOther", 'placeholder' => ''],
        ['key' => 'nationality', 'label' => 'Nationality', 'type' => 'country', 'required' => 1, 'options' => '', 'placeholder' => ''],
        ['key' => 'email',       'label' => 'Your email',  'type' => 'email',   'required' => 1, 'options' => '', 'placeholder' => 'you@email.com'],
        ['key' => 'instagram',   'label' => 'Instagram',   'type' => 'text',    'required' => 0, 'options' => '', 'placeholder' => '@username'],
    ];
}

function gb2_get_reg_fields($post_id) {
    $saved = get_post_meta($post_id, GB_REG_META, true);
    return (is_array($saved) && !empty($saved)) ? $saved : gb2_default_reg_fields();
}

add_action('add_meta_boxes', function () {
    add_meta_box('gb_reg_form', 'Registration Form', 'gb2_reg_metabox', 'gb_event', 'normal', 'default');
});

function gb2_reg_row_html($i, $f) {
    $types = gb2_reg_field_types();
    $n = 'gb_reg[' . $i . ']';
    ob_start(); ?>
    <div class="gbreg-row">
      <div class="gbreg-top">
        <input type="text" class="gbreg-label" name="<?php echo esc_attr($n); ?>[label]" value="<?php echo esc_attr($f['label']); ?>" placeholder="Field label, e.g. Phone number">
        <select class="gbreg-type" name="<?php echo esc_attr($n); ?>[type]">
          <?php foreach ($types as $val => $name) : ?>
            <option value="<?php echo esc_attr($val); ?>" <?php selected($f['type'], $val); ?>><?php echo esc_html($name); ?></option>
          <?php endforeach; ?>
        </select>
        <label class="gbreg-req"><input type="checkbox" name="<?php echo esc_attr($n); ?>[required]" value="1" <?php checked(!empty($f['required'])); ?>> Required</label>
        <span class="gbreg-btns">
          <button type="button" class="button gbreg-up" title="Move up">↑</button>
          <button type="button" class="button gbreg-down" title="Move down">↓</button>
          <button type="button" class="button gbreg-del" title="Remove">✕</button>
        </span>
      </div>
      <div class="gbreg-extra">
        <input type="text" class="gbreg-ph" name="<?php echo esc_attr($n); ?>[placeholder]" value="<?php echo esc_attr($f['placeholder']); ?>" placeholder="Placeholder (optional)">
        <textarea class="gbreg-opts" name="<?php echo esc_attr($n); ?>[options]" rows="3" placeholder="Dropdown options — one per line"><?php echo esc_textarea($f['options']); ?></textarea>
      </div>
    </div>
    <?php
    return ob_get_clean();
}

function gb2_reg_metabox($post) {
    wp_nonce_field('gb_reg_save', 'gb_reg_nonce');
    $saved      = get_post_meta($post->ID, GB_REG_META, true);
    $has_custom = is_array($saved) && !empty($saved);
    $fields     = gb2_get_reg_fields($post->ID);
    ?>
    <style>
      .gbreg-row{border:1px solid #dcdcde;background:#fafafa;padding:10px;margin-bottom:8px}
      .gbreg-top{display:flex;gap:8px;align-items:center;flex-wrap:wrap}
      .gbreg-label{flex:1 1 220px}
      .gbreg-req{white-space:nowrap}
      .gbreg-btns{margin-left:auto;display:flex;gap:4px}
      .gbreg-extra{display:flex;gap:8px;margin-top:8px}
      .gbreg-extra .gbreg-ph{flex:1}
      .gbreg-extra .gbreg-opts{flex:2;display:none}
      .gbreg-row[data-type="select"] .gbreg-opts{display:block}
      .gbreg-row[data-type="checkbox"] .gbreg-ph,
      .gbreg-row[data-type="country"] .gbreg-ph,
      .gbreg-row[data-type="select"] .gbreg-ph{display:none}
    </style>
    <p class="description">
      <?php echo $has_custom
        ? 'Custom form for this event.'
        : 'This event still uses the <strong>default form</strong> (pre-filled below). Edit anything and click Update to make it custom.'; ?>
      The first <em>Email</em> field is used as the reply-to address.
    </p>
    <div id="gbreg-list">
      <?php foreach (array_values($fields) as $i => $f) echo gb2_reg_row_html($i, $f); ?>
    </div>
    <p><button type="button" class="button button-primary" id="gbreg-add">+ Add field</button></p>

    <template id="gbreg-tpl">
      <?php echo gb2_reg_row_html('__i__', ['label' => '', 'type' => 'text', 'required' => 0, 'options' => '', 'placeholder' => '']); ?>
    </template>

    <script>
    (function(){
      var list = document.getElementById('gbreg-list');
      var tpl  = document.getElementById('gbreg-tpl').innerHTML;
      var next = list.children.length + 100;

      function sync(row){ row.setAttribute('data-type', row.querySelector('.gbreg-type').value); }
      Array.prototype.forEach.call(list.children, sync);

      document.getElementById('gbreg-add').addEventListener('click', function(){
        var wrap = document.createElement('div');
        wrap.innerHTML = tpl.replace(/__i__/g, next++);
        var row = wrap.firstElementChild;
        sync(row);
        list.appendChild(row);
        row.querySelector('.gbreg-label').focus();
      });

      list.addEventListener('change', function(e){
        if (e.target.classList.contains('gbreg-type')) sync(e.target.closest('.gbreg-row'));
      });

      list.addEventListener('click', function(e){
        var row = e.target.closest('.gbreg-row'); if (!row) return;
        if (e.target.classList.contains('gbreg-del')) row.remove();
        if (e.target.classList.contains('gbreg-up') && row.previousElementSibling) list.insertBefore(row, row.previousElementSibling);
        if (e.target.classList.contains('gbreg-down') && row.nextElementSibling) list.insertBefore(row.nextElementSibling, row);
      });
    })();
    </script>
    <?php
}

add_action('save_post_gb_event', function ($post_id) {
    if (!isset($_POST['gb_reg_nonce']) || !wp_verify_nonce($_POST['gb_reg_nonce'], 'gb_reg_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $types = array_keys(gb2_reg_field_types());
    $raw   = isset($_POST['gb_reg']) && is_array($_POST['gb_reg']) ? wp_unslash($_POST['gb_reg']) : [];
    $out   = [];
    $used  = [];

    foreach ($raw as $row) {
        $label = isset($row['label']) ? sanitize_text_field($row['label']) : '';
        if ($label === '') continue;

        $type = (isset($row['type']) && in_array($row['type'], $types, true)) ? $row['type'] : 'text';

        $key = str_replace('-', '_', sanitize_title($label));
        if ($key === '') $key = 'field';
        $base = $key; $n = 2;
        while (isset($used[$key])) { $key = $base . '_' . $n++; }
        $used[$key] = true;

        $opts = '';
        if ($type === 'select' && isset($row['options'])) {
            $lines = array_filter(array_map('sanitize_text_field', preg_split('/\r\n|\r|\n/', $row['options'])), 'strlen');
            $opts  = implode("\n", $lines);
        }

        $out[] = [
            'key'         => $key,
            'label'       => $label,
            'type'        => $type,
            'required'    => !empty($row['required']) ? 1 : 0,
            'options'     => $opts,
            'placeholder' => isset($row['placeholder']) ? sanitize_text_field($row['placeholder']) : '',
        ];
    }

    if ($out) update_post_meta($post_id, GB_REG_META, $out);
    else      delete_post_meta($post_id, GB_REG_META);
});

function gb2_reg_forms_for_js() {
    $events = get_posts(['post_type' => 'gb_event', 'posts_per_page' => -1, 'post_status' => 'publish']);
    $out = [];
    foreach ($events as $ev) {
        $fields = [];
        foreach (gb2_get_reg_fields($ev->ID) as $f) {
            $fields[] = [
                'key'         => $f['key'],
                'label'       => $f['label'],
                'type'        => $f['type'],
                'required'    => !empty($f['required']),
                'placeholder' => $f['placeholder'],
                'options'     => $f['options'] !== '' ? preg_split('/\r\n|\r|\n/', $f['options']) : [],
            ];
        }
        $out[(string) $ev->ID] = ['name' => get_the_title($ev), 'fields' => $fields];
    }
    return $out;
}

add_action('wp_ajax_gb_event_register', 'gb_handle_event_register');
add_action('wp_ajax_nopriv_gb_event_register', 'gb_handle_event_register');

function gb_handle_event_register() {
    check_ajax_referer('gb_event_register', 'nonce');

    if (!empty($_POST['gb_website'])) {
        wp_send_json_success(['message' => 'Sent! See you at the event.']);
    }

    $event_id = isset($_POST['eventId']) ? absint($_POST['eventId']) : 0;
    $event    = $event_id ? get_post($event_id) : null;
    if (!$event || $event->post_type !== 'gb_event' || $event->post_status !== 'publish') {
        wp_send_json_error(['message' => 'Event not found.']);
    }

    $input = isset($_POST['f']) && is_array($_POST['f']) ? wp_unslash($_POST['f']) : [];
    $rows  = ['Event' => $event->post_title];
    $reply_email = '';
    $reply_name  = '';

    foreach (gb2_get_reg_fields($event_id) as $f) {
        $val = isset($input[$f['key']]) && is_string($input[$f['key']]) ? trim($input[$f['key']]) : '';
        $req = !empty($f['required']);

        switch ($f['type']) {
            case 'email':
                $val = sanitize_email($val);
                if ($val !== '' && !is_email($val)) wp_send_json_error(['message' => 'Invalid email format.']);
                if ($val !== '' && !$reply_email) $reply_email = $val;
                break;
            case 'number':
                if ($val !== '' && !is_numeric($val)) wp_send_json_error(['message' => $f['label'] . ': must be a number.']);
                break;
            case 'tel':
                $val = preg_replace('/[^0-9+\-\s()]/', '', $val);
                break;
            case 'textarea':
                $val = mb_substr(sanitize_textarea_field($val), 0, 2000);
                break;
            case 'select':
                $allowed = array_map('trim', preg_split('/\r\n|\r|\n/', $f['options']));
                if ($val !== '' && !in_array($val, $allowed, true)) $val = '';
                break;
            case 'checkbox':
                $val = $val === '1' ? 'Yes' : '';
                break;
            default:
                $val = mb_substr(sanitize_text_field($val), 0, 300);
        }

        if ($req && $val === '') {
            wp_send_json_error(['message' => 'Please fill in: ' . $f['label']]);
        }
        if ($val === '') continue;

        $rows[$f['label']] = $f['type'] === 'textarea' ? nl2br(esc_html($val)) : $val;
        if (!$reply_name && in_array($f['key'], ['first_name', 'name', 'full_name', 'nama'], true)) $reply_name = $val;
    }

    $ident    = $reply_email ?: (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'anon');
    $rate_key = 'gb_event_' . md5($event_id . '|' . $ident);
    if (get_transient($rate_key)) {
        wp_send_json_error(['message' => 'Please wait a moment before sending again.']);
    }
    set_transient($rate_key, 1, 60);

    $headers = ['Content-Type: text/html; charset=UTF-8'];
    if ($reply_email) {
        $headers[] = 'Reply-To: ' . ($reply_name ? $reply_name . ' ' : '') . '<' . $reply_email . '>';
    }

    $sent = wp_mail(
        gb2_notify_email(),
        'Event Registration: ' . $event->post_title,
        gb2_email_template('New Event Registration', $rows),
        $headers
    );

    if ($sent) wp_send_json_success(['message' => 'Sent! See you at the event.']);
    wp_send_json_error(['message' => 'Failed to send registration. Please try again later.']);
}