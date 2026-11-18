<?php
function gb2_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}
add_action('after_setup_theme', 'gb2_setup');

function gb2_enqueue() {
    $dir  = get_template_directory_uri();
    $path = get_template_directory();

    wp_enqueue_style('gb2-fonts', 'https://fonts.googleapis.com/css2?family=Anton&family=Barlow:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap', [], null);

    $base_ver = file_exists($path . '/assets/css/base.css') ? filemtime($path . '/assets/css/base.css') : '2.0.0';
    wp_enqueue_style('gb2-base', $dir . '/assets/css/base.css', ['gb2-fonts'], $base_ver);

    $page_css_list = gb2_page_stylesheet();
    if ($page_css_list) {
        foreach ((array) $page_css_list as $page_css) {
            $page_path = $path . '/assets/css/' . $page_css;
            if (file_exists($page_path)) {
                wp_enqueue_style(
                    'gb2-page-' . str_replace('.css', '', $page_css),
                    $dir . '/assets/css/' . $page_css,
                    ['gb2-base'],
                    filemtime($page_path)
                );
            }
        }
    }

    $ver = $base_ver;
    wp_enqueue_script('gb2-main', $dir . '/assets/js/main.js', [], $ver, true);

    wp_enqueue_script(
        'gb-contact-form',
        $dir . '/assets/js/contact-form.js',
        [],
        $ver,
        true
    );
    wp_localize_script('gb-contact-form', 'gbContact', [
        'ajaxUrl'       => admin_url('admin-ajax.php'),
        'action'        => 'gb_contact_submit',
        'refreshAction' => 'gb_refresh_nonces',
    ]);

    if (is_page('partnership')) {
        wp_enqueue_script('gb-partners', $dir . '/assets/js/partners.js', [], $ver, true);
    }
}
add_action('wp_enqueue_scripts', 'gb2_enqueue');

function gb2_page_stylesheet() {
    if (is_front_page())        return 'page-front.css';
    if (is_page('gym'))         return 'page-gym.css';
    if (is_page('membership'))  return 'page-membership.css';
    if (is_page('menu'))        return 'page-menu.css';
    if (is_page('classes'))     return 'page-classes.css';
    if (is_page('events'))      return 'page-events.css';
    if (is_page('faq'))         return 'page-faq.css';
    if (is_page('journal'))     return 'page-journal.css';
    if (is_page('location'))    return 'page-location.css';
    if (is_page('about'))       return 'page-location.css';
    if (is_page('team'))        return 'page-team.css';
    if (is_page('partnership')) return 'page-partnership.css';
    if (is_page('personal-training')) return ['page-personal-training.css', 'page-team.css'];
    if (is_singular('post'))    return 'page-journal.css'; 
    return null;
}

function gb2_favicon() {
    $favicon = get_template_directory_uri() . '/assets/images/logo-gymnasium.png';
    echo '<link rel="icon" type="image/png" href="' . $favicon . '">' . "\n";
    echo '<link rel="apple-touch-icon" href="' . $favicon . '">' . "\n";
}
add_action('wp_head', 'gb2_favicon');

function gb2_whatsapp_number() {
    return '6281238581815'; 
}
function gb2_whatsapp_url($message = "Hi Gymnasium, I'd like to ask about membership.") {
    return 'https://wa.me/' . gb2_whatsapp_number() . '?text=' . rawurlencode($message);
}

function gb2_notify_email() {
    return ['gymnasiumbali@gmail.com', 'admin@gymnasium-bali.com'];
}

