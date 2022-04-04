<?php

namespace Drupal\jazz_clients\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzClientsBlock' block.
 *
 * @Block(
 *  id = "jazz_clients_block",
 *  admin_label = @Translation("Jazz clients block"),
 * )
 */
class JazzClientsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_clients/jazz_client';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_clients");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'image' => $node->field_jazz_client_image->entity ? $node->field_jazz_client_image->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_clients',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
