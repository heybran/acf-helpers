<?php

namespace ACFHelpers\Fields;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Taxonomy extends Field {
  private function __construct(string $name) {
    $this->config['type'] = 'taxonomy';
    $this->config['taxonomy'] = 'category';
    $this->config['add_term'] = 1;
    $this->config['save_terms'] = 0;
    $this->config['load_terms'] = 0;
    $this->config['return_format'] = 'id';
    $this->config['field_type'] = 'checkbox';
    $this->config['multiple'] = 0;
    $this->config['allow_null'] = 0;
    parent::__construct($name);
  }

  public static function create(string $name): self {
    return new self($name);
  }

  public function taxonomy(string $taxonomy): self {
    $this->config['taxonomy'] = trim($taxonomy);
    return $this;
  }

  public function addTerm(string|int $value): self {
    $this->config['add_term'] = (int) trim($value);
    return $this;
  }

  public function saveTerms(int|string $value): self {
    $this->config['save_terms'] = (int) trim($value);
    return $this;
  }

  public function loadTerms(int|string $value): self {
    $this->config['load_terms'] = (int) trim($value);
    return $this;
  }

  public function returnFormat(string $value): self {
    $this->config['return_format'] = trim($value);
    return $this;
  }

  public function fieldType(string $value): self {
    $this->config['field_type'] = trim($value);
    return $this;
  }

  public function multiple(int|string $value): self {
    $this->config['multiple'] = (int) trim($value);
    return $this;
  }

  public function allowNull(int|string $value): self {
    $this->config['allow_null'] = (int) trim($value);
    return $this;
  }
}
