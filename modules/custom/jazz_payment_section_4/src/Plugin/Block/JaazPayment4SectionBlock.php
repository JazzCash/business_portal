<?php

namespace Drupal\jazz_payment_section_4\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JaazPayment4SectionBlock' block.
 *
 * @Block(
 *  id = "jaaz_payment4section_block",
 *  admin_label = @Translation("Jaaz payment4section block"),
 * )
 */
class JaazPayment4SectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_payment_section_4/jazz_payment_4';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_payment_section_4");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'body' => $node->body->value,
        'link1' => $node->field_jazz_payment_section_4_lin->value,
        'image' => $node->field_jazz_payment_section_4_ima->entity ? $node->field_jazz_payment_section_4_ima->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_payment_section_4',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
