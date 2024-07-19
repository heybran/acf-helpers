<?php

namespace ACFHelpers;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Rule {
  // Post
  public const POST_TYPE = 'post_type';
  public const POST_TEMPLATE = 'post_template';
  public const POST_CATEGORY = 'post_category';
  public const POST_STATUS = 'post_status';
  public const POST_FORMAT = 'post_format';
  public const POST_TAXONOMY = 'post_taxonomy';
  public const POST = 'post';

  // Page
  public const PAGE_TEMPLATE = 'page_template';
  public const PAGE_TYPE = 'page_type';
  public const PAGE_PARENT = 'page_parent';
  public const PAGE = 'page';

  // User
  public const CURRENT_USER = 'current_user';
  public const CURRENT_USER_ROLE = 'current_user_role';
  public const USER_FORM = 'user_form';
  public const USER_ROLE = 'user_role';

  // Form
  public const TAXONOMY = 'taxonomy';
  public const ATTACHMENT = 'attachment';
  public const COMMENT = 'comment';
  public const WIDGET = 'widget';
  public const NAV_MENU = 'nav_menu';
  public const NAV_MENU_ITEM = 'nav_menu_item';
  public const BLOCK = 'block';
  public const OPTIONS_PAGE = 'options_page';

  protected array $config = [
    'param' => '',
    'operator' => '',
    'value' => '',
  ];

  private function __construct(string $param) {
    $this->config['param'] = $param;
  }

  public static function create(string $param): self {
    return new self($param);
  }

  public function is(string $value): self {
    return $this->_isOrIsNot( '==', trim( $value ) );
  }

  public function isNot(string $value): self {
    return $this->_isOrIsNot( '!=', trim( $value ) );
  }

  private function _isOrIsNot(string $operator, string $value): self {
    $this->config['operator'] = trim( $operator );
    if ( in_array( $this->config['param'], [ self::POST_CATEGORY, self::POST_TAXONOMY ], true ) ) {
      $value = "category:" . $value;
    }
    $this->config['value'] = trim( $value );
    return $this;
  }

  public function save(): array {
    return $this->config;
  }
}