function gb2_email_template($title, $rows) {
    $site_url  = home_url('/');
    $logo_url  = $site_url . 'wp-content/themes/gymnasium-bali/assets/img/logo-wordmark-white.png';
    $photo_url = $site_url . 'wp-content/themes/gymnasium-bali/assets/images/f41faf36-2be4-4da7-abe4-e8dc8fe2a04e.JPG';

    $accent = '#b9a4f0';
    $bg     = '#0d0d0d';
    $card   = '#161616';
    $line   = '#2a2a2a';
    $ash    = '#9a9a9a';

    $rows_html = '';
    foreach ($rows as $label => $value) {
        $rows_html .= '
            <tr>
                <td style="padding:12px 24px;border-bottom:1px solid ' . $line . ';font-family:\'IBM Plex Mono\',Consolas,monospace;font-size:11px;font-weight:600;color:' . $accent . ';text-transform:uppercase;letter-spacing:.08em;white-space:nowrap;vertical-align:top;width:120px;">' . esc_html($label) . '</td>
                <td style="padding:12px 24px;border-bottom:1px solid ' . $line . ';font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#f2f2f2;line-height:1.55;">' . $value . '</td>
            </tr>';
    }

    return '
    <!DOCTYPE html>
    <html>
    <body style="margin:0;padding:28px 16px;background:' . $bg . ';">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:580px;margin:0 auto;background:' . $card . ';border-radius:10px;overflow:hidden;border:1px solid ' . $line . ';">

            <tr>
                <td style="padding:28px 24px 20px;text-align:center;background:#000000;">
                    <img src="' . esc_url($logo_url) . '" alt="Gymnasium Bali" style="height:26px;display:inline-block;">
                </td>
            </tr>

            <tr>
                <td>
                    <img src="' . esc_url($photo_url) . '" alt="" width="580" style="width:100%;height:180px;object-fit:cover;display:block;">
                </td>
            </tr>

            <tr>
                <td style="padding:24px 24px 4px;">
                    <span style="font-family:\'IBM Plex Mono\',Consolas,monospace;font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:' . $accent . ';">Gymnasium Bali</span>
                    <h1 style="margin:6px 0 0;font-family:Anton,Arial,sans-serif;font-weight:400;letter-spacing:.01em;font-size:24px;color:#ffffff;text-transform:uppercase;">' . esc_html($title) . '</h1>
                </td>
            </tr>

            <tr>
                <td style="padding:12px 0 4px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                        ' . $rows_html . '
                    </table>
                </td>
            </tr>

            <tr>
                <td style="padding:18px 24px;background:#000000;">
                    <span style="font-family:\'IBM Plex Mono\',Consolas,monospace;font-size:11px;color:' . $ash . ';letter-spacing:.02em;">Automated email from ' . esc_html(preg_replace('#^https?://#', '', untrailingslashit($site_url))) . '</span>
                </td>
            </tr>

        </table>
    </body>
    </html>';
}

add_action('wp_ajax_gb_refresh_nonces', 'gb_handle_refresh_nonces');
add_action('wp_ajax_nopriv_gb_refresh_nonces', 'gb_handle_refresh_nonces');

function gb_handle_refresh_nonces() {
    wp_send_json_success([
        'contact_nonce' => wp_create_nonce('gb_contact_submit'),
        'event_nonce'   => wp_create_nonce('gb_event_register'),
    ]);
}

add_action('wp_ajax_gb_contact_submit', 'gb_handle_contact_submit');
add_action('wp_ajax_nopriv_gb_contact_submit', 'gb_handle_contact_submit');

function gb_handle_contact_submit() {
    check_ajax_referer('gb_contact_submit', 'nonce');

    $honeypot = isset($_POST['gb_website']) ? trim(wp_unslash($_POST['gb_website'])) : '';
    if (!empty($honeypot)) {
        wp_send_json_success(['message' => 'Terkirim! Kami akan balas secepatnya.']);
    }

    $name    = isset($_POST['gb_name']) ? sanitize_text_field(wp_unslash($_POST['gb_name'])) : '';
    $email   = isset($_POST['gb_email']) ? sanitize_email(wp_unslash($_POST['gb_email'])) : '';
    $message = isset($_POST['gb_message']) ? sanitize_textarea_field(wp_unslash($_POST['gb_message'])) : '';

    if (empty($name) || empty($message) || !is_email($email)) {
        wp_send_json_error(['message' => 'Mohon lengkapi semua field dengan benar.']);
    }

    $rate_key = 'gb_contact_' . md5($email);
    if (get_transient($rate_key)) {
        wp_send_json_error(['message' => 'Tunggu sebentar sebelum mengirim lagi.']);
    }
    set_transient($rate_key, 1, 60);

    $to      = gb2_notify_email();
    $subject = 'Pesan Baru dari Website — ' . $name;
    $body    = gb2_email_template('Pesan Baru dari Website', [
        'Nama'  => $name,
        'Email' => $email,
        'Pesan' => nl2br(esc_html($message)),
    ]);
    $headers = ['Content-Type: text/html; charset=UTF-8', "Reply-To: {$name} <{$email}>"];

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(['message' => 'Terkirim! Kami akan balas secepatnya.']);
    } else {
        wp_send_json_error(['message' => 'Gagal mengirim pesan. Coba lagi nanti.']);
    }

    
}

