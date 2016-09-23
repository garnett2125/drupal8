<?php
/**
 * @file
 * Contains \Drupal\example\Controller\ExampleController.
 */

namespace Drupal\mymodule_permission\Controller;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Builds an example page.
 */
class MyPageCustomAccessController {

  /**
   * Checks access for a specific request.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   */
  public function access(AccountInterface $account) {
    // Check access, use AccessResult to do so.
    $user = \Drupal::currentUser();
    return AccessResult::allowedIf($user->id() == 1);
  }
}