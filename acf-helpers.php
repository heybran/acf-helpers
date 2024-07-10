<?php
/**
 * ACF Helpers
 *
 * @package ACFHelpers
 * @author  heybran
 *
 * @wordpress-plugin
 * Plugin Name:       ACF Helpers
 * Plugin URI:        https://github.com/heybran/acf-helpers
 * Description:       Helper classes for creating ACF Fields.
 * Version:           0.1.0
 * Author:            Brandon Zhang
 * Author URI:        https://heybran.cn
 * Update URI:        https://github.com/heybran/acf-helpers
 * Text Domain:       acf-helpers
 * Domain Path:       /lang
 * Requires PHP:      8.0
 * Requires at least: 6.0
 */

namespace ACFHelpers;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

require_once dirname(__FILE__) . '/includes/class-text-field.php';