function gb2_event_register_localize() {
    if ( is_page('events') ) {
        wp_localize_script('gb2-main', 'evAjax', [
            'ajax_url'      => admin_url('admin-ajax.php'),
            'nonce'         => wp_create_nonce('gb_event_register'),
            'refreshAction' => 'gb_refresh_nonces',
            'forms'         => gb2_reg_forms_for_js(),
        ]);
    }
}
add_action('wp_enqueue_scripts', 'gb2_event_register_localize', 20);

require_once get_template_directory() . '/inc/event-form-builder.php';

function gb2_register_event_cpt() {
    $labels = [
        'name'               => 'Events',
        'singular_name'      => 'Event',
        'add_new'            => 'Add New Event',
        'add_new_item'       => 'Add New Event',
        'edit_item'          => 'Edit Event',
        'new_item'           => 'New Event',
        'view_item'          => 'View Event',
        'search_items'       => 'Search Events',
        'not_found'          => 'No events found',
        'not_found_in_trash' => 'No events found in trash',
        'menu_name'          => 'Events',
    ];

    register_post_type('gb_event', [
        'labels'        => $labels,
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-calendar-alt',
        'supports'      => ['title', 'thumbnail'], 
        'has_archive'   => false,
        'rewrite'       => false,
    ]);
}
add_action('init', 'gb2_register_event_cpt');

function gb2_meta_descriptions() {
    return [
        'front'              => 'Discover one of the best gyms in Bali with premium fitness facilities, expert trainers and wellness experiences at Gymnasium Bali.',
        'about'              => 'Discover Gymnasium Bali, a premium fitness club built around performance, wellness and community, helping you Do More, Be More, Live More.',
        'membership'         => 'Find the right gym membership in Bali with flexible options, premium facilities and expert support to help you reach your fitness goals.',
        'gym'                => 'Train at a premium gym in Ubud Bali with Technogym and Matrix equipment, functional fitness facilities and an elevated training environment.',
        'classes'            => 'Join fitness classes in Ubud including HIIT, strength training, boxing and MMA, led by expert coaches in a premium training environment.',
        'events'             => 'Experience fitness events in Bali at Gymnasium, from community workouts to challenges and wellness experiences designed to inspire and connect.',
        'faq'                => 'Frequently asked questions about membership, schedules, and facilities at Gymnasium Bali, Ubud.',
        'team'               => 'Meet the coaching team at Gymnasium Bali — experienced trainers helping you reach your goals in Ubud.',
        'location'           => 'Gymnasium Bali is located at Onyx Park (formerly PARQ Ubud), Jl. Sri Wedari No. 24, Ubud. Open daily 6am–10pm.',
        'menu'               => 'Gymnasium Bali bar menu — healthy food and drink options for before and after your workout.',
        'journal'            => 'Articles and insights on training, recovery, and healthy living from the Gymnasium Bali team in Ubud.',
        'personal-training'  => '1-on-1 personal training at Gymnasium Bali, Ubud — a program tailored to your goals and level.',
        'recovery'           => 'The recovery suite at Gymnasium Bali, Ubud — full recovery facilities to support your training results.',
        'careers'            => 'Careers at Gymnasium Bali, Ubud. Join the team building a serious training culture in Bali.',
        'partnership'        => 'Meet the Ubud businesses that partner with Gymnasium Bali, and find out how your cafe, hotel, coworking space or company can become a partner.',
    ];
}

