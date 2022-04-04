<?php

namespace Drupal\jazz_video_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzVideoSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_video_section_block",
 *  admin_label = @Translation("Jazz video section block"),
 * )
 */
class JazzVideoSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_video_section/jazz_video';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_video_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $blocks = $node->get('field_video_section_data')->referencedEntities();
      $videoblocks = [];
      foreach ($blocks as $block) {
        $videoblocks[] = [
          'blocktitle' => $block->field_video_section_title->value,
          'blockvideolink' => $block->field_video_link->value,
          'blockbody' => $block->field_video_section_description->value,
        ];
      }

      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'videoblocks' => $videoblocks,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_video_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
