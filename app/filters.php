<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'metablog'));
});

/**
 * Colorful generated avatars instead of the gray mystery-man default.
 */
add_filter('get_avatar_url', function ($url) {
    return add_query_arg('d', 'retro', $url);
});

/**
 * Root-relative URLs on the frontend ( Soil's RelativeURLs approach:
 * https://github.com/roots/soil ). Rewrites home_url() in the final HTML so
 * assets, links and images work from any host — localhost, LAN IP, phone.
 */
add_action('template_redirect', function () {
    if (is_admin() || is_feed() || is_preview() || wp_doing_ajax()) {
        return;
    }
    ob_start(function ($html) {
        $scheme = is_ssl() ? 'https' : 'http';
        $home = parse_url(home_url(), PHP_URL_HOST);
        return preg_replace(
            '#(?:https?:)?//' . preg_quote($home, '#') . '(:\d+)?(/|(?=[?"\'< ]))#',
            '$2',
            $html
        );
    });
});