function gb2_meta_titles() {
    return [
        'front'      => 'Best Gym in Bali | Premium Fitness Club',
        'membership' => 'Gym Memberships Bali | Flexible Fitness Plans',
        'gym'        => 'Premium Gym Ubud Bali | Gymnasium',
        'classes'    => 'Fitness Classes Ubud | Gymnasium Bali',
        'events'     => 'Fitness Events Bali | Gymnasium Bali',
        'about'      => 'Fitness Club Bali | About Gymnasium',
    ];
}

function gb2_custom_document_title($title) {
    $titles = gb2_meta_titles();

    if (is_front_page()) {
        return $titles['front'];
    }

    if (is_page()) {
        $page = get_queried_object();
        if ($page && isset($page->post_name) && isset($titles[$page->post_name])) {
            return $titles[$page->post_name];
        }
    }

    return $title;
}
add_filter('pre_get_document_title', 'gb2_custom_document_title');

function gb2_get_current_meta_description() {
    $descriptions = gb2_meta_descriptions();

    if (is_front_page()) {
        return $descriptions['front'];
    }

    global $post;
    if ($post && isset($post->post_name) && isset($descriptions[$post->post_name])) {
        return $descriptions[$post->post_name];
    }

    if (is_singular('post')) {
        return wp_trim_words(get_the_excerpt(), 30, '...');
    }

    return $descriptions['front'];
}

function gb2_seo_meta_tags() {
    $description = gb2_get_current_meta_description();
    $title       = wp_get_document_title();
    $url         = is_front_page() ? home_url('/') : get_permalink();
    $site_name   = get_bloginfo('name') ?: 'Gymnasium Bali';

    $default_image = get_template_directory_uri() . '/assets/img/banner-gymnasium.png';
    $image = $default_image;
    if (is_singular() && has_post_thumbnail()) {
        $thumb_id = get_post_thumbnail_id();
        $thumb    = wp_get_attachment_image_src($thumb_id, 'large');
        if ($thumb) {
            $image = $thumb[0];
        }
    }

    echo "\n" . '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";

    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta property="og:locale" content="en_US">' . "\n";

    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
}
add_action('wp_head', 'gb2_seo_meta_tags', 1);

function gb2_local_business_schema() {
    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'ExerciseGym',
        'name'        => 'Gymnasium Bali',
        'image'       => get_template_directory_uri() . '/assets/img/banner-gymnasium.png',
        'url'         => home_url('/'),
        'telephone'   => '+62-812-3858-1815',
        'email'       => 'gymnasiumbali@gmail.com',
        'priceRange'  => '$$',
        'address'     => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Onyx Park, Jl. Sri Wedari No. 24',
            'addressLocality' => 'Tegallantang, Ubud',
            'addressRegion'   => 'Gianyar Regency, Bali',
            'postalCode'      => '80571',
            'addressCountry'  => 'ID',
        ],
        'geo'         => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => -8.48376909155742,
            'longitude' => 115.26561497501251,
        ],
        'openingHoursSpecification' => [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
            'opens'     => '06:00',
            'closes'    => '22:00',
        ],
        'sameAs' => [
            'https://instagram.com/gymnasium_bali',
        ],
        'aggregateRating' => [
            '@type'       => 'AggregateRating',
            'ratingValue' => '4.8',
            'reviewCount' => '1117',
        ],
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}
add_action('wp_head', 'gb2_local_business_schema', 2);

function gb2_organization_schema() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => 'Gymnasium Bali',
        'url'      => home_url('/'),
        'logo'     => get_template_directory_uri() . '/assets/images/logo-gymnasium.png',
        'sameAs'   => [
            'https://instagram.com/gymnasium_bali',
        ],
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}
add_action('wp_head', 'gb2_organization_schema', 3);

