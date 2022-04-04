<?php

namespace Drupal\jazz_related_articles\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzRelatedArticlesBlock' block.
 *
 * @Block(
 *  id = "jazz_related_articles_block",
 *  admin_label = @Translation("Jazz related articles block"),
 * )
 */
class JazzRelatedArticlesBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_related_articles/jazz_related_article';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "help_articles");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_related_articles',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
