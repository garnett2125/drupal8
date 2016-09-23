<?php
namespace Drupal\mymodule\Routing;

use Symfony\Component\Routing\Route;

class CustomRoutes {
  public function routes() {
    $routes = [];

    // Create mypage route programmatically
    $routes['mymodule.mypageprogrammatically'] = new Route(
      // Path definition
      'mypageprogrammatically',
      // Route defaults
      [
        '_controller' => '\Drupal\mymodule\Controller\MyPageController::customPage',
        '_title' => 'My custom page',
      ],
      // Route requirements
      [
        '_permission' => 'access content',
      ]
    );
    return $routes;
  }
}