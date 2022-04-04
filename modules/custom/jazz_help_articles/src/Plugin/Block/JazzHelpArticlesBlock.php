<?php

namespace Drupal\jazz_help_articles\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzHelpArticlesBlock' block.
 *
 * @Block(
 *  id = "jazz_help_articles_block",
 *  admin_label = @Translation("Jazz help articles block"),
 * )
 */
class JazzHelpArticlesBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#attached']['library'][] = 'jazz_help_articles/jazz_home_article';

    $query = \Drupal::entityQuery('node')
      ->condition("type", "help_articles");
    $nids = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
    foreach ($nodes as $node) {
      $content[] = [
        'id' => $node->id(),
        'title' => $node->title->value,
        'shorttext' => $node->field_help_article_short_text->value,
        'image' => $node->field_help_article_icon->entity ? $node->field_help_article_icon->entity->url() : null,
    ];
    }

     $build['content'] = [
      '#theme' => 'jazz_help_articles',
      '#data' => [
          'content' => $content
      ],
  ];

    return $build;
  }

}
