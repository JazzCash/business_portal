<?php

namespace Drupal\jazz_help_article\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'JazzHelpArticleBlock' block.
 *
 * @Block(
 *  id = "jazz_help_article_block",
 *  admin_label = @Translation("Jazz help article block"),
 * )
 */
class JazzHelpArticleBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $build = [];

    $vid = 'help_articles';
    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);
    $terms_data = [];
    foreach ($terms as $_term) {
      $term = \Drupal\taxonomy\Entity\Term::load($_term->tid);
      $term_data = array(
        'id' => $_term->tid,
        'name' => $_term->name,
        'icon' => $term->field_help_article_icon->entity->url(),
        'nodes' => [],
      );

      $query = \Drupal::entityQuery('node')
        ->condition('status', 1)
        ->condition('type', "help_articles")
        ->condition('field_help_article_type', $_term->tid);

      $nids = $query->execute();
      $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
      foreach ($nodes as $node) {
        $term_data["nodes"][$node->id()] = [
          'id' => $node->id(),
          "title" => $node->getTitle(),
        ];
      }
      $terms_data[] = $term_data;
    }

    $build['output'] = [
      '#theme' => 'jazz_help_article_block',
      '#data' => $terms_data
    ];
    // $build['jazz_help_article_block']['#markup'] = 'Implement JazzHelpArticleBlock.';

    return $build;
  }
}
