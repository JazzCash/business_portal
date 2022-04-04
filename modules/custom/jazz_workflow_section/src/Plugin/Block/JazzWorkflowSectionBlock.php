<?php

namespace Drupal\jazz_workflow_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzWorkflowSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_workflow_section_block",
 *  admin_label = @Translation("Jazz workflow section block"),
 * )
 */
class JazzWorkflowSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $build['#attached']['library'][] = 'jazz_workflow_section/jazz_workflow';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_home_screen_workflow_sectio");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $blocks = $node->get('field_workflow_images_and_descri')->referencedEntities();
      $imageblocks = [];
      foreach ($blocks as $block) {
        $imageblocks[] = [
          'blockimage' => $block->field_workflow_section_image->entity ? $block->field_workflow_section_image->entity->url() : null,
          'blockbody' => $block->field_workflow_section_descri->value,
        ];
      }

      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'body' => $node->body->value,
        'image' => $node->field_jazz_client_image->entity ? $node->field_jazz_client_image->entity->url() : null,
        'imageblocks' => $imageblocks,
    ];
    }

    $build['content'] = [
      '#theme' => 'jazz_workflow_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
