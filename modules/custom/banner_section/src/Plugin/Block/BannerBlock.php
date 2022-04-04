<?php

namespace Drupal\banner_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'BannerBlock' block.
 *
 * @Block(
 *  id = "banner_block",
 *  admin_label = @Translation("Banner block"),
 * )
 */
class BannerBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $build = [];
    $build['#attached']['library'][] = 'banner_section/jazz_banner';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_site_banner");
      $query->range(0, 1);
      $query->sort('created' , 'DESC'); 
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link' => $node->field_banner_link->value,
        'image' => $node->field_banner_image->entity ? $node->field_banner_image->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_banner',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }
}
