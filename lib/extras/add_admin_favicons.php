<?php

namespace Roots\Sage\Extras;

/**
 * Add favicons for the WP Admin site
 *
 * @return null
 */
add_action('admin_head', __NAMESPACE__ . '\\add_admin_favicons');
add_action('login_head', __NAMESPACE__ . '\\add_admin_favicons');
function add_admin_favicons() { ?>
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://files.dondepauto.co/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://files.dondepauto.co/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://files.dondepauto.co/favicons/favicon-16x16.png">
    <link rel="manifest" href="https://files.dondepauto.co/favicons/manifest.json">
    <link rel="mask-icon" href="https://files.dondepauto.co/favicons/safari-pinned-tab.svg') }}" color="#5">
    <link rel="shortcut icon" href="https://files.dondepauto.co/favicons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="{{ config('dondepauto.name.long') }}">
    <meta name="application-name" content="{{ config('dondepauto.name.long') }}">
    <meta name="msapplication-config" content="https://files.dondepauto.co/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
<?php } ?>
