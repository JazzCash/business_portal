<?php

namespace Drupal\jazz_support_articles\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzArticlesSupportBlock' block.
 *
 * @Block(
 *  id = "jazz_articles_support_block",
 *  admin_label = @Translation("Jazz articles support block"),
 * )
 */
class JazzArticlesSupportBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_support_articles/jazz_support_article';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "support_articles");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'link' => $node->field_support_article_link->value,
        'image' => $node->field_support_article_icon->entity ? $node->field_support_article_icon->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_support_articles',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
