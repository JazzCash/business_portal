<?php

namespace Drupal\jazz_payment_method_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzPaymentMethodSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_payment_method_section_block",
 *  admin_label = @Translation("Jazz payment method section block"),
 * )
 */
class JazzPaymentMethodSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_payment_method_section/jazz_payment_method';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_payment_methods");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'body' => $node->body->value,
        'image' => $node->field_jazz_payment_image->entity ? $node->field_jazz_payment_image->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_payment_method_section',
      '#data' => [
          'content' => $content
      ],
  ];


    return $build;
  }

}
