<?php
/**
 * @file
 * Contains \Drupal\mymodule\Controller\MyPageController class.
 */
namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for My Module module.
 */
class MyPageController extends ControllerBase {
  /**
   * Returns markup for our custom page.
   */
  public function customPage() {
    return [
      '#markup' => t('Welcome to my custom page!'),
    ];
  }

  // ...
  public function cats($name) {
    return [
      '#markup' => t('My cats name is: @name', [
        '@name' => $name,
      ]),
    ];
  }

  // We gave an option for this route, saying that the argument is a token for an entity (node) to be load.
  public function node($node = null) {
    return [
      '#markup' => t('The title of this node is: @title', [
        '@title' => $node->getTitle(),
      ]),
    ];
  }
}