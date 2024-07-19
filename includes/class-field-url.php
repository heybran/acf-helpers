<?php

namespace ACFHelpers\Fields;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class URL extends Field {
  private function __construct(string $name) {
    $this->config['type'] = 'url';
    parent::__construct($name);
  }

  public static function create(string $name): self {
    return new self($name);
  }
}
