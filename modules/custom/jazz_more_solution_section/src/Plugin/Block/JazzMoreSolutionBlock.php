<?php

namespace Drupal\jazz_more_solution_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzMoreSolutionBlock' block.
 *
 * @Block(
 *  id = "jazz_more_solution_block",
 *  admin_label = @Translation("Jazz more solution block"),
 * )
 */
class JazzMoreSolutionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_more_solution_section/jazz_home_solution';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_more_solutions_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link' => $node->field_more_solution_link->value,
        'image' => $node->field_more_solution_image->entity ? $node->field_more_solution_image->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_more_solution_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
