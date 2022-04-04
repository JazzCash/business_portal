<?php

namespace Drupal\jazz_client_review_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzClientReviewSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_client_review_section_block",
 *  admin_label = @Translation("Jazz client review section block"),
 * )
 */
class JazzClientReviewSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_client_review_section/jazz_client_review';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_client_review_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'body' => $node->body->value,
        'city' => $node->field_city->value,
        'rating' => $node->field_rating->value,
        'image' => $node->field_client_profile_image->entity ? $node->field_client_profile_image->entity->url() : null,
    ];
    }


     $build['content'] = [
      '#theme' => 'jazz_client_review_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