add_action('wp_ajax_gb_promo_nonce', 'gb_handle_promo_nonce');
add_action('wp_ajax_nopriv_gb_promo_nonce', 'gb_handle_promo_nonce');
function gb_handle_promo_nonce() {
    nocache_headers();
    wp_send_json_success(['nonce' => wp_create_nonce('gb_promo_claim')]);
}

function gb2_generate_promo_code($existing = []) {
    $chars = 'ABCDEFGHJKMNPQRSTUVWXYZ23456789';
    do {
        $code = 'GB15-';
        for ($i = 0; $i < 6; $i++) {
            $code .= $chars[random_int(0, strlen($chars) - 1)];
        }
    } while (isset($existing[$code]));
    return $code;
}

add_action('wp_ajax_gb_promo_claim', 'gb_handle_promo_claim');
add_action('wp_ajax_nopriv_gb_promo_claim', 'gb_handle_promo_claim');

function gb_handle_promo_claim() {
    if (!check_ajax_referer('gb_promo_claim', 'nonce', false)) {
        wp_send_json_error(['message' => 'Session expired. Please refresh the page and try again.']);
    }

    $honeypot = isset($_POST['website']) ? trim(wp_unslash($_POST['website'])) : '';
    if ($honeypot !== '') {
        wp_send_json_success(['code' => 'GB15-XXXXXX']);
    }

    $name  = isset($_POST['name'])  ? sanitize_text_field(wp_unslash($_POST['name']))  : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';

    $digits = preg_replace('/\D+/', '', $phone);
    if (strpos($digits, '0') === 0) {
        $digits = '62' . substr($digits, 1);
    }

    if ($name === '' || strlen($digits) < 8 || strlen($digits) > 15) {
        wp_send_json_error(['message' => 'Please enter your name and a valid WhatsApp number.']);
    }

    $ip_key = 'gb_promo_ip_' . md5($_SERVER['REMOTE_ADDR'] ?? '');
    if (get_transient($ip_key)) {
        wp_send_json_error(['message' => 'Please wait a moment before trying again.']);
    }
    set_transient($ip_key, 1, 30);

    $claims = get_option('gb_promo_claims', []);
    if (!is_array($claims)) $claims = [];

    foreach ($claims as $existing_code => $c) {
        if (isset($c['phone_key']) && $c['phone_key'] === $digits) {
            wp_send_json_success(['code' => $existing_code, 'existing' => true]);
        }
    }

    $code = gb2_generate_promo_code($claims);
    $time = (new DateTime('now', wp_timezone()))->format('d M Y, H:i');

    $claims[$code] = [
        'name'      => $name,
        'phone'     => $phone,
        'phone_key' => $digits,
        'time'      => $time,
    ];
    update_option('gb_promo_claims', $claims, false);

    $wa_link = 'https://wa.me/' . $digits;
    $body = gb2_email_template('New 15% Promo Claim', [
        'Promo Code' => '<strong style="font-family:Consolas,monospace;font-size:18px;letter-spacing:2px;color:#ffffff;">' . esc_html($code) . '</strong>',
        'Name'       => esc_html($name),
        'WhatsApp'   => '<a href="' . esc_url($wa_link) . '" style="color:#b9a4f0;">' . esc_html($phone) . '</a>',
        'Claimed At' => esc_html($time),
        'Offer'      => '15% off — Gymnasium partnership promotion',
    ]);

    $subject = 'Promo Claim 15%: ' . $code . ' — ' . $name;
    $headers = ['Content-Type: text/html; charset=UTF-8'];

    $sent = wp_mail(['gymnasiumbali@gmail.com', 'admin@gymnasium-bali.com'], $subject, $body, $headers);
    $claims[$code]['mail'] = $sent ? 'sent' : 'FAILED';
    update_option('gb_promo_claims', $claims, false);

    wp_send_json_success(['code' => $code]);
}

