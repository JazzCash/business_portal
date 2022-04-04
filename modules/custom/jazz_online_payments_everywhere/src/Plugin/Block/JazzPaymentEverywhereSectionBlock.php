<?php

namespace Drupal\jazz_online_payments_everywhere\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzPaymentEverywhereSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_payment_everywhere_section_block",
 *  admin_label = @Translation("Jazz payment everywhere section block"),
 * )
 */
class JazzPaymentEverywhereSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_online_payments_everywhere/jazz_online_payment';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_payments_everywhere_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'image' => $node->field_payment_everywhere_image->entity ? $node->field_payment_everywhere_image->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_online_payments_everywhere',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
