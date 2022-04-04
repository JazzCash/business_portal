<?php

namespace Drupal\jazz_payment_section_3\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzPayment3SectionBlock' block.
 *
 * @Block(
 *  id = "jazz_payment3section_block",
 *  admin_label = @Translation("Jazz payment3section block"),
 * )
 */
class JazzPayment3SectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_payment_section_3/jazz_payment_3';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "payment_section_3");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'body' => $node->field_payment_section3_body->value,
        'link' => $node->field_payment_section3_link->value,
        'image' => $node->field_payment_section3_image->entity ? $node->field_payment_section3_image->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_payment_section_3',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