add_action('admin_menu', function () {
    add_management_page('Promo Claims', 'Promo Claims', 'manage_options', 'gb-promo-claims', 'gb2_promo_claims_page');
});
function gb2_promo_claims_page() {
    if (isset($_POST['gb_promo_reset']) && check_admin_referer('gb_promo_reset')) {
        delete_option('gb_promo_claims');
        echo '<div class="notice notice-success"><p>Semua klaim sudah dihapus.</p></div>';
    }

    $claims = array_reverse(get_option('gb_promo_claims', []), true);
    echo '<div class="wrap"><h1>Promo Claims (' . count($claims) . ')</h1>';
    echo '<table class="widefat striped"><thead><tr><th>Kode</th><th>Nama</th><th>WhatsApp</th><th>Waktu</th><th>Email</th></tr></thead><tbody>';
    if (!$claims) {
        echo '<tr><td colspan="5">Belum ada klaim.</td></tr>';
    }
    foreach ($claims as $code => $c) {
        echo '<tr><td><code>' . esc_html($code) . '</code></td><td>' . esc_html($c['name']) . '</td><td><a href="https://wa.me/' . esc_attr($c['phone_key']) . '" target="_blank">' . esc_html($c['phone']) . '</a></td><td>' . esc_html($c['time']) . '</td><td>' . esc_html($c['mail'] ?? '-') . '</td></tr>';
    }
    echo '</tbody></table>';

    echo '<form method="post" style="margin-top:20px" onsubmit="return confirm(\'Hapus SEMUA klaim promo?\')">';
    wp_nonce_field('gb_promo_reset');
    echo '<button type="submit" name="gb_promo_reset" class="button button-secondary">Reset semua klaim</button>';
    echo '</form></div>';
}

add_action('wp_ajax_gb_partner_submit', 'gb_handle_partner_submit');
add_action('wp_ajax_nopriv_gb_partner_submit', 'gb_handle_partner_submit');

function gb_handle_partner_submit() {
    check_ajax_referer('gb_contact_submit', 'nonce');

    $honeypot = isset($_POST['gb_website']) ? trim(wp_unslash($_POST['gb_website'])) : '';
    if ($honeypot !== '') {
        wp_send_json_success(['message' => 'Sent']);
    }

    $f = function ($key) {
        return isset($_POST[$key]) ? sanitize_text_field(wp_unslash($_POST[$key])) : '';
    };
    $business = $f('pt_business');
    $type     = $f('pt_type');
    $name     = $f('pt_name');
    $email    = isset($_POST['pt_email']) ? sanitize_email(wp_unslash($_POST['pt_email'])) : '';
    $phone    = $f('pt_phone');
    $link     = $f('pt_link');
    $message  = isset($_POST['pt_message']) ? sanitize_textarea_field(wp_unslash($_POST['pt_message'])) : '';

    if ($business === '' || $name === '' || !is_email($email)) {
        wp_send_json_error(['message' => 'Please fill in your business name, your name and a valid email.']);
    }

    $rate_key = 'gb_partner_' . md5($email);
    if (get_transient($rate_key)) {
        wp_send_json_error(['message' => 'Please wait a moment before sending again.']);
    }
    set_transient($rate_key, 1, 60);

    $enquiries = get_option('gb_partner_enquiries', []);
    if (!is_array($enquiries)) $enquiries = [];

    $prefix = strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', remove_accents($business)), 0, 6));
    if ($prefix === '') $prefix = 'PARTNR';
    do {
        $id = 'PT-' . $prefix . '-' . strtoupper(wp_generate_password(4, false, false));
    } while (isset($enquiries[$id]));
    $time = (new DateTime('now', wp_timezone()))->format('d M Y, H:i');

    $enquiries[$id] = [
        'business' => $business,
        'type'     => $type,
        'name'     => $name,
        'email'    => $email,
        'phone'    => $phone,
        'link'     => $link,
        'message'  => $message,
        'time'     => $time,
    ];
    update_option('gb_partner_enquiries', $enquiries, false);

    $rows = [
        'Enquiry ID' => '<strong style="font-family:Consolas,monospace;letter-spacing:1px;color:#ffffff;">' . esc_html($id) . '</strong>',
        'Business'  => esc_html($business),
        'Type'      => esc_html($type ?: '-'),
        'Contact'   => esc_html($name),
        'Email'     => '<a href="mailto:' . esc_attr($email) . '" style="color:#b9a4f0;">' . esc_html($email) . '</a>',
        'WhatsApp'  => $phone ? esc_html($phone) : '-',
        'Website'   => $link ? esc_html($link) : '-',
        'Message'   => $message ? nl2br(esc_html($message)) : '-',
        'Sent At'   => esc_html($time),
    ];

    $body    = gb2_email_template('New Partnership Enquiry', $rows);
    $subject = 'Partnership enquiry: ' . $business . ' (' . $id . ')';
    $headers = ['Content-Type: text/html; charset=UTF-8', "Reply-To: {$name} <{$email}>"];

    $sent = wp_mail(gb2_notify_email(), $subject, $body, $headers);
    $enquiries[$id]['mail'] = $sent ? 'sent' : 'FAILED';
    update_option('gb_partner_enquiries', $enquiries, false);

    wp_send_json_success(['message' => 'Sent']);
}

