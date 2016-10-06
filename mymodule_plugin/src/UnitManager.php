<?php
/**
 * @file
 * Contains \Drupal\mymodule_plugin\UnitManager.
 */
namespace Drupal\mymodule_plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\Discovery\YamlDiscovery;
use Drupal\Core\Plugin\Discovery\ContainerDerivativeDiscoveryDecorator;

class UnitManager extends DefaultPluginManager {
  /**
   * Default values for each unit plugin.
   *
   * @var array
   */
  protected $defaults = [
    'id' => '',
    'label' => '',
    'unit' => '',
    'factor' => 0.00,
    'type' => '',
    'class' => 'Drupal\mymodule_plugin\Unit',
  ];

  /**
   * Constructs a new \Drupal\mymodule_plugin\UnitManager object.
   *
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   * Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   * The module handler to invoke the alter hook with.
   */
  public function __construct(CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    $this->moduleHandler = $module_handler;
    // Modules implementing hook_physical_unit_alter in the .module file have the ability to modify all the discovered plugin de nitions.
    // Modules have the ability to remove defined plugin entries or alter any information provided for the annotation definition.
    $this->alterInfo('physical_unit');
    /*
     * The $cache_backend variable is passed to the constructor. The second parameter provides the cache key. The cache key will have the current language code added as a suf x.
     * There is an optional third parameter that takes an array of strings to represent cache tags that will cause the plugin de nitions to be cleared.
     * This is an advanced feature and plugin de nitions should normally be cleared through the manager's clearCachedDefinitions method.
     * The cache tags allow the plugin de nitions to be cleared when a relevant cache is cleared as well.
     */
    $this->setCacheBackend($cache_backend, 'physical_unit_plugins');
  }

  /**
   * {@inheritdoc}
   */
  protected function getDiscovery() {
    if (!isset($this->discovery)) {
      $this->discovery = new YamlDiscovery('units', $this->moduleHandler->getModuleDirectories());
      $this->discovery = new ContainerDerivativeDiscoveryDecorator($this->discovery);
    }
    return $this->discovery;
  }
}