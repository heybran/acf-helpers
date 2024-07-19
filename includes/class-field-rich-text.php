<?php

namespace ACFHelpers\Fields;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class RichText extends Field {
  private function __construct(string $name) {
    $this->config['type'] = 'wysiwyg';
    $this->config['tabs'] = 'all';
    $this->config['toolbar'] = 'full';
    $this->config['media_upload'] = 1;
    $this->config['delay'] = 0;
    parent::__construct($name);
  }

  public static function create(string $name): self {
    return new self($name);
  }

  public function tabs(string $tabs): self {
    $this->config['tabs'] = trim($tabs);
    return $this;
  }

  public function toolbar(string $toolbar): self {
    $this->config['toolbar'] = trim($toolbar);
    return $this;
  }

  public function mediaUpload(int|string $mediaUpload): self {
    $this->config['media_upload'] = (int) trim($mediaUpload);
    return $this;
  }

  public function delay(int|string $delay): self {
    $this->config['delay'] = (int) trim($delay);
    return $this;
  }
}
