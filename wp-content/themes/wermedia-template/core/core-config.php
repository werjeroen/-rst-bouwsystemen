<?php 


/**
 * Custom helper class
 */
require_once(__DIR__ . '/helpers/class-template.php');

/**
 * Core functionality for websites.
 */
require_once(__DIR__ . '/config/actions.php');
require_once(__DIR__ . '/config/supports.php');
require_once(__DIR__ . '/config/filters.php');
require_once(__DIR__ . '/config/functions.php');

/**
 * Tinymce plugins
 */
require_once(__DIR__ . '/config/tinymce/table.php');
require_once(__DIR__ . '/config/tinymce/wplink.php');

/**
 * Custom login page
 */
// require_once(__DIR__ . '/login/login.php');

/**
 * Clean up the dashboard and add a custom 'help me' widget
 */
require_once(__DIR__ . '/dashboard/reset.php');
require_once(__DIR__ . '/dashboard/widgets.php');

/**
 * Clean up the dashboard and add a custom 'help me' widget
 */
require_once(__DIR__ . '/plugins/plugin-activation.php');
require_once(__DIR__ . '/plugins/plugin-list.php');

/**
 * Custom navigation walker
 */
require_once(__DIR__ . '/navigation/walker.php');

/**
 * Custom post types
 */
// require_once(__DIR__ . '/custom-post-types/cpt-[naam].php');
