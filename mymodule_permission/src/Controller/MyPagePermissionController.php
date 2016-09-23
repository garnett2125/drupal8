<?php
/**
 * @file
 * Contains \Drupal\mymodule_permission\Controller\MyPageController class.
 */
namespace Drupal\mymodule_permission\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for My Module module.
 */
class MyPagePermissionController extends ControllerBase {
  /**
   * Returns markup for our custom page.
   */
  public function customPage() {
    return [
      '#markup' => t('Welcome to my custom page with custom permission!'),
    ];
  }
}