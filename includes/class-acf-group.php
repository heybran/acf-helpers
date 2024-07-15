<?php

namespace ACFHelpers;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class ACFGroup {
  protected array $config = [
    'key' => '',
    'title' => '',
    'fields' => [],
    'location' => [],
    'menu_order' => 0, // default, field groups with a lower order will appear first
    // Alternative values:
    // 'position' => 'acf_after_title', // doesn't seem to work
    // 'side' => 'side',
    'position' => 'normal', // default
    'style' => 'default', // default
    // Alternative values:
    // 'label_placement' => 'left',
    'label_placement' => 'top', // default
    // Alternative values:
    // 'instruction_placement' => 'field',
    'instruction_placement' => 'label', // default
    'hide_on_screen' => '', // default
    'active' => true, // default
    'show_in_rest' => 0, // default
    'description' => '', // default, shown in field group list only
  ];

  private function __construct(string $key) {
    $this->config['key'] = $key;
  }

  public static function create(string $key): self {
    return new self($key);
  }

  public function title(string $title): self {
    $this->config['title'] = $title;
    return $this;
  }

  public function fields(array $fields): self {
    $this->config['fields'] = $fields;
    return $this;
  }

  public function location(array $location): self {
    $this->config['location'] = $location;
    return $this;
  }

  public function menuOrder(int $menuOrder): self {
    $this->config['menu_order'] = $menuOrder;
    return $this;
  }

  public function position(string $position) {
    $this->config['position'] = $position;
    return $this;
  }

  public function style(string $style) {
    $this->config['style'] = $style;
    return $this;
  }

  public function labelPlacement(string $labelPlacement): self {
    $this->config['mlabel_placement'] = $labelPlacement;
    return $this;
  }

  public function instructionPlacement(string $instructionPlacement): self {
    $this->config['instruction_placement'] = $instructionPlacement;
    return $this;
  }

  public function hideOnScreen(string $hideOnScreen): self {
    $this->config['hide_on_screen'] = $hideOnScreen;
    return $this;
  }

  public function showInRest(int $showInRest): self {
    $this->config['show_in_rest'] = $showInRest;
    return $this;
  }

  public function active(bool $active): self {
    $this->config['active'] = $active;
    return $this;
  }

  public function description(string $description): self {
    $this->config['description'] = $description;
    return $this;
  }

  public function save(): void {
    add_action( 'acf/include_fields', function() {
      if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    		return;
     	}

      acf_add_local_field_group( $this->config );
    } );
  }
}