add_action('admin_menu', function () {
    add_management_page('Partner Enquiries', 'Partner Enquiries', 'manage_options', 'gb-partner-enquiries', 'gb2_partner_enquiries_page');
});

function gb2_partner_enquiries_page() {
    if (isset($_POST['gb_partner_reset']) && check_admin_referer('gb_partner_reset')) {
        delete_option('gb_partner_enquiries');
        echo '<div class="notice notice-success"><p>Semua enquiry sudah dihapus.</p></div>';
    }

    $items = array_reverse((array) get_option('gb_partner_enquiries', []), true);

    echo '<div class="wrap"><h1>Partner Enquiries (' . count($items) . ')</h1>';
    echo '<table class="widefat striped"><thead><tr><th>Ref</th><th>Waktu</th><th>Bisnis</th><th>Tipe</th><th>Kontak</th><th>Email</th><th>WhatsApp</th><th>Website / IG</th><th>Pesan</th><th>Email terkirim</th></tr></thead><tbody>';

    if (!$items) {
        echo '<tr><td colspan="10">Belum ada enquiry.</td></tr>';
    }

    foreach ($items as $ref => $c) {
        $digits = preg_replace('/\D+/', '', $c['phone'] ?? '');
        if (strpos($digits, '0') === 0) {
            $digits = '62' . substr($digits, 1);
        }
        $wa_cell = (strlen($digits) >= 8)
            ? '<a href="https://wa.me/' . esc_attr($digits) . '" target="_blank">' . esc_html($c['phone']) . '</a>'
            : esc_html($c['phone'] ?? '-');

        $link = $c['link'] ?? '';
        $link_cell = preg_match('#^https?://#i', $link)
            ? '<a href="' . esc_url($link) . '" target="_blank" rel="noopener">' . esc_html($link) . '</a>'
            : esc_html($link ?: '-');

        echo '<tr>'
            . '<td><code>' . esc_html($ref) . '</code></td>'
            . '<td>' . esc_html($c['time'] ?? '-') . '</td>'
            . '<td><strong>' . esc_html($c['business'] ?? '-') . '</strong></td>'
            . '<td>' . esc_html($c['type'] ?: '-') . '</td>'
            . '<td>' . esc_html($c['name'] ?? '-') . '</td>'
            . '<td><a href="mailto:' . esc_attr($c['email'] ?? '') . '">' . esc_html($c['email'] ?? '-') . '</a></td>'
            . '<td>' . $wa_cell . '</td>'
            . '<td>' . $link_cell . '</td>'
            . '<td>' . nl2br(esc_html($c['message'] ?: '-')) . '</td>'
            . '<td>' . esc_html($c['mail'] ?? '-') . '</td>'
            . '</tr>';
    }
    echo '</tbody></table>';

    echo '<form method="post" style="margin-top:20px" onsubmit="return confirm(\'Hapus SEMUA enquiry partner?\')">';
    wp_nonce_field('gb_partner_reset');
    echo '<button type="submit" name="gb_partner_reset" class="button button-secondary">Reset semua enquiry</button>';
    echo '</form></div>';
}