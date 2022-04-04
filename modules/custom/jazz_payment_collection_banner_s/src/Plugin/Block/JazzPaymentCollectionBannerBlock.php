<?php

namespace Drupal\jazz_payment_collection_banner_s\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzPaymentCollectionBannerBlock' block.
 *
 * @Block(
 *  id = "jazz_payment_collection_banner_block",
 *  admin_label = @Translation("Jazz payment collection banner block"),
 * )
 */
class JazzPaymentCollectionBannerBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_payment_collection_banner_s/jazz_payment_collection_banner';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "payment_collection_banner_sectio");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link1' => $node->field_payment_collection_link_1->value,
        'link2' => $node->field_payment_collection_link_2->value,
        'image' => $node->field_payment_collection_banner_->entity ? $node->field_payment_collection_banner_->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_payment_collection_banner_s',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
