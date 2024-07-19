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

use ACFHelpers\Fields\DatePicker;
use ACFHelpers\Fields\RichText;
use ACFHelpers\Fields\Taxonomy;
use ACFHelpers\Fields\Text;
use ACFHelpers\Fields\URL;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

require_once dirname(__FILE__) . '/includes/class-acf-group.php';
require_once dirname(__FILE__) . '/includes/class-rule.php';
require_once dirname(__FILE__) . '/includes/class-field.php';
require_once dirname(__FILE__) . '/includes/class-field-text.php';
require_once dirname(__FILE__) . '/includes/class-field-url.php';
require_once dirname(__FILE__) . '/includes/class-field-date-picker.php';
require_once dirname(__FILE__) . '/includes/class-field-rich-text.php';
require_once dirname(__FILE__) . '/includes/class-field-taxonomy.php';

ACFGroup::create('job_group')
  ->title('Custom Fields')
  ->fields([
    Text::create('source')
      ->label('Source')
      ->wrapperWidth(50)
      ->save(),
    URL::create('website')
      ->label('Website')
      ->wrapperWidth(50)
      ->save(),
    Text::create('status')
      ->label('Status')
      ->wrapperWidth(50)
      ->save(),
    Text::create('apply_channel')
      ->label('Apply Channel')
      ->wrapperWidth(50)
      ->save(),
    DatePicker::create('apply_date')
      ->label('Apply Date')
      ->wrapperWidth(50)
      ->save(),
    Taxonomy::create('type')
      ->label('Type')
      ->save(),
    RichText::create('notes')
      ->label('Notes')
      ->save(),
  ])
  ->location([
    [
      Rule::create(Rule::POST_TYPE)->is('job')->save(),
      // Rule::create(Rule::POST_TEMPLATE)->isNot('default')->save(),
      // Rule::create(Rule::POST_CATEGORY)->is('book')->save(),
      // Rule::create(Rule::POST_CATEGORY)->isNot('book')->save(),
    ],
    // [
    //   Rule::create(Rule::POST_CATEGORY)->is('book')->save(),
    //   Rule::create(Rule::BLOCK)->is('faq')->save(),
    // ]
  ])
  ->save();
