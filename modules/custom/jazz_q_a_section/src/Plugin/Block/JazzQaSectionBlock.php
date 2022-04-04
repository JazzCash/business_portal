<?php

namespace Drupal\jazz_q_a_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzQaSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_qa_section_block",
 *  admin_label = @Translation("Jazz qa section block"),
 * )
 */
class JazzQaSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_q_a_section/jazz_qa';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_q_a_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $blocks = $node->get('field_jazz_q_a_section_data')->referencedEntities();
      $imageblocks = [];
      foreach ($blocks as $block) {
        $qablocks[] = [
          'qatitle' => $block->field_jazz_q_a_title->value,
          'qabody' => $block->field_jazz_q_a_body->value,
          'qa_id' => $block->field_id->value,
        ];
      }

      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link' => $node->field_jazz_q_a_section_link->value,
        'image' => $node->field_jazz_q_a_section_image->entity ? $node->field_jazz_q_a_section_image->entity->url() : null,
        'qablocks' => $qablocks,
    ];
    }

    $build['content'] = [
      '#theme' => 'jazz_q_a_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
