<?php

namespace Drupal\jazz_qr_banner_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzQrBannerSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_qr_banner_section_block",
 *  admin_label = @Translation("Jazz qr banner section block"),
 * )
 */
class JazzQrBannerSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_qr_banner_section/jazz_qr_banner';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_qr_banner_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link1' => $node->field_qr_banner_link_1->value,
        'link2' => $node->field_qr_banner_link_2->value,
        'image' => $node->field_qr_banner_image->entity ? $node->field_qr_banner_image->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_qr_banner_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
