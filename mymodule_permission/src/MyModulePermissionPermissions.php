<?php

namespace Drupal\mymodule_permission;

/**
 * Provides dynamic permissions for nodes of different types.
 */
class MyModulePermissionPermissions {
  /**
   * Returns a list of permissions programmatically built.
   *
   * @return array
   *   An associative array of permission names and descriptions.
   */
  public function permissions() {
    return array(
      "my first prog permission" => array(
        'title' => "This is my first prog permission",
      ),
      "my second prog permission" => array(
        'title' => "This is my second prog permission",
      ),
    );
  }

}
