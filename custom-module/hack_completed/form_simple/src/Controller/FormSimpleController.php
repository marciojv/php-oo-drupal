<?php

namespace Drupal\form_simple\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for form_simple routes.
 */
class FormSimpleController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
