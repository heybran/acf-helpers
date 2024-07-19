<?php

namespace ACFHelpers\Fields;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class DatePicker extends Field {
  private function __construct(string $name) {
    $this->config['type'] = 'date_picker';
    $this->config['display_format'] = 'd/m/Y';
    $this->config['return_format'] = 'd/m/Y';
    $this->config['first_day'] = 1;
    parent::__construct($name);
  }

  public static function create(string $name): self {
    return new self($name);
  }

  public function displayFormat(string $format): self {
    $this->config['display_format'] = trim($format);
    return $this;
  }

  public function returnFormat(string $format): self {
    $this->config['return_format'] = trim($format);
    return $this;
  }

  public function firstDay(int|string $day): self {
    $this->config['first_day'] = (int) trim($day);
    return $this;
  }
}
