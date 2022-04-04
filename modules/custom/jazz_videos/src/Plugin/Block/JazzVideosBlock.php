<?php

namespace Drupal\jazz_videos\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzVideosBlock' block.
 *
 * @Block(
 *  id = "jazz_videos_block",
 *  admin_label = @Translation("Jazz videos block"),
 * )
 */
class JazzVideosBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $build = [];
    $build['#attached']['library'][] = 'jazz_videos/jazz_video';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "jazz_videos");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $components = parse_url($node->field_jazz_video_url->value);
      parse_str($components['query'], $results);
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'videoCode' => $results['v'],
      ];
    }

    $build['content'] = [
      '#theme' => 'jazz_videos',
      '#data' => [
        'content' => $content
      ],
    ];
    return $build;
  }
}
