<?php

namespace Drupal\jazz_get_started_now_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzGetStartedNowSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_get_started_now_section_block",
 *  admin_label = @Translation("Jazz get started now section block"),
 * )
 */
class JazzGetStartedNowSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_get_started_now_section/jazz_get_started';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_get_started_now_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'serial' => $node->field_get_started_section_serial->value,
        'link' => $node->field_get_started_section_link->value,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_get_started_now_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
