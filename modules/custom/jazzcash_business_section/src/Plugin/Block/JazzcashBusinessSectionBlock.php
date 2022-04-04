<?php

namespace Drupal\jazzcash_business_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzcashBusinessSectionBlock' block.
 *
 * @Block(
 *  id = "jazzcash_business_section_block",
 *  admin_label = @Translation("Jazzcash business section block"),
 * )
 */
class JazzcashBusinessSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazzcash_business_section/jazz_business';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazzcash_business");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'body' => $node->body->value,
        'link' => $node->field_jazzcash_business_link->value,
    ];
    }

    $build['content'] = [
      '#theme' => 'jazzcash_business_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
