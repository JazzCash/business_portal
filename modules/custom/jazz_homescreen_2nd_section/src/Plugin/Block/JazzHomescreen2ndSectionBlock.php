<?php

namespace Drupal\jazz_homescreen_2nd_section\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzHomescreen2ndSectionBlock' block.
 *
 * @Block(
 *  id = "jazz_homescreen2nd_section_block",
 *  admin_label = @Translation("Jazz homescreen2nd section block"),
 * )
 */
class JazzHomescreen2ndSectionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_homescreen_2nd_section/jazz_home_screen';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "home_screen_2nd_section");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link' => $node->field_home_screen_link->value,
        'image' => $node->field_home_screen_2nd_section_im->entity ? $node->field_home_screen_2nd_section_im->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_homescreen_2nd_section',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
