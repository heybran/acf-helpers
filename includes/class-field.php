<?php

namespace ACFHelpers\Fields;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Example:
 * URL::create('first_name')
 *   ->label('First Name')
 *   ->ariaLabel('Enter your first name')
 *   ->instructions('Please enter your first name, maximum length of 50 characters')
 *   ->required(1)
 *   ->conditionalLogic(0)
 *   ->wrapperWidth(50)
 *   ->wrapperClass('first-name')
 *   ->wrapperID('first-name')
 *   ->maxlength(20)
 *   ->placeholder('Your first name')
 *   ->prepend('Before input')
 *   ->append('After input')
 *   ->save(),
 */
class Field {
  protected array $config = [
    'key' => '',
    'label' => '',
    'name' => '',
    'aria-label' => '',
    'type' => '',
    'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
    'wrapper' => [
      'width' => '',
      'class' => '',
      'id' => '',
    ],
    'default_value' => '',
    'maxlength' => '',
    'placeholder' => '',
    'prepend' => '',
    'append' => '',
  ];

  protected function __construct(string $name) {
    $this->config['name'] = $name;
    $this->config['key'] = $name;
  }

  public static function create(string $name): self {
    return new self($name);
  }

  public function label(string $label): self {
    $this->config['label'] = $label;
    return $this;
  }

  public function ariaLabel(string $ariaLabel): self {
    $this->config['aria-label'] = $ariaLabel;
    return $this;
  }

  public function instructions(string $instructions) {
    $this->config['instructions'] = $instructions;
    return $this;
  }

  public function required(bool|int $required): self {
    $this->config['required'] = (bool) $required;
    return $this;
  }

  public function conditionalLogic(int|array $conditionalLogic): self {
    $this->config['conditional_logic'] = $conditionalLogic;
    return $this;
  }

  public function wrapperWidth(string|int $wrapperWidth): self {
    $this->config['wrapper']['width'] = (string) $wrapperWidth;
    return $this;
  }

  public function wrapperClass(string$wrapperClass): self {
    $this->config['wrapper']['class'] = $wrapperClass;
    return $this;
  }

  public function wrapperID(string $wrapperID): self {
    $this->config['wrapper']['id'] = $wrapperID;
    return $this;
  }

  public function defaultValue(string $defaultValue): self {
    $this->config['default_value'] = $defaultValue;
    return $this;
  }

  public function maxlength(string|int $maxlength): self {
    $this->config['maxlength'] = (int) $maxlength;
    return $this;
  }

  public function placeholder(string $placeholder): self {
    $this->config['placeholder'] = $placeholder;
    return $this;
  }

  public function prepend(string $prepend): self {
    $this->config['prepend'] = $prepend;
    return $this;
  }

  public function append(string $append): self {
    $this->config['append'] = $append;
    return $this;
  }

  public function save(): array {
    return $this->config;
  }
}
