<?php

namespace Drupal\jazz_payment_banner_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzPaymentSectionBanner' block.
 *
 * @Block(
 *  id = "jazz_payment_section_banner",
 *  admin_label = @Translation("Jazz payment section banner"),
 * )
 */
class JazzPaymentSectionBanner extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_payment_banner_section/jazz_payment_banner';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_payment_banner_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link1' => $node->field_payment_section_links_1->value,
        'link2' => $node->field_payment_section_links_2->value,
        'image' => $node->field_payment_section_banner_ima->entity ? $node->field_payment_section_banner_ima->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_payment_banner_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
