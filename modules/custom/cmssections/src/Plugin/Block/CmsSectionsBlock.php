<?php

namespace Drupal\cmssections\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'CmsSectionsBlock' block.
 *
 * @Block(
 *  id = "cms_sections_block",
 *  admin_label = @Translation("Cms sections block"),
 * )
 */
class CmsSectionsBlock extends BlockBase implements ContainerFactoryPluginInterface
{

  /**
   * Drupal\Core\Extension\ModuleHandlerInterface definition.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
  {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->moduleHandler = $container->get('module_handler');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function build()
  {

    $extensionListModule = \Drupal::service('extension.list.module');
    $extensions = $extensionListModule->reset()->getList();


    // d_limit(0, 1, 10);


    $list = [];

    foreach ($extensions as $moduleName => $extension) {
      if ($extension->info['package'] == 'Custom') {
        $list[] = [
          'name' => $moduleName,
          'label' => $extension->info['name'],
          'active' => !!$extension->status
        ];
      }
    }
    $build = [];
    $build['#attached']['library'][] = 'cmssections/cmssections';
    $build['cmslist'] = [
      '#theme'=>'cms_sections_block',
      '#data' => $list
    ];
    return $build;
  }
}
