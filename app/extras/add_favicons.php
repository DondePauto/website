<?php

namespace App\Extras;

/**
 * Add favicons for the WP Admin site
 *
 * @return null
 */
add_action('login_head', __NAMESPACE__ . '\\add_favicons');
add_action('admin_head', __NAMESPACE__ . '\\add_favicons');
add_action('wp_head', __NAMESPACE__ . '\\add_favicons');
function add_favicons() { ?>
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="180x180" href="https://files.dondepauto.co/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://files.dondepauto.co/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://files.dondepauto.co/favicons/favicon-16x16.png">
    <link rel="manifest" href="https://files.dondepauto.co/favicons/site.webmanifest">
    <link rel="mask-icon" href="https://files.dondepauto.co/favicons/safari-pinned-tab.svg" color="#00aeef">
    <link rel="shortcut icon" href="https://files.dondepauto.co/favicons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="D&oacute;ndePauto.CO">
    <meta name="application-name" content="D&oacute;ndePauto.CO">
    <meta name="msapplication-TileColor" content="#00aeef">
    <meta name="msapplication-TileImage" content="https://files.dondepauto.co/favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="https://files.dondepauto.co/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
<?php } ?>
